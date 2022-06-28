<?php include 'header.php'; ?>

<?php
include_once 'conexion.php';
$query = $bd->prepare("
select concat(e.name, ' - Semana ' ,r.semana,' - ', r.dia) as 'event' from users u
join usuario_evento r on u.id = r.id_user
join events e on e.id = r.id_event
where u.id = ?
order by e.name asc
");
$result = $query->execute([$_SESSION['user']['id']]);
$events = $query->fetchAll(PDO::FETCH_OBJ);


?>
<!-- ? profile -->
<div class="container mt-5 scale-up-center" style="margin-bottom: 100px;">
    <div class="row">

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="row justify-content-between">
                        <h4 class="card-title col-md-4">Mis Eventos</h4>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Email</th>
                                <th scope="col">Evento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($events as $event) { ?>
                                <tr>
                                    <td><?php echo $_SESSION['user']['names'] . " " . $_SESSION['user']['last_names'] ?></td>
                                    <td><?php echo $_SESSION['user']['age'] ?></td>
                                    <td><?php echo $_SESSION['user']['email'] ?></td>
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