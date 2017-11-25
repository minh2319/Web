<!doctype html>
<html lang="en">

<head>
    <title>STUMP3</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="image/logo/music_1.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
	
   <!--Top menu -->
    <?php include ("include/top_menu.php"); ?>
    <!--Top menu -->


    <!--menu bar-->
      <?php include ("include/menubar.php"); ?>
    <!--menu bar-->
  
    <div class="row" style="margin-top: 10px;">
        <!-- Slide -->
         <?php include ("include/slide.php"); ?>
        <!-- Slide -->


        <!-- banner -right -->
          <?php include ("include/banner-right.php"); ?>
        <!-- banner -right -->
    </div>
    <!-- Bài hát ablum và bxh -->
    <div class="row">
        <div class="col-md-8">
          <!--bài hát mới -->
          <?php include ("include/bai-hat-moi.php"); ?>
        <!-- bài hát mới -->
           

          <!--Ablum mới -->
          <?php include ("include/ablum-moi.php"); ?>
        <!--Ablum mới -->
           
        </div>
        <!-- Bảng xếp hạng -->
        <div class="col-md-4">
            
  <?php include ("include/bxh.php"); ?>
        </div>
        <!-- Bảng xếp hạng -->
    </div>
    <!-- Bài hát ablum và bxh -->


    <!--footer -->
  <?php include ("include/footer.html"); ?>
                <!--footer -->
    <script type="text/javascript " src="js/jquery-3.2.1.min.js "></script>
    <script type="text/javascript " src="js/bootstrap.min.js ">
    $(function() {
                $('.carousel').carousel({
                    pause: "false"

                });
    </script>
    <script type="text/javascript " src="js/bootstrap.bundle.min.js "></script>
</body>

</html>