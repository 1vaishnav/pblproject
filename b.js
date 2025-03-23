
/*Javascript code save as script1.js*/

/* Smooth Scrolling for Navigation Links and Highlight Active Link */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
  
      // Smooth scrolling
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
  
      // Remove active class from all links
      document.querySelectorAll('nav ul li a').forEach(link => {
        link.classList.remove('active');
      });
  
      // Add active class to the clicked link
      this.classList.add('active');
    });
  });  
  
  
  