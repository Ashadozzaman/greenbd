<!DOCTYPE html>
<html lang="en">
 <link rel="stylesheet" href="css/chating.css">
<?php include 'tamp/header.php'; ?>
    <!-- ##### Right Side Cart Area ##### -->
<?php include 'tamp/carts.php'; ?>
    <!-- ##### Right Side Cart End ##### -->


    <div class="contact-area d-flex " style="background: aliceblue; height: 660px;">
        <div class="container">
        <div class="row justify-content-center align-items-center">
                <div class="col-md-8 col-xl-6 chat align-items-center">
                    <div class="card" style="">
                        <div class="card-header msg_head">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="img/admin.png" class="rounded-circle user_img">
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <span>Chat with Service Provider</span>
                                    <!-- <p>1767 Messages</p> -->
                                </div>
                                <!-- <div class="video_cam">
                                    <span><i class="fas fa-video"></i></span>
                                    <span><i class="fas fa-phone"></i></span>
                                </div> -->
                            </div>
                            <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                            <div class="action_menu">
                                <ul>
                                    <li><i class="fas fa-user-circle"></i> View profile</li>
                                    <li><i class="fas fa-users"></i> Add to close friends</li>
                                    <li><i class="fas fa-plus"></i> Add to group</li>
                                    <li><i class="fas fa-ban"></i> Block</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body msg_card_body" id="chat-box">
                            
                            
                                        
                        </div>
                        <form id="postmsg" name="chatform"  method="post">
                            <div class="card-footer">
                                <div class="input-group">
                                    
                                    <div class="input-group-append">
                                        <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                    </div>
                                    <textarea name="msg" id="msg" class="form-control type_msg" placeholder="Type your message..."></textarea>
                                    <input type="hidden" name="email" id="email" value="<?php echo Session::get('email');?>">
                                    <div class="input-group-append">
                                        <a href="#" onclick="send_msg()"><span class="input-group-text send_btn"><i style="height: 48px" class="fas fa-location-arrow fa-2x"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

  <!--   <script type="text/javascript">
        event.preventDefault();
        function send_msg(){
            var msg   = $('#msg').val();
            var email = $('#email').val();
            if (msg.trim() == '') {
                alert('Please Enter Text');
                $('#msg').focus();
                return false;
            }else{
                $.ajax({
                    url: 'chatmsg.php',
                    type: 'POST',
                    data: {msg:msg,email:email},
                    success:function(data){
                        if (data.trim() != '') {
                            $('.get_msg').html('<span>'+data.trim()+'</span>');
                        }else{
                            alert(data);
                        }
                    },
                    error:function(){
                        alert('some problem');
                    }

                });
            }

        }

    </script> -->

    <script type="text/javascript">
        function send_msg(){
            if (chatform.msg.value == '') {
                alert('feild Must not be empty');
            }
            chatform.msg.readyState = true,
            chatform.msg.style.border='none';


            var msg = encodeURIComponent(chatform.msg.value);
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
                }

            }

            xmlhttp.open('GET','chatmsg.php?msg='+msg,true);
            xmlhttp.send();
            $('#msg').val() = '';

        }  

        $(document).ready(function(e){
            $.ajaxSetup({cache:false});
            setInterval(function(){$('#chat-box').load('logs.php');},200);
        });

        // $(document).ready(function(e){
        //     $.ajaxSetup({cache:false});
        //     setInterval(function(){$('#demo').load('demo.php');},2000);
        // });



        // var myVar = setInterval(myTimer, 1000);

        // function myTimer() {
        //   var d = new Date();
        //   var t = d.toLocaleTimeString();
        //   document.getElementById("demo").innerHTML = t;
        // }
         
    </script>

 <?php include 'tamp/footer.php'; ?>
        
</body>

</html>