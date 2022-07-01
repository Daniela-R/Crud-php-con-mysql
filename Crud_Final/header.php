<!DOCTYPE html>
<html lang="es">

<head >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="styles/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <title>Evento</title>
</head>

<body >
    <!-- ? headder  -->
    <div class="container-fluid container-header">
        <header class="p-2">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-3">
                    <div class="row align-items-center">
                        <a href="#" class="col-auto"></a>
                        <a href="#" class="col-auto header-tittle">
                            <h3 class="tracking-in-expand"></h3>
                        </a>
                    </div>
                </div>

                <?php
                session_start();


                if (isset($_SESSION['email']) &&  $_GET['message'] != 'errorLogin') {

                ?>

                    <div class="col-md-5 p-2">
                        <div class="row justify-content-center">
                            
                            <div class="col-auto p-2">
                                <a href="Pagina_principal.php?message=null" class="">Eventos</a>
                            </div>
                            <div class="col-auto p-2">
                                <a href="Mis_eventos.php?message=null" class="">Mis eventos</a>
                            </div>
                            <?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] == 'admin')) { ?>
                                <div class="col-auto p-2">
                                    <a href="Lista_Usuarios.php?message=null" class="" name="cerrar" >Lista de usuarios</a>
                                </div>
                            <?php } ?>

                            <div class="col-auto p-2">
                                <a class="" href="logout.php">Cerrar sesión</a>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </header>

    </div>