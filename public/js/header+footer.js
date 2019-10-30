function burgerMenu() {
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
}

function mobileFooterMenu() {
    var element = document.getElementById("help-menu");

    if (element.classList) { 
      element.classList.toggle("is-active");
    } else {
      var classes = element.className.split(" ");
      var i = classes.indexOf("is-active");
  
      if (i >= 0) 
        classes.splice(i, 1);
      else 
        classes.push("is-active");
        element.className = classes.join(" "); 
    }
}


function getViewportWidth() {
         // Define our viewportWidth variable
        var viewportWidth;

        // Set/update the viewportWidth value
        var setViewportWidth = function () {
            viewportWidth = window.innerWidth || document.documentElement.clientWidth;
        }

        // Log the viewport width type
        var logWidth = function () {
            if (viewportWidth > 1200) {
                logWidth = "Desktop";
            } 
            else if (viewportWidth > 900) {
                logWidth = "Tab-Landscape";
            }
            else {
                logWidth = "Mobile-Tab-Portrait";
            }
        }

        // Set our initial width and log it
        setViewportWidth();
        logWidth();

        // On resize events, recalculate and log
        window.addEventListener('resize', function () {
            setViewportWidth();
            logWidth();
    }, false);
}
