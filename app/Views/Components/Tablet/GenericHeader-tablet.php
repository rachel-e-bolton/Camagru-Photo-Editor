<nav class="level navbar is-light is-fixed-top has-shadow" role="navigation" aria-label="main navigation">
  <div class="level-left navbar-brand">
    <a class="navbar-item" href="/home">
      <img src="../../img/Camagru-transp-long2.png" alt="Home">
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
    <div class="level-item navbar-start">
      <a class="level-item navbar-item">
        Browse
      </a>
      <!-- <div class="navbar-item has-dropdown is-hoverable">
        <a class="level-item navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            About
          </a>
          <a class="navbar-item">
            Contact
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Report an issue
          </a>
        </div>
      </div> -->
    </div>
    <div class="navbar-end">
      <input class="navbar-item input" type="text" name="searchQuery" placeholder="Search for posts..." style="max-width: 75%; padding: 1rem; margin: .5rem;" />
      <input class="navbar-item button is-primary" type="submit" name="search" value="Search" style="color: white; font-weight: bolder; margin: .5rem;" />
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" style="margin-left: -.25rem">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light" >
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>