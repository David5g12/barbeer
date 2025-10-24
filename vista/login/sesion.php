<link rel="stylesheet" href="vista/css/sesion.css">
<article class="login-article">

  <div class="login-container">
        <div class="login-form-box">  
      
        <h2 class="login-title">Iniciar Sesión</h2>


        <form class="login-form" method="post" action="index.php?c=iniciarSesion&p=iniciarSesion">
            <label for="usuario">Usuario</label>
            <div class="login-input-box">
                <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>
            </div>

            <label for="password">Contraseña</label>
            <div class="login-input-box">
                <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                <span class="login-toggle-password"><i class="fa-solid fa-eye"></i></span>
            </div>

            <button type="submit" class="login-button">Continuar</button>
            <li style="list-style:none; margin-top:12px;">
              <a href="index.php?c=registro&p=registro" style="display:inline-block; padding:10px 16px; background:#2d89ef; color:#fff; border-radius:6px; text-decoration:none; font-weight:600; box-shadow:0 2px 6px rgba(0,0,0,0.15); transition:background .15s ease;">
                Registrarme
              </a>
            </li>
        </form>

        </form>
        </div>
  </div>

  <script>
    const toggle = document.querySelector('.login-toggle-password i');
    const password = document.getElementById('password');

    toggle.addEventListener('click', () => {
      const isVisible = password.type === 'text';
      password.type = isVisible ? 'password' : 'text';
      toggle.className = isVisible ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash';
    });
  </script>
</article>