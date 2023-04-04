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

<script>
    function validEmail(reponse) {
        const email = document.getElementById("email").value;
        const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        if(regex.test(email) && reponse==1) {
            console.log("Mety ka");
            document.getElementById("email").classList.remove("is-invalid");
            document.getElementById("email").classList.add("is-valid");
        }
        else {
            console.log("Tsy mety");
            document.getElementById("email").classList.add("is-invalid");
        }
    }
    function emailExist() {
        const email = document.getElementById("email").value;
        const formData = new FormData();
        formData.append("email", email);
        const request = new XMLHttpRequest();
        request.open("POST", "<?php echo site_url(); ?>Login/emailExist", true);
        request.onload = function() {
            if( request.status >= 200 && request.status < 400 ){
                console.log("Ato aki anh")
                const reponse = request.responseText;
                console.log("reponse = "+reponse);
                validEmail(reponse);
            }
            else{
                console.log("Erreur sur la requette aki anh");
            }
        }
        request.onerror = function() {
            console.log("La requette a echoue");
        }
        request.send(formData);
    }

    function compteExist() {
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const formData = new FormData();
        formData.append("email", email);
        formData.append("password", password);
        const request = new XMLHttpRequest();
        request.open("POST", "<?php echo site_url(); ?>Login/emailPasswordValid", true);
        request.onload = function() {
            if( request.status >= 200 && request.status < 400 ){
                console.log("Ato aki anh")
                const reponse = request.responseText;
                if(reponse==1) {
                    document.getElementById("password").classList.remove("is-invalid");
                    document.getElementById("password").classList.add("is-valid");
                }
                else {
                    document.getElementById("password").classList.add("is-invalid");
                }
            }
            else{
                console.log("Erreur sur la requette aki anh");
            }
        }
        request.onerror = function() {
            console.log("La requette a echoue");
        }
        request.send(formData);
    }
</script>

<main id="main" class="main">
    <section class="section">
        <div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                    <center><h3 class="card-title">Connexion</h3></center>
                    <form action="<?php echo site_url(); ?>login/login" method="post" class="">
                        <div class="row mb-3">
                            <input type="email" id="email" name="email" placeholder="Email" class="form-control" oninput="emailExist()" required>
                            <!-- <div class="input-group-addon"><i class="fa fa-envelope"></i></div> -->
                        </div>
                        <br>
                        <div class="row mb-3">
                            <input type="password" id="password" name="password" placeholder="Mot de Passe" class="form-control" oninput="compteExist()" required>
                            <!-- <div class="input-group-addon"><i class="fa fa-asterisk"></i></div> -->
                        </div>
                        <?php if(isset($erreur)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $erreur; ?>
                            </div>                        
                        <?php  } ?>
                        <div class="row mb-3">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-secondary btn-sm">Sing In</button>
                            </div>
                        </div>
                        </form>
                        <hr>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="<?php echo site_url(); ?>inscription"> Sign Up Here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </selection>
</main>

  <script src="<?php echo site_url(); ?>../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo site_url(); ?>../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo site_url(); ?>../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?php echo site_url(); ?>../assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo site_url(); ?>../assets/vendor/quill/quill.min.js"></script>
  <script src="<?php echo site_url(); ?>../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo site_url(); ?>../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo site_url(); ?>../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo site_url(); ?>../assets/js/main.js"></script>

</body>

</html>
