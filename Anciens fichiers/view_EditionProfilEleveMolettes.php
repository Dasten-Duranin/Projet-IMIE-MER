<section>
    <div class="clear">
        <div id="InfosPerso">
            <div class="clear">
                <div class="PhotoProfil">
                    <img src="<?php echo base_url()?>\Public\img\Interface\Modif.png" title="éditez votre image de profil" alt="éditez votre image de profil" class="edition" id="editionPhotoProfil" />
                    <img src="<?php if($eleve->PhotoProfil != FALSE) {echo $eleve->PhotoProfil;} else {echo base_url().'Public/img/Defaut_Photo_Profile.png';}?>" width="157" height="202" id="PhotoProfil" />
                </div>
                <aside id="Identite">
                    <?php echo
                    $eleve->Nom.'<br>'.
                    $eleve->Prenom.'<br>'.
                    $eleve->Classe.'<br>
                    Adresse :<br>'.
                    $adresse->NumVoie.' '.$adresse->TypeVoie.' '.$adresse->NomVoie.'<br>'.
                    $adresse->Ville.',<br>'.
                    $adresse->CP.', '.$adresse->Pays.'<br>
                    né le '.date("d/m/Y", strtotime($eleve->DateNaiss)).'<br>
                    à '.$eleve->LieuNaiss.'<br>'
                    ; ?>
                    <img src="<?php echo base_url()?>\Public\img\Interface\Modif.png" title="éditez votre image de profil" alt="éditez votre image de profil" class="edition" id="editionIdentite" />
                </aside>
                <aside id="Accroche">
                    <img src="<?php echo base_url()?>\Public\img\Interface\Modif.png" title="éditez votre image de profil" alt="éditez votre image de profil" class="edition" id="editionAccroche" />
                    <span><p><?php echo $eleve->Accroche; ?></p></span>
                </aside>
            </div>
        </div>
        <div id="CoordDescrip">
            <div class="clear">
                <div id="SecondBloc">
                    <div id="coordonnes">
                        Adresse Email :<br>
                        <?php echo $eleve->EmailEleve; ?><br>
                        Numéro de téléphone :<br>
                        <?php echo $eleve->TelEleve; ?><br>
                        <img src="<?php echo base_url()?>\Public\img\Interface\Modif.png" title="éditez votre image de profil" alt="éditez votre image de profil" class="edition" id="editioncoordonnes" />
                    </div>
                    <table class="LiensWebSite">
                        <tr>
                            <td>
                                <p class="LienWebSite">GitHub :</p>
                            </td>
                            <td>
                                <?php
                                    if ($eleve->GitHub != FALSE) { echo '
                                        <a href="'.$eleve->GitHub.'" target=_blank><img class="LogosWebSite" src="'.base_url().'Public/img/Liens/LOGO_GitHub.png" title="Liens vers GitHub" alt="Liens vers GitHub" /></a>
                                    ';}
                                    else { echo '
                                        <img class="LogosWebSite" src="'.base_url().'Public/img/Liens/LOGO_GitHub_NB.png" title="Liens vers GitHub" alt="Liens vers GitHub" />
                                    ';}
                                ?>
                            </td>
                            <td>
                                <img src="<?php echo base_url()?>\Public\img\Interface\Modif.png" title="éditez votre image de profil" alt="éditez votre image de profil" class="edition ModifLiens" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="LienWebSite">DoYouBuzz :</p>
                            </td>
                            <td>
                                <?php
                                    if ($eleve->DoYouBuzz != FALSE) { echo '
                                        <a href="'.$eleve->DoYouBuzz.'" target=_blank><img class="LogosWebSite" src="'.base_url().'Public/img/Liens/LOGO_DYB.png" title="Liens vers DoYouBuzz" alt="Liens vers DoYouBuzz" /></a>';
                                    }
                                    else { echo '
                                        <img class="LogosWebSite" src="'.base_url().'Public/img/Liens/LOGO_DYB_NB.png" title="Liens vers DoYouBuzz" alt="Liens vers DoYouBuzz" />';
                                    }
                                ?>
                            </td>
                            <td>
                                <img src="<?php echo base_url()?>\Public\img\Interface\Modif.png" title="éditez votre image de profil" alt="éditez votre image de profil" class="edition ModifLiens" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="LienWebSite">Linkedin :</p>
                            </td>
                            <td>
                                <?php
                                    if ($eleve->Linkedin != FALSE) { echo '
                                        <a href="'.$eleve->Linkedin.'" target=_blank><img class="LogosWebSite" src="'.base_url().'Public/img/Liens/LOGO_Linkedin.png" title="Liens vers Linkedin" alt="Liens vers Linkedin" /></a>';
                                    }
                                    else { echo '
                                        <img class="LogosWebSite" src="'.base_url().'Public/img/Liens/LOGO_Linkedin_NB.png" title="Liens vers Linkedin" alt="Liens vers Linkedin" />';
                                    }
                                ?>
                            </td>
                            <td>
                                <img src="<?php echo base_url()?>\Public\img\Interface\Modif.png" title="éditez votre image de profil" alt="éditez votre image de profil" class="edition ModifLiens" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="LienWebSite">Twitter :</p>
                            </td>
                            <td>
                                <?php
                                    if ($eleve->Twitter != FALSE) { echo '
                                        <a href="'.$eleve->Twitter.'" target=_blank><img class="LogosWebSite" src="'.base_url().'Public/img/Liens/LOGO_Twitter.png" title="Liens vers Twitter" alt="Liens vers Twitter" /></a>';
                                    }
                                    else { echo '
                                        <img class="LogosWebSite" src="'.base_url().'Public/img/Liens/LOGO_Twitter_NB.png" title="Liens vers Twitter" alt="Liens vers Twitter" />';
                                    }
                                ?>
                            </td>
                            <td>
                                <img src="<?php echo base_url()?>\Public\img\Interface\Modif.png" title="éditez votre image de profil" alt="éditez votre image de profil" class="edition ModifLiens" />
                            </td>
                        </tr>
                    </table>
                </div>
                <aside>
                    <div class="clear">
                        <div id="Descriptif">
                            <span><?php echo $eleve->Descriptif; ?></span>
                        </div>
                        <div id="Recherche">
                            <img class="BoutonRecherche<?php echo $eleve->Alternance; ?>" src="<?php echo base_url();?>Public/img/Interface/Alternance.png" title="Recherche d'alternance" alt="recherche d'alternance" />
                            <img class="BoutonRecherche<?php echo $eleve->Stage; ?>" src="<?php echo base_url();?>Public/img/Interface/Stage.png" title="Recherche de Stage" alt="recherche de Stage" />
                        </div>
                    </div>
                </aside>
                <div id="Domaines">
                    <?php foreach ($domaines as $domaine) {
                        echo '
                            <img src="'.base_url().''.$domaine->logoDomaine.'" title="Domaine '.$domaine->Domaine.'" alt="Domaine '.$domaine->Domaine.'" class="Domaine" />
                        ';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>
