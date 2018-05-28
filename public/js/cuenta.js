$("#datos").submit((e) => {
    let params = {};
    let error = false;
    if ($("#name").val() != '') {
        params.name = $("#name").val()
    }
    if ($("#lastname").val() != '') {
        params.lastname = $("#lastname").val()
    }
    if ($("#password").val() != '') {
        params.password = $("#password").val()
    }
    if ($("#fechanacimiento").val() != '') {
        if ($('#fechanacimiento').val().match(/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/)) {
            params.fechanacimiento = $("#fechanacimiento").val();
        }
        else {
            error = "Formato de fecha incorrecto";
        }
    }

    if (!error) {
        $.ajax({
            url: "/controllers/user.php",
            type: "PUT",
            data: JSON.stringify(params),
            dataType: 'json',
            success: (res) => {
                let alerta = `
                <div class="card-panel #8bc34a light-green center-align">
                    <span class="white-text">${res.message}</span>
                </div>
                `;
                $("#alertadatos").html(alerta).removeAttr("hidden");
            },
            error: (res) => {
                let alerta = `
                <div class="card-panel #b71c1c red darken-4 center-align">
                    <span class="white-text">${res.responseJSON.message}</span>
                </div>
                `;
                $("#alertadatos").html(alerta).removeAttr("hidden");
            }
        });
    }
    else {
        let alerta = `
                <div class="card-panel #b71c1c red darken-4 center-align">
                    <span class="white-text">${error}</span>
                </div>`;
        $("#alertadatos").html(alerta).removeAttr("hidden");
    }

    e.preventDefault();
});

$("#avatar").submit((e) => {
    let file_data = $('#fileToUpload').prop('files')[0];
    let form_data = new FormData();
    form_data.append('fileToUpload', file_data);
    $.ajax({
        url: 'controllers/uploadAvatar.php',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: (res) => {
                let alerta = `
                <div class="card-panel #8bc34a light-green center-align">
                    <span class="white-text">${res.message}</span>
                </div>
                `;
                $("#alertaavatar").html(alerta).removeAttr("hidden");
                $("#avatarpic").attr("src", `../assets/userAvatars/${res.img}`);
            },
            error: (res) => {
                let alerta = `
                <div class="card-panel #b71c1c red darken-4 center-align">
                    <span class="white-text">${res.responseJSON.message}</span>
                </div>
                `;
                $("#alertaavatar").html(alerta).removeAttr("hidden");
            }
    });
    e.preventDefault();
});
