<?php
    require_once __DIR__ . '/../models/Tarea.php';
    require_once __DIR__ . '/../models/TareaContacto.php';
    require_once __DIR__ . '/../models/TareaProceso.php';
    require_once __DIR__ . '/../models/TareaRecordatorio.php';
    
    class TareaController {
        private $repositorioTareas;

        // Constructor
        public function __construct(RepositorioTareas $repositorioTareas) {
            $this->repositorioTareas = $repositorioTareas;
        }

        public function manejarAccion() {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
    
                switch ($action) {
                    case 'listar':
                        $this->listarTareas();
                        break;
                    case 'agregar':
                        $this->agregarTarea();
                        break;
                    case 'eliminar':
                        $this->eliminarTarea();
                        break;
                    case 'marcarHecha':
                        $this->marcarTareaHecha();
                        break;
                    default:
                        // Lógica para la página principal
                        break;
                }
            } else {
                // Lógica para la página principal
                $this->listarTareas();
            }
        }
    
        private function listarTareas() {
            $tareas = $this->repositorioTareas->obtenerTareas();
            include __DIR__ . '/../views/Home.php';
        }
    
        private function agregarTarea() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Atributos comunes de todas las tareas
                $nombre = $_POST['nombre'];
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
                $categoria = $_POST['categoria'];

                if ($categoria == 'Proceso') {
                    $subtareas = json_decode($_POST['tareasHidden']);
                }
                
                // Dependiendo del tipo de tarea, instanciar la clase correspondiente
                switch ($categoria) {
                    case 'Contacto':
                        $tarea = new TareaContacto($nombre, $descripcion, $categoria, $_POST['nombreContacto'], $_POST['email'], $_POST['telefono'], $_POST['razon']);
                        break;
                    case 'Proceso':
                        $tarea = new TareaProceso($nombre, $descripcion, $categoria, $subtareas);
                        break;
                    case 'Recordatorio':
                        $tarea = new TareaRecordatorio($nombre, $descripcion, $categoria, $_POST['fecha'], $_POST['hora']);
                        break;
                    default:
                        // Tratar cualquier otro caso o lanzar un error si es necesario
                        break;
                }
                // Guardar tarea dentro de la Sesión
                $this->repositorioTareas->guardarTarea($tarea);
            }
            // Redirigir a la lista de tareas después de agregar (ya sea que el formulario se haya enviado o no)
            header('Location: index.php?action=listar');
            exit;
        }
    
        private function eliminarTarea() {
            // Lógica para procesar la eliminación
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $this->repositorioTareas->eliminarTarea($id);
                // Redirigir a la lista de tareas después de eliminar
                header('Location: index.php?action=listar'); 
                exit;
            }
        }
    
        private function marcarTareaHecha() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lógica para marcar la tarea como hecha
                $id = $_POST['id'];
                foreach ($this->repositorioTareas->obtenerTareas() as $tarea) {
                    if ($tarea->getId() == $id) {
                        $tarea->setHecha($tarea->getHecha() ? false : true);
                    }
                }
                header('Location: index.php?action=listar'); // Redirigir a la lista de tareas después de marcar como hecha
                exit;
            }
        }
    }
?>