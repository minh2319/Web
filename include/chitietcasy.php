
<?php 
$obj = new Db();
  $a=0;
  $b=3;                 
 if(isset($_GET['macasy']))
{
  $macasy = $_GET['macasy'];
  
    $rows = $obj->select( "SELECT
    * FROM casy WHERE ma_ca_sy like '$macasy'
  ");
    ?>
    <div class="row"  style="margin-left: 4px;margin-top: 10px">

     <?php  foreach($rows as $row)
           {    ?>
               <div class="col-md-7 hieuung hvr-grow-shadow" >
               <img src=" admins/<?php  echo $row['hinh_anh']; ?>" style="width: 100%;height: 200px;">
                </div>
              <div class="col-md-5 hieuung hvr-grow-shadow" style="background: #3B3738
;color: white">
              <p style="margin-top: 30px;"> Tên ca sỹ: 
                 <?php echo $row["ten_ca_sy"]; ?></p>
                
                <p>Nghệ danh:  <?php echo $row["nghe_danh"]; ?></p>
                <p>Ngày Sinh:  <?php echo $row["ngay_sinh"]; ?></p>
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
    <div class="row" style="background:#74AFAD


;margin-left: 19px;margin-top: 5px;"> 


<div class="col-md-4">

<input type="button" class="btn-info"  name="tieusu" id="tieusu" onclick="load_ajax(1,'<?php echo $_GET['macasy'] ?>');" value="Tiểu Sử"/>

 </div>
<div class="col-md-4"> 
<input type="button" class="btn-info"  name="baihat" id="baihat" onclick="load_ajax(2,'<?php echo $_GET['macasy'] ?>');" value="Bài Hát"/>


</div>

<div class="col-md-4"> 
<input type="button" class="btn-info"  name="ablum" id="ablum" onclick="load_ajax(3,'<?php echo $_GET['macasy'] ?>');" value="Ablum"/>
</div>
    </div>

 <div class="row" style="margin-left: 19px"> 

<div class="col-md-12" id="result"><?php echo $rows[0]['gioi_thieu']; ?></a>
 </div>


    </div>

    <?php }
    ?>
    <script language="javascript">
            function load_ajax(stt,macs){
                $.ajax({
                    url : "casyresult.php?stt="+ stt+"&macs="+macs ,
                    type : "get",
                    dataType:"text",
                    success : function (result){
                        $('#result').html(result);
                    }
                });
            }
        </script>
     
  


