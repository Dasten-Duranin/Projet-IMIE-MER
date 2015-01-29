<?php
    if (isset($Offre)) {echo '
        <section class="clear">
            <div id="Titres" class="clear">
                <img src="'; if($Offre->LogoEntreprise != FALSE) {echo base_url().$Offre->LogoEntreprise;} else {echo base_url().'Public/img/Defaut_Logo_Entreprise.png';} echo'" width="200" height="133" />
                <aside id="TitreOffre">
                    <span>'.$Offre->TitreOffre.'</span>
                </aside>
            </div>
            <div class="clear">
                <div class="clear" id="Coords">
                    <p id="TitreEntreprise">'.$Offre->NomEntreprise.'</p>
                    <p id="Adresses">Adresse :<br>'.
                    $Offre->NumVoie.' '.$Offre->TypeVoie.' '.$Offre->NomVoie.'<br>'.
                    $Offre->Ville.',<br>'.
                    $Offre->CP.', '.$Offre->Pays.'<br>
                    Adresse Email :<br>'.
                    $Offre->EmailEntreprise.'<br>
                    créée le : '.date("d/m/Y", strtotime($Offre->DateOffre)).'</p>
                </div>
                <div class="clear" id="Details">
                    <div id="Descriptif">'.nl2br($Offre->DescriptifOffre).'</div>
                    <div class="clear" id="Recherche">
                        <img class="BoutonRecherche'.$Offre->StageOffre.'" src="'.base_url().'Public/img/Interface/Stage.png" title="Recherche de Stage" alt="recherche de Stage" />
                        <img class="BoutonRecherche'.$Offre->AlternanceOffre.'" src="'.base_url().'Public/img/Interface/Alternance.png" title="Recherche d\'alternance" alt="recherche d\'alternance" />
                        <img class="BoutonRecherche'.$Offre->EmploiOffre.'" src="'.base_url().'Public/img/Interface/Emploi.png" title="Recherche d\'Emploi" alt="recherche d\'Emploi" />
                    </div>
                </div>
            </div>
            <div class="clear" id="Domaines">';
                foreach ($domaines_offre as $domaine) {
                    echo '<img src="'.base_url().''.$domaine->logoDomaine.'" title="Domaine '.$domaine->Domaine.'" alt="Domaine '.$domaine->Domaine.'" class="Domaine" />';
                } echo'
            </div>
        </section>';
    }
    else {
        echo $error;
    }
?>
