<!DOCTYPE html> 
<html lang="en"> 
    <head> <meta charset="UTF-8"> 
    <title><?= $title ?? 'My Website' ?></title> 
    <link rel="stylesheet" href="<?= base_url('/style.css');?>"> 
    </head> 
<body> 
    <div class="container">
    <section id="wrapper" class="content-about">
        <section id="main">
            <?= $this->renderSection('content') ?> 
        </section> </section>    
        <aside id="sidebar" class="sidebar-content"> 
            <div class="widget-box"> 
                <h3 class="title">Papan Pengumuman</h3> 
                <p>Informasi Terbaru akan ditampilkan di sidebar ini</p> 
                    </div> 
            <div class="widget-box"> 
                <?= view_cell('App\\Cells\\ArtikelTerkini::render') ?> 
                
            </div> 
        </aside>  
            </div>
            <footer> 
                <p>&copy; 2021 - Universitas Pelita Bangsa</p> 
            </footer> 
        
    </body> 
    </html>