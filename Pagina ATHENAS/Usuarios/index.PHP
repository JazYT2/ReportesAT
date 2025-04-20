<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE REPORTES - ATHENAS C.A</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="Inicio.php" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico">
                        <input type="password" placeholder="Contraseña">
                        
                        <button >Entrar</button>
                        
                    </form>

                    <!--Register-->
                    <form action="" class="formulario__register">
                        <h2>Póngase en contacto con nosotros: soporte técnico de Athenas C.A</h2>
                        <input type="email" name="correo" value="ejemplo@gmail.com" readonly>
                        <input type="tel" name="telefono" value="+58 12345678910" readonly>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=soporte@athenasca.com&su=Solicitud%20de%20soporte%20técnico&body=Hola,%20quisiera%20ponerme%20en%20contacto%20con%20el%20soporte%20técnico%20de%20Athenas%20C.A.%20Adjunto%20mis%20datos%20para%20la%20verificación:%0A%0A-%20Nombre%20completo:%0A-%20Número%20de%20teléfono:%0A-%20Correo%20electrónico:%0A-%20Foto%20de%20la%20cédula%20(de%20frente%20y%20reverso):%0A%0AGracias%20de%20antemano." target="_blank">
                            <button type="button">Contactar</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>