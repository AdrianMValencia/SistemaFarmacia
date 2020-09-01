<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 3) {
    include_once 'layouts/header.php';
    ?>
    <div class="modal fade" id="cambiocontra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title" id="exampleModalLabel">Cambiar contraseña</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img id="avatar3" src="" class="profile-user-img img-fluid img-circle">
                        </div>
                        <div class="text-center">
                            <b>
                                <?php echo $_SESSION['nombre_us']; ?>
                            </b>
                        </div>
                        <div id="update"></div>
                        <form id="form-pass">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                </div>
                                <input id="oldpass" type="password" class="form-control" placeholder="Contraseña actual">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input id="newpass" type="password" class="form-control" placeholder="Contraseña nueva">
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn bg-gradient-success float-right m-1">Cambiar</button>
                        <button type="button" data-dismiss="modal" class="btn btn-outline-danger float-right m-1">Cerrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cambiarfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title" id="exampleModalLabel">Cambiar foto de perfil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img id="avatar1" src="" class="profile-user-img img-fluid img-circle">
                        </div>
                        <div class="text-center">
                            <b>
                                <?php echo $_SESSION['nombre_us']; ?>
                            </b>
                        </div>
                        <div id="update"></div>
                        <form id="form-foto" enctype="multipart/form-data">
                            <div class="input-group mb-3 ml-5 mt-2">
                                <input class="input-group" type="file" name="foto">
                                <input type="hidden" name="funcion" value="cambiar_foto">
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn bg-gradient-success float-right m-1">Guardar</button>
                        <button type="button" data-dismiss="modal" class="btn btn-outline-danger float-right m-1">Cerrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <title>Editar Administrador | FARMACIA</title>
    <?php include_once 'layouts/nav.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Datos personales</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../views/adm_catalogo.php">Home</a></li>
                            <li class="breadcrumb-item active">Datos personales</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-info card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img id="avatar2" src="" class="profile-user-img img-fluid img-circle">
                                    </div>
                                    <div class="text-center mt-1">
                                        <button type="button" data-toggle="modal" data-target="#cambiarfoto" class="btn btn-primary btn-sm">Cambiar foto</button>
                                    </div>
                                    <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuario']; ?>" />
                                    <h3 id="nombre_us" class="profile-username text-center text-info"></h3>
                                    <p id="apellidos_us" class="text-muted text-center"></p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Edad:</b><a id="edad" class="float-right"></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>DNI:</b><a id="dni_us" class="float-right"></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tipo de usuario:</b>
                                            <span id="us_tipo" class="float-right"></span>
                                        </li>
                                        <button data-toggle="modal" data-target="#cambiocontra" type="button" class="btn btn-block btn-outline-warning btn-sm">Cambiar contraseña</button>
                                    </ul>
                                </div>
                            </div>
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Sobre mí</h3>
                                </div>
                                <div class="card-body">
                                    <strong>
                                        <i class="fas fa-phone mr-1"> Teléfono:</i>
                                    </strong>
                                    <p id="telefono_us" class="text-muted">912408338</p>
                                    <strong>
                                        <i class="fas fa-map-marker-alt mr-1"> Dirección:</i>
                                    </strong>
                                    <p id="residencia_us" class="text-muted">Av.SanFelipe - COMAS</p>
                                    <strong>
                                        <i class="fas fa-at mr-1"> Correo:</i>
                                    </strong>
                                    <p id="correo_us" class="text-muted">adrian@gmail.com</p>
                                    <strong>
                                        <i class="fas fa-smile-wink mr-1"> Sexo:</i>
                                    </strong>
                                    <p id="sexo_us" class="text-muted">Masculino</p>
                                    <strong>
                                        <i class="fas fa-pencil-alt mr-1"> Información adicional:</i>
                                    </strong>
                                    <p id="adicional_us" class="text-muted">Desarrollador FullStack</p>
                                    <button class="edit btn btn-block bg-gradient-warning fas fa-edit"> Editar</button>
                                </div>
                                <div class="card-footer">
                                    <p class="text-muted">Click en el botón si desea editar!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Editar datos personales</h3>
                                </div>
                                <div class="card-body">
                                    <div id="editado"></div>
                                </div>
                                <div class="card-body">
                                    <form id="form-usuario" class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                                            <div class="col-sm-10">
                                                <input type="number" id="telefono" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="residencia" class="col-sm-2 col-form-label">Residencia:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="residencia" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="correo" class="col-sm-2 col-form-label">Correo:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="correo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sexo" class="col-sm-2 col-form-label">Sexo:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="sexo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="adicional" class="col-sm-2 col-form-label">Información adicional:</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="adicional" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10 float-right">
                                                <button class="btn btn-block btn-outline-success">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <p class="text-muted">Ingresar los datos correctamente!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
    include_once 'layouts/footer.php';
} else {
    header('Location: ../');
}
?>
<script src="../public/assets/js/Usuario.js"></script>