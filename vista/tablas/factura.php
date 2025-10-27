<link rel="stylesheet" href="vista/css/factur.css">

<div class="factura">
    <header class="factura-header">
        <div class="empresa-info">
            <img src="vista/img/logotipo.png" alt="Logo de la empresa" class="logo">
            <h2>BarBeer S.A.</h2>
            <p>Zona dorada tuxtla gutiérrez Chiapas</p>
            <p>Tel: (+52) 961-225-44-53</p>
            <p>RFC: EMP123456789</p>
        </div>
        <div class="factura-info">
            <h3>Factura N°: <span>P-001</span></h3>
            <p>Fecha de emisión: 26/10/2025</p>
            <p>Vencimiento: 02/11/2025</p>
        </div>
    </header>

    <section class="cliente-info">
        <h4>Datos del cliente</h4>
        <p><strong>Nombre:</strong> Juan Pérez</p>
        <p><strong>Dirección:</strong> Calle Luna #45, Col. Centro</p>
        <p><strong>RFC:</strong> JUAP890123M89</p>
    </section>

    <section class="detalle">
        <table class="tabla-detalle">
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2</td>
                    <td>Cerveza Corona 355ml</td>
                    <td>$45.00</td>
                    <td>$90.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Botana mixta</td>
                    <td>$35.00</td>
                    <td>$35.00</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="totales">
        <div class="totales-info">
            <p><strong>Subtotal:</strong> $125.00</p>
            <p><strong>IVA (16%):</strong> $20.00</p>
            <h3>Total a pagar: $145.00</h3>
        </div>
    </section>

    <footer class="factura-footer">
        <p>Gracias por su compra</p>
        <p>Factura generada electrónicamente - No requiere firma</p>
    </footer>
</div>
