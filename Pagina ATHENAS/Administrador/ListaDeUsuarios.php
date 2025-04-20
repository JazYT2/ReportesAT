<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lista de Usuarios</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="icon" href="imagenes/LOGO ICONO.ico" type="image/x-icon" />
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    :root {
      --bg-light: #f4f6fc;
      --bg-dark: #1f1f1f;
      --text-light: #1f1f1f;
      --text-dark: #f4f6fc;
      --primary: #7b4fff;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--bg-light);
      color: var(--text-light);
      display: flex;
      min-height: 100vh;
      transition: background-color 0.3s, color 0.3s;
    }

    body.dark {
      background-color: var(--bg-dark);
      color: var(--text-dark);
    }

    .sidebar {
      width: 80px;
      background-color: white;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 1rem 0;
      box-shadow: 2px 0 5px rgba(0,0,0,0.05);
      transition: width 0.3s;
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      z-index: 1000;
    }

    body.dark .sidebar {
      background-color: #121212;
    }

    .sidebar.collapsed {
      width: 220px;
    }

    .top-section {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 1rem;
    }

    .logo {
      background-color: var(--primary);
      color: #fff;
      padding: 0.5rem 0.8rem;
      border-radius: 10px;
      font-weight: bold;
      font-size: 1.2rem;
    }

    .toggle-btn {
      background: transparent;
      border: none;
      cursor: pointer;
      color: #555;
      transform: rotate(180deg);
    }

    .sidebar.collapsed .toggle-btn {
      transform: rotate(0deg);
    }

    .nav-links {
      margin-top: 2rem;
      display: flex;
      flex-direction: column;
      gap: 1rem;
      padding: 0 1rem;
    }

    .nav-links a {
      display: flex;
      align-items: center;
      gap: 1rem;
      text-decoration: none;
      color: inherit;
      padding: 0.5rem;
      border-radius: 10px;
      transition: background 0.2s;
    }

    .nav-links a:hover {
      background-color: #f0f0f0;
    }

    body.dark .nav-links a:hover {
      background-color: #2a2a2a;
    }

    .nav-links span {
      display: none;
    }

    .sidebar.collapsed .nav-links span {
      display: inline;
    }

    .bottom-toggle {
      padding: 1rem;
      display: flex;
      justify-content: center;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 42px;
      height: 24px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      border-radius: 24px;
      transition: 0.4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: 0.4s;
      border-radius: 50%;
    }

    input:checked + .slider {
      background-color: var(--primary);
    }

    input:checked + .slider:before {
      transform: translateX(18px);
    }

    .main {
      margin-left: 80px;
      flex-grow: 1;
      padding: 2rem;
      transition: margin-left 0.3s;
      width: 100%;
    }

    .sidebar.collapsed ~ .main {
      margin-left: 220px;
    }

    h2 {
      text-align: center;
      font-weight: 800;
      font-family: 'Impact', sans-serif;
      margin-bottom: 2rem;
    }

    table {
      width: 100%;
      background-color: white;
      border-collapse: collapse;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    thead {
      background-color: #1f1f1f;
      color: white;
    }

    th, td {
      padding: 1rem;
      text-align: center;
      vertical-align: middle;
    }

    tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .btn-editar {
      background-color: #28a745;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 5px;
    }

    .btn-eliminar {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 5px;
    }

    .btn-salir {
      margin-top: 2rem;
      background-color: #dc3545;
      color: white;
      padding: 0.7rem 2rem;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .form-switch {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-check-input {
      transform: scale(1.2);
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: fixed;
        top: 0;
        left: -100%;
        width: 220px;
        height: 100%;
        transition: left 0.3s ease;
        z-index: 1050;
        box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
      }

      .sidebar.collapsed {
        left: 0;
      }

      .main {
        margin-left: 0 !important;
        padding: 1rem;
      }

      body.sidebar-open {
        overflow: hidden;
      }
    }
  </style>
</head>
<body>

  <button class="mobile-menu-btn d-md-none" onclick="toggleSidebar()"><i data-lucide="menu"></i></button>

  <div class="sidebar" id="sidebar">
    <div class="top-section">
      <div class="logo">AT</div>
      <button class="toggle-btn d-none d-md-block" onclick="toggleSidebar()">
        <i data-lucide="chevron-right"></i>
      </button>
    </div>
    <div class="nav-links">
    <a href="Inicio.php"><i data-lucide="home"></i><span>Inicio</span></a>
    <a href="HomeAdaptable.php"><i data-lucide="bar-chart-3"></i><span>Reportes</span></a>
    <a href="VerDatos.php"><i data-lucide="folder"></i><span>Mis Registros</span></a>
    <a href="RegistrarUsuarios.php"><i data-lucide="user"></i><span>Perfil</span></a>
    <a href="ListaDeUsuarios.php"><i data-lucide="user"></i><span>Lista Usuarios</span></a>
    <a href="index.php"><i data-lucide="log-out"></i><span>Cerrar sesión</span></a>
    </div>
    <div class="bottom-toggle">
      <label class="switch">
        <input type="checkbox" id="darkModeToggle" />
        <span class="slider"></span>
      </label>
    </div>
  </div>

  <div class="main">
    <h2>LISTA DE USUARIOS</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Usuario</th>
          <th>Contraseña</th>
          <th>id_rol</th>
          <th>Estado</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Gabriel</td>
          <td>Gabriel</td>
          <td>12345</td>
          <td>1</td>
          <td><div class="form-switch"><input class="form-check-input" type="checkbox" checked></div></td>
          <td><button class="btn-editar">Editar</button></td>
          <td><button class="btn-eliminar">Eliminar</button></td>
        </tr>
        <tr>
          <td>2</td>
          <td>Jonas Liverpool Salvatierra</td>
          <td>Jonas</td>
          <td>123</td>
          <td>2</td>
          <td><div class="form-switch"><input class="form-check-input" type="checkbox" checked></div></td>
          <td><button class="btn-editar">Editar</button></td>
          <td><button class="btn-eliminar">Eliminar</button></td>
        </tr>
        <tr>
          <td>3</td>
          <td>Maricel Gomez Fernandez</td>
          <td>Maricel</td>
          <td>maricel</td>
          <td>2</td>
          <td><div class="form-switch"><input class="form-check-input" type="checkbox"></div></td>
          <td><button class="btn-editar">Editar</button></td>
          <td><button class="btn-eliminar">Eliminar</button></td>
        </tr>
        <tr>
          <td>4</td>
          <td>Gerardo Arias Camboa</td>
          <td>Gerardo</td>
          <td>Gerardo123</td>
          <td>2</td>
          <td><div class="form-switch"><input class="form-check-input" type="checkbox" checked></div></td>
          <td><button class="btn-editar">Editar</button></td>
          <td><button class="btn-eliminar">Eliminar</button></td>
        </tr>
      </tbody>
    </table>

    <button class="btn-salir">Cerrar Sesión</button>
  </div>

  <script>
    lucide.createIcons();
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('collapsed');
      document.body.classList.toggle('sidebar-open');
    }

    document.getElementById('darkModeToggle').addEventListener('change', function () {
      document.body.classList.toggle('dark');
    });
  </script>

</body>
</html>
