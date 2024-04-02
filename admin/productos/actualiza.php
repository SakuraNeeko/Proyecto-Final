<?php

require '../config/database.php';
require '../config/config.php';


if (!isset($_SESSION['user_type'])) {
    header('Location: ../index.php');
    exit;
}

if ($_SESSION['user_type'] != 'admin') {
    header('Location: ../../index.php');
    exit;
}

$db = new Database();
$con = $db->conectar();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$stock = $_POST['stock'];
$categoria = $_POST['categoria'];

$sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, descuento=?, stock=?, id_categoria=? WHERE id=?";
$stm = $con->prepare($sql);
if ($stm->execute([$nombre, $descripcion, $precio, $descuento, $stock, $categoria, $id])) {

    /* Subir imagen principal */
    if ($_FILES['imagen_principal']['error'] == UPLOAD_ERR_OK) { //esta validacion revisa si la imagen esta correcta
        $dir = '../../images/productos/' . $id . '/';
        $permitidos = ['jpeg', 'jpg'];

        $arregloImagen = explode('.', $_FILES['imagen_principal']['name']); //separador de imagenes por puntos
        $extension = strtolower(end($arregloImagen));

        if (in_array($extension, $permitidos)) {
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $ruta_img = $dir . 'principal.' . $extension;

            if (move_uploaded_file($_FILES['imagen_principal']['tmp_name'], $ruta_img)) {
                echo "El archivo se cargó correctamente.";
            } else {
                echo "Error al cargar el archivo.";
            }
        } else {
            echo "Archivo no permitido";
        }
    } else {
        echo "No enviaste ningun archivo.";
    }

    //Subir otras imagenes

    if (isset($_FILES['otras_imagenes'])) {
        $dir = '../../images/productos/' . $id . '/';
        $permitidos = ['jpeg', 'jpg', 'JPEG'];

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        foreach ($_FILES['otras_imagenes']['tmp_name'] as $key => $tmp_name) {
            $fileName = $_FILES['otras_imagenes']['name'][$key];

            $arregloImagen = explode('.', $fileName); //separador de imagenes por puntos
            $extension = strtolower(end($arregloImagen));

            $nuevoNombre = $dir . uniqid() . '.' . $extension;

            if (in_array($extension, $permitidos)) {
                if (move_uploaded_file($tmp_name, $nuevoNombre)) {
                    echo "El archivo se cargó correctamente.<br>";
                } else {
                    echo "Error al cargar el archivo.";
                }
            } else {
                echo "Archivo no permitido";
            }
        }
    }
}

header('Location: index.php');

print_r($config);
