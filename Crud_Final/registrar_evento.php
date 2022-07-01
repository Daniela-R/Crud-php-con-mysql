<!-- 

select count(u.id_usuario) from usuario_evento u
inner join evento e on e.id_evento = u.id_evento
where e.mes = "Junio" and e.semana = 1

Para validar la cantidad de usuarios que hay en cada evento

 -->

<?php
include_once "conexion.php";

$eventId = $_GET['eventId'];
$query = $bd->query("SELECT * FROM events WHERE id = $eventId");
$event = $query->fetchAll(PDO::FETCH_OBJ);

$query2 = $bd->query("
select ue.semana, e.name as nombre, 2-count( ue.id_user) as cupos from usuario_evento ue 
inner join events e on e.id = ue.id_event
group by ue.semana, e.name
order by e.name asc
");
$cupos = $query2->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse al evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="styles/style.css" rel="stylesheet">
</head>

<body style="background-color: #F7F7F7">

    <div class="row m-0 vh-100 justify-content-center align-items-center scale-up-center">
        <div class="col-md-8 p-5">
            <div class="row">
                <div class="card col-md-5 m-3">
                    <div class="card-body">
                        <h5 class="card-title">Registrarse al evento: <?php echo $event[0]->name ?> del mes de <?php echo $event[0]->month ?></h5>
                        <p class="card-text p-3">
                            <?php echo $event[0]->description ?>
                        </p>

                        <hr>

                        <form action="registrar_evento_proceso.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Semana del evento</label>
                                <select class="form-select" aria-label="Default select example" name="semana">
                                    <option value="1" selected>Primer Semana</option>
                                    <option value="2">Segunda Semana</option>
                                    <option value="3">Tercera Semana</option>
                                    <option value="4">Cuarta Semana</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Día del evento</label>
                                <select class="form-select" aria-label="Default select example" name="dia">
                                    <option value="Lunes" selected>Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miércoles">Miércoles</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hora del evento</label>
                                <select class="form-select" aria-label="Default select example" name="hora">
                                    <option value="1" selected>8 AM</option>
                                    <option value="2">2 PM</option>
                                </select>
                            </div>

                            <input type="hidden" value="<?php echo $eventId ?>" name="id_event">

                            <!-- Buttons -->
                            <div class="row m-1 justify-content-end">
                                <a class="btn btn-dark col-auto m-1" href="Pagina_principal.php?message=null">Cancelar</a>
                                <input type="submit" class="btn btn-info col-auto m-1" value="Registrarme">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tabla de cupos -->
                <div class="card col-md-5 m-3">
                    <div class="card-body">
                        <h5 class="card-title">Cupos disponibles por cada evento</h5>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Semana</th>
                                    <th scope="col">Cupos</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($cupos as $cupo) { ?>
                                    <tr>
                                        <td><?php echo $cupo->nombre ?></td>
                                        <td>Semana <?php echo $cupo->semana ?></td>
                                        <td><?php echo $cupo->cupos ?></td>
                                    </tr>
                                <?php } ?>



                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>

