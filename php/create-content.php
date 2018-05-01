
<?php require_once 'config.php'; include 'header.php'; ?>

<div class="container">
  <div class="create-content">
    <form action="transaction.php" method="POST">
      <div class="story-cover">
        <img src="../img/book1.jpg" alt="" height="300" width="200" id="story-upload">
        <input type="file" name="story-cover-file" id="story-cover-file" hidden="hidden">
      </div>
      
      <div class="story-info">

        <h2>Title</h2>
        <input type="text" name="story-title" placeholder="Untitled Story" class="input" required="required">
        
        <h2>Description</h2>
        <textarea name="story-desc" id="" cols="50" rows="10" required="required"></textarea>

        <h2>Genre</h2>
        <select name="select-genre" class="input" required="required">
          <option value="-1">Select a genre</option>
          <option value="14">Action</option>
          <option value="11">Adventure</option>
          <option value="24">ChickLit</option>
          <option value="6">Fanfiction</option>
          <option value="3">Fantasy</option>
          <option value="21">General Fiction</option>
          <option value="23">Historical Fiction</option>
          <option value="9">Horror</option>
          <option value="7">Humor</option>
          <option value="8">Mystery / Thriller</option>
          <option value="16">Non-Fiction</option>
          <option value="12">Paranormal</option>
          <option value="2">Poetry</option>
          <option value="19">Random</option>
          <option value="4">Romance</option>
          <option value="5">Science Fiction</option>
          <option value="17">Short Story</option>
          <option value="13">Spiritual</option>
          <option value="1">Teen Fiction</option>
          <option value="18">Vampire</option>
          <option value="22">Werewolf</option>
        </select>
        <input type="submit" name="save-story-info" value="Save Story" class="button">
      </div>
    </form>
  </div>

</div>  

<!--Js-->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="../js/customize.js"></script>

</body>
</html>