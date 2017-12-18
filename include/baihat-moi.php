<div class="row">
                <div class="col-md-12">
                    <p><a href="#" style="font-size: 25px; text-decoration: none;">Bài hát Hot</a></p>
                </div>
            </div>
<?php 
$obj = new Db();
  $a=0;
  $b=3;                 
              
for($i=0;$i<3;$i++) 
{

    $rows = $obj->select( "SELECT
baihat.ten_bai_hat,
casy.nghe_danh,
chitietbaihat.hinh_anh,chitietbaihat.ma_chi_tiet_bh
FROM
casy
INNER JOIN chitietbaihat ON chitietbaihat.ma_ca_sy = casy.ma_ca_sy
INNER JOIN baihat ON chitietbaihat.ma_bai_hat = baihat.ma_bai_hat
WHERE chitietbaihat.hinh_anh IS NOT NULL LIMIT $a, 3 ");

    ?>
    <div class="row">
              <?php   foreach($rows as $row)
               {    ?>
                <div class="col-md-4 hieuung hvr-grow-shadow">
                    <a href="baihat.php?mabh=<?php echo $row['ma_chi_tiet_bh'];?>" >
                    <img src=" admins/<?php  echo $row['hinh_anh']; ?>" style="width: 220px;height: 170px;"><p><?php echo $row["ten_bai_hat"]; ?><br><span class="tencasi"><?php echo $row["nghe_danh"]; ?></span></p></a>
                </div>

                <?php  } ?>

     </div>
 <?php
 $a+=3;
}
     
?>