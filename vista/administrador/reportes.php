<link rel="stylesheet" href="vista/css/reportes.css">
<?php
foreach($reporte_mensual as $reporte){
    $mes = $reporte['mes'];
    $ventas_totales = $reporte['ventas_totales'];
    $monto_transferencias = $reporte['monto_transferencias'];
    $transacciones_transferencias = $reporte['transacciones_transferencias'];
}
?>
<section>
    <div class="header">
        <?php
        require_once('vista/layout/header.php');
        ?>
    </div>
    <div class="contenido">
        <div class ="encabezado">
            <div class="texto">
                <h2>Reportes y análisis</h2>
                <p>Visualiza el rendimiento de tu negocio</p>
            
            </div>
            <div class="boton">
                <a href="https://www.mercadolibre.com.mx" class="btn btn"><i class="bi bi-plus"></i>Realizar compras</a>

            </div>
        </div>

        <div class="reporte">
            <div class="container my-4">
                <div class="row">

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Ventas totales</h5>
                                    <h5 class="mb-0 icono"><i class="bi bi-currency-dollar"></i></h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0">
                                        <?php echo number_format($ventas_totales,2,'.',','); ?>
                                    </h5>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                     <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Transacciones</h5>
                                    <h5 class="mb-0 icono"><i class="bi bi-currency-dollar"></i></h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0">
                                        <?php echo number_format($transacciones_transferencias,0,'.',','); ?>
                                    </h5>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                     <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Productos Vendidos</h5>
                                    <h5 class="mb-0 icono"><i class="bi bi-currency-dollar"></i></h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0">
                                        <?php echo number_format($reporte['total_productos_vendidos'],0,'.',','); ?>
                                    </h5>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        //no muevas nada del diseño  esta es la entrada de datos 
        <?php
            // Datos simulados desde PHP semanal 
            $semanas = ["Lun", "Mar", "Mié", "Jue","vie","Sab","Dom"];
            $ventas = [1500, 1600, 1800, 2000,50,100,300];
            $compras = [100, 130, 160, 190,10.50,400,120];

            $totalVentas = array_sum($ventas);
            $totalCompras = array_sum($compras);
        ?>

        <?php
            // Datos simulados desde PHP categoria 
            $categorias = ["cerveza", "botanas", "refrescos", "licores","combos"];
            $porcentaje = [5, 45,15, 30,5];
        ?>

        <?php
            // Datos simulados desde PHP tendencia
            $meses = ["Ene", "Feb", "Mar", "Abr","May","Junio","Julio","Ago","Sep","Oct","Nov","Dic"];
            $VentaMensual = [1500, 1600, 1800, 2000,50,100,300,100,500,100,55,60];
            
            $VentasAnios = array_sum($ventas);
        ?>



        <div class="graficos">
            <div class="container my-4">
                <div class="row" id="contenedor-cards">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <!-- Título del gráfico -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0">Análisis de Ventas vs Compras (Semanal)</h5>
                                    <span class="badge bg-primary">Reporte</span>
                                </div>

                                 <!--Contenedor del gráfico -->
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="barras"></canvas>
                                </div>
                                <div id="totales" class="mt-2 text-center fw-bold">
                                    <p>Total Ventas: <i class="bi bi-currency-dollar"></i> <?php echo number_format($totalVentas,2,'.',','); ?></p>
                                    <p>Total Compras:<i class="bi bi-currency-dollar"></i> <?php echo number_format($totalCompras,2,'.',','); ?></p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <!-- Título del gráfico -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0">Venta por categoría</h5>
                                    <span class="badge bg-primary">Reporte</span>
                                </div>

                                 <!--Contenedor del gráfico -->
                                <div class="chart-container" style="height:250px;">
                                    <canvas id="circular"></canvas>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <!-- Título del gráfico -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0">Tendencia Mensual</h5>
                                    <span class="badge bg-primary">Reporte</span>
                                </div>

                                 <!--Contenedor del gráfico -->
                                <div class="chart-container" style="height:250px;">
                                    <canvas id="tendencia"></canvas>
                                </div>
                                <div id="totales" class="mt-2 text-center fw-bold">
                                    <p>Objetivo: <i class="bi bi-currency-dollar"></i></p>
                                    <p>Ventas: <i class="bi bi-currency-dollar"></i> <?php echo number_format($VentasAnios,2,'.',','); ?></p>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>





    </div>

    //Grafico especial para ventas y compra semanal
    <script>
        // Pasar los datos PHP a JavaScript
        const etiquetasBarras = <?php echo json_encode($semanas); ?>;
        const datosVentas = <?php echo json_encode($ventas); ?>;
        const datosCompras = <?php echo json_encode($compras); ?>;

        const graficarBarra = document.getElementById('barras');

        new Chart(graficarBarra, {
            type: 'bar',
            data: {
            labels: etiquetasBarras,
            datasets: [
                {
                label: 'Ventas',
                data: datosVentas,
                backgroundColor: 'rgba(54, 162, 235, 1)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
                },
                {
                label: 'Compras',
                data: datosCompras,
                backgroundColor: 'rgba(70, 66, 67, 1)',
                borderColor: 'rgba(54, 50, 51, 1)',
                borderWidth: 1
                }
            ]
            },
            options: {
            responsive: true,
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>

         //Grafico especial para categoria 
    <script>
        

        // Pasar los datos PHP a JavaScript
        const etiquetasCircular = <?php echo json_encode($categorias); ?>;
        const porcentaje = <?php echo json_encode($porcentaje); ?>;

        const graficarCirculo = document.getElementById('circular');

        new Chart(graficarCirculo, {
            type: 'pie', // gráfico circular
            data: {
            labels: etiquetasCircular,
            datasets: [{
                data: porcentaje,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)'
               ],
                borderColor: [
                    'rgba(14, 14, 15, 1)',
                ],
                borderWidth: 1
            }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }, // ocultar la leyenda
                    datalabels: {
                        color: '#fff',          // color de la etiqueta
                        formatter: (value, context) => {
                            return context.chart.data.labels[context.dataIndex] + ' ' + value + '%';
                        },
                        font: {
                            weight: '',
                            size: 10
                        },
                        rotation: 260,           // rota 90 grados (vertical)
                        anchor: 'center',       // ancla en el centro de la porción
                        align: 'center'
                    }
                }
            },
            plugins: [ChartDataLabels]  // activar plugin
                        
        });
    </script>
     //Grafico especial para tendencia mesual 
    <script>
        // Pasar los datos PHP a JavaScript
        const etiquetasTendencia = <?php echo json_encode($meses); ?>;
        const datosTendecia = <?php echo json_encode($VentaMensual); ?>;

        const graficarTendencia = document.getElementById('tendencia');

        new Chart(graficarTendencia, {
            type: 'bar',
            data: {
            labels: etiquetasTendencia,
            datasets: [
                {
                label: 'Ventas',
                data: datosTendecia,
                backgroundColor: 'rgba(54, 162, 235, 1)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
                },
                
            ]
            },
            options: {
            responsive: true,
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>



</section>