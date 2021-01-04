<?php

    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Region.php';
    $Region = new Region;
    $regiones = $Region->listarRegiones();
    require 'clases/Destino.php';
    $Destino = new Destino;
    $Destino->verDestinoPorID();
    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>
    
    <main class="container">
            <h1>Modificar destino</h1>

            <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

                <form action="modificarDestino.php" method="post">

                    <div class="form-group">
                    <label for="destNombre">Nombre del Destino:</label>
                    <input type="text" name="destNombre" 
                           id="destNombre" class="form-control"
                           value='<?= $Destino->getDestNombre(); ?>'
                           required>
                    </div>

                    <div class="form-group">
                    <label for="regID">Región</label>
                    <select name="regID" id="regID" 
                            class="form-control" 
                            required>
                            <option value="">Seleccione una región</option>
                            <?php 
                                
                                foreach ($regiones as $region) {
                                    $regID = $region['regID'];
                                    $regNombre = $region['regNombre'];
                                    ?>
                                    <option value='<?= $regID ?>'<?php if($regID === $Destino->getRegID()){echo 'selected';}?>><?=$regNombre?></option>";
                                    <?php
                                }
                                
                            ?>
                        <option value='<?= $Destino->getRegID() ?>'><?= $Destino::getRegNombre() ?></option>

                    </select>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="number" name="destPrecio"
                                   class="form-control" placeholder="Ingrese el precio"
                                   value='<?= $Destino->getDestPrecio(); ?>' required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Asientos</div>
                            </div>
                            <input type="number"
                                   name="destAsientos"
                                   class="form-control" placeholder="Ingrese cantidad de Asientos Totales" 
                                   value='<?= $Destino->getDestAsientos(); ?>'required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Dispononibles</div>
                            </div>
                            <input type="number" 
                                   name="destDisponibles"
                                   class="form-control" placeholder="Ingrese cantidad de Asientos Disponibles"
                                   value='<?= $Destino->getDestDisponibles(); ?>' required>
                        </div>
                    </div>
                    <input type='hidden' name='destID'
                                value='<?= $Destino->getDestID(); ?>'>

                    <button class="btn btn-dark mr-3">Modificar destino</button>
                    <a href="adminDestinos.php" class="btn btn-outline-secondary">
                        Volver a panel
                    </a>

                </form>

            </div>


    </main>
<?php
    include 'includes/footer.php';
?>