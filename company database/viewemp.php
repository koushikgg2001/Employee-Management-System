<html>
<head>
<title>View Employees</title>
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
                        <a class="nav-link" href="aloginwel.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alogin.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <h3 class = "text-center">Employee Details</h3>
            <div class="table-responsive">
                <table class="table table-sm table-condensed">
                    <tbody align=center>
                        <tr>
                            <th scope="col" class="text-center py-2">Emp. ID</th>
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">Email</th>
                            <th scope="col" class="text-center py-2">Birthday</th>
                            <th scope="col" class="text-center py-2">Gender</th>
                            <th scope="col" class="text-center py-2">Contact</th>
                            <!-- <th scope="col" class="text-center py-2">NID</th> -->
                            <th scope="col" class="text-center py-2">Address</th>
                            <th scope="col" class="text-center py-2">Department</th>
                            <th scope="col" class="text-center py-2">Degree</th>
                            <th scope="col" class="text-center py-2">Point</th>
                            <th scope="col" class="text-center py-2">Options</th>
                        </tr>
                        <?php
                            include 'config.php';
                            $result = mysqli_query($conn, "SELECT * from `employee` , `rank` WHERE employee.id = rank.eid");
                            while ($employee = mysqli_fetch_assoc($result)) 
                            {
                        ?>
                                <tr> 
                                    <td class="py-2"><?php echo $employee['id']; ?></td>
                                    <td class="py-2"><?php echo $employee['firstName']." ".$employee['lastName']; ?></td>
                                    <td class="py-2"><?php echo $employee['email']; ?></td>
                                    <td class="py-2"><?php echo $employee['birthday']; ?> </td>
                                    <td class="py-2"><?php echo $employee['gender']; ?></td>
                                    <td class="py-2"><?php echo $employee['contact']; ?> </td>
                                    <td class="py-2"><?php echo $employee['address']; ?> </td>
                                    <td class="py-2"><?php echo $employee['dept']; ?></td>
                                    <td class="py-2"><?php echo $employee['degree']; ?> </td>
                                    <td class="py-2"><?php echo $employee['points']; ?> </td>
                                    <td><a href="editemp.php?id= <?php echo $employee['id'] ;?>"> <button type="button" class="btn">Edit</button></a><br>
                                    <a href="process\delete.php?id= <?php echo $employee['id'] ;?>"> <button type="button" class="btn" onClick="return confirm('Are you sure you want to delete?')">Delete</button></a></td>
                                </tr>
                        <?php
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