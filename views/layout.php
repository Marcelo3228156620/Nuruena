<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <?php
        include "index.php";
    ?>
    <nav>
        <ul id="nav" class="topNav">
            <li><a class="active">Bienvenido</a></li>
            <!--<li><div class="active"><img src="img/logo_nuruena_min.png" alt="Logo" title="Nurueña"></div></li>-->
            <li><a href="#" class="icon" onclick="menuResponsive();">M</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Sistemas <i class="fas fa-angle-down"></i></a>
                <ul class="dropdown-content opacity">
                    <a href="?controller=User&method=newUser">Nuevo usuario</a>
                    <a href="?controller=Computer&method=newEquipo">Nuevo equipo</a>
                    <a href="?controller=User&method=Index">Lista usuarios</a>
                    <a href="?controller=Computer">Lista equipos</a>
                    <a href="#" id="btnModal">Nuevo archivo</a>
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
    <script>
        //Abrir y cerrar submenu
        if (innerWidth <= 600) {
            $(".dropdown .dropbtn").click(function (event) {

                var dropdown = $(this).parents(".dropdown");
                var dropdownContent = $(dropdown).find(".dropdown-content");

                $(".dropdown-content").not($(dropdownContent)).slideUp("slow").addClass("opacity");
                $(".open").not($(dropdown)).removeClass("open");

                $(dropdown).toggleClass("open");
                $(dropdownContent).slideToggle("slow").toggleClass("opacity");
            })
        }
    </script>
</body>
</html>