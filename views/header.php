<?php require_once __DIR__ . "/../classes/DB.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Date picker-->
    <link rel="stylesheet" href="../datepicker/css/datepicker.css">
    <link rel="stylesheet" href="../datepicker/js/bootstrap-datepicker.js">

    <meta charset="utf-8">
    <!-- Bootstrap -->
    <link href="static/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="static/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="static/css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Sree+Krushnadevaraya' rel='stylesheet' type='text/css'>
    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>

    <title>SportsBuddy</title>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SportsBuddy</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php"><img src="static/img/home7.png" alt="" /> Home <span class="sr-only">(current)</span></a></li>
            <li><a href="about.php"><img src="static/img/info31.png" alt="" /> What is SportsBuddy?</a></li>
            <li><a href="#"><img src="static/img/notifications.png" alt="" /> Notifications</a></li>
            <li><a href="viewevents"><img src="static/img/table-tennis.png" alt="" /> View events & sessions</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

<div class="container">
