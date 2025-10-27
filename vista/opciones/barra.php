<link rel="stylesheet" href="vista/css/pedidos.css">

<section>
    <div class="header">
        <?php
        require_once('vista/layout/header.php');
        ?>
    </div>
    <div class="contenido">
        <div class ="encabezado">
            <div class="texto">
                <h2>Lista de pedidos</h2>
                <p>Visualizacion de pedidos</p>
            
            </div>
            
        </div>

        <div class="pedidos">
            <div class="container my-4">
                <div class="row">

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 pedido">
                        <div class="card h-100">
                            <img class="card-img-top img-fluid" src="vista/img/corona.jpg" alt="Card image cap">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0">Cerveza corona</h5>
                                    <h5 class="mb-0 precio">Pedido</h5>
                                </div>
                                                               
                                <p class="card-text">mesa 1</p>
                                <p class="card-text">
                                    Confirmación: 
                                    <select class="estado">
                                        <option value="en preparacion">No enviado</option>
                                        <option value="enviado">Enviado</option>
                                    </select>
                                </p>
                                <a class="btn btn-primary w-100 btn-confirmar" href="#">confirmar</a>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>

        </div>

    </div>

    <div id="notificacion" class="notificacion"></div>

    <script>
        /*pruevas  */
        document.addEventListener("DOMContentLoaded", () => {
            const botones = document.querySelectorAll(".btn-confirmar");
            const notificacion = document.getElementById("notificacion");

            botones.forEach(boton => {
                boton.addEventListener("click", e => {
                    e.preventDefault();

                    const card = boton.closest(".pedido");
                    const select = card.querySelector(".estado");

                    if (select.value.toLowerCase() === "enviado") {
                        // ✅ Confirmación exitosa
                        mostrarNotificacion("Pedido confirmado correctamente ✅", true);
                        // Solo ocultar el pedido
                        card.style.display = "none";
                    } else {
                        // ❌ Error: no enviado
                        mostrarNotificacion("⚠️ No se puede confirmar hasta que esté enviado", false);
                    }
                });
            });

            function mostrarNotificacion(texto, exito = true) {
                notificacion.textContent = texto;
                notificacion.classList.add("mostrar");
                notificacion.style.backgroundColor = exito ? "#28a745" : "#dc3545";
                setTimeout(() => notificacion.classList.remove("mostrar"), 2500);
            }
        });



        /*
        utilizar definitivamente este 
        document.addEventListener("DOMContentLoaded", () => {
            const botones = document.querySelectorAll(".btn-confirmar");
            const notificacion = document.getElementById("notificacion");

            // Ocultar pedidos confirmados previamente
            document.querySelectorAll(".pedido").forEach(card => {
                const id = card.querySelector(".card-title").textContent;
                if (localStorage.getItem("pedido_" + id) === "confirmado") {
                    card.style.display = "none";
                }
            });

            botones.forEach(boton => {
                boton.addEventListener("click", e => {
                    e.preventDefault();

                    const card = boton.closest(".pedido");
                    const select = card.querySelector(".estado");
                    const id = card.querySelector(".card-title").textContent;

                    if (select.value.toLowerCase() === "enviado") {
                        // Confirmación exitosa
                        mostrarNotificacion("Pedido confirmado correctamente ", true);
                        card.style.display = "none";

                        // Guardar en localStorage para que no aparezca después
                        localStorage.setItem("pedido_" + id, "confirmado");
                    } else {
                        // ❌ Error: no enviado
                        mostrarNotificacion("⚠️ No se puede confirmar hasta que esté enviado", false);
                    }
                });
            });

            function mostrarNotificacion(texto, exito = true) {
                notificacion.textContent = texto;
                notificacion.classList.add("mostrar");
                notificacion.style.backgroundColor = exito ? "#28a745" : "#dc3545"; // verde o rojo
                setTimeout(() => notificacion.classList.remove("mostrar"), 2500);
            }
        });*/
        </script>




    
</section>