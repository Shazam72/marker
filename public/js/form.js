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

$('form input').keyup(function(){
    $(this).siblings('.error-msg').text('');
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
            console.log(resp.email);
            if (resp.email) {
                $("form .error-msg.email").html("*" + resp.email[0]);
            }
            if (resp.password) {
                $("form .error-msg.password").html("*" + resp.password[0]);
            }
            if (resp.password_confirmation) {
                $("form .error-msg.password_confirmation").html("*" + resp.password_confirmation[0]);
            }
            if(resp=='unavalaible'){
                swal({
                    title:'Erreur !!!',
                    text:'Les identifiants entrés sont incorrects. Veuillez réessayer s\'il-vous-plaît.',
                    icon:'error',
                    confirm:true,
                })
            } if(resp.links)
                window.location.href=resp.links
            
        });
});
