<section>
    <div class="clear">
        <img class="BoutonTypeDomaine" title="Reseaux" alt="Reseaux" src="<?php echo base_url(); ?>Public/img/Interface/Reseaux.png" width="150" height="37" />
        <img class="BoutonTypeDomaine" title="developpement" id="Developpement" alt="developpement" src="<?php echo base_url(); ?>Public/img/Interface/Developpement.png"width="240" height="37" />
    </div>
   <div class="clear">
        <div id="Filtre">
            <label for="FiltreDomaine">Domaine :</label><br>
            <select name="FiltreDomaine" class="FiltreDomaine">
                <option>Tous</option>
                <?php
                foreach ($liste_domaine_offres as $domaine) {
                    echo '<option>'.$domaine->Domaine.'</option>';
                }
                ?>
            </select><br>
            <p>Recherche :</p>
            <input type="checkbox" name="option2" value="Butter" checked>Stage<br>
            <input type="checkbox" name="option2" value="Butter" checked>Alternance<br>
            <input type="checkbox" name="option2" value="Butter" checked>Emploi<br>
            <label for="FiltreVille">Localisation :</label><br>
            <select name="FiltreVille" class="FiltreVille">
                <option>Toutes</option>
                <?php
                    foreach ($liste_villes_offres as $villes) {
                        echo '<option class="'.$villes->Ville.'">'.$villes->Ville.'</option>';
                    }
                ?>
            </select>
        </div>
		<?php foreach ($Entreprises as $entreprise) { echo '
	            <article class="Offre clear"">
	                <aside class="Coords">
	                    
	                    <p class="Adresse">'.$entreprise->NumVoie.' '.$entreprise->TypeVoie.' '.$entreprise->NomVoie.'<br>
	                    '.$entreprise->Ville.'<br>
	                    '.$entreprise->CP.', '.$entreprise->Pays.'</p>
	                    <img class="LogoEntreprise" src="'; if($entreprise->LogoEntreprise != FALSE) {echo $Entreprise->LogoEntreprise;} else {echo base_url().'Public/img/Defaut_Logo_Entreprise.png';} echo'" width="175" height="115" />
	                </aside>
	                <div class="MiddleOffre">
	                    <div class="TitreOFfre">
	                        <p class="TitreOFfre">
	                            '.$entreprise->NomEntreprise.'
	                        </p>
	                    </div>
	                    <div class="Descriptif">
	                        '.nl2br($entreprise->DescriptifEntreprise).'
	                    </div>
	                </div>
	                <div class="DomaineOffres">
	                    <img class="BoutonRecherche'.$entreprise->Stagiaire.'" src="'.base_url().'Public/img/Interface/Stage.png" title="Recherche de Stage" alt="recherche de Stage" />
                        <img class="BoutonRecherche'.$entreprise->Alternant.'" src="'.base_url().'Public/img/Interface/Alternance.png" title="Recherche d\'alternance" alt="recherche d\'alternance" />
                        <img class="BoutonRecherche'.$entreprise->Employe.'" src="'.base_url().'Public/img/Interface/Emploi.png" title="Recherche d\'Emploi" alt="recherche d\'Emploi" />
	                </div>
	            </article>';
	        }?>
    </div>
</section>
