<?php
    class Tarea {
        private $nombre;
        private $descripcion;
        private $categoria;
        private $hecha = false;

        // Constructor
        public function __construct($nombre, $descripcion, $categoria) {
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->categoria = $categoria;
        }
        
        // Getters y setters
        public function getNombre() {
            return $this->nombre;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function getCategoria() {
            return $this->categoria;
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