<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="App/Asset/public/style.css"/>
        <!-- Custom fonts for sb template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for sb template-->
        <link href="App/Asset/public/sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Fontfamily Roboto -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">   
        <!-- CDN pour utiliser fontawesome -->
        <script src="https://use.fontawesome.com/4eb7a9de94.js"></script>
        <title> Ma platforme en ligne - dossier administratif - <?php echo $title; ?>  </title>
    </head>   
 
    <body >
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?url=/">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3"> Asso </div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?url=/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Menu</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Homepage Collapse Menu --> 
                <li class="nav-item">
                    <a class="nav-link collapsed" href="index.php?url=/">
                        <i class="fas fa-home"></i>
                        <span>Accueil</span>
                    </a>
                </li>
                <?php
                if ($isConnected) {
                    if ($isUserConnected) {
                        ?>
                        <!-- Nav Item - UserPage Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="index.php?url=/volunteer">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Mon dossier </span>
                            </a>
                        </li>
                        <?php
                    } elseif ($isAdminConnected) {
                        ?> 
                            <!-- Nav Item - AdminPage Collapse Menu -->
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="index.php?url=/admin">
                                    <i class="fas fa-fw fa-wrench"></i>
                                    <span>Administrateur</span>
                                </a>
                            </li>
                        <?php
                    } ?>


                        <!-- Nav Item - Disconnection Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="index.php?url=/disconnection">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <span>Deconnexion</span>
                            </a>
                        </li>
                    <?php
                } else {
                    ?>
                        <!-- Nav Item - Inscription Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="index.php?url=/inscription">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Inscription</span>
                            </a>
                        </li>
                        <!-- Nav Item - Connection Collapse Menu --> 
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="index.php?url=/connection">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <span>Connexion</span>
                            </a>
                        </li>
                    <?php
                } ?>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
    
                <div id="weather" class="text-xs font-weight-bold mb-1 text-center d-none d-md-inline"> 
                            <p id="weather_city_date"> </p>
                            <img id="weather_icon"> </img>
                            <p id="weather_condition"> </p>
                            <p> Un temps parfait pour gérer son dossier, non ?! </p>
                </div> 
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> La plateforme pour gérer votre dossier administratif -  <?php echo $title; ?></div>
                        </div>   
                    </nav>
                   
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h2 mb-2 text-gray-800"> <?php echo  $title; ?> </h1>
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
                    <div class="container-fluid">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="App/Asset/public/sb-admin-2/js/sb-admin-2.min.js"></script>
        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="App/Asset/public/sb-admin-2/js/demo/chart-area-demo.js"></script>
        <script src="App/Asset/public/sb-admin-2/js/demo/chart-pie-demo.js"></script>
        <!-- own js script -->
        <script src="App/Asset/public/js/classes/Ajax.js"></script>
        <script src="App/Asset/public/js/classes/SlidesShow.js"></script>
        <script src="App/Asset/public/js/main.js"></script>
    </body>
</html>