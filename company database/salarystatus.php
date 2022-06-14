<html>
<head>
<title>Salary Status</title>
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

    <?php 
        $id = $_GET['id'];
        include 'config.php';
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
            <h3 class = "text-center">Salary Status</h3>
            <div class="table-responsive">
                <table class="table table-sm table-condensed">
                    <tbody align=center>
                        <tr>
                            <th scope="col" class="text-center py-2">Base Salary</th>
                            <th scope="col" class="text-center py-2">Bonus</th>
                            <th scope="col" class="text-center py-2">Total Salary</th>
                        </tr>
                        <?php
                            $result = mysqli_query($conn, "SELECT * FROM `salary` WHERE id = $id");
                            while ($employee = mysqli_fetch_assoc($result)) 
                            {
                        ?>
                            <tr> 
                                <td class="py-2"><?php echo $employee['base']; ?></td>
                                <td class="py-2"><?php echo $employee['bonus']."%"; ?></td>
                                <td class="py-2"><?php echo $employee['total']; ?></td>
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