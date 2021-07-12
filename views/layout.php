<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>    
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <nav>
        <ul id="nav" class="topNav">
            <li><a class="active">Bienvenido</a></li>   
            <li><a href="#" class="icon" onclick="menuResponsive();"><i class="fas fa-bars"></i></a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Sistemas <i class="fas fa-angle-down"></i></a>
                <ul class="dropdown-content opacity">
                    <a href="?controller=User&method=newUser">Nuevo usuario</a>
                    <a href="?controller=Computer&method=newEquipo">Nuevo equipo</a>
                    <a href="?controller=User&method=Index">Lista usuarios</a>
                    <a href="?controller=Computer">Lista equipos</a>
                    <a href="#" id="btnFile">Nuevo archivo</a>
                    <a href="#" id="btnArea">Nueva area</a>
                </ul>
            </li>
            <li><a href="?controller=User&method=listArchiveAdmin&id=Cartera">Cartera</a></li>
            <li><a href="?controller=User&method=listArchiveAdmin&id=Contabilidad">Contabilidad</a></li>
            <li><a href="?controller=User&method=listArchiveAdmin&id=Documentacion">Documentación</a></li>
            <li><a href="?controller=User&method=listArchiveAdmin&id=Administracion">Administración</a></li>
            <li><a href="?controller=User&method=listArchiveAdmin&id=Ventas">Ventas</a></li>
            <li><a href="?controller=User&method=listArchiveAdmin&id=Logistica">Logística</a></li>
            <li><a href="?controller=User&method=listArchiveAdmin&id=Mercadeo">Mercadeo</a></li>
            <li><a href="?controller=User&method=listArchiveAdmin&id=Tesoreria">Tesorería</a></li>
            <li><a href="?controller=User&method=listArchiveAdmin&id=Mostrador">Mostrador</a></li>
            <li class="rightli"><a href="?controller=User&method=close">Cerrar sesión</a></li>
        </ul>
    </nav>
</body>

</html>