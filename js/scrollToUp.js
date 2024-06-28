const btns = document.querySelectorAll('#scrollUpBtn');

btns.forEach((btn) => {
    btn.addEventListener('click', () => {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
});
