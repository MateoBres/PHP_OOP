<?php
    require 'config/config.php';
    require 'clases/Destino.php';
    require 'clases/Conexion.php';
    $Destino = new Destino;
    $destino = $Destino->modificarDestino();
    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Modificar destino</h1>
        <?php
            $css = 'danger';
            $mensaje = 'No se pudo modificar el destino';
            if($destino){
                $css = 'success';
                $mensaje = 'Destino: '.$Destino->getDestNombre(). ' modificado correctamente';
            }
        
        ?>
            <div class="alert col-6 mx-auto alert-<?= $css ?>">
                <?= $mensaje ?> <br>
                <a href="adminDestinos.php" class="btn btn-outline-secondary">
                        Volver a panel
                    </a>
            </div>
    </main>

<?php
    include 'includes/footer.php';
?>