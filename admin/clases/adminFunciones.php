<?php  //de esta manera reutilizo el codigo en cualquier parte del proyecto sin necesidad de estar creando en cada archivo lo mismo

function esNulo(array $parametros)
{
    foreach ($parametros as $parametro) {
        if (strlen(trim($parametro)) < 1) {
            return true;
        }
    }
    return false;
}

function validaPassword($password, $repassword){
    if(strcmp($password, $repassword) === 0){
        return true;
    }
return false;
}

function usuarioExiste($usuario, $con)
{
    $sql = $con->prepare("SELECT id FROM usuarios WHERE usuario LIKE ? LIMIT 1");
    $sql->execute([$usuario]);
    if ($sql->fetchColumn() > 0) {
        return true;
    }
    return false;
}

function emailExiste($email, $con)
{
    $sql = $con->prepare("SELECT id FROM clientes WHERE email LIKE ? LIMIT 1");
    $sql->execute([$email]);
    if ($sql->fetchColumn() > 0) {
        return true;
    }
    return false;
}

function mostrarMensajes(array $errors)
{
    if (count($errors) > 0) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '<ul>';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}

function validaToken($id, $token, $con)
{
    $msg = "";
    $sql = $con->prepare("SELECT id FROM usuarios WHERE id = ? AND token LIKE ? LIMIT 1");
    $sql->execute([$id, $token]);
    if ($sql->fetchColumn() > 0) {
        if (activarUsuario($id, $con)) {
            $msg = "Cuenta Activada.";
        } else {
            $msg = "Error al activar la cuenta. Intente nuevamente más tarde.";
        }
    } else {
        $msg = "Error al buscar los datos. No existe el registro del cliente.";
    }
    return $msg;
}

function activarUsuario($id, $con)
{
    $sql = $con->prepare("UPDATE usuarios SET activacion = 1, token = '' WHERE id = ?"); //cambiamos el token a vacio por seguridad para que una vez activado no pueda volverse a activar
    return $sql->execute([$id]);
}

function login($usuario, $password, $con)
{
    $sql = $con->prepare("SELECT id, usuario, password, nombre FROM admin WHERE usuario LIKE ? AND activo=1 LIMIT 1");
    $sql->execute([$usuario]);
    if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['nombre'];
            $_SESSION['user_type'] = 'admin';
            header('Location: inicio.php');
            exit;
        }
    }
    return 'El usuario y/o contraseña son incorrectos.';
}

function solicitaPassword($user_id, $con)
{
    $token = generarToken();

    $sql = $con->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id=?");
    if ($sql->execute([$token, $user_id])) {
        return $token;
    }
    return null;
}

function verificaTokenRequest($user_id, $token, $con)
{ //verifica si los datos existen en la base de datos
    $sql = $con->prepare("SELECT id FROM usuarios WHERE id = ? ANd token_password LIKE ? AND password_request=1 LIMIT 1");
    $sql->execute([$user_id, $token]);
    if ($sql->fetchColumn() > 0) {
        return true;
    }
    return false;
}

function actualizaPassword($user_id, $password, $con)
{
    $sql = $con->prepare("UPDATE usuarios SET password=?, token_password = '', password_request = 0 WHERE id = ?");
    if ($sql->execute([$password, $user_id])) {
        return true;
    }
    return false;
}

function actualizaPasswordAdmin($user_id, $password, $con)
{
    $sql = $con->prepare("UPDATE admin SET password=? WHERE id = ?");
    if ($sql->execute([$password, $user_id])) {
        return true;
    }
    return false;
}
