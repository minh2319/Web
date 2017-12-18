
<?php 
$obj = new Db();
  $a=0;
  $b=3;                 
 if(isset($_GET['matintuc']))
{
  $matintuc = $_GET['matintuc'];
  
    $rows = $obj->select1( "SELECT
    * FROM tintuc WHERE ma_tin_tuc like '$matintuc'
  ");?>

<div class="rows col-10 offset-1"> <h1 style="color: black"><?php echo $rows['tieu_de'] ?></h1></div>

<div class="rows col-10 offset-1"><?php echo $rows['noi_dung'] ?></div>
<div class="rows col-3 offset-9"><i> <b>Nguồn: <?php echo $rows['nguon'] ?>  </b> </i></div>


  <?php } ?>
    


  


