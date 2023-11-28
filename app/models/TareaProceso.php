<?php
    require_once('Tarea.php');

    class TareaProceso extends Tarea {
        private $categoria = 'Proceso';
        private $subTareas = [];

        // Constructor
        public function __construct($nombre, $descripcion = '', $subTareas) {
            parent::__construct($nombre, $descripcion);
            $this->subTareas = $subTareas;
        }

        // Getters
        public function getCategoria() {
            return $this->categoria;
        }

        public function getSubTareas() {
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