<?php
	$realpath = realpath(dirname(__FILE__));
	include_once ($realpath.'/../lib/database.php');
	include_once ($realpath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */
	class Customer{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();			
		}

		public function customerReg($data,$file){
			$fname = $this->fm->validation($data['fname']);
			$lname   = $this->fm->validation($data['lname']);
			$cname = $this->fm->validation($data['cname']);
			$address     = $this->fm->validation($data['address']);
			$postcode    = $this->fm->validation($data['postcode']);
			$town     = $this->fm->validation($data['town']);
			$phone     = $this->fm->validation($data['phone']);
			$dob     = $this->fm->validation($data['dob']);
			$email     = $this->fm->validation($data['email']);
			$password     = $this->fm->validation($data['password']);
			$checkbox     = $this->fm->validation($data['checkbox']);


			$fname = mysqli_real_escape_string($this->db->link, $fname);
			$lname   = mysqli_real_escape_string($this->db->link, $lname);
			$cname = mysqli_real_escape_string($this->db->link, $cname);
			$address     = mysqli_real_escape_string($this->db->link, $address);
			$postcode    = mysqli_real_escape_string($this->db->link, $postcode);
			$town     = mysqli_real_escape_string($this->db->link, $town);
			$phone     = mysqli_real_escape_string($this->db->link, $phone);
			$dob     = mysqli_real_escape_string($this->db->link, $dob);
			$email     = mysqli_real_escape_string($this->db->link, $email);
			$password     = mysqli_real_escape_string($this->db->link, $password);
            $checkbox     = mysqli_real_escape_string($this->db->link, $checkbox);

			$permited    = array('jpg','png');
			$image_name  = $_FILES['image']['name'];
			$image_size  = $_FILES['image']['size'];
			$image_tmp   = $_FILES['image']['tmp_name'];
 
			$div         = explode('.', $image_name);
			$image_exten = strtolower(end($div));
			$image_uniq  = substr(md5(time()), 0, 10).'.'.$image_exten;
			$image_up    = "upload/".$image_uniq;

			$cheq = "SELECT * FROM customer WHERE email = '$email' ";
			$cheresult = $this->db->select($cheq);
			if ($cheresult) {
				$msg = "<span class='success'> Email address already exits!!</span>";
				return $msg;
			}else{

				if ($fname == ""|| $cname == ""|| $lname == ""|| $address == ""|| $email == ""|| $password == "" ) {
					$msg = "<span class='success'> Feild Must Not be empty.</span>";
					return $msg;
				}elseif ($checkbox == "") {
                    $msg = "<span class='success'> Trams And Condition Must be Needed.</span>";
                    return $msg;
                }elseif ($image_size > 1048567) {
					$msg = "<span class='success'> image size too large.</span>";
					return $msg;
				}elseif (in_array($image_exten,$permited) === False) {
					$msg = "<span class='success'> You can only upload:-".implode(', ', $permited )."</span>";
					return $msg;
				}else{
					move_uploaded_file($image_tmp, $image_up);
					$query = "INSERT INTO customer(fname,lname,cname,address,postcode,town,phone,dob,email,password,status,image) values('$fname', '$lname','$cname','$address','$postcode','$town','$phone','$dob','$email','$password',0,'$image_up')";
					$result = $this->db->insert($query);
					if ($result) {
						$msg = "<span class='success'> Signup Successfully!!</span>";
						return $msg;
					}else{
						$msg = "<span class='error'>Create Some problem!!</span>";
						return $msg;
					}

				}

			}
		}


		public function customerlog($data){
			$email     = $this->fm->validation($data['email']);
			$password     = $this->fm->validation($data['password']);
			$email     = mysqli_real_escape_string($this->db->link, $email);
			$password     = mysqli_real_escape_string($this->db->link, $password);

			if (empty($email) || empty($password)) {
				$msg = "<span class='success'> Feild Must Not be empty.</span>";
					return $msg;
			}

			$query = "SELECT * FROM customer WHERE email ='$email' AND password = '$password'";
			$result = $this->db->select($query);
			if ($result == true) {
				$value = $result->fetch_assoc();
				Session::set("cuslog", true);
				Session::set("cusid", $value['cus_id']);
				Session::set("fname", $value['fname']);
				Session::set("image", $value['image']);
				Session::set("email", $value['email']);

				echo "<script>window.location = 'index.php ';</script>";
			}else{
				$msg = "<span class='error'>Email not register..!!!!!</span>";
					return $msg;
			}

		}

		public function getcustomarEmail($cus_id){
			$query = "SELECT * FROM customer WHERE cus_id ='$cus_id'";
			$result = $this->db->select($query);
			return $result;
		}



		public function profilecreate($id){

			$que    = "SELECT * FROM customer WHERE cus_id = '$id' ";
			$result = $this->db->select($que);
			return $result;
		}


		public function updprofile($data,$file,$cus_id){
			$fname = $this->fm->validation($data['fname']);
			$lname   = $this->fm->validation($data['lname']);
			$cname = $this->fm->validation($data['cname']);
			$address     = $this->fm->validation($data['address']);
			$postcode    = $this->fm->validation($data['postcode']);
			$town     = $this->fm->validation($data['town']);
			$phone     = $this->fm->validation($data['phone']);
			$dob     = $this->fm->validation($data['dob']);
			$email     = $this->fm->validation($data['email']);


			$fname = mysqli_real_escape_string($this->db->link, $fname);
			$lname   = mysqli_real_escape_string($this->db->link, $lname);
			$cname = mysqli_real_escape_string($this->db->link, $cname);
			$address     = mysqli_real_escape_string($this->db->link, $address);
			$postcode    = mysqli_real_escape_string($this->db->link, $postcode);
			$town     = mysqli_real_escape_string($this->db->link, $town);
			$phone     = mysqli_real_escape_string($this->db->link, $phone);
			$dob     = mysqli_real_escape_string($this->db->link, $dob);
			$email     = mysqli_real_escape_string($this->db->link, $email);

			$permited    = array('jpg','png');
			$image_name  = $_FILES['image']['name'];
			$image_size  = $_FILES['image']['size'];
			$image_tmp   = $_FILES['image']['tmp_name'];
 
			$div         = explode('.', $image_name);
			$image_exten = strtolower(end($div));
			$image_uniq  = substr(md5(time()), 0, 10).'.'.$image_exten;
			$image_up    = "upload/".$image_uniq;
			$image_ups    = "admin/upload/".$image_uniq;

			if ($fname == "" || $lname == "" || $cname == ""|| $address =="" || $postcode == "" ||$town == "" || $phone == "" || $email == "" ) {
				$msg = "<span class='error'> Feild Must Not be empty.</span>";
				return $msg;
			}else{
				if (!empty($image_name)) {
					if ($image_size > 1048567) {
					$msg = "<span class='error'> File size over 1 MB!!!.</span>";
					return $msg;
					}elseif (in_array($permited, $image_exten)) {
						$msg = "<span class='error'> You Must be upload;-".implode(',',$permited ).".</span>";
						return $msg;
					}else{
						move_uploaded_file($image_tmp, $image_ups);
						$query = "UPDATE customer
									SET
									fname = '$fname',
									lname = '$lname',
									cname = '$cname',
									address = '$address',
									postcode = '$postcode',
									town = '$town',
									phone = '$phone',
									dob = '$dob',
									email = '$email',
									image = '$image_up'
									WHERE cus_id = '$cus_id'";
						$result = $this->db->update($query);
						if ($result) {
							$msg = "<span class='success'> Update Successfully!!</span>";
							return $msg;
						}else{
							$msg = "<span class='error'>Profile Not Updated!!</span>";
							return $msg;
						}
					}
				}else{
					$query = "UPDATE customer
									SET
									fname = '$fname',
									lname = '$lname',
									cname = '$cname',
									address = '$address',
									postcode = '$postcode',
									town = '$town',
									phone = '$phone',
									dob = '$dob',
									email = '$email'
									WHERE cus_id = '$cus_id'";
						$result = $this->db->update($query);
						if ($result) {
							$msg = "<span class='success'> Update Successfully!!</span>";
							return $msg;
						}else{
							$msg = "<span class='error'>Profile Not Updated!!</span>";
							return $msg;
						}

				}
				
			}


		}


		public function createchat($msg){
			session_start();
			$cusid = $_SESSION['cusid'];
			$query = "INSERT INTO chatting(Msg,Msg_By,Msg_To,Owner,status) values('$msg', $cusid,1, 'Customer','unread')";
			$result = $this->db->insert($query);
			// $select = "SELECT * from chat ORDER BY chat_id DESC ";
			// $result = $this->db->select($select);
			// if ($result) {
			// 	while ($row = $result->fetch_assoc()) {
			// 		echo $row['msg']."<br>";
			// 	}
			// }

		}

		public function admincreatechat($msg,$cus_id){
			$query = "INSERT INTO chatting(Msg,Msg_By,Msg_To,Owner,status) values('$msg','$cus_id',1, 'Admin','unread')";
			$result = $this->db->insert($query);
			}

		public function getchat(){
			session_start();
			$cusid = $_SESSION['cusid'];
			$select = "SELECT * from chatting,customer
			 WHERE chatting.Msg_By = customer.cus_id AND
			  Msg_By = '$cusid' ORDER BY Added_At ASC";
			$result = $this->db->select($select);
			// if ($result) {
			// 	while ($row = $result->fetch_assoc()) {
			// 		echo $row['msg']."<br>";
			// 	}
			// }
			if ($result) {
				$output = '';
                while ($row = $result->fetch_assoc()) {
                	
                    if ($row['Owner'] == 'Admin') {
                    	$output.='
                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont">
                                <img src="img/admin.png" class="rounded-circle user_img">
                            </div>
                            <div class="msg_cotainer_send get_msg" name="chatlogs" id="demo">
                                '.$row['Msg'].'
                                <br><span class="msg_time">'.$row['Added_At'].'</span>
                            </div>
                        </div>';
                    }else if($row['Owner'] == 'Customer'){
                    	$output.='
                        <div class="d-flex justify-content-end mb-4">
                            <div class="msg_cotainer_send get_msg" id="chatlogs">
                              '.$row['Msg'].'
                                <span class="msg_time">'.$row['Added_At'].'</span>
                            </div>
                            <div class="img_cont">
                            <img src="admin/'.$row['image'].'" class="rounded-circle user_img">                               
                            </div>
                        </div>';          
                    }
                }
                echo $output;
            }

		}



		public function admingetchat($cus_id){
			// session_start();
			// $cusid = $_SESSION['cusid'];
			$select = "SELECT * from chatting,customer
			 WHERE chatting.Msg_By = customer.cus_id AND
			  Msg_By = '$cus_id' ORDER BY Added_At ASC";
			$result = $this->db->select($select);
			// if ($result) {
			// 	while ($row = $result->fetch_assoc()) {
			// 		echo $row['msg']."<br>";
			// 	}
			// }
			if ($result) {
				$output = '';
                while ($row = $result->fetch_assoc()) {
                	
                    if ($row['Owner'] == 'Admin') {
                    	$output.='
                    	<div class="container" class="col-md-3" style="border: 2px solid #bf8787;background-color: border-radius: 3px; padding: 10px;margin: 10px 0; width: 95%;">
                          <img class="rounded-circle user_img" style="float: left; max-width: 50px;width: 100%;margin-right: 20px;border-radius: 50%;" src="img/admin.png" alt="Avatar">
                          <p id="adminchatlogs" style="margin-left:5px;">'.$row['Msg'].'</p>
                          <span class="time-right" style="float: right;color: #aaa;">'.$row['Added_At'].'</span>
                        </div>

                    	';
                    }else if($row['Owner'] == 'Customer'){
                    	$output.='
                       
                    	<div class="container darker" style="border: 2px solid #bf8787;background-color: border-radius: 3px; padding: 10px;margin: 10px 0;width: 95%;">
                          <img class="img-circle m-b" style="float: right;height:50px;margin-right: 20px;border-radius: 50%;width:50px" src="'.$row['image'].'" alt="Avatar">
                          <p id="chatlogs" style="float: right; margin-right:5px;">'.$row['Msg'].'</p>
                          <span class="time-left" style="float: left;color: #999;">'.$row['Added_At'].'</span>
                        </div>


                       ';          
                    }
                }
                echo $output;
            }

		}












		public function getchatadmin(){
			session_start();
			$cusid = $_SESSION['cusid'];
			$select = "SELECT * from chat WHERE cus_id = '$cusid' AND adid = 0 ORDER BY 'date' ASC ";
			$result = $this->db->select($select);
			if ($result) {
				while ($row = $result->fetch_assoc()) {
					echo $row['email']."  :  ".$row['msg']."<br>";
				}
			}
		}


		public function getchatbyDate(){
			$cusid = $_SESSION['cusid'];
			$select = "SELECT * from chat WHERE cus_id = '$cusid' AND adid = 1 ORDER BY 'date' DESC ";
			$result = $this->db->select($select);
			return $result;
		}

		public function getAllChat(){
			$select = "SELECT c.*,cu.* FROM chatting as c, customer as cu 
			WHERE c.Msg_By = cu.cus_id GROUP BY cu.cus_id
			ORDER BY c.Added_At DESC ";
			$result = $this->db->select($select);
			return $result;
		}

		

	}


?>