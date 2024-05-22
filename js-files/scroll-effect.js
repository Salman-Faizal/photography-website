const wrapper = document.querySelector(".wrapper");
const gallery = document.querySelector(".gallery");
const arrowBtns = document.querySelectorAll(".wrapper a");
const firstCardWidth = gallery.querySelector(".card").offsetWidth;
const galleryChildren = [...gallery.children];

let isDragging = false, startX, startScrollingLeft, timeOutID;

// obtaining the number of cards at once on the gallery
let cardPerView = Math.round(gallery.offsetWidth / firstCardWidth);

// inserting copies of the last few cards to the beginning of the gallery for infinte scroll effect
galleryChildren.slice(-cardPerView).reverse().forEach(card => {
  gallery.insertAdjacentHTML("afterbegin", card.outerHTML);
})

// inserting copies of the last few cards to the beginning of the gallery for infinte scroll effect
galleryChildren.slice(0, cardPerView).reverse().forEach(card => {
  gallery.insertAdjacentHTML("beforeend", card.outerHTML);
})

// adding eventListeners for both the arrows to sroll to the left and right
arrowBtns.forEach(btn => {
  btn.addEventListener("click", () => {
    gallery.scrollLeft += btn.id === "prev" ? -firstCardWidth: firstCardWidth;
  })
});

const dragStart = (e) => {
  isDragging = true;
  gallery.classList.add("dragging");
  // used to record the initial cursor and scroll position of the gallery
  startX = e.pageX;
  startScrollingLeft = gallery.scrollLeft;
}

const dragging = (e) => {
  if (!isDragging) return;
  gallery.scrollLeft = e.pageX;
  // used to update the scroll position of the gallery based on the cursor movement
  gallery.scrollLeft = startScrollingLeft - (e.pageX - startX);
}

const dragStop = () => {
  isDragging = false;
  gallery.classList.remove("dragging");
}

// autoplay gallery after every 2500 ms
const autoPlay = () => {
  if (window.innerWidth < 800) return; // if screen width is less than 800 exit
  timeOutID = setTimeout(() => gallery.scrollLeft -= firstCardWidth, 2500);
}
autoPlay();

const infiniteScroll = () => {
  // if the gallery at the beginning, scroll to the end
  if (gallery.scrollLeft === 0) {
    gallery.classList.add("no-transition");
    gallery.scrollLeft = gallery.scrollWidth - (2 * gallery.offsetWidth);
    gallery.classList.remove("no-transition");
  }
  // if the gallery at the end, scroll to the beginning
  else if(Math.ceil(gallery.scrollLeft) === gallery.scrollWidth - gallery.offsetWidth) {
    gallery.classList.add("no-transition");
    gallery.scrollLeft = gallery.scrollWidth / 3 - gallery.offsetWidth;
    gallery.classList.remove("no-transition");
  }
  // clear existing timeout and start autoplay if mouse is not hovering over gallery
  clearTimeout(timeOutID);
  if (!wrapper.matches(":hover")) autoPlay();
}

gallery.addEventListener("mousedown", dragStart);
gallery.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
gallery.addEventListener("scroll", infiniteScroll);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeOutID));
wrapper.addEventListener("mouseleave", autoPlay);
