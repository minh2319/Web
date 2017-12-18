 <?php
  $tonghop=new Tonghop();
  $rows=$tonghop->quocgia();
  $theloai=$tonghop->theloai();
  ?>

<div class="row">
        <div class="menubar" style="height: 50px; margin-top: 50px; ">
            <div class="container-fluid">
                <div class="btn-group" role="group " aria-label="Button group with nested dropdown">
                    <div class="btn-group " role="group ">
                        <div class="dropdown ">
                            <button class="dropbtn hvr-buzz-out">Bài hát</button>
                            <div class="dropdown-content ">
                                <?php   
                                foreach($rows as $row)
                             { ?>   
                                <a href='nhac.php?quocgia=<?php echo $row['ma_quoc_gia'];?> '> <?php echo $row['ten_quoc_gia']?> </a>
                             <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group " role="group ">
                        <div class="dropdown ">
                            <button class="dropbtn hvr-buzz-out">Thể Loại</button>
                            <div class="dropdown-content ">
                                 <?php   
                                foreach($theloai as $tentl)
                             { ?>   
                                <a href='nhac.php?theloai=<?php echo $tentl['ma_the_loai'];?> '> <?php echo $tentl['ten_the_loai']?> </a>
                             <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group " role="group ">
                        <div class="dropdown ">
                            <button class="dropbtn hvr-buzz-out">Ablum</button>
                            <div class="dropdown-content ">
                                  <?php   
                                foreach($theloai as $tentl)
                             { ?>   
                                <a href='dsablum.php?theloai=<?php echo $tentl['ma_the_loai'];?>'> <?php echo $tentl['ten_the_loai']?> </a>
                             <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group " role="group ">
                        <div class="dropdown ">
                            <button class="dropbtn hvr-buzz-out">Ca Sỹ</button>
                            <div class="dropdown-content ">
                                <?php   
                                foreach($rows as $row)
                             { ?>   
                                <a href="casy.php?quocgia=<?php echo $row['ma_quoc_gia'];?>"> <?php echo $row['ten_quoc_gia']?> </a>
                             <?php } ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>