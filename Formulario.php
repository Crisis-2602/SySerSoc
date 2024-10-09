<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro - SB Admin</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #11366A;
            /* Azul oscuro */
        }

        .card {
            margin-top: 5%;
            margin-bottom: 5%;
            background-color: #8A110F;
            /* Rojo oscuro */
            color: black;
            /* Texto en blanco */

        }

        .card-header {
            background-color: white;
            /* Azul oscuro */
            color: black;
        }

        .btn {
            background-color: #11366A;
            /* Azul oscuro */
            color: white;
            transition: 0.3s;
            border-radius: 4px;

            /* Efecto hover */
            &:hover {
                background-color: #07244A;
                /* Azul oscuro más intenso */
                color: #f2f2f2;
                /* Blanco grisáceo */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                /* Sombra */
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el campo de código postal
            var inputPostalCode = document.getElementById('inputPostalCode');

            // Agregar un listener para el evento blur
            inputPostalCode.addEventListener('blur', function() {
                // Obtener el valor del código postal
                var codigoPostal = inputPostalCode.value.trim();

                // Verificar si el código postal no está vacío
                if (codigoPostal !== '') {
                    // URL base de la API de Zippopotamus
                    var url = 'https://api.zippopotam.us/mx/' + codigoPostal;

                    // Realizar la solicitud HTTP GET a la API
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            // Actualizar los campos del formulario con los datos obtenidos de la API
                            document.getElementById('inputCity').value = data.places[0]['place name'];
                            document.getElementById('inputState').value = data.places[0]['state'];
                            // Puedes actualizar más campos según lo que devuelva la API
                        })
                        .catch(error => console.error('Error al obtener datos del código postal:', error));
                }
            });
        });
    </script>
</head>
<body>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Formulario de Registro</h3>
                            </div>

                            <div class="card-body">
                                <?php
                                include('../Modulos/conexion.php');
                                // Definir la fecha inicial y final permitida para el registro
                                $fecha_inicio = '2024-03-15';
                                $fecha_fin = '2025-04-30';

                                // Obtener la fecha y hora actual
                                $fecha_actual = date('Y-m-d');
                                $hora_actual = date('H:i');
                                $hora_actual_minutos = strtotime($hora_actual) / 60; // Convertir la hora actual a minutos desde la medianoche

                                // Obtener la hora de inicio y fin permitida
                                $hora_inicio = '00:00'; // Hora de inicio permitida (12:00 AM)
                                $hora_inicio_minutos = strtotime($hora_inicio) / 60; // Convertir la hora de inicio a minutos desde la medianoche

                                $hora_fin = '24:00'; // Hora de fin permitida (12:00 AM)
                                $hora_fin_minutos = strtotime($hora_fin) / 60; // Convertir la hora de fin a minutos desde la medianoche

                                // Verificar si la fecha actual está dentro del rango permitido
                                if (($fecha_actual >= $fecha_inicio && $fecha_actual <= $fecha_fin) &&
                                    ($hora_actual_minutos >= $hora_inicio_minutos && $hora_actual_minutos <= $hora_fin_minutos)
                                ) {
                                ?>
                                    <form action="/residencia/dev/modulos/registro_alumno.php" method="post">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputApellidoPaterno" name="inputApellidoPaterno" type="text" placeholder="Ingrese su apellido paterno" />
                                                    <label for="inputApellidoPaterno">Apellido Paterno</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputApellidoMaterno" name="inputApellidoMaterno" type="text" placeholder="Ingrese su apellido materno" />
                                                    <label for="inputApellidoMaterno">Apellido Materno</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Ingrese su nombre" />
                                                    <label for="inputFirstName">Nombres</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputGener" name="inputGener" type="text" placeholder="Ingrese su Género" />
                                                    <label for="inputGener">Género</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputTelefono" name="inputTelefono" type="text" placeholder="Telefono" />
                                                    <label for="inputTelefono">Telefono</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputStudentID" name="inputStudentID" type="text" placeholder="Ingrese su número de control" />
                                                    <label for="inputStudentID">Número de Control</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" id="inputSemester" name="inputSemester" aria-label="Semester">
                                                        <?php
                                                        // Verificar si la carrera es "virtual"
                                                        echo "<option selected disabled>Seleccione semestre</option>";

                                                        $carrera = $_POST["inputMajor"]; // Obtener el valor de la carrera desde el formulario
                                                        // Verificar si el texto contiene la palabra "virtual"
                                                        $num_semestres = (strpos(strtolower($carrera), 'virtual') !== false) ? 15 : 12;
                                                        // Generar las opciones del select según el número de semestres
                                                        for ($i = 1; $i <= $num_semestres; $i++) {
                                                            echo "<option value='$i'>$i Semestre</option>";
                                                        } ?>
                                                    </select>
                                                    <label for="inputSemester">Semestre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" id="inputMajor" name="inputMajor" aria-label="Major">
                                                        <option selected disabled>Seleccione carrera</option>
                                                        <option value="Ingeniería Ambiental">Ingeniería Ambiental</option>
                                                        <option value="Ingeniería Electromecánica">Ingeniería Electromecánica</option>
                                                        <option value="Ingeniería Electrónica">Ingeniería Electrónica</option>
                                                        <option value="Ingeniería en Gestión Empresarial">Ingeniería en Gestión Empresarial</option>
                                                        <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                                                        <option value="Ingeniería Mecatrónica">Ingeniería Mecatrónica</option>
                                                        <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
                                                        <option value="Ingeniería en Sistemas Computacionales virtual">Ingeniería en Sistemas Computacionales virtual</option>
                                                        <option value="Ingeniería en Semiconductores">Ingeniería en Semiconductores</option>
                                                    </select>
                                                    <label for="inputMajor">Carrera</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" id="inputTurn" name="inputTurn" aria-label="Turn">
                                                        <option selected disabled>Seleccione turno</option>
                                                        <option value="Morning">Mañana</option>
                                                        <option value="Afternoon">Tarde</option>
                                                    </select>
                                                    <label for="inputTurn">Turno</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputStreet" name="inputStreet" type="text" placeholder="C. Jiménez" />
                                                    <label for="inputStreet">Calle</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">

                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputExternalNumber" name="inputExternalNumber" type="text" placeholder="1012" />
                                                    <label for="inputExternalNumber">Número Externo</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputInternalNumber" name="inputInternalNumber" type="text" placeholder="101" />
                                                    <label for="inputInternalNumber">Número Interno</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mb-3">

                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputColonia" name="inputColonia" type="text" placeholder="Guerra" />
                                                    <label for="inputColonia">Colonia</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputPostalCode" name="inputPostalCode" type="text" placeholder="67155" />
                                                    <label for="inputPostalCode">Código Postal</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mb-3">

                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputCity" name="inputCity" type="text" placeholder="Guadalupe" />
                                                    <label for="inputCity">Municipio</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputState" name="inputState" type="text" />
                                                    <label for="inputState">Estado</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary">Registrar</button></div>
                                        </div>
                                    </form>
                                <?php
                                } else {
                                    echo "<p style='color:red;'>El registro no está disponible en este momento.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

</body>

</html>