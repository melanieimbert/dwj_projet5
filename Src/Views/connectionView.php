<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"> Se connecter </h1>
                            </div>
                            <?php
                            if ($isConnected) {
                                ?>
                            <div class="text-center">
                                <p> Vous êtes déjà connecté, si vous voulez vous connecter avec un autre compte vous devez vous <a href='index.php?url=/disconnection'> déconnecter </a> </p>
                            </div>
                            <?php
                            } elseif ($isAllowConnect === true) {
                                ?>
                            <div class="text-center">
                                <p class="infosActions"> Vous êtes maintenant connecté. </p>
                            </div>
                            <?php
                            } else {
                                ?>
                            <form class="user" method="post" action="index.php?url=/connection">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="email" aria-describedby="emailHelp" placeholder="Adresse e-mail">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Mot de passe">
                                </div>
                                 <input type="submit" class="btn btn-primary btn-user btn-block" value="Connexion"  />
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="index.php?url=/inscription"> Pas encore inscrit ? Créer un compte !</a>
                            </div>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
