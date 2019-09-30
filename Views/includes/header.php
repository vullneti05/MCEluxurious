
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="description" content="">
   <meta name="author" content="@Otreks">

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
   <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <?php include("sidebar.php")?>
      <!-- //sidebar -->
      <div id="page-content-wrapper">
         <!-- navbar -->
         <nav class="navbar navbar-expand">
            <img src="Views/assets/images/icons/menu.svg" alt="toggle" id="menu-toggle">

            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 dropdown">
               <a class="nav-link p-0 dropdown-toggle" data-toggle="dropdown" data-target="userDropdown aria"
                  aria-haspopup="true" aria-expanded="false">
                  <span>
                  <span><?php echo $_SESSION['email'] ?></span>
               </a>

               <li class="nav-item dropdown-menu" id="userDropdown">
             <!--      <a href="profile" class="dropdown-item">Profile</a> -->
                  <a href="logout" class="dropdown-item">Logout</a>
               </li>
            </ul>
         </nav>