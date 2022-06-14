<html>
<head>
<title>Assign Mark</title>
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
        $pid = $_GET['pid'];
        $result = mysqli_query($conn, "SELECT pid, project.eid, pname, duedate, subdate, mark, points, firstName, lastName, base, bonus, total FROM `project` , `rank` ,`employee`, `salary`  WHERE project.eid = $id AND pid = $pid");
        if(isset($_POST['update']))
        {
            $eid = mysqli_real_escape_string($conn, $_POST['eid']);
            $pid = mysqli_real_escape_string($conn, $_POST['pid']);      
            $mark = mysqli_real_escape_string($conn, $_POST['mark']);
            $points = mysqli_real_escape_string($conn, $_POST['points']);
            $base = mysqli_real_escape_string($conn, $_POST['base']);
            $bonus = mysqli_real_escape_string($conn, $_POST['bonus']);
            $total = mysqli_real_escape_string($conn, $_POST['total']);

            $upPoint = $points + $mark;
            $upBonus = $bonus + $mark;
            $upSalary = $base + ($upBonus*$base)/100; 
            echo "$upBonus";
            echo "string";
            echo "$upSalary";
    
            $result = mysqli_query($conn, "UPDATE `project` SET `mark`='$mark' WHERE eid=$eid and pid = $pid");
            $result = mysqli_query($conn, "UPDATE `rank` SET `points`='$upPoint' WHERE eid=$eid");
            $result = mysqli_query($conn, "UPDATE `salary` SET `bonus`='$upBonus' ,`total`='$upSalary' WHERE id=$eid");

            echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='status.php';
                </SCRIPT>");
        }
        $result1 = mysqli_query($conn, "SELECT pid, project.eid, project.pname, project.duedate, project.subdate, project.mark, rank.points, employee.firstName, employee.lastName, salary.base, salary.bonus, salary.total FROM `project` , `rank` ,`employee`, `salary`  WHERE project.eid = $id AND project.pid = $pid AND project.eid = rank.eid AND salary.id = project.eid AND employee.id = project.eid AND employee.id = rank.eid");
        if($result1)
        {
            while($res = mysqli_fetch_assoc($result1))
            {
                $pname = $res['pname'];
                $duedate = $res['duedate'];
                $subdate = $res['subdate'];
                $firstName = $res['firstName'];
                $lastName = $res['lastName'];
                $mark = $res['mark'];
                $points = $res['points'];
                $base = $res['base'];
                $bonus = $res['bonus'];
                $total = $res['total'];
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
                        <a class="nav-link" href="status.php">Back</a>
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
            <h3 class = "text-center heading">Assign Mark</h3>
            <form method="post" class="tabletext">
                <div class="form-group">
                    <label>Project Name</label>
                    <input class="form-control" type="text" name="pname" value="<?php echo $pname;?>" readonly>
                </div>
                <div class="form-group">
                    <label>Mark</label>
                    <input type="number" class="form-control" name="mark" value="<?php echo $mark;?>" required>
                </div>
                <input type="hidden" name="eid" value="<?php echo $id;?>" required="required">
                <input type="hidden" name="pid" value="<?php echo $pid;?>" required="required">
                <input type="hidden" name="points" id="textField" value="<?php echo $points;?>" required="required">
                <input type="hidden" name="base" id="textField" value="<?php echo $base;?>" required="required">
                <input type="hidden" name="bonus" id="textField" value="<?php echo $bonus;?>" required="required">
                <input type="hidden" name="total" id="textField" value="<?php echo $total;?>" required="required">
                <div class="text-center">
                    <button type="submit" name="update" class="btn">Assign Mark</button>
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