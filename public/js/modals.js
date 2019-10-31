function toggleModal() {
    var element = document.getElementById("menu-menu");

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