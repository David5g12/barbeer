<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <link rel="stylesheet" href="vista/css/header.css">
    <title>Document</title>
</head>
<body>
  <header>
    <div class ="logo">
        <img src="vista/img/logotipo.png" alt="Logotipo">
    </div>
    
  </header>
          <nav>

          <ul class="nav flex-column align-items-start">
            <?php if (isset($_SESSION['usuario'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="bi bi-house-door-fill"></i> Inicio</a>
            </li>
            <?php endif; ?>

            <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=dashboard&p=dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=compras&p=compras"><i class="bi bi-cart-check-fill"></i> Compras</a>
            </li>
            <li class="nav-item">
            
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=proveedores&p=proveedores"><i class="bi bi-truck"></i> Proveedores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=reportes&p=reportes"><i class="bi bi-graph-up-arrow"></i> Reportes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=facturas&p=facturas"><i class="bi bi-receipt"></i> Facturas</a>
            </li>
            <?php endif; ?>

            <?php if (isset($_SESSION['usuario'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?c=cervezas&p=cervezas"><i class="bi bi-cup"></i> Cervezas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=cocteles&p=cocteles"><i class="bi bi-cup-straw"></i> Cocteles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=destilados&p=destilados"><i class="bi bi-cup"></i> Destilados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=combos&p=combos"><i class="bi bi-basket"></i> Combos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=eventos&p=eventos"><i class="bi bi-calendar-event-fill"></i> Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=pedidos&p=pedidos"><i class="bi bi-bag-check-fill"></i> Pedidos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=pedidos&p=barra"><i class="bi bi-grid-fill"></i> Barra</a>
            </li>
            <?php endif; ?>

            <?php if (!isset($_SESSION['usuario'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=sesion&p=sesion"><i class="bi bi-box-arrow-in-right"></i> Iniciar sesión</a>
            </li>
            <?php endif; ?>

            <?php if (isset($_SESSION['usuario'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=cerrarSesion&p=cerrarSesion"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a>
            </li>
            <?php endif; ?>
        </ul>


    <div class="pie_nav">
        <i class="bi bi-person-fill"></i>  <!--aqui debes agregar el usuario logueado con su correo o usuario-->
    </div>

  </nav>


