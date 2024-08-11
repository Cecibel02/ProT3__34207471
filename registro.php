<!-- Registros de pacientes -->
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Registro de Pacientes</h2>
        <div class="form-container">
          <form action="index.php?controller=usuario&action=agregarUsuario" method="post">
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
              <label for="apellido">Apellido:</label>
              <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
              <label for="usuario">Usuario:</label>
              <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="password">Contraseña:</label>
              <input type="password" id="password" name="password" required>
            </div>
            <?php if (isset($error)) { ?>
              <div class="error"><?php echo $error; ?></div>
            <?php } ?>
            <button type="submit">Registrar</button>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <h2>Inicio de Sesión</h2>
        <div class="form-container">
          <form action="index.php?controller=usuario&action=iniciarSesion" method="post">
            <div class="form-group">
              <label for="usuario-login">Usuario:</label>
              <input type="text" id="usuario-login" name="usuario" required>
            </div>
            <div class="form-group">
              <label for="password-login">Contraseña:</label>
              <input type="password" id="password-login" name="password" required>
            </div>
            <?php if (isset($error_login)) { ?>
              <div class="error"><?php echo $error_login; ?></div>
            <?php } ?>
            <button type="submit">Iniciar Sesión</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <style>
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 30px;
    }
    .row {
      display: flex;
      justify-content: space-between;
    }
    .col-md-6 {
      flex: 0 0 48%;
    }
    .form-container {
      background-color: #f1f1f1;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    .error {
      color: red;
      font-weight: bold;
      margin-bottom: 10px;
    }
    button[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
  </style>

  
  
<!-- Validar formmularios  de registros -->
<script>
  document.getElementById('registro-form').addEventListener('submit', function(event) {
      event.preventDefault(); // Evita que el formulario se envíe automáticamente
  
      // Valida los campos del formulario
      var nombre = document.getElementById('nombre').value.trim();
      var apellido = document.getElementById('apellido').value.trim();
      var usuario = document.getElementById('usuario').value.trim();
      var email = document.getElementById('email').value.trim();
      var password = document.getElementById('pass').value.trim();
  
      // Verifica que todos los campos estén completos
      if (nombre === '' || apellido === '' || usuario === '' || email === '' || pass === '') {
          alert('Por favor, complete todos los campos.');
          return;
      }
  
      // Valida el formato del email
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
          alert('Por favor, ingrese un email válido.');
          return;
      }
  
      // Si todo está bien, envía el formulario
      this.submit();
  });
  </script>

  <script>
    document.getElementById('registro-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe automáticamente
    
        // Valida los campos del formulario
        var nombre = document.getElementById('nombre').value.trim();
        var apellido = document.getElementById('apellido').value.trim();
        var usuario = document.getElementById('usuario').value.trim();
        var email = document.getElementById('email').value.trim();
        var pass = document.getElementById('pass').value.trim();
    
        // Verifica que todos los campos estén completos
        if (nombre === '' || apellido === '' || usuario === '' || email === '' || password === '') {
            alert('Por favor, complete todos los campos.');
            return;
        }
    
        // Valida el formato del email
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Por favor, ingrese un email válido.');
            return;
        }
    
        // Si todo está bien, envía el formulario
        this.submit();
    });
    </script>