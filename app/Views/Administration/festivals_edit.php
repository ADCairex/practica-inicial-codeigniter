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
                    url: "<?= route_to('save_festival') ?>",
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
            <input type="text" id="name" class="form-control" name="name" value="<?= $festival->name ?>">

            <label for="email" class="form-label">Email</label>
            <input type="text" id="email" class="form-control" name="email" value="<?= $festival->email ?>">

            <label for="date" class="form-label">Fecha</label>
            <input type="date" id="date" class="form-control" name="date" value="<?= $festival->getInputFormatDate() ?>">

            <label for="price" class="form-label">Precio</label>
            <input type="text" id="price" class="form-control" name="price" value="<?= $festival->price ?>">

            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" id="direccion" class="form-control" name="address" value="<?= $festival->address ?>">

            <label for="image_url" class="form-label">Imagen</label>
            <input type="text" id="image_url" class="form-control" name="image_url" value="<?= $festival->image_url ?>">

            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="category_id" class="form-select">
                <?php foreach($categories as $cat): ?>
                    <option value="<?= $cat->id ?>" <?php if($cat->id == $festival->category_id): ?> selected <?php endif ?>>
                        <?= $cat->name ?>
                    </option>
                <?php endforeach ?>
            </select>
            <input type="text" id="id" name="id" value="<?= $festival->id ?>" style="display: none;">
            <button class="btn btn-primary">Guardar</button>
        </form>
<?= $this->endSection() ?>