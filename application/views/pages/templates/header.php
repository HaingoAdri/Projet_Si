<!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo site_url(); ?>../assets/img/favicon.png" rel="icon">
    <link href="<?php echo site_url(); ?>../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo site_url(); ?>../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>../assets/fonts/fontawesome-all.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo site_url(); ?>../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.5.0
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    </head>

    <body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block"><?php echo $_SESSION['nom']; ?></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">A propos de l'entreprise</li>

        <li class="nav-item">

            <li class="nav-item">
                <a class="nav-link " href="<?php echo site_url(); ?>Connexion/apropos">
                <i class="bi bi-grid"></i>
                <span>Mon Entreprise</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Adresses</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="<?php echo site_url(); ?>Adresses/listeAdresse">
                <i class="bi bi-circle"></i><span>Listes des adresses</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url(); ?>Adresses/ajout">
                <i class="bi bi-circle"></i><span>Ajout</span>
                </a>
            </li>
            </ul>
        </li><!-- End Components Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Dirigeant</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="<?php echo site_url(); ?>Dirigeants/listesDirigeants">
                <i class="bi bi-circle"></i><span>Dirigeants successifs</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url(); ?>Dirigeants/ajout">
                <i class="bi bi-circle"></i><span>Ajout</span>
                </a>
            </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-heading">Donnees de l'entreprise</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Devise</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="<?php echo site_url(); ?>Devises/listeDevise">
                <i class="bi bi-circle"></i><span>Listes des devises</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url(); ?>Devises/ajout">
                <i class="bi bi-circle"></i><span>Ajout</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url(); ?>Devises/tauxDevise">
                <i class="bi bi-circle"></i><span>Taux des devises</span>
                </a>
            </li>
            </ul>
        </li><!-- End Tables Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Journal</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="<?php echo site_url(); ?>CodeJournal/ajout">
                <i class="bi bi-circle"></i><span>Code</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url(); ?>Journal/index">
                <i class="bi bi-circle"></i><span>Affichage Journal</span>
                </a>
            </li>
            </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gem"></i><span>Compte</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?php echo site_url(); ?>CompteGeneral/ajout">
                    <i class="bi bi-circle"></i><span>General</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url(); ?>CompteTiers/ajout">
                    <i class="bi bi-circle"></i><span>Tiers</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#exercices-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Exercices</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="exercices-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?php echo site_url(); ?>Exercice/ajout">
                    <i class="bi bi-circle"></i><span>Ajout</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#balance-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Balance</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="balance-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="<?php echo site_url(); ?>BalanceExercice/index">
                <i class="bi bi-circle"></i><span>Balance</span>
                </a>
            </li>
            </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
                <a class="nav-link " href="<?php echo site_url(); ?>CodeGrandLivre/index">
                <i class="bi bi-grid"></i>
                <span>Grand Livre</span>
                </a>
            </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link " href="<?php echo site_url(); ?>EtatsFinanciers/index">
            <i class="bi bi-grid"></i>
            <span>Bilan</span>
            </a>
        </li><!-- End Dashboard Nav -->

        </ul>

    </aside><!-- End Sidebar-->
