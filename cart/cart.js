// Popup
const $cart = $("#cart-menu");
const $blocker = $("#blocker");
const $profileMenu = $("#profile-menu");
const $paymentOptions = $("#payment_option");

// Function to open the popup
function openCart() {
  $cart.css("display", "flex");
  openBlocker();
}

function closePopup() {
  $cart.hide();
  $profileMenu.hide();
  $paymentOptions.hide();
  $blocker.hide();
}

function openBlocker() {
  $blocker.show();
}

// Profile menu open
function openProfile() {
  openBlocker();
  $profileMenu.show();
}

function openOption() {
  $paymentOptions.show();
  $cart.hide();
  openBlocker();
}

function closeOptions() {
  $paymentOptions.hide();
  openCart();
}
