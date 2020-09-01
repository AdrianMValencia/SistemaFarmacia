<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../public/assets/css/sweetalert2.css">
<link rel="stylesheet" href="../public/assets/css/css/all.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../public/assets/css/adminlte.min.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <a href="../controllers/LogoutController.php">Cerrar Sesión</a>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="../views/adm_catalogo.php" class="brand-link">
                <img src="../public/assets/img/doctor.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Farmacia</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img id="avatar4" src="" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            <?php
                            echo $_SESSION['nombre_us'];
                            ?>
                        </a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">USUARIO</li>
                        <li class="nav-item">
                            <a href="editar_datos_personales.php" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Datos personales
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adm_usuario.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Gestionar usuarios
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">ALMACEN</li>
                        <li class="nav-item">
                            <a href="adm_atributo.php" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>
                                    Gestionar atributos
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>