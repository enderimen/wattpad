
<?php require_once 'config.php';
   if ($_SESSION['session_control'] == true) {
        include 'header.php';  
        @$story_category_sql  = mysqli_query( $connection , "SELECT category_name FROM categories"); 
?>
<div class="container">
  <div class="create-content">
    <form action="transaction.php" method="POST">
      <div class="story-info">

        <h2>Başlık</h2>
        <input type="text" name="story-title" placeholder="Başlıksız Hikaye" class="input" required="required">

        <h2>Açıklama</h2>
        <textarea name="story-desc" id="" cols="50" rows="20" required="required"></textarea>

        <h2>Tür</h2>
        <select name="select-genre" class="input" required="required">
          <?php while($story_category_data = mysqli_fetch_array($story_category_sql)) { ?>
          <option value="<?=$story_category_data['category_name']?>"><?=$story_category_data['category_name']?></option>
          <?php } ?>
        </select>
        <input type="submit" name="save-story-info" value="Kaydet" class="button">
      </div>
    </form>
  </div>

</div> 

<?php }else {
  header("Location:login.php");
} ?> 

<!--Js-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="js/customize.js"></script>

</body>
</html>