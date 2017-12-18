
<?php 
session_start();
include "admins/config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");

  $binhluan = new Binhluan();
$id=0;
  $a=0;
  if(isset($_SESSION['tv_id']))
  {
    $id=$_SESSION['tv_id'];
  }
if(isset($_GET['mabh']) && isset($_GET['id']) && !isset($_GET['bl_cha']))
{
  //echo $_POST['noidung'].$_POST['username'].$_POST['mabh'];
  $mabh=$_GET['mabh'];
  $id=$_GET['id'];
    $noidung=$_POST['noidung'];
$arr = array(":noi_dung"=>$noidung,":ma_chi_tiet_bh"=>$mabh,":thanh_vien_id"=>$id);
  $binhluan->them_bl_bh($arr);
}

if(isset($_GET['mabh']) && isset($_GET['id'])&& isset($_GET['bl_cha']) )
{
  $mabh=$_GET['mabh'];
  $id=$_GET['id'];
  $bl_cha=$_GET['bl_cha']; 
   $noidung=$_POST['noidung'];
 $arr = array(":noi_dung"=>$noidung,":ma_chi_tiet_bh"=>$mabh,":thanh_vien_id"=>$id,":binh_luan_cha"=>$bl_cha);
  $binhluan->them_tl_bh($arr);
}


if(isset($_GET['mabh']) && isset($_GET['sotrang']) )
{
  //echo $_POST['noidung'].$_POST['username'].$_POST['mabh'];
  $mabh=$_GET['mabh'];
  $page=$_GET['sotrang'];
 $sl=15;
  $arrayName = array(':ma_chi_tiet_bh' => $_GET['mabh']);
      $a=($page-1)*15;
  $rows = $binhluan->binh_luan_bh($arrayName,$a,$sl);
$arrayxemthem = array(':ma_chi_tiet_bh' => $_GET['mabh']);
  $duoc_tralois = $binhluan->binh_luan_duoc_tra_loi($arrayName);
 $i=1; 
    ?>
    <div class="row col-12">
    <?php  
     foreach($rows as $row)
  {  
  ?>
   <div class="col-md-11 offset-1" style="margin-top: 30px;">
     <div class="row">   
       <div class="col-md-1"> 
              <img src="admins\<?php echo $row['hinh_anh'];?>" style="width: 50px; height: 50px; ">
         </div>
       <div class="col-md-11" style="font-size: 15px;"> 
           <div class="row">
             <div class="col-md-8" style="margin-left: 7px;">
                   <b style="color: #3C3535"><?php echo $row['username'];?> </b>
             </div>
                 <i> <?php echo $row['thoi_gian'];?></i>
           </div>
            <div class="row col-md-12" style="margin-left: 3px;">
                <?php echo $row['noi_dung'];?>
            </div>
            <div class="row">
               <div class="col-7"></div>
          <div class="col-5"> 
    <?php foreach( $duoc_tralois as $duoc_traloi)
    { 
      if($row['ma_binh_luan']==$duoc_traloi['ma_binh_luan'])
       { ?>
         <button id="<?php echo "xemthem$i" ?>"  onclick="showhide_bl(<?php echo $i ?>)" style="margin-left: 15px;font-size: 14px">Xem thêm </button> 
  <?php }
     } ?>

         <button  <?php
         if(!isset($_SESSION['username']) )
         {?>
              onclick="document.getElementById('id01').style.display='block'"
     <?php }else
       ?>  onclick="showhide(<?php echo $i ?>)" style="margin-left: 15px;">Trả lời</button> 
            </div>
             </div>
       </div> <?php 
if(isset($_SESSION['username']))
  {?>
  <div id="<?php echo "mycommenttl$i" ?>" class="col-md-11 offset-1" style="display: none;"  >
      <div id="result" class="row">   
          <div class="col-md-1 "> 
         <img src=" <?php echo $_SESSION['avartar'];?>" style="width: 45px; height: 50px; "></div>
          <div class="col-md-10 "> 
         <form method="POST">
             <textarea name="binhluan" id="<?php echo "noidung_tl$i" ?>" cols="60" rows="2" ></textarea>
              <div class="col-md-2 offset-10">   
                <input  class="btn-group" onclick="load_ajax_tra_loi(<?php echo $id ?>,'<?php echo $_GET['mabh'] ?>',<?php echo $row['ma_binh_luan'] ?>,<?php echo $i ?>)"  id="send" type="button" value="Bình Luận" name="send">
              </div>
         </form> 
       </div>
      </div>  
  </div>
  <?php }
//vòng lặp for hiện những bình luận trả lời
$arraytlbl = array(':ma_chi_tiet_bh' => $_GET['mabh'],':binh_luan_cha' => $row['ma_binh_luan']);
  $hientralois = $binhluan->binh_luan_con($arraytlbl); 
?>
<div id="<?php echo "mycommenttl_nhau$i" ?>" class="col-md-12" style="margin-left: 20px; display: none; ">
<?php
 foreach($hientralois as $hientraloi)
    {?>
 <div  class="row" style="margin-top: 25px">
      <div class="col-md-1"> 
              <img src="admins\<?php echo $hientraloi['hinh_anh'];?>" style="width: 40px; height: 40px; ">
       </div>
        <div class="col-md-11" style="font-size: 14px;"> 
            <div class="row">
               <div class="col-md-8" style="margin-left: 7px;">
                   <b style="color: #3C3535"><?php echo $hientraloi['username'];?> </b>
              </div>
                 <i> <?php echo $hientraloi['thoi_gian'];?></i>
             </div>
             <div class="row col-md-12" style="margin-left: 3px;">
                <?php echo $hientraloi['noi_dung'];?>
             </div>
               <div class="row">
                <div class="col-8 ">
                </div>
                <div class="col-4" > 
                <button  <?php
                  if(!isset($_SESSION['username']) )
                  {?>
                    onclick="document.getElementById('id01').style.display='block'"
                  <?php }else
                 ?>  onclick="showhide(<?php echo $i ?>)" style="margin-left: 45px;">Trả lời</button> 
                </div>
              </div>
            </div>
  </div>
   <?php }
   ?>
        </div>
         </div>  
      </div>  
<?php 
$i++;

} ?>
   </div>
   <?php
}
?>

<script language="javascript">
            // Lấy đối tượng 
//comment bt
   function load_ajax(id,mabh)
   {
       var calculate = function() 
       {
       var string = document.getElementById('noidung').value;
       var length = string.split(/[^\s]+/).length - 1;
       return length;
      };
    if(calculate()<5)
       {
         alert('Bình luận ít nhất 5 từ');
         return false;
       }

      // var element = document.getElementById('noidung');
      // if(noidung.value.length<10)
      // {
      //   alert('Bình luận ít nhất 10 kí tự');
      //   return false;
      // }
      
      $.ajax({
          url : "binhluanthemajax.php?id="+id+"&mabh="+mabh, // gửi ajax đến file result.php
          type : "post", // chọn phương thức gửi là post
          dataType:"text", // dữ liệu trả về dạng text
          data : { // Danh sách các thuộc tính sẽ gửi đi
               noidung : $('#noidung').val()
          },
          success : function (result){
              // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
              // đó vào thẻ div có id = result
             alert("Bình luận thành công,xin vui lòng chờ kiểm duyệt");
             document.getElementById('noidung').value ="";
          }
      });
    }
    //trả lời
    function load_ajax_tra_loi(id,mabh,bl_cha,i)
   {
       var calculate = function() 
       {
       var string = document.getElementById('noidung_tl'+i).value;
       var length = string.split(/[^\s]+/).length - 1;
       return length;
      };
    if(calculate()<5)
       {
         alert('Bình luận ít nhất 5 từ');
         return false;
       }

      // var element = document.getElementById('noidung');
      // if(noidung.value.length<10)
      // {
      //   alert('Bình luận ít nhất 10 từ');
      //   return false;
      // }
      
      $.ajax({
          url : "binhluanthemajax.php?id="+id+"&mabh="+mabh+"&bl_cha="+bl_cha, // gửi ajax đến file result.php
          type : "post", // chọn phương thức gửi là post
          dataType:"text", // dữ liệu trả về dạng text
          data : { // Danh sách các thuộc tính sẽ gửi đi
               noidung : $('#noidung_tl'+i).val()
          },
          success : function (result){
              // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
              // đó vào thẻ div có id = result
             alert("Trả lời thành công,xin vui lòng chờ kiểm duyệt");
             document.getElementById('noidung_tl'+i).value =result;
          }
      });
    }

  
  function showhide(i)
{
var div = document.getElementById('mycommenttl'+i);
 if (div.style.display !== "none") 
 {
 div.style.display = "none";
 }
 else {
 div.style.display = "block";
  }
}
 function showhide_bl(i)
{
var btnxemthem = document.getElementById('xemthem'+i);

var div = document.getElementById('mycommenttl_nhau'+i);
 if (div.style.display !== "none") 
 {
 div.style.display = "none";
 btnxemthem.innerHTML="Xem thêm";

 }
 else {
 div.style.display = "block";
  btnxemthem.innerHTML="Ẩn";
  }
}
 </script>
