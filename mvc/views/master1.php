<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost/php-mvc/" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ShopPet</title>
    <!-- Bootstrap core CSS -->
    <link href="./mvc/views/assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="./mvc/views/assets/css/font-awesome.min.css" rel="stylesheet">
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="./mvc/views/assets/ItemSlider/css/main-style.css" rel="stylesheet">
    <!-- custom CSS here -->
    <link href="./mvc/views/assets/css/style.css" rel="stylesheet">
</head>
<style>
#loader {
    display: block;
    margin: auto;
}

.sale {
    text-decoration: line-through;
}

.changecolor {
    animation: color-change 1s infinite;
}

@keyframes color-change {
    0% {
        color: red;
    }

    50% {
        color: blue;
    }

    100% {
        color: red;
    }
}
</style>


<body>
    <nav class="navbar navbar-default" role="navigation">
        <?php require_once "./mvc/views/blocks/menu.php"; ?>
    </nav>
    <div class="container">
        <?php if(isset($data['menu-main'])) include_once "./mvc/views/blocks/".$data['menu-main'].".php"  ?>

        <!-- /.row -->
        <div class="row">
            <?php if(isset($data['menu-left'])) include_once "./mvc/views/blocks/".$data['menu-left'].".php" ?>
            <?php include_once "./mvc/views/pages/".$data['page'].".php"; ?>

        </div>


        <!--Footer -->
        <?php include_once "./mvc/views/blocks/footer.php" ?>
        <!--Footer end -->

        <!--Core JavaScript file  -->
        <script src="./public/js/jquery-3.5.1.min.js"></script>
        <script src="./public/js/main.js"></script>

        <script src="./public/js/jquery.inview.js"></script>
        <!--bootstrap JavaScript file  -->
        <script src="./mvc/views/assets/js/bootstrap.js"></script>
        <!--Slider JavaScript file  -->
        <script src="./mvc/views/assets/ItemSlider/js/modernizr.custom.63321.js"></script>
        <script src="./mvc/views/assets/ItemSlider/js/jquery.catslider.js"></script>

</body>

</html>