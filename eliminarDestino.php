<?php
    require 'config/config.php';
    require 'clases/Destino.php';
    require 'clases/Conexion.php';
    $Destino = new Destino;
    $destino = $Destino->eliminarDestino();
    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Eliminar destino</h1>
        <?php
            $css = 'danger';
            $mensaje = 'No se pudo eliminar el destino';
            if($destino){
                $css = 'success';
                $mensaje = 'Destino: '.$Destino->getDestNombre(). ' eliminado correctamente';
            }
        
        ?>
            <div class="alert col-6 mx-auto alert-<?= $css ?>">
                <?= $mensaje ?> <br>
                <a href="index.php" class="btn btn-outline-secondary">
                        Volver a panel
                    </a>
            </div>
    </main>

<?php
    include 'includes/footer.php';
?>