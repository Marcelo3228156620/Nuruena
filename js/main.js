function login() {
    $.ajax({
        type:"POST",
        url:"?controller=user&method=ctrIngreso",
        data:"user=" + $('#user').val(),
        success:function(r) {
            $('#warning').html(r);
        }
    });
}