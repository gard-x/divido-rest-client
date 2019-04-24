<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>iDefend Api</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        .container{margin-top: 80px}
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="./">Gard-X DIVIDO Service Rest Client</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="calculator.php">Finance calculator </a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="applications.php">List of Applications</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="create-quote.php">Create Test Quote </a>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav px-3">
        <?if (Authenticate::isLogged()){?>

        <li class="nav-item text-nowrap">

            <a class="nav-link" href="logout.php"> <?php
                $user=Authenticate::getUser();
                echo $user->getUserId();
                ?> Sign out</a>
        </li>
        <?}else{?>
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="login.php">Login</a>
        </li>
        <?}?>
    </ul>
</nav>

<main role="main" class="container" >

    <div class="row justify-content-md-center">
        <div class="col col-lg-12">


<?php


//ini_set('xdebug.var_display_max_depth', '-1');
//ini_set('xdebug.var_display_max_children', '-1');
//ini_set('xdebug.var_display_max_data', '-1');


