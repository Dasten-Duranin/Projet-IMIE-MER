<section class="clear">
    <article class="Offres clear">
        <?php $i=0;
            foreach ($offres as $offre) { $i+=1; echo '
                <div class="Offre clear" id="Offre'.$i.'">
                    <p class="TitreOffre"><a href="'.base_url().'DetailsOffre/Index?idOffre='.$offre->idOffre.'">'.$offre->TitreOffre.'</a></p>
                    <div class="MiddleOffre clear">
                        <p class="DescriptionOffre">
                            '.nl2br($offre->DescriptifOffre).'
                        </p>
                        <div class="Coords clear">
                            <p class="NomEntreprise clear">'.$offre->NomEntreprise.'</p>
                            <p class="Adresse clear">
                                '.$offre->NumVoie.' '.$offre->TypeVoie.' '.$offre->NomVoie.'<br>
                                '.$offre->CP.' '.$offre->Ville.'<br>
                                '.$offre->Pays.'
                            </p>
                        </div>
                    </div>
                    <div class="Domaines clear">';
                        foreach ($domaines_offres as $domaine) {
                            if ($domaine->idOffre == $offre->idOffre) {
                                echo '
                                    <img src="'.base_url().''.$domaine->logoDomaine.'" title="Domaine '.$domaine->Domaine.'" alt="Domaine '.$domaine->Domaine.'" class="Domaine" />
                                ';
                            }
                        } echo '
                    </div>
                </div>
            ';}
        ?>
        <div id="diapo">
            <img id="previous" src="<?php echo base_url();?>Public/img/Interface/DiapoOffres/Gauche.png" title="previous" alt="previous" width="32" height="32" />

            <span id=position>
                <img  id="diapo1" class="PositionDiapo" src="<?php echo base_url();?>Public/img/Interface/DiapoOffres/diapoNoSel.png" title="position" alt="position" width="32" height="32" />
                <img  id="diapo2" class="PositionDiapo" src="<?php echo base_url();?>Public/img/Interface/DiapoOffres/diapoNoSel.png" title="position" alt="position" width="32" height="32" />
                <img  id="diapo3" class="PositionDiapo" src="<?php echo base_url();?>Public/img/Interface/DiapoOffres/diapoSel.png" title="position" alt="position" width="32" height="32" />
                <img  id="diapo4" class="PositionDiapo" src="<?php echo base_url();?>Public/img/Interface/DiapoOffres/diapoNoSel.png" title="position" alt="position" width="32" height="32" />
                <img  id="diapo5" class="PositionDiapo" src="<?php echo base_url();?>Public/img/Interface/DiapoOffres/diapoNoSel.png" title="position" alt="position" width="32" height="32" />
            </span>

            <img id="next" src="<?php echo base_url();?>Public/img/Interface/DiapoOffres/Droite.png" title="next" alt="next" width="32" height="32" />
        </div>
    </article>
    <article class="eleves clear">
        <img class="ArrowEleve" src="<?php echo base_url();?>Public/img/Interface/ArrowLeft.png" alt="Fleche de Gauche" title="Fleche de Gauche" id="ArrowEleveLeft" />
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
        <img class="ArrowEleve" src="<?php echo base_url();?>Public/img/Interface/ArrowRight.png" alt="Fleche de Gauche" title="Fleche de Gauche" id="ArrowEleveRight" />
    </article>
</section>
