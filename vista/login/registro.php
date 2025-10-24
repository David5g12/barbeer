<link rel="stylesheet" href="vista/css/registro.css">
<article class="registro-body">
  <div class="registro-container">
    <div class="registro-form-box">
      <div class="registro-icon-lock">📝</div>
      <h2 class="registro-title">Crear Cuenta</h2>

      <form class="registro-form" method="post" action="index.php?c=registrarse&p=registrarse">
            <label for="nombre">Nombre</label>
            <div class="registro-input-box">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>

            <label for="email">Correo electrónico</label>
            <div class="registro-input-box">
                <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
            </div>

            <label for="username">Usuario</label>
            <div class="registro-input-box">
                <input type="text" id="username" name="username" placeholder="Nombre de usuario" required>
            </div>

            <label for="password">Contraseña</label>
            <div class="registro-input-box">
                <input type="password" id="password" name="password" placeholder="Crea una contraseña" required>
                <span class="registro-toggle-password"><i class="fa-solid fa-eye"></i></span>
            </div>

            <button type="submit" class="registro-button">Registrarse</button>
        </form>

    </div>
  </div>

  <script>
    const toggle = document.querySelector('.registro-toggle-password i'); 
    const password = document.getElementById('password');

    toggle.addEventListener('click', () => {
      const isVisible = password.type === 'text';
      password.type = isVisible ? 'password' : 'text';
      toggle.className = isVisible ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash';
    });
  </script>

</article>

<?php
require_once("vista/layout/footer.php");
?>