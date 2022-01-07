<?= $this->extend('Administration/base_layout.php') ?>


<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/Administration/css/home.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/Administration/css/menu.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script type='text/javascript'>
        $(document).ready(() => {
            $('#sign-in-form').on('submit', function(event) {
                event.preventDefault();

                let data = new FormData(this);

                $.ajax({
                    url: "<?= route_to('save_category') ?>",
                        type: 'POST',
                        data: data,
                        processData: false,
                        contentType: false,
                        async: true,
                        timeout: 10000,
                        dataType: 'json',
                        async: true,
                        beforeSend: (xhr) => {},
                        success: (response) => {
                            if(response.status == 'OK') {
                                window.history.back();
                            } else {
                                alert('Ha ocurrido un error');
                            }
                        },
                        error: (xhr, status, error) => {
                            alert('Se ha producido un error');
                        },
                });
            });
        });
    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4><?= $title ?></h4>
        <form method="POST" id="sign-in-form">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" id="name" class="form-control" name="name" value="<?= $category->name ?>">

            <input type="text" id="id" name="id" value="<?= $category->id ?>" style="display: none;">
            <button class="btn btn-primary">Guardar</button>
        </form>
<?= $this->endSection() ?>