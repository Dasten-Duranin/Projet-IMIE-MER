window.addEventListener("load",initialisation,false); /*Ne pas exectuer code tant que page non chargée */

function initialisation (TypeDomaine) {

    $('.DomaineDevOf .SubDel:first').css({'display' : 'none'});
    $('.DomaineResOf .SubDel:first').css({'display' : 'none'});
    $('.DomaineDevModifOf .SubDel:first').css({'display' : 'none'});
    $('.DomaineResModifOf .SubDel:first').css({'display' : 'none'});
    start();

};

function start () {

    var TypeDomaine =0;
    var idOffre =0;

    $('#CreateOffer').click(function() {
        $(this).css({'display' : 'none'});
        $('#NewOffre').css({'display' : 'block'});
    });

    $('.submitdel').click (function() {

        idOffre =$(this)[0].id.replace("OffreNumber", "");
        $('#confirmArea').css({'display' : 'block'});
        $('input#idOffreConfirm').val(idOffre);

    });

    $('#CancelDelete').click (function() {

        $('#confirmArea').css({'display' : 'None'});

    });

    $('.SubDel').click(function() {

        $(this).parent().parent().remove();

    });

    $('.AddDomaine').click(function() {

        if ($(this)[0].id == 'DomaineDevOf') {

            TypeDomaine= $(this)[0].id;
            addDomaine(TypeDomaine);

        }

        if ($(this)[0].id == 'DomaineResOf') {

            TypeDomaine= $(this)[0].id;
            addDomaine(TypeDomaine);

        }

        if ($(this)[0].id == 'DomaineDevModifOf') {

            TypeDomaine= $(this)[0].id;
            addDomaine(TypeDomaine);

        }

        if ($(this)[0].id == 'DomaineResModifOf') {

            TypeDomaine= $(this)[0].id;
            addDomaine(TypeDomaine);

        }

    });
};

function addDomaine (TypeDomaine) {

    $('.'+TypeDomaine+':last').clone(true).children().last().children().last().css({'display' : 'inline-block'}).parent().parent().insertAfter($('.'+TypeDomaine).last());

};
