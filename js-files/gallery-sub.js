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

let next = document.querySelector('.next')
let prev = document.querySelector('.prev')

next.addEventListener('click', function(){
  let items = document.querySelectorAll('.item')
  document.querySelector('.slide').appendChild(items[0])
})

prev.addEventListener('click', function(){
  let items = document.querySelectorAll('.item')
  document.querySelector('.slide').prepend(items[items.length - 1]) // here the length of items = 10
})
