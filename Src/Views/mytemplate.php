<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="App/Asset/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Fontfamily Roboto -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">   
        <!-- CDN pour utiliser fontawesome -->
        <script src="https://use.fontawesome.com/4eb7a9de94.js"></script>
        <title> Ma platforme en ligne - dossier administratif - <?php echo $title; ?>  </title>
    </head>   
    <body class="container-fluid">
        <header> 
            <div class="row justify-content-between align-items-center">
                <div id="logo" class="col-3">
                    <h1> @sso </h1>                 
                </div>
                <div id="navigator" class="col-4">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?url=/"> Accueil <span class="sr-only"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?url=/inscription"> Inscription <span class="sr-only"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?url=/connection"> Connexion <span class="sr-only"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?url=/disconnection"> Se déconnecter <span class="sr-only"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?url=/volunteer"> Mon dossier </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href='index.php?action=admin'>  Admin </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?action=coordinator"> Coordo </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <section id="contents">
            <div  class="row justify-content-center">
                <div id="title" class="col-md-2 col-sm-4">
                    <h1> <?php echo $title; ?></h1>
                </div>
            </div> 
            <?php
                if (isset($message) && !is_null($message)) {
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="alert alert-info">
                                <?php echo $message; ?>
                            </div>
                        </div>
                    </div> 
                <?php
                }?>    
            <div class="row justify-content-center">
                <div id="content" class="col-md-9 col-sm-11"> 
                    <?php echo $content; ?>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>