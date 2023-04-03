const clickMenu = document.querySelectorAll('.click-menu');
clickMenu[0].addEventListener('click', function() {
    clickMenu[0].classList.toggle('active');
    clickMenu[1].classList.remove('active');
});
clickMenu[1].addEventListener('click', function() {
    clickMenu[1].classList.toggle('active');
    clickMenu[0].classList.remove('active');
});