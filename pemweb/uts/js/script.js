function applyTheme() {
    const body = document.body;
    const theme = localStorage.getItem('theme') || 'light';
    const themeIcon = document.getElementById('themeIcon');
    body.className = theme;


    if (theme === 'dark') {
        body.style.backgroundImage = "url('images/afternoon.jpg')";
        themeIcon.style.className = 'bi bi-moon';
    } else {
        body.style.backgroundImage = "url('images/night.jpg')";
        themeIcon.style.className = 'bi bi-sun';
    }
}

document.getElementById('themeToggle').addEventListener('click', function () {
    const body = document.body;
    const themeIcon = document.getElementById('themeIcon');
    let theme = localStorage.getItem('theme') || 'light';

    if (theme === 'light') {
        theme = 'dark';
        themeIcon.className = 'bi bi-moon';
    } else {
        theme = 'light';
        themeIcon.className = 'bi bi-sun';
    }

    localStorage.setItem('theme', theme);
    applyTheme();
});

applyTheme();
