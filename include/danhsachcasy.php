<div class=" row">
   <div class="col-md-12">
       <p><a href="#" style="font-size: 25px; text-decoration: none;">Ca Sỹ</a></p>
   </div>
</div>
<?php 
$obj = new Db();
  $casy=new Casy();              
 if(isset($_GET['quocgia']))
{
  $quocgia = $_GET['quocgia'];
  $arrayName = array(":ma_quoc_gia" =>$quocgia);
$rows=  $casy->showalltheloai($arrayName);

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
    * FROM casy WHERE ma_quoc_gia like '$quocgia'
    LIMIT $a, $show ");
 ?>
    <div class="row"  style="margin-left: 3px">
     <?php  foreach($rows as $row)
           {    ?>
                 
               <div class="col-md-7 hieuung hvr-grow-shadow" >
                <a href="casyct?macasy=<?php echo $row['ma_ca_sy'];?>">
               <img src=" admins/<?php  echo $row['hinh_anh']; ?>" style="width: 100%;height: 200px;margin-top: 10px;">

</a>
                </div>
              <div class="col-md-5 hieuung hvr-grow-shadow" style="background: #3B3738
;color: white;margin-top: 10px;">
              <p style="margin-top: 30px;"> Tên ca sỹ: 
                 <?php echo $row["ten_ca_sy"]; ?></p>
                
                <p>Nghệ danh:  <?php echo $row["nghe_danh"]; ?></p>
                <p>Ngày Sinh:  <?php 
                $newDate = date("d-m-Y", strtotime($row["ngay_sinh"]));
                echo $newDate; 
                ?></p>
                <p>Giới Tính:  <?php  
                if($row["gioi_tinh"]==0)
               {
                   echo "Nữ";
               }
                else 
               {
                echo "Nam";
              }?></p>
                </div>
                <?php 
           } ?>
     </div>
     <div class="row">
        <div class="col-md-10 offset-6">Trang:  <?php  
      

      for($i=1;$i<=ceil(($slbh/$show));$i++)
      { ?>
        <a href="casy.php?quocgia=<?php echo $quocgia; ?>&trang=<?php echo $i; ?>" > <?php echo $i."" ;?></a>

        <?php
      } 
}
?>

        </div>
       </div>



     
  


