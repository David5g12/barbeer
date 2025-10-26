<link rel="stylesheet" href="vista/css/proveedores.css">

<section>
    <div class ="header">
        <?php
        require_once('vista/layout/header.php');
        ?>

    </div>
    <div class="contenido">
        <div class ="encabezado">
            <div class="texto">
                <h2>Proveedores</h2>
                <p>Gestiona ordenes de compra a proveedores</p>
            
            </div>
            <div class="boton">
                <a href="index.php?c=proveedores&p=AgregarProveedores" class="btn btn"><i class="bi bi-plus"></i> ver proveedores</a>

            </div>
        </div>

        <div class="reporte">
            
            <div class="container my-4">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Total Proveedores</h5>
                                    <h5 class="mb-0 icono"><i class="bi bi-people-fill"></i></h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0">4</h5>
                                    <p class="card-text mb-0">Provedorees activos</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Categorias</h5>
                                    <h5 class="mb-0 icono"><i class="bi bi-people-fill"></i></h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0">4</h5>
                                    <p class="card-text mb-0">Tipo de proveedores</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="buscador">
            <div class="input-group search" style="width: 100%; border: 1px solid rgb(23, 22, 22)" >
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
                <input id="busqueda" type="text" class="form-control input" placeholder="Buscar por nombre, categoria o contacto">
            </div>
    
        </div>

        <div class="proveedores">
            <div class="container my-4">
                <div class="row" id="contenedor-cards">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <h5 class="card-title mb-0">Distibuidora de cerveza del norte</h5>
                                    <h5 class="mb-0 categoria">Cerveza</h5>   
                                </div>
                                <div class=" sup  mb-4">
                                    <h5>SUP-001</h5>
                                </div>
                                <div class="datos mb-1 d-flex flex-column gap-2">
                                    <a href="" class="d-block"><i class="bi bi-person-fill"></i> Juan Pérez</a>
                                    <a href="" class="d-block email"> <i class="bi bi-envelope-fill"></i> ventas@cervecerianorte.com</a>
                                    <a href="" class="d-block"><i class="bi bi-telephone-fill"></i>+52 8112345678</a>
                                    <a href="" class="d-block direccion" ><i class="bi bi-geo-alt-fill"></i>avenida</a>
                                </div>
                                <div class="botones">
                                    <a href="index.php?c=proveedores&p=EditarProveedores" class="btn btn-edit"><i class="bi bi-pencil"></i>Editar</a>
                                    <a href="" class="btn btn-delete"><i class="bi bi-trash"></i></a>

                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <h5 class="card-title mb-0">Licores premium SA</h5>
                                    <h5 class="mb-0 categoria">Licores</h5>   
                                </div>
                                <div class=" sup  mb-4">
                                    <h5>SUP-001</h5>
                                </div>
                                <div class="datos mb-1 d-flex flex-column gap-2">
                                    <a href="" class="d-block"><i class="bi bi-person-fill"></i> Maria González</a>
                                    <a href="" class="d-block email"> <i class="bi bi-envelope-fill"></i> contacto@licorespremium.com</a>
                                    <a href="" class="d-block"><i class="bi bi-telephone-fill"></i>+52 8112345678</a>
                                    <a href="" class="d-block direccion" ><i class="bi bi-geo-alt-fill"></i>Calle reforma</a>
                                </div>
                                <div class="botones">
                                    <a href="index.php?c=proveedores&p=EditarProveedores" class="btn btn-edit"><i class="bi bi-pencil"></i>Editar</a>
                                    <a href="" class="btn btn-delete"><i class="bi bi-trash"></i></a>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <h5 class="card-title mb-0">Distibuidora de cerveza del norte</h5>
                                    <h5 class="mb-0 categoria">Cerveza</h5>   
                                </div>
                                <div class=" sup  mb-4">
                                    <h5>SUP-001</h5>
                                </div>
                                <div class="datos mb-1 d-flex flex-column gap-2">
                                    <a href="" class="d-block"><i class="bi bi-person-fill"></i> Juan Pérez</a>
                                    <a href="" class="d-block email"> <i class="bi bi-envelope-fill"></i> ventas@cervecerianorte.com</a>
                                    <a href="" class="d-block"><i class="bi bi-telephone-fill"></i>+52 8112345678</a>
                                    <a href="" class="d-block direccion" ><i class="bi bi-geo-alt-fill"></i>avenida</a>
                                </div>
                                <div class="botones">
                                    <a href="index.php?c=proveedores&p=EditarProveedores" class="btn btn-edit"><i class="bi bi-pencil"></i>Editar</a>
                                    <a href="" class="btn btn-delete"><i class="bi bi-trash"></i></a>

                                </div>
                                
                            </div>
                        </div>
                    </div>















                </div>
            </div>

        </div>





    </div>


    <script>
        const input = document.getElementById('busqueda');
        const cards = document.querySelectorAll('#contenedor-cards .col-12');

        input.addEventListener('input', () => {
            const filtro = input.value.toLowerCase().trim();

            cards.forEach(card => {
                const nombre = card.querySelector('.datos a:first-child').textContent.toLowerCase();
                const email = card.querySelector('.email').textContent.toLowerCase();
                const telefono = card.querySelector('.datos a:nth-child(3)').textContent.toLowerCase();
                const categoria = card.querySelector('.categoria').textContent.toLowerCase();

                if(nombre.includes(filtro) || email.includes(filtro) || telefono.includes(filtro) || categoria.includes(filtro)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>



</section>