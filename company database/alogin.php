<!DOCTYPE html>

<html>
<head>
    <title>Admin login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Arima+Madurai:wght@200;400&family=Poiret+One&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
</head>

<body>

    <?php
    include 'config.php';
    if(isset($_POST['submit']))
    {
        $email = $_POST['mailuid'];
        $password = $_POST['pwd'];
        if(mysqli_num_rows(mysqli_query($conn, "SELECT * from `alogin` WHERE email = '$email' AND password = '$password'")) == 1)
        {
	        header("Location:aloginwel.php");
        }
        else
        {
	        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Invalid Email or Password')
            window.location.href='javascript:history.go(-1)';
            </SCRIPT>");
        }
    }
    ?>

    <div class ="background">
        <nav class="navbar navbar-expand-sm sticky-top navbar-dark">
            <p class="navbar-brand">Employee Management System</p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="alogin.php">Admin Login</a>
                            <a class="dropdown-item" href="elogin.php">Employee Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container login">
            <h3 class = "text-center">Admin Login</h3>
            <form method="post" class="tabletext" >
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="mailuid" placeholder="Enter Email Address" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pwd" placeholder="Enter Password" required>  
                </div>
                <div class="text-center" >
                    <button class="btn" name="submit" type="submit">Login</button>
                </div>
            </form>  
        </div>

        <footer class="text-center fixed-bottom mt-5">
            <div>
                <p>&copy 2020. Koushik G G, Lithish S<br> BIT Bangalore </p>
            </div>
        </footer>

    </div>

</body>
</html>