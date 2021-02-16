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

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboad</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <h5 class="mb-2 mt-4">Registro de Usuarios</h5>
        <div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Area Chart</h3>
                    </div>

                    <div class="card-body">
                      <div class="chart">
                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>


        <!-- Datos de los Usuarios -->
        <h5 class="mb-2 mt-4">Datos de Usuarios</h5>
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

        <h5 class="mb-2 mt-4">Regalos</h5>
        <div class="row">
            <!-- Pulseras -->
            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT COUNT(total_pagado) AS pulseras FROM registrados WHERE pagado = 1 ";
                    $resultado = $conn->query($sql);
                    $regalo = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-teal">
                <div class="inner">
                    <h3><?php echo $regalo['pulseras']; ?></h3>
                    <p>Pulseras</p>
                </div>
                <div class="icon">
                    <i class="fas fa-gifts"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más Información <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>

            <!-- Etiquetas -->
            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT COUNT(total_pagado) AS etiquetas FROM registrados WHERE pagado = 2 ";
                    $resultado = $conn->query($sql);
                    $regalo = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?php echo $regalo['etiquetas']; ?></h3>
                    <p>Etiquetas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-gifts"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más Información <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>

            <!-- Plumas -->
            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT COUNT(total_pagado) AS plumas FROM registrados WHERE pagado = 2 ";
                    $resultado = $conn->query($sql);
                    $regalo = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-pink">
                <div class="inner">
                    <h3><?php echo $regalo['plumas']; ?></h3>
                    <p>Plumas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-gifts"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más Información <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
  // Footer
  require_once 'templates/footer.php';
?>
