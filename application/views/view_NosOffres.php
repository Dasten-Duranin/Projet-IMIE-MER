<section>
    <?php if(isset($errorOf)) {echo '<div id="errorOf">'.$errorOf.'</div>';} ?>
    <table class="ListOffer">
        <thead class="ListOffer">
            <tr class="ListOffer">
                <th class="ListOffer">
                    #
                </th>
                <th class="ListOffer">
                    Date
                </th>
                <th class="ListOffer">
                    Titre de l'offre
                </th>
                <th class="ListOffer">
                    Stage
                </th>
                <th class="ListOffer">
                    Alternance
                </th>
                <th class="ListOffer">
                    Emploi
                </th>
                <th class="ListOffer">
                    Visualiser
                </th>
                <th class="ListOffer">
                    Modifier
                </th>
                <th class="ListOffer">
                    Supprimer
                </th>
            </tr>
        </thead>
        <tbody class="ListOffer">
            <?php $i=1; foreach ($Offres as $Offre) { echo '<tr>
                <td class="ListOffer">
                    '.$i.'
                </td>
                <td class="ListOffer">
                    '.date("d/m/Y", strtotime($Offre->DateOffre)).'
                </td>
                <td class="ListOffer">
                    '.$Offre->TitreOffre.'
                </td>
                <td class="ListOffer">';
                    if ($Offre->StageOffre == 1) {echo '<img src="'.base_url().'Public/img/Interface/Tick.png" alt="Modifier l\'offre" title="Modifier l\'offre" class="tickinfo" />';} echo '
                </td>
                <td class="ListOffer">';
                    if ($Offre->AlternanceOffre == 1) {echo '<img src="'.base_url().'Public/img/Interface/Tick.png" alt="Modifier l\'offre" title="Modifier l\'offre" class="tickinfo" />';} echo '
                </td>
                <td class="ListOffer">';
                    if ($Offre->EmploiOffre == 1) {echo '<img src="'.base_url().'Public/img/Interface/Tick.png" alt="Modifier l\'offre" title="Modifier l\'offre" class="tickinfo" />';}  echo '
                </td>
                <td class="ListOffer">
                    <a href="'.base_url().'DetailsOffre/Index?idOffre='.$Offre->idOffre.'"><img src="'.base_url().'Public/img/Interface/visualiser.png" alt="Visualiser l\'offre" title="Visualiser l\'offre" class="visualiser" /></a>
                </td>
                <td class="ListOffer">
                    <a href="'.base_url().'Offres/Index?idOffreModif='.$Offre->idOffre.'"><img src="'.base_url().'Public/img/Interface/Modif.png" alt="Modifier l\'offre" title="Modifier l\'offre" class="submitmodifier" /></a>
                </td>
                <td class="ListOffer">
                    <img src="'.base_url().'/Public/img/Interface/DelOFfre.png" alt="Supprimer l\'offre" title="Supprimer l\'offre" class="submitdel" id="OffreNumber'.$Offre->idOffre.'"/>
            </tr> '; $i=$i+1;}?>
        </tbody>
    </table>
    <div id="confirmArea">
        <form method="POST">
            <table id="ConfirmTable">
                <tbody>
                    <caption><h3>Etes vous sur de vouloir supprimer cette offre ?</h3></caption>
                    <tr>
                        <td><label for="Identifiant">Identifiant :</label></td>
                        <td><input class="ConfirmInput" type="text" name="Identifiant" required></input></td>
                    </tr>
                    <tr>
                        <td><label for="MDP">Mot de passe :</label></td>
                        <td><input class="ConfirmInput" type="password" name="MDP" required></input></td>
                    </tr>
                    <tr id="idOffre">
                        <td><label for="idOffre">idOffre :</label></td>
                        <td><input class="ConfirmInput" type="number" name="idOffreConfirm" id="idOffreConfirm" required hidden></input></td>
                    </tr>
                </tbody>
            </table>
            <input class="ConfirmSubmit" name="ConfirmDel" type="submit" id="ConformDel" value="Confirmer">
        </form>
        <input id="CancelDelete" name="ConfirmDel" type="submit" value="Annuler">
    </div>
</section>
<?php
    if(isset($OffreById)) {
        echo '
            <section id="ModifOffre">
                <div class="Formulaire clear">
                    <form method="POST">
                        <aside id="FormModifLeftEn">
                            <table id="FormDetails">
                                <caption><h2>Modification de l\'offre : '.$OffreById->TitreOffre.'</h2></caption>
                                <tbody>
                                    <tr>
                                        <td><label for="TitreOffre">Titre de l\'Offre :</label></td>
                                        <td><input class="Details" type="text" name="TitreOffre" value="'.$OffreById->TitreOffre.'" ></input></td>
                                    </tr>
                                    <tr>
                                        <td><label for="DescriptifOffre">Déscription :</label></td>
                                        <td><textarea class="Details" name="DescriptifOffre" rows="10" cols="50" required>'.$OffreById->DescriptifOffre.'</textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input name="SubmitModifOffre" type="submit" id="SubmitModifOffre" value="Valider">
                        </aside>
                        <aside id="FormModifRightEn">
                            <table>
                                <tbody>
                                    <caption class="Right"><h3>Type d\'Offre :</h3></caption>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="StageOffre" value="1" ';if ($OffreById->StageOffre == 1) { echo 'checked';} echo' >Un Stage<br>
                                            <input type="checkbox" name="AlternanceOffre" value="1" ';if ($OffreById->AlternanceOffre == 1) { echo 'checked';} echo' >Une Alternance<br>
                                            <input type="checkbox" name="EmploiOffre" value="1" ';if ($OffreById->EmploiOffre == 1) { echo 'checked';} echo' >Un emploi
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="FormDomaines">
                                <tbody>
                                    <caption class="Right"><h3>Quelles compétances cherchez vous ?</h3></caption>';
                                    if ($domaines_dev != FALSE) {
                                        foreach ($domaines_dev as $domaine_dev) { echo '
                                            <tr class="DomaineDevModifOf">
                                                <td><label for="DomaineDevModifOf">Domaine de Dév :</label></td>
                                                <td>
                                                    <select name="DomaineDevModifOf[]">
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
                                        <tr class="DomaineDevModifOf">
                                            <td><label for="DomaineDevModifOf">Domaine de Dév :</label></td>
                                            <td>
                                                <select name="DomaineDevModifOf[]">
                                                    <option value="0"> Selectionner </option>';
                                                    foreach ($liste_domaine_developpement as $domaine_developpement) {
                                                        echo '<option value="'.$domaine_developpement->idDomaine.'">'.$domaine_developpement->Domaine.'</option>';
                                                    }
                                                    echo '
                                                </select><img class="SubDel" src="'.base_url().'Public/img/Interface/DelDomaine.png" title="Supprimer un domaine" alt="Supprimer un domaine" width="20px" height="20px" />
                                            </td>
                                        </tr>';
                                    }
                                    echo '
                                    <tr>
                                        <td><img src="'.base_url().'Public/img/Interface/addDomaine.png" title="Ajouter un Domaine en Developpement" alt="Ajouter un Domaine en Developpement" class="AddDomaine" id="DomaineDevModifOf" /></td>
                                    </tr>';
                                    if ($domaines_res != FALSE) {
                                        foreach ($domaines_res as $domaine_res) { echo '
                                            <tr class="DomaineResModifOf">
                                                <td><label for="DomaineResModifOf">Domaine de Réseau :</label></td>
                                                <td>
                                                    <select name="DomaineResModifOf[]">
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
                                        <tr class="DomaineResModifOf">
                                            <td><label for="DomaineResModifOf">Domaine de Réseau :</label></td>
                                            <td>
                                                <select name="DomaineResModifOf[]">
                                                    <option value="0"> Selectionner </option>';
                                                    foreach ($liste_domaine_reseau as $domaine_reseau) {
                                                        echo '<option value="'.$domaine_reseau->idDomaine.'">'.$domaine_reseau->Domaine.'</option>';
                                                    }
                                                    echo '
                                                </select><img class="SubDel" src="'.base_url().'Public/img/Interface/DelDomaine.png" title="Supprimer un domaine" alt="Supprimer un domaine" width="20px" height="20px" />
                                            </td>
                                        </tr>';
                                    } echo '
                                    <tr>
                                        <td><img src="'.base_url().'Public/img/Interface/addDomaine.png" title="Ajouter un Domaine en reseau" alt="Ajouter un Domaine en reseau" class="AddDomaine" id="DomaineResModifOf" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </aside>
                    </form>
                </div>
            </section>
        ';
    }
?>
<img src="<?php echo base_url();?>Public/img/Interface/createOffer.png" alt="Créer une Offre d'emploi" title="Créer une Offre d'emploi" id="CreateOffer" />
<section id="NewOffre">
    <div class="Formulaire clear">
        <?php if(isset($errorEn)) {echo '<div id="ErrorMesOffres">'.$errorOf.'</div>';} ?>
        <form method="POST">
            <aside id="FormLeftEn">
                <table id="FormDetails">
                    <caption><h2>Créez votre offre.</h2></caption>
                    <tbody>
                        <tr>
                            <td><label for="TitreOffre">Titre de l'Offre :</label></td>
                            <td><input class="Details" type="text" name="TitreOffre" ></input></td>
                        </tr>
                        <tr>
                            <td><label for="DescriptifOffre">Déscription :</label></td>
                            <td><textarea class="Details" name="DescriptifOffre" rows="10" cols="50" required>Tapez votre message</textarea></td>
                        </tr>
                    </tbody>
                </table>
                <input name="SubmitOffre" type="submit" id="SubmitOffre" value="Valider">
            </aside>
            <aside id="FormRightEn">
                <table>
                    <tbody>
                        <caption class="Right"><h3>Type d'Offre :</h3></caption>
                        <tr>
                            <td>
                                <input type="checkbox" name="StageOffre" value="1" >Un Stage<br>
                                <input type="checkbox" name="AlternanceOffre" value="1" >Une Alternance<br>
                                <input type="checkbox" name="EmploiOffre" value="1" >Un emploi
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table id="FormDomaines">
                    <tbody>
                        <caption class="Right"><h3>Quelles compétances cherchez vous ?</h3></caption>
                        <tr class="DomaineDevOf">
                            <td><label for="DomaineDevOf">Domaine de Dév :</label></td>
                            <td>
                                <select name="DomaineDevOf[]">
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
                            <td><img src="<?php echo base_url();?>Public/img/Interface/addDomaine.png" title="Ajouter un Domaine en Developpement" alt="Ajouter un Domaine en Developpement" class="AddDomaine" id="DomaineDevOf" /></td>
                        </tr>
                        <tr class="DomaineResOf">
                            <td><label for="DomaineResOf">Domaine de Réseau :</label></td>
                            <td>
                                <select name="DomaineResOf[]">
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
                            <td><img src="<?php echo base_url();?>Public/img/Interface/addDomaine.png" title="Ajouter un Domaine en reseau" alt="Ajouter un Domaine en reseau" class="AddDomaine" id="DomaineResOf" /></td>
                        </tr>
                    </tbody>
                </table>
            </aside>
        </form>
    </div>
</section>
