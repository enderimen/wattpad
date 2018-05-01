
    <?php require_once 'config.php'; include 'header.php'; ?>

      <div class="container-story">
        <div class="head">
          <h1>My Works</h1>
            <a href="create-content.php"><input type="submit" value="+New Story" class="button"></a>
        </div>
        <div class="content">
          <img src="img/logo.png" alt="Cover Image" title="Cover" class="image-style">
          <div class="story-detail">
            <h3>Untitled Story</h3>
            <p>Updated Date:</p>
            <div class="story-other">
              <span><i class="far fa-eye"></i></span>
              <span><i class="fal fa-star"></i></span>
              <span><i class="fal fa-comment"></i></span>
            </div>
          </div>
          <div class="writing">
            <input type="submit" value="New Part" class="button">
          </div>
        </div>
      </div>
  </body>
</html>