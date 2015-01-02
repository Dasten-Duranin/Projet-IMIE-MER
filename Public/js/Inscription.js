window.addEventListener("load",start,false); /*Ne pas exectuer code tant que page non chargée */

function start (TypeDomaine) {

    $('.DomaineDevEl .SubDel:first').css({'display' : 'none'});
    $('.DomaineResEl .SubDel:first').css({'display' : 'none'});
    $('.DomaineDevEn .SubDel:first').css({'display' : 'none'});
    $('.DomaineResEn .SubDel:first').css({'display' : 'none'});
    listen();

};

function listen () {

    var TypeDomaine =0;
    var Onglet =0;

    $('.Onglet').click(function() {

        Onglet= $(this)[0].id;
        $('.Onglet').css({'z-index' : '0'});
        $('#'+Onglet).css({'z-index' : '1'});
        console.log(Onglet);
        Onglet= Onglet.replace('Onglet', 'Inscription');
        $('.Formulaire').css({'display' : 'none'});
        console.log(Onglet);
        $("#"+Onglet).css({'display' : 'block'});

    });

    $('.SubDel').click(function() {

        $(this).parent().parent().remove();

    });

    $('.AddDomaine').click(function() {

        if ($(this)[0].id == 'DomaineDevEl') {

            TypeDomaine= $(this)[0].id;
            addDomaine(TypeDomaine);

        }

        if ($(this)[0].id == 'DomaineResEl') {

            TypeDomaine= $(this)[0].id;
            addDomaine(TypeDomaine);

        }
        if ($(this)[0].id == 'DomaineDevEn') {

            TypeDomaine= $(this)[0].id;
            addDomaine(TypeDomaine);

        }

        if ($(this)[0].id == 'DomaineResEn') {

            TypeDomaine= $(this)[0].id;
            addDomaine(TypeDomaine);

        }

    });

};

function addDomaine (TypeDomaine) {

    $('.'+TypeDomaine+':last').clone(true).children().last().children().last().css({'display' : 'inline-block'}).parent().parent().insertAfter($('.'+TypeDomaine).last());

};
