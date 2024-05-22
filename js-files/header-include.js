class headerContent extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <header>
        <div>
          <a href="home-page.html">
            <img class="logo" src="logo,profile/photography-logo.png" alt="logo">
          </a>
        </div>
        <div class="nav-links">
          <a href="home-page.html" class="link">
            Home
          </a>
          <a href="about-me.html" class="link">
            About Me
          </a>
          <a href="my-work.html" class="link">
            My Work
          </a>
          <a href="services.html" class="link">
            Services
          </a>
          <a href="bookings.html" class="link">
            Booking Enquiries
          </a>
        </div>
        <button class="btn-login">
          <a href="login-pg.html">LOGIN</a>
        </button>
      </header>
    `
  }
}
customElements.define('site-header', headerContent);