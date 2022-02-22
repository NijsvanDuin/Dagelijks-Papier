window.addEventListener('scroll', function() {
    var scrollY = window.scrollY;

    if (window.scrollY > 80) {
        document.querySelector('nav').classList.add('small');
    } else {
        document.querySelector('nav').classList.remove('small');
    }
});