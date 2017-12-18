<div class="row">
   <div class="col-md-12">
      <p><a href="#" style="font-size: 25px; text-decoration: none;">Bài hát Hot</a></p>
    </div>
 </div>
<?php 
$obj = new Db();
  $a=0;
  $b=3;                 
             

 if(isset($_GET['theloai']) )
        {
            if(isset($_GET['trang']))
           {
             $page = $_GET['trang'];
          }else{
                  $page = 1;
                }
            $theloai=$_GET['theloai'];
             $demablum=new Ablum();
$arr=array(':ma_the_loai' =>$theloai);
$rows=  $demablum->dem_ab_theloai($arr);
$slbh=count($rows);
          $a=($page-1)*15;
            $rows = $obj->select( "SELECT DISTINCT         
casy.nghe_danh,
ablum.ten_ablum,
ablum.hinh_anh,
ablum.ma_ablum
FROM
ablum
INNER JOIN chitietablum ON chitietablum.ma_ablum = ablum.ma_ablum
INNER JOIN chitietbaihat ON chitietablum.ma_chi_tiet_bh = chitietbaihat.ma_chi_tiet_bh
INNER JOIN casy ON chitietbaihat.ma_ca_sy = casy.ma_ca_sy
where ablum.ma_the_loai like '$theloai'
LIMIT $a, 15 ");
    ?>
    <div class="row">
              <?php   foreach($rows as $row)
               {    ?>
                <div class="col-md-4 hvr-grow-shadow">
                    <a href="ablum.php?maab=<?php  echo $row['ma_ablum'];  ?>">
                    <img src=" admins/<?php  echo $row['hinh_anh']; ?>" style="width: 220px;height: 170px;"><p><?php echo $row["ten_ablum"]; ?><br><span class="tencasi"><?php echo $row["nghe_danh"]; ?></span></p></a>
                </div>
                <?php  
              } ?>
     </div>
     
     <div class="row">
        <div class="col-md-10 offset-6">Trang:  <?php 
          for($i=1;$i<=ceil(($slbh/15));$i++)
        { ?>
          <a href="dsablumac.php?theloai=<?php echo $theloai;?>&trang=<?php echo $i; ?>"> <?php echo $i."" ;?></a> <?php
        }?> 
      </div>
    </div><?php 
  } 

    