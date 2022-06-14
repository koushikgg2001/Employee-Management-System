<html>
<head>
<title>Profile Update</title>
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
        $id = $_GET['id'];
        if(isset($_POST['update']))
        {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $result = mysqli_query($conn, "UPDATE `employee` SET `email`='$email',`contact`='$contact',`address`='$address' WHERE id=$id");
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Succesfully Updated')
                window.location.href='profile.php?id=$id  ';
                </SCRIPT>");
        }
        $result = mysqli_query($conn, "SELECT * from `employee` WHERE id=$id");
        if($result)
        {
            while($res = mysqli_fetch_assoc($result))
            {
                $email = $res['email'];
                $contact = $res['contact'];
                $address = $res['address'];
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
                        <a class="nav-link" href="profile.php?id=<?php echo $id?>">Back</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eloginwel.php?id=<?php echo $id?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="elogin.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <h3 class = "text-center">Profile Update</h3>
            <form method="post" class="tabletext">
            <div class="form-group">
            <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email;?>" required>
                </div>
                <div class="form-group">
            <label>Contact</label>
                    <input type="number" class="form-control" name="contact" value="<?php echo $contact;?>" required>
                </div>
                <div class="form-group">
            <label>Address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $address;?>" required>
                </div>
            <div class="text-center">
                <button type="submit" name="update" class="btn">Update</button>
            </div>          
        </form>

        <footer class="text-center fixed-bottom mt-5">
            <div>
                <p>&copy 2020. Koushik G G, Lithish S<br> BIT Bangalore </p>
            </div>
        </footer>

    </div>

</div>
</body>
</html>