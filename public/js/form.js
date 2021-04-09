//dynamisme formulaire
$("form i").click(function () {
    if ($(this).hasClass("fa-eye")) {
        this.parentNode.querySelector("input").type = "text";
        $(this).removeClass("fa-eye").addClass("fa-eye-slash");
    } else if ($(this).hasClass("fa-eye-slash")) {
        this.parentNode.querySelector("input").type = "password";
        $(this).removeClass("fa-eye-slash").addClass("fa-eye");
    }
});

$("form input").keyup(function () {
    $(this).siblings(".error-msg").text("");
});

$("form").submit(function (e) {
    e.preventDefault();

    let formdata = new FormData(this);
    fetch(this.querySelector("button").dataset.target, {
        method: "POST",
        body: formdata,
    })
        .then((resp) => resp.json())
        .then((resp) => {
            if (resp.nom) {
                $("form .error-msg.nom").html("*" + resp.nom[0]);
            }
            if (resp.prenom) {
                $("form .error-msg.prenom").html("*" + resp.prenom[0]);
            }
            if (resp.role) {
                $("form .error-msg.role").html("*" + resp.role[0]);
            }
            if (resp.date) {
                $("form .error-msg.date").html("*" + resp.date[0]);
            }
            if (resp.email) {
                $("form .error-msg.email").html("*" + resp.email[0]);
            }
            if (resp.password) {
                $("form .error-msg.password").html("*" + resp.password[0]);
            }
            if (resp.password_confirmation) {
                $("form .error-msg.password_confirmation").html(
                    "*" + resp.password_confirmation[0]
                );
            }
            if (resp.tel) {
                $("form .error-msg.tel").html("*" + resp.tel[0]);
            }
            if (resp == "unavalaible") {
                swal({
                    title: "Erreur !!!",
                    text:
                        "Les identifiants entrés sont incorrects. Veuillez réessayer s'il-vous-plaît.",
                    icon: "error",
                    confirm: true,
                });
            }
            if (resp.msg == "saved") {
                swal({
                    title: "Inscription réussie",
                    text:
                        "Vos identifiants ont été enregistrées. Vous pouureez vous vous connecter une fois que vous aurez vérifié votre email",
                    icon: "success",
                    confirm: true,
                }).then((ok) => {
                    window.location.href = resp.link;
                });
                // } else if (resp.msg == "alreadyInDB") {
                //     swal({
                //         title: "Compte déja existant",
                //         text:
                //             "Votre compte existe déja. Veuillez vous connecter afin d'y accéder.",
                //         icon: "info",
                //         confirm: true,
                //     }).then((ok) => {
                //         window.location.href = resp.links;
                //     });
            }
            if (resp.msg == "connected") {
                window.location.href = resp.link;
            }
        });
});
