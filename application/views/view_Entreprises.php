<section>
    <div class="clear">
        <img class="BoutonTypeDomaine" title="Reseaux" id="Reseau" alt="Reseaux" src="<?php echo base_url(); ?>Public/img/Interface/Reseaux.png" width="150" height="37" />
        <img class="BoutonTypeDomaine" title="developpement" id="Developpement" alt="developpement" src="<?php echo base_url(); ?>Public/img/Interface/Developpement.png"width="240" height="37" />
    </div>
   <div class="clear">
        <div id="Filtre">
            <label for="FiltreDomaine">Domaine :</label><br>
            <select name="FiltreDomaine" class="FiltreDomaine">
                <option>Tous</option>
                <?php
                    foreach ($ListeDomaineEntreprise as $domaine) {
                        echo '<option>'.$domaine->Domaine.'</option>';
                    }
                ?>
            </select><br>
            <p>Vous recherchez :</p>
            <input type="checkbox" id="stage" name="stage" value="1">Un stage<br>
            <input type="checkbox" id="alternance" name="alternance" value="1">Une alternance<br>
            <input type="checkbox" id="emploi" name="emploi" value="1">Un Emploi<br>
            <label for="FiltreVille">Localisation :</label><br>
            <select name="FiltreVille" class="FiltreVille">
                <option>Toutes</option>
                <?php
                    foreach ($liste_villes_entreprises as $villes) {
                        echo '<option class="'.$villes->Ville.'">'.$villes->Ville.'</option>';
                    }
                ?>
            </select>
            <p>Recherche par nom :</p>
            <input type="text" name"searchName" id="searchName" placeholder="Recherchez"></input>
        </div>
		<?php foreach ($Entreprises as $entreprise) { echo '
	            <article class="Offre clear">
	                <aside class="Coords">

	                    <p class="Adresse">'.$entreprise->NumVoie.' '.$entreprise->TypeVoie.' '.$entreprise->NomVoie.'<br>
	                    <span class="Ville '.str_replace(array(' ', "'"), array('_', '_'), $entreprise->Ville).'">'.$entreprise->Ville.'</span><br>
	                    '.$entreprise->CP.', '.$entreprise->Pays.'</p>
	                    <img class="LogoEntreprise" src="'; if($entreprise->LogoEntreprise != FALSE) {echo base_url().$entreprise->LogoEntreprise;} else {echo base_url().'Public/img/Defaut_Logo_Entreprise.png';} echo'" width="175" height="115" />
	                </aside>
	                <div class="MiddleOffre">
	                    <div class="TitreOFfre">
                            <a href="'.base_url().'Profil/Index?idEntreprise='.$entreprise->idEntreprise.'">
    	                        <p class="TitreOffre '.strtolower(str_replace(' ', '_', $entreprise->NomEntreprise)).'">
    	                            '.$entreprise->NomEntreprise.'
    	                        </p>
                            </a>
	                    </div>
	                    <div class="Descriptif">
	                        '.nl2br($entreprise->DescriptifEntreprise).'
	                    </div>
	                </div>
	                <div class="DomaineOffres">
	                    <img class="BoutonRecherche'.$entreprise->Stagiaire.' Stage'.$entreprise->Stagiaire.'" src="'.base_url().'Public/img/Interface/Stage.png" title="Recherche de Stage" alt="recherche de Stage" />
                        <img class="BoutonRecherche'.$entreprise->Alternant.' Alternance'.$entreprise->Alternant.'" src="'.base_url().'Public/img/Interface/Alternance.png" title="Recherche d\'alternance" alt="recherche d\'alternance" />
                        <img class="BoutonRecherche'.$entreprise->Employe.' Emploi'.$entreprise->Employe.'" src="'.base_url().'Public/img/Interface/Emploi.png" title="Recherche d\'Emploi" alt="recherche d\'Emploi" />
	                </div>
                    <div class="DomaineEntreprise">
                        <ul>';
                            foreach ($liste_fait as $domaine) {
                                if ($domaine->idEntreprise == $entreprise->idEntreprise) {
                                    echo '<li class="'.$domaine->TypeDomaine.' '.$domaine->Domaine.'">'.$domaine->Domaine.'</li>';
                                }
                            }
                        echo '</ul>
                    </div>
	            </article>';
	        }?>
    </div>
</section>
