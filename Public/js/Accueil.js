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
};
