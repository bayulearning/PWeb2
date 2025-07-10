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
            </div> 
        </section> </section>    
        <!-- <aside id="sidebar" class="sidebar-content">  -->

        <!-- </aside>   -->
            </div>
        
    </body> 
    </html>