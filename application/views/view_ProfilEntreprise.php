<section class="clear">
    <div id="Titres" class="clear">
        <img src="<?php if($entreprise->LogoEntreprise != FALSE) {echo base_url().$entreprise->LogoEntreprise;} else {echo base_url().'Public/img/Defaut_Logo_Entreprise.png';} ?>" width="200" height="133" />
        <aside id="TitreEntreprise">
            <span><?php echo $entreprise->NomEntreprise ?></span>
        </aside>
    <div class="clear">
        <div class="clear" id="Coords">
            <p id="Adresses">Adresse :<br>
                <?php echo $entreprise->NumVoie.' '.$entreprise->TypeVoie.' '.$entreprise->NomVoie.'<br>'.
                $entreprise->Ville.',<br>'.
                $entreprise->CP.', '.$entreprise->Pays.'<br>
                Adresse Email :<br>'.
                $entreprise->EmailEntreprise.'<br>'; ?>
            </p>
        </div>
        <div class="clear" id="Details">
            <div id="Descriptif"><?php echo nl2br($entreprise->DescriptifEntreprise)?></div>
            <div class="clear" id="Recherche">
                <img class="BoutonRecherche<?php echo $entreprise->Stagiaire; ?>" src="<?php echo base_url(); ?>Public/img/Interface/Stage.png" title="Recherche de Stage" alt="recherche de Stage" />
                <img class="BoutonRecherche<?php echo $entreprise->Alternant; ?>" src="<?php echo base_url(); ?>Public/img/Interface/Alternance.png" title="Recherche d\'alternance" alt="recherche d\'alternance" />
                <img class="BoutonRecherche<?php echo $entreprise->Employe; ?>" src="<?php echo base_url(); ?>Public/img/Interface/Emploi.png" title="Recherche d\'Emploi" alt="recherche d\'Emploi" />
            </div>
        </div>
    </div>
    <div class="clear" id="Domaines">
        <?php
            foreach ($domaines_entreprise as $domaine) {
                echo '<img src="'.base_url().''.$domaine->logoDomaine.'" title="Domaine '.$domaine->Domaine.'" alt="Domaine '.$domaine->Domaine.'" class="Domaine" />';
            }
        ?>
    </div>
</section>
