<?php
$realpath = realpath(dirname(__FILE__));
include_once ($realpath.'/../lib/database.php');
include_once ($realpath.'/../helpers/format.php');
//include_once ($realpath.'/../admin/sendMail.php');
?>
<?php
class PackageCart{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAllPlantsWithPagination(){
        $per_page = 8;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }else{
            $page = 1;
        }
        $ses_id   = session_id();
        $start_from = ($page-1) * $per_page;
        $select = "SELECT * FROM plants AS p 
WHERE p.plant_id NOT IN (SELECT pc.plant_id FROM package_cart AS pc WHERE pc.ses_id = '$ses_id') ORDER BY p.plant_id DESC limit $start_from, $per_page ";
        $result = $this->db->select($select);
        return $result;
    }
    public function getAllPlants(){
        $select = "SELECT * FROM plants";
        $result = $this->db->select($select);
        return $result;
    }

    public function cartadd($quantity,$plant_id,$duration){
        $quantity = $this->fm->validation($quantity);
        $duration = $this->fm->validation($duration);
        $plant_id = $this->fm->validation($plant_id);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $duration = mysqli_real_escape_string($this->db->link, $duration);
        $plant_id   = mysqli_real_escape_string($this->db->link, $plant_id);
        $ses_id   = session_id();
        $query    = "SELECT * FROM plants WHERE plant_id = '$plant_id'";
        $result   = $this->db->select($query)->fetch_assoc();
        $plant_name = $result['plant_name'];
        $image    = $result['image'];
        $price    = $result['rate'];

        if ($quantity == "" || $duration == ""){
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Field Must Not be Empty.</div>';
            return $msg;

        }else{
            $que    = "SELECT * FROM package_cart WHERE ses_id = '$ses_id' ";
            $ssresult   = $this->db->select($que);
            if ($ssresult){
                $row = $ssresult->fetch_assoc();
                $due     = $row['duration'];
            }

            if (!$ssresult){
                $chQ      = "SELECT * from package_cart where plant_id = '$plant_id' and ses_id ='$ses_id' ";
                $result   = $this->db->select($chQ);
                if ($result) {
                    $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Product already add to cart.</div>';
                    return $msg;
                }else{

                    $query    = "SELECT * FROM plants WHERE plant_id = '$plant_id'";
                    $sresult   = $this->db->select($query)->fetch_assoc();
                    $stk      = $sresult['stock'];

                    if ($stk < $quantity) {
                        $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Number of Product is not available.</div>';
                        return $msg;
                    }elseif ($quantity > 100){
                        $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Sorry sir choose plants less then 100.</div>';
                        return $msg;
                    }else{

                        $query = "INSERT INTO package_cart(ses_id,plant_id,plant_name,price,quantity,duration,image) values('$ses_id','$plant_id','$plant_name','$price','$quantity','$duration','$image')";
                        $result = $this->db->insert($query);
                        if ($result) {
                            $msg = ' <div class="alert alert-success" role="alert">
                    <strong>Well done!</strong> You Plant Add To Cart successfully.
                  </div>';
                            return $msg;
                        }
                    }
                }
            }else{
                if ($due == $duration){
                    $chQ      = "SELECT * from package_cart where plant_id = '$plant_id' and ses_id ='$ses_id' ";
                    $result   = $this->db->select($chQ);
                    if ($result) {
                        $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Product already add to cart.</div>';
                        return $msg;
                    }else{

                        $query    = "SELECT * FROM plants WHERE plant_id = '$plant_id'";
                        $sresult   = $this->db->select($query)->fetch_assoc();
                        $stk      = $sresult['stock'];

                        if ($stk < $quantity) {
                            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Number of Product is not available.</div>';
                            return $msg;
                        }elseif ($quantity > 100){
                            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Sorry sir choose plants less then 100.</div>';
                            return $msg;
                        }else{

                            $query = "INSERT INTO package_cart(ses_id,plant_id,plant_name,price,quantity,duration,image) values('$ses_id','$plant_id','$plant_name','$price','$quantity','$duration','$image')";
                            $result = $this->db->insert($query);
                            if ($result) {
                                $msg = ' <div class="alert alert-success" role="alert">
                    <strong>Well done!</strong> You Plant Add To Cart successfully.
                  </div>';
                                return $msg;
                            }
                        }
                    }
                }else{
                    $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Duration Days Must be Same!!</strong>  If you Change duration Please Update Cart First. .</div>';
                    return $msg;

                }

            }



        }


    }


    public function showCart(){
        $ses_id   = session_id();
        $que    = "SELECT * FROM package_cart WHERE ses_id = '$ses_id' ";
        $result = $this->db->select($que);
        return $result;
    }

    public function getDuration(){
        $ses_id   = session_id();
        $que    = "SELECT * FROM package_cart WHERE ses_id = '$ses_id' ";
        $result = $this->db->select($que);
        if ($result){
            while ($row = $result->fetch_assoc()){
                $r = $row['duration'];
                return $r;
            }
        }
    }

    public function getPlants(){
        $ses_id   = session_id();
        $que    = "SELECT * FROM package_cart WHERE ses_id = '$ses_id' ";
        $result = $this->db->select($que);
        return $result;
    }

    public function plant_del($id){
        $query = "DELETE FROM package_cart WHERE pkg_cart_id = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            echo "<script> window:location = 'packageCartPage.php';</script>";
        }else{
            $msg = "<span class='error'> Product Not Deleted!!</span>";
            return $msg;
        }

    }

    public function cartUpdate($quantity,$pkg_cart_id,$plant_id){
        $quantity = $this->fm->validation($quantity);
        $pkg_cart_id  =	mysqli_real_escape_string($this->db->link, $pkg_cart_id);
        $plant_id   =	mysqli_real_escape_string($this->db->link, $plant_id);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);

        $query    = "SELECT * FROM plants WHERE $plant_id = '$plant_id'";
        $sresult   = $this->db->select($query)->fetch_assoc();
        $stk      = $sresult['stock'];

        if ($stk < $quantity) {
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Number of Product is not available.</div>';
            return $msg;
        }elseif ($quantity > 100){
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Sorry sir choose plants less then 100.</div>';
            return $msg;
        }else{

            $query        = "UPDATE package_cart
									SET quantity  ='$quantity'
									WHERE pkg_cart_id ='$pkg_cart_id'
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



    public function cartUpdateDuration($duration){
        $ses_id   = session_id();
        $duration = $this->fm->validation($duration);
        $duration = mysqli_real_escape_string($this->db->link, $duration);

        if ($duration == "") {
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Field Must Not Be Empty.</div>';
            return $msg;
        }else{

            $query        = "UPDATE package_cart
									SET duration  ='$duration'
									WHERE ses_id ='$ses_id'
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

    public function cartdel(){
        $ses_id   = session_id();
        $query = "DELETE FROM package_cart WHERE ses_id = '$ses_id'";
        $result = $this->db->delete($query);
    }


    public function PackageOrder($cusid,$data){
        $ses_id   = session_id();
        $name    = $this->fm->validation($data['name']);
        $address  = $this->fm->validation($data['address']);
        $cname    = $this->fm->validation($data['cname']);
        $town     = $this->fm->validation($data['town']);
        $phone    = $this->fm->validation($data['phone']);
        $postcode = $this->fm->validation($data['postcode']);
        $email    = $this->fm->validation($data['email']);
        $name    =	mysqli_real_escape_string($this->db->link, $name);
        $address  =	mysqli_real_escape_string($this->db->link, $address);
        $cname    =	mysqli_real_escape_string($this->db->link, $cname);
        $town     =	mysqli_real_escape_string($this->db->link, $town);
        $phone    =	mysqli_real_escape_string($this->db->link, $phone);
        $postcode =	mysqli_real_escape_string($this->db->link, $postcode);
        $email    =	mysqli_real_escape_string($this->db->link, $email);

        $query    = "SELECT * FROM package_cart WHERE ses_id = '$ses_id' ";
        $getpro   = $this->db->select($query);
        if ($getpro) {

            $total_price = 0;
            $sub_total_price = 0;
            $total_quantity = 0;
            while ($result=$getpro->fetch_assoc()) {
                $price = $result['price'];
                $quantity = $result['quantity'];
                $duration = $result['duration'];
                $total_price= ($result['price'] * $quantity)*$duration;
                $vat = $total_price *.02;
                $sub_total_price = $sub_total_price + $total_price;
                $total=$sub_total_price+$vat+100;
                $total_quantity= $total_quantity + $result['quantity'];

            }

        }
        $is_success=False;
        if ($name == ""|| $cname == ""|| $address == ""|| $postcode == ""|| $email == ""|| $phone == ""|| $town == "") {
            $msg = '<div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> Field Must Not Be Empty.</div>';
            return $msg;
        }else{
            $cus_pkg_id = uniqid();
            $insquery = "INSERT INTO customepackage(cus_pkg_id,cus_id,name,cname,address,postcode,town,phone,email,duration,total_price,status) values('$cus_pkg_id','$cusid','$name','$cname','$address','$postcode','$town','$phone','$email','$duration','$total','Pending')";
            $result = $this->db->insert($insquery);

            if ($result) {
                $query    = "SELECT * FROM package_cart WHERE ses_id = '$ses_id' ";
                $getpro   = $this->db->select($query);

                if ($getpro) {
                    while ($result = $getpro->fetch_assoc()) {
                        $plant_id   = $result['plant_id'];
                        $plant_name = $result['plant_name'];
                        $quantity = $result['quantity'];
                        $duration = $result['duration'];
                        $price    = $result['price']  ;
                        $total_price    = ($result['price'] * $quantity)*$duration ;
                        $image    = $result['image'];
                        $insquery = "INSERT INTO customepackagedetails(cus_id,plant_id,plant_name,price,quantity,duration,total_price,image,cus_pkg_id) values('$cusid','$plant_id','$plant_name','$price','$quantity','$duration','$total_price','$image','$cus_pkg_id')";
//                        return $insquery;
                        $result = $this->db->insert($insquery);
                        if ($result) {
                            $updateQuery = "UPDATE plants SET stock = stock - $quantity WHERE plant_id = $plant_id";
                            $result = $this->db->update($updateQuery);
                            $is_success=True;
                        }

                    }
                }
            }
        }
        if ($is_success==True) {
            $withship = $sub_total_price + 100;
            $vat   = $sub_total_price * .02;
            $total = $vat + $withship;
            $from = 'gardennarsary@gmail.com';
            $to = $email;
            $subject = "Package Order Details";
            $body ='<html>
                        <div class="col-12 col-md-9 col-lg-5 ml-lg-auto">
                        <p>Your Package Request Successfully Send!! Quickly we will contact about details</p>
                            <div class="order-details-confirmation">
                                    <ul class="order-details-form mb-4">
                                    <li><span>Package Order Subtotal: </span> 
                                    <span>৳'.$sub_total_price.'</span></li>
                                    <li><span>With Shipping Cost: </span> <span>৳'.$withship.'</span>
                                    </li>
                                    <li><span>Tax: </span> <span>2%</span></li>
                                    <li><span>Total: </span> <span>৳'. $total .'</span>
                                    </li>
                                    <li><span>Total Plants Quantity: </span> 
                                        <span>'.$total_quantity.'</span>
                                    </li>
                                </ul>
                                </div>
                        </div>
                    </html>';


            send_mail($from, $to, $subject, $body);
            $delcart = $this->cartdel();
            echo "Successfully";
            echo "<script>window.location = 'customizePackage.php ';</script>";
        }

    }



    public  function pending_customize_package(){
        $select = "SELECT * FROM customepackage WHERE status ='Pending'";
        $select_result = $this->db->select($select);
        return $select_result;
    }
//    get by user
    public  function getCustomizePackage($cusid){
        $select = "SELECT * FROM customepackage WHERE status ='Pending' AND cus_id = '$cusid' AND (status = 'confirm' OR status = 'renew') ";
        $select_result = $this->db->select($select);
        return $select_result;
    }
    public  function confirm_customize_package(){
        $select = "SELECT * FROM customepackage WHERE status ='confirm' ORDER BY 'date' DESC ";
        $select_result = $this->db->select($select);
        return $select_result;
    }

    public function get_complete_package(){
        $select = "SELECT * FROM customepackage WHERE status ='complete' ORDER BY 'date' DESC ";
        $select_result = $this->db->select($select);
        return $select_result;

    }
    public function getCustomizePackageComplete($cusid){
        $select = "SELECT * FROM customepackage WHERE status ='complete' AND cus_id = $cusid ORDER BY 'date' DESC ";
        $select_result = $this->db->select($select);
        return $select_result;

    }

    public  function get_running_package(){
        $select = "SELECT *,DATEDIFF(a.endDate, CURDATE())
     AS remaining_days FROM customepackage as a
        WHERE status = 'running' AND CURDATE() BETWEEN a.startDate AND a.endDate";
        $result = $this->db->select($select);
        return $result;
    }
    public  function get_renew_customize_package(){
        $select = "SELECT *,DATEDIFF(a.endDate, CURDATE())
     AS remaining_days FROM customepackage as a
        WHERE status = 'renew' ";
        $result = $this->db->select($select);
        return $result;
    }

    public function renew_package_confirm($cus_pkg_id){
        $update  ="UPDATE customepackage SET status = 'running' WHERE cus_pkg_id  = '$cus_pkg_id'";
        $result  = $this->db->update($update);
        return $result;
    }
//    user
    public  function getCustomizePackageRunning($cusid){
        $select = "SELECT *,DATEDIFF(a.endDate, CURDATE())
     AS remaining_days FROM customepackage as a
        WHERE status = 'running' AND cus_id = $cusid";
        $result = $this->db->select($select);
        return $result;
    }


//    user renew
    public function renew_customize_package_customer($duration,$cus_pkg_id){

        $dt1       = new DateTime();
        $startTime = $dt1->format("Y-m-d");
        $dt2       = new DateTime("+$duration days");
        $endTime   = $dt2->format("Y-m-d");
        $update  ="UPDATE customepackage SET status = 'renew',duration = '$duration',startDate ='$startTime',endDate = '$endTime' WHERE cus_pkg_id = '$cus_pkg_id' ";
        $result  = $this->db->update($update);
        return $result;

    }


//    user package details customize package
    public function showPackageDetails($cusid,$id){
        $query   = "SELECT * FROM customepackagedetails WHERE cus_id = '$cusid' AND cus_pkg_id = '$id' ORDER BY cpd_id DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_expire_package(){
        $select = "SELECT *,DATEDIFF(a.endDate, CURDATE())
     AS remaining_days FROM customepackage as a
        WHERE status = 'running' AND CURDATE() > a.endDate";
        $result = $this->db->select($select);
        return $result;
    }

    public function renew_package($duration,$cus_pkg_id){
        $dt1 = new DateTime();
        $startTime = $dt1->format("Y-m-d");
        $dt2 = new DateTime("+$duration days");
        $endTime = $dt2->format("Y-m-d");
        $update = "UPDATE customepackage SET status = 'running',startDate ='$startTime',endDate = '$endTime' WHERE cus_pkg_id = '$cus_pkg_id' ";
        $result = $this->db->update($update);
        return $result;

    }

    public function Complete_package($pbId,$cus_id){
        $select = "SELECT * FROM customepackagedetails where cus_id = '$cus_id' AND cus_pkg_id = '$pbId'";
        $result = $this->db->select($select);
        $is_success = false;
        if ($result){
            while ($row = $result->fetch_assoc()){
                $plant_id  = $row['plant_id'];
                $pbId   = $row['cus_pkg_id'];
                $quantity = $row['quantity'];
                $update = "UPDATE plants SET stock = stock + $quantity WHERE plant_id = $plant_id ";
                $update_result = $this->db->update($update);
                $is_success = true;

            }
        }
        if ($is_success == true){
            $update = "UPDATE customepackage SET status = 'complete' WHERE cus_pkg_id = '$pbId' AND cus_id= $cus_id";
            $update_result = $this->db->update($update);
            return $update_result;
        }
    }

    public function Cancel_package($pbId,$cus_id){
        $select = "SELECT * FROM customepackagedetails where cus_id = '$cus_id' AND cus_pkg_id = '$pbId'";
        $result = $this->db->select($select);
        $is_success = false;
        if ($result){
            while ($row = $result->fetch_assoc()){
                $plant_id  = $row['plant_id'];
                $pbId   = $row['cus_pkg_id'];
                $quantity = $row['quantity'];
                $update = "UPDATE plants SET stock = stock + $quantity WHERE plant_id = $plant_id ";
                $update_result = $this->db->update($update);
                $is_success = true;

            }
        }
        if ($is_success == true){
            $update = "UPDATE customepackage SET status = 'complete' WHERE cus_pkg_id = '$pbId' AND cus_id= $cus_id";
            $update_result = $this->db->update($update);
            return $update_result;
        }
    }

    public function packageDetailsByID($id){
        $select = "SELECT * FROM customepackagedetails WHERE cus_pkg_id ='$id'";
        $select_result = $this->db->select($select);
        return $select_result;
    }

    public function getPackageAddressByid($id){

        $select = "SELECT * FROM customepackage WHERE cus_pkg_id ='$id'";
        $select_result = $this->db->select($select);
        return $select_result;
    }

    public function ConfirmPackage($confirm_id){
        $update = "UPDATE customepackage SET status = 'confirm' WHERE cus_pkg_id = '$confirm_id' ";
        $select_result = $this->db->update($update);
        return $select_result;
    }


    public function startPackage($pbId,$duration)
    {

        $dt1 = new DateTime();
        $startTime = $dt1->format("Y-m-d");
        $dt2 = new DateTime("+$duration days");
        $endTime = $dt2->format("Y-m-d");
        $update = "UPDATE customepackage SET status = 'running',startDate ='$startTime',endDate = '$endTime' WHERE cus_pkg_id = '$pbId' ";
        $result = $this->db->update($update);
        return $result;
    }

}
?>