<html>
<head>
<title>Employee Leave</title>
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

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
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
            <h3 class = "text-center">Leave Status</h3>
            <div class="table-responsive">
                <table class="table table-sm table-condensed">
                    <tbody align=center>
                        <tr>
                            <th scope="col" class="text-center py-2">Emp. ID</th>
                            <th scope="col" class="text-center py-2">Token</th>
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">Start Date</th>
                            <th scope="col" class="text-center py-2">End Date</th>
                            <th scope="col" class="text-center py-2">Total Days</th>
                            <th scope="col" class="text-center py-2">Reason</th>
                            <th scope="col" class="text-center py-2">Status</th>
                            <th scope="col" class="text-center py-2">Options</th>
                        </tr>
                        <?php
                            include 'config.php';
                            $result = mysqli_query($conn, "Select employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status, employee_leave.token From employee, employee_leave Where employee.id = employee_leave.id order by employee_leave.token");
                            while ($employee = mysqli_fetch_assoc($result)) 
                            {
                                $date1 = new DateTime($employee['start']);
                                $date2 = new DateTime($employee['end']);
                                $interval = $date1->diff($date2);
                        ?>
                            <tr> 
                                <td class="py-2"><?php echo $employee['id']; ?></td>
                                <td class="py-2"><?php echo $employee['token']; ?></td>
                                <td class="py-2"><?php echo $employee['firstName']." ".$employee['lastName']; ?></td>
                                <td class="py-2"><?php echo $employee['start']; ?></td>
                                <td class="py-2"><?php echo $employee['end']; ?> </td>
                                <td class="py-2"><?php echo $interval->days; ?></td>
                                <td class="py-2"><?php echo $employee['reason']; ?> </td>
                                <td class="py-2"><?php echo $employee['status']; ?></td>
                                <td><a href="process\approve.php?id= <?php echo $employee['id'] ;?>&token=<?php echo $employee['token'];?>"> <button type="button" class="btn btn-info" onClick="return confirm('Are you sure you want to Approve the request?')">Confirm</button></a>
                                    <a href="process\cancel.php?id= <?php echo $employee['id'] ;?>&token=<?php echo $employee['token'];?>"> <button type="button" class="btn btn-info" onClick="return confirm('Are you sure you want to Cancel the request?')">Cancel</button></a></td>
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