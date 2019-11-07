<nav class="level navbar is-light is-fixed-top has-shadow" role="navigation" aria-label="main navigation">
  <div class="level-left navbar-brand">
    <a class="navbar-item" href="/home">
      <img src="../../img/Camagru-transp-long5.png" alt="Home">
    </a>
  </div>
  <div id="navbarMenu" class="level-right navbar-menu">
    <div class="level-item navbar-start">
      <a href="/gallery" class="level-item navbar-item">
        Gallery
      </a>
      <a href="/userhome" class="level-item navbar-item">
        My Posts
      </a>
      <a onclick="loadSnippet('AddPost')" class="level-item navbar-item">
        Add a Post
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="level-item navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a href="/editaccount"class="navbar-item">
            Edit my Account
          </a>
          <hr class="navbar-divider">
          <a onclick="loadSnippet('ReportAUser')" class="navbar-item">
            Report a User
          </a>
        </div>
      </div>
    </div>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="/users/logout" style="margin-left: -.75rem">
            <strong>Log out</strong>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>