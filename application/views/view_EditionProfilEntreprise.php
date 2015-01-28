<section>
    <div id="InscriptionEntreprise" class="Formulaire clear">
        <?php if(isset($errorEn)) {echo '<div id="ErrorEntreprise">'.$errorEn.'</div>';} ?>
        <form method="POST" enctype="multipart/form-data">
            <aside id="FormLeftEn">
                <table id="FormCoord">
                    <tbody>
                        <tr>
                            <td><label for="Identifiant">Identifiant :</label></td>
                            <td>
                                <input class="smallInput loginInput" type="text" name="Identifiant" value="<?php echo $login;?>" required></input>
                                <p id="loginP"><?php echo $login;?></p>
                                <img src="<?php echo base_url()?>\Public\img\Interface\Modif.png" title="éditez votre image de profil" alt="éditez votre image de profil" class="edition editionEn" id="loginEn" />
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
                                <img src="<?php echo base_url()?>\Public\img\Interface\Modif.png" title="éditez votre image de profil" alt="éditez votre image de profil" class="edition editionEn" id="ModifMDP" />
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
                            <td><label for="NomEntreprise">Nom de l'Entreprise :</label></td>
                            <td><input class="smallInput" type="text" name="NomEntreprise" value="<?php echo $entreprise->NomEntreprise;?>" required></input></td>
                        </tr>
                        <tr>
                            <td><label for="EmailEntreprise">Email :</label></td>
                            <td><input class="smallInput" type="email" name="EmailEntreprise" value="<?php echo $entreprise->EmailEntreprise;?>" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="FaxEntreprise">Numéro de Fax :</label></td>
                            <td><input class="smallInput" type="text" name="FaxEntreprise" value="<?php echo $entreprise->FaxEntreprise;?>" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="TelEntreprise">Numéro de Téléphone :</label></td>
                            <td><input class="smallInput" type="text" name="TelEntreprise"  value="<?php echo $entreprise->TelEntreprise;?>"></input></td>
                        </tr>
                        <tr>
                            <td><label for="DescriptifEntreprise">Présentation :</label></td>
                            <td><textarea name="DescriptifEntreprise" rows="10" cols="19" required><?php echo $entreprise->DescriptifEntreprise;?></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <input name="SubmitEntreprise" type="submit" id="SubmitEntreprise" value="S'inscrire">
            </aside>
            <div id="FormPhotoEn">
                <label for="LogoEntreprise">Logo :</label>
                <input type="file" name="LogoEntreprise"></input>
            </div>
            <aside id="FormRightEn">
                <table id="FormAdresseEn">
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
                <table id="FormRechercheEn">
                    <tbody>
                        <caption><h2>élèves recherchés :</h2></caption>
                        <tr>
                            <td><h3>élèves recherchés :</h3></td>
                            <td>
                                <input type="checkbox" name="Stagiaire" value="1" <?php if ($entreprise->Stagiaire == 1) { echo 'checked';}?>>Un Stagiaire<br>
                                <input type="checkbox" name="Alternant" value="1" <?php if ($entreprise->Alternant == 1) { echo 'checked';}?>>Un Alternant<br>
                                <input type="checkbox" name="Employe" value="1" <?php if ($entreprise->Employe == 1) { echo 'checked';}?>>Un employé
                            </td>
                        </tr>
                        <tr>
                            <td><h3>Vous travaillez dans :</h3></td>
                        </tr>
                        <?php
                            if ($domaines_dev != FALSE) {
                                foreach ($domaines_dev as $domaine_dev) { echo '
                                    <tr class="DomaineDevEn">
                                        <td><label for="DomaineDevEn">Domaine de Dév :</label></td>
                                        <td>
                                            <select name="DomaineDevEn[]">
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
                                <tr class="DomaineDevEn">
                                    <td><label for="DomaineDevEn">Domaine de Dév :</label></td>
                                    <td>
                                        <select name="DomaineDevEn[]">
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
                            <td><img src="<?php echo base_url();?>Public/img/Interface/addDomaine.png" title="Ajouter un Domaine en Developpement" alt="Ajouter un Domaine en Developpement" class="AddDomaine" id="DomaineDevEn" /></td>
                        </tr>
                            <?php
                                if ($domaines_res != FALSE) {
                                    foreach ($domaines_res as $domaine_res) { echo '
                                        <tr class="DomaineResEn">
                                            <td><label for="DomaineResEn">Domaine de Réseau :</label></td>
                                                <td>
                                                <select name="DomaineResEn[]">
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
                                    <tr class="DomaineResEn">
                                        <td><label for="DomaineResEn">Domaine de Réseau :</label></td>
                                        <td>
                                            <select name="DomaineResEn[]">
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
                            <td><img src="<?php echo base_url();?>Public/img/Interface/addDomaine.png" title="Ajouter un Domaine en reseau" alt="Ajouter un Domaine en reseau" class="AddDomaine" id="DomaineResEn" /></td>
                        </tr>
                    </tbody>
                </table>
            </aside>
        </form>
    </div>
</section>
