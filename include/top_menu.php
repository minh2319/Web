 <div class="row">
            <div class="row">
                <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="height: 60px;">
                    <a class="navbar-brand" href="index.php"><img src="image/trangchu/logo/2_Flat_logo_on_transparent_145x71.png"  width="90px" height="50px" ></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation" style="background: #0B0101">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-dark" id="navbarsExampleDefault" style="margin-top: -5px">
                        <ul class="navbar-nav mr-auto" style="font-size:20px">
                            <li class="nav-item active">
                                <a class="nav-link textmenubar" href="tintuc.php" style="margin-top: 4px;margin-left: 10px;">Tin tức </a>
                            </li>
                            <li class="nav-item active ">
                                <a class="nav-link textmenubar " href="nhac.php" style="margin-right: 20px; margin-top:4px;margin-left:5px;width: 90px; ">Nhạc</a>
                            </li>
                            <li class="nav-item active ">
                                <form>
                                    <div class="input-group" height: 35px;">
                                        <input type="text" class="form-control" style="height: 38px; margin-top: 10px;" placeholder="Tìm kiếm">
                                        <div class="input-group-btn" style="margin-top: 8px;"">
                                            <button class="btn btn-default" type="submit">
                                                <img src="image/trangchu/logo/if_icon-111-search_314689.svg" style="width: 30px;height: 26px">
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <div class="btn-group text-right" role="group" style="margin-left: 150px;">
                               
                    <?php 
                 
             if(isset($_GET['action']) && $_GET['action']=='login') 
                    {

                            if(isset($_SESSION['link'])) 
                            {
                                $link=$_SESSION['link'];
                            }
                        $tonghop = new Tonghop();
                        $username=addslashes($_POST['username']);
                         $password=addslashes($_POST['password']);
                         $arr=array(":username"=>$username);
                         $rows=$tonghop->login($arr);
                         foreach ($rows as $row) 
                         {
                             $datausername=$row['username'];
                             $datapassword=$row['mat_khau'];
                             $_SESSION['avartar']='admins/'.$row['hinh_anh'];
                             $_SESSION['tv_id']=$row['id'];
                         }
                         if(count($rows)<1 ||$datapassword!=$password )
                         {
                                 echo "<SCRIPT type='text/javascript'>
                                        alert('Sai Mật khẩu hoặc tên truy cập. Đăng nhập thất bại');
                                        window.location.replace(\"$link\");
                                    </SCRIPT>";
                         }
                         else if($datapassword==$password )
                         {   
                            $_SESSION['username'] = $datausername;
                            echo"<SCRIPT type='text/javascript'> alert('Chào $datausername. Đăng nhập thành công');</SCRIPT>";
                          }
                          echo "<SCRIPT type='text/javascript'>
                                        window.location.replace(\"$link\");
                                    </SCRIPT>";
                      }
                      if(isset($_SESSION['username']))
                    { 
                         ?>
                            <?php 
   function curPageURL() 
   {
      $pageURL = 'http';
       if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
      $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
       $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
      }
       return $pageURL;
    }
    $_SESSION['link']=curPageURL();

?>
                             <li class="nav-item active">
                                    <a class="nav-link " href="taikhoan.php"> <img src="<?php echo $_SESSION['avartar'];?>" style="width: 42px; height: 42px; border-radius:50%;-moz-border-radius:50%;-webkit-border-radius:50%;">
                                    </a>
                                </li>
                            <li class="nav-item active ">
                                 <a href="taikhoan.php" class=" btn btn-primary btn-cta hvr-wobble-horizontal" style="font-size: 15px;margin-top: 10px; width:110px;"><?php echo $_SESSION['username'] ?> </a></li>
                            <li class="nav-item active ">
                                <a href="logout.php?link=<?php echo $_SESSION['link']; ?>">
                                    <button class=" btn btn-primary btn-cta hvr-wobble-horizontal" style="margin-top: 10px; margin-left: 10px; width:70px; background: #EA5B76;font-size: 15px;"> Thoát </button>
                                    </a>
                             </li> 
                      <?php } 
                    else
                { ?>
                    <li class="nav-item active">
                                    <a class="nav-link ">
                                        <img src="admins/image/trangchu/logo/if_profle_1055000.png" style="width: 40px; height: 40px;">
                                    </a>
                                </li>
                         <li class="nav-item active ">
                          <a href="dangky.php">
                            <button class=" btn btn-primary btn-cta hvr-wobble-horizontal" style="margin-top: 10px; width:100px; background: #EA5B76"> Đăng ký </button>  </a>
                                </li>
                                <li class="nav-item active ">
                                <?php include('popupdangnhap.php'); ?>                             
                                </li>
                <?php }?>
                            </div>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>