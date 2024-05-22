// Checking for error parameter in URL
const urlParams = new URLSearchParams(window.location.search);
const error = urlParams.get('error');

// Displaying error message if present
if (error === '1') {
    alert("Incorrect email or password!");
}
