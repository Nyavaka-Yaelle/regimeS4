function afficherContenu(idContenu) {
    // Cacher tous les contenus
    var contenus = document.getElementsByClassName('contenu');
    for (var i = 0; i < contenus.length; i++) {
      contenus[i].classList.remove('visible');
    }
  
    // Afficher le contenu sélectionné
    var contenu = document.getElementById(idContenu);
    contenu.classList.add('visible');
  }
  