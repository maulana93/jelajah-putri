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
        <nav class="navbar navbar-expand-lg navbar-light navbar--page">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url().'assets/images/LOGO JELAJAH PUTRI 2022-02 1.png'; ?>" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-collapse--page" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item <?php if(isset($menu_active) && $menu_active == 'home'){ echo 'active'; } ?>">
                            <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li class="nav-item <?php if(isset($menu_active) && $menu_active == 'about'){ echo 'active'; } ?>">
                            <a class="nav-link" href="<?php echo base_url().'about'; ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url().'kanal'; ?>">Bekerja</a>
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
                        <li class="nav-item <?php if(isset($menu_active) && $menu_active == 'kontak'){ echo 'active'; } ?>">
                            <a class="nav-link" href="<?php echo base_url().'kontak'; ?>">Kontak</a>
                        </li>
                    </ul>
                    <button class="btn my-2 my-sm-0 ml-auto" type="submit"><i class="bi bi-search"></i></button>
                </div>
                </div>
            </div>
        </nav>