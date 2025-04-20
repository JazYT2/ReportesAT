<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reportes</title>
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

    .mobile-menu-btn {
      position: fixed;
      top: 1rem;
      left: 1rem;
      z-index: 1100;
      background-color: var(--primary);
      border: none;
      color: white;
      padding: 8px 10px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .table th, .table td {
    vertical-align: middle;
  }

  .table tbody tr:hover {
    background-color: #f0f0f0;
  }

  body.dark .table tbody tr:hover {
    background-color: #2a2a2a;
  }

  .btn-primary {
    background-color: #3b82f6;
    border: none;
  }

  .btn-primary:hover {
    background-color: #2563eb;
  }

  input::placeholder {
    color: #888;
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
  <button class="mobile-menu-btn d-md-none" onclick="toggleSidebar()">
    <i data-lucide="menu"></i>
  </button>

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
    <!-- Contenido principal va aquí -->
    
    <div class="main">
  <h2 class="text-center fw-bold mb-4">LISTA DE REPORTES</h2>

  <div class="search-box mb-4" style="max-width: 500px; margin: 0 auto;">
    <input type="text" class="form-control shadow-sm" id="searchInput" placeholder="🔍 Buscar por ID, nombre o datos..." onkeyup="filtrarTabla()">
  </div>

  <div class="table-responsive">
    <table id="tablaReportes" class="table table-hover align-middle shadow-sm rounded overflow-hidden">
      <thead class="table-dark">
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">Nombre</th>
          <th class="text-start">Datos básicos del reporte</th>
          <th class="text-center">Ver</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">1</td>
          <td class="text-center">Gabriel</td>
          <td>
            <strong>Reporte Diario Respuesta #10592</strong><br>
            <small class="text-muted">Fecha: 15-04-2025 &nbsp; Empresa: Corporación Ironven CA</small>
          </td>
          <td class="text-center">
            <button class="btn btn-primary btn-sm">Ver</button>
          </td>
        </tr>
        <tr>
          <td class="text-center">2</td>
          <td class="text-center">Jonas Liverpool Salvatierra</td>
          <td>
            <strong>Reporte Guardia Nocturna</strong><br>
            <small class="text-muted">Subestaciones: 15, 17 &nbsp; Obser: Correctas</small>
          </td>
          <td class="text-center">
            <button class="btn btn-primary btn-sm">Ver</button>
          </td>
        </tr>
        <tr>
          <td class="text-center">3</td>
          <td class="text-center">Maricel Gomez Fernandez</td>
          <td>
            <strong>Subestaciones: 14, 15, 16</strong><br>
            <small class="text-muted">Turno: Diurno &nbsp; Iluminación: Mala</small>
          </td>
          <td class="text-center">
            <button class="btn btn-primary btn-sm">Ver</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

    

  <script>
    lucide.createIcons();
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      document.body.classList.toggle('sidebar-open');
      sidebar.classList.toggle('collapsed');
    }

    document.getElementById('darkModeToggle').addEventListener('change', function () {
      document.body.classList.toggle('dark');
    });

    function filtrarTabla() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const filas = document.querySelectorAll("#tablaReportes tbody tr");

    filas.forEach(fila => {
      const texto = fila.textContent.toLowerCase();
      fila.style.display = texto.includes(input) ? "" : "none";
    });
  }

  
  </script>
</body>
</html>
