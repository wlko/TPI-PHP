<?php
    require_once('Tarea.php');

    class TareaRecordatorio extends Tarea {
        private $fecha;
        private $hora;

        // Constructor
        public function __construct($nombre, $descripcion, $categoria, $fecha, $hora) {
            parent::__construct($nombre, $descripcion, $categoria);
            $this->fecha = $fecha;
            $this->hora = $hora;
        }

        // Getters y setters
        public function getFecha() {
            return $this->fecha;
        }

        public function getHora() {
            return $this->hora;
        }

        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }

        public function setHora($hora) {
            $this->hora = $hora;
        }
    }
?>