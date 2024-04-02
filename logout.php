<?php

require_once 'config/config.php';

unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_cliente']);
//unset($_SESSION['carrito']);


header("Location: index.php");