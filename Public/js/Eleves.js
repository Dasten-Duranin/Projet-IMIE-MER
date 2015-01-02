window.addEventListener("load",start,false); /*Ne pas exectuer code tant que page non chargée */

function start () {

    var typeDomaine = 'tous';
    var classe = 'Toutes';
    var domaine = 'Tous';
    var ville = 'Toutes';

    $('.BoutonTypeDomaine').click(function() {
        typeDomaine = $(this)[0].id;
        filtre (typeDomaine, classe, domaine, ville);
    });


    $(".FiltreDomaine").change(function(){
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

        $('.Eleve .DomaineEleve ul').each(function() {
            if($(this).children('.'+typeDomaine).length == 0) {
                $(this).parent().parent().css({'display' : 'none'})
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
