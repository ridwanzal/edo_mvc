<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title_bar ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicons.png"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top mynav">
            <div class="container">
                <div class="navbar-header">
                  <button aria-controls="navbar" aria-expanded="false" class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo base_url() ?>"><img alt="" src="<?php echo base_url() ?>assets/img/logo.png"></a>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav ul">
                        <li>
                            <a href="<?php echo base_url() ?>" title="Home">Home</a>
                        </li>
                        <li class="menu">
                            <a href="<?php echo base_url() ?>index.php/frontpage/about" title="About me">About Me</a>
                        </li>
                        <li class="menu">
                            <a href="<?php echo base_url() ?>index.php/frontpage/service" title="Service">Service</a>
                        </li>
                        <li class="menu">
                            <a href="#about" title="Portofolio">Portofolio</a>
                        </li> 
                        <li class="menu">
                            <a href="#project" title="Project">Project</a>
                        </li>
                        <li class="menu">
                            <a href="#blog" title="Blog">Blog</a>
                        </li>
                        <li class="menu">
                            <a href="<?php echo base_url() ?>index.php/frontpage/contact" title="Kontak">Contact</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="toppad" id="clock"></a>
                        </li>
                        <!-- <li>
                            <a href="#contact" title="">Maps</a>
                        </li>
                        <li class="toppad"><input id="searchinput" placeholder="Pencarian . . ." type="text"></li>
                        <li id="searchbar"><span class="fa fa-search searchspan"></span></li> -->
                    </ul>
                </div>
            </div>
        </nav>
