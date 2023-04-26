document.addEventListener("DOMContentLoaded", function() {
	var menuToggle = document.querySelector(".menu-toggle");
  
	if (menuToggle) {
	  menuToggle.addEventListener("click", function() {
		var nav = document.querySelector(".main-nav");
		nav.classList.toggle("mobile-nav");
		this.classList.toggle("is-active");
	  });
	}
  });