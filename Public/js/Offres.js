window.addEventListener("load",start,false); /*Ne pas exectuer code tant que page non chargée */

function start () {
    /* Initialisation des valeurs de chaque filter */
    var typeDomaine = 'tous';
    var domaine = 'Tous';
    var ville = 'Toutes';
    var stage = 0;
    var alternance = 0;;
    var emploi = 0;
    var Name = '';

    $('#stage').click(function() {

        console.log('stage');
        if (stage == 0) {stage = 1;}
        else {stage = 0;}
        console.log(stage);
        console.log(alternance);
        console.log(emploi);
        filtre (typeDomaine, domaine, ville, stage, alternance, emploi, Name);
    });
    $('#alternance').click(function() {
        console.log('alternance');
        if (alternance == 0) {alternance = 1;}
        else {alternance = 0;}
        console.log(stage);
        console.log(alternance);
        console.log(emploi);
        filtre (typeDomaine, domaine, ville, stage, alternance, emploi, Name);
    });
    $('#emploi').click(function() {
        console.log('emploi');
        if (emploi == 0) {emploi = 1;}
        else {emploi = 0;}
        console.log(stage);
        console.log(alternance);
        console.log(emploi);
        filtre (typeDomaine, domaine, ville, stage, alternance, emploi, Name);
            });
    /* check si l'un des deux boutons est cliqué */
    $('.BoutonTypeDomaine').click(function() {
        typeDomaine = $(this)[0].id;/*recherche de l'id du bouton qui est cliqué*/
        filtre (typeDomaine, domaine, ville, stage, alternance, emploi, Name);/*exécution de la fonction filtre*/
    });


    $(".FiltreDomaine").change(function(){/*même chose avec les différents select*/
        domaine = $(this).find('option:selected').text();
        filtre (typeDomaine, domaine, ville, stage, alternance, emploi, Name);
    });

    $(".FiltreVille").change(function(){
        ville = $(this).find('option:selected').text().split(' ').join('_').split("'").join('_');
        console.log(ville);
        filtre (typeDomaine, domaine, ville, stage, alternance, emploi, Name);
    });

    $("#searchName:text").keyup(function(){// on regarde si quelque chose est tapé dans le champ de recherche
        Name = $(this).val().split(' ').join('_').toLowerCase();//On met ce qui est tapé dans la variable name en changeant les espaces par des underscores et on met tout en minuscule
        filtre (typeDomaine, domaine, ville, stage, alternance, emploi, Name);
    });
};

function filtre (typeDomaine, domaine, ville, stage, alternance, emploi, Name) {

    $('.Offre').css({'display' : 'block'});

    if (stage != 0 || alternance != 0 || emploi != 0) {
        if (stage == 1) {
            $('.Offre .TypeOffre').each(function() {// check tout les boutons de stage/Alternance
                if($(this).children('.Stage1').length == 0) {//check la personne recherche un stage ou non
                    $(this).parent().css({'display' : 'none'})/*si il n'y en a pas l'élément disparaît*/
                }
            });
        }
        if (alternance == 1) {
            $('.Offre .TypeOffre').each(function() {/* check tout les Li*/
                if($(this).children('.Alternance1').length == 0) {/*check si tout les li ont une class avec le type de domaine recherché*/
                    $(this).parent().css({'display' : 'none'})/*si il n'y en a pas l'élément disparaît*/
                }
            });
        }
        if (emploi == 1) {
            $('.Offre .TypeOffre').each(function() {/* check tout les Li*/
                if($(this).children('.Emploi1').length == 0) {/*check si tout les li ont une class avec le type de domaine recherché*/
                    $(this).parent().css({'display' : 'none'})/*si il n'y en a pas l'élément disparaît*/
                }
            });
        }
    }
    if (typeDomaine != 'tous') {

        $('.Offre .DomaineOffres ul').each(function() {/* check tout les Li*/
            if($(this).children('.'+typeDomaine).length == 0) {/*check si tout les li ont une class avec le type de domaine recherché*/
                $(this).parent().parent().css({'display' : 'none'})/*si il n'y en a pas l'élément disparaît*/
            }
        });
        /*($('.Eleve .DomaineEleve ul li:not(.'+typeDomaine+')')).parent().parent().parent().css({'display' : 'none'});*/
    }
    if (domaine != 'Tous') {

        $('.Offre .DomaineOffres ul').each(function() {
            if($(this).children('.'+domaine).length == 0) {
                $(this).parent().parent().css({'display' : 'none'})
            }
        });
    }
    if (ville != 'Toutes') {

        console.log(ville);
        $('.Offre .Coords .Adresse').each(function() {
            if($(this).children('.'+ville).length == 0) {
                $(this).parent().parent.parent().css({'display' : 'none'})
            }
        });
    }
    if (Name != '') { // On regarde si le champ où l'on cherche des noms est rempli ou non.
        $('.Offre .MiddleOffre .TitreOFfre a').each(function() { // Pour tous les eleves
            if($(this).children('[class*="'+Name+'"]').length == 0) {//On regarde s'ils ont une classe Nom+la cherche
                $(this).parent().parent().parent().css({'display' : 'none'})//Sinon on cache l'eleve
            }
        });
    }
}
