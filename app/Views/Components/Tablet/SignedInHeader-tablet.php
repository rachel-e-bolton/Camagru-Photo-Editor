<nav class="level navbar is-light is-fixed-top has-shadow" role="navigation" aria-label="main navigation">
  <div class="level-left navbar-brand">
    <a class="navbar-item" href="/home">
      <img src="/img/Camagru-transp-long2.png" alt="Home">
    </a>
    <input class="navbar-item input" type="text" name="searchQuery" placeholder="Search for posts..." style="max-width: 75%; padding: 1rem; margin: .5rem;" />
      <input class="navbar-item button is-primary" type="submit" name="search" value="Search" style="color: white; font-weight: bolder; margin: .5rem; margin-left: -.25rem" />
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" style="margin-left: -.75rem">
            <strong>Log out</strong>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<div class="columns" style="margin: .2rem">
  <div id="menu-menu" class="column is-half navbar-item has-dropdown has-dropdown-up is-hoverable is-mobile"> 
    <a onclick="mobileFooterMenu()" id="help-link" class="navbar-link is-large is is-primary">
      Menu
    </a>
    <div class="navbar-dropdown">
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
    </div>
  </div>
  <div id="help-menu" class="column is-half navbar-item has-dropdown has-dropdown-up is-hoverable is-mobile"> 
    <a onclick="mobileFooterHelp()" id="help-link" class="navbar-link is-large is is-primary">
      Help
    </a>
    <div class="navbar-dropdown">
        <a class="navbar-item">
          Contact Us
        </a>
        <a class="navbar-item">
          Privacy Policy
        </a>
        <a class="navbar-item">
          Terms of Use
        </a>
        <a class="navbar-item">
          Report an Issue
        </a>
    </div>
  </div>
</div>