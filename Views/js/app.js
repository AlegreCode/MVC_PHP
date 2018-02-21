$(function() {
    $("#form_sesion").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "script/inicio_sesion.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.estado) {
                    $("body").overhang({
                        type: "success",
                        message: "Bienvenido " + response.nombre + "! Redireccionando al panel...",
                        callback: function() {
                            window.location.href = "/usuario/panel";
                        }
                    });
                } else {
                    $("body").overhang({
                        type: "error",
                        message: "Error al iniciar sesión."
                    });
                }
            }
        });

    });

    $("#form_registro").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "script/registro.php",
            data: $(this).serialize(),
            success: function(response) {
                if (response) {
                    $("body").overhang({
                        type: "success",
                        message: "El usuario se ha registrado con exito!",
                        callback: function() {
                            window.location.href = "/";
                        }
                    });
                } else {
                    $("body").overhang({
                        type: "error",
                        message: "El usuario no se ha podido registrar"
                    });
                }
            }
        });
    });

    $("#logout").on("click", function(e) {
        e.preventDefault();
        var sesion = $("#logout").data();
        $.ajax({
            type: "GET",
            url: "usuario/logout/",
            data: sesion,
            dataType: "json",
            beforeSend: function(response) {
                $("body").overhang({
                    type: "success",
                    message: "Has cerrado sesión, vuelve pronto!"
                });
            },
            success: function(response) {
                if (response.estado) {
                    window.location.href = "/";
                }
            }
        });
    });

    $("#form_editarPerfil").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "script/editar_perfil.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.estado) {
                    $("body").overhang({
                        type: "success",
                        message: "Se ha actualizado su perfil con éxito! Redireccionando...",
                        callback: function() {
                            window.location.href = "usuario/panel";
                        }
                    });
                }
            }
        });
    });

    $("#form_actualizar").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "script/actualizar_usuario.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.estado) {
                    $("body").overhang({
                        type: "success",
                        message: "Se ha actualizado los datos del usuario con éxito! Redireccionando...",
                        callback: function() {
                            window.location.href = "usuario/listar";
                        }
                    });
                }
            }
        });
    });

    $(".user_delete").on("click", function(e) {
        var id = $(this).data();
        var datos = new FormData();
        datos.append("id", id.userid);

        $.ajax({
            method: "POST",
            url: "script/delete_usuario.php",
            data: datos,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.estado) {
                    $("body").overhang({
                        type: "success",
                        message: "Se ha borrado los datos del usuario con éxito! Redireccionando...",
                        callback: function() {
                            window.location.href = "usuario/listar";
                        }
                    });
                }
            }
        });

    });
});