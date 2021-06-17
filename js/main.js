

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

window.onload = function() {
    $('#ingresar').click(function(e) {
        e.preventDefault();
        cadena = "user=" + $('#user').val() +
            "&password=" + $('#password').val();
            
        $.ajax({
            type: "POST",
            url: "index.php?controller=User&method=ctrIngreso",
            data: cadena,
            success:function(r) {
                if (r == 1) {
                    //alert("Hola");
                    /*header('Location: ?controller=user&method=listArchive&id='.$response[0]->name.'');*/
                    window.location = "views/users/listUser.php";
                }else if (r == 2) {
                    window.location = 'views/users/listUser.php';
                }else {
                    //alert("Hola");
                    document.getElementById('warning').classList.remove('alert');
                    document.getElementById('warning').classList.add('alertActive');
                    /*document.getElementById('user').value = "";
                    document.getElementById('password').value = "";*/
                    document.getElementById('formLogin').reset();
                }
            }
        });
    })
}
