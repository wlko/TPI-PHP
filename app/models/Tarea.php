<?php
    class Tarea {
        private $nombre;
        private $descripcion;
        private $hecha = false;

        // Constructor
        public function __construct($nombre, $descripcion = '') {
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
        }
        
        // Getters y setters
        public function getNombre() {
            return $this->nombre;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function getHecha() {
            return $this->hecha;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function setHecha($hecha) {
            $this->hecha = $hecha;
        }
    }
?>