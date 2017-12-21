<?php 
$obj = new Db();//tu dong load file classes/Db.class.php
  $playlist = new Playlist();
  $ma_playlist=0; 
   if(isset($_GET['maplaylist']))
  {
    $ma_playlist=$_GET['maplaylist'];
  }
  if(isset($_GET['thaotac']) &&isset($_POST['capnhat']))
  {
    $ten="";
    $mota="";
    $theloai="";
    if(isset($_POST['ten']))
    {
      $ten=$_POST['ten'];
    }
    if(isset($_POST['mota']))
    {
      $mota=$_POST['mota'];
    }
    if(isset($_POST['theloai']))
    {
      $theloai=$_POST['theloai'];
    }
      echo "<SCRIPT type='text/javascript'> 
      alert('Sửa thành công')</SCRIPT>";
      $arrayName = array('ma_playlist' => $ma_playlist,'the_loai' => $theloai,'ten_playlist' => $ten,'mo_ta' => $mota );
    $playlist->sua($arrayName);
  }

  $arrayName = array('ma_playlist' => $ma_playlist );
  $rows=$playlist->show_one($arrayName);
?>

  <div class="col-6 offset-4">  
    <h2 style="color: #1ADFC1">Chỉnh Sửa PlayList</h2>
<form action="quanly_playlist?thaotac=sua&maplaylist=<?php echo $ma_playlist;?>" method="post">
         <table>
          <tr><td>Tên Playlist:</td><td><input type="text" name='ten' id="tenplaylist" value="<?php echo $rows[0]['ten_playlist']?>"></td></tr>
          <tr><td>Mô tả Playlist:</td><td><textarea id="mota" name='mota'  cols="22" rows="2" ><?php echo $rows[0]['mo_ta']?></textarea></td></tr>
          <tr><td>Thể loại:</td><td><input type="text" id="theloai" name='theloai' value="<?php echo $rows[0]['the_loai']?>" ></td></tr>
          <tr><td></td><td><button type="button" id="btnhuy" onclick="trangchu()"  style="margin-left: 55px" class="btn btn-danger btn-sm" >Hủy</button><button type="submit" class="btn btn-primary btn-sm" name="capnhat" id="btnthem"  style="margin-left: 15px">Lưu</button></td></tr>
         </table>
    </form>
  </div>
   <?php 
   $rows=$playlist->xemdsbh($arrayName);
   if(count($rows)>1)
   {?>
<div class="col-11 offset-2">  
  <?php 
  $i=1;
  foreach ($rows as $row)
  { ?>
    
  <div class="row" style="margin-top: 10px;"> 

    <div class="col-3">
     <a href="baihat.php?mabh=<?php echo $row['ma_chi_tiet_bh'];?>">
    <?php echo $i.".".$row['ten_bai_hat'] ?></a>
  </div>

   <div class="col-3">
    <a href="casyct?macasy=<?php echo $row['ma_ca_sy'];?>">
    <?php echo $row['nghe_danh'] ?>
    </a>
  </div>
   <div class="col-3">
     <button type="button" onclick="ConfirmDelete(<?php echo $row['ma_chi_tiet_playlist'] ?>)" class="btn btn-danger btn-sm"> Xóa</button>    

  </div>
</div>
<?php $i++; }
   }
   ?>
  </div>




<script language="javascript">
 // Lấy đối tượng 
//comment bt
   function trangchu()
   {
      window.location.replace('http://localhost/webnhac');
   }
    function ajax_xoa_ctpl(mactpl)
   {
    $.ajax({
        url : "module/thembhplaylist.php?thaotac=xoa"+"&mactpl="+mactpl, // gửi ajax đến file result.php
        type : "post", // chọn phương thức gửi là post
        dataType:"text", // dữ liệu trả về dạng text
        data : { // Danh sách các thuộc tính sẽ gửi đi
        },
        success : function (result){
          
      alert("Xóa thành công");
      location.reload();        
      }
    });
  }
    function ConfirmDelete(mactpl)
    {
      var x = confirm("Bạn muốn xóa bài hát này khỏi playlist?");
      if (x)
      {
        ajax_xoa_ctpl(mactpl);
          return true;
      }
      else
        return false;
    }   

    //trả lời
</script>