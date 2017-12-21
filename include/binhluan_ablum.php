<div class="row" id="binhluan" >
  <div class="col-md-11 offset-1">
     <p><a href="#" style="font-size: 25px; text-decoration: none;">Bình luận</a></p>
   </div>
    
 </div>

<?php 
$obj = new Db();
$binh_luan=new Binhluan();
$id=0;
  $a=0;
  if(isset($_SESSION['tv_id']))
  {
    $id=$_SESSION['tv_id'];
  }
if(!isset($_SESSION['username']))
{?>
   <div class="col-md-11 offset-1">
      <div class="row">   
          <div class="col-md-1 "> 
         <img src="admins\image\trangchu\avatar\avartar.jpg" style="width: 50px; height: 50px; "></div>
          <div class="col-md-10 "> 
         <form action="#" method="POST">
             <textarea name="binhluan" id="" cols="68" rows="2" style="margin-top: 5px;"></textarea>
              <div class="col-md-2 offset-10">   
                <input  class="btn-group" onclick="document.getElementById('id01').style.display='block'" type="button" value="Bình Luận" name="send">
              </div>
         </form> 
       </div>
      </div>  
  </div>
  <?php
}
else       
 {  
  ?>
   <div id="mycomment" class="col-md-11 offset-1">
      <div id="result" class="row">   
          <div class="col-md-1 "> 
         <img src=" <?php echo $_SESSION['avartar'];?>" style="width: 50px; height: 50px; "></div>
          <div class="col-md-10 "> 
         <form method="POST">
             <textarea name="binhluan" id="noidung" cols="68" rows="2" ></textarea>
              <div class="col-md-2 offset-10">   
                <input  class="btn-group" onclick="load_ajax(<?php echo $id ?>,'<?php echo $_GET['maab'] ?>')"  id="send" type="button" value="Bình Luận" name="send">
              </div>
         </form> 
       </div>
      </div>  
  </div>

<?php } 
 $bd=0;
 $sl=15;
 
  $arrayName = array(':ma_ablum' => $_GET['maab']);
  $rows=  $binh_luan->dem_binh_luan_ab($arrayName);
  $slbl=count($rows);
  $rows = $binh_luan->binh_luan_ab($arrayName,$bd,$sl); 
  $i=1; 
$arrayxemthem = array(':ma_ablum' => $_GET['maab']);
  $duoc_tralois = $binh_luan->binh_luan_ab_duoc_tra_loi($arrayName);
    ?>
<div id="binhluantv" class="row col-12">
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
               <div class="col-6"></div>
          <div class="col-6"> 
             <?php
                  if(isset($_SESSION['username']))
                  {
                    if($_SESSION['username']==$row['username'])
                      {?> <button class="btn-danger" onclick="ConfirmDelete(<?php echo $row['ma_binh_luan'] ?>)"  style="margin-left: 5px;">Xóa</button>
                <?php }
              } ?> 
    <?php foreach( $duoc_tralois as $duoc_traloi)
    { 
      if($row['ma_binh_luan']==$duoc_traloi['ma_binh_luan'])
       { ?>
         <button id="<?php echo "xemthem$i" ?>"  onclick="showhide_bl(<?php echo $i ?>)" style="margin-left: 15px;font-size: 14px">Xem thêm </button> 
  <?php }
     } ?>
         <button
           <?php
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
                <input  class="btn-group" onclick="load_ajax_tra_loi(<?php echo $id ?>,'<?php echo $_GET['maab'] ?>',<?php echo $row['ma_binh_luan'] ?>,<?php echo $i ?>)"  id="<?php echo "send$i" ?>" type="button" value="Bình Luận" name="send">
              </div>
         </form> 
       </div>
      </div>  
  </div>
  <?php }
//vòng lặp for hiện những bình luận trả lời
$arraytlbl = array(':ma_ablum' => $_GET['maab'],':binh_luan_cha' => $row['ma_binh_luan']);
  $hientralois = $binh_luan->binh_luan_ab_con($arraytlbl); 
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
                    <?php
                  if(isset($_SESSION['username']))
                  {
                    if($_SESSION['username']==$hientraloi['username'])
                      {?> <button class="btn-danger" onclick="ConfirmDelete(<?php echo $hientraloi['ma_binh_luan'] ?>)" style="margin-left: 5px;">Xóa</button>
                <?php }
              } ?> 
                <button  <?php
                  if(!isset($_SESSION['username']) )
                  {?>
                    onclick="document.getElementById('id01').style.display='block'"
                  <?php }else
                 ?>  onclick="showhide(<?php echo $i ?>)" style="margin-left: 25px;">Trả lời</button> 
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
   <div class="row">
        <div class="col-md-10 offset-6">  <?php
        if($slbl>0)
        {
         echo "Trang:";
          for($i=1;$i<=ceil(($slbl/15));$i++)
        { 
          ?>
          <a href="#binhluan" onclick="load_ajax_phan_trang(<?php echo $i ?>,'<?php echo $_GET['maab'] ?>')"> <?php echo $i."" ;?></a> <?php
        }
        }
        ?> 
      </div>
    </div>
<script language="javascript">
            // Lấy đối tượng 
//comment bt
function khoa_15s(noidung,send)
{
  var secondsBeforeExpire = 15;
      $("#"+noidung).prop('disabled',true);
      $("#"+send).prop('disabled',true);
    // This will trigger your timer to begin
    var timer = setInterval(function(){
        // If the timer has expired, disable your button and stop the timer
        if(secondsBeforeExpire <= 0){
            clearInterval(timer);
            $("#"+noidung).prop('disabled',false);
           $("#"+send).prop('disabled',false);
             document.getElementById(noidung).value='';
        }
        // Otherwise the timer should tick and display the results
        else{
            // Decrement your time remaining
            secondsBeforeExpire--;
              document.getElementById(noidung).value='Xin đợi '+secondsBeforeExpire+' giây để được bình luận';      
        }
    },1000);
}
   function load_ajax(id,maab)
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
        khoa_15s('noidung','send');
      // var element = document.getElementById('noidung');
      // if(noidung.value.length<10)
      // {
      //   alert('Bình luận ít nhất 10 kí tự');
      //   return false;
      // }
      $.ajax({
          url : "binhluan_ablumthemajax.php?id="+id+"&maab="+maab, // gửi ajax đến file result.php
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
    function load_ajax_tra_loi(id,maab,bl_cha,i)
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
          khoa_15s('noidung_tl'+i,'send'+i);

      // var element = document.getElementById('noidung');
      // if(noidung.value.length<10)
      // {
      //   alert('Bình luận ít nhất 10 từ');
      //   return false;
      // }
      $.ajax({
          url : "binhluan_ablumthemajax.php?id="+id+"&maab="+maab+"&bl_cha="+bl_cha, // gửi ajax đến file result.php
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

   function load_ajax_phan_trang(sotrang,maab)
   {
    $.ajax({
        url : "binhluan_ablumresult.php?sotrang="+sotrang+"&maab="+maab, // gửi ajax đến file result.php
        type : "post", // chọn phương thức gửi là post
        dataType:"text", // dữ liệu trả về dạng text
        data : { // Danh sách các thuộc tính sẽ gửi đi
        },
        success : function (result){
            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
            // đó vào thẻ div có id = result
           document.getElementById('binhluantv').innerHTML =result;
        }
    });
  }
  function ajax_xoa_bl(mabl)
   {
    $.ajax({
        url : "binhluan_ablumthemajax.php?thaotac=xoa"+"&mabl="+mabl, // gửi ajax đến file result.php
        type : "post", // chọn phương thức gửi là post
        dataType:"text", // dữ liệu trả về dạng text
        data : { // Danh sách các thuộc tính sẽ gửi đi
        },
        success : function (result){
            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
            // đó vào thẻ div có id = result
  alert("Xóa thành công");
  location.reload();        
      }
    });
  }

    function ConfirmDelete(mabl)
    {
      var x = confirm("Bạn muốn xóa bình luận?");
      if (x)
      {
        ajax_xoa_bl(mabl);
          return true;
      }
      else
        return false;
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
