<link rel="stylesheet" href="vista/css/productos.css">

<section>
    <div class="header">
        <?php
        require_once('vista/layout/header.php');
        ?>
    </div>
    <div class="contenido">
        <div class="encabezado">

            <div class="texto">
                <h1>Productos</h1>
            </div>
            <div class="boton">
                <a href="index.php?c=compras&p=AgregarProducto" class="btn btn-primary">Agregar producto</a>
            </div>
                        
        </div>

        <div class="tabla">
            <table class= "table"> 
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock></th>
                        <th scope="col">Stock-min</th>
                        <th scope="col">acl-vol</th>
                        <th scope="col">Imagen</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>11</td>
                        <td>red label</td>
                        <td>Destilado</td>
                        <td>Whisky</td>
                        <td>Iataliana</td>
                        <td>$ 490</td>
                        <td>50</td>
                        <td>10</td>
                        <td>10%vol</td>
                        <td>img</td>
                        <td>
                            <a class="editar btn btn-warning btn-sm" href="index.php?c=compras&p=EditarProducto"><i class="bi bi-pencil"></i>Actualizar</a>
                            <a class="delete btn btn-danger btn-sm" href="#"><i class="bi bi-trash"></i>Eliminar</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>






    </div>



</section>