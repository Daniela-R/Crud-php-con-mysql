<?php include 'header.php'; ?>

<div class="container scale-up-center" style="margin-bottom: 100px;">
    <div class="row justify-content-center m-5">
        <div class="col-md-6 mt-5">



            <!-- ? Alerts -->
            <?php if (isset($_GET['message']) && $_GET['message'] == 'error1') { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Debes ingresar todos los datos
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['message']) && $_GET['message'] == 'error2') { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Las contraseña no coincide
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['message']) && $_GET['message'] == 'error3') { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    El email ya se encuentra registrado
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['message']) && $_GET['message'] == 'errorRegistro') { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hubo un error en el registro, intentalo de nuevo
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <!-- ? /Alerts -->


            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Registrarse</h3>
                    <form action="registrar_usuario_proceso.php" method="POST">

                        <div class="form-group mb-3">
                            <label for="names">Nombres</label>
                            <input required type="text" class="form-control" id="names" placeholder="Ingresar nombres" name="names">
                        </div>

                        <div class="form-group mb-3">
                            <label for="last_names">Apellidos</label>
                            <input required type="text" class="form-control" id="last_names" placeholder="Ingresar apellidos" name="last_names">
                        </div>

                        <div class="form-group mb-3">
                            <label for="age">Edad</label>
                            <input required type="number" class="form-control" id="age" placeholder="Ingresar edad" name="age">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingresar email" name="email">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Contraseña</label>
                            <input required type="password" class="form-control" id="password" placeholder="Contraseña" name="password">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirm">Confirmar contraseña</label>
                            <input required type="password" class="form-control" id="password_confirm" placeholder="Confirmar contraseña" name="password_confirm">
                        </div>

                        <div class="row">
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" class="btn btn-info" value="Registrarse">
                        </div>

                        <!-- No tienes cuenta? -->
                        <div class="row">
                            <a href="index.php" class="text-primary text-center mt-2"> Iniciar sesión</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


