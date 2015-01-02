<section>
    <div id="InscriptionEleve" class="Formulaire clear">
        <?php if(isset($errorEl)) {echo '<div id="errorEl">'.$errorEl.'</div>';} ?>
        <form method="POST">
            <aside id="FormLeftEl">
                <table id="FormCoord">
                    <tbody>
                        <tr>
                            <td><label for="Identifiant">Identifiant :</label></td>
                            <td>
                                <input class="smallInput loginInput" type="text" name="Identifiant" value="<?php echo $login;?>" required></input>
                                <p id="loginP"><?php echo $login;?></p>
                                <img src="<?php echo base_url()?>\Public\img\Interface\Modif.png" title="éditez votre image de profil" alt="éditez votre image de profil" class="edition editionEl" id="loginEl" />
                                <input type="image" src="<?php echo base_url()?>\Public\img\Interface\Validate.png" name="validLogin" class="validation" id="validLogin"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="loginInput" for="MDPLogin">Mot de passe :</label></td>
                            <td><input class="smallInput loginInput" type="password" name="MDPLogin" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="MDP">Mot de passe :</label></td>
                            <td>
                                <input class="smallInput MDP" type="password" name="MDP" ></input>
                                <p id="MDPMessage"> Modifier le Password ?</p>
                                <img src="<?php echo base_url()?>\Public\img\Interface\Modif.png" title="éditez votre image de profil" alt="éditez votre image de profil" class="edition editionEl" id="ModifMDP" />
                                <input type="image" src="<?php echo base_url()?>\Public\img\Interface\Validate.png" name="validMDP" class="validation" id="validMDP"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="MDP" for="newMDP">Nouveau mot de passe :</label></td>
                            <td><input class="smallInput MDP" type="password" name="newMDP" ></input></td>
                        </tr>
                        <tr>
                            <td><label class="MDP" for="newMDPconf">Confirmer :</label></td>
                            <td><input class="smallInput MDP" type="password" name="newMDPconf" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="Nom">Nom :</label></td>
                            <td><input class="smallInput" type="text" name="Nom" value="<?php echo $eleve->Nom;?>" required></input></td>
                        </tr>
                        <tr>
                            <td><label for="Prenom">Prénom :</label></td>
                            <td><input class="smallInput" type="text" name="Prenom" value="<?php echo $eleve->Prenom;?>" required></input></td>
                        </tr>
                        <tr>
                            <td><label for="TelEleve">Téléphone :</label></td>
                            <td><input class="smallInput" type="text" name="TelEleve" value="<?php echo $eleve->TelEleve;?>" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="EmailEleve">Email :</label></td>
                            <td><input class="smallInput" type="email" name="EmailEleve" value="<?php echo $eleve->EmailEleve;?>" required></input></td>
                        </tr>
                        <tr>
                            <td><label for="GitHub">GitHub :</label></td>
                            <td><input class="smallInput" type="text" name="GitHub" value="<?php echo $eleve->GitHub;?>" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="DoYouBuzz">DoYouBuzz :</label></td>
                            <td><input class="smallInput" type="text" name="DoYouBuzz" value="<?php echo $eleve->DoYouBuzz;?>" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="Linkedin">Linkedin :</label></td>
                            <td><input class="smallInput" type="text" name="Linkedin" value="<?php echo $eleve->Linkedin;?>" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="Twitter">Twitter :</label></td>
                            <td><input class="smallInput" type="text" name="Twitter" value="<?php echo $eleve->Twitter;?>" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="Classe">Classe :</label></td>
                            <td>
                                <select name="Classe">
                                    <?php
                                    foreach ($liste_classes as $classes) {
                                        echo '<option value="'.$classes->Classe.'"';
                                        if ($eleve->Classe == $classes->Classe) {echo 'selected="selected"';}
                                            echo ' >'.$classes->Classe.'</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <td><label for="Sexe">Sexe :</label></td>
                        <td>
                            <select name="Sexe">
                                <option value="Autre" <?php if ($eleve->Sexe == 'Autre') {echo 'selected="selected"';}?>> Autre </option>
                                <option value="Homme" <?php if ($eleve->Sexe == 'Homme') {echo 'selected="selected"';}?>> Homme </option>
                                <option value="Femme" <?php if ($eleve->Sexe == 'Femme') {echo 'selected="selected"';}?>> Femme </option>
                            </select>
                        </td>
                        <tr>
                            <td><label for="DateNaiss">Date de naissance :</label></td>
                            <td><input class="smallInput" type="date" name="DateNaiss" value="<?php echo $eleve->DateNaiss;?>" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="LieuNaiss">Lieu de Naissance :</label></td>
                            <td><input class="smallInput" type="text" name="LieuNaiss" value="<?php echo $eleve->LieuNaiss;?>"></input></td>
                        </tr>
                        <tr>
                            <td><label for="Accroche">Phrase d'Acroche :</label></td>
                            <td><input id="Accroche" type="text" name="Accroche" value="<?php echo $eleve->Accroche;?>" required></input></td>
                        </tr>
                        <tr>
                            <td><label for="Descriptif">Présentation :</label></td>
                            <td><textarea name="Descriptif" rows="10" cols="19" required><?php echo $eleve->Descriptif;?></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <input name="SubmitEleve" type="submit" id="SubmitEleve" value="Modifier">
            </aside>
            <div id="FormPhotoEl">
                <label for="PhotoProfil">Photo de Profil :</label>
                <input type="file" name="PhotoProfil" ></input>
            </div>
            <aside id="FormRightEl">
                <table id="FormAdresseEl">
                    <tbody>
                        <tr>
                            <td><label for="TypeVoie">Type De Voie :</label></td>
                            <td>
                                <select name="TypeVoie" >
                                    <option value="Rue" <?php if ($adresse->TypeVoie == 'Rue') {echo 'selected="selected"';}?>> Rue </option>
                                    <option value="Boulevard" <?php if ($adresse->TypeVoie == 'Boulevard') {echo 'selected="selected"';}?>> Boulevard </option>
                                    <option value="Place" <?php if ($adresse->TypeVoie == 'Place') {echo 'selected="selected"';}?>> Place </option>
                                    <option value="Lieux dit" <?php if ($adresse->TypeVoie == 'Lieux dit') {echo 'selected="selected"';}?>> Lieux dit </option>
                                    <option value="Impasse" <?php if ($adresse->TypeVoie == 'Impasse') {echo 'selected="selected"';}?>> Impasse </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="NomVoie">Nom de Voie :</label></td>
                            <td><input type="text" name="NomVoie" value="<?php echo $adresse->NomVoie;?>" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="NumVoie">Numéro :</label></td>
                            <td><input type="text" name="NumVoie" value="<?php echo $adresse->NumVoie;?>" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="CP">Code Postale :</label></td>
                            <td><input type="number" name="CP" value="<?php echo $adresse->CP;?>" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="Ville">Ville :</label></td>
                            <td><input type="text" name="Ville" value="<?php echo $adresse->Ville;?>" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="Pays">Pays :</label></td>
                            <td><input type="text" name="Pays" value="<?php echo $adresse->Pays;?>" ></input></td>
                        </tr>
                    </tbody>
                </table>
                <table id="FormRechercheEl">
                    <tbody>
                        <caption><h2>Entreprise recherchée :</h2></caption>
                        <tr>
                            <td><h3><h3> Pour :</h3></h3></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="Stage" <?php if ($eleve->Stage == 1) { echo 'checked';}?>>Stage</td>
                            <td><input type="checkbox" name="Alternance" value="1" <?php if ($eleve->Alternance == 1) { echo 'checked';}?>>Alternance</td>
                        </tr>
                        <tr>
                            <td><h3> Dans les dommaines :</h3></td>
                        </tr>
                        <?php
                            if ($domaines_dev != FALSE) {
                                foreach ($domaines_dev as $domaine_dev) { echo '
                                    <tr class="DomaineDevEl">
                                        <td><label for="DomaineDevEl">Domaine de Dév :</label></td>
                                        <td>
                                            <select name="DomaineDevEl[]">
                                                <option value="0"> Selectionner </option>';
                                                foreach ($liste_domaine_developpement as $domaine_developpement) {
                                                    echo '<option value="'.$domaine_developpement->idDomaine.'"'; if ($domaine_dev->Domaine == $domaine_developpement->Domaine) {echo 'selected="selected"';} echo '>'.$domaine_developpement->Domaine.'</option>';
                                                }
                                                echo '
                                            </select><img class="SubDel" src="'.base_url().'Public/img/Interface/DelDomaine.png" title="Supprimer un domaine" alt="Supprimer un domaine" width="20px" height="20px" />
                                        </td>
                                    </tr>';
                                }
                            }
                            else { echo '
                                <tr class="DomaineDevEl">
                                    <td><label for="DomaineDevEl">Domaine de Dév :</label></td>
                                    <td>
                                        <select name="DomaineDevEl[]">
                                            <option value="0"> Selectionner </option>';
                                            foreach ($liste_domaine_developpement as $domaine_developpement) {
                                                echo '<option value="'.$domaine_developpement->idDomaine.'">'.$domaine_developpement->Domaine.'</option>';
                                            }
                                            echo '
                                        </select><img class="SubDel" src="'.base_url().'Public/img/Interface/DelDomaine.png" title="Supprimer un domaine" alt="Supprimer un domaine" width="20px" height="20px" />
                                    </td>
                                </tr>';
                            }
                        ?>
                        <tr>
                            <td><img src="<?php echo base_url();?>Public/img/Interface/addDomaine.png" title="Ajouter un Domaine en Developpement" alt="Ajouter un Domaine en Developpement" class="AddDomaine" id="DomaineDevEl" /></td>
                        </tr>
                        <?php
                            if ($domaines_res != FALSE) {
                                foreach ($domaines_res as $domaine_res) { echo '
                                    <tr class="DomaineResEl">
                                        <td><label for="DomaineResEl">Domaine de Réseau :</label></td>
                                            <td>
                                            <select name="DomaineResEl[]">
                                                <option value="0"> Selectionner </option>';
                                                foreach ($liste_domaine_reseau as $domaine_reseau) {
                                                    echo '<option value="'.$domaine_reseau->idDomaine.'"'; if ($domaine_res->Domaine == $domaine_reseau->Domaine) {echo 'selected="selected"';} echo '>'.$domaine_reseau->Domaine.'</option>';
                                                }
                                            echo '
                                            </select><img class="SubDel" src="'.base_url().'Public/img/Interface/DelDomaine.png" title="Supprimer un domaine" alt="Supprimer un domaine" width="20px" height="20px" />
                                        </td>
                                    </tr>';
                                }
                            }
                            else { echo '
                                <tr class="DomaineResEl">
                                    <td><label for="DomaineResEl">Domaine de Réseau :</label></td>
                                    <td>
                                        <select name="DomaineResEl[]">
                                            <option value="0"> Selectionner </option>';
                                            foreach ($liste_domaine_reseau as $domaine_reseau) {
                                                echo '<option value="'.$domaine_reseau->idDomaine.'">'.$domaine_reseau->Domaine.'</option>';
                                            }
                                            echo '
                                        </select><img class="SubDel" src="'.base_url().'Public/img/Interface/DelDomaine.png" title="Supprimer un domaine" alt="Supprimer un domaine" width="20px" height="20px" />
                                    </td>
                                </tr>';
                            }
                        ?>
                        <tr>
                            <td><img src="<?php echo base_url();?>Public/img/Interface/addDomaine.png" title="Ajouter un Domaine en reseau" alt="Ajouter un Domaine en reseau" class="AddDomaine" id="DomaineResEl" /></td>
                        </tr>
                    </tbody>
                </table>
            </aside>
        </form>
    </div>
</section>
