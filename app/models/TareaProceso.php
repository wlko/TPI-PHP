<?php
    require_once('Tarea.php');

    class TareaProceso extends Tarea {
        private $subTareas = [];

        // Constructor
        public function __construct($nombre, $descripcion, $categoria, $subTareas) {
            parent::__construct($nombre, $descripcion, $categoria);
            $this->subTareas = $subTareas;
        }

        // Getters
        public function getSubtareas() {
            return $this->subTareas;
        }

        // Añadir sub-tarea
        public function addSubTarea($subTarea) {
            $this->subTareas[] = $subTarea;
        }

        // Eliminar sub-tarea por id
        public function removeSubTarea($id) {
            unset($this->subTareas[$id]);
        }
    }
?>