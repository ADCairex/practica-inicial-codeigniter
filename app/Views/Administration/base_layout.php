<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css'>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://kit.fontawesome.com/aac2b54c1b.js"></script>

        <!-- Datatable CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
        
        <!-- Datatable CSS -->
        <?= $this->renderSection('css') ?>
        <?= $this->renderSection('javascript') ?>
    </head>
    <body>
    <body id='body-pd'>
        <header class="header" id="header">
            <div class="header_toggle">
                <i class="fas fa-bars" id="header-toggle"></i>
            </div>
            <div class="header_img">
                <img src="https://i.imgur.com/hczKIze.jpg" alt="">
            </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="<?= route_to('home_admin') ?>" class="nav_logo"> 
                        <i class="fas fa-laptop-code"></i> 
                        <span class="nav_logo-name">Panel Admin</span>
                    </a>
                    <div class="nav_list">
                        <a href="<?= route_to('home_admin') ?>" class="nav_link active">
                            <i class="fas fa-home"></i>
                            <span class="nav_name">Inicio</span>
                        </a>
                        <a href="<?= route_to('festival_admin') ?>" class="nav_link">
                            <i class='fas fa-music'></i> 
                            <span class="nav_name">Festivales</span>
                        </a>
                        <a href="<?= route_to('categories_admin') ?>" class="nav_link">
                            <i class="fas fa-list"></i>
                            <span class="nav_name">Categorías</span>
                        </a>
                        <a href="<?= route_to('users_admin') ?>" class="nav_link">
                            <i class="fas fa-users"></i>
                            <span class="nav_name">Usuarios</span>
                        </a>
                        <a href="<?= route_to('roles_admin') ?>" class="nav_link">
                            <i class="fas fa-user-tag"></i>
                            <span class="nav_name">Roles</span>
                        </a>
                        <a href="<?= route_to('config_admin') ?>" class="nav_link">
                            <i class="fas fa-cogs"></i>
                            <span class="nav_name">Configuración</span>
                        </a>
                    </div>
                </div> 
                <a href="#" class="nav_link">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav_name">Cerrar sesión</span>
                </a>
            </nav>
        </div>

        <div id="container">
            <?= $this->renderSection('content') ?>
        </div>     
    </body>
    </body>
</html>