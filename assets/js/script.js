function showLoginForm() {
  const loginFormOverlay = document.getElementById('loginFormOverlay');
  const registerFormOverlay = document.getElementById('registerFormOverlay');
  loginFormOverlay.classList.add('active');
  registerFormOverlay.classList.remove('active');
}

function showRegisterForm() {
  const loginFormOverlay = document.getElementById('loginFormOverlay');
  const registerFormOverlay = document.getElementById('registerFormOverlay');
  registerFormOverlay.classList.add('active');
  loginFormOverlay.classList.remove('active');
}


function redirectToProductsPage(category) {
  if (category === 'skin-code') {
    window.location.href = 'skin-code-products.html';
  }
  // Add similar conditions for other categories if needed

  var counter = 1;

  setInterval(function(){
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if(counter > 4){
      counter = 1;
    }
  }, 5000);
}

var slides = document.querySelectorAll('.slide');
var btns = document.querySelectorAll('.btnl');
let currentSlide = 1;

//javascript for manual navigation
     var manualNav = function(manual){
      slides.forEach((slide)=>{
        slide.classList.remove('active');

        btns.forEach((btn)=>{
          btn.classList.remove('active');
        });
      });

      slides[manual].classList.add('active');
      btns[manual].classList.add('active');
     }


     btns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
          manualNav(i);
          currentSlide -i;
        });
     });

     //javascript for automatic nav slider
     var repeat = function(activeClass){
      let active = document.getElementsByClassName('active');
      let i=1;

      var repeater = () => {
        setTimeout(function(){
          [...active].forEach((activeSlide) =>{
            activeSlide.classList.remove('active');
          });
          slides[i].classList.add('active');
          btns[i].classList.add('active');
          i++;

          if(slides.length == i){
            i = 0;
          }
          if(i>= slides.length){
            return;
          }
          repeater();
        }, 8000);
      }
      repeater();
    }
    repeat();
