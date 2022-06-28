<?php include 'header.php'; ?>

<?php
/* Se llaman los datos de la tabla events */
include_once 'conexion.php';
$query = $bd->query("SELECT * FROM events");
$events = $query->fetchAll(PDO::FETCH_OBJ);

/* Se cuenta cada evento */

?>

<div class="container mt-5 scale-up-center" style="margin-bottom: 100px;">
    <div class="row">

        <?php if (isset($_GET['message']) && $_GET['message'] == 'error4') { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Ya estás registrado en el evento para esa semana.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <?php if (isset($_GET['message']) && $_GET['message'] == 'error5') { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Se terminaron los cupos disponibles.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <?php if (isset($_GET['message']) && $_GET['message'] == 'eventDeleted') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                El evento ha sido eliminado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>


        <?php if (isset($_GET['message']) && $_GET['message'] == 'success') { ?>
            <script>
                window.onload = function alertSuccess() {
                    swal({
                        title: "Te has registrado",
                        text: "Puedes seguir viendo los eventos",
                        icon: "success",
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            </script>
        <?php } ?>

        <?php if (isset($_GET['message']) && $_GET['message'] == 'errorRegistro') { ?>
            <script>
                window.onload = function alertSuccess() {
                    swal({
                        title: "Opps!",
                        text: "Algo salió mal, intenta de nuevo",
                        icon: "success",
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            </script>
        <?php } ?>

        <!-- ? Alerts -->

        <div class="card col-md-12 ">
            <div class="card-body">
                <div class="row justify-content-between">
                    <h5 class="card-title col-md-4">Eventos</h5>               
                </div>

                <table class="table  table-hover table-sm ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Mes</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($events as $event) {
                        ?>

                            <tr>
                                <th scope="row"><?php echo $event->id ?></th>
                                <td><?php echo $event->name ?></td>
                                <td><?php echo $event->month ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-auto p-1"> 
                                            <a class="btn btn-outline-info col-auto m-1 " href="registrar_evento.php?eventId=<?php echo $event->id ?>">Registrate</a>
                                        </div>

                                        <?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] == 'admin')) { ?>
                                            <div class="col-auto p-1">
                                                <a class="btn btn-outline-danger col-auto m-1" data-bs-toggle="modal" data-bs-target="#deleteModal">Eliminar</a>
                                            </div>
                                        <?php } ?>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<!-- ? Modal de confirmación -->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 250px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Seguro de que desea eliminar el evento?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">No</button>
                <a type="button" class="btn btn-dark" href="eliminar_evento.php?eventId=<?php echo $event->id ?>">Si, eliminar</a>
            </div>
        </div>
    </div>
</div>

