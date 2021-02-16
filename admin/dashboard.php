<?php
    // Sesión
    require_once 'funciones/sesiones.php';
    // Funciones
    require_once 'funciones/funciones.php';
    // Header
    require_once 'templates/header.php';
    // Barra
    require_once 'templates/barra.php';
    // Sidebar
    require_once 'templates/navegacion.php';
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboad</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- Total de Registros -->
            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados ";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>

                        <p>Total Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="lista_registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Pagados -->
            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 1 ";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small card -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>

                        <p>Total Pagados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <a href="lista_registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Sin Pagar -->
            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 0 ";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small card -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>

                        <p>Total Sin Pagar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-times"></i>
                    </div>
                    <a href="lista_registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Ganancias Totales -->
            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE pagado = 1 ";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>$<?php echo $registrados['ganancias']; ?></h3>

                        <p>Ganacias Totales</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <a href="lista_registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
  // Footer
  require_once 'templates/footer.php';
?>
