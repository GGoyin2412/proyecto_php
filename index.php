
<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juan Pablo</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <aside class="sidebar">
      <div class="logo">
        <img src="images/logo.jpeg" alt="logo">
        <h2>Juan Pablo</h2>
      </div>
      <ul class="links">
        <h4>Menu</h4>
        <li>
          <span class="material-symbols-outlined">Edit</span>
          <a href="formdin/insertar_registros.php">Registrar Incidente</a>
        </li>
        <hr>
        <h4>Editar</h4>
        <li>
          <span class="material-symbols-outlined">person</span>
          <a href="user/views/user.php">Usuarios</a>
        </li>
        <li>
          <span class="material-symbols-outlined">group</span>
          <a href="alum/views/user.php">Alumnos</a>
        </li>
        <h4>Reportes</h4>
        <li>
        <span class="material-symbols-outlined">list_alt</span>
          <a href="r_user9/views/user.php">Ver Reportes</a>
        </li>
        <hr>
        <h4>Cuenta </h4>
       
        <li class="logout-link">
          <span class="material-symbols-outlined">logout</span>
          <a href="closesesion/cerrarSesion.php">Cerrar Sesion</a>
        </li>
      </ul>
    </aside>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total incidencias</span>
                        <span class="number">50,120</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Comentarios</span>
                        <span class="number">20,120</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total por año</span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>

            <div class="activity">
               
            </div>
        </div>
    </section>

    <script src="script.js"></script>
    
  </body>
</html>