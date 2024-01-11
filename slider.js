document.addEventListener("DOMContentLoaded", function () {
    var photosWrapper = document.querySelector('.js-photos');
  
    var mouvement = 0;
    var minMouvement = 0;
    var maxMouvement = 2;
  
    function decaleGauche () {
      mouvement = mouvement + 2;
  
      if (mouvement > maxMouvement) {
        retourDebut();
      } else {
        photosWrapper.style.left = mouvement * -25  + "vw";
      }
    }
    
    function retourDebut () {
      mouvement = minMouvement;
      photosWrapper.style.left = "0px";
    }
  
    function decaleDroite () {
      mouvement = mouvement - 2;
  
      if (mouvement < minMouvement) {
        retourFin();
      } else {
        photosWrapper.style.left = mouvement * -25 + "vw";
      }
    }
    
    function retourFin () {
      mouvement = maxMouvement;
      photosWrapper.style.left = mouvement * -25  + "vw";
    }
  
    
    var btnDecaleGauche = document.querySelector('.js-btn-decale-gauche');
    var btnDecaleDroite = document.querySelector('.js-btn-decale-droite');
  
    btnDecaleGauche.addEventListener('click', function() {
      decaleGauche();
    });
  
    btnDecaleDroite.addEventListener('click', function() {
      decaleDroite();
    });
  })