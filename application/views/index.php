<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo isset($title)?$title:''; ?></title>
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url().'assets/images/LOGO JELAJAH PUTRI 2022-02 1.png'; ?>" class="img-responsive">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto ml-5">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bekerja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bertualang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Berbakti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Opini</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kontak</a>
                        </li>
                    </ul>
                    <button class="btn my-2 my-sm-0 ml-auto" type="submit"><i class="bi bi-search"></i></button>
                </div>
                </div>
            </div>
        </nav>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="<?php echo base_url().'assets/images/sample/putri-handayani22___bwxoxj9awlc___1 1.png'; ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Bekerja. Bertualang. Berbakti.</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="<?php echo base_url().'assets/images/sample/putri-handayani22___bwxoxj9awlc___1 1 (1).png'; ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption carousel-caption--headline d-none d-md-block">
                    <div class="category">BERTUALANG</div>
                    <h2>Denali, here we come</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="<?php echo base_url().'assets/images/sample/putri-handayani22___bwxoxj9awlc___1 1 (2).png'; ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption carousel-caption--headline d-none d-md-block">
                    <div class="category">BEKERJA</div>
                    <h2>Perempuan jadi Engineer? Kenapa Tidak?</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </body>
</html>