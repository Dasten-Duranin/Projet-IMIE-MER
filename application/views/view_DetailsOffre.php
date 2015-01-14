<section class="clear">
    <div class="clear">
        <div id="Titres" class="clear">
            <img src="<?php if($Offre->LogoEntreprise != FALSE) {echo $Offre->LogoEntreprise;} else {echo base_url().'Public/img/Defaut_Logo_Entreprise.png';}?>" width="200" height="133" />
            <aside id="TitreOffre">
                <span><?php echo $Offre->TitreOffre; ?></span>
            </aside>
        </div>
        <div class="clear" id="Coords">
            <?php echo
            $Offre->NomEntreprise.'<br>
            Adresse :<br>'.
            $Offre->NumVoie.' '.$Offre->TypeVoie.' '.$Offre->NomVoie.'<br>'.
            $Offre->Ville.',<br>'.
            $Offre->CP.', '.$Offre->Pays.'<br>
            Adresse Email :<br>'.
            $Offre->EmailEntreprise.'<br>
            créée le : '.date("d/m/Y", strtotime($Offre->DateOffre)).'<br>'
            ; ?>
        </div>
        <div class="clear" id="Details">
            <div id="Descriptif">
                <?php echo nl2br($Offre->DescriptifOffre); ?>
            </div>
            <div class="clear" id="Recherche">
                <img class="BoutonRecherche<?php echo $Offre->StageOffre; ?>" src="<?php echo base_url();?>Public/img/Interface/Stage.png" title="Recherche de Stage" alt="recherche de Stage" />
                <img class="BoutonRecherche<?php echo $Offre->AlternanceOffre; ?>" src="<?php echo base_url();?>Public/img/Interface/Alternance.png" title="Recherche d'alternance" alt="recherche d'alternance" />
                <img class="BoutonRecherche<?php echo $Offre->EmploiOffre; ?>" src="<?php echo base_url();?>Public/img/Interface/Emploi.png" title="Recherche d'Emploi" alt="recherche d'Emploi" />
            </div>
        </div>
        <div class="clear" id="Domaines">
            <?php foreach ($domaines_offre as $domaine) {
                echo '
                <img src="'.base_url().''.$domaine->logoDomaine.'" title="Domaine '.$domaine->Domaine.'" alt="Domaine '.$domaine->Domaine.'" class="Domaine" />
                ';
            } ?>
        </div>
    </div>
</section>
