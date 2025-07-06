<!DOCTYPE html> 
<html lang="en"> 
    <head> <meta charset="UTF-8"> 
    <title><?= $title; ?></title> 
    <link rel="stylesheet" href="<?= base_url(relativePath: '/style.css');?>"> 
    <link rel="stylesheet" href="<?= base_url(relativePath: '/edit.css');?>">
</head> 
<body> <div id="container"> <header> 
    <h1>Layout Sederhana</h1>
</header> 
<nav class="nav-bar"> 
    <ul class="nav-links">
       <li> <a href="<?= base_url('/admin/artikel'); ?>">Dasboard</a> </li>
       <li> <a href="<?= base_url('/artikel/index_admin');?>">Artikel</a> </li>
       <li> <a href="<?= base_url('/admin/artikel/add'); ?>">Tambah Artikel</a></li>
    </ul>
    <form action="<?= base_url('/user/logout'); ?>" method="post">
    <button type="submit" class="logout">Logout</button>
</form>




</nav> 
<div class="container">
<section id="wrapper" class="content-about"> 
    <section id="main"></section>