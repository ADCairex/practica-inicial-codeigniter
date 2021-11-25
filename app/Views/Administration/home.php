<?= $this->extend('Administration/base_layout.php') ?>


<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/Administration/css/home.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/Administration/css/menu.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script src="<?= base_url('assets/Administration/js/menu.js') ?>"></script>
    <script type='text/javascript'>

        $(document).ready(() => {

        });

    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
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
                    <a href="#" class="nav_logo"> 
                        <i class="fas fa-laptop-code"></i> 
                        <span class="nav_logo-name">Panel Admin</span>
                    </a>
                    <div class="nav_list">
                        <a href="#" class="nav_link active">
                            <i class="fas fa-home"></i>
                            <span class="nav_name">Inicio</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class='fas fa-music'></i> 
                            <span class="nav_name">Festivales</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class="fas fa-list"></i>
                            <span class="nav_name">Categorías</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class="fas fa-users"></i>
                            <span class="nav_name">Usuarios</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class="fas fa-user-tag"></i>
                            <span class="nav_name">Roles</span>
                        </a>
                        <a href="#" class="nav_link">
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
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <h4>Home admin</h4>
        </div>        
    </body>
<?= $this->endSection() ?>