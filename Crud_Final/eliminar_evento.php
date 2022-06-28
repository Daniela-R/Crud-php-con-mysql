<?php
include_once 'conexion.php';

$deleteEventQuery = $bd->prepare("delete from events where id = ?");
$deleteEventQuery->execute([$_GET['eventId']]);

$deleteSuscriptionsQuery = $bd->prepare("delete from usuario_evento where id_event = ?");
$deleteSuscriptionsQuery->execute([$_GET['eventId']]);

header("Location:Pagina_principal.php?message=eventDeleted");
