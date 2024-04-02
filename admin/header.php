<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?php echo ADMIN_URL; ?>css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../../webtech.php">Administración - WebTech Solutions</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div> -->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $_SESSION['user_name']; ?></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo ADMIN_URL; ?>cambiar_password.php?id=<?php echo $_SESSION['user_id']; ?>">Configuración</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                    <hr class="dropdown-divider" /> 
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Cerrar Sesión
                    </a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="<?php echo ADMIN_URL; ?>configuracion">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                            Configuración
                        </a>

                        <a class="nav-link" href="<?php echo ADMIN_URL; ?>usuarios">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                            Usuarios
                        </a>

                        <a class="nav-link" href="<?php echo ADMIN_URL; ?>categorias">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                            Categorias
                        </a>

                        <a class="nav-link" href="<?php echo ADMIN_URL; ?>productos">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-store"></i></div>
                            Productos
                        </a>

                        <a class="nav-link" href="<?php echo ADMIN_URL; ?>compras">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-cash-register"></i></div>
                            Compras
                        </a>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Bmbj/TPh1Pk8ypYh0TZ5LFLnxEJO9SQ3pd5ad6eFp5F/uSA+pJf8e0Btd5E9DI8Y" crossorigin="anonymous"></script>