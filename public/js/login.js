$("#loginform").submit((e) => {
    let params = {
        email: $("#email").val(),
        password: $("#password").val()
    };
    $.ajax({
        url: "/controllers/login.php",
        type: "POST",
        data: JSON.stringify(params),
        dataType: 'json',
        success: (res) => {
            console.log(res);
            let alerta = `
                <div class="card-panel #8bc34a light-green center-align">
                    <span class="white-text">${res.message}</span>
                </div>
                `;
            $("#ajaxres").html(alerta).removeAttr("hidden");
            window.location.replace("/index.php");
        },
        error: (res) => {
            console.log(res);
            let alerta = `
                <div class="card-panel #b71c1c red darken-4 center-align">
                    <span class="white-text">${res.responseJSON.message}</span>
                </div>
                `;
            $("#ajaxres").html(alerta).removeAttr("hidden");
        }
    });

    e.preventDefault();
});
