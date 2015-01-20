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
        <?php foreach ($liste_offres as $offre) { echo '
            <article class="Offre clear"">
                <aside class="Coords">
                    <p class="NomEntreprise">'.$offre->NomEntreprise.'</p>
                    <p class="Adresse">'.$offre->NumVoie.' '.$offre->TypeVoie.' '.$offre->NomVoie.'<br>
                    '.$offre->Ville.'<br>
                    '.$offre->CP.', '.$offre->Pays.'</p>
                    <img class="LogoEntreprise" src="'; if($offre->LogoEntreprise != FALSE) {echo $Offre->LogoEntreprise;} else {echo base_url().'Public/img/Defaut_Logo_Entreprise.png';} echo'" width="175" height="115" />
                </aside>
                <div class="MiddleOffre">
                    <div class="TitreOFfre">
                        <a href="'.base_url().'DetailsOffre/Index?idOffre='.$offre->idOffre.'"><p class="TitreOFfre">
                            '.$offre->TitreOffre.'
                        </p></a>
                    </div>
                    <div class="Descriptif">
                        '.nl2br($offre->DescriptifOffre).'
                    </div>
                </div>
                <div class="DomaineOffres">
                    <ul>';
                        foreach ($liste_domaine_offres as $domaine) {
                            if ($domaine->idOffre == $offre->idOffre) {
                                echo '<li class="'.$domaine->TypeDomaine.' '.$domaine->Domaine.'">'.$domaine->Domaine.'</li>';
                            }
                        }
                    echo '</ul>
                </div>
            </article>';
        }?>
    </div>
</section>
