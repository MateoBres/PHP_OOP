<?php

    class Destino
    {
        private $destID;
        private $destNombre;
        private $regID;
        static  $regNombre;
        private $destPrecio;
        private $destAsientos;
        private $destDisponibles;
        private $destActivo;

        public function listarDestinos()
        {
            $link = Conexion::conectar();
            $sql = "SELECT 
                            destID, destNombre,
                            d.regID, r.regNombre,
                            destPrecio, 
                            destAsientos, destDisponibles,
                            destActivo
                        FROM 
                            destinos d, regiones r
                      WHERE d.regID = r.regID";

            $stmt = $link->prepare($sql);
            $stmt->execute();

            $destinos =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $destinos;
        }

        public function verDestinoPorID()
        {
            $destID = $_GET['destID'];
            $link = Conexion::conectar();
            $sql = "SELECT 
                        destID, destNombre,
                        d.regID, r.regNombre,
                        destPrecio, 
                        destAsientos, destDisponibles,
                        destActivo
                    FROM 
                        destinos d, regiones r
                    WHERE d.regID = r.regID AND destID = :destID";
            $stmt = $link-> prepare($sql);
            $stmt->bindParam(':destID', $destID, PDO::PARAM_INT);
            $stmt->execute();
            
            $destino = $stmt->fetch(PDO::FETCH_ASSOC);
            // registrar todos los atributos
            $this->setDestID($destID);
            $this->setDestNombre($destino['destNombre']);
            $this->setRegID($destino['regID']);
            self::setRegNombre($destino['regNombre']);
            $this->setDestPrecio($destino['destPrecio']);
            $this->setDestAsientos($destino['destAsientos']);
            $this->setDestDisponibles($destino['destDisponibles']);
            $this->setDestActivo($destino['destActivo']);

            return $this;
        }
        
        public function modificarDestino() 
        {
            $destID = $_POST['destID'];   
            $destNombre = $_POST['destNombre'];   
            $regID = $_POST['regID'];   
            $destPrecio = $_POST['destPrecio'];   
            $destAsientos = $_POST['destAsientos'];   
            $destDisponibles = $_POST['destDisponibles'];   
              
            $link = Conexion::conectar();
            $sql = "UPDATE destinos
                SET 
                    destNombre = :destNombre,
                    regID = :regID,
                    destPrecio = :destPrecio,
                    destAsientos = :destAsientos,
                    destDisponibles = :destDisponibles
                WHERE
                    destID = :destID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':destID', $destID, PDO::PARAM_INT);
            $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
            $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
            $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);
            if($stmt->execute()){
                //registramos atributos
                $this->setDestID($destID);
                $this->setDestNombre($destNombre);
                $this->setRegID($regID);
                $this->setDestPrecio($destPrecio);
                $this->setDestAsientos($destAsientos);
                $this->setDestDisponibles($destDisponibles);
                //$this->setDestActivo(1);//default

                return $this;
            } else {
                return false;
            };
        }

        public function agregarDestino() 
        {   
            $destNombre = $_POST['destNombre'];   
            $regID = $_POST['regID'];   
            $destPrecio = $_POST['destPrecio'];   
            $destAsientos = $_POST['destAsientos'];   
            $destDisponibles = $_POST['destDisponibles'];   
              
            $link = Conexion::conectar();
            $sql = "INSERT INTO destinos
                    (destNombre, regID, destPrecio, destAsientos, destDisponibles)
                    VALUE
                    (:destNombre, :regID, :destPrecio, :destAsientos, :destDisponibles)";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
            $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
            $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);
            if($stmt->execute()){
                //registramos atributos
                $this->setDestID($link->lastInsertID());
                $this->setDestNombre($destNombre);
                $this->setRegID($regID);
                $this->setDestPrecio($destPrecio);
                $this->setDestAsientos($destAsientos);
                $this->setDestDisponibles($destDisponibles);
                //$this->setDestActivo(1);//default

                return $this;
            } else {
                return false;
            };
        }
        public function eliminarDestino() 
        {   
            $destID = $_POST['destID'];   
            $destNombre = $_POST['destNombre'];     
            $link = Conexion::conectar();
            $sql = "DELETE FROM destinos
                        WHERE destID = :destID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':destID', $destID, PDO::PARAM_INT);
            if($stmt->execute()){
                //registramos atributos
                $this->setDestID($destID);
                $this->setDestNombre($destNombre);
                return $this;
            } else {
                return false;
            };
        }

        ##################################
        ###  getters & setters
        /**
         * @return mixed
         */
        public function getDestID()
        {
            return $this->destID;
        }

        /**
         * @param mixed $destID
         */
        public function setDestID($destID): void
        {
            $this->destID = $destID;
        }

        /**
         * @return mixed
         */
        public function getDestNombre()
        {
            return $this->destNombre;
        }

        /**
         * @param mixed $destNombre
         */
        public function setDestNombre($destNombre): void
        {
            $this->destNombre = $destNombre;
        }

        /**
         * @return mixed
         */
        public function getRegID()
        {
            return $this->regID;
        }

        /**
         * @param mixed $regID
         */
        public function setRegID($regID): void
        {
            $this->regID = $regID;
        }

        /**
         * @return mixed
         */
        public static function getRegNombre()
        {
            return self::$regNombre;
        }

        /**
         * @param mixed $regNombre
         */
        public static function setRegNombre($regNombre): void
        {
            self::$regNombre = $regNombre;
        }

        /**
         * @return mixed
         */
        public function getDestPrecio()
        {
            return $this->destPrecio;
        }

        /**
         * @param mixed $destPrecio
         */
        public function setDestPrecio($destPrecio): void
        {
            $this->destPrecio = $destPrecio;
        }

        /**
         * @return mixed
         */
        public function getDestAsientos()
        {
            return $this->destAsientos;
        }

        /**
         * @param mixed $destAsientos
         */
        public function setDestAsientos($destAsientos): void
        {
            $this->destAsientos = $destAsientos;
        }

        /**
         * @return mixed
         */
        public function getDestDisponibles()
        {
            return $this->destDisponibles;
        }

        /**
         * @param mixed $destDisponibles
         */
        public function setDestDisponibles($destDisponibles): void
        {
            $this->destDisponibles = $destDisponibles;
        }

        /**
         * @return mixed
         */
        public function getDestActivo()
        {
            return $this->destActivo;
        }

        /**
         * @param mixed $destActivo
         */
        public function setDestActivo($destActivo): void
        {
            $this->destActivo = $destActivo;
        }

    }