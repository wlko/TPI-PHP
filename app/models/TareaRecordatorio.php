<?php
    require_once('Tarea.php');

    class TareaRecordatorio extends Tarea {
        private $categoria = 'Recordatorio';
        private $fecha;
        private $hora;

        // Constructor
        public function __construct($nombre, $fecha, $hora, $descripcion = '') {
            parent::__construct($nombre, $descripcion);
            $this->fecha = $fecha;
            $this->hora = $hora;
        }

        // Getters y setters
        public function getCategoria() {
            return $this->categoria;
        }

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