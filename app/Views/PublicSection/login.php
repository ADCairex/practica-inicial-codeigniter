<?= $this->extend('PublicSection/base_layout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/PublicSection/css/login.css') ?>">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

    <div class="sign-in-div">
        <img src="<?= base_url('assets/PublicSection/images/iconHermanosAmoros.png') ?>">
        <h3>Please sign in</h3>

        <form id="sign-in-form" class='sign-in-form'>
            <input type="text" class='form-control' name="user-email" id="user-email">
            <input type="password" class='form-control' name="pass" id="pass">
            <button type="submit" class='btn btn-primary'>Sign in</button>
        </form>

        <p class='copyright-textPl'><i class="far fa-copyright"></i> 2017-2021</p>
    </div>
    <div class="nav-div">
        <a href="<?= route_to('home_public') ?>">Ir al inicio publico</a>
        <a href="<?= route_to('home_admin') ?>">Ir al inicio privado</a>
    </div>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script type='text/javascript'>

        $( document ).ready(function() {
            $('#sign-in-form').on('submit', function(event) {
                event.preventDefault();

                let data = new FormData(this);

                $.ajax({
                    url: "<?= route_to('check_login') ?>",
                        type: 'POST',
                        data: data,
                        processData: false,
                        contentType: false,
                        async: true,
                        timeout: 10000,
                        beforeSend: (xhr) => {},
                        success: (response) => {

                            $(this).trigger('reset');

                            alert('La peticion ha sido enviada correctamente');
                        },
                        error: (xhr, status, error) => {
                            alert('Se ha producido un error');
                        },
                        complete: (response) => {
                            console.log(response);
                        }
                });
            });
        });        

    </script>
<?= $this->endSection() ?>