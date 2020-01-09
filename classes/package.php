<?php
$realpath = realpath(dirname(__FILE__));
include_once ($realpath.'/../lib/database.php');
include_once ($realpath.'/../helpers/format.php');
//include_once ($realpath.'/../admin/sendMail.php');
?>
<?php
class Package{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function packageIns($data,$file){
        $pkg_name        = $this->fm->validation($data['pkg_name']);
        $plant_quantity  = $this->fm->validation($data['plant_quantity']);
        $Initial_cost    = $this->fm->validation($data['Initial_cost']);
        $monthly_cost    = $this->fm->validation($data['monthly_cost']);
        $yearly_cost     = $this->fm->validation($data['yearly_cost']);
        $pkg_service     = $this->fm->validation($data['pkg_service']);
        $pkg_description = $this->fm->validation($data['pkg_description']);
        $max_limit = $this->fm->validation($data['max_limit']);

        $pkg_name = mysqli_real_escape_string($this->db->link, $pkg_name);
        $plant_quantity   = mysqli_real_escape_string($this->db->link, $plant_quantity);
        $Initial_cost = mysqli_real_escape_string($this->db->link, $Initial_cost);
        $monthly_cost     = mysqli_real_escape_string($this->db->link, $monthly_cost);
        $yearly_cost    = mysqli_real_escape_string($this->db->link, $yearly_cost);
        $pkg_service     = mysqli_real_escape_string($this->db->link, $pkg_service);
        $pkg_description    = mysqli_real_escape_string($this->db->link, $pkg_description);
        $max_limit    = mysqli_real_escape_string($this->db->link, $max_limit);

        $permited    = array('jpg','png');
        $image_name  = $_FILES['image']['name'];
        $image_size  = $_FILES['image']['size'];
        $image_tmp   = $_FILES['image']['tmp_name'];

        $div         = explode('.', $image_name);
        $image_exten = strtolower(end($div));
        $image_uniq  = substr(md5(time()), 0, 10).'.'.$image_exten;
        $image_up    = "upload/".$image_uniq;

        if ($pkg_name == "") {
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
            $query = "INSERT INTO fixed_packages(pkg_name,plant_quantity,Initial_cost,monthly_cost,yearly_cost,pkg_service,pkg_description,max_plant,image)
  values('$pkg_name', '$plant_quantity','$Initial_cost','$monthly_cost','$yearly_cost','$pkg_service','$pkg_description',$max_limit,'$image_up')";
            $result = $this->db->insert($query);
            if ($result) {
                $msg = "<span class='success'> Package Insert Successfully!!</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Package Not Insert!!</span>";
                return $msg;
            }

        }
    }

    public function delpkgbyid($id){
        $delete_Package = "DELETE from fixed_packages where pkg_id = '$id'";
        $result = $this->db->delete($delete_Package);
        if ($result){
            $msg = "<span class='error'> Delete Package Successfully!!!.</span>";
            return $msg;
        }
    }

    public function getpackage(){
        $query = "SELECT * FROM fixed_packages";
        $result = $this->db->select($query);
        return $result;

    }

    public function getpackagebyId($id){
        $query = "SELECT * FROM fixed_packages WHERE pkg_id = $id";
        $result = $this->db->select($query);
        return $result;
    }


    public function updatePackage($data,$file,$id){
        $pkg_name        = $this->fm->validation($data['pkg_name']);
        $plant_quantity  = $this->fm->validation($data['plant_quantity']);
        $Initial_cost    = $this->fm->validation($data['Initial_cost']);
        $monthly_cost    = $this->fm->validation($data['monthly_cost']);
        $yearly_cost     = $this->fm->validation($data['yearly_cost']);
        $pkg_service     = $this->fm->validation($data['pkg_service']);
        $pkg_description = $this->fm->validation($data['pkg_description']);

        $pkg_name = mysqli_real_escape_string($this->db->link, $pkg_name);
        $plant_quantity   = mysqli_real_escape_string($this->db->link, $plant_quantity);
        $Initial_cost = mysqli_real_escape_string($this->db->link, $Initial_cost);
        $monthly_cost     = mysqli_real_escape_string($this->db->link, $monthly_cost);
        $yearly_cost    = mysqli_real_escape_string($this->db->link, $yearly_cost);
        $pkg_service     = mysqli_real_escape_string($this->db->link, $pkg_service);
        $pkg_description    = mysqli_real_escape_string($this->db->link, $pkg_description);

        $permited    = array('jpg','png');
        $image_name  = $_FILES['image']['name'];
        $image_size  = $_FILES['image']['size'];
        $image_tmp   = $_FILES['image']['tmp_name'];

        $div         = explode('.', $image_name);
        $image_exten = strtolower(end($div));
        $image_uniq  = substr(md5(time()), 0, 10).'.'.$image_exten;
        $image_up    = "upload/".$image_uniq;

        if ($pkg_name == "" ) {
            $msg = "<span class='error'> Feild Must Not be empty.</span>";
            return $msg;
        }else{
            if (!empty($filename)) {
                if ($image_size > 1048567) {
                    $msg = "<span class='error'> File size over 1 MB!!!.</span>";
                    return $msg;
                }elseif (in_array($permited, $image_exten)) {
                    $msg = "<span class='error'> You Must be upload;-".implode(',',$permited ).".</span>";
                    return $msg;
                }else{
                    move_uploaded_file($image_tmp, $image_up);
                    $query = "UPDATE fixed_packages
									SET
									pkg_name = '$pkg_name',
									plant_quantity = '$plant_quantity',
									Initial_cost = '$Initial_cost',
									monthly_cost = '$monthly_cost',
									yearly_cost = '$yearly_cost',
									pkg_service = '$pkg_service',
									pkg_description = '$pkg_description',
									image = '$image_up'
									WHERE pkg_id = $id";
                    $result = $this->db->update($query);
                    if ($result) {
                        $msg = "<span class='success'> Update Successfully!!</span>";
                        return $msg;
                    }else{
                        $msg = "<span class='error'>Package Not Updated!!</span>";
                        return $msg;
                    }
                }
            }else{
                $query = "UPDATE fixed_packages
									SET
									pkg_name = '$pkg_name',
									plant_quantity = '$plant_quantity',
									Initial_cost = '$Initial_cost',
									monthly_cost = '$monthly_cost',
									yearly_cost = '$yearly_cost',
									pkg_service = '$pkg_service',
									pkg_description = '$pkg_description'
									WHERE pkg_id = $id";
                $result = $this->db->update($query);
                if ($result) {
                    $msg = "<span class='success'> Update Successfully!!</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Package Not Updated!!</span>";
                    return $msg;
                }

            }

        }



    }

    public function get_single_package($id){
        $query = "SELECT * FROM fixed_packages WHERE pkg_id = '$id' ";
        $result = $this->db->select($query)->fetch_assoc();
        return $result;

    }

    public function booking_package($cus_id,$id,$data){
        $name     = $this->fm->validation($data['name']);
        $address  = $this->fm->validation($data['address']);
        $cname    = $this->fm->validation($data['cname']);
        $town     = $this->fm->validation($data['town']);
        $phone    = $this->fm->validation($data['phone']);
        $email    = $this->fm->validation($data['email']);
        $duration = $this->fm->validation($data['duration']);
        $name     =	mysqli_real_escape_string($this->db->link, $name);
        $address  =	mysqli_real_escape_string($this->db->link, $address);
        $cname    =	mysqli_real_escape_string($this->db->link, $cname);
        $town     =	mysqli_real_escape_string($this->db->link, $town);
        $phone    =	mysqli_real_escape_string($this->db->link, $phone);
        $email    =	mysqli_real_escape_string($this->db->link, $email);
        $duration =	mysqli_real_escape_string($this->db->link, $duration);

        if ($name == ""|| $cname == ""|| $address == ""|| $email == ""|| $phone == ""|| $town == ""|| $duration == "") {
            $msg = "<span class='success' > Field Must Not be empty.</span>";
            return $msg;
        }else{
            $select = "SELECT * FROM tbl_package_booking WHERE cus_id = $cus_id AND pkg_id = $id AND address ='$address' AND status = 'Pending'";
            $select_result = $this->db->select($select);
            $select = "SELECT * FROM tbl_package_booking WHERE cus_id = $cus_id AND pkg_id = $id AND address ='$address' AND status = 'Running'";
            $select_result2 = $this->db->select($select);
            if ($select_result){
                $msg = "Sir!! Same package Are Already Pending in same Address";
                return $msg;
            }elseif ($select_result2){
                $msg = "Sir!! Same package Are Already Running In Same Address";
                return $msg;
            }else{
                $insert_query = "INSERT INTO tbl_package_booking(pkg_id,cus_id,name,cname,address,town,phone,email,duration,status)
        values('$id','$cus_id','$name','$cname','$address','$town','$phone','$email',$duration,'Pending')";
                $result = $this->db->insert($insert_query);
                if ($result){
                    $msg = "Booking Request Successfully Done";
                    return $msg;
                }else{
                    $msg = "Some Error Create";
                    return $msg;
                }
            }

        }
    }



    public  function get_all_package(){
        $select = "SELECT * FROM tbl_package_booking as a,fixed_packages as b
        WHERE a.pkg_id = b.pkg_id AND a.status = 'Pending'";
        $select_result = $this->db->select($select);
        return $select_result;
    }
    public  function get_confirm_package(){
        $select = "SELECT * FROM tbl_package_booking as a,fixed_packages as b
        WHERE a.pkg_id = b.pkg_id AND a.status = 'confirm'";
        $select_result = $this->db->select($select);
        return $select_result;
    }
    public  function get_running_package(){
        $select = "SELECT *,DATEDIFF(a.endDate, CURDATE())
     AS remaining_days,DATEDIFF(a.end_reminder, CURDATE())
     AS remaining_reminder FROM tbl_package_booking as a,fixed_packages as b
        WHERE a.pkg_id = b.pkg_id AND a.status = 'running' AND CURDATE() BETWEEN a.startDate AND a.endDate";
        $result = $this->db->select($select);
        return $result;
    }

    public function get_renew_package(){
        $select = "SELECT *,DATEDIFF(a.endDate, CURDATE())
     AS remaining_days FROM tbl_package_booking as a,fixed_packages as b
        WHERE a.pkg_id = b.pkg_id AND a.status = 'renew' AND CURDATE() BETWEEN a.startDate AND a.endDate";
        $result = $this->db->select($select);
        return $result;

    }
    public function get_expire_package(){
        $select = "SELECT *,DATEDIFF(a.endDate, CURDATE())
     AS remaining_days FROM tbl_package_booking as a,fixed_packages as b
        WHERE a.pkg_id = b.pkg_id AND a.status = 'running' AND CURDATE() > a.endDate";
        $result = $this->db->select($select);
        return $result;
    }

    public function get_complete_package(){
        $select = "SELECT * FROM tbl_package_booking as a,fixed_packages as b
        WHERE a.pkg_id = b.pkg_id AND a.status = 'complete'";
        $select_result = $this->db->select($select);
        return $select_result;

    }

    public function getBookPackageComplete($cusid){
        $select = "SELECT * FROM tbl_package_booking as a,fixed_packages as b
        WHERE a.pkg_id = b.pkg_id AND a.status = 'complete' AND cus_id = $cusid";
        $select_result = $this->db->select($select);
        return $select_result;

    }

    public function renew_package_confirm($pbId){
        $update  ="UPDATE tbl_package_booking SET status = 'running' WHERE package_book_id = $pbId";
        $result  = $this->db->update($update);
        return $result;
    }

    public function startPackage($pbId,$duration){

        $dt1       = new DateTime();
        $startTime = $dt1->format("Y-m-d");
        $dt2       = new DateTime("+$duration month");
        $endTime   = $dt2->format("Y-m-d");

        $dt1       = new DateTime();
        $reminder_start = $dt1->format("Y-m-d");
        $dt2       = new DateTime("+15 days");
        $reminder_end   = $dt2->format("Y-m-d");

        $update  ="UPDATE tbl_package_booking 
      SET status = 'running',startDate ='$startTime',endDate = '$endTime', start_reminder = '$reminder_start',end_reminder = '$reminder_end'
      WHERE package_book_id = $pbId ";
        $result  = $this->db->update($update);
        return $result;


//        if ($result){
//            $dt1       = new DateTime();
//            $startTime = $dt1->format("Y-m-d");
//            $dt2       = new DateTime("+$duration month");
//            $endTime   = $dt2->format("Y-m-d");
//            $insert = "INSERT INTO tbl_package_booking(startDate,endDate) values('$startTime','$endTime')";
//            $insert_result  = $this->db->insert($insert);
//            if ($insert_result) {
//                $msg = '<div class="alert alert-success" role="alert">
//                                <strong>Well done!</strong>This Package Start Now!!.
//                            </div>';
//                return $msg;
//            }else{
//                $msg ='<div class="alert alert-warning" role="alert">
//                                <strong>Warning!</strong> Some problem create.
//                            </div>';
//                return $msg;
//            }
//        }

    }

    public function reminder_Package($pbId){

        $dt1       = new DateTime();
        $reminder_start = $dt1->format("Y-m-d");
        $dt2       = new DateTime("+15 days");
        $reminder_end   = $dt2->format("Y-m-d");

        $update  ="UPDATE tbl_package_booking 
      SET start_reminder = '$reminder_start',end_reminder = '$reminder_end'
      WHERE package_book_id = $pbId ";
        $result  = $this->db->update($update);
        return $result;


    }



    public  function confirm_package($id){
        $update ="UPDATE tbl_package_booking SET status = 'confirm' WHERE package_book_id = $id ";
        $result = $this->db->update($update);
        if ($result) {
            $msg = '<div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> You Package Confirm Successfully!!.
                            </div>';
            return $msg;
        }else{
            $msg ='<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Feild Must be Not empty.
                            </div>';
            return $msg;
        }

    }

    public function get_package_details($id){
        $select = "SELECT * FROM fixed_packages
        WHERE pkg_id = $id ";
        $select_result = $this->db->select($select);
        return $select_result;
    }

    public function get_package_address($id){
        $select = "SELECT * FROM tbl_package_booking
        WHERE package_book_id = $id ";
        $select_result = $this->db->select($select);
        return $select_result;
    }




    public  function add_plants($data,$file){
        $plant_name        = $this->fm->validation($data['plant_name']);
        $stock  = $this->fm->validation($data['stock']);
        $rate  = $this->fm->validation($data['rate']);

        $plant_name = mysqli_real_escape_string($this->db->link, $plant_name);
        $stock   = mysqli_real_escape_string($this->db->link, $stock);
        $rate   = mysqli_real_escape_string($this->db->link, $rate);

        $permission  = array('jpg','png','jpeg','gif');
        $image_name  = $file['image']['name'];
        $image_size  = $file['image']['size'];
        $image_tmp   = $file['image']['tmp_name'];

        $div         = explode('.', $image_name);
        $image_extention = strtolower(end($div));
        $image_uniq  = substr(md5(time()), 0, 10).'.'.$image_extention;
        $image_up    = "upload/".$image_uniq;

        if ($plant_name == "" || $stock == "" || $rate == "") {
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Feild Must be Not empty.
                            </div>';
            return $msg;
        }elseif ($image_size > 1048567) {
            $msg = "<span class='success'> image size too large.</span>";
            return $msg;
        }elseif (in_array($permission,$image_extention)) {
            $msg = "<span class='success'> You can only upload:-".implode(', ', $permission )."</span>";
            return $msg;
        }else{
            $check = "SELECT * FROM plants WHERE plant_name = '$plant_name'";
            $result = $this->db->select($check);
            if ($result){
                $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Plant Already Added!!.
                            </div>';
                return $msg;
            }else{
                move_uploaded_file($image_tmp, $image_up);
                $query = "INSERT INTO plants(plant_name,stock,image) values('$plant_name', '$stock','$image_up')";
                $result = $this->db->insert($query);
                if ($result) {
                    $msg = '<div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> You successfully Insert.
                            </div>';
                    return $msg;
                }else{
                    $msg = "<span class='error'>Tree Not Insert!!</span>";
                    return $msg;
                }
            }


        }

    }


    public function get_all_plants(){
        $select = "SELECT * FROM plants";
        $result = $this->db->select($select);
        return $result;
    }

    public function get_plant_by_id($id){
        $select = "SELECT * FROM plants WHERE plant_id = '$id'";
        $result = $this->db->select($select)->fetch_assoc();
        return $result;
    }

    public function update_plants($data,$file,$id){
        $plant_name   = $this->fm->validation($data['plant_name']);
        $stock  = $this->fm->validation($data['stock']);
        $rate  = $this->fm->validation($data['rate']);

        $plant_name = mysqli_real_escape_string($this->db->link, $plant_name);
        $stock   = mysqli_real_escape_string($this->db->link, $stock);
        $rate   = mysqli_real_escape_string($this->db->link, $rate);

        $permited    = array('jpg','png');
        $image_name  = $_FILES['image']['name'];
        $image_size  = $_FILES['image']['size'];
        $image_tmp   = $_FILES['image']['tmp_name'];

        $div         = explode('.', $image_name);
        $image_exten = strtolower(end($div));
        $image_uniq  = substr(md5(time()), 0, 10).'.'.$image_exten;
        $image_up    = "upload/".$image_uniq;

        if ($plant_name == "" || $stock == "" ) {
            $msg = '<div class="alert alert-warning" role="alert">
                    <strong>Warning!</strong> Some Problem Create.
                    </div>';
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
                    move_uploaded_file($image_tmp, $image_up);
                    $query = "UPDATE plants
									SET
									plant_name = '$plant_name',
									stock = '$stock',
									rate = '$rate',
									image = '$image_up'
									WHERE plant_id = $id";
                    $result = $this->db->update($query);
                    if ($result) {
                        $msg = '<div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> You successfully Updated.
                            </div>';
                        return $msg;
                    }else{
                        $msg ='<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Feild Must be Not empty.
                            </div>';
                        return $msg;
                    }
                }
            }else{
                $query = "UPDATE plants
									SET
									plant_name = '$plant_name',
									stock = '$stock'
									WHERE plant_id = $id";
                $result = $this->db->update($query);
                if ($result) {
                    $msg = '<div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> You successfully Updated.
                            </div>';
                    return $msg;

                }else{
                    $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Some Problem Create.
                            </div>';
                    return $msg;
                }

            }

        }
    }

    public function del_plant($id){
        $del_qu = "DELETE from plants where plant_id = '$id'";
        $del_result = $this->db->delete($del_qu);
        echo "<script>window:location='all_plants.php';</script>";
        if ($del_result) {
            $msg = '<div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> Successfully Deleted.
                    </div>';
            return $msg;
        }else{
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Some Problem Create.
                   </div>';
            return $msg;
        }
    }


    public function insert_plants($items){
        $total_quantity = 0;
        foreach ($items as $key => $value){
            $quantity =  $value['quantity'];
            $total_quantity +=$quantity;
            $package_id =  $value['package_id'];

        }
        if (isset($package_id)){
            $select = "SELECT * FROM fixed_packages WHERE pkg_id = $package_id";
            $s_result= $this->db->select($select)->fetch_assoc();
            $plant_quantity = $s_result['plant_quantity'];
            $max_plant = $s_result['max_plant'];

        }
        if (isset($package_id)){
            $select = "SELECT * FROM plants";
            $s_result= $this->db->select($select)->fetch_assoc();
            $stock_quantity = $s_result['stock'];

        }
        if (isset($package_id)){
            $select = "SELECT sum(quantity) as total_added_quantity FROM plants_package WHERE pkg_id = $package_id";
            $s_result= $this->db->select($select)->fetch_assoc();
            $r = $s_result['total_added_quantity'];

        }


        if (isset($plant_quantity) && $total_quantity + $r <= $plant_quantity){

                foreach ($items as $key => $value){
                    $quantity =  $value['quantity'];
                    $plant_id =  $value['plant_id'];
                    $package_id =  $value['package_id'];
                    $select = "SELECT * FROM plants_package WHERE pkg_id = $package_id AND plant_id = $plant_id ";
                    $s_result= $this->db->select($select);
                    $select = "SELECT * FROM plants WHERE plant_id = $plant_id";
                    $p_result= $this->db->select($select)->fetch_assoc();
                    $stock_quantity = $p_result['stock'];
                    $plant_name = $p_result['plant_name'];
                    if ($s_result){
                        $status = 'This Plant is Already Added. Plant ID is '.$plant_id;
                    }elseif($quantity < 1){
                        $status = "Sorry!! Number of value is not acceptable!!(0,-1)";
                    }elseif($quantity >$stock_quantity){
                        $status = "Sorry, Number of Plants is not available, Stock Now: (".$stock_quantity.") AND Plants Name: (".$plant_name.")";
                    }elseif($quantity >$max_plant){
                        $status = "Sorry, In this package your added max Limit: (".$max_plant.") each Plants";
                    }else{
                        $query = "INSERT INTO plants_package(plant_id,pkg_id,quantity)
                      values('$plant_id', '$package_id','$quantity')";
                        $result = $this->db->insert($query);
                        if ($result){
                            $up_stock = "UPDATE plants SET stock = stock - $quantity WHERE plant_id = $plant_id";
							$Stock_result = $this->db->update($up_stock);
                        }
                        if ($Stock_result){
                            $status = 'ok';
                        }

                    }
                }

        }else{
            $status = "Sorry, You have been selected plants over the max limit (".$plant_quantity.")";
        }
        return $status;
    }


//    =============================
    public function input_plants($items){
        $total_quantity = 0;
        foreach ($items as $key => $value){
            $quantity =  $value['quantity'];
            $total_quantity +=$quantity;
            $package_id =  $value['package_id'];
            $package_book_id =  $value['package_book_id'];

        }
        if (isset($package_id)){
            $select = "SELECT * FROM fixed_packages WHERE pkg_id = $package_id";
            $s_result= $this->db->select($select)->fetch_assoc();
            $plant_quantity = $s_result['plant_quantity'];
            $max_plant = $s_result['max_plant'];

        }
        if (isset($package_id)){
            $select = "SELECT * FROM plants";
            $s_result= $this->db->select($select)->fetch_assoc();
            $stock_quantity = $s_result['stock'];

        }
        if (isset($package_id) || isset($package_id)){
            $select = "SELECT sum(quantity) as total_added_quantity FROM plants_package WHERE pkg_id = $package_id AND pb_id = '$package_book_id'";
            $s_result= $this->db->select($select)->fetch_assoc();
            $r = $s_result['total_added_quantity'];

        }


        if (isset($plant_quantity) && $total_quantity + $r <= $plant_quantity){

            foreach ($items as $key => $value){
                $quantity   =  $value['quantity'];
                $plant_id   =  $value['plant_id'];
                $package_id =  $value['package_id'];
                $package_book_id      =  $value['package_book_id'];
                $cus_id     =  $value['cus_id'];
                $select     = "SELECT * FROM plants_package WHERE pkg_id = $package_id AND pb_id = $package_book_id AND plant_id = $plant_id ";
                $s_result   = $this->db->select($select);
                $select     = "SELECT * FROM plants WHERE plant_id = $plant_id";
                $p_result   = $this->db->select($select)->fetch_assoc();
                $stock_quantity = $p_result['stock'];
                $plant_name = $p_result['plant_name'];
                if ($s_result){
                    $status = 'This Plant is Already Added. Plant ID is '.$plant_id.'AND Plants Name: '.$plant_name;
                }elseif($quantity < 1){
                    $status = "Sorry!! Number of value is not acceptable!!(0,-1)";
                }elseif($quantity >$stock_quantity){
                    $status = "Sorry, Number of Plants is not available, Stock Now: (".$stock_quantity.") AND Plants Name: (".$plant_name.")";
                }elseif($quantity >$max_plant){
                    $status = "Sorry, In this package your added max Limit: (".$max_plant.") each Plants";
                }else{
                    $query = "INSERT INTO plants_package(plant_id,pkg_id,pb_id,cus_id,quantity)
                      values('$plant_id', '$package_id','$package_book_id','$cus_id','$quantity')";
                    $result = $this->db->insert($query);
                    if ($result){
                        $up_stock = "UPDATE plants SET stock = stock - $quantity WHERE plant_id = $plant_id";
                        $Stock_result = $this->db->update($up_stock);
                    }
                    if ($Stock_result){
                        $status = 'ok';
                    }

                }
            }

        }else{
            $status = "Sorry, You have been selected plants over the max limit (".$plant_quantity.")";
        }
        return $status;
    }




    public function get_plants_by_package($package_book_id,$pkg_id,$cus_id){
        $select = "SELECT * FROM fixed_packages as f,plants_package as p,plants as pl
        WHERE p.pkg_id = f.pkg_id AND p.plant_id = pl.plant_id AND p.pb_id = $package_book_id AND  p.pkg_id = $pkg_id AND p.cus_id =$cus_id ";
        $result= $this->db->select($select);
        return $result;
    }

    public function get_Total_plants($package_book_id,$pkg_id,$cus_id){
        $select = "SELECT sum(quantity) as total_added_quantity FROM plants_package WHERE pb_id = $package_book_id AND pkg_id = $pkg_id AND cus_id = $cus_id";
        $s_result= $this->db->select($select)->fetch_assoc();
        $r = $s_result['total_added_quantity'];
        return $r;
    }

    public function get_Total_plants_each($package_book_id){

        $select = "SELECT sum(quantity) as total_added_quantity FROM plants_package WHERE pb_id = $package_book_id ";
        $s_result= $this->db->select($select)->fetch_assoc();
        $r = $s_result['total_added_quantity'];
        return $r;
    }


    public function up_plant_quantity($quantity,$pkg_id,$pp_id,$plant_id,$package_book_id,$cus_id){
        if (isset($pp_id)){
            $select = "SELECT * FROM fixed_packages WHERE pkg_id = $pkg_id";
            $s_result= $this->db->select($select)->fetch_assoc();
            $plant_quantity = $s_result['plant_quantity'];
            $max_plant = $s_result['max_plant'];

        }
        if (isset($pp_id)){
            $select = "SELECT sum(quantity) as total_added_quantity, quantity  FROM plants_package WHERE pb_id = $package_book_id AND pkg_id = $pkg_id AND cus_id = $cus_id";
            $s_result= $this->db->select($select)->fetch_assoc();
            $total_added_quantity = $s_result['total_added_quantity'];
            $select = "SELECT * FROM plants_package WHERE pb_id = $package_book_id AND pkg_id = $pkg_id AND cus_id = $cus_id AND pp_id = $pp_id ";
            $s_result= $this->db->select($select)->fetch_assoc();
            $single_added_quantity = $s_result['quantity'];
            //return $single_added_quantity;
            $select = "SELECT * FROM plants WHERE plant_id =$plant_id";
            $s_result= $this->db->select($select)->fetch_assoc();
            $plant_stock = $s_result['stock'];

        }

        if ($quantity == ""){
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Field Must not be empty!!</div>';
            return $msg;
        }elseif ($quantity > $max_plant ){
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Maximum 10 plants add this package !!</div>';
            return $msg;
        }elseif ($quantity > $plant_stock ){
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Number of product is not available!!</div>';
            return $msg;
        }elseif (($quantity + ($total_added_quantity - $single_added_quantity)) > $plant_quantity ){
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Total Quantity cross package Limit '.$plant_quantity.' !!</div>';
            return $msg;
        }else {
            $up_stock = "UPDATE plants_package SET quantity = $quantity WHERE pp_id = $pp_id AND pkg_id = $pkg_id";
            $stock_result = $this->db->update($up_stock);
            //return $stock_result;
            if ($stock_result) {

                $up_stock = "UPDATE plants SET stock = (stock + $single_added_quantity) - $quantity WHERE plant_id = $plant_id";
                $p_stock_result = $this->db->update($up_stock);
                if ($p_stock_result){
                    $msg = ' <div class="alert alert-success" role="alert">
                    <strong>Well done!</strong> You Update successfully done.
                  </div>';
                    return $msg;
                }
            }else {
                $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Some Problem create.</div>';
                return $msg;
            }
        }
    }


    public function delete_plant($pp_id){
        $del_qu = "DELETE from plants_package where pp_id = '$pp_id'";
        $del_result = $this->db->delete($del_qu);
        if ($del_result) {
            $msg = '<div class="alert alert-success" role="alert">
                    <strong>Well done!</strong> You Delete successfully done.
                  </div>';
                    return $msg;
        }else{
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Some Problem create.</div>';
            return $msg;
        }
    }



    public function showPackagepage($cusid){
        $que    = "SELECT * FROM customepackage WHERE cus_id = '$cusid' ORDER BY `date` DESC ";
        $result = $this->db->select($que);
        return $result;

    }

    public function getBookPackage($cusid){
        $que    = "SELECT * FROM tbl_package_booking as a,fixed_packages as b WHERE a.pkg_id = b.pkg_id AND a.cus_id = $cusid AND a.status <> 'running' AND a.status <> 'complete' ORDER BY `date` DESC ";
        $result = $this->db->select($que);
        return $result;

    }
    public function getBookPackageRunning($cusid){
//        $que    = "SELECT * FROM tbl_package_booking as a,fixed_packages as b WHERE a.pkg_id = b.pkg_id AND a.cus_id = $cusid AND a.status = 'running' ORDER BY `date` DESC ";
//        $result = $this->db->select($que);
//        return $result;
        $select = "SELECT *,DATEDIFF(a.endDate, CURDATE())
     AS remaining_days FROM tbl_package_booking as a,fixed_packages as b
        WHERE a.pkg_id = b.pkg_id AND a.cus_id = $cusid AND a.status = 'running'";
        $result = $this->db->select($select);
        return $result;

    }

    public function getBookPackageDetails($cusid,$pb_id){
        $que    = "SELECT * FROM tbl_package_booking as a,fixed_packages as b WHERE a.pkg_id = b.pkg_id AND a.cus_id = '$cusid' AND b.pkg_id = $pb_id";
        $result = $this->db->select($que);
        return $result;
    }


//    public function endNotification(){
//        $from = 'gardennarsary@gmail.com';
//        $to = $email;
//        $subject = "Order Details";
//        $body ='';
//        send_mail($from, $to, $subject, $body);
//    }

    public function renew_package($duration,$pbId){

        $dt1       = new DateTime();
        $startTime = $dt1->format("Y-m-d");
        $dt2       = new DateTime("+$duration month");
        $endTime   = $dt2->format("Y-m-d");


        $dt1       = new DateTime();
        $reminder_start = $dt1->format("Y-m-d");
        $dt2       = new DateTime("+15 days");
        $reminder_end   = $dt2->format("Y-m-d");

        $update  ="UPDATE tbl_package_booking 
        SET status = 'running',startDate ='$startTime',endDate = '$endTime',start_reminder = '$reminder_start',end_reminder = '$reminder_end' 
        WHERE package_book_id = $pbId ";
        $result  = $this->db->update($update);
        return $result;

    }
    public function renew_package_customer($duration,$pbId){

        $dt1       = new DateTime();
        $startTime = $dt1->format("Y-m-d");
        $dt2       = new DateTime("+$duration month");
        $endTime   = $dt2->format("Y-m-d");
        $update  ="UPDATE tbl_package_booking SET status = 'renew',startDate ='$startTime',endDate = '$endTime' WHERE package_book_id = $pbId ";
        $result  = $this->db->update($update);
        return $result;

    }

    public function Complete_package($pbId,$pkg_id,$cus_id){
        $select = "SELECT * FROM plants_package where pb_id = '$pbId' AND pkg_id = $pkg_id AND cus_id = $cus_id";
        $result = $this->db->select($select);
        $is_success = false;
        if ($result){
            while ($row = $result->fetch_assoc()){
                $pp_id  = $row['pp_id'];
                $plant_id  = $row['plant_id'];
                $pbId   = $row['pb_id'];
                $pkg_id = $row['pkg_id'];
                $cus_id = $row['cus_id'];
                $quantity = $row['quantity'];
                $update = "UPDATE plants SET stock = stock + $quantity WHERE plant_id = $plant_id ";
                $update_result = $this->db->update($update);
                if ($update_result){
                    $delete_query = "DELETE FROM plants_package WHERE pp_id = $pp_id";
                    $delete_result = $this->db->delete($delete_query);
                }
                $is_success = true;

            }
        }
        if ($is_success == true){
            $update = "UPDATE tbl_package_booking SET status = 'complete',start_reminder = '0000-00-00',end_reminder = '0000-00-00' WHERE package_book_id = $pbId";
            $update_result = $this->db->update($update);
            return $update_result;
        }
    }


    public function cancel_package($pbId,$pkg_id,$cus_id){
        $select = "SELECT * FROM plants_package where pb_id = '$pbId' AND pkg_id = $pkg_id AND cus_id = $cus_id";
        $result = $this->db->select($select);
        $is_success = false;
        if ($result){
            while ($row = $result->fetch_assoc()){
                $pp_id  = $row['pp_id'];
                $plant_id  = $row['plant_id'];
                $pbId   = $row['pb_id'];
                $pkg_id = $row['pkg_id'];
                $cus_id = $row['cus_id'];
                $quantity = $row['quantity'];
                $update = "UPDATE plants SET stock = stock + $quantity WHERE plant_id = $plant_id ";
                $update_result = $this->db->update($update);
                if ($update_result){
                    $delete_query = "DELETE FROM plants_package WHERE pp_id = $pp_id";
                    $delete_result = $this->db->delete($delete_query);
                }
                $is_success = true;

            }
        }
        if ($is_success == true){
            $update = "UPDATE tbl_package_booking SET status = 'complete' WHERE package_book_id = $pbId";
            $update_result = $this->db->update($update);
            return $update_result;
        }
    }




    public function get_top_rental_package(){
        $queryTopSell = "SELECT * from fixed_packages as p,
			(SELECT p.pkg_id, count(*) AS total_quantity 
			FROM tbl_package_booking AS pb,fixed_packages AS p WHERE p.pkg_id = pb.pkg_id AND pb.status = 'complete'
			 GROUP BY pb.pkg_id) AS ts 
			 WHERE ts.pkg_id = p.pkg_id";
        $result = $this->db->select($queryTopSell);
        return $result;
    }

    public function get_total_year_rent_product(){
        $query_Yearly_Sell = "SELECT EXTRACT(YEAR FROM oi.endDate) AS year, 
              count(oi.pkg_id) AS total_quantity
			  FROM tbl_package_booking AS oi,fixed_packages as p WHERE p.pkg_id = oi.pkg_id 
			  AND oi.status = 'complete' 
			  GROUP BY year ORDER BY year DESC";
        $result = $this->db->select($query_Yearly_Sell);
        return $result;
    }

    public function get_total_month_rent_product(){
        $query_Yearly_Sell = "SELECT EXTRACT(YEAR FROM oi.endDate) AS year, MONTHNAME(oi.endDate) AS month,
 			  MONTH(oi.endDate) AS month_no, 
              count(oi.pkg_id) AS total_quantity
			  FROM tbl_package_booking AS oi,fixed_packages as p WHERE p.pkg_id = oi.pkg_id 
			  AND oi.status = 'complete' 
			  GROUP BY year, month_no ORDER BY year DESC";
        $result = $this->db->select($query_Yearly_Sell);
        return $result;
    }


    public function get_unsold_packages(){
        $query_unsold = "SELECT * FROM fixed_packages WHERE fixed_packages.pkg_id  
    		NOT IN(SELECT tbl_package_booking.pkg_id FROM tbl_package_booking GROUP BY tbl_package_booking.pkg_id)";
        $result = $this->db->select($query_unsold);
        return $result;
    }

}


?>