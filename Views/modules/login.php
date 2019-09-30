<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="description" content="">

   <!-- Bootstrap -->
   <link rel="stylesheet" href="Views/assets/css/bootstrap.min.css">
   <!-- Main css -->
   <link rel="stylesheet" href="Views/assets/css/dashboard.css">
   <link rel="stylesheet" href="Views/assets/css/responsive.css">
   <!-- Fontawesome -->
   <link rel="stylesheet" href="Views/assets/css/fontawesome.min.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
   <main>
      <div class="container">
         <div class="row mt-5 mb-4 login-box">
            <div class="col-md-6 offset-md-3">
               <h1 class="text-secondary text-center">Login</h1>
               <form class="form-section" id="loginform">

                  <div class="alert alert-danger d-none" id="incorrect">Incorrect Email or Password</div>

                  <label for="email" class="text-secondary">Email address</label>
                  <input type="text" name="email" class="form-control" id="email" oninput="checkInput()">
                  <label for="password" class="text-secondary">Password</label>
                  <input type="password" name="password" class="form-control" id="password" oninput="checkInput()">
                  <input type="button" name="login" id="login" class="btn button-white mt-3 col-4" value="Login"
                     disabled>

               </form>
            </div>
         </div>
      </div>
   </main>
   <script type="text/javascript">
   var inputMail = document.getElementById("email");
   var inputPassword = document.getElementById("password");
   var button = document.getElementById("login");

   function checkInput() {
      if (inputMail.value !== "" && inputPassword !== "") {
         button.disabled = false;
      } else {
         button.style.backgroundColor = '#5a6268';
         button.disabled = true;
      }
   }
   </script>

   <script>
   $("#login").click(function() {
      var loginemail = $("#email").val();
      var loginpassword = $("#password").val();

      $.ajax({
         url: 'Ajax/login.php',
         method: "post",
         data: {

            loginemail: loginemail,
            loginpassword: loginpassword
         },
         success: function(results) {
            console.log(results);
            if (results == 0) {
               $("#incorrect").removeClass('d-none');
            } else {
               window.location = "dashboard";

            }
         }
      });
   });
   </script>
   <!-- Jquery,bootstrap scripts -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="Views/assets/js/popper.min.js"></script>
   <script src="Views/assets/js/bootstrap.min.js"></script>
   <script src="Views/assets/js/main.js"></script>
   <!-- Fontawesome -->



</body>

</html>