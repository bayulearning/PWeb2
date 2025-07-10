<!DOCTYPE html> 
<html lang="en"> 
    <head> <meta charset="UTF-8"> <title><?= $title; ?></title> 
    <link rel="stylesheet" href="<?= base_url(relativePath: '/style.css');?>"> 
    <link rel="stylesheet" href="<?= base_url(relativePath: '/edit.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head> 
<body> <div id="container"> <header> 
</header> 
<nav class="nav-bar"> 
    <ul class="nav-links">
        <li><a href="<?= base_url('/home');?>" class="active">Home</a> </li>
        <li><a href="<?= base_url('/artikel/index');?>">Warga</a> </li>
        <li><a href="<?= base_url('/about');?>">About</a> </li>
        <li><a href="<?= base_url('/contact');?>">Kontak</a></li>
    </ul>
<!-- <button class="logout">Logout</button> -->
<form class="login"action="<?= base_url('/user/login'); ?>" method="post">
            <button type="submit" class="login">Login Admin</button>
        </form>
</nav> 
<div class="container">
<section id="wrapper" class="content-about"> 
    <section id="main"></section>

