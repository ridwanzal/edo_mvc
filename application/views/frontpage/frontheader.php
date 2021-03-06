<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title_bar ?></title>
        <meta http-equiv="content-type" content="text/html" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="msvalidate.01" content="B674F5F875DFF0B3381FF627A93A7A96" />
        <meta name="author" content="M. Ridwan Zalbina"/>
        <meta name="keyword" content="<? echo $keyword ?>" />
        <meta name="description" content="<? echo $description ?>" />

        <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicons.png"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        
        <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/lib/owlcarousel/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/lib/owlcarousel/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/lib/owlcarousel/dist/assets/owl.theme.green.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/lib/magnific-popups/dist/magnific-popup.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css">
        <!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" type="text/javascript"> -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167865622-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-167865622-1');
        </script>
        <script
                    src="https://code.jquery.com/jquery-3.3.1.min.js"
                    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                    crossorigin="anonymous"></script>
        <script  src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
        
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top mynav">
            <div class="container">
                <div class="navbar-header">
                  <button aria-controls="navbar" aria-expanded="true" class="navbar-toggle collapsed" data-target="#navbarx" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                 </button> 
                  <a class="navbar-brand" href="<?php echo base_url() ?>"><img alt="" src="<?php echo base_url() ?>assets/img/logoone.svg" width="80px" style="position:relative;top:-3px;"></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarx">
                    <ul class="nav navbar-nav ul">
                        <li>
                            <a href="<?php echo base_url() ?>" title="Home">Home</a>
                        </li>
                        <li class="menu">
                            <a href="<?php echo base_url() ?>about" title="About me">About</a>
                        </li>
                        <li class="menu">
                            <a href="<?php echo base_url() ?>service" title="Service">Services</a>
                        </li>
                        <li class="menu">
                            <a href="<?php echo base_url() ?>portfolio" title="Portfolio">Portfolio</a>
                        </li> 
                        <li class="menu">
                            <a href="<?php echo base_url() ?>blog" title="Blog">Blog</a>
                        </li>
                        <li class="menu">
                            <a href="<?php echo base_url() ?>contact" title="Kontak">Contact</a>
                        </li>
                        <li class="toppad"><input id="searchinput" placeholder="Pencarian . . ." type="text"></li>  
                        <!-- <li title="Cari" id="searchbar"><span class="fa fa-search searchspan" style="cursor:pointer;"></span></li> -->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <a href="https://api.whatsapp.com/send?phone=+6281919992000&text=Halo, ada yang bisa dibantu ?"><button id="btn_connect" class="button1_outline_small_green_smaller" title="Contact Me">Whatsapp&nbsp;&nbsp;<span class="feather-24" data-feather="arrow-right" style="position:relative; top:2.3px;"></span></button></a>
                        <li id="satis">
                            <a href="" style="pointer-events: none; cursor: default;" title="">Connect directly ? </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
