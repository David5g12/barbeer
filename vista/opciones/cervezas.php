<link rel="stylesheet" href="vista/css/cervezas.css">
<?php
 foreach ($cervezas as $cerveza) {
     $producto_id = $cerveza['producto_id'];
     $nombre_producto = $cerveza['nombre_producto'];
     $descripcion = $cerveza['descripcion'];
     $precio = $cerveza['precio'];
     $tipo = $cerveza['tipo'];
 }
?>
<section>
    <div class = "header">
        <?php
        require_once('vista/layout/header.php')
        ?>

    </div>
    <div class="contenido">
        <div class="encabezado">
            <div class="texto">
                <h1>Cervezas</h1>
                <p>Descubre nuestra selección de cervezas nacionales, artesanales e importadas</p>
            </div>
            
        </div>
        <div class="buscador">
            <div class="input-group search" style="width: 50%; border: 1px solid rgb(49, 48, 48);;" >
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
                <input id="busqueda" type="text" class="form-control input" placeholder="Buscar cerveza">
            </div>
        
        </div>

        <div class="sec_producto">
            <div class="contenedor_btn">
                <button type="button" class="btn" onclick="filtrar('Todos')">Todos</button>
                <button type="button" class="btn" onclick="filtrar('Nacionales')">Nacionales</button>
                <button type="button" class="btn" onclick="filtrar('Artesanales')">Artesanales</button>
                <button type="button" class="btn" onclick="filtrar('Importadas')">Importadas</button>
                <button type="button" class="btn" onclick="filtrar('Barril')">De barril</button>
            </div>

            
            <div id="producto" class="container my-4">
                <div class="row">
                    <?php if ($Nacionales && count($Nacionales) > 0): ?>
                    <?php foreach ($Nacionales as $cerv): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" data-categoria="Nacionales">
                        <div class="card h-100">
                            <img class="card-img-top img-fluid" src="vista/img/corona.jpg" alt="Card image cap">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0">
                                        <?php echo $cerv['nombre_producto']; ?>
                                    </h5>
                                    <h5 class="mb-0 precio">
                                        $<?php echo $cerv['precio']; ?>
                                    </h5>
                                </div>
                                
                                <p class="card-text">
                                    <?php echo $cerv['tipo']; ?>
                                </p>
                                <p class="card-text">
                                    <?php echo $cerv['descripcion']; ?>
                                </p>
                                <a class="btn btn-primary w-100" href="index.php?p=paquetes">Agregar al pedido</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No se encontraron cervezas.</p>
                <?php endif; ?>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" data-categoria="Internacionales">
                        <div class="card h-100">
                            <img class="card-img-top img-fluid" src="vista/img/corona.jpg" alt="Card image cap">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0">Corona Extra</h5>
                                    <h5 class="mb-0 precio">$ 85</h5>
                                </div>
                                
                                <p class="card-text">Nacionales</p>
                                <p class="card-text">Cerveza clara mexicana, refrescante y ligera</p>
                                <a class="btn btn-primary w-100" href="index.php?p=paquetes">Agregar al pedido</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" data-categoria="Artesanales">
                        <div class="card h-100">
                            <img class="card-img-top img-fluid" src="vista/img/corona.jpg" alt="Card image cap">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0">Porona Extra</h5>
                                    <h5 class="mb-0 precio">$ 100</h5>
                                </div>
                                
                                <p class="card-text">Nacionales</p>
                                <p class="card-text">Cerveza clara mexicana, refrescante y ligera</p>
                                <a class="btn btn-primary w-100" href="index.php?p=paquetes">Agregar al pedido</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" data-categoria="Importadas">
                        <div class="card h-100">
                            <img class="card-img-top img-fluid" src="vista/img/corona.jpg" alt="Card image cap">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0">Corona Extra</h5>
                                    <h5 class="mb-0 precio">$ 105</h5>
                                </div>
                                
                                <p class="card-text">Nacionales</p>
                                <p class="card-text">Cerveza clara mexicana, refrescante y ligera</p>
                                <a class="btn btn-primary w-100" href="index.php?p=paquetes">Agregar al pedido</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" data-categoria="Barril">
                        <div class="card h-100">
                            <img class="card-img-top img-fluid" src="vista/img/corona.jpg" alt="Card image cap">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0">Corona Extra</h5>
                                    <h5 class="mb-0 precio">$ 200</h5>
                                </div>
                                
                                <p class="card-text">Nacionales</p>
                                <p class="card-text">Cerveza clara mexicana, refrescante y ligera</p>
                                <a class="btn btn-primary w-100" href="index.php?p=paquetes">Agregar al pedido</a>
                            </div>
                        </div>
                    </div>                    
            
            
            
            
                </div>
            </div>



            
        </div>

    </div>

    <script>
        //para filtro por botones 
        function filtrar(categoria) {
            const productos = document.querySelectorAll('#producto .col-12');

            productos.forEach(producto => {
                if (categoria === 'Todos') {
                    producto.style.display = 'block'; // Mostrar todos
                } else if (producto.dataset.categoria === categoria) {
                    producto.style.display = 'block'; // Mostrar solo los que coinciden
                } else {
                    producto.style.display = 'none'; // Ocultar los demás
                }
            });
        }
        //quitar comillas 
        function normalizar(texto) {
            return texto
            .toLowerCase()
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, ""); // elimina tildes
        }
        //filtro por search o buscador 
        document.getElementById('busqueda').addEventListener('input', function() {
            const texto = normalizar(this.value);
            const productos = document.querySelectorAll('#producto .col-12');

            productos.forEach(producto => {
                const nombre = normalizar(producto.querySelector('.card-title').textContent);
                const descripcion = normalizar(producto.querySelector('.card-text').textContent);

                if (nombre.includes(texto) || descripcion.includes(texto)) {
                producto.style.display = 'block';
                } else {
                producto.style.display = 'none';
                }
            });
        });

    </script>


</section>
