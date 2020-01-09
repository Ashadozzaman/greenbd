<?php
	$realpath = realpath(dirname(__FILE__));

	include_once ($realpath.'/../sendMail.php');
	include_once ($realpath.'/../lib/database.php');
	include_once ($realpath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */
	class cart{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();			
		}

		public function cartadd($quantity,$id){
			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$pro_id   = mysqli_real_escape_string($this->db->link, $id);
			$ses_id   = session_id();
			$query    = "SELECT * FROM product WHERE pro_id = '$id'";
			$result   = $this->db->select($query)->fetch_assoc();
			$pro_name = $result['pro_name'];
			$image    = $result['image'];
			if ($result['discount'] > 0){
                $price    = $result['price']-($result['price']*($result['discount']/100));
			}else{
                $price    = $result['price'];
			}

			$chQ      = "SELECT * from cart where pro_id = '$pro_id' and ses_id ='$ses_id' ";
			$result   = $this->db->select($chQ);
			if ($result) {
				$msg = "Product already add to cart";
				return $msg;
			}else{

				$query    = "SELECT * FROM product WHERE pro_id = '$id'";
				$sresult   = $this->db->select($query)->fetch_assoc();
				$stk      = $sresult['stock'];

				if ($stk < $quantity) {
					$msg = "Number of Product is not available";
					return $msg;
				}else{

				$query = "INSERT INTO cart(ses_id,pro_id,pro_name,price,quantity,image) values('$ses_id','$pro_id','$pro_name','$price','$quantity','$image')";
					$result = $this->db->insert($query);
					if ($result) {
						echo "<script> window:location = 'cartpage.php';</script>";
					}else{
						header("location:404.php");
					}
				}
			}
		}


		public function showCart(){
			$ses_id   = session_id();
			$que    = "SELECT * FROM cart WHERE ses_id = '$ses_id' ";
			$result = $this->db->select($que);
			return $result;
		}


		public function countcartid(){
			$ses_id   = session_id();
			$que    = "SELECT count(cart_id) FROM cart WHERE ses_id = '$ses_id' ";
			$result = $this->db->select($que);
			return $result;
		}

		public function cartup($quantity,$cart_id,$pro_id){
			$quantity = $this->fm->validation($quantity);
			$cart_id  =	mysqli_real_escape_string($this->db->link, $cart_id);
			$pro_id   =	mysqli_real_escape_string($this->db->link, $pro_id);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);

			$query    = "SELECT * FROM product WHERE pro_id = '$pro_id'";
				$sresult   = $this->db->select($query)->fetch_assoc();
				$stk      = $sresult['stock'];

				if ($stk < $quantity) {
					$msg = "Number of Product is not available";
					return $msg;
				}else{

				$query        = "UPDATE cart
									SET quantity  ='$quantity'
									WHERE cart_id ='$cart_id'
				"; 
				$result = $this->db->update($query );
				if ($result) {
				 	$msg = "Updated";
				 	return $msg;
				 }else{
				 	$msg = "not Updated";
				 	return $msg;
				 } 
			}
		}

		public function prodel($id){
			$query = "DELETE FROM cart WHERE cart_id = '$id'";
			$result = $this->db->delete($query);
			if ($result) {
				echo "<script> window:location = 'cartpage.php';</script>";
			}else{
				$msg = "<span class='error'> Product Not Deleted!!</span>";
				return $msg;
			}

		}

		public function cartdel(){
			$ses_id   = session_id();
			$query = "DELETE FROM cart WHERE ses_id = '$ses_id'";
			$result = $this->db->delete($query);
		}


		public function insProOrder($cusid,$data){
			$ses_id   = session_id();
			$name    = $this->fm->validation($data['name']);
			$address  = $this->fm->validation($data['address']);
			$cname    = $this->fm->validation($data['cname']);
			$town     = $this->fm->validation($data['town']);
			$phone    = $this->fm->validation($data['phone']);
			$postcode = $this->fm->validation($data['postcode']);
			$email    = $this->fm->validation($data['email']);
			$checkbox   = $this->fm->validation($data['checkbox']);
			$name    =	mysqli_real_escape_string($this->db->link, $name);
			$address  =	mysqli_real_escape_string($this->db->link, $address);
			$cname    =	mysqli_real_escape_string($this->db->link, $cname);
			$town     =	mysqli_real_escape_string($this->db->link, $town);
			$phone    =	mysqli_real_escape_string($this->db->link, $phone);
			$postcode =	mysqli_real_escape_string($this->db->link, $postcode);
			$email    =	mysqli_real_escape_string($this->db->link, $email);
            $checkbox    =	mysqli_real_escape_string($this->db->link, $checkbox);

			$query    = "SELECT * FROM cart WHERE ses_id = '$ses_id' ";
			$getpro   = $this->db->select($query);
			if ($getpro) {
				$total_price = 0;
				$total_quantity = 0;
				while ($result=$getpro->fetch_assoc()) {
					$price = $result['price'];
					$quantity = $result['quantity'];
					$total_price= $total_price + $result['price'] * $quantity;
					$vat = $total_price *.02;
					$total=$total_price+$vat+50;
					$total_quantity= $total_quantity + $result['quantity'];

				}
				
			}
			$is_success=False;
			if ($name == ""|| $cname == ""|| $address == ""|| $postcode == ""|| $email == ""|| $phone == ""|| $town == "") {
				$msg = "<span class='success' > Feild Must Not be empty.</span>";
				return $msg;
			}elseif ($checkbox == ""){
                $msg = "<span class='success' >Confirm Trams and Condition.</span>";
                return $msg;
			}else{
				$or_id = uniqid();				
				$insquery = "INSERT INTO tbl_order(or_id,cus_id,name,cname,address,postcode,town,phone,email,total_price,total_quantity) values('$or_id','$cusid','$name','$cname','$address','$postcode','$town','$phone','$email','$total','$total_quantity')";
				$result = $this->db->insert($insquery);
				if ($result) {
					$query    = "SELECT * FROM cart WHERE ses_id = '$ses_id' ";
					$getpro   = $this->db->select($query);
					
					if ($getpro) {
						while ($result = $getpro->fetch_assoc()) {
							$pro_id   = $result['pro_id'];
							$pro_name = $result['pro_name'];
							$quantity = $result['quantity'];
							$price    = $result['price'] * $quantity ;
							$image    = $result['image'];
							$insquery = "INSERT INTO orderDetails(cus_id,pro_id,pro_name,price,quantity,image, or_id) values('$cusid','$pro_id','$pro_name','$price','$quantity','$image','$or_id')";
							$result = $this->db->insert($insquery);
							if ($result) {
								$updateQuery = "UPDATE product SET stock = stock - $quantity WHERE pro_id = $pro_id";
								$result = $this->db->update($updateQuery);
								$is_success=True;
							}
						
						}
					}
				}
			}
			if ($is_success==True) {
				$withship = $total_price + 50;
				$vat   = $total_price * .02;
                $total = $vat + $withship;				
				$from = 'gardennarsary@gmail.com';
				$to = $email;
				$subject = "Order Details";
				$body ='<html>
				<div class="col-12 col-md-9 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">
							<ul class="order-details-form mb-4">
                            <li><span>Order Subtotal: </span> 
                            <span>$'.$total_price.'</span></li>
                            <li><span>With Shipping Cost: </span> <span>$'.$withship.'</span>
                            </li>
                            <li><span>Tax: </span> <span>2%</span></li>
                            <li><span>Total: </span> <span>$'. $total .'</span>
                            </li>
                            <li><span>Total Quantity: </span> 
                            	<span>'.$total_quantity.'</span>
                            </li>
                        </ul>
                        </div></div></html>';




				send_mail($from, $to, $subject, $body);
				$delcart = $this->cartdel();
				echo "<script>window.location = 'success.php ';</script>";
			}

			

			

		}


		public function showorder($cusid,$id){
			$query   = "SELECT * FROM orderDetails WHERE cus_id = '$cusid' AND or_id = '$id' ORDER BY `date` DESC ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getorderdetails($id){
			$query   = "SELECT * FROM orderDetails WHERE or_id = '$id' ORDER BY `date` DESC ";
			$result = $this->db->select($query);
			return $result;
		}
		public function orderpage($cusid){
			$query   = "SELECT * FROM tbl_order WHERE cus_id = $cusid AND status <> 3 ORDER BY `date` DESC ";
			$result = $this->db->select($query);
			return $result;
		}

		public function showOrderpage($cusid){
			$que    = "SELECT * FROM orderDetails WHERE cus_id = '$cusid' ORDER BY `date` DESC ";
			$result = $this->db->select($que);
			return $result;

		}


		public function getallorder(){
			$query    = "SELECT * FROM tbl_order WHERE status = '0' ORDER BY `date` DESC ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getallconfirmorder(){
            $query    = "SELECT * FROM tbl_order WHERE status = '1' ORDER BY `date` DESC ";
            $result = $this->db->select($query);
            return $result;
		}

		public function getcnforder(){
			$query    = "SELECT * FROM tbl_order WHERE status = '3' ORDER BY `date` DESC ";
			$result = $this->db->select($query);
			return $result;
		}

		public function cnforderforuser($cusid){
			$query    = "SELECT * FROM tbl_order WHERE cus_id = '$cusid' AND status = '3' ORDER BY `date` DESC ";
			$result = $this->db->select($query);
			return $result;
		}


		public function shiftOrder($id,$price,$date){
			$id    = mysqli_real_escape_string($this->db->link, $id);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$date  = mysqli_real_escape_string($this->db->link, $date);

			$query ="UPDATE tbl_order SET status = '1'
					WHERE or_id = '$id' AND 
					total_price = '$price' AND
					`date` = '$date'";
			$result = $this->db->update($query);
		}

		public function cnfProductbyid($id){
			$id    = mysqli_real_escape_string($this->db->link, $id);

			$query ="UPDATE tbl_order SET status = '3'
					WHERE or_id = '$id' ";
			$result = $this->db->update($query);
		}

		public function getoderaddressByid($id){
			$query = "SELECT * from tbl_order WHERE or_id = '$id'";
			$result = $this->db->select($query);
			return $result;

		}

		public function delorder($id){
			$query = "DELETE FROM tbl_order WHERE or_id = '$id'";
			$result = $this->db->delete($query);
			return $result;
		}

	}


?>