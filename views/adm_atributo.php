<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 3) {
    include_once 'layouts/header.php';
    ?>
    <title>Atributos | FARMACIA</title>
    <?php include_once 'layouts/nav.php'; ?>
    <div class="modal fade" id="cambiologo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title" id="exampleModalLabel">Cambiar logo del laboratorio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img id="logoactual" src="" class="profile-user-img img-fluid img-circle">
                        </div>
                        <div class="text-center">
                            <b id="nombre_logo">
                            </b>
                        </div>
                        <div id="update"></div>
                        <form id="form-logo" enctype="multipart/form-data">
                            <div class="input-group mb-3 ml-5 mt-2">
                                <input class="input-group" type="file" name="foto">
                                <input type="hidden" name="funcion" id="funcion">
                                <input type="hidden" name="id_logo_lab" id="id_logo_lab">
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
    <div class="modal fade" id="crearlaboratorio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Gestión de laboratorio</h3>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="add-laboratorio"></div>
                        <div id="noadd-laboratorio"></div>
                        <div id="edit-laboratorio"></div>
                        <form id="form-crear-laboratorio">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                </div>
                                <input id="nombre-laboratorio" type="text" class="form-control" placeholder="Nombre" required>
                                <input type="hidden" id="id_editar_lab">
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
    <div class="modal fade" id="creartipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Registro de tipo</h3>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="add"></div>
                        <form id="form-crear-tipo">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                </div>
                                <input id="nombre-tipo" type="text" class="form-control" placeholder="Nombre" required>
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
    <div class="modal fade" id="crearpresentacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Registro de presentación</h3>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="add"></div>
                        <form id="form-crear-presentacion">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                </div>
                                <input id="nombre-presentacion" type="text" class="form-control" placeholder="Nombre" required>
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
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestionar atributos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Gestionar atributos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a href="#laboratorio" class="nav-link active" data-toggle="tab">Laboratorio</a></li>
                                    <li class="nav-item"><a href="#tipo" class="nav-link" data-toggle="tab">Tipo</a></li>
                                    <li class="nav-item"><a href="#presentacion" class="nav-link" data-toggle="tab">Presentación</a></li>
                                </ul>
                            </div>
                            <div class="card-body p-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="laboratorio">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <div class="card-title">Buscar laboratorio <button type="button" data-toggle="modal" data-target="#crearlaboratorio" class="btn bg-gradient-warning btn-sm m-2">Añadir</button></div>
                                                <div class="input-group">
                                                    <input id="buscar-laboratorio" type="text" class="form-control float-left" placeholder="Ingrese el nombre del laboratorio">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-0 table-responsive">
                                                <table class="table table-hover">
                                                    <thead class="table-primary">
                                                        <tr>
                                                            <th>LABORATORIO</th>
                                                            <th>LOGO</th>
                                                            <th>ACCIONES</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-active" id="laboratorios">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tipo">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <div class="card-title">Buscar tipo <button type="button" data-toggle="modal" data-target="#creartipo" class="btn bg-gradient-warning btn-sm m-2">Añadir</button></div>
                                                <div class="input-group">
                                                    <input id="buscar-tipo" type="text" class="form-control float-left" placeholder="Ingrese el nombre del tipo">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body"></div>
                                            <div class="card-footer"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="presentacion">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <div class="card-title">Buscar presentación <button type="button" data-toggle="modal" data-target="#crearpresentacion" class="btn bg-gradient-warning btn-sm m-2">Añadir</button></div>
                                                <div class="input-group">
                                                    <input id="buscar-presentacion" type="text" class="form-control float-left" placeholder="Ingrese el nombre de la presentación">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body"></div>
                                            <div class="card-footer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer"></div>
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
<script src="../public/assets/js/Laboratorio.js"></script>