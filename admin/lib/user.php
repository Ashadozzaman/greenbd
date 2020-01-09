<?php
	include 'database.php';
	class User{
		private $db;
		function __construct(){
			$this->db = new Database();
		}

		public function userRegistation($data){
			$name = $data['name'];
			$username = $data['username'];
			$email = $data['email'];
			$password = md5($data['password']);

			$checkEm = $this->checkEmail($email);


			if ($name == "" OR $username == "" OR $email == "" OR $password == ""  ) {
				$message = "<div class='alert alert-denger'><strong>Error!</strong>Field must be not empty </div>";
				return $message;
			}
			if (strlen($username) < 3 ) {
				$message = "<div class='alert alert-denger'><strong>Error!</strong>User name is too short </div>";
				return $message;
			}elseif (preg_match('/^a-z0-9_-/i', $username)) {
				$message = "<div class='alert alert-denger'><strong>Error!</strong>User name Must be valied </div>";
				return $message;
			}	

			if (filter_var($email, FILTER_VALIDATED_EMAIL) === FALSE ) {
			$message = "<div class='alert alert-denger'><strong>Error!</strong>This email is not valid! </div>";
				return $message;
			}	

			if ($checkEm == true) {
			$message = "<div class='alert alert-denger'><strong>Error!</strong>This email Already exists </div>";
				return $message;
			}

			$sql = "INSERT INTO user(name, username, email,password) values(:name, :username, :email, :password)";
				$query = $this->db->pdo->prepare($sql);
				$query->bindValue(':name', $name);
				$query->bindValue(':username', $username);
				$query->bindValue(':email', $email);
				$query->bindValue(':password', $password);
				$result = $query->execute();

			if ($result) {
				$message = "<div class='alert alert-success'><strong>Success!</strong> Register Success</div>";
				return $message;
			}else{
				$message = "<div class='alert alert-denger'><strong>Error!</strong>There has been problem</div>";
				return $message;
			}

		}

		public function checkEmail($email){
			$sql = "SELECT 'email' from user where email = :email";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email', $email);
			$query->execute();
			if ($query->rowCount()>0) {
				return true;
			}else{
				return false;
			}
	}
}
?>