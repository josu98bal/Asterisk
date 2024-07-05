<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://html5-templates.com/" />
    <title>Interfaz-Formulario</title>
    <meta name="description" content="Simplified Bootstrap template with sticky menu">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sticky-menu.css" rel="stylesheet">
    <style>



        table {
            width: 60%;
            margin-top: 20px;
            border: 1px solid #ccc;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .vote-counts {
            display: flex;
            justify-content: space-around;
            width: 80%;
            margin-top: 25px;
        }

        .vote-counts div {
            background-color: #fff;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 30%;
        }

        .vote-counts div span {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }



        button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 5px #0056b3;
        }

        button:active {
            box-shadow: 0 2px #0056b3;
            transform: translateY(5px);
        }

        .highcharts-container {
            width: 300px; /* Ancho de cada gráfico */
            float: left; /* Flotar a la izquierda para que estén en línea */
            margin-right: 80px; /* Espacio entre gráficos */
            margin-bottom: 10px; /* Espacio entre gráficos y otros elementos */
        }

        .highcharts-figure {
            margin-bottom: 50px; /* Espacio entre gráficos y otros elementos */
        }
        /* Estilos para la caja de contacto */
        .message-box {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilos para el contenido del mensaje */
        .message-content {
            font-size: 16px;
            color: #333;
            line-height: 1.6;
        }
    </style>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Formulario-Avanzadas</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">INICIO</a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top">Welcome</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Conteo</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#whatwedo">Dashboard</a>
                    </li>
                    <li> 
                        <a class="page-scroll" href="#contact">Mensaje y Datos</a>
                    </li> 
                </ul>
            </div>	<!-- .navbar-collapse -->
        </div>		<!-- .container -->
    </nav>
    <!-- Welcome   -->
    <section id="welcome" class="welcome-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Formulario Comunicaciones Avanzadas<h1>
                    <h1>TABLA VOTACIONES</h1>
                    <table id="votacionTable">
                        <thead>
                            <tr>
                                <th>Ncedula</th>
                                <th>Op</th>
                                <th>Significado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Filas de la tabla generadas por PHP -->
                        </tbody>
                    </table>
                    <br>
                    <button onclick="updateTable()">Actualizar Tabla</button>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Conteo de Votos</h1>
                    <div class="vote-counts">
                        <div>Bueno: <span id="buenoCount">0</span></div>
                        <div>Regular: <span id="regularCount">0</span></div>
                        <div>Malo: <span id="maloCount">0</span></div>
                        <div>Total de Votos:<span id="totalCount">0</span></div>
                    </div>
                    <br>
                    
                    <button onclick="updateTable()">Actualizar Conteo</button>
                    
                </div>
            </div>
        </div>
    </section>

     <!--What we do Section-->
    <section id="whatwedo" class="whatwedo-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Dashboard de los sensores</h1>
                    <div class="highcharts-figure">
                        <div class="highcharts-container" id="temperatureContainer">
                            <p class="highcharts-description">Gráfico de temperatura que muestra los datos actuales.</p>
                        </div>
                        <div class="highcharts-container" id="humidityContainer">
                            <p class="highcharts-description">Gráfico de humedad que muestra los datos actuales.</p>
                        </div>
                        <div class="highcharts-container" id="lightContainer">
                            <p class="highcharts-description">Gráfico de luminosidad que muestra los datos actuales.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
     <!--Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Llamadas y tablas ultimo dato</h1>
                    <div id="messageBox" class="message-box">
                        <p id="messageContent" class="message-content">Cargando mensaje...</p>
                    </div>
                    <button onclick="updateMessage()">Verificar Mensaje</button>
                    
                    <div id="datos-container">
                    <!-- Aquí se insertará la tabla de datos -->
                    </div>
                    <br>
                    <button id="consultarDatos">Consultar Últimos Datos</button>
                </div>
            </div>
        </div>
    </section>
	
	<a id="back2Top" title="Back to top" href="#">&#10148;</a>
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/sticky-menu.js"></script>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        function updateTable() {
            fetch('fetch_data.php')
                .then(response => response.json())
                .then(data => {
                    let tableBody = document.querySelector('#votacionTable tbody');
                    tableBody.innerHTML = '';

                    let buenoCount = 0;
                    let regularCount = 0;
                    let maloCount = 0;

                    data.forEach(row => {
                        let tr = document.createElement('tr');
                        let tdNcedula = document.createElement('td');
                        let tdOp = document.createElement('td');
                        let tdSignificado = document.createElement('td');
                        
                        tdNcedula.textContent = row.Ncedula;
                        tdOp.textContent = row.Op;
                        
                        let significado;
                        if (row.Op == 1) {
                            significado = "Bueno";
                            buenoCount++;
                        } else if (row.Op == 2) {
                            significado = "Regular";
                            regularCount++;
                        } else if (row.Op == 3) {
                            significado = "Malo";
                            maloCount++;
                        }
                        tdSignificado.textContent = significado;

                        tr.appendChild(tdNcedula);
                        tr.appendChild(tdOp);
                        tr.appendChild(tdSignificado);
                        tableBody.appendChild(tr);
                    });

                    document.getElementById('buenoCount').textContent = buenoCount;
                    document.getElementById('regularCount').textContent = regularCount;
                    document.getElementById('maloCount').textContent = maloCount;

                    let totalCount = buenoCount + regularCount + maloCount;
                    document.getElementById('totalCount').textContent = totalCount;
                });
        }

        // Load table on page load
        window.onload = updateTable;

        function fetchSensorData() {
            fetch('fetch_sensor_data.php')
                .then(response => response.json())
                .then(data => {
                    if (data && data.length > 0) {
                        const temperatureChart = Highcharts.charts[0];
                        const humidityChart = Highcharts.charts[1];
                        const lightChart = Highcharts.charts[2];
                        const sensorData = data[0]; // Usar el primer conjunto de datos
                        const temp = parseFloat(sensorData.temperatura);
                        const humidity = parseFloat(sensorData.humedad);
                        const light = parseFloat(sensorData.luz);

                        if (temperatureChart) {
                            temperatureChart.series[0].points[0].update(temp);
                        }
                        if (humidityChart) {
                            humidityChart.series[0].points[0].update(humidity);
                        }
                        if (lightChart) {
                            lightChart.series[0].points[0].update(light);
                        }
                    } else {
                        console.error('No se recibieron datos de fetch_sensor_data.php');
                    }
                })
                .catch(error => console.error('Error al obtener datos del sensor:', error));
        }

         // Gráfico de Temperatura
         Highcharts.chart('temperatureContainer', {
            chart: {
                type: 'gauge',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                height: '250px' // Altura del gráfico de temperatura
            },
            title: {
                text: 'Temperatura'
            },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                center: ['50%', '75%'],
                size: '150%'
            },
            yAxis: {
                min: 0,
                max: 70,
                tickPixelInterval: 30,
                tickPosition: 'inside',
                tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                tickLength: 10,
                tickWidth: 1,
                minorTickInterval: null,
                labels: {
                    distance: 10,
                    style: {
                        fontSize: '10px'
                    }
                },
                lineWidth: 0,
                plotBands: [{
                    from: 0,
                    to: 20,
                    color: '#55BF3B', // verde
                    thickness: '20%'
                }, {
                    from: 20,
                    to: 50,
                    color: '#DDDF0D', // amarillo
                    thickness: '20%'
                }, {
                    from: 50,
                    to: 75,
                    color: '#DF5353', // rojo
                    thickness: '20%'
                }]
            },
            series: [{
                name: 'Temperatura',
                data: [0],
                tooltip: {
                    valueSuffix: ' °C'
                },
                dataLabels: {
                    format: '{y} °C',
                    borderWidth: 0,
                    style: {
                        fontSize: '25px'
                    }
                },
                dial: {
                    radius: '60%',
                    backgroundColor: 'gray',
                    baseWidth: 10,
                    baseLength: '0%',
                    rearLength: '0%'
                },
                pivot: {
                    backgroundColor: 'gray',
                    radius: 5
                }
            }]
        });

        // Gráfico de Humedad
        Highcharts.chart('humidityContainer', {
            chart: {
                type: 'gauge',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                height: '250px' // Altura del gráfico de humedad
            },
            title: {
                text: 'Humedad'
            },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                center: ['50%', '75%'],
                size: '150%'
            },
            yAxis: {
                min: 0,
                max: 85,
                tickPixelInterval: 30,
                tickPosition: 'inside',
                tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                tickLength: 10,
                tickWidth: 1,
                minorTickInterval: null,
                labels: {
                    distance: 10,
                    style: {
                        fontSize: '10px'
                    }
                },
                lineWidth: 0,
                plotBands: [{
                    from: 0,
                    to: 40,
                    color: '#55BF3B', // verde
                    thickness: '20%'
                }, {
                    from: 40,
                    to: 70,
                    color: '#DDDF0D', // amarillo
                    thickness: '20%'
                }, {
                    from: 70,
                    to: 100,
                    color: '#DF5353', // rojo
                    thickness: '20%'
                }]
            },
            series: [{
                name: 'Humedad',
                data: [0],
                tooltip: {
                    valueSuffix: ' %'
                },
                dataLabels: {
                    format: '{y} %',
                    borderWidth: 0,
                    style: {
                        fontSize: '25px'
                    }
                },
                dial: {
                    radius: '60%',
                    backgroundColor: 'blue',
                    baseWidth: 10,
                    baseLength: '0%',
                    rearLength: '0%'
                },
                pivot: {
                    backgroundColor: 'blue',
                    radius: 5
                }
            }]
        });

        // Gráfico de Luz
        Highcharts.chart('lightContainer', {
            chart: {
                type: 'gauge',
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: false,
                height: '250px' // Altura del gráfico de luz
            },
            title: {
                text: 'Luz'
            },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: null,
                center: ['50%', '75%'],
                size: '150%'
            },
            yAxis: {
                min: 0,
                max: 90,
                tickPixelInterval: 30,
                tickPosition: 'inside',
                tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
                tickLength: 10,
                tickWidth: 1,
                minorTickInterval: null,
                labels: {
                    distance: 10,
                    style: {
                        fontSize: '10px'
                    }
                },
                lineWidth: 0,
                plotBands: [{
                    from: 0,
                    to: 40,
                    color: '#55BF3B', // verde
                    thickness: '20%'
                }, {
                    from: 40,
                    to: 70,
                    color: '#DDDF0D', // amarillo
                    thickness: '20%'
                }, {
                    from: 70,
                    to: 100,
                    color: '#DF5353', // rojo
                    thickness: '20%'
                }]
            },
            series: [{
                name: 'Luz',
                data: [0],
                tooltip: {
                    valueSuffix: ' %'
                },
                dataLabels: {
                    format: '{y} %',
                    borderWidth: 0,
                    style: {
                        fontSize: '25px'
                    }
                },
                dial: {
                    radius: '60%',
                    backgroundColor: 'yellow',
                    baseWidth: 10,
                    baseLength: '0%',
                    rearLength: '0%'
                },
                pivot: {
                    backgroundColor: 'yellow',
                    radius: 5
                }
            }]
        });

        setInterval(fetchSensorData, 500); // Actualizar cada 0,5 segundos

            // Ruta al archivo message.json en otro servidor
            const url = 'http://192.168.220.129/message.json';

            // Función para realizar la solicitud XMLHttpRequest
            function fetchMessage() {
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            const data = JSON.parse(xhr.responseText);
                            const messageBox = document.getElementById('messageBox');
                            if (messageBox) {
                                messageBox.textContent = data.message;
                            } else {
                                console.error('No se encontró el elemento messageBox en el DOM.');
                            }
                        } else {
                            console.error('Error al obtener el mensaje:', xhr.status);
                        }
                    }
                };
                xhr.open('GET', url, true);
                xhr.send();
            }

            document.addEventListener('DOMContentLoaded', function() {
                fetchMessage(); // Cargar el mensaje al cargar la página
            });

            function updateMessage() {
                fetchMessage(); // Llamar a la función para cargar el mensaje actualizado
            }


        // Script para consultar los últimos datos al presionar el botón
        $(document).ready(function() {
        $('#consultarDatos').click(function() {
            $.ajax({
                type: 'POST',
                url: 'ultimo_dato.php',
                success: function(response) {
                    $('#datos-container').html(response);
                },
                error: function() {
                    alert('Error al consultar los datos.');
                }
            });
        });
    });

    </script>
   

    
    
</body>

</html>
