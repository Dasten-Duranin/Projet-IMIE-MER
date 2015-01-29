<section>
    <div class="clear">
        <img class="BoutonTypeDomaine" id="Reseau" title="Reseaux" alt="Reseaux" src="<?php echo base_url();?>Public/img/Interface/Reseaux.png" width="150" height="37" />
        <img class="BoutonTypeDomaine" id="Developpement" title="developpement" alt="developpement" src="<?php echo base_url();?>Public/img/Interface/Developpement.png" width="240" height="37" />
    </div>
    <div class="clear">
        <div id="Filtre">
            <label for="FiltreDomaine">Domaine :</label><br>
            <select name="FiltreDomaine" class="FiltreDomaine">
                <option>Tous</option>
                <?php
                foreach ($liste_domaines_offres as $domaine) {
                    echo '<option>'.$domaine->Domaine.'</option>';
                }
                ?>
            </select><br>
            <p>Recherche :</p>
            <input type="checkbox" id="stage" name="stage" value="1">Stage<br>
            <input type="checkbox" id="alternance" name="alternance" value="1">Alternance<br>
            <input type="checkbox" id="emploi" name="emploi" value="1">Emploi<br>
            <label for="FiltreVille">Localisation :</label><br>
            <select name="FiltreVille" class="FiltreVille">
                <option>Toutes</option>
                <?php
                    foreach ($liste_villes_offres as $villes) {
                        echo '<option class="'.$villes->Ville.'">'.$villes->Ville.'</option>';
                    }
                ?>
            </select>
            <p>Recherche par titre :</p>
            <input type="text" name"searchName" id="searchName" placeholder="Recherchez"></input>
        </div>
        <?php foreach ($liste_offres as $offre) { echo '
            <article class="Offre clear">
                <aside class="Coords">
                    <p class="NomEntreprise">'.$offre->NomEntreprise.'</p>
                    <p class="Adresse">'.$offre->NumVoie.' '.$offre->TypeVoie.' '.$offre->NomVoie.'<br>
                    <span class="Ville '.str_replace(array(' ', "'"), array('_', '_'), $offre->Ville).'">'.$offre->Ville.'<br>
                    '.$offre->CP.', '.$offre->Pays.'</p>
                    <img class="LogoEntreprise" src="'; if($offre->LogoEntreprise != FALSE) {echo base_url().$offre->LogoEntreprise;} else {echo base_url().'Public/img/Defaut_Logo_Entreprise.png';} echo'" width="175" height="115" />
                </aside>
                <div class="MiddleOffre">
                    <div class="TitreOFfre">
                        <a href="'.base_url().'DetailsOffre/Index?idOffre='.$offre->idOffre.'"><p class="TITREOFFRE '.strtolower(str_replace(' ', '_', $offre->TitreOffre)).'">
                            '.$offre->TitreOffre.'
                        </p></a>
                    </div>
                    <div class="Descriptif">
                        '.nl2br($offre->DescriptifOffre).'
                    </div>
                </div>
                <div class="DomaineOffres">
                    <ul>';
                        foreach ($domaines_offres as $domaine) {
                            if ($domaine->idOffre == $offre->idOffre) {
                                echo '<li class="'.$domaine->TypeDomaine.' '.$domaine->Domaine.'">'.$domaine->Domaine.'</li>';
                            }
                        }
                    echo '</ul>
                </div>
                <div class="TypeOffre">
                    <img class="BoutonRecherche'.$offre->StageOffre.' Stage'.$offre->StageOffre.'" src="'.base_url().'Public/img/Interface/Stage.png" title="Recherche de Stage" alt="recherche de Stage" />
                    <img class="BoutonRecherche'.$offre->AlternanceOffre.' Alternance'.$offre->AlternanceOffre.'" src="'.base_url().'Public/img/Interface/Alternance.png" title="Recherche d\'alternance" alt="recherche d\'alternance" />
                    <img class="BoutonRecherche'.$offre->EmploiOffre.' Emploi'.$offre->EmploiOffre.'" src="'.base_url().'Public/img/Interface/Emploi.png" title="Recherche d\'Emploi" alt="recherche d\'Emploi" />
                </div>
            </article>';
        }?>
    </div>
</section>
