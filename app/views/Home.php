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
                                    <button type="button" class="btn btn-dark btn-sm" onclick="mostrarCategoria('Contacto')">Contacto</button>
                                </div>
                                <div class="col-auto mx-auto">
                                    <button type="button" class="btn btn-dark btn-sm" onclick="mostrarCategoria('Proceso')">Proceso</button>
                                </div>
                                <div class="col-auto mx-auto">
                                    <button type="button" class="btn btn-dark btn-sm" onclick="mostrarCategoria('Recordatorio')">Recordatorio</button>
                                </div>
                            </div>

                            <div id="camposDinamicos" class="categoria d-flex flex-column g-1"></div>
                        </form>
                    </aside>
                    
                    <main class="col-6">
                        <!-- Lista de tareas -->
                        <ul>
                            <?php if (!empty($tareas)) : ?>
                                <?php foreach ($tareas as $tarea) : ?>
                                    <li>
                                        <?php echo $tarea->getNombre(); ?>
                                    </li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>Aun no hay tareas cargadas</p>
                            <?php endif; ?>
                        </ul>

                    </main>
                </div>
            </div>
            

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="js/CategoriasDinamicas.js"></script>
        <script src="js/AgruparSubtareas.js"></script>
    </body>
</html>