<section>
    <div>
        <div class="PhotoProfil">
            <img src="<?php if($entreprise->LogoEntreprise != FALSE) {echo $entreprise->LogoEntreprise;} else {echo base_url().'Public/img/Defaut_Logo_Entreprise.png';} ?>" id="logoProfil" title="Logo de l'entreprise" alt="Logo de l'entreprise" width="200" height="133">
        </div>
        <div class="information">
            <?php echo $entreprise->NomEntreprise; ?><br>
            <?php echo $entreprise->EmailEntreprise; ?><br> Distance entre l'école <br> et l'entreprise
        </div>
        <div class="information2">
            Email : <br> Téléphone |  Fax <br> Adresse
        </div>
    </div>

    <div>
        <div class="descriptif">
            <?php echo $entreprise->DescriptifEntreprise; ?>
        </div>
        <div>
            <div class="choix" id="stagiaire">
                Recherche Stagiaire
            </div>
            <div class="choix" id="alternant">
                Recherche Alternant
            </div>
            <div class="choix" id="emploi">
                Emploi
            </div>
        </div>
    </div>

    <div>
      <img src="img/Sebastien.jpg" id="logoDev" width="135" height="200">
      <img src="img/Moi.jpg" id="logoRes" width="135" height="200">
    </div>
</section>
