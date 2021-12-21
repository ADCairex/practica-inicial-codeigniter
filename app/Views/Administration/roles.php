<?= $this->extend('Administration/base_layout.php') ?>


<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/Administration/css/home.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/Administration/css/menu.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script src="<?= base_url('assets/Administration/js/menu.js') ?>"></script>
    <script type='text/javascript'>

        $(document).ready(() => {
            var columnsDefinition = [
                {
                    "targets": 0,
                    "render": function (data, type, row, meta) {
                        return row["id"];
                    }
                },
                {
                    "targets": 1,
                    "render": function (data, type, row, meta) {
                        return row["name"];
                    }
                },
                {
                    "targets": 2,
                    "render": function (data, type, row, meta) {
                        return '<button class="btn"><i class="fa fa-trash"></i></button> <button class="btn"><i class="fa fa-edit"></i></button>';
                    }
                }
            ]

            let festivalsDatatable = $('#roles_datatable').DataTable({
                "processing": true, //Para mostrar el loading
                "responsive": true,
                "serverSide": true, //Activar Ajax
                "searching": false, //Si queremos que apareza la barra buscador
                "columnDefs": columnsDefinition, //Array de columnas que hemos definido arriba
                "fnDrawCallback": function (oSettings) {
                    //Controlar la paginación
                    if (oSettings._DisplayLength >= oSettings.fnRecordsTotal())
                        $(oSettings.nTableWrapper).find('.dataTables_paginated').hide();
                    else 
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                },
                "ajax": { //Peticion AJAX que obtendrá los datos del datatable
                    url: "<?= route_to('roles_data') ?>",
                    type: "POST",
                    data: function () {},
                    error: function (data) {
                        console.log(data);
                    }
                }
            })
        });

    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4><?= $title ?></h4>
        <table id="roles_datatable" class="display" style="width: 100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>   
<?= $this->endSection() ?>