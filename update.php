<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>CRUD</title>
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CRUD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add.php">ADD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="update.php">UPDATE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="delete.php">DELETE</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <h3>UPDATE Records</h3>

        <div>

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">id</label>
                    <input type="number" class="form-control" id="id" name="id">
                </div>
                <button type="submit" class="btn btn-primary" name="showbtn">Show</button>
            </form>
        </div>
        <?php

        if (isset($_POST['showbtn'])) {

            $conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection error");
            $getid = $_POST['id'];
            $sql = "SELECT * FROM student WHERE sid = '{$getid}'";
            $result = mysqli_query($conn, $sql) or die("Sql query error");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <form action="updatedata.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="hidden" name="id" value="<?php echo $row['sid'] ?>">
                            <input type="name" class="form-control" id="name" name="name" value="<?php echo $row['sname'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="name" class="form-control" id="address" name="address" value="<?php echo $row['saddress'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Class</label>
                            <?php
                            $sql1 = "SELECT * FROM studentclass";
                            $result1 = mysqli_query($conn, $sql1) or die("Sql query error");
                            if (mysqli_num_rows($result1) > 0) {
                                echo '<select name="class"><option disabled>select option</option>';
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    if ($row['sclass'] == $row1['cid']) {
                                        $select = "selected";
                                    } else {
                                        $select = "";
                                    }

                                    echo "<option $select value='{$row1['cid']}'>{$row1['cname']}</option>";
                                }
                                echo "</select>";
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $row['sphone'] ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </form>
    </div>

<?php }
            } else {
                echo "Wrong User ID";
            }
        } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>