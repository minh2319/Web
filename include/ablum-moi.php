<div class="row">
                <div class="col-md-12">
                    <p><a href="#" style="font-size: 25px; text-decoration: none;">Ablum mới</a></p>
                </div>
            </div>
<?php 
$obj = new Db();
  $a=0;
  $b=3;                 
              
for($i=0;$i<3;$i++) 
{

    $rows = $obj->select( "SELECT DISTINCTROW      
casy.nghe_danh,
ablum.ten_ablum,
ablum.hinh_anh,
ablum.ma_ablum
FROM
ablum
INNER JOIN chitietablum ON chitietablum.ma_ablum = ablum.ma_ablum
INNER JOIN chitietbaihat ON chitietablum.ma_chi_tiet_bh = chitietbaihat.ma_chi_tiet_bh
INNER JOIN casy ON chitietbaihat.ma_ca_sy = casy.ma_ca_sy
 LIMIT $a, 3 ");

    ?>
    <div class="row">
              <?php   foreach($rows as $row)
               {    ?>
                <div class="col-md-4 hvr-grow-shadow">
                    <a href="ablum.php?maab=<?php  echo $row['ma_ablum'];  ?>">
                    <img src=" admins/<?php  echo $row['hinh_anh']; ?>" style="width: 220px;height: 170px;"><p><?php echo $row["ten_ablum"]; ?><br><span class="tencasi"><?php echo $row["nghe_danh"]; ?></span></p></a>
                </div>

                <?php  } ?>

     </div>
 <?php
 $a+=3;
}
     
?>