<html>
<head>
<title>Add Employee</title>
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
        $firstname = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $dept = $_POST['dept'];
        $degree = $_POST['degree'];
        $salary = $_POST['salary'];
        $birthday =$_POST['birthday'];
        $result = mysqli_query($conn, "INSERT INTO `employee`(`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `address`, `dept`, `degree`) VALUES ('','$firstname','$lastName','$email','1234','$birthday','$gender','$contact','$address','$dept','$degree')");
        $last_id = $conn->insert_id;
        $salaryQ = mysqli_query($conn, "INSERT INTO `salary`(`id`, `base`, `bonus`, `total`) VALUES ('$last_id','$salary',0,'$salary')");
        $rank = mysqli_query($conn, "INSERT INTO `rank`(`eid`) VALUES ('$last_id')");
        if(($result) == 1)
        {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Succesfully Registered')
            window.location.href='viewemp.php';
            </SCRIPT>");
        }
        else
        {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Failed to Register')
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
                        <a class="nav-link" href="aloginwel.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alogin.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
            <h3 class = "text-center">Add Employee</h3>
            <form method="post" class="tabletext">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="jon" name="firstName" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="snow" name="lastName">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="example@gmail.com" name="email" required>
                </div>
                <div class="form-group">
                    <label>Birthdate</label>
                    <input type="date" class="form-control" name="birthday" required>
                </div>
                <div class="rs-select2 js-select-simple select--no-search form-group">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                        <option hidden selected>-Select-</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="select-dropdown"></div>
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input class="form-control" type="number" placeholder="1234567890" name="contact" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" type="text" placeholder="No 123, Srinagar, Bangalore" name="address" required>
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <input class="form-control" type="text" placeholder="IT" name="dept" required="required">
                </div>
                <div class="form-group">
                    <label>Degree</label>
                    <input class="form-control" type="text" placeholder="B.Tech" name="degree" required="required">
                </div>
                <div class="form-group">
                    <label>Salary</label>
                    <input class="form-control" type="number" placeholder="50000" name="salary">
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn">Submit</button>
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