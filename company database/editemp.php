<html>
<head>
<title>Edit Employee</title>
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
        if(isset($_POST['update']))
        {
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
            $lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $dept = mysqli_real_escape_string($conn, $_POST['dept']);
            $degree = mysqli_real_escape_string($conn, $_POST['degree']);
            $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`birthday`='$birthday',`gender`='$gender',`contact`='$contact',`nid`='$nid',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Succesfully Updated')
                window.location.href='viewemp.php';
                </SCRIPT>");
        }
        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * from `employee` WHERE id=$id");
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
                        <a class="nav-link" href="viewemp.php">Back</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aloginwel.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alogin.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <h3 class = "text-center">Edit Employee Details</h3>
            <form method="post" class="tabletext">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="jon" value="<?php echo $firstname;?>" name="firstName" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="snow" value="<?php echo $lastname;?>" name="lastName" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="example@gmail.com" value="<?php echo $email;?>" name="email" required>
                </div>
                <div class="form-group">
                    <label>Birthdate</label>
                    <input type="date" class="form-control" value="<?php echo $birthday;?>" name="birthday" required>
                </div>
                <div class="rs-select2 js-select-simple select--no-search form-group">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                        <option selected hidden><?php echo $gender;?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="select-dropdown"></div>
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input class="form-control" type="number" placeholder="1234567890" value="<?php echo $contact;?>" name="contact" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" type="text" placeholder="No 123, Srinagar, Bangalore" value="<?php echo $address;?>" name="address" required>
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <input class="form-control" type="text" placeholder="IT" value="<?php echo $dept;?>" name="dept" required="required">
                </div>
                <div class="form-group">
                    <label>Degree</label>
                    <input class="form-control" type="text" placeholder="B.Tech" value="<?php echo $degree;?>"name="degree" required="required">
                </div>
                <div class="form-group">
                    <label>Salary</label>
                    <input class="form-control" type="number" placeholder="50000" name="salary">
                </div>
                <div class="text-center">
                    <button type="submit" name="update" class="btn">Submit</button>
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