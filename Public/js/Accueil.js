window.addEventListener("load",initialisation,false); /*Ne pas exectuer code tant que page non chargée */

function initialisation (TypeDomaine) {

    disp_offre(3);
    disp_eleves(2);
    start();

};

function start () {

    var numPage =2;
    var numOffre =3;


    $('.ArrowEleve').click(function() {
        if ($(this)[0].id == 'ArrowEleveLeft') {
            if (numPage == 1) {numPage=4;}
            numPage-=1;
            disp_eleves(numPage);
        }
        else {
            if (numPage == 3) {numPage=0;}
            numPage+=1;
            disp_eleves(numPage);
        }
    });


    $('.ArrowOffre').click(function() {
        if ($(this)[0].id == 'ArrowEleveLeft') {
            if (numOffre == 1) {numOffre=6;}
                numOffre-=1;
                disp_offre(numOffre);
            }
        else {
            if (numOffre == 5) {numOffre=0;}
                numPage+=1;
                disp_offre(numOffre);
            }
    });


};

function disp_eleves(numPage) {

    var idEleve1;
    var idEleve2;
    var idEleve3;

    $('.eleve').css({'display' : 'none'});

    switch(numPage) {
        case 1:
            idEleve1 = 1;
            idEleve2 = 2;
            idEleve3 = 3;
            break;
        case 2:
            idEleve1 = 4;
            idEleve2 = 5;
            idEleve3 = 6;
            break;
        case 3:
            idEleve1 = 7;
            idEleve2 = 8;
            idEleve3 = 9;
            break;
        default:
            idEleve1 = 4;
            idEleve2 = 5;
            idEleve3 = 6;
    }

    $('#eleve'+idEleve1).css({'display' : 'block'});
    $('#eleve'+idEleve2).css({'display' : 'block'});
    $('#eleve'+idEleve3).css({'display' : 'block'});
};
function disp_offre(numOffre) {

    $('.offre').css({'display' : 'none'});

    $('#offre'+numOffre).css({'display' : 'block'});

};
