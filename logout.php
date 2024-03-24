<?php

<<<<<<< HEAD
require_once 'config/config.php';
=======
require 'config/config.php';
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f

unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_cliente']);

header("Location: index.php");