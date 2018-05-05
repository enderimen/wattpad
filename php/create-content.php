
<?php require_once 'config.php'; include 'header.php'; ?>

<div class="container">
  <div class="create-content">
    <form action="transaction.php" method="POST">
      <div class="story-info">

        <h2>Title</h2>
        <input type="text" name="story-title" placeholder="Untitled Story" class="input" required="required">

        <h2>Description</h2>
        <textarea name="story-desc" id="" cols="50" rows="10" required="required"></textarea>

        <h2>Genre</h2>
        <select name="select-genre" class="input" required="required">
          <option value="-1">Select a genre</option>
          <option value="Action">Action</option>
          <option value="Adventure">Adventure</option>
          <option value="ChickLit">ChickLit</option>
          <option value="Fanfiction">Fanfiction</option>
          <option value="Fantasy">Fantasy</option>
          <option value="General Fiction">General Fiction</option>
          <option value="Historical Fiction">Historical Fiction</option>
          <option value="Horror">Horror</option>
          <option value="Humor">Humor</option>
          <option value="Mystery / Thriller">Mystery / Thriller</option>
          <option value="Non-Fiction">Non-Fiction</option>
          <option value="Paranormal">Paranormal</option>
          <option value="Poetry">Poetry</option>
          <option value="Random">Random</option>
          <option value="Romance">Romance</option>
          <option value="Science Fiction">Science Fiction</option>
          <option value="Short Story">Short Story</option>
          <option value="Spiritual">Spiritual</option>
          <option value="Teen Fiction">Teen Fiction</option>
          <option value="Vampire">Vampire</option>
          <option value="Werewolf">Werewolf</option>
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