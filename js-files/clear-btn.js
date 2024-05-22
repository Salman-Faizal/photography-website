let btnReset = document.querySelector('.btn-reset');
let inputs = document.querySelectorAll('.form input');
let image = document.querySelector('.img-display img');

btnReset.addEventListener('click', () => {
  inputs.forEach(input => input.value = '');

  const radioBtns = document.querySelectorAll("input[type = 'radio']");
  radioBtns.forEach(radioBtn => {
    if (radioBtn.checked === true) {
      radioBtn.checked = false;
    }
  });

  //to clear the image holder
  image.src = '';
});