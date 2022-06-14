<html>
<head>
<title>Leaderboard</title>
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
    <link rel="stylesheet" type="text/css" href="css/table.css">
</head>

<body>

    <div class ="background">

        <nav class="navbar navbar-expand-sm sticky-top navbar-dark">
            <p class="navbar-brand">Employee Management System</p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="salaryemp.php">Salary Table</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Employee</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="addemp.php">Add</a>
                            <a class="dropdown-item" href="viewemp.php">View</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Project</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="assign.php">Assign</a>
                                <a class="dropdown-item" href="status.php">Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="empleave.php">Leave</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alogin.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <h3 class = "text-center">Employee Leaderboard</h3>
            <div class="table-responsive">
                <table class="table table-sm table-condensed">
                    <tbody align=center>
                        <tr>
                            <th scope="col" class="text-center py-2">Seq.</th>
                            <th scope="col" class="text-center py-2">Emp Id</th>
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">Points</th>
                        </tr>
                        <?php
                            include 'config.php';
                            $result = mysqli_query($conn, "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc");
                            $seq = 1;
                            while($employee = mysqli_fetch_array($result))
                            {
                        ?>
                            <tr> 
                                <td class="py-2"><?php echo $seq; ?></td>
                                <td class="py-2"><?php echo $employee['id']; ?></td>
                                <td class="py-2"><?php echo $employee['firstName']." ".$employee['lastName']; ?></td>
                                <td class="py-2"><?php echo $employee['points']; ?> </td>
                            </tr>
                        <?php
                            $seq+=1;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <footer class="text-center fixed-bottom mt-5">
            <div>
                <p>&copy 2020. Koushik G G, Lithish S<br> BIT Bangalore </p>
            </div>
        </footer>

    </div>

</body>
</html>