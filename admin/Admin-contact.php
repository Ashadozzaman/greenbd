<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/customer.php';?>
<?php include_once '../helpers/format.php';?>

<?php
    if (!isset($_GET['cus_id']) || $_GET['cus_id'] == NULL ) {
        echo "<script> Window.location = 'all-masseger.php'; </script>";
    }else{
        $id = $_GET['cus_id'];
    }
?>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
<?php include 'tamp/header.php';?>
        <div class="contacts-area mg-b-15">
            <div class="container-fluid">
                <div class="row" style="    margin-left: 0px;">
                    <h2>Chat Messages</h2>
                    <div id="adminchatlogs" class="col-md-6" style="overflow-y: scroll; max-height:350px;">
                        <!-- <div class="container" class="col-md-3" style="border: 2px solid #bf8787;background-color: #border-radius: 5px; padding: 10px;margin: 10px 0; width: 95%;">
                          <img style="float: left; max-width: 60px;width: 100%;margin-right: 20px;border-radius: 50%;" src="img/contact/1.jpg" alt="Avatar" style="width:100%;">
                          <p id="adminchatlogs"> <?php echo $row['Msg'];?></p>
                          <span class="time-right" style="float: right;color: #aaa;">11:00</span>
                        </div>
                        <div class="container darker" style="border: 2px solid #bf8787;background-color: #border-radius: 5px; padding: 10px;margin: 10px 0;width: 95%;">
                          <img style="float: right;max-width: 60px;width: 100%;margin-right: 20px;border-radius: 50%;" src="img/contact/1.jpg" alt="Avatar" class="right" style="width:100%;">
                          <p id="chatlogs" style="float: right;">Hey! I'm fine. Thanks for asking!</p>
                          <span class="time-left" style="float: left;color: #999;">11:01</span>
                        </div> -->
                    </div>
                    <div class="col-md-6">
                         <form id="postmsg" name="chatform"  method="post">
                            <div >
                                <textarea name="msg" id="msg" style="width: 75%;height: 115px;border: 2px solid #a97e7e;margin-top: 10px;"></textarea>
                                <input type="hidden" name="cus_id" id="cus_id" value="<?php echo $id; ?>"  > 
                            </div> 
                            <div>
                                <a href="#" onclick="send_msg()" style="font-size: 20px;color: #a03838;float: right;margin-right: 150px;" ><button type="button" class="btn btn-custon-four btn-success">SEND MESSAGE</button></a>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div id="adminchatlogs"> </div>
    <script type="text/javascript">
        function send_msg(){
           if (chatform.msg.value == '') {
                alert('Feild Must not be empty');
            }
            // chatform.msg.readyState = true,
            // chatform.msg.style.border='none';


            var msg = chatform.msg.value;
            var cus_id = chatform.cus_id.value;

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 1000) {
                    document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
                }

            }

            xmlhttp.open('GET','adminchatmsg.php?msg='+msg+'&cus_id='+cus_id,true);
            xmlhttp.send();
            $('#msg').val() = '';
            // $('#cus_id').val() = '';

            // xmlhttp.open('GET','adminchatmsg.php?msg='+msg+'&cus_id='+cus_id,true);
            // xmlhttp.open('GET','chatmsg.php?msg='+msg,true);
            // xmlhttp.send();
            // $('#msg').val() = '';
            // $('#cus_id').val() = '';

        }  

        // $(document).ready(function(e){
        //     $.ajaxSetup({cache:false});
        //     setInterval(function(){$('#adminchatlogs').load('adminchatRead.php');},2000);
        // });

    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    ajax_call = function() {
    var cus_id   = $('#cus_id').val();
    var cus_id = chatform.cus_id.value;
        $.ajax({ //create an ajax request to ...
            type: "GET",
            url: "adminchatRead.php?cus_id="+cus_id,
            dataType: "html", //expect html to be returned                
            success: function (response) {
                $("#adminchatlogs").html(response);
            }
        });
    };
    var interval = 10;
    setInterval(ajax_call, interval);
});
</script>


<?php include 'tamp/scriptlink.php';?>
</body>

</html>