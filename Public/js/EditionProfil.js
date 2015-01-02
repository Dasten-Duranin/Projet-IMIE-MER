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

    $('.edition').click(function() {

        if ($(this)[0].id == 'loginEl') {

            $(this).css({'display' : 'none'});
            $('#loginP').css({'display' : 'none'});
            $('.loginInput').css({'display' : 'inline-block'});
            $('.edition').css({'left' : '275px'});
            $('#validLogin').css({'display' : 'block'});
            $('#ModifMDP').css({'top' : '44px'});
            $('#validMDP').css({'top' : '44px'});

        }

        if ($(this)[0].id == 'loginEn') {

            $(this).css({'display' : 'none'});
            $('#loginP').css({'display' : 'none'});
            $('.loginInput').css({'display' : 'inline-block'});
            $('.edition').css({'left' : '300px'});
            $('#validLogin').css({'display' : 'block'});
            $('#validLogin').css({'left' : '300px'});
            $('#ModifMDP').css({'top' : '44px'});
            $('#validMDP').css({'top' : '44px'});

        }

        else if ($(this)[0].id == 'ModifMDP') {

            $(this).css({'display' : 'none'});
            $('#MDPMessage').css({'display' : 'none'});
            $('.MDP').css({'display' : 'inline-block'});
            $('.edition').css({'left' : '300px'});
            $('.validation').css({'left' : '300px'});
            $('#validMDP').css({'display' : 'block'});

        }


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
