

/*function login() {
    
    var user = document.getElementById('user').value;
    var password = document.getElementById('password').value;
    alert(user);
    $.ajax({
        type:"POST",
        url:"?controller=user&method=ctrIngreso",
        data: {user: user, password: password},
        success:function(r) {
            $('#warning').html(r);
        }
    })
}*/


/*const formLogin = document.getElementById('formLogin');

formLogin.addEventListener('submit', (e) => {
e.preventDefault();
cadena = "user=" + $('#user').val() +
        "&password=" + $('#password').val();
$.ajax({
    type:"POST",
    url:"?controller=User&method=ctrIngreso",
    data: cadena,
    success:function(r) {
        if(r==1) {
            document.getElementById('warning').classList.remove('alert');
            document.getElementById('warning').classList.add('alertActive');
        }
    }
})
/*login();*/
/*document.getElementById('warning').classList.remove('alert');
document.getElementById('warning').classList.add('alertActive');*/


/*})*/


//Validación inicio de sesión
window.onload = function () {
    $('#ingresar').click(function (e) {
        e.preventDefault();
        cadena = "user=" + $('#user').val() +
            "&password=" + $('#password').val();

        $.ajax({
            type: "POST",
            url: "index.php?controller=User&method=ctrIngreso",
            data: cadena,
            success: function (response) {
                console.log(response);
                if (response != 1) {
                    var info = JSON.parse(response);
                    if (info[0].rol_id != 2) {
                        $(location).attr('href', "index.php?controller=User&method=Index");
                    } else {
                        $(location).attr('href', "index.php?controller=user&method=listArchive&id=" + info[0].name);
                    }
                    //console.log(info[0].name);
                    //if(info[0].name)
                } else {
                    document.getElementById('warning').classList.remove('alert');
                    document.getElementById('warning').classList.add('alertActive');
                    document.getElementById('formLogin').reset();
                }
                /*if(response == 2) {
                    var info = JSON.parse(response);
                    //$(location).attr('href', "?controller=user&method=listArchive&id=");
                    //console.log(info);
                    $(location).attr('href', "index.php?controller=user&method=listArchive&id="+info[0].name);
                    console.log($(location));
                } else if (response == 3) {
                    document.getElementById('warning').classList.remove('alert');
                    document.getElementById('warning').classList.add('alertActive');
                } else {
                    console.log(response);
                    $(location).attr('href', "index.php?controller=User&method=Index");
                }
                /*if (r == 1) {
                    console
                    window.location = "views/users/listUser.php";
                }else if (r == 2) {
                    window.location = 'views/users/listUser.php';
                }else {
                    alert("Hola");
                    document.getElementById('warning').classList.remove('alert');
                    document.getElementById('warning').classList.add('alertActive');
                    document.getElementById('user').value = "";
                    document.getElementById('password').value = "";
                    document.getElementById('formLogin').reset();
                }
                //$(location).attr('href', "index.php?controller=User&method=Index");
                //console.log(response);*/
            }
        });
    })
}

//Petición del Area para los cargos
$(document).ready(function () {
    $('#areasList').val(1);
    recargarLista();

    $('#areasList').change(function () {
        recargarLista();
    });
})


//Metodo para cargar los cargos en el select
function recargarLista() {
    $.ajax({
        type: "POST",
        url: "?controller=Charge&method=chargesArea",
        data: "area=" + $('#areasList').val(),
        success: function (r) {
            $('#charge_id').html(r);
        }
    });
}

//funcion para validar campo vacio
function validateItems() {
    var rol_id, sede_id;
    rol_id = $("#rol_id").val();
    sede_id = $("#sede_id").val();
    if (rol_id == "" || sede_id == "") {
        document.getElementById('alertMessage').classList.remove('alertMessage-off');
        document.getElementById('alertMessage').classList.add('alertMessage-on');
    }
    /*$.ajax({
        type: "POST",
        url: "?controller=Computer&method=validateIP",
        data: "ip=" + $('#ip').val(),
        success: function (data) {
            $("#ipValidate").html(data);
        }
    })*/
}
