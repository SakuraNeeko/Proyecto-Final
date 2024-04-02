<?php include 'config/config.php'; ?>
<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Bienvenido :D</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Secciones</li>
        </ol>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">Administre los usuarios de su sitio aquí.</p>
                        <a href="usuarios/index.php" class="btn btn-light"><i class="fa-solid fa-users-gear"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">Administre los productos de su sitio aquí.</p>
                        <a href="productos/index.php" class="btn btn-light"><i class="fa-solid fa-cash-register"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Compras</h5>
                        <p class="card-text">Administre las compras de su sitio aquí.</p>
                        <a href="compras/index.php" class="btn btn-light"><i class="fa-solid fa-money-check-dollar"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Configuración</h5>
                        <p class="card-text">Administre la configuración de su sitio aquí.</p>
                        <a href="configuracion/index.php" class="btn btn-light"><i class="fa-solid fa-toolbox"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include 'footer.php'; ?>