<section>
    <div class="clear">
        <img class="BoutonTypeDomaine" title="Reseaux" alt="Reseaux" src="<?php echo base_url(); ?>Public/img/Interface/Reseaux.png" width="150" height="37" />
        <img class="BoutonTypeDomaine" title="developpement" id="BoutonDev" alt="developpement" src="<?php echo base_url(); ?>Public/img/Interface/Developpement.png" width="240" height="37" />
    </div>
    <div class="formulaire">
        <FORM method="post" action="" class="filtre">
            <label for="domaine">Domaine</label><br>
            <SELECT name="Domaine" size="1">
                <OPTION>Tous</OPTION>
                <OPTION>Développement</OPTION>
                <OPTION>Réseau</OPTION>
            </SELECT>
        </FORM>   
        <FORM method="post" action="" class="filtre">
            <label for="taille">Taille</label><br>
            <SELECT name="Taille" size="1">
                <OPTION>Toutes</OPTION>
                <OPTION>PME</OPTION>
                <OPTION>SA</OPTION>
            </SELECT>
        </FORM> 
        <FORM method="post" action="" class="filtre">
            <label for="recrutement">Recrutement</label><br>
            <SELECT name="Recrutement" size="1">
                <OPTION>Tous</OPTION>
                <OPTION>Stage</OPTION>
                <OPTION>Alternance</OPTION>
                <OPTION>CDI</OPTION>
                <OPTION>CDD</OPTION>
            </SELECT>
        </FORM> 
        <FORM method="post" action="" class="filtre">
            <label for="Rechercher">Rechercher</label><br>
            <input type="text" name="Recherche" value="Rechercher..."/>

        </FORM>
    </div>


	<?php 
		foreach ($Entreprises as $entreprise) {
		
			    echo '<div class="clear">
			    <article id="premiere">
			        <div id="div1">
			            <p id ="info">'.$entreprise->Ville.' <br></p>
			            <h1>'.$entreprise->NomEntreprise.'</h1>
			        </div>
			        <p id="logos"><img src="'; if ($entreprise->LogoEntreprise != false) {
			        	echo $entreprise->LogoEntreprise;
			        							}
			        							else {
			        								echo base_url().'Public/img/Defaut_Logo_Entreprise.png';
			        							} echo '" width= "200" height="133">
			        </p>
			        <p id="descriptif">'.$entreprise->DescriptifEntreprise.'</p>

			            <p id="recherche"> Recherche : <br><br><span>Stage</span> <br><br><span>Alternance</span> <br><br><span>Emploi</span>
			    </article>';

		}?>
    </div>
</section>
