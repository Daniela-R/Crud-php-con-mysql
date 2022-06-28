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

/* Descarga un excel con los datos de la tabla */

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=usuariosSuscritos.xls");
?>

<table>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Evento</th>
    </tr>

    <?php foreach ($events as $event) { ?>
        <tr>
            <td><?php echo $event->name ?></td>
            <td><?php echo $event->email ?></td>
            <td><?php echo $event->event ?></td>
        </tr>
    <?php } ?>
</table>