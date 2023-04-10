// popup
let popup = document.getElementById("myPopup");
let cartButton = document.getElementById("hero-cart-button");
let profileButton = document.getElementById("hero-profile-button");
let profileMenu = document.querySelector("#profile-menu");
cartButton.addEventListener("click",function(){
    openPopup();
})
// Function to open the popup
function openPopup() {
    popup.style.display = "block";
}

// Function to close the popup
function closePopup() {
    popup.style.display = "none";
}

// Close the popup when the user clicks outside of it
window.onclick = function(event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}
// Add an event listener to the document that listens for a click
document.addEventListener("click", function(event) {
  // Check if the clicked element is not the dropdown menu itself and is not a child of the dropdown menu
  if (!event.target.matches(".dropbtn") && !profileMenu.contains(event.target)) {
    // Remove the "show" class from the dropdown menu
    profileMenu.classList.remove("show");
  }
});

// Add an event listener to the dropdown button that toggles the "show" class on the dropdown menu
document.querySelector(".dropbtn").addEventListener("click", function() {
    profileMenu.classList.toggle("show");
});


