<div class=" row">
   <div class="col-md-12">
       <p><a href="#" style="font-size: 25px; text-decoration: none;">Tin tức</a></p>
   </div>
</div>
<?php 
$obj = new Db();
  $tintuc=new Tintuc();              
$rows=  $tintuc->showall();
$slbh=count($rows);
  $a=0;
  $b=3; 
  $show=12;
  if(isset($_GET['trang']))
  {
      $page = $_GET['trang'];
  }else
  {
      $page = 1;
  }
  $a=($page-1)*$show;
    $rows = $obj->select( "SELECT
    * FROM tintuc 
    LIMIT $a, $show ");
 ?>
    <div class="row"  style="margin-left: 3px">
     <?php  foreach($rows as $row)
           {    ?>
                 
               <div class="col-md-7 hieuung hvr-grow-shadow" >
                <a href="tintucct?matintuc=<?php echo $row['ma_tin_tuc'];?>">
               <img src=" admins/<?php  echo $row['hinh_anh']; ?>" style="width: 100%;height: 200px;margin-top: 10px;">

</a>
                </div>
              <div class="col-md-5 hieuung hvr-grow-shadow" style="background: #ffdde1
;color: white;margin-top: 10px;"> <a href="tintucct?matintuc=<?php echo $row['ma_tin_tuc'];?>">
              <p style="margin-top: 30px;">
                 <?php echo $row["tieu_de"]; ?></p></a>
                </div>
                <?php 
           } ?>
     </div>
     <div class="row">
        <div class="col-md-10 offset-6">Trang:  <?php  
      

      for($i=1;$i<=ceil(($slbh/$show));$i++)
      { ?>
        <a href="tintuc.php?trang=<?php echo $i; ?>" > <?php echo $i."" ;?></a>

        <?php
      } 

?>

        </div>
       </div>



     
  


