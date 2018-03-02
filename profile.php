    <?php include 'header.php'; ?>

    <div class="timeline-image">
      <img src="img/logo.png" alt="Avatar">
      <h1>Ender İMEN</h1>
      <p>@enderimen</p>

      <div class="details">
        <div class="post">
          <span>1</span>
          <div>Post</div>
        </div>
        <div class="reading-list">
          <span>1</span>
          <div>Reading List</div>  
        </div>
        <div class="followers">
          <span>1</span>
          <div>Followers</div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'about')">About</button>
        <button class="tablinks" onclick="openTab(event, 'following')">Following</button>
        <button class="tablinks" onclick="openTab(event, 'edit-profil')">Edit Profil</button>
      </div>

      <div id="about" class="tabcontent show">
        <div class="bio">
          <p>İnsanların sizi tanımalarına izin verin.</p>
          <form action="">
            <input type="submit" value="Add Description" class="button">
          </form>
          <p>JoinedNovember 27, 2017</p>
        </div>

        <div class="myStory">
          <div class="header-mystory">
            <h1>My Strories</h1>
          </div>
          <div class="storyDetails">
            <div class="storyCover">
              <img src="img/logo.png" alt="Resimsiz">
            </div>
            <div class="story-feature">
              <div class="story-title">
                <h3>Untitled</h3>
              </div>
              <div class="icons">
                <span>.</span>
                <span>.</span>
                <span>.</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="following" class="tabcontent">
        <h3>Following</h3>
      </div>

      <div id="edit-profil" class="tabcontent">
        <div class="form-element">
          <p>JoinedNovember 27, 2017</p>
        </div>
      </div>
    </div>

    <!--Javascript-->
    <script>
      /*Profil Sayfası Tab Menu*/

      function openTab(evt, tabName) {

        var i, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("tabcontent");

        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks");

        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(tabName).style.display = "flex";
        evt.currentTarget.className += " active";
      }
    </script>
    <script src="js/customize.js"></script>
    <script src="js/fontawesome.min.js"></script>
    
  </body>
  </html>