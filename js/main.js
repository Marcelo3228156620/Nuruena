
function menuResponsive() {
    var x = document.getElementById("nav");
    if (x.className === "topNav") {
        x.className += " responsive";
    } else {
        x.className = "topNav";
    }
    $(".dropdown .dropbtn").click(function(event) {

        var dropdown = $(this).parents(".dropdown");
        var dropdownContent = $(dropdown).find(".dropdown-content");

        $(".dropdown-content").not($(dropdownContent)).slideUp("slow").addClass("opacity");
        $(".open").not($(dropdown)).removeClass("open");

        $(dropdown).toggleClass("open");
        $(dropdownContent).slideToggle("slow").toggleClass("opacity");
    })
}

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
                if (response != 1) {
                    var info = JSON.parse(response);
                    if (info[0].rol_id != 2) {
                        $(location).attr('href', "index.php?controller=User&method=Index");
                    } else {
                        $(location).attr('href', "index.php?controller=user&method=listArchive&id=" + info[0].name);
                    }
                } else {
                    document.getElementById('warning').classList.remove('alert');
                    document.getElementById('warning').classList.add('alertActive');
                    document.getElementById('formLogin').reset();
                }
            }
        });
    })
}

function validateIP(bool) {
    if (bool) {
        $.ajax({
            type: "POST",
            url: "?controller=Computer&method=validateIP",
            data: "ip=" + $('#ip').val(),
            success: function (data) {
                if (data == 1) {
                    document.getElementById('ipValidate').classList.remove('ipvalidate-off');
                    document.getElementById('ipValidate').classList.add('ipvalidate-on');
                } else {
                    document.getElementById('ipValidate').classList.add('ipvalidate-off');
                    document.getElementById('ipValidate').classList.remove('ipvalidate-on');
                }
            },
            error: function () { }
        });
    } else {
        cadena = "ip=" + $('#ip').val() +
            "&id=" + $('#id').val();
        $.ajax({
            type: "POST",
            url: "?controller=Computer&method=validateIPExc",
            data: cadena,
            success: function (data) {
                if (data == 1) {
                    document.getElementById('ipValidateEdit').classList.remove('ipvalidate-off');
                    document.getElementById('ipValidateEdit').classList.add('ipvalidate-on');
                } else {
                    document.getElementById('ipValidateEdit').classList.add('ipvalidate-off');
                    document.getElementById('ipValidateEdit').classList.remove('ipvalidate-on');
                }
            },
            error: function () { }
        });
    }
}

//Peticion del Area para los cargos en la vista de editarUsuario
$(document).ready(function () {
    $('#areas').change(function () {
        recargarListaEdit();
    });
})

//Metodo para cargar los cargos en el select de editarUsuario
function recargarListaEdit() {
    $.ajax({
        type: "POST",
        url: "?controller=Charge&method=chargesArea",
        data: "area=" + $('#areas').val(),
        success: function (r) {
            $('#charge_id').html(r);
        }
    });
}


$(document).ready(function () {
    $('#sede').change(function () {
        recargarListaSede();
    })
})


function recargarListaSede() {
    $.ajax({
        type: "POST",
        url: "?controller=user&method=userList",
        data: "sede=" + $('#sede').val(),
        success: function (r) {
            var info = JSON.parse(r);
            var html = '';
            var i;
            for (i = 0; i < info.length; i++) {
                html += '<tr>' +
                '<td>' + info[i].name + '</td>' +
                '<td>' + info[i].sede + '</td>' +
                '<td>' + info[i].userSap + '</td>' +
                '<td>' + info[i].charge + '</td>' +
                '<td>' + '<a href="?controller=User&method=edit&id=' + info[i].id + '" class="bc-save">Editar</a>' +
                        '<a href= "?controller=User&method=delete&id='+ info[i].id + '" class="bc-cancel" onclick="return confirm("Esta seguro de eliminar?")">Eliminar</a>' +
                '</tr>';  
            }
            $('#Data').html(html);
        }
    })
}

//funcion para validar campo vacio
function validateItems() {
    var rol_id, sede_id, ext;
    rol_id = $("#rol_id").val();
    sede_id = $("#sede_id").val();
    ext = $("#ext").val();
    if (ext == "" || ext == null) {
        document.getElementById('ext').val(1);
        alert("Hola");
    } else {

    }
    if (sede_id == "" || sede_id == null) {
        document.getElementById('alertMessage').classList.remove('alertMessage-off');
        document.getElementById('alertMessage').classList.add('alertMessage-on');
        return false;
    } else {
        document.getElementById('alertMessage').classList.add('alertMessage-off');
        document.getElementById('alertMessage').classList.remove('alertMessage-on');
    }

    if (rol_id == "" || rol_id == null) {
        document.getElementById('alertMessage1').classList.remove('alertMessage-off');
        document.getElementById('alertMessage1').classList.add('alertMessage-on');
        return false;
    } else {
        document.getElementById('alertMessage1').classList.add('alertMessage-off');
        document.getElementById('alertMessage1').classList.remove('alertMessage-on');
    }
}

//Llamar ventana modal
window.onload = function () {
    var fileModal = document.getElementById("fileModal");
    var areaModal = document.getElementById("areaModal");
    var btnFile = document.getElementById("btnFile");
    var btnArea = document.getElementById("btnArea");
    var span = document.getElementsByClassName("close")[0];
    var span2 = document.getElementsByClassName("close")[1];
    btnFile.onclick = abrirModalFile;
    btnArea.onclick = abrirModalArea;
    function abrirModalFile() {
        var x = document.getElementById("nav");
        x.className = "topNav";
        fileModal.style.display = "block";
    }

    function abrirModalArea() {
        var x = document.getElementById("nav");
        x.className = "topNav";
        areaModal.style.display = "block";
    }

    span.onclick = function () {
        fileModal.style.display = "none";
    }

    span2.onclick = function () {
        areaModal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == fileModal || event.target == areaModal) {
            fileModal.style.display = "none";
            areaModal.style.display = "none";
        }
    }
}
