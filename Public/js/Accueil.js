window.addEventListener("load",initialisation,false); /*Ne pas exectuer code tant que page non chargée */

function initialisation (TypeDomaine) {

    disp_offre();
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
function disp_offre() {


    var currentOffre=3;
    $('.Offre').css({'display' : 'none'});
    $('#Offre'+currentOffre).css({'display' : 'block'});

    console.log(currentOffre);
    //précédent :
    $('#previous').click(function() {
        console.log("précédent");
        console.log(currentOffre);
        lastOffre=currentOffre;
        currentOffre--;
        if(currentOffre==0) {currentOffre=5};
        $('.Offre').css({'display' : 'none'});
        $('#Offre'+currentOffre).css({'display' : 'block'});
        $('.PositionDiapo')[0].src = $('.PositionDiapo')[0].src.replace("diapoSel","diapoNoSel");
        $('#diapo'+currentOffre)[0].src.replace("diapoNoSel","diapoSel");
    });

    //suivant :
    $('#next').click(function() {
        console.log("suivant");
        console.log(currentOffre);
        lastOffre=currentOffre;
        currentOffre++;
        if(currentOffre==6) {currentOffre=1};
        console.log($('#image')[0].src);
        $('#image')[0].src=$('#image')[0].src.replace(lastOffre+".jpg", currentOffre+".jpg");
        $('#diapo'+lastOffre)[0].src="_img/diapoNoSel.png";
        $('#diapo'+currentOffre)[0].src="_img/diapoSel.png";
        console.log($('#image')[0].src);
    });

    //Automatique
    var diapo = setInterval (function () {
        console.log("Automatique");
        console.log(currentOffre);
        lastOffre=currentOffre;
        currentOffre++;
        if(currentOffre==6) {currentOffre=1};
        console.log($('#image')[0].src);
        $('#image')[0].src=$('#image')[0].src.replace(lastOffre+".jpg", currentOffre+".jpg");
        $('#diapo'+lastOffre)[0].src="_img/diapoNoSel.png";
        $('#diapo'+currentOffre)[0].src="_img/diapoSel.png";
        console.log($('#image')[0].src);
    },5000);

    //Lorsque l'on clique sur l'un des indicateurs d'image
    $('.PositionDiapo').click(function() {
        console.log("position !");
        var id = this.id;
        id = id.replace("diapo", "");
        console.log(id);
        $('#image')[0].src=$('#image')[0].src.replace(currentOffre+".jpg", id+".jpg");
        $('#diapo'+id)[0].src="_img/diapoSel.png";
        $('#diapo'+currentOffre)[0].src="_img/diapoNoSel.png";
        currentOffre= id;
    });



};
