<header data-bs-theme="dark">
<<<<<<< HEAD

  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="webtech.php" class="navbar-brand">
=======
  
  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
<<<<<<< HEAD
      <a href="webtech.php" class="navbar-brand">
=======
<<<<<<< HEAD
      <a href="webtech.php" class="navbar-brand">
=======
      <a href="#" class="navbar-brand">
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
        <strong>WebTech Solutions</strong>
      </a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

<<<<<<< HEAD
      <div class="collapse navbar-collapse" id="navbarHeader">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="index.php" class="nav-link active">Catálogo</a>

          </li>

          <li class="nav-item">
            <a href="clases/informacion.php" class="nav-link">Contacto</a>

          </li>
        </ul>

        <form action="index.php" method="get" autocomplete="off">
          <div class="input-group pe-3">
            <input type="text" name="q" id="q" class="form-control form-control-sm" 
            placeholer="Buscar..." aria-describedby="icon-buscar">
            <button type="submit" id="icon-buscar" class="btn btn-outline-info btn-sm">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>

        <a href="checkout.php" class="btn btn-primary btn-sm me-2"><i class="fas fa-shopping-cart"></i> Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
        </a>

        <?php if (isset($_SESSION['user_id'])) { ?>

          <div class="dropdown">
            <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="btn_session" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fal fa-user"></i><?php echo $_SESSION['user_name']; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dbtn_session">
              <li><a class="dropdown-item" href="compras.php"><i class="fa-solid fa-bag-shopping fa-bounce" style="color: #ff85af;"></i> Mis compras</a></li>
              <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket fa-beat" style="color: #B197FC;"></i> Cerrar sesión</a></li>
            </ul>
          </div>

        <?php } else {  ?>
          <a href="login.php" class="btn btn-success btn-sm"><i class="fa-regular fa-user"></i> Ingresar</a>
        <?php } ?>

=======
      <div class= "collapse navbar-collapse" id ="navbarHeader">
        <ul class ="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
<<<<<<< HEAD
                <a href="index.php" class="nav-link active">Catálogo</a>
=======
<<<<<<< HEAD
                <a href="index.php" class="nav-link active">Catálogo</a>
=======
                <a href="#" class="nav-link active">Catálogo</a>
>>>>>>> 3c6cb5762e2f334aa695fb1ed69e756cd7d3ec5f
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff

            </li>

            <li class="nav-item">
<<<<<<< HEAD
                <a href="clases/informacion.php" class="nav-link">Contacto</a>
=======
                <a href="#" class="nav-link">Contacto</a>
>>>>>>> 09d619fe8e08ffe7bbeeb58498e73a890730f4ff

            </li>
        </ul>
        
        <a href="checkout.php" class="btn btn-primary btn-sm me-2"><i class="fas fa-shopping-cart"></i> Carrito <span id = "num_cart" class = "badge bg-secondary"><?php echo $num_cart; ?></span>
        </a>

        <?php if(isset($_SESSION['user_id'])){ ?>

            <div class="dropdown">
                <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="btn_session"data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fal fa-user"></i><?php echo $_SESSION['user_name']; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dbtn_session">
                    <li><a class="dropdown-item" href="compras.php"><i class="fa-solid fa-bag-shopping fa-bounce" style="color: #ff85af;"></i> Mis compras</a></li>
                    <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket fa-beat" style="color: #B197FC;"></i> Cerrar sesión</a></li>
                </ul>
            </div>  
    
        <?php }else{  ?>
            <a href="login.php" class="btn btn-success btn-sm"><i class="fa-regular fa-user"></i> Ingresar</a>
        <?php } ?>    
        
>>>>>>> bc5269bfbb7f4e0131578d5bc2a87ce2c27716e8
      </div>
    </div>
  </div>
</header>

<script src="https://kit.fontawesome.com/af1771b0a0.js" crossorigin="anonymous"></script>