<!DOCTYPE html>
<html lang='fr'>
    <head>
        <meta charset="utf-8"/>
        <title>Mise en relation Élèves/Entreprise</title>
        <link rel="stylesheet" media="all" type"text/css" href="<?php echo base_url();?>Public/css/StyleTemplate.css"/>
        <script type="text/javascript" src="<?php echo base_url();?>Public/js/jquery.min.js"></script>
        <?php if(isset($inclusions)) {echo $inclusions;} ?>
    </head>
    <body>
        <div id="page">
            <aside id="Autre">
                <span id="welcome"><?php if(isset($welcome)) {echo $welcome;} ?></span>
                <a href="<?php echo base_url();?>EditionProfil/Index"><img alt="édition du profil" title="edition du profil" src="<?php echo base_url();?>Public/img/Interface/EditProfil.png" width="50" height="50" /></a>
                <a href="Deconnexion"><img alt="Se déconnecter" title="Se déconnecter" src="<?php echo base_url();?>Public/img/Interface/LogOut.png" width="50" height="50" /></a>
            </aside>
            <img id="logo" title="logoIMIE" alt="logoIMIE" src="<?php echo base_url();?>Public/img/Interface/LogoIMIE.png" />
            <nav>
                <ul>
                    <li><a href="<?php echo base_url();?>Eleves/Index" >Élèves</a></li>
                    <li><a href="#article2" >Entreprises</a></li>
                    <li><a href="<?php echo base_url();?>Offres/Index" >Offres</a></li>
                    <li><a href="<?php echo base_url();?>ProfilEleve/MonProfil" >Profil</a></li>
                </ul>
            </nav>
            <div class="clear">
