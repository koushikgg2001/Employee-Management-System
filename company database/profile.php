<html>
<head>
<title>Profile</title>
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
        $result = mysqli_query($conn, "SELECT * from `employee` WHERE id=$id");
        $result2 = mysqli_query($conn , "SELECT total from `salary` WHERE id = '$id'");
        $salary = mysqli_fetch_assoc($result2);
        $empS = ($salary['total']);
        if($result)
        {
            while($res = mysqli_fetch_assoc($result))
            {
                $firstname = $res['firstName'];
                $lastname = $res['lastName'];
                $email = $res['email'];
                $contact = $res['contact'];
                $address = $res['address'];
                $gender = $res['gender'];
                $birthday = $res['birthday'];
                $dept = $res['dept'];
                $degree = $res['degree'];
            }
        }
        if(isset($_POST['send']))
        {
            header("Location: profileupdate.php?id=$id");
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
                        <a class="nav-link" href="eloginwel.php?id=<?php echo $id?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="elogin.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <h3 class = "text-center">Profile</h3>
            <form method="post" class="tabletext">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstName" value="<?php echo $firstname;?>" readonly>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastName" value="<?php echo $lastname;?>" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email;?>" readonly>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="text" class="form-control" name="birthday" value="<?php echo $birthday;?>" readonly>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <input type="text" class="form-control" name="gender" value="<?php echo $gender;?>" readonly>
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="number" class="form-control" name="contact" value="<?php echo $contact;?>" readonly>
                </div>                                
                <div class="form-group">
                        <label>Address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $address;?>" readonly>
                </div>                                
                <div class="form-group">
                        <label>Department</label>
                    <input type="text" class="form-control" name="dept" value="<?php echo $dept;?>" readonly>
                </div>
                <div class="form-group">
                    <label>Degree</label>
                    <input type="text" class="form-control" name="degree" value="<?php echo $degree;?>" readonly>
                </div>
                <div class="form-group">
                    <label>Total Salary</label>
                    <input type="text" class="form-control" name="degree" value="<?php echo $empS;?>" readonly>    
                </div>
                <div class="text-center">
                    <button type="submit" name="send" class="btn">Update Info</button>
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