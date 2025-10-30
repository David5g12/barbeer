<link rel="stylesheet" href="vista/css/productos.css">

<section>
    <button id="toggleHeaderBtn" class="btn-toggle">Ocultar panel</button>
    <div class="header" id="header">
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
                        <th scope="col">Precio compra</th>
                        <th scope="col">Precio venta</th>
                        <th scope="col">Stock></th>
                        <th scope="col">Stock-min</th>
                        <th scope="col">acl-vol</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Editar&Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos as $valor):?>
                        <tr>
                            <td><?= $valor['producto_id']?></td>
                            <td><?= $valor['nombre']?> </td>
                            <td><?= $valor['categoria']?></td>
                            <td><?= $valor['tipo']?></td>
                            <td><?= $valor['descripcion']?></td>
                            <td><i class="bi bi-currency-dollar"></i><?= $valor['precio_compra']?></td>
                            <td><i class="bi bi-currency-dollar"></i><?= $valor['precio_venta']?></td>
                            <td><?= $valor['stock_unidades']?></td>
                             <td><?= $valor['stock_minimo']?></td>
                            <td><?= $valor['alc_vol']?><i class="bi bi-percent"></i></td>
                            <td><?= $valor['img']?></td>
                            <td>
                                <div class="btn-delac">
                                    <a class="editar btn  btn-sm" href="index.php?c=compras&p=EditarProducto&id=<?= $valor['producto_id'] ?>"><i class="bi bi-pencil"></i>Actualizar</a>
                                    <a class="delete btn  btn-sm" href="index.php?c=compras&p=EliminarProductos&id=<?= $valor['producto_id']?>"><i class="bi bi-trash"></i>Eliminar</a>

                                </div>
                                
                            </td>
                        </tr>
                    <?php endforeach?>

                </tbody>
            </table>
        </div>






    </div>

    <script>
        const toggleBtn = document.getElementById("toggleHeaderBtn");
        const header = document.getElementById("header");
        const contenido = document.querySelector(".contenido");

        toggleBtn.addEventListener("click", () => {
            if (header.classList.contains("oculto")) {
                header.classList.remove("oculto");
                contenido.style.width = "84%";
                toggleBtn.textContent = "Ocultar panel";
            } else {
                header.classList.add("oculto");
                contenido.style.width = "98%";
                toggleBtn.textContent = "Mostrar panel";
            }
        });
    </script>




</section>