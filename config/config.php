<?php

define("CLIENT_ID", "Ab3YPJhFY42Vimi2rx-aivYBLThv102I-NWC-1XREPwHFyaCc7rtcLWWGqUZY_5D7dmxBqcMrs4DLF7h");
define("CURRENCY", "USD");
define("KEY_TOKEN", "ABC.sda-220*");
define("MONEDA", "$"); /* Lo agregamos aqui para que sea algo dinamico y no tener que estar utilizandolo cada que lo necesitemos */

session_start();


$num_cart=0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

?>