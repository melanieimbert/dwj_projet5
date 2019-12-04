<h1> Accueil </h1>
<p> Bonjour et bienvenue sur cette plateforme de gestion de votre dossier administratif </p>
<p> Pour rappel, ce dossier administratif doit être remis au plus vite afin que vous puissiez être assuré par l'association et avoir vos indemnités </p>

<div>
    <h2> Fonctionnement du site </h2>
    <!-- Caroussel de présentation ? -->
</div>

<?php
if (!$isConnected) {
    ?>
<div id="connexion"> 
    <h2> Connexion </h2> 
    <form method="post" action="afev/index.php?url=/connection">
        <div class="form-group">
            <p> <label> Pseudo :</label>  <input type="text" name="pseudo" /> </p>
            <p> <label for="password"> Mot de passe :</label> <input type="password" name="password" id="password" /> </p>
            <p> <input type="submit" value="Connexion" /> </p>
        </div>
    </form>
</div>
<?php
}
