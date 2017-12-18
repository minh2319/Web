<!DOCTYPE html>
<html>
<style>

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px ;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
.but {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 60%;
}
/* Set a style for all buttons */
.containera {
    padding: 26px;
}
button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 17px 0 9px 0;
    position: relative;
}

img.avatar {
    width: 36%;
    border-radius: 50%;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 90%; /* Full width */
    height: 95%; /* Full height */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 40px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 0% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 60%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<?php 
   function curPageURL() 
   {
      $pageURL = 'http';
       if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
      $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
       $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
      }
       return $pageURL;
    }
    $_SESSION['link']=curPageURL();

?>
 <button class=" btn btn-primary btn-cta hvr-wobble-horizontal" onclick="document.getElementById('id01').style.display='block'" style="margin-top: 10px;margin-left: 8px;width: 100px; "> Đăng nhập </button> 

<div id="id01" class="modal">
  
  <form class="modal-content animate" style="border: 15px solid #f1f1f1;" action="index.php?action=login" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="admins/image/trangchu/logo/avartar.png" alt="Avatar" class="avatar">
    </div>

    <div >
      <label><b>Tên Đăng Nhập</b></label>
      <input type="text" placeholder="Điền Tên Đăng Nhập" name="username" required>

      <label><b>Mật Khẩu</b></label>
      <input type="password" placeholder="Điền Mật Khẩu" name="password" required>
        
      <button class=" but" type="submit" name=login>Đăng nhập</button>
      <input type="checkbox" checked="checked"> Lưu mật khẩu
    </div>

    <div class="mar" style="background-color:#f1f1f1;margin-right: 62px;">

      <button class=" cancelbtn" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Hủy Bỏ</button>
      <span class="psw" style="margin-left: 20px;">  Bạn Quên <a href="quenmatkhau.php">Mật Khẩu?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


</html>
