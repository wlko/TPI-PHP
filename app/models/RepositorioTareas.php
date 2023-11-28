<?php
    // Clase que manejará la persistencia de datos basada en sesiones
    class RepositorioTareas {
        protected $sessionKey = 'tareas';
        protected $session;

        // Constructor
        public function __construct($session) {
            $this->session = $session;
            // Inicializamos la sesión si no está configurada
            if (!isset($_SESSION[$this->sessionKey])) {
                $_SESSION[$this->sessionKey] = [];
            }
        }

        // Añadir tarea
        public function guardarTarea(Tarea $tarea) {
            // Obtenemos todas las tareas de la sesión
            $tareas = $this->obtenerTareas();    
            // Agregamos la nueva tarea
            $tareas[] = $tarea;    
            // Guardamos las tareas actualizadas en la sesión
            $_SESSION[$this->sessionKey] = $tareas;
        }

        // Listar Tareas
        public function obtenerTareas() {
            // Obtenemos todas las tareas de la sesión
            return isset($_SESSION[$this->sessionKey]) ? $_SESSION[$this->sessionKey] : [];
        }

        // Eliminar tarea por ID
        public function eliminarTarea($id) {
            // Obtenemos todas las tareas de la sesión
            $tareas = $this->obtenerTareas();    
            // Eliminamos la tarea con el ID especificado
            unset($tareas[$id]);    
            // Guardamos las tareas actualizadas en la sesión
            $_SESSION[$this->sessionKey] = $tareas;
        }

        public function eliminarTodasLasTareas() {
            // Eliminamos todas las tareas de la sesión
            $_SESSION[$this->sessionKey] = [];
        }
    }
?>