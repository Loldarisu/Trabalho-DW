let darkmode = sessionStorage.getItem('darkmode');
darkmode = (darkmode === 'true');

function darkMode() {
    document.body.classList.toggle("dark-mode");
    darkmode = !darkmode;
    sessionStorage.setItem('darkmode', darkmode);
    document.getElementById("darkModeIcon").classList.toggle("fa-sun");
    document.getElementById("darkModeIcon").classList.toggle("fa-moon");
}

function ActiveDarkMode(){
    document.body.className = '';

    if (darkmode == true) {
        document.getElementById("darkModeIcon").classList.remove("fa-moon");
        document.getElementById("darkModeIcon").classList.add("fa-sun");
        document.body.classList.add("dark-mode");
    }
}


