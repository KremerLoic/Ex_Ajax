$(document).ready(function() {
      $('#submit').hide();
      var login, password, passwordConfirm, loginOk = false,
        passOk = false;

      $('#login').on('keyup', function() {
        login = $(this).val();
        console.log(login);
        $.ajax({
          url: "request.php",
          type: "GET",
          dataType: "json",
          data: {
            login: login
          },
          success: function(result) {
            if (typeof result === "object") {
              $('p.statusLogin').text("Le nom d'utilisateur existe déjà.");
              loginOk = false;
            } else {
              $('p.statusLogin').text("Le nom d'utilisateur est libre");
              loginOk = true;
            }
          }

        })

      })

      $('#password').on('keyup', function() {
        password = $(this).val()
        console.log(password);
      })


      $('#passwordConfirm').on('keyup', function() {
        passwordConfirm = $(this).val();
        console.log(passwordConfirm);
        $.ajax({
          url: "request.php",
          type: "GET",
          dataType: "JSON",
          data: {
            password: password,
            passwordConfirm: passwordConfirm
          },
          success: function(result) {
            if (result === true) {
              $('p.statusPasswordConfirm').text("Les mots de passes sont identiques");
              passOk = true;
            } else {
              $('p.statusPasswordConfirm').text("Les mots de passes ne sont pas identiques");
              passOk = false;
            }
          }
        })
      })


      $('input').on('blur', function() {
        if (passOk == true && loginOk == true) {
          $('#submit').show();
        }
      })




});
