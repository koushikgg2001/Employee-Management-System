<html>
<head>
<title>Assign Project</title>
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
        if(isset($_POST['assign']))
        {
            $pname = $_POST['pname'];
            $eid = $_POST['eid'];
            $subdate = $_POST['duedate'];
            $result = mysqli_query($conn, "INSERT INTO `project`(`eid`, `pname`, `duedate` , `status`) VALUES ('$eid' , '$pname' , '$subdate' , 'Due')");
            if(($result) == 1)
            {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Assigned Succesfully')
                window.location.href='aloginwel.php';
                </SCRIPT>");
            }
            else
            {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Failed to Assign')
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
            <h3 class = "text-center">Assign Project</h3>
            <form method="post" class="tabletext">
                <div class="form-group">
                    <label>Employee ID</label>
                    <input type="text" class="form-control" placeholder="6" name="eid" required>
                </div>
                <div class="form-group">
                    <label>Project Name</label>
                    <input type="text" class="form-control" placeholder="Employee Management System" name="pname" required>        
                </div>
                <div class="form-group">
                    <label>Due Date</label>
                    <input type="date" class="form-control" name="duedate" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="assign" class="btn">Assign</button>
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