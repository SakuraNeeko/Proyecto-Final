<?php

require '../config/database.php';
require '../config/config.php';
require '../header.php';
require '../clases/cifrado.php';

<<<<<<< HEAD
if (!isset($_SESSION['user_type'])) {
=======
if(!isset($_SESSION['user_type'])){
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
    header('Location: ../index.php');
    exit;
}

<<<<<<< HEAD
if ($_SESSION['user_type'] != 'admin') {
=======
if($_SESSION['user_type'] !='admin'){
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
    header('Location: ../../index.php');
    exit;
}

<<<<<<< HEAD
$db = new Database();
$con = $db->conectar();
=======
$db=new Database();
$con=$db->conectar();
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8

$sql = "SELECT nombre, valor FROM configuracion";
$resultado = $con->query($sql);
$datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

<<<<<<< HEAD
$config = [];

foreach ($datos as $dato) {
    $config[$dato['nombre']] = $dato["valor"];
}

=======
$config = [] ;

foreach ($datos as $dato) {
    $config[$dato['nombre']] = $dato["valor"];

}
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8

//print_r($config);


?>

<main>
    <div class="container-fluid px-4">
<<<<<<< HEAD
        <h2 class="mt-4">Configuración</h2>
=======
        <h1 class="mt-4">Configuración</h1>
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8

        <?php echo descifrar($config['correo_password']); ?>

        <form action="guarda.php" method="post">
            <div class="row">
                <div class="col-6">
                    <label for="smtp">SMTP</label>
                    <input class="form-control" type="text" name="smtp" id="smtp" value="<?php echo $config['correo_smtp']; ?>">
                </div>

                <div class="col-6">
                    <label for="puerto">Puerto</label>
                    <input class="form-control" type="text" name="puerto" id="puerto" value="<?php echo $config['correo_puerto']; ?>">
                </div>

                <div class="col-6">
                    <label for="email">Correo electrónico</label>
                    <input class="form-control" type="email" name="email" id="email" value="<?php echo $config['correo_email']; ?>">
                </div>

                <div class="col-6">
                    <label for="password">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="password" value="<?php echo $config['correo_password']; ?>">
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
<<<<<<< HEAD
            </div>
        </form>
=======


            </div>
        </form>

>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
    </div>
</main>


<<<<<<< HEAD

=======
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
<?php require_once '../footer.php'; ?>