window.addEventListener("load",start,false); /*Ne pas exectuer code tant que page non chargée */

function start () {
    /* Initialisation des valeurs de chaque filter */
    var typeDomaine = 'tous';
    var classe = 'Toutes';
    var domaine = 'Tous';
    var ville = 'Toutes';
    /* check si l'un des deux boutons est cliqué */
    $('.BoutonTypeDomaine').click(function() {
        typeDomaine = $(this)[0].id;/*recherche de l'id du bouton qui est cliqué*/
        filtre (typeDomaine, classe, domaine, ville);/*exécution de la fonction filtre*/
    });


    $(".FiltreDomaine").change(function(){/*même chose avec les différents select*/
        domaine = $(this).find('option:selected').text();
        filtre (typeDomaine, classe, domaine, ville);
    });

    $(".FiltreClasse").change(function(){
        classe = $(this).find('option:selected').text().split(' ').join('_');
        filtre (typeDomaine, classe, domaine, ville);
    });

    $(".FiltreVille").change(function(){
        ville = $(this).find('option:selected').text().split(' ').join('_').split("'").join('_');
        console.log(ville);
        filtre (typeDomaine, classe, domaine, ville);
    });
};

function filtre (typeDomaine, classe, domaine, ville) {

    $('.Eleve').css({'display' : 'block'});

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
}
