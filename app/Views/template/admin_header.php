<!DOCTYPE html> 
<html lang="en"> 
    <head> <meta charset="UTF-8"> <title><?= $title; ?></title> 
    <link rel="stylesheet" href="<?= base_url(relativePath: '/style.css');?>"> 
    <link rel="stylesheet" href="<?= base_url(relativePath: '/edit.css');?>">
</head> 
<body> <div id="container"> <header> 
    <h1>Layout Sederhana</h1>
    Agung Nugroho (agung@pelitabangsa.ac.id) 40
Universitas Pelita Bangsa, Bekasi
</header> 
<nav class="nav-bar"> 
    <a href="<?= base_url('/admin/artikel'); ?>">Dasboard</a> 
    <a href="<?= base_url('/artikel/index_admin');?>">Artikel</a> 
<a href="<?= base_url('/admin/artikel/add'); ?>">Tambah Artikel</a> 
</nav> 
<div class="container">
<section id="wrapper" class="content-about"> 
    <section id="main"></section>