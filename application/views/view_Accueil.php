<section class="clear">
    <article class="eleves clear">
        <img class="ArrowEleve" src="<?php echo base_url();?>Public\img\Interface\ArrowLeft.png" alt="Fleche de Gauche" title="Fleche de Gauche" id="ArrowEleveLeft" />
        <?php $i=0;
            foreach ($eleves as $eleve) { $i+=1; echo '
                <div class="eleve" id="eleve'.$i.'">
                    <div class="Names">
                        '.$eleve->Nom.'<br>
                        '.$eleve->Prenom.'
                    </div>
                    <a href="'.base_url().'Profil/Index?idEleve='.$eleve->idEleve.'">
                        <img src="'; if($eleve->PhotoProfil != FALSE) {echo $eleve->PhotoProfil;} else {echo base_url().'Public/img/Defaut_Photo_Profile.png';} echo '" width="210" height="270" />
                    </a>
                    <div class="accroche">
                        '.$eleve->Accroche.'
                    </div>
                </div>
            ';}
        ?>
        <img class="ArrowEleve" src="<?php echo base_url();?>Public\img\Interface\ArrowRight.png" alt="Fleche de Gauche" title="Fleche de Gauche" id="ArrowEleveRight" />
    </article>
</section>
