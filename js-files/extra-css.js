document.addEventListener("DOMContentLoaded", function() {
  // Function to check for the presence of the query parameter
  function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.has(param);
  }

  // Checking if the query parameter 'apply_extra_css' is present
  if (getQueryParam('apply_extra_css')) {
    // If the query parameter is present, dynamically adding the extra CSS file
    const extraCssLink = document.createElement('link');
    extraCssLink.rel = 'stylesheet';
    extraCssLink.href = 'styles/dashboard-alter-photo.css';
    document.head.appendChild(extraCssLink);
  }
});
