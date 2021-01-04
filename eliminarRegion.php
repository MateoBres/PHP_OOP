<?php
    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Region.php';
    $Region = new Region;
    $region = $Region->eliminarRegion();
    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Eliminar Region</h1>
        <?php
            $css = 'danger';
            $mensaje = 'No se pudo eliminar el Region';
            if($region){
                $css = 'success';
                $mensaje = 'Region: '.$Region->getRegNombre(). ' eliminado correctamente';
            }
        
        ?>
            <div class="alert col-6 mx-auto alert-<?= $css ?>">
                <?= $mensaje ?> <br>
                <a href="adminRegiones.php" class="btn btn-outline-secondary">
                        Volver a panel
                    </a>
            </div>
    </main>

<?php
    include 'includes/footer.php';
?>