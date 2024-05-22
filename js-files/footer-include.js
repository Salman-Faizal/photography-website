class footerContent extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <footer>
        <div class="container">
          <div class="business-details">
            <a href="home-page.html">
              <img class="logo-footer" src="logo,profile/logo-footer.png" alt="logo">
            </a>
            <p>
              Capturing the beauty of nature, the magic of wildlife, and the joy of lifes's special moments. Our passion lies in freezing time, one frame at a time. Explore our portfolio and let us tell your story through our Lens
            </p>
          </div>

          <div>
            <div class="footer-title">
              Links
            </div>
            <div class="footer-links">
              <a href="" target="_blank">
                FAQ
              </a>
              <a href="" target="_blank">
                Payment options
              </a>
              <a href="" target="_blank">
                Privacy Policy
              </a>
              <a href="" target="_blank">
                Terms of use
              </a>
            </div>
          </div>

          <div>
            <div class="footer-title">
              Contacts
            </div>
            <div class="contacts">
              <div>
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <p>
                  malcom.lismore@gmail.com
                </p>
              </div>
              <div>
                <i class="fa fa-phone" aria-hidden="true"></i>
                <p>
                  +1 (234)5678901
                </p>
              </div>
            </div>
          </div>

          <div>
            <div class="footer-title">
              Follow us
            </div>
            <div class="social-links">
              <a href="https://web.facebook.com/login.php/?_rdc=1&_rdr" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://twitter.com/?lang=en" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://www.instagram.com/accounts/login/" target="_blank">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="https://www.linkedin.com/login" target="_blank">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="trademark">
          Copyright &#169; 2024 MalcomLismore, Inc.
        </div>
      </footer>
    `
  }
}

customElements.define('site-footer', footerContent);