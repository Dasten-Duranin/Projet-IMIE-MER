<section>
    <div class="clear">
        <img class="BoutonTypeDomaine" id="Reseau" title="Reseaux" alt="Reseaux" src="<?php echo base_url();?>Public/img/Interface/Reseaux.png" width="150" height="37" />
        <img class="BoutonTypeDomaine" id="Developpement" title="developpement" alt="developpement" src="<?php echo base_url();?>Public/img/Interface/Developpement.png" width="240" height="37" />
    </div>
    <div class="clear">
        <div id="Filtre">
            <label for="FiltreClasse">Classe :</label><br>
            <select name="FiltreClasse" class="FiltreClasse">
                <option>Toutes</option>
                <?php
                    foreach ($liste_classes_eleves as $classes) {
                        echo '<option>'.$classes->Classe.'</option>';
                    }
                ?>
            </select><br>
            <label for="FiltreDomaine">Domaine :</label><br>
            <select name="FiltreDomaine" class="FiltreDomaine">
                <option>Tous</option>
                <?php
                    foreach ($liste_domaine_eleves as $domaine) {
                        echo '<option>'.$domaine->Domaine.'</option>';
                    }
                ?>
            </select><br>
            <p>Vous recherchez :</p>
            <input type="checkbox" class="CheckBoxRecherche" id="stage" value="1">Un stagiaire<br>
            <input type="checkbox" class="CheckBoxRecherche" id="alternance" value="1">Un alternanant<br>
            <label for="FiltreVille">Localisation :</label><br>
            <select name="FiltreVille" class="FiltreVille">
                <option>Toutes</option>
                <?php
                    foreach ($liste_villes_eleves as $villes) {
                        echo '<option class="'.$villes->Ville.'">'.$villes->Ville.'</option>';
                    }
                ?>
            </select>
            <p>Recherche par nom :</p>
            <input type="text" name"searchName" id="searchName" placeholder="Recherchez"></input>
        </div>
        <?php
            foreach ($liste_eleves as $eleve) {
                echo '
                <article class="Eleve">
                    <div class="InfosEleve">
                        <a href="'.base_url().'Profil/Index?idEleve='.$eleve->idEleve.'">
                            <img src="'; if($eleve->PhotoProfil != FALSE) {echo base_url().$eleve->PhotoProfil;} else {echo base_url().'Public/img/Defaut_Photo_Profile.png';} echo '" width="105" height="135" />
                        </a>
                        <p class="Noms Name'.strtolower(str_replace(' ', '_', $eleve->Nom)).' '.str_replace(' ', '_', $eleve->Prenom).' '.str_replace(' ', '_', $eleve->Classe).'">
                            '.$eleve->Nom.'<br>
                            '.$eleve->Prenom.'<br>
                            '.$eleve->Classe.'<br>
                            <br>
                            <img class="BoutonRecherche'.$eleve->Alternance.' Alternance'.$eleve->Alternance.'" src="'.base_url().'Public/img/Interface/Alternance.png" title="Recherche d\'alternance" alt="recherche d\'alternance" />
                            <img class="BoutonRecherche'.$eleve->Stage.' Stage'.$eleve->Stage.'" src="'.base_url().'Public/img/Interface/Stage.png" title="Recherche de Stage" alt="recherche de Stage" />
                        </p>
                        <p class="Ville  '.str_replace(array(' ', "'"), array('_', '_'), $eleve->Ville).'">'.$eleve->Ville.'</p>
                    </div>
                    <span>
                        '.nl2br($eleve->Descriptif).'
                    </span>
                    <div class="DomaineEleve">
                        <ul>';
                        foreach ($liste_souhaits as $domaine) {
                            if ($domaine->idEleve == $eleve->idEleve) {
                                echo '<li class="'.$domaine->TypeDomaine.' '.$domaine->Domaine.'">'.$domaine->Domaine.'</li>';
                            }
                        }
                        echo '</ul>
                    </div>
                </article>';
            }
        ?>
    </div>
</section>
