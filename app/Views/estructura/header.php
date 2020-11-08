<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $title ?></title>
        <link href="<?php echo Base_url(); ?>/public/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <link href="<?php echo Base_url(); ?>/public/css/menuEstilos.css" rel="stylesheet">
        <link href="<?php echo Base_url(); ?>/public/css/album.css" rel="stylesheet">
        <?php
            if ($css){
                foreach ($css as $style){
                    echo '<link href="'. $style .'" rel="stylesheet">';
                }
            }
        ?>
    </head>


    <body>

        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">SUNSHINE</a>

            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="javascript:salir()" id="salir">Salir</a>
                </li>
            </ul>
        </nav>
    <main style="margin-top: 60px;">


