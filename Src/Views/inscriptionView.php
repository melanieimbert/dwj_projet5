<?php
    $validationKey = uniqid();
    if ($isConnected) {
        ?> 
        <p> Vous êtes déjà connecté, si vous voulez vous connecter avec un autre compte vous devez <a href='index.php?url=/disconnection'> vous déconnecter </a> </p>
    <?php
    } elseif ($addUser) {
        ?>
           <p class="infosActions"> Bonjour et bienvenue : Votre inscription a été prise en compte, merci de valider votre adresse e-mail</p>
    <?php
    } else {
        ?>
        <div class="formulaire">
            <form method="post" action="index.php?url=/inscription">
                <div class="form-group">
                    <p> <label> Nom:</label>  <input type="text" name="firstname"/> </p>
                    <p> <label> Prénom:</label>  <input type="text" name="lastname"/> </p>
                    <p> <label> Email : </label>  <input type="email" name="email"/> </p>
                    <p> <label for="password"> Mot de passe :</label> <input type="password" name="password"  id="password" /> </p>
                    <p> <label for="password_confirm"> Confirmation mot de passe : </label> <input type="password" name="password_confirm" id="password_confirm" /> </p>
                    <p> <input type="hidden" name="validationKey" id="validationKey" value="<?php echo $validationKey; ?>" /> </p>
                    <p> <input type="submit" value="Inscription" /> </p>
                </div>
            </form>
        </div>
 <?php
    }
