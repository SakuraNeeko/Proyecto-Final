<?php

require_once 'config/config.php';

$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();

if ($productos != null) {

  foreach ($productos as $clave => $cantidad) {

    $sql = $con->prepare("SELECT id, nombre, precio, descuento, $cantidad AS cantidad FROM productos WHERE id=? AND activo=1"); /* con esto generamos consultas preparadas */
    $sql->execute([$clave]);
    $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);  /* con esto estamos consultando producto por producto */
  }
}


//session_destroy();

//print_r($_SESSION);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda Online</title>
  <!-- cdn servidores que almacenan bibliotecas  -->
  <!-- CDN busca el mas cercano al usuario que está solicitando la página dando el recurso, siendo mas veloz y consumiendo menos recursos -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="css/estilos.css" rel="stylesheet">
</head>

<body>

  <?php include 'menu.php'; ?>

  <!-- contenido -->
  <main>
    <div class="container">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php if ($lista_carrito == null) {
              echo ' <tr><td colspan = "5" class ="text-center"><b>Lista vacía</b></td></tr>';
            } else {

              $total = 0;
              foreach ($lista_carrito as $producto) {
                $_id = $producto['id'];
                $nombre = $producto['nombre'];
                $precio = $producto['precio'];
                $descuento = $producto['descuento'];
                $cantidad = $producto['cantidad'];
                $precio_desc = $precio - (($precio * $descuento) / 100);
                $subtotal = $cantidad * $precio_desc;
                $total += $subtotal;
            ?>


                <tr>
                  <td><?php echo $nombre; ?></td>
                  <td><?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?></td>
                  <td><input type="number" min="1" max="10" step="1" value="<?php echo $cantidad; ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)"> </td>
                  <td>
                    <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div>
                  </td>
                  <td><a href="#" id="eliminar_<?php echo $_id; ?>" class="btn btn-warning btn-sm" data-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a></td>

                </tr>
              <?php } ?>

              <tr>
                <td colspan="3"></td>
                <td colspan="2">
                  <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                </td>
              </tr>
          </tbody>

        <?php } ?>

        </table>
      </div>

      <?php if ($lista_carrito != null) { ?>

        <div class="row">
          <div class="col-md-5 offset-md-7 d-grid gap-2">
            <?php if (isset($_SESSION['user_cliente'])) { ?>
              <a href="pago.php" class="btn btn-primary btn-lg">Realizar Pago</a>
            <?php } else { ?>
              <a href="login.php?pago" class="btn btn-primary btn-lg">Realizar Pago</a>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </main>

  <!-- Modal -->
  <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="eliminaModalLabel">Precaución</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Está seguro de eliminar este producto de su lista?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button id="btn-eliminar" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    let eliminaModal = document.getElementById('eliminaModal')
    eliminaModal.addEventListener('show.bs.modal', function(event) {
      let button = event.relatedTarget
      let id = button.getAttribute('data-id')
      let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-eliminar')
      buttonElimina.value = id
    });

    function actualizaCantidad(cantidad, id) {
      let url = 'clases/actualizar_carrito.php'
      let formData = new FormData()
      formData.append('action', 'agregar')
      formData.append('id', id)
      formData.append('cantidad', cantidad)


      fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if (data.ok) {

            let divsubtotal = document.getElementById('subtotal_' + id)
            divsubtotal.innerHTML = data.sub

            let total = 0.00
            let list = document.getElementsByName('subtotal[]')

            for (let i = 0; i < list.length; i++) {
              total += parseFloat(list[i].innerHTML.replace(/[<?php echo MONEDA ?>,]/g, ''))

            }
            total = new Intl.NumberFormat('en-US', {
              minimumFractionDigits: 2
            }).format(total)
            document.getElementById('total').innerHTML = '<?php echo MONEDA ?>' + total

          }
        })
    }

    function eliminar() {

      let botonElimina = document.getElementById('btn-eliminar')
      let id = botonElimina.value


      let url = 'clases/actualizar_carrito.php'
      let formData = new FormData()
      formData.append('action', 'eliminar')
      formData.append('id', id)

      fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if (data.ok) {
            location.reload()
          }
        })
    }
  </script>

</body>

</html>