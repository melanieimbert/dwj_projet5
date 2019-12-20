<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Créez votre compte !</h1>
                    </div>
                    <?php
                    if ($isConnected) {
                        ?> 
                        <p> Vous êtes déjà connecté, si vous voulez vous connecter avec un autre compte vous devez <a href='index.php?url=/disconnection'> vous déconnecter </a> </p>
                    <?php
                    } elseif ($addUser) {
                        ?>
                        <p class="infosActions"> Bonjour et bienvenue : Votre inscription a été prise en compte, merci de valider votre adresse e-mail</p>
                    <?php
                    } else {
                        $validationKey = uniqid(); ?>
                        <form method="post" action="index.php?url=/inscription" class="user">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="firstname" id="firstName" placeholder="Nom">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="lastname" id="lastName" placeholder="Prénom(s)">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Adresse e-mail">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Mot de passe">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="password_confirm" id="password_confirm" placeholder="Confirmez votre mot de passe">
                                </div>
                            </div>
                            <input type="hidden" name="validationKey" id="validationKey" value="<?php echo $validationKey; ?>" />
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Inscription" /> 
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="index.php?url=/connection"> Vous avez déjà un compte ? Connectez-vous ! </a>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>