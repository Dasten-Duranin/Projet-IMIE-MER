<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset="utf-8"/>
    <title>Mise en relation Élèves/Entreprise</title>
    <link rel="stylesheet" media="all" type"text/css" href="css/StyleTemplate.css"/>
    <link rel="stylesheet" media="all" type"text/css" href="css/ListeEntreprise.css"/>
    <!--<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/_js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.2/jquery.scrollTo-min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>-->
</head>
<body>

    <div id="page">
        <aside id="Autre">
            <a href="0"><img alt="édition du profil" title="edition du profil" src="img/EditProfil.png" width="50" height="50" /></a>
            <a href="0"><img alt="Se déconnecter" title="Se déconnecter" src="img/LogOut.png" width="50" height="50" /></a>
        </aside>
        <img id="logo" title="logoIMIE" alt="logoIMIE" src="img/LogoIMIE.png" />
        <nav>
            <ul>
                <li><a href="#article1" >Élèves</a></li>
                <li><a href="#article2" >Entreprise</a></li>
                <li><a href="#article3" >Offres</a></li>
                <li><a href="#article4" >Profil</a></li>
            </ul>
        </nav>
        <div class="clear">

            <section>
                <div class="clear">
                    <img class="BoutonTypeDomaine" title="Reseaux" alt="Reseaux" src="img/Reseaux.png" width="150" height="37" />
                    <img class="BoutonTypeDomaine" title="developpement" id="BoutonDev" alt="developpement" src="img/Developpement.png" width="240" height="37" />
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


                <div class="clear">
                <article id="premiere">
                    <div id="div1">
                        <p id ="info">- Adresse de l'entreprise <br> - Taille de l'entreprise</p>
                        <h1>Nom de l'entreprise</h1>
                    </div>
                    <p id="logos">Logo</p>
                    <p id="descriptif">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum. lorem</p>

                        <p id="recherche"> Recherche : <br><br><span>Stage</span> <br><br><span>Alternance</span> <br><br><span>Emploi</span>
                        


                </article>

                <article id="premiere">
                    <div id="div1">
                        <p id ="info">- Adresse de l'entreprise <br> - Taille de l'entreprise</p>
                        <h1>Nom de l'entreprise</h1>
                    </div>
                    <p id="logos">Logo</p>
                    <p id="descriptif">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <p id="recherche"> Recherche : <br><br><span>Stage</span> <br><br><span>Alternance</span> <br><br><span>Emploi</span>


                    </article>
                    <article id="premiere">
                        <div id="div1">
                            <p id ="info">- Adresse de l'entreprise <br> - Taille de l'entreprise</p>
                            <h1>Nom de l'entreprise</h1>
                        </div>
                        <p id="logos">Logo</p>
                        <p id="descriptif">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                            <p id="recherche"> Recherche : <br><br><span>Stage</span> <br><br><span>Alternance</span> <br><br><span>Emploi</span>


                    </article>
                </div>
            </section>



            <div class="line"></div>


            <footer>
                <p>&copy; Projet intervenant | <a href="0" title="Mentions Légales" alt="Mentions Légales" >Mentions Légales</a></p>
            </footer>
        </div>
    </div>
</body>
</html>
