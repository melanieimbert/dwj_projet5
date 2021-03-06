<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> Ma platforme en ligne - dossier administratif  - <?php echo $title; ?>   </title>
        <!-- Own web style -->
        <link rel="stylesheet" href="Asset/css/style.css"/>
        <!-- Favicon du site -->
        <link rel="shortcut icon" type="image/png" href="Asset/images/favicon_folder.ico"/>
        <!-- CDN plugin dataTables and option -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <!-- Custom fonts for sb template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for sb template-->
        <link  href="Asset/sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
    </head>   
 
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <li>
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fas fa-laugh-wink"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3"> Asso </div>
                    </a>
                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                </li>
                
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Menu</span></a>
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                </li>
                
                 <!-- Heading -->
                <li>
                    <div class="sidebar-heading">
                        Interface
                    </div>
                </li>
                <!-- Nav Item - Homepage Collapse Menu --> 
                <li class="nav-item">
                    <a class="nav-link" href="/" >
                        <i class="fa fa-home"></i>
                        <span>Accueil</span>
                    </a>
                </li>
                <?php
                if ($isConnected) {
                    if ($isUserConnected) {
                        ?>
                        <!-- Nav Item - UserPage Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link" href="/volunteer">
                                <i class="fa fa-fw fa-folder"></i>
                                <span>Mon dossier </span>
                            </a>
                        </li>
                        <?php
                    } elseif ($isAdminConnected) {
                        ?> 
                            <!-- Nav Item - AdminPage Collapse Menu -->
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">
                                    <i class="fa fa-fw fa-wrench"></i>
                                    <span>Administrateur</span>
                                </a>
                            </li>
                        <?php
                    } ?>


                        <!-- Nav Item - Disconnection Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link" href="/disconnection">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <span>Deconnexion</span>
                            </a>
                        </li>
                    <?php
                } else {
                    ?>
                        <!-- Nav Item - Inscription Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link" href="/inscription">
                            <i class="fa fa-fw fa-table"></i>
                            <span>Inscription</span>
                            </a>
                        </li>
                        <!-- Nav Item - Connection Collapse Menu --> 
                        <li class="nav-item">
                            <a class="nav-link" href="/connection">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <span>Connexion</span>
                            </a>
                        </li>
                    <?php
                } ?>
                <li class="text-center">
                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">
                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle  border-0" id="sidebarToggle"> </button>
                    </div>
                </li>
                <li class="text-center">
                    <div id="weather" class="text-xs font-weight-bold mb-1 text-center d-none d-md-inline"> 
                                <p id="weather_city_date"> </p>
                                <img id="weather_icon" src="" alt="weather_image">
                                <p id="weather_condition"> </p>
                                <a style="text-decoration:none;font-size:0.75em;" title="Détail des prévisions pour Lyon"
                                href="http://www.prevision-meteo.ch/meteo/localite/paris">Prévisions complètes pour Lyon</a>
                                <p> Un temps parfait pour gérer son dossier, non ?! </p>
                    </div> 
                </li>
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
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-center mb-4">
                            <h1 class="h2 mb-2 text-gray-800"> <?php echo  $title; ?> </h1>
                        </div>

                        <div class="container-fluid">
                        <?php
                        if (isset($message) && !is_null($message)) {
                            ?>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="<?php echo $type; ?>">
                                        <?php echo $message; ?>
                                    </div>
                                </div>
                            </div> 
                        <?php
                        }?> 
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- CDN pour utiliser fontawesome -->
        <script src="https://use.fontawesome.com/4eb7a9de94.js"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- CDN plugin dataTables and option -->
        <script charset="utf-8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <!-- own js script -->
        <script src="Asset/js/classes/Ajax.js"></script>
        <script src="Asset/js/classes/SlidesShow.js"></script>
        <script src="Asset/js/main.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="Asset/sb-admin-2/js/sb-admin-2.min.js"></script>
        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="Asset/sb-admin-2/js/demo/chart-area-demo.js"></script>
        <script src="Asset/sb-admin-2/js/demo/chart-pie-demo.js"></script>
    </body>
</html>