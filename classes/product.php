<?php
	$realpath = realpath(dirname(__FILE__));
	include_once ($realpath.'/../lib/database.php');
	include_once ($realpath.'/../helpers/format.php');
	include_once ($realpath.'/../sendMail.php');
?>
<?php
	/**
	 * product class
	 */
	class Product{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();			
		}

		public function pro_ins($data,$file){
			$pro_name = $this->fm->validation($data['pro_name']);
			$cat_id   = $this->fm->validation($data['cat_id']);
			$brand_id = $this->fm->validation($data['brand_id']);
			$body     = $this->fm->validation($data['body']);
			$price    = $this->fm->validation($data['price']);
			$type     = $this->fm->validation($data['type']);
			$stock    = $this->fm->validation($data['stock']);

			$pro_name = mysqli_real_escape_string($this->db->link, $pro_name);
			$cat_id   = mysqli_real_escape_string($this->db->link, $cat_id);
			$brand_id = mysqli_real_escape_string($this->db->link, $brand_id);
			$body     = mysqli_real_escape_string($this->db->link, $body);
			$price    = mysqli_real_escape_string($this->db->link, $price);
			$type     = mysqli_real_escape_string($this->db->link, $type);
			$stock    = mysqli_real_escape_string($this->db->link, $stock);

			$permited    = array('jpg','png');
			$image_name  = $_FILES['image']['name'];
			$image_size  = $_FILES['image']['size'];
			$image_tmp   = $_FILES['image']['tmp_name'];
 
			$div         = explode('.', $image_name);
			$image_exten = strtolower(end($div));
			$image_uniq  = substr(md5(time()), 0, 10).'.'.$image_exten;
			$image_up    = "upload/".$image_uniq;

			if ($pro_name == ""|| $cat_id == ""|| $brand_id == ""|| $body == ""|| $price == ""|| $type == ""|| $image_name == "" || $stock == "") {
				$msg = "<span class='success'> Feild Must Not be empty.</span>";
				return $msg;
			}elseif ($image_size > 1048567) {
				$msg = "<span class='success'> image size too large.</span>";
				return $msg;
			}elseif (in_array($image_exten,$permited) === False) {
				$msg = "<span class='success'> You can only upload:-".implode(', ', $permited )."</span>";
				return $msg;
			}else{
				move_uploaded_file($image_tmp, $image_up);
				$query = "INSERT INTO product(pro_name,cat_id,brand_id,body,price,type,image,stock)  values('$pro_name', '$cat_id','$brand_id','$body','$price','$type','$image_up', $stock)";
				$result = $this->db->insert($query);
				if ($result) {
					$msg = "<span class='success'> Insert Successfully!!</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>Product Not Insert!!</span>";
					return $msg;
				}

			}
		}

		public function getallpro(){

			$query = "SELECT p.*, c.cat_name, b.brand_name,DATEDIFF(p.endDate, CURDATE())
     AS remaining_days from product as p, category as c, brand as b
					WHERE p.cat_id = c.cat_id and
					p.brand_id = b.brand_id 
					ORDER BY p.pro_id DESC";
/*
			$query  = "SELECT product.*,category.cat_name,brand.brand_name
			from product
			INNER JOIN category ON product.cat_id = category.cat_id
			INNER JOIN brand ON product.brand_id  = brand.brand_id
			ORDER BY product.pro_id DESC";*/
			$result = $this->db->select($query);
			return $result;
		}
        public function get_top_sale_product(){
            $queryTopSell = "SELECT * from product as p, category as c, brand as b,
			(SELECT oi.pro_id, SUM(oi.quantity) AS total_quantity, 
			SUM(oi.price) AS total_amount FROM orderdetails AS oi, 
			tbl_order AS o WHERE oi.or_id = o.or_id AND o.status = '3'
			 GROUP BY oi.pro_id DESC LIMIT 10) AS ts 
			 WHERE ts.pro_id = p.pro_id
			 AND p.cat_id = c.cat_id
			 AND p.brand_id = b.brand_id 
			 ORDER BY ts.total_quantity DESC";
            $result = $this->db->select($queryTopSell);
            return $result;
        }

        public function get_top_rental_plant(){
            $queryTopSell = "SELECT * from plants as p,
			(SELECT o.plant_id, SUM(o.quantity) AS total_quantity, 
			SUM(o.total_price) AS total_amount FROM customepackage AS oi, 
			customepackagedetails AS o WHERE oi.cus_pkg_id = o.cus_pkg_id AND oi.status = 'complete'
			 GROUP BY o.plant_id DESC LIMIT 10) AS ts 
			 WHERE ts.plant_id = p.plant_id
			 ORDER BY ts.total_quantity DESC";
            $result = $this->db->select($queryTopSell);
            return $result;
        }

        public function get_yearly_sale_product(){
            $query_Yearly_Sell = "SELECT * from product as p, category as c, brand as b,
			(SELECT YEAR(o.date) AS year, oi.pro_id, SUM(oi.quantity) AS total_quantity, 
			SUM(oi.price) AS total_amount FROM orderdetails AS oi, 
			tbl_order AS o WHERE oi.or_id = o.or_id AND o.status = '3'
			 GROUP BY oi.pro_id DESC LIMIT 10) AS ts 
			 WHERE ts.pro_id = p.pro_id
			 AND p.cat_id = c.cat_id
			 AND p.brand_id = b.brand_id 
			 ORDER BY ts.year DESC";
            $result = $this->db->select($query_Yearly_Sell);
            return $result;
        }

        public function get_yearly_rental_plant(){
            $query_Yearly_Sell = "SELECT * from plants as p,
			(SELECT YEAR(oi.endDate) AS year, o.plant_id, SUM(o.quantity) AS total_quantity, 
			SUM(o.total_price) AS total_amount FROM customepackage AS oi, 
			customepackagedetails AS o WHERE oi.cus_pkg_id = o.cus_pkg_id AND oi.status = 'complete'
			 GROUP BY o.plant_id DESC LIMIT 10) AS ts 
			 WHERE ts.plant_id = p.plant_id 
			 ORDER BY ts.year DESC";
            $result = $this->db->select($query_Yearly_Sell);
            return $result;
        }

        public function get_monthly_rental_plant(){
            $query_Yearly_Sell = "SELECT * from plants as p,
			(SELECT YEAR(oi.endDate) AS year,MONTHNAME(oi.endDate) AS month,
  			MONTH(oi.endDate) AS month_no, o.plant_id, SUM(o.quantity) AS total_quantity, 
			SUM(o.total_price) AS total_amount FROM customepackage AS oi, 
			customepackagedetails AS o WHERE oi.cus_pkg_id = o.cus_pkg_id AND oi.status = 'complete'
			 GROUP BY o.plant_id DESC LIMIT 10) AS ts 
			 WHERE ts.plant_id = p.plant_id 
			 ORDER BY ts.year,month_no DESC";
            $result = $this->db->select($query_Yearly_Sell);
            return $result;
        }

        public function get_month_sale_product(){
            $query_Yearly_Sell = "SELECT * from product as p, category as c, brand as b,
			(SELECT YEAR(o.date) AS year,MONTHNAME(o.date) AS month,
  			MONTH(o.date) AS month_no, oi.pro_id, SUM(oi.quantity) AS total_quantity, 
			SUM(oi.price) AS total_amount FROM orderdetails AS oi, 
			tbl_order AS o WHERE oi.or_id = o.or_id AND o.status = '3'
			 GROUP BY year,oi.pro_id DESC LIMIT 10) AS ts 
			 WHERE ts.pro_id = p.pro_id
			 AND p.cat_id = c.cat_id
			 AND p.brand_id = b.brand_id 
			 ORDER BY ts.year DESC";
            $result = $this->db->select($query_Yearly_Sell);
            return $result;
        }

        public function get_total_year_sale_product(){
            $query_Yearly_Sell = "SELECT EXTRACT(YEAR FROM o.date) AS year,
			 SUM(oi.quantity) AS total_quantity, SUM(oi.price) AS total_amount
			  FROM orderdetails AS oi, tbl_order AS o WHERE o.or_id = oi.or_id 
			  AND o.status = '3' 
			  GROUP BY year ORDER BY year DESC";
            $result = $this->db->select($query_Yearly_Sell);
            return $result;
        }
        public function get_total_yearly_rental_plant(){
            $query_Yearly_Sell = "SELECT EXTRACT(YEAR FROM oi.endDate) AS year,
			 SUM(o.quantity) AS total_quantity, SUM(o.total_price) AS total_amount
			  FROM customepackage AS oi, customepackagedetails AS o WHERE o.cus_pkg_id = oi.cus_pkg_id
			  AND oi.status = 'complete'
			  GROUP BY year ORDER BY year DESC";
            $result = $this->db->select($query_Yearly_Sell);
            return $result;
        }

        public function get_total_monthly_rental_plant(){
            $query_Yearly_Sell = "SELECT EXTRACT(YEAR FROM oi.endDate) AS year,MONTHNAME(oi.endDate) AS month,
 			  MONTH(oi.endDate) AS month_no,
			 SUM(o.quantity) AS total_quantity, SUM(o.total_price) AS total_amount
			  FROM customepackage AS oi, customepackagedetails AS o WHERE o.cus_pkg_id = oi.cus_pkg_id
			  AND oi.status = 'complete'
			  GROUP BY year,month_no ORDER BY year,month_no DESC";
            $result = $this->db->select($query_Yearly_Sell);
            return $result;
        }


        public function get_total_month_sale_product(){
            $query_Yearly_Sell = "SELECT YEAR(o.date) AS year, MONTHNAME(o.date) AS month,
 			  MONTH(o.date) AS month_no,
			  SUM(oi.quantity) AS total_quantity, SUM(oi.price) AS total_amount
			  FROM orderdetails AS oi, tbl_order AS o WHERE o.or_id = oi.or_id 
			  AND o.status = '3' 
			  GROUP BY year,month_no ORDER BY year DESC";
            $result = $this->db->select($query_Yearly_Sell);
            return $result;
        }

        public function get_unsold_product(){
            $query_unsold = "SELECT * FROM product as p, category as c, brand as b 
    		WHERE p.cat_id = c.cat_id AND p.brand_id = b.brand_id AND p.pro_id  
    		NOT IN(SELECT oi.pro_id FROM orderdetails AS oi GROUP BY oi.pro_id)";
            $result = $this->db->select($query_unsold);
            return $result;
        }





        public function getAllDiscountDetails($discountID)
        {

            $query = "SELECT p.*, c.cat_name, b.brand_name,DATEDIFF(p.endDate, CURDATE())
     AS remaining_days from product as p, category as c, brand as b
					WHERE p.cat_id = c.cat_id and
					p.brand_id = b.brand_id AND p.pro_id = '$discountID'
					ORDER BY p.pro_id DESC";
            $result = $this->db->select($query);
            return $result;
        }

		public function getallDiscount(){
			$select = "SELECT d.*,p.* FROM product as p , discount as d WHERE d.pro_id = p.pro_id ";
            $result = $this->db->select($select);
            return $result;
		}
		public function getallproductforuser(){
			$per_page = 9;
			if (isset($_GET["page"])) {
				$page = $_GET["page"];
			}else{
				$page = 1;
			}
			$start_from = ($page-1) * $per_page;

			$query = "SELECT p.*, c.cat_name, b.brand_name from product as p, category as c, brand as b
					WHERE p.cat_id = c.cat_id and
					p.brand_id = b.brand_id 
					ORDER BY p.pro_id DESC limit $start_from, $per_page ";
			$result = $this->db->select($query);
			return $result;
		}
         // category base read product start
		public function getproductbyC($id){
			$per_page = 9;
			if (isset($_GET["page"])) {
				$page = $_GET["page"];
			}else{
				$page = 1;
			}
			$start_from = ($page-1) * $per_page;

			$query = "SELECT p.*, c.cat_name, b.brand_name from product as p, category as c, brand as b
					WHERE p.cat_id = c.cat_id and
					p.brand_id     = b.brand_id and
					p.cat_id       = '$id'   
					ORDER BY p.pro_id DESC limit $start_from, $per_page ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getallprocetbase($id){

			$query = "SELECT p.*, c.cat_name, b.brand_name from product as p, category as c, brand as b
					WHERE p.cat_id = c.cat_id and
					p.brand_id = b.brand_id and
					p.cat_id       = '$id'
					ORDER BY p.pro_id DESC";
/*
			$query  = "SELECT product.*,category.cat_name,brand.brand_name
			from product
			INNER JOIN category ON product.cat_id = category.cat_id
			INNER JOIN brand ON product.brand_id  = brand.brand_id
			ORDER BY product.pro_id DESC";*/
			$result = $this->db->select($query);
			return $result;
		}
		// category base read product end

		public function getproductbyid($id){
			$que    = "SELECT * FROM product WHERE pro_id = '$id' ";
			$result = $this->db->select($que);
			return $result; 
		}

        public function getproductbyDiscount($id){
            $que    = "SELECT * FROM product WHERE pro_id = '$id'";
            $result = $this->db->select($que);
            return $result;
        }

        public function getDiscountByID($id){
            $select = "SELECT d.*,p.* FROM product as p , discount as d WHERE d.pro_id = p.pro_id AND d.dis_id='$id'";
            $result = $this->db->select($select);
            return $result;
        }



		public function pro_update($data,$file,$id){
			$pro_name = $this->fm->validation($data['pro_name']);
			$cat_id   = $this->fm->validation($data['cat_id']);
			$brand_id = $this->fm->validation($data['brand_id']);
			$body     = $this->fm->validation($data['body']);
			$price    = $this->fm->validation($data['price']);
			$stock    = $this->fm->validation($data['stock']);
			$type     = $this->fm->validation($data['type']);

			$pro_name = mysqli_real_escape_string($this->db->link, $pro_name);
			$cat_id   = mysqli_real_escape_string($this->db->link, $cat_id);
			$brand_id = mysqli_real_escape_string($this->db->link, $brand_id);
			$body     = mysqli_real_escape_string($this->db->link, $body);
			$price    = mysqli_real_escape_string($this->db->link, $price);
			$stock    = mysqli_real_escape_string($this->db->link, $stock);
			$type     = mysqli_real_escape_string($this->db->link, $type);

			$permited = array('jpg','png','jpeg','gif');
			$filename = $file['image']['name'];
			$filesize = $file['image']['size'];
			$filetemp = $file['image']['tmp_name'];

			$div       = explode('.', $filename);
			$extention = strtolower(end($div));
			$uniqName  = substr(md5(time()), 0,10).'.'.$extention;
			$fileUpload= "upload/".$uniqName;

			if ($pro_name == "" || $cat_id == "" || $brand_id == ""|| $body =="" || $price == "" ||$type == "" ) {
				$msg = "<span class='error'> Feild Must Not be empty.</span>";
				return $msg;
			}else{
				if (!empty($filename)) {
					if ($filesize > 1048567) {
					$msg = "<span class='error'> File size over 1 MB!!!.</span>";
					return $msg;
					}elseif (in_array($permited, $extention)) {
						$msg = "<span class='error'> You Must be upload;-".implode(',',$permited ).".</span>";
						return $msg;
					}else{
						move_uploaded_file($filetemp, $fileUpload);
						$query = "UPDATE product
									SET
									pro_name = '$pro_name',
									cat_id = '$cat_id',
									brand_id = '$brand_id',
									body = '$body',
									price = '$price',
									stock = '$stock',
									type = '$type',
									image = '$fileUpload'
									WHERE pro_id = '$id'";
						$result = $this->db->update($query);
						if ($result) {
							$msg = "<span class='success'> Update Successfully!!</span>";
							return $msg;
						}else{
							$msg = "<span class='error'>Product Not Updated!!</span>";
							return $msg;
						}
					}
				}else{
						$query = "UPDATE product
									SET
									pro_name = '$pro_name',
									cat_id = '$cat_id',
									brand_id = '$brand_id',
									body = '$body',
									price = '$price',
									stock = '$stock',
									type = '$type'
									WHERE pro_id = '$id'";
						$result = $this->db->update($query);
						if ($result) {
							$msg = "<span class='success'> Update Successfully!!</span>";
							return $msg;
						}else{
							$msg = "<span class='error'>Product Not Updated!!</span>";
							return $msg;
						}

				}
				
			}



		}




		public function delProductbyid($id){
			$query = "DELETE FROM product WHERE pro_id = '$id'";
			$result = $this->db->delete($query);
			if ($result) {
				$msg = "<span class='success'>Delete Successfully!!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'> Product Not Deleted!!</span>";
				return $msg;
			}

		}
		public function DiscountOff($id){
            $update = "UPDATE product SET discount = '0', startDate ='0000-00-00',endDate = '0000-00-00',duration = '0' WHERE pro_id = '$id'";
            $result = $this->db->update($update);
            if ($result){
                echo "<script>window.location = (productlist.php;)</script>";
            }

		}
        public function DiscountOffBy($id){
            $update = "UPDATE product SET discount = '0', startDate ='0000-00-00',endDate = '0000-00-00',duration = '0' WHERE pro_id = '$id'";
            $result = $this->db->update($update);
            if ($result){
                echo "<script>window.location = (productlist.php;)</script>";
            }

        }

		public function readproduct(){
			$query = "SELECT * FROM product where type = '1' ORDER BY pro_id DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function Newproduct(){
			$query = "SELECT p.*, c.cat_name, b.brand_name from
					product as p, category as c, brand as b
					WHERE p.cat_id = c.cat_id and
					p.brand_id = b.brand_id 
					ORDER BY p.pro_id DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}
        public function discount_product(){
            $query = "SELECT p.*, c.cat_name, b.brand_name from
					product as p, category as c, brand as b
					WHERE p.cat_id = c.cat_id and
					p.brand_id = b.brand_id and 
					p.discount > 1
					ORDER BY p.pro_id DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

		public function getDbyId($id){
			$query = "SELECT p.*, c.cat_name, b.brand_name from
					product as p, category as c, brand as b
					WHERE p.cat_id = c.cat_id and
					p.brand_id = b.brand_id and
					p.pro_id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}



		public function insRatingByAjx($data){
			$pro_id = $this->fm->validation($data['pro_id']);
			$cus_name = $this->fm->validation($data['cus_name']);
			$cus_email = $this->fm->validation($data['cus_email']);
			$review = $this->fm->validation($data['user_review']);
			$rating = $this->fm->validation($data['rated_value']);
			$pro_id = mysqli_real_escape_string($this->db->link, $pro_id);
			$cus_name = mysqli_real_escape_string($this->db->link, $cus_name);
			$cus_email = mysqli_real_escape_string($this->db->link, $cus_email);
			$review = mysqli_real_escape_string($this->db->link, $review);
			$rating = mysqli_real_escape_string($this->db->link, $rating);
			$cus_id = $_SESSION['cusid'];
		    // Checking Existing Review
		    $query = "SELECT * FROM pro_ratings WHERE pro_id = $pro_id AND cus_id = $cus_id";
		    $result = $this->db->select($query);
			if ($result) {
				$queryPostReview = "UPDATE pro_ratings SET review = '$review', ratings = $rating WHERE pro_id = $pro_id AND cus_id = $cus_id";
				 $result = $this->db->update($queryPostReview);	 
			}else{
				$queryPostReview = "INSERT INTO pro_ratings(cus_name, cus_email, review, ratings, pro_id, cus_id)VALUES('$cus_name', '$cus_email', '$review', $rating, $pro_id, $cus_id)";
				 $result = $this->db->insert($queryPostReview);
			}
			if ($result) {
				$status = 'ok';
			}else{
				$status = 'err';
			}
			return $status;


	}



	// =======================
	public function getreviewByID($id){
		$select = "SELECT * FROM pro_ratings WHERE pro_id = $id ";
		$review_result = $this->db->select($select);
		if (isset($review_result)) {
			return $review_result;
		}else{
			return False;
		}
		
	}



	public function getAllratting($id){
		$select = "SELECT count(review) as total_review, AVG(ratings) as Avg_ratting FROM pro_ratings WHERE pro_id = $id ";
		$resultRating = $this->db->select($select);
		if (isset($resultRating)) {
			return $resultRating;
		}else{
			return False;
		}
	}



	public function getsingleratting($id){
		$sqlPointWiseRating = "SELECT *, ROUND(((100 * r.per_total_rating)/ (SELECT SUM(b.per) FROM (SELECT COUNT(*) AS per FROM pro_ratings AS sbr WHERE sbr.pro_id = $id) AS b) ),2) AS percentage From (SELECT ratings, COUNT(*) AS per_total_rating FROM pro_ratings WHERE pro_id = $id GROUP BY ratings) AS r ORDER BY r.ratings DESC";
		$result = $this->db->select($sqlPointWiseRating);
		if (isset($result)) {
			return $result;
		}else{
			return False;
		}
	}

	public function relatedproduct($cat_id){
        $query = "SELECT p.*, c.cat_name, b.brand_name from product as p, category as c, brand as b
					WHERE p.cat_id = c.cat_id and
					p.brand_id = b.brand_id and
					p.cat_id       = '$cat_id'
					ORDER BY p.pro_id DESC";
        $result = $this->db->select($query);
        if (isset($result)) {
            return $result;
        }else{
            return False;
        }
	}




	public function insertSubscription($cusid,$email){
		$select = "SELECT * FROM subscription WHERE email = '$email'";
        $result = $this->db->select($select);
        if ($result){
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Same Email Already Subscribed.</div>';
            return $msg;
		}else {

            $insert = "INSERT INTO subscription(cus_id,email) values($cusid,'$email')";
            $result = $this->db->insert($insert);
            $msg = '<div class="alert alert-success" role="alert">
                                <strong>Well Done!</strong> Successfully Subscribed.</div>';
            return $msg;
        }
	}

	public function DiscountAdd($product_id,$discount,$duration,$name){

        if ($product_id == "" || $discount == ""|| $duration == ""){
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Field Must Mot be empty.</div>';
            return $msg;
        }else{
            $dt1       = new DateTime();
            $startTime = $dt1->format("Y-m-d");
            $dt2       = new DateTime("+$duration days");
            $endTime   = $dt2->format("Y-m-d");
			$update = "UPDATE product SET discount = '$discount', startDate ='$startTime',endDate = '$endTime',duration = '$duration' WHERE pro_id = '$product_id'";
            $result = $this->db->update($update);
            if ($result){
            	$success = false;
                $select = "SELECT * FROM subscription";
                $result = $this->db->select($select);
                if ($result){
                    while ($row = $result->fetch_assoc()){
                        $to = $row['email'];
                        $from = 'gardennarsary@gmail.com';
                        $subject = "Discount";
                        $body ='Start big Offer ('.$discount.') % Discount '.$name.' product for '.$duration.' days';


                        send_mail($from, $to, $subject, $body);
					}
					$success =true;
				}

            }
            if ($success == true){
                $msg = '<div class="alert alert-success" role="alert">
                                <strong>Well Done!</strong>Successfully Done.</div>';
                return $msg;

			}
		}

	}

	public function getSingleDiscount($id){
        $select = "SELECT * FROM discount WHERE pro_id='$id'";
        $result = $this->db->select($select);
        if (isset($result)){
            return $result;
		}else{
        	$msg = "new";
        	return $msg;
		}

	}


	public function DiscountUpdate($product_id,$discount,$duration,$dis_id){

        $dt1       = new DateTime();
        $startTime = $dt1->format("Y-m-d");
        $dt2       = new DateTime("+$duration days");
        $endTime   = $dt2->format("Y-m-d");

        if ($product_id == "" || $discount == "" || $duration == ""){
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Field Must Not be Empty.</div>';
            return $msg;
		}else{
        	$update = "UPDATE discount SET percentage = '$discount',duration = '$duration',startdate='$startTime',endDate='$endTime' WHERE dis_id ='$dis_id'";
            $result = $this->db->insert($update);
            if ($result){
                $msg = '<div class="alert alert-success" role="alert">
                                <strong>WellDone!</strong> Successfully Updated.</div>';
                return $msg;
			}else{
                $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Some Problem Face.</div>';
                return $msg;
			}

        }
	}



	public function count_total_product(){
			$select = "SELECT sum(stock)as total_product FROM product";
        	$result = $this->db->select($select)->fetch_assoc();
        	if ($result){
        		$total_product = $result['total_product'];
        		return $total_product;
			}
	}
        public function count_total_product_value(){
            $select = "SELECT count(pro_id) as total_product FROM product";
            $result = $this->db->select($select)->fetch_assoc();
            if ($result){
                $total_product = $result['total_product'];
                return $total_product;
            }
        }

        public function count_total_plants(){
            $select = "SELECT sum(stock)as total_product FROM plants";
            $result = $this->db->select($select)->fetch_assoc();
            if ($result){
                $total_product = $result['total_product'];
                return $total_product;
            }
        }

        public function count_total_customer(){
            $select = "SELECT count(cus_id)as total_customer FROM customer";
            $result = $this->db->select($select)->fetch_assoc();
            if ($result){
                $total_product = $result['total_customer'];
                return $total_product;
            }
        }

        public function total_running_package(){
            $select = "SELECT count(package_book_id)as total_customer FROM tbl_package_booking 
			WHERE status = 'running'";
            $result = $this->db->select($select)->fetch_assoc();
            if ($result){
                $total_product = $result['total_customer'];
                return $total_product;
            }
        }

        public function total_running_c_package(){
            $select = "SELECT count(CPID)as total_customer FROM customepackage 
			WHERE status = 'running'";
            $result = $this->db->select($select)->fetch_assoc();
            if ($result){
                $total_product = $result['total_customer'];
                return $total_product;
            }
        }

        public function total_subscriber(){
            $select = "SELECT count(sub_id)as total_customer FROM subscription";
            $result = $this->db->select($select)->fetch_assoc();
            if ($result){
                $total_product = $result['total_customer'];
                return $total_product;
            }
        }

        public function total_selling_cost(){
            $select = "SELECT sum(total_price)as total_customer FROM tbl_order WHERE status ='3'";
            $result = $this->db->select($select)->fetch_assoc();
            if ($result){
                $total_product = $result['total_customer'];
                return $total_product;
            }
        }

}

?>