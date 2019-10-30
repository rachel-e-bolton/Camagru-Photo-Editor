<nav class="navbar is-light is-fixed-top has-shadow" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="/home">
      <img src="../../img/Camagru-transp-long5.png" alt="Home">
    </a>
    <script>
      window.burgerMenu();
    </script>
    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarMenu">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navbarMenu" class="level-right navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        Gallery
      </a>
      <a class="navbar-item">
        My Posts
      </a>
      <a class="navbar-item">
        Add a Post
      </a>
      <a class="navbar-item">
        Edit my Account
      </a>
      <a class="navbar-item">
        Report a User
      </a>
    </div>
    <div class="navbar-end">
      <input class="navbar-item input" type="text" name="searchQuery" placeholder="Search for posts..." style="max-width: 95%; padding: 1rem; margin: .5rem;" />
      <input class="navbar-item button is-primary" type="submit" name="search" value="Search" style="color: white; font-weight: bolder; margin: .5rem;" />
      <div class="navbar-item">
      </div>
    </div>
  </div>
</nav>