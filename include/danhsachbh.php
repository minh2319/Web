<div class="row">
   <div class="col-md-12">
      <p><a href="#" style="font-size: 25px; text-decoration: none;">Bài hát Hot</a></p>
    </div>
 </div>
<?php 
$obj = new Db();
  $a=0; 

 $chitietbaihat=new Chitietbaihat();
$rows=  $chitietbaihat->showall();
$slbh=count($rows);

 if(!isset($_GET['quocgia']) && !isset($_GET['theloai']))
  {
    if(isset($_GET['trang']))
     {
        $page = $_GET['trang'];
    }
    else
    {
        $page = 1;
    }
    $a=($page-1)*15;
    $rows = $obj->select( "SELECT
      baihat.ten_bai_hat,
      casy.nghe_danh,
      chitietbaihat.hinh_anh,chitietbaihat.ma_chi_tiet_bh
      FROM
      casy
      INNER JOIN chitietbaihat ON chitietbaihat.ma_ca_sy = casy.ma_ca_sy
      INNER JOIN baihat ON chitietbaihat.ma_bai_hat = baihat.ma_bai_hat
        LIMIT $a, 15 "); ?>

    <div class="row">
      <?php   
      foreach($rows as $row)
       { ?>
                
           <div class="col-md-4 hieuung hvr-grow-shadow">
            <a href="baihat.php?mabh=<?php echo $row['ma_chi_tiet_bh'];?>" >
           <img src=" admins/<?php  echo $row['hinh_anh']; ?>" style="width: 220px;height: 170px;"><p><?php echo $row["ten_bai_hat"]; ?><br><span class="tencasi"><?php echo $row["nghe_danh"]; ?></span></p></a>
           </div>
        <?php  
        } ?>
       </div>

     <div class="row">
        <div class="col-md-10 offset-6">Trang: <?php 
            for($i=1;$i<=ceil(($slbh/15));$i++)
              { ?>
                <a href="nhac.php?trang=<?php echo $i; ?>"> <?php echo $i."" ;?></a>
         <?php } ?>
        </div>
      </div>

    <?php 
        }
        else if(isset($_GET['quocgia']) )
        {
            if(isset($_GET['trang']))
           {
             $page = $_GET['trang'];
          }else{
                  $page = 1;
                }
            $quocgia=$_GET['quocgia'];
          $a=($page-1)*15;
            $rows = $obj->select( "SELECT
          baihat.ten_bai_hat,
          casy.nghe_danh,
          chitietbaihat.hinh_anh,
          chitietbaihat.ma_chi_tiet_bh,
          baihat.ma_quoc_gia
          FROM
          casy
          INNER JOIN chitietbaihat ON chitietbaihat.ma_ca_sy = casy.ma_ca_sy
          INNER JOIN baihat ON chitietbaihat.ma_bai_hat = baihat.ma_bai_hat
          where baihat.ma_quoc_gia like '$quocgia'
            LIMIT $a, 15 ");?>

    <div class="row"> <?php 
        $tonghop=new Tonghop();
         $arr = array(":ma_quoc_gia"=>$quocgia);
       $dem=$tonghop->dem_bh_qg($arr);
         $slbh=count($dem);
         foreach($rows as $row)
          {    ?>
            <div class="col-md-4 hieuung hvr-grow-shadow">
             <a href="baihat.php?mabh=<?php echo $row['ma_chi_tiet_bh'];?>" >
             <img src=" admins/<?php  echo $row['hinh_anh']; ?>" style="width: 220px;height: 170px;"><p><?php echo $row["ten_bai_hat"]; ?><br><span class="tencasi"><?php echo $row["nghe_danh"]; ?></span></p></a>
             </div>
                <?php 
           } ?>
     </div>
     
     <div class="row">
        <div class="col-md-10 offset-6">Trang:  <?php 
          for($i=1;$i<=ceil(($slbh/15));$i++)
        { ?>
          <a href="nhac.php?quocgia=<?php echo $quocgia;?>&trang=<?php echo $i; ?>"> <?php echo $i."" ;?></a> <?php
        }?> 
      </div>
    </div><?php } 

    else if(isset($_GET['theloai']) )
        {
            if(isset($_GET['trang']))
           {
             $page = $_GET['trang'];
          }else{
                  $page = 1;
                }
            $theloai=$_GET['theloai'];
          $a=($page-1)*15;
            $rows = $obj->select( "SELECT
          baihat.ten_bai_hat,
          casy.nghe_danh,
          chitietbaihat.hinh_anh,
          chitietbaihat.ma_chi_tiet_bh,
          baihat.ma_quoc_gia
          FROM
          casy
          INNER JOIN chitietbaihat ON chitietbaihat.ma_ca_sy = casy.ma_ca_sy
          INNER JOIN baihat ON chitietbaihat.ma_bai_hat = baihat.ma_bai_hat
          where chitietbaihat.ma_the_loai like '$theloai'
            LIMIT $a, 15 ");?>

    <div class="row"> <?php 
        $tonghop=new Tonghop();
         $arr = array(":ma_the_loai"=>$theloai);
       $dem=$tonghop->dem_bh_tl($arr);
         $slbh=count($dem);
         foreach($rows as $row)
          {    ?>
            <div class="col-md-4 hieuung hvr-grow-shadow">
             <a href="baihat.php?mabh=<?php echo $row['ma_chi_tiet_bh'];?>" >
             <img src=" admins/<?php  echo $row['hinh_anh']; ?>" style="width: 220px;height: 170px;"><p><?php echo $row["ten_bai_hat"]; ?><br><span class="tencasi"><?php echo $row["nghe_danh"]; ?></span></p></a>
             </div>
                <?php 
           } ?>
     </div>
     
     <div class="row">
        <div class="col-md-10 offset-6">Trang:  <?php 
          for($i=1;$i<=ceil(($slbh/15));$i++)
        { ?>
          <a href="nhac.php?theloai=<?php echo $theloai;?>&trang=<?php echo $i; ?>"> <?php echo $i."" ;?></a> <?php
        }?> 
      </div>
    </div><?php } ?>

