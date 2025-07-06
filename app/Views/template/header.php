<!DOCTYPE html> 
<html lang="en"> 
    <head> <meta charset="UTF-8"> <title><?= $title; ?></title> 
    <link rel="stylesheet" href="<?= base_url(relativePath: '/style.css');?>"> 
</head> 
<body> <div id="container"> <header> 
    <h1>Layout Sederhana</h1>
    Agung Nugroho (agung@pelitabangsa.ac.id) 40
Universitas Pelita Bangsa, Bekasi
</header> 
<nav class="nav-bar"> 
    <a href="<?= base_url('/');?>" class="active">Home</a> 
<a href="<?= base_url('/artikel/index');?>">Artikel</a> 
<a href="<?= base_url('/about');?>">About</a> 
<a href="<?= base_url('/contact');?>">Kontak</a> 
</nav> 
<div class="container">
<section id="wrapper" class="content-about"> 
    <section id="main"></section>

