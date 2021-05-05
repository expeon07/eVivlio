<!DOCTYPE html>
<html lang="en">
<head>
    <title>eVivlío</title>

    <link rel="icon" href="../assets/img/open-book-back.png">

    <!-- Bootstrap CSS and JS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <link href="../assets/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="navbar-brand"  id="logo">
            <a href="index.php">
                <img src="../assets/img/open-book-back.png" alt="eVivlío logo" 
                    width="30px" height="30px" 
                    style="display: block; margin: 0 auto; margin-top: 5px;">
            </a>
        </div>
        <button class="navbar-toggler" type="button" 
            data-toggle="collapse" data-target="#navbarNavAltMarkup" 
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a href="catalog.php">
                    <button class="btn menu-btn">Book Catalogue</button>
                </a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="my_page.php">
                    <button class="btn menu-btn">
                        <i class="fas fa-user"></i> My Page
                    </button>
                </a>
                <button class="btn menu-btn">
                    <i class="fas fa-shopping-cart"></i>
                </button>
                <button class="btn menu-btn">
                    <i class="fas fa-sign-in-alt"></i>
                    Sign-Up/Login
                </button>
                <button class="btn menu-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </div>
        </div>
    </nav>
