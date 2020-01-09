<?php
	$realpath = realpath(dirname(__FILE__));
	include_once ($realpath.'/../lib/database.php');
	include_once ($realpath.'/../helpers/format.php');
?>
<?php
	class Brand{
		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function bndadd($brand_name){
			$brand_name = $this->fm->validation($brand_name);
			$brand_name = mysqli_real_escape_string($this->db->link, $brand_name);

			if (empty($brand_name)) {
				$msg = "<span class='success'> Feild Must Not be empty.</span>";
				return $msg;
			}else{
                $select = "SELECT * FROM brand WHERE brand_name = '$brand_name'";
                $sql_result = $result = $this->db->insert($select);
                if ($sql_result){
                    $msg = "<span class='error'> Brand Already Added!!</span>";
                    return $msg;
                }else{
                    $query = "INSERT INTO brand(brand_name) values('$brand_name')";
                    $result = $this->db->insert($query);
                    if ($result) {
                        $msg = "<span class='success'> Brand Insert Successfully!!</span>";
                        return $msg;
                    }else{
                        $msg = "<span class='error'> Brand Not Insert!!</span>";
                        return $msg;
                    }
				}

			}
		}

		public function getbrand(){
			$query = "SELECT * FROM brand ORDER BY brand_id DESC";
			$result = $this->db->select($query);
			return $result;

		}
		public function bndeditbyid($id){
			$query = "SELECT * FROM brand WHERE brand_id = '$id'";
			$result = $this->db->select($query);
			return $result; 

		}

		public function editbnd($brand_name,$id){
			$brand_name = $this->fm->validation($brand_name);
			$brand_name = mysqli_real_escape_string($this->db->link, $brand_name);
			$id= mysqli_real_escape_string($this->db->link, $id);

			if (empty($brand_name)) {
				$msg = "<span class='success'> Feild Must not be empty!!</span>";
				return $msg;
			}else{
				$qu1 = "SELECT * FROM brand WHERE brand_name = '$brand_name'";
				$qu1_result = $this->db->select($qu1);
				if ($qu1_result) {
					echo "<script> window.location = 'brandlist.php'; </script>";
				}else{
					$up_que = "UPDATE brand 
								SET brand_name = '$brand_name'
								WHERE brand_id = '$id'";
					$up_que_result = $this->db->update($up_que);
					if ($up_que_result) {
						$msg = "<span class='success'> Brand Update Successfully!!</span>";
						return $msg;
					}else{
						$msg = "<span class='error'> Brand Not Updated!!</span>";
						return $msg;
					}
				}

			}
		}

		public function delbndbyid($id){
			$del_qu = "DELETE from brand where brand_id = '$id'";
			$del_result = $this->db->delete($del_qu);
			if ($del_result) {
				$msg = "<span class='success'> Brand Delete Successfully!!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'> Brand Not Deleted!!</span>";
				return $msg;
			}

		}




		public function getproductbyB($id){
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
					p.brand_id       = '$id'   
					ORDER BY p.pro_id DESC limit $start_from, $per_page ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getallproBNDbase($id){

			$query = "SELECT p.*, c.cat_name, b.brand_name from product as p, category as c, brand as b
					WHERE p.cat_id = c.cat_id and
					p.brand_id = b.brand_id and
					p.brand_id       = '$id'
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


	}

?>