<?php
    require_once("config.php");
    require_once("libraries/items.functions.php");
    $items = getItems();
?><!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/vendor/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-overrides.css">

        <!-- Bootstrap Bundle with Popper -->
        <script src="js/vendor/bootstrap/bootstrap.bundle.min.js"></script>

        <!-- GLightbox -->
        <link rel="stylesheet" href="css/vendor/glightbox/glightbox.min.css">
        <script src="js/vendor/glightbox/glightbox.min.js"></script>

        <!-- Masonry -->
        <script src="js/vendor/masonry/masonry.pkgd.min.js"></script>

        <link rel="stylesheet" href="css/main.css">

        <title><?= $config["title"] ?></title>
    </head>
    <body class="bg-secondary">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <span class="navbar-brand mb-0 h1"><?= $config["title"] ?></span>
                <form class="d-flex">
                <div class="input-group">
                    <input type="text" class="form-control text-white bg-dark" id="filter-input" placeholder="filter by tags" >
                    <span class="input-group-text bg-secondary">&#128270;</span>
                </div>
                </form>
            </div>
        </nav>
        <main role="main" class="container py-3">
            <div id="items-container" class="row row-cols-1 row-cols-md-4">
                <div class="col sizer-workaround"></div>
                <?php foreach ($items as $item) echo $item->renderCard(); ?>
            </div>
        </main>
        <footer class="footer bg-dark d-flex align-items-center">
            <div class="container text-center text-secondary">
                <span>Copyright &copy; 2021 <a href="<?= $config["contact_url"] ?>" class="text-primary text-decoration-none"><?= $config["owner"] ?></a></span>
                <br />
                <span>Made with <a href="https://github.com/szabolcstoth/garage-sale" class="text-primary text-decoration-none">Garage Sale</a></span>
            </div>
        </footer>
        <script src="js/initialize-components.js"></script>
        <script src="js/items-filter.js"></script>
    </body>
</html>
