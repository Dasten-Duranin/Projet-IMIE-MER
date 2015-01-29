window.addEventListener("load",start,false); /*Ne pas exectuer code tant que page non chargée */

function start () {
    /* Initialisation des valeurs de chaque filter */
    var typeDomaine = 'tous';
    var classe = 'Toutes';
    var domaine = 'Tous';
    var ville = 'Toutes';
    var stage = 0;
    var alternance = 0;
    var Name = '';

    $('#stage').click(function() {

        console.log('stage');
        if (stage == 0) {stage = 1;}
        else {stage = 0;}
        console.log(stage);
        console.log(alternance);
        filtre (typeDomaine, classe, domaine, ville, stage, alternance, Name);
    });
    $('#alternance').click(function() {
        console.log('alternance');
        if (alternance == 0) {alternance = 1;}
        else {alternance = 0;}
        console.log(stage);
        console.log(alternance);
        filtre (typeDomaine, classe, domaine, ville, stage, alternance, Name);
    });
    /* check si l'un des deux boutons est cliqué */
    $('.BoutonTypeDomaine').click(function() {
        typeDomaine = $(this)[0].id;/*recherche de l'id du bouton qui est cliqué*/
        filtre (typeDomaine, classe, domaine, ville, stage, alternance, Name);/*exécution de la fonction filtre*/
    });


    $(".FiltreDomaine").change(function(){/*même chose avec les différents select*/
        domaine = $(this).find('option:selected').text();
        filtre (typeDomaine, classe, domaine, ville, stage, alternance, Name);
    });

    $(".FiltreClasse").change(function(){
        classe = $(this).find('option:selected').text().split(' ').join('_');
        filtre (typeDomaine, classe, domaine, ville, stage, alternance, Name);
    });

    $(".FiltreVille").change(function(){
        ville = $(this).find('option:selected').text().split(' ').join('_').split("'").join('_');
        console.log(ville);
        filtre (typeDomaine, classe, domaine, ville, stage, alternance, Name);
    });

    $("#searchName:text").keyup(function(){// on regarde si quelque chose est tapé dans le champ de recherche
        Name = $(this).val().split(' ').join('_').toLowerCase();//On met ce qui est tapé dans la variable name en changeant les espaces par des underscores et on met tout en minuscule
        filtre (typeDomaine, classe, domaine, ville, stage, alternance, Name);
    });
};

function filtre (typeDomaine, classe, domaine, ville, stage, alternance, Name) {

    $('.Eleve').css({'display' : 'block'});

        if (stage != 0 || alternance != 0) {

            if (stage == alternance) {
                $('.Eleve .InfosEleve .Noms').each(function() {// check tout les boutons de stage/Alternance
                    if($(this).children('.BoutonRecherche0').length >= 1) {//check la personne recherche un stage et alterance ou non
                        $(this).parent().parent().css({'display' : 'none'})/*si il n'y en a pas l'élément disparaît*/
                    }
                });
            }
            else if (stage == 1 && alternance == 0) {
                $('.Eleve .InfosEleve .Noms').each(function() {// check tout les boutons de stage/Alternance
                    if($(this).children('.Stage1').length == 0) {//check la personne recherche un stage ou non
                        $(this).parent().parent().css({'display' : 'none'})/*si il n'y en a pas l'élément disparaît*/
                    }
                });
            }
            else if (stage == 0 && alternance == 1) {
                $('.Eleve .InfosEleve .Noms').each(function() {/* check tout les Li*/
                    if($(this).children('.Alternance1').length == 0) {/*check si tout les li ont une class avec le type de domaine recherché*/
                        $(this).parent().parent().css({'display' : 'none'})/*si il n'y en a pas l'élément disparaît*/
                        console.log('coucou3');
                    }
                });
                console.log('3');
            }
        }

    if (typeDomaine != 'tous') {

        $('.Eleve .DomaineEleve ul').each(function() {/* check tout les Li*/
            if($(this).children('.'+typeDomaine).length == 0) {/*check si tout les li ont une class avec le type de domaine recherché*/
                $(this).parent().parent().css({'display' : 'none'})/*si il n'y en a pas l'élément disparaît*/
            }
        });
        /*($('.Eleve .DomaineEleve ul li:not(.'+typeDomaine+')')).parent().parent().parent().css({'display' : 'none'});*/
    }
    if (classe != 'Toutes') {

        $('.Eleve .InfosEleve').each(function() {
            if($(this).children('.'+classe).length == 0) {
                $(this).parent().css({'display' : 'none'})
            }
        });
    }
    if (domaine != 'Tous') {

        $('.Eleve .DomaineEleve ul').each(function() {
            if($(this).children('.'+domaine).length == 0) {
                $(this).parent().parent().css({'display' : 'none'})
            }
        });
    }
    if (ville != 'Toutes') {

        $('.Eleve .InfosEleve').each(function() {
            if($(this).children('.'+ville).length == 0) {
                $(this).parent().css({'display' : 'none'})
            }
        });
    }
    if (Name != '') { // On regarde si le champ où l'on cherche des noms est rempli ou non.
        $('.Eleve .InfosEleve').each(function() { // Pour tous les eleves
            if($(this).children('[class*="Name'+Name+'"]').length == 0) {//On regarde s'ils ont une classe Nom+la cherche
                $(this).parent().css({'display' : 'none'})//Sinon on cache l'eleve
            }
        });
    }
}
