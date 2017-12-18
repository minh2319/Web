 <?php $obj = new Db();//tu dong load file classes/Db.class.php
  $tonghop = new Tonghop(); 
$rows=$tonghop->bxh();
  ?>


<div class="col-12 col-sm-6 col-md-12 col-xl-8" style="background: #292929" >
                <p><a href="#" style="font-size: 25px; text-decoration: none; color:white">Bảng Xếp Hạng</a></p>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td colspan="3">
                                <h2>Việt Nam</h2></td>
                        </tr>


<?php $i=1;
    foreach($rows as $row)
    {
       
 ?>
                        <tr>
                            <td>
                                <h3><?php  echo $i; ?></h3></td>
                            <td class="tenbhbxh"><a href="baihat.php?mabh=<?php echo $row['ma_chi_tiet_bh'];?>" style="color :white;"><?php echo $row["ten_bai_hat"];?></a>
                                <a href="">
                                    <div class="tencasi"><?php echo $row["ten_ca_sy"];?></div>
                                </a>
                        
                               <div style="color: #8A3030">Lượt Nghe: </div><?php echo $row["luot_nghe"];?>
                            </td>
                        </tr>
                       
                       <?php 
                       $i++;
                       
}
                       ?>
                    </table>
                </div>
            </div>