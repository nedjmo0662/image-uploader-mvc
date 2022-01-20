<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['page_title'] ." | " . WEBSITE_TITLE;?></title>
    <link rel="stylesheet" href="<?= ASSETS?>catalog/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ASSETS?>catalog/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= ASSETS?>catalog/css/templatemo-style.css">
<!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
</head>
<body >
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index">
                <i class="fas fa-film mr-2"></i>
                <?= WEBSITE_TITLE?>
                <?php  echo isset($_SESSION['first_name']) ? " | Hi, " . $_SESSION['first_name'] : "";?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li onclick="toggle(event)" class="nav-item">
                    <a class="nav-link nav-link-1" href="<?=ROOT?>index" >Photos</a>
                </li>
                <li onclick="toggle(event)" class="nav-item">
                    <a class="nav-link nav-link-2"  href="<?=ROOT?>videos">Videos</a>
                </li>
                <li onclick="toggle(event)" class="nav-item">
                    <a class="nav-link nav-link-3" aria-current="page" href="<?=ROOT?>about">About</a>
                </li>
                <li onclick="toggle(event)" class="nav-item">
                    <a class="nav-link nav-link-4" href="<?=ROOT?>contact">Contact</a>
                </li>

                <li onclick="toggle(event)" class="nav-item">
                    <a class="nav-link nav-link-4" href="<?=ROOT?>upload/image">Upload Image</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <script>
        function toggle(e){
            var links = Array.from(document.querySelectorAll(".nav-link"));
            links.forEach((link)=>link.classList.remove("active"));
            
            window.location = "videos";
            
        }
</script>