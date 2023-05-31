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
}
