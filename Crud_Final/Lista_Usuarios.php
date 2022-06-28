<?php include 'header.php'; ?>

<?php

include_once 'conexion.php';
$query = $bd->prepare("select 
concat(u.names, ' ', u.last_names) as 'name',
u.email,
concat(e.name, '- Semana ', r.semana) as 'event'
from users u
join usuario_evento r on r.id_user = u.id
join events e on e.id = r.id_event
order by u.names asc");
$result = $query->execute();
$events = $query->fetchAll(PDO::FETCH_OBJ);

?>
    <div class="container mt-5 scale-up-center" style="margin-bottom: 100px;">
        <div class="row">

            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="row justify-content-between">
                            <h5 class="card-title col-md-4">Eventos</h5>
                            <?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] == 'admin')) { ?>
                                <form action="Descargar_informe.php" class="col-md-2">
                                    <input class="btn btn-info " value="Descargar informe" type="submit">
                                </form>
                            <?php } ?>

                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Evento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($events as $event) { ?>
                                    <tr>
                                        <td><?php echo $event->name ?></td>
                                        <td><?php echo $event->email ?></td>
                                        <td><?php echo $event->event ?></td>                                 
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
