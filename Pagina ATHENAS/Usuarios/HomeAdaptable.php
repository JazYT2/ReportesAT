<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reportes</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="imagenes/LOGO ICONO.ico">

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
      top: 0; left: 0;
      right: 0; bottom: 0;
      background-color: #ccc;
      border-radius: 24px;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: .4s;
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

    .form-section {
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      max-width: 1000px;
      margin: 0 auto;
    }

    .btn-submit {
      background-color: #007bff;
      color: #fff;
      padding: 10px 25px;
      font-size: 16px;
      font-weight: 500;
      border: none;
      border-radius: 5px;
    }

    .btn-submit:hover {
      background-color: #0056b3;
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

    .overlay {
      position: fixed;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.4);
      z-index: 1049;
      display: none;
    }

    .overlay.active {
      display: block;
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

      .form-section {
        padding: 15px;
      }

      body.sidebar-open {
        overflow: hidden;
      }
    }

    .bg-light-subtle { background-color: #f8f9fc; }
    .form-check { font-size: 0.95rem; }
    .form-label { font-weight: 600; }
    .form-check-input { margin-right: 6px; }
    .checkbox-group { display: flex; flex-wrap: wrap; gap: 0.5rem 1rem; }
    textarea, input, select { font-size: 0.95rem; }
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
    <a href="HomeAdaptable"><i data-lucide="bar-chart-3"></i><span>Reportes</span></a>
    <a href="VerDatos.php"><i data-lucide="folder"></i><span>Lista de reportes</span></a>
    <a href="index.PHP"><i data-lucide="log-out"></i><span>Cerrar sesión</span></a>
  </div>
  <div class="bottom-toggle">
    <label class="switch">
      <input type="checkbox" id="darkModeToggle">
      <span class="slider"></span>
    </label>
  </div>
</div>

<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<div class="main">
  <h2 class="text-center mb-4">REPORTES</h2>
  <div class="form-section">
  <h5 class="form-title">Formulario de Reporte</h5>
  <form method="post" action="guardar.php">
    
    <!-- EMPRESA CONTRATANTE -->
    <div class="mb-4">
      <label class="form-label fw-bold">* Empresa Contratante</label>
      <div class="form-check"><input type="radio" class="form-check-input" name="empresa" value="Corporación Ironven CA" required> Corporación Ironven CA</div>
      <div class="form-check"><input type="radio" class="form-check-input" name="empresa" value="UNECA VZLA SA"> UNECA VZLA SA</div>
      <div class="form-check"><input type="radio" class="form-check-input" name="empresa" value="LA Export Company CA"> LA Export Company CA</div>
      <div class="form-check"><input type="radio" class="form-check-input" name="empresa" value="Utopia Internacional 77 CA"> Utopia Internacional 77 CA</div>
    </div>

    <!-- FECHA -->
    <div class="mb-4">
      <label class="form-label fw-bold">* Fecha</label>
      <input type="date" class="form-control" name="fecha" required>
    </div>

    <!-- TURNO -->
    <div class="mb-4">
      <label class="form-label fw-bold">* Turno</label>
      <div class="form-check"><input type="radio" class="form-check-input" name="turno" value="Diurno" required> Diurno</div>
      <div class="form-check"><input type="radio" class="form-check-input" name="turno" value="Nocturno"> Nocturno</div>
    </div>

    <!-- GUARDIA -->
    <div class="mb-4">
      <label class="form-label fw-bold">* Guardia</label>
      <div class="form-check"><input type="radio" class="form-check-input" name="guardia" value="Guardia A" required> Guardia A</div>
      <div class="form-check"><input type="radio" class="form-check-input" name="guardia" value="Guardia B"> Guardia B</div>
      <div class="form-check"><input type="radio" class="form-check-input" name="guardia" value="Guardia C"> Guardia C</div>
      <div class="form-check"><input type="radio" class="form-check-input" name="guardia" value="Guardia D"> Guardia D</div>
    </div>

    <!-- SUBESTACIONES INSPECCIONADAS -->
    <div class="mb-4">
      <label class="form-label fw-bold">* Subestaciones Inspeccionadas en el turno</label>
      <div class="checkbox-group row">
        <?php
        $subestaciones_inspeccionadas = [14, 15, 16, 17, 18, 19, 20];
        foreach ($subestaciones_inspeccionadas as $s) {
          echo "<div class='col-6 col-md-3'><input type='checkbox' name='sub_inspeccionadas[]' class='form-check-input' value='Sub estación $s'> Sub estación $s</div>";
        }
        ?>
        <div class="col-6 col-md-3"><input type="checkbox" name="sub_inspeccionadas[]" class="form-check-input" value="Otra"> Otra</div>
      </div>
    </div>

    <!-- SUBESTACIÓN DINÁMICA -->
    <?php
    $subestaciones = [14, 15, 16, 17, 18, 19, 20];
    foreach ($subestaciones as $sub) {
    ?>
    <div class="mb-4 p-3 rounded border bg-light-subtle">
      <h6 class="fw-bold mb-2">Subestación <?= $sub ?></h6>
      <label class="form-label mb-1">Temperatura</label>
      <div class="d-flex flex-column flex-md-row gap-2 mb-2">
        <label class="form-check form-check-inline"><input type="radio" class="form-check-input" name="temp_sub<?= $sub ?>" value="Óptima"> Óptima (18-22°C)</label>
        <label class="form-check form-check-inline"><input type="radio" class="form-check-input" name="temp_sub<?= $sub ?>" value="Deficiente"> Deficiente (23-28°C)</label>
        <label class="form-check form-check-inline"><input type="radio" class="form-check-input" name="temp_sub<?= $sub ?>" value="Ambiente"> Ambiente (sin A/A)</label>
      </div>
      <label class="form-label mb-1">Iluminación</label>
      <select class="form-select form-select-sm" name="iluminacion_sub<?= $sub ?>">
        <option selected disabled>Seleccione una opción</option>
        <option>Buena</option>
        <option>Regular</option>
        <option>Mala</option>
      </select>
    </div>
    <?php } ?>

    <!-- ACTIVIDADES -->
    <div class="mb-4">
      <label class="form-label">Actividades Realizadas</label>
      <textarea class="form-control" rows="3" name="actividades" required></textarea>
    </div>

    <!-- OBSERVACIONES / RECOMENDACIONES / HERRAMIENTAS ESPECIALES -->
    <div class="row g-3 mb-4">
      <div class="col-md-4"><label class="form-label">Observaciones</label><textarea class="form-control" rows="2" name="observaciones"></textarea></div>
      <div class="col-md-4"><label class="form-label">Recomendaciones</label><textarea class="form-control" rows="2" name="recomendaciones"></textarea></div>
      <div class="col-md-4"><label class="form-label">Herramientas Especiales</label><input type="text" class="form-control" name="herramientas_especiales"></div>
    </div>

    <!-- MATERIALES -->
    <div class="mb-4">
      <label class="form-label">Materiales y Herramientas</label>
      <div class="checkbox-group row">
        <?php
        $herramientas = [
          "Caja de Herramientas Menores", "Extensión de 25 metros", "Impresora de marcaje",
          "Kit de acondicionador Contrafast", "Multímetro", "Pinza Amperimétrica",
          "Medidor de aislamiento", "Registrador Eléctrico", "Soldadora",
          "Generador de señales", "Laptop con licencia", "Computador de Campo"
        ];
        foreach ($herramientas as $h) {
          echo "<div class='col-6 col-md-4'><label class='form-check'><input type='checkbox' name='materiales[]' class='form-check-input' value='$h'> $h</label></div>";
        }
        ?>
      </div>
    </div>

    <!-- CUADRILLA -->
    <div class="mb-4">
      <label class="form-label">Cuadrilla</label>
      <div class="checkbox-group row">
        <?php
        $cuadrilla = [
          "Técnico Instrumentista", "Técnico Electricista", "Técnico en Automatización",
          "Ingeniero Especialista VCD", "Ingeniero Especialista Comunicaciones",
          "Ingeniero Especialista PLC", "Ingeniero especialista en instrumentación"
        ];
        foreach ($cuadrilla as $c) {
          echo "<div class='col-6 col-md-4'><label class='form-check'><input type='checkbox' name='cuadrilla[]' class='form-check-input' value='$c'> $c</label></div>";
        }
        ?>
      </div>
    </div>

    <!-- BOTÓN -->
    <div class="text-center">
      <button type="submit" class="btn btn-submit">Guardar Reporte</button>
    </div>

  </form>
</div>


<script>
  lucide.createIcons();
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const body = document.body;
    sidebar.classList.toggle('collapsed');
    overlay.classList.toggle('active');
    body.classList.toggle('sidebar-open');
  }
  function closeSidebar() {
    document.getElementById('sidebar').classList.remove('collapsed');
    document.getElementById('overlay').classList.remove('active');
    document.body.classList.remove('sidebar-open');
  }
  document.getElementById('darkModeToggle').addEventListener('change', function () {
    document.body.classList.toggle('dark');
  });
</script>
</body>
</html>
