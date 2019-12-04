<?php
    if ($isConnected) {
        ?>
    <p> Vous êtes déjà connecté, si vous voulez vous connecter avec un autre compte vous devez vous <a href='index.php?url=/disconnection'> déconnecter </a> </p>
    <?php
    } elseif ($isAllowConnect === true) {
        ?>
        <p class="infosActions"> Vous êtes maintenant connecté. </p>
    <?php
    } else {
        ?>
        <div class="formulaire">
            <p class='infosActions'> <?php echo $isAllowConnect; ?> </p>
            <p> Connectez-vous afin de pouvoir laisser des commentaires : </p>
            <form method="post" action="afev/index.php?url=/connection">
                <div class="form-group">
                    <p> <label> Email :</label>  <input type="text" name="email" /> </p>
                    <p> <label for="password"> Mot de passe :</label> <input type="password" name="password" id="password" /> </p>
                    <p> <input type="submit" value="Connexion" /> </p>
                </div>
            </form>
        </div>
    <?php
    }
