<!DOCTYPE html>
<html lang='fr'>
    <head>
        <meta charset="utf-8"/>
        <title>Mise en relation Élèves/Entreprise</title>
        <link rel="stylesheet" media="all" type"text/css" href="<?php echo base_url();?>Public/css/Inscription.css"/>
        <script type="text/javascript" src="<?php echo base_url();?>Public/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>Public/js/Inscription.js"></script>
    </head>
    <body>
        <div id="page" class="clear">
            <br>
            <h1>Inscription</h1>
            <div id="Onglets">
                <img id="OngletEntreprise" src="<?php echo base_url();?>Public/img/Interface/Onglets_inscription_Entreprise.png" class="Onglet" />
                <img id="OngletEleve" src="<?php echo base_url();?>Public/img/Interface/Onglets_inscription_Eleve.png" class="Onglet" />
            </div>
            <div id="InscriptionEntreprise" class="Formulaire clear">
                <?php if(isset($errorEn)) {echo '<div id="ErrorEntreprise">'.$errorEn.'</div>';} ?>
                <form method="POST" enctype="multipart/form-data">
                    <aside id="FormLeftEn">
                        <table id="FormCoord">
                            <tbody>
                                <tr>
                                    <td><label for="Identifiant">Identifiant :</label></td>
                                    <td><input class="smallInput" type="text" name="Identifiant" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="MDP">Mot de passe :</label></td>
                                    <td><input class="smallInput" type="password" name="MDP" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="NomEntreprise">Nom de l'Entreprise :</label></td>
                                    <td><input class="smallInput" type="text" name="NomEntreprise" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="EmailEntreprise">Email :</label></td>
                                    <td><input class="smallInput" type="email" name="EmailEntreprise" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="FaxEntreprise">Numéro de Fax :</label></td>
                                    <td><input class="smallInput" type="text" name="FaxEntreprise" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="TelEntreprise">Numéro de Téléphone :</label></td>
                                    <td><input class="smallInput" type="text" name="TelEntreprise" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="DescriptifEntreprise">Présentation :</label></td>
                                    <td><textarea name="DescriptifEntreprise" rows="10" cols="19" placeholder="Tapez votre message" required></textarea></td>
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
                                        <select name="TypeVoie">
                                            <option value="Rue"> Rue </option>
                                            <option value="Boulevard"> Boulevard </option>
                                            <option value="Place"> Place </option>
                                            <option value="Lieux dit"> Lieux dit </option>
                                            <option value="Impasse"> Impasse </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="NomVoie">Nom de Voie :</label></td>
                                    <td><input type="text" name="NomVoie" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="NumVoie">Numéro :</label></td>
                                    <td><input type="text" name="NumVoie" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="CP">Code Postale :</label></td>
                                    <td><input type="number" name="CP" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="Ville">Ville :</label></td>
                                    <td><input type="text" name="Ville" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="Pays">Pays :</label></td>
                                    <td><input type="text" name="Pays" placeholder="France" ></input></td>
                                </tr>
                            </tbody>
                        </table>
                        <table id="FormRechercheEn">
                            <tbody>
                                <caption><h2>élèves recherchés :</h2></caption>
                                <tr>
                                    <td><h3>élèves recherchés :</h3></td>
                                    <td>
                                        <input type="checkbox" name="Stagiaire" value="1" checked>Un Stagiaire<br>
                                        <input type="checkbox" name="Alternant" value="1" checked>Un Alternant<br>
                                        <input type="checkbox" name="Employe" value="1" checked>Un employé
                                    </td>
                                </tr>
                                <tr>
                                    <td><h3>Vous travaillez dans :</h3></td>
                                </tr>
                                <tr class="DomaineDevEn">
                                    <td><label for="DomaineDevEn">Domaine de Dév :</label></td>
                                    <td>
                                        <select name="DomaineDevEn[]">
                                            <option value="0"> Selectionner </option>
                                            <?php
                                                foreach ($liste_domaine_developpement as $domaine_developpement) {
                                                    echo '<option value="'.$domaine_developpement->idDomaine.'">'.$domaine_developpement->Domaine.'</option>';
                                                }
                                            ?>
                                        </select><img class="SubDel" src="<?php echo base_url();?>Public/img/Interface/DelDomaine.png" title="Supprimer un domaine" alt="Supprimer un domaine" width="20px" height="20px" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo base_url();?>Public/img/Interface/addDomaine.png" title="Ajouter un Domaine en Developpement" alt="Ajouter un Domaine en Developpement" class="AddDomaine" id="DomaineDevEn" /></td>
                                </tr>
                                <tr class="DomaineResEn">
                                    <td><label for="DomaineResEn">Domaine de Réseau :</label></td>
                                    <td>
                                        <select name="DomaineResEn[]">
                                            <option value="0"> Selectionner </option>
                                            <?php
                                                foreach ($liste_domaine_reseau as $domaine_reseau) {
                                                    echo '<option value="'.$domaine_reseau->idDomaine.'">'.$domaine_reseau->Domaine.'</option>';
                                                }
                                            ?>
                                        </select><img class="SubDel" src="<?php echo base_url();?>Public/img/Interface/DelDomaine.png" title="Supprimer un domaine" alt="Supprimer un domaine" width="20px" height="20px" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo base_url();?>Public/img/Interface/addDomaine.png" title="Ajouter un Domaine en reseau" alt="Ajouter un Domaine en reseau" class="AddDomaine" id="DomaineResEn" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </aside>
                </form>
            </div>
            <div id="InscriptionEleve" class="Formulaire clear">
                <?php if(isset($errorEl)) {echo '<div id="ErrorEleve">'.$errorEl.'</div>';} ?>
                <form method="POST" enctype="multipart/form-data">
                    <aside id="FormLeftEl">
                        <table id="FormCoord">
                            <tbody>
                                <tr>
                                    <td><label for="Identifiant">Identifiant :</label></td>
                                    <td><input class="smallInput" type="text" name="Identifiant" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="MDP">Mot de passe :</label></td>
                                    <td><input class="smallInput" type="password" name="MDP" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="Nom">Nom :</label></td>
                                    <td><input class="smallInput" type="text" name="Nom" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="Prenom">Prénom :</label></td>
                                    <td><input class="smallInput" type="text" name="Prenom" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="TelEleve">Téléphone :</label></td>
                                    <td><input class="smallInput" type="text" name="TelEleve" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="EmailEleve">Email :</label></td>
                                    <td><input class="smallInput" type="email" name="EmailEleve" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="GitHub">GitHub :</label></td>
                                    <td><input class="smallInput" type="text" name="GitHub" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="DoYouBuzz">DoYouBuzz :</label></td>
                                    <td><input class="smallInput" type="text" name="DoYouBuzz" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="Linkedin">Linkedin :</label></td>
                                    <td><input class="smallInput" type="text" name="Linkedin" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="Twitter">Twitter :</label></td>
                                    <td><input class="smallInput" type="text" name="Twitter" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="Classe">Classe :</label></td>
                                    <td>
                                        <select name="Classe">
                                            <?php
                                                foreach ($liste_classes as $classes) {
                                                    echo '<option value="'.$classes->Classe.'">'.$classes->Classe.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <td><label for="Sexe">Sexe :</label></td>
                                <td>
                                    <select name="Sexe">
                                        <option value="Autre"> Autre </option>
                                        <option value="Homme"> Homme </option>
                                        <option value="Femme"> Femme </option>
                                    </select>
                                </td>
                                <tr>
                                    <td><label for="DateNaiss">Date de naissance :</label></td>
                                    <td><input class="smallInput" type="date" name="DateNaiss" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="LieuNaiss">Lieu de Naissance :</label></td>
                                    <td><input class="smallInput" type="text" name="LieuNaiss"></input></td>
                                </tr>
                                <tr>
                                    <td><label for="Accroche">Phrase d'Acroche :</label></td>
                                    <td><input id="Accroche" type="text" name="Accroche" required></input></td>
                                </tr>
                                <tr>
                                    <td><label for="Descriptif">Présentation :</label></td>
                                    <td><textarea name="Descriptif" rows="10" cols="19" placeholder="Tapez votre message" required></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                        <input name="SubmitEleve" type="submit" id="SubmitEleve" value="S'inscrire">
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
                                        <select name="TypeVoie">
                                            <option value="Rue"> Rue </option>
                                            <option value="Boulevard"> Boulevard </option>
                                            <option value="Place"> Place </option>
                                            <option value="Lieux dit"> Lieux dit </option>
                                            <option value="Impasse"> Impasse </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="NomVoie">Nom de Voie :</label></td>
                                    <td><input type="text" name="NomVoie" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="NumVoie">Numéro :</label></td>
                                    <td><input type="text" name="NumVoie" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="CP">Code Postale :</label></td>
                                    <td><input type="number" name="CP" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="Ville">Ville :</label></td>
                                    <td><input type="text" name="Ville" ></input></td>
                                </tr>
                                <tr>
                                    <td><label for="Pays">Pays :</label></td>
                                    <td><input type="text" name="Pays" placeholder="France" ></input></td>
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
                                    <td><input type="checkbox" name="Stage" value="1" checked>Stage</td>
                                    <td><input type="checkbox" name="Alternance" value="1" checked>Alternance</td>
                                </tr>
                                <tr>
                                    <td><h3> Dans les dommaines :</h3></td>
                                </tr>
                                <tr class="DomaineDevEl">
                                    <td><label for="DomaineDevEl">Domaine de Dév :</label></td>
                                    <td>
                                        <select name="DomaineDevEl[]">
                                            <option value="0"> Selectionner </option>
                                            <?php
                                                foreach ($liste_domaine_developpement as $domaine_developpement) {
                                                    echo '<option value="'.$domaine_developpement->idDomaine.'">'.$domaine_developpement->Domaine.'</option>';
                                                }
                                            ?>
                                        </select><img class="SubDel" src="<?php echo base_url();?>Public/img/Interface/DelDomaine.png" title="Supprimer un domaine" alt="Supprimer un domaine" width="20px" height="20px" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo base_url();?>Public/img/Interface/addDomaine.png" title="Ajouter un Domaine en Developpement" alt="Ajouter un Domaine en Developpement" class="AddDomaine" id="DomaineDevEl" /></td>
                                </tr>
                                <tr class="DomaineResEl">
                                    <td><label for="DomaineResEl">Domaine de Réseau :</label></td>
                                    <td>
                                        <select name="DomaineResEl[]">
                                            <option value="0"> Selectionner </option>
                                            <?php
                                                foreach ($liste_domaine_reseau as $domaine_reseau) {
                                                    echo '<option value="'.$domaine_reseau->idDomaine.'">'.$domaine_reseau->Domaine.'</option>';
                                                }
                                            ?>
                                        </select><img class="SubDel" src="<?php echo base_url();?>Public/img/Interface/DelDomaine.png" title="Supprimer un domaine" alt="Supprimer un domaine" width="20px" height="20px" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo base_url();?>Public/img/Interface/addDomaine.png" title="Ajouter un Domaine en reseau" alt="Ajouter un Domaine en reseau" class="AddDomaine" id="DomaineResEl" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </aside>
                </form>
            </div>
            <footer>
            </footer>
        </div>
    </body>
</html>
