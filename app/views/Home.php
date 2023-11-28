<!-- Archivo: views/listarTareas.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>App Tareas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    
    <body class="bg-secondary-subtle">
        <div id="containerApp">
            <header>
                <nav id="navbar" class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                        <h1>
                            App Tareas
                        </h1>
                        </a>
                    </div>
                </nav>
            </header>

            <div id="containerContent" class="container">
                <div id="rowTask" class="row align-items-center">

                    <aside class="col-6 bg-dark-subtle rounded-4">
                        <h4 style="text-align: center; font-weight: 700" class="my-3">Agregar Tarea</h4>
                        <!-- Formulario para agregar tarea -->
                        <form id="taskForm" action="index.php?action=agregar" method="post">

                            <input type="text" class="form-control form-control-sm mb-2" name="nombre" placeholder="Nombre de Tarea" required >
                            <textarea class="form-control form-control-sm mb-2" placeholder="Descripción" name="descripcion" style="height: 100px"></textarea>

                            <div class="row mb-2 g-2">
                                <div class="col-auto mx-auto">
                                    <button type="button" class="btn btn-dark btn-sm text-success" onclick="mostrarCategoria('Contacto')">Contacto</button>
                                </div>
                                <div class="col-auto mx-auto">
                                    <button type="button" class="btn btn-dark btn-sm text-warning" onclick="mostrarCategoria('Proceso')">Proceso</button>
                                </div>
                                <div class="col-auto mx-auto">
                                    <button type="button" class="btn btn-dark btn-sm text-primary" onclick="mostrarCategoria('Recordatorio')">Recordatorio</button>
                                </div>
                            </div>

                            <div id="camposDinamicos" class="categoria d-flex flex-column g-1"></div>
                        </form>
                    </aside>
                    
                    <main class="col-6">
                        <!-- Lista de tareas -->
                        <?php if (!empty($tareas)) : ?>
                            <div class="accordion" id="accordionExample">
                            <?php foreach ($tareas as $key=>$tarea) : 
                                $numTarea = $key + 1;
                                $coloresTitulo = ["Contacto"=>"bg-success-subtle", "Proceso"=>"bg-warning-subtle", "Recordatorio"=>"bg-primary-subtle"];
                                $categoria = $tarea->getCategoria();
                                ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed <?php echo $coloresTitulo[$categoria] ?>"  type="button" data-bs-toggle="collapse" data-bs-target=<?php echo '#descripcion'.$numTarea; ?> aria-expanded="false" aria-controls=<?php echo 'descripcion'.$numTarea; ?>>
                                            <?php echo "Tarea ".$numTarea.": ".$tarea->getNombre(); ?>
                                        </button>
                                        
                                    </h2>
                                    <div id=<?php echo 'descripcion'.$numTarea; ?> class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body d-flex flex-column g-1">
                                            <?php
                                                switch ($categoria) {
                                                    case 'Contacto':
                                                        echo "Descripcion: ".$tarea->getNombreContacto()."</p>";
                                                        echo "<p>Contactar a: ".$tarea->getNombreContacto()."</p>";
                                                        echo "<p>Numero: ".$tarea->getNumeroContacto()."</p>";
                                                        echo "<p>Email: ".$tarea->getEmailContacto()."</p>";
                                                        echo "<p>Razon: ".$tarea->getRazon()."</p>";
                                                        echo '
                                                            <form id="deleteTask" class="d-flex flex-column" action="index.php?action=eliminar" method="post">
                                                                <input type="hidden" name="id" value="'.$key.'">
                                                                <button type="submit" class="btn btn-outline-dark mb-2">Eliminar Tarea</button>
                                                            </form>
                                                        ';
                                                        break;
                                                    case 'Proceso':
                                                        echo "<p>Descripcion: ".$tarea->getDescripcion()."</p>";
                                                        foreach ($tarea->getSubtareas() as $keysubtarea=>$subtarea) {
                                                            $numSubtarea = $keysubtarea + 1;
                                                            echo "<p>Subtarea ".$numSubtarea.": ".$subtarea."</p>";
                                                        }
                                                        echo '
                                                            <form id="deleteTask" class="d-flex flex-column" action="index.php?action=eliminar" method="post">
                                                                <input type="hidden" name="id" value="'.$key.'">
                                                                <button type="submit" class="btn btn-outline-dark mb-2">Eliminar Tarea</button>
                                                            </form>
                                                        ';
                                                        break;
                                                    case 'Recordatorio':
                                                        echo "<p>Descripcion: ".$tarea->getDescripcion()."</p>";
                                                        echo "<p>Fecha: ".$tarea->getFecha()."</p>";
                                                        echo "<p>Hora: ".$tarea->getHora()."</p>";
                                                        echo '
                                                            <form id="deleteTask" class="d-flex flex-column" action="index.php?action=eliminar" method="post">
                                                                <input type="hidden" name="id" value="'.$key.'">
                                                                <button type="submit" class="btn btn-outline-dark mb-2">Eliminar Tarea</button>
                                                            </form>
                                                        ';
                                                        break;
                                                    default:
                                                        # code...
                                                        break;
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <p style="text-align: center; font-weight: 700">Aun no hay tareas cargadas</p>
                        <?php endif; ?>

                    </main>
                </div>
            </div>
            

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="js/CategoriasDinamicas.js"></script>
        <script src="js/AgruparSubtareas.js"></script>
    </body>
</html>