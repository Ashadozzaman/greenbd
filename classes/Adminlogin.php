<?php
	$realpath = realpath(dirname(__FILE__));
	include ($realpath.'/../lib/Session.php');
	Session::checkLogin();
	include ($realpath.'/../lib/database.php');
	include ($realpath.'/../helpers/format.php');

?>
<?php
/**
 * class adminlogin 
 */
class Adminlogin {
	private $db;
	private  $fm;
	public function __construct(){
		$this->db =	new Database();
		$this->fm = new Format(); 
		
	}

	public function adminlogin($ademail,$adpass){
		$ademail = $this->fm->validation($ademail);
		$adpass  = $this->fm->validation($adpass);

		$ademail = mysqli_real_escape_string($this->db->link, $ademail);
		$adpass = mysqli_real_escape_string($this->db->link, $adpass);

		if (empty($ademail) || empty($adpass)) {
			$msg = "Feild must not be Empty !!";
			return  $msg;
			
		}else{
			$query  = "SELECT * FROM admin WHERE ademail = '$ademail' AND adpass = '$adpass'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value	=	$result->fetch_assoc();				
				Session::set("adminlogin", true);
				Session::set("adid", $value['adid']);
				Session::set("adname", $value['adname']);
				Session::set("aduser", $value['aduser']);
				header("location:index.php");
			}else{
				$msg = "Email or password not match!!";
				return  $msg;
			}

		}

	}
}
?>