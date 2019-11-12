<nav class="level navbar is-light is-fixed-top has-shadow is-hidden-touch" role="navigation" aria-label="main navigation">
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
      <a href="/accounts/edit" class="navbar-item">
        Edit my Account
      </a>
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

<div class="is-hidden-desktop is-mobile">
  <nav class="navbar is-light is-fixed-top has-shadow is-hidden-desktop is-mobile" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="/home">
        <img src="../../img/Camagru-transp-long5.png" alt="Home">
      </a>
      <a class="button is-primary is-left" href="/users/logout" style="margin: .5rem;">
        <strong>Log out</strong>
      </a>
    </div>
    <div id="menu-menu" class="navbar-item has-dropdown is-hoverable is-mobile" style="padding-left: .75rem; padding-right: .75rem;"> 
      <a onclick="mobileFooterMenu()" id="help-link" class="navbar-link is-large is is-primary">
        Menu
      </a>
      <div class="navbar-dropdown">
        <a href="/gallery" class="navbar-item">
          Gallery
        </a>
        <a href="/userhome" class="navbar-item">
          My Posts
        </a>
        <a onclick="loadSnippet('AddPost')" class="navbar-item">
          Add a Post
        </a>
        <a href="/useraccount" class="navbar-item">
          Edit my Account
        </a>
      </div>
    </div>
  </nav>
  <div style="margin-bottom: 4.5rem;"></div>
</div>