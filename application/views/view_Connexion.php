<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset="utf-8"/>
    <title>Mise en relation Élèves/Entreprise</title>
    <link rel="stylesheet" media="all" type"text/css" href="<?php echo base_url();?>Public/css/StyleTemplate.css"/>
    <link rel="stylesheet" media="all" type"text/css" href="<?php echo base_url();?>Public/css/PageConnexion.css"/>
    <!--<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/_js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.2/jquery.scrollTo-min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>-->
</head>
<body>
    <div class="generale">
        <div class="connexion">
            <h2>Connexion</h2>
        </div>
        <div>
            <?php if(isset($error)) {echo $error;} ?>
        </div>
        <FORM method="POST">
            <div class="login">
                <div id="log" >
                    <label for="login">Login</label><br>
                    <input type="text" autofocus name="login" value=""/><br>
                </div>
                <div  id="pass">
                    <label for="mdp">Password</label><br>
                    <input type="password" name="mdp" value=""/><br>
                </div>
            </div>
            <div class="bout">
                <div >
                    <INPUT type="submit" name="connexion" VALUE="Se Connecter" style="width:200">
                </div>
                <div >
                    <INPUT type="submit" name="inscription" VALUE="S'inscrire">
                </div>
            </div>
        </FORM>
    </div>
