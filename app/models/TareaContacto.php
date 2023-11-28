<?php
    require_once('Tarea.php');

    class TareaContacto extends Tarea {
        private $nombreContacto;
        private $numeroContacto;
        private $emailContacto;
        private $razon;

        // Constructor
        public function __construct($nombre, $descripcion, $categoria , $nombreContacto, $numeroContacto, $emailContacto, $razon = '') {
            parent::__construct($nombre, $descripcion, $categoria);
            $this->nombreContacto = $nombreContacto;
            $this->numeroContacto = $numeroContacto;
            $this->emailContacto = $emailContacto;
            $this->razon = $razon;
        }

        // Getters y setters
        public function getNombreContacto() {
            return $this->nombreContacto;
        }
        
        public function getNumeroContacto() {
            return $this->numeroContacto;
        }
        
        public function getEmailContacto() {
            return $this->emailContacto;
        }

        public function getRazon() {
            return $this->razon;
        }

        public function setNombreContacto($nombreContacto) {
            $this->nombreContacto = $nombreContacto;
        }

        public function setNumeroContacto($numeroContacto) {
            $this->numeroContacto = $numeroContacto;
        }

        public function setEmailContacto($emailContacto) {
            $this->emailContacto = $emailContacto;
        }

        public function setRazon($razon) {
            $this->razon = $razon;
        }
    }
?>