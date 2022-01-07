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
                        return row["username"];
                    }
                },
                {
                    "targets": 2,
                    "render": function (data, type, row, meta) {
                        return row["email"];
                    }
                },
                {
                    "targets": 3,
                    "render": function (data, type, row, meta) {
                        return row["name"];
                    }
                },
                {
                    "targets": 4,
                    "render": function (data, type, row, meta) {
                        return row["surname"];
                    }
                },
                {
                    "targets": 5,
                    "render": function (data, type, row, meta) {
                        return row["role_id"];
                    }
                },
                {
                    "targets": 6,
                    "render": function (data, type, row, meta) {
                        return '<button class="btn deleteBtn"><i class="fa fa-trash"></i></button> <button class="btn editBtn"><i class="fa fa-edit"></i></button>';
                    }
                }
            ]

            let usersDatatable = $('#users_datatable').DataTable({
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
                    url: "<?= route_to('users_data') ?>",
                    type: "POST",
                    data: function () {},
                    error: function (data) {
                        console.log(data);
                    }
                }
            })
        });

        $('#users_datatable tbody').on('click', '.deleteBtn', function () {

            var data = usersDatatable.row($(this).parents('tr')).data();
            console.log(data.id);

            let json_data = {
                "id": data.id
            };

            $.ajax({
                url: "<?= route_to('delete_user') ?>",
                    type: 'DELETE',
                    data: JSON.stringify(json_data),
                    processData: false,
                    contentType: false,
                    async: true,
                    timeout: 10000,
                    dataType: 'json',
                    beforeSend: (xhr) => {},
                    success: (response) => {
                        if (response.status == 'OK') {
                            $("#users_datatable").DataTable().ajax.reload(null, false);
                        } else {
                            alert('Se ha producido un error');
                        }
                    },
                    error: (xhr, status, error) => {
                        alert('Se ha producido un error');
                    },
            });

            //New User
            $('.new-user-btn').click(function() {
                window.location.href= "<?= route_to('festivals_view_edit')?>";
            });

            //Edit User
            $('#users_datatable tbody').on('click', '.editBtn', function () {
                alert('x');
                var data = usersDatatable.row($(this).parents('tr')).data();

                window.location.href = "<?= route_to('users_view_edit')?>/"+data.id;
            })
        });
    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4><?= $title ?></h4>
        <table id="users_datatable" class="display" style="width: 100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre de usuario</th>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        <button class="new-user-btn">Nuevo usuario</button>
    </div>   
<?= $this->endSection() ?>