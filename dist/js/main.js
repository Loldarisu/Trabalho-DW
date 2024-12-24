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


function ApagarModal(id){
    document.getElementById("removeratletaid").value = id;
    var myModal = new bootstrap.Modal(document.getElementById('ApagarModal'));
    var text = document.getElementById("nomeatleta"+id).innerText;
    document.getElementById("modalnomeatleta").innerText = text;
    myModal.show();
}

function AdicionarAtletaModal(id){
    document.getElementById("idatleta").value = id;
   
}


function ApagarEquipaModal(id){
    document.getElementById("removerequipaid").value = id;
    var myModal = new bootstrap.Modal(document.getElementById('ApagarModalEquipa'));
    var text = document.getElementById("nomeequipa"+id).innerText;
    document.getElementById("modalnomeequipa").innerText = text;
    myModal.show();
}

