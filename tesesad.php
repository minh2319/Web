   
   <?php if(isset($_FILES["hinh"]))
   { 
    $h= $_FILES["hinh"];
    $ten = $h["name"];
    $tam = $h["tmp_name"];
    move_uploaded_file($tam,"image\trangchu\ablum_hot".$ten);
}
?>
 <form action="tesesad.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">

    <table  align="center">

    <tr><td>Hình:</td><td><input type="file" name="hinh"/></td></tr>
</table>

      </div>
     
       <input type="submit" value="Thêm" name="submit">
       </form>
