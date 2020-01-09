<?php
	$realpath = realpath(dirname(__FILE__));
	include_once ($realpath.'/../lib/database.php');
	include_once ($realpath.'/../helpers/format.php');
?>
<?php
	class Category{
		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format(); 
		}
		public function catadd($cat_name){
			$cat_name = $this->fm->validation($cat_name);
			$cat_name = mysqli_real_escape_string($this->db->link, $cat_name);

			if (empty($cat_name)) {
                $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Well Done!</strong> Feild Must Not be empty.</div>';
                return $msg;
			}else{
				$select = "SELECT * FROM category WHERE cat_name = '$cat_name'";
				$sql_result = $result = $this->db->insert($select);
				if ($sql_result){
                    $msg = '<div class="alert alert-success" role="alert">
                                <strong>Sorry!</strong> Category Already Added!!.</div>';
                    return $msg;
				}else{
                    $query = "INSERT INTO category(cat_name) values('$cat_name')";
                    $result = $this->db->insert($query);
                    if ($result) {
                        $msg = "<span class='success'> Category Insert Successfully!!</span>";
                        return $msg;
                    }else{
                        $msg = "<span class='error'> Category Not Insert!!</span>";
                        return $msg;
                    }

				}

			}
		}



		public function getcategory(){
			$query = "SELECT * FROM category ORDER BY cat_id DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function getcatbyid($id){
			$query = "SELECT * FROM Category where cat_id ='$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function catup($cat_name, $id){
			$cat_name = $this->fm->validation($cat_name);

			$cat_name = mysqli_real_escape_string($this->db->link, $cat_name);
			$cat_id = mysqli_real_escape_string($this->db->link, $cat_id);

			if (empty($cat_name)) {
				$msg = "Feild must not be empty";
				return $msg;
			}else{
				$up_query = "UPDATE category SET cat_name = '$cat_name' where cat_id = '$id' ";
				$up_result = $this->db->update($up_query);
				if ($up_result) {
					$msg = "<span class='success'>Update Successfully!!</span>";
					return $msg;
				}else{
					$msg = "<span class='error'> Category Not Updated!!</span>";
					return $msg;
				}
			}

		}

		public function delcatbyid($id){
			$query = "DELETE FROM category WHERE cat_id = '$id'";
			$result = $this->db->delete($query);
			if ($result) {
				$msg = "<span class='success'>Delete Successfully!!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'> Category Not Deleted!!</span>";
				return $msg;
			}
		}
	}


?>