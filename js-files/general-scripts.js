// adding reveal on scroll effect to footer
window.addEventListener('scroll', function() {
var footer = document.querySelector('footer');
var scrollTop = window.scrollY;
var windowHeight = window.innerHeight;
var documentHeight = document.body.scrollHeight;
// Check if the user has scrolled to the bottom of the page
if (scrollTop + windowHeight >= documentHeight) {
  footer.classList.add('footer-visible');
} else {
  footer.classList.remove('footer-visible');
}
});


// active link indicator for header
const activePage = window.location.pathname;
const navLinks = document.querySelectorAll('.link').forEach(theLink => {
  if (theLink.href.includes(`${activePage}`)) {
    theLink.classList.add('active');
  }
});