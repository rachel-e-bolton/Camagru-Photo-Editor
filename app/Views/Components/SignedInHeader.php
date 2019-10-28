<nav class="level navbar is-light is-fixed-top has-shadow" role="navigation" aria-label="main navigation">
  <div class="level-left navbar-brand">
    <a class="navbar-item" href="/home">
      <img src="img/Camagru-transp-long5.png" alt="Home">
    </a>

    <script>
    document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
    el.addEventListener('click', () => {

      // Get the target from the "data-target" attribute
      const target = el.dataset.target;
      const $target = document.getElementById(target);

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

        });
    });
    }
    });
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
        Gallery
      </a>
      <a class="level-item navbar-item">
        My Posts
      </a>
      <a class="level-item navbar-item">
        Add a Post
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="level-item navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            Edit my account
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Report a user
          </a>
        </div>
      </div>
    </div>
    <div class="navbar-end">
      <input class="navbar-item input" type="text" name="searchQuery" placeholder="Search for posts..." style="max-width: 95%; padding: 1rem; margin: .5rem;" />
      <input class="navbar-item button is-primary" type="submit" name="search" value="Search" style="color: white; font-weight: bolder; margin: .5rem;" />
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" style="margin-left: -.25rem">
            <strong>Log out</strong>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>