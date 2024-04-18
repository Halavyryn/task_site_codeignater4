<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?= $title; ?></title>

   <!--CSS-->
    <!--font awesome-->
    <link rel="stylesheet" href="libs/font_awesome/font-awesome.min.css">

    <!--for hamburger menu-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!--Owl Carousel 2 CSS-->
    <link rel="stylesheet" href="libs/owl_slider/owl.carousel.min.css">
    <link rel="stylesheet" href="libs/owl_slider/owl.theme.default.min.css">
    <!--main css-->
    <link rel = "stylesheet" href = "css/style.css">

    <!--JS-->
    <!--jquery-->
    <script src="libs/jquery/jquery.min.js"></script>

    <!--Owl Carousel 2 JS-->
    <script src="libs/owl_slider/owl.carousel.min.js"></script>

    <!--main js-->
    <script src = "js/main.js"></script>
</head>
<body>

<?= view('layouts/header'); ?>
<?= $this->renderSection('content'); ?>
<?= view('layouts/footer'); ?>

</body>
</html>