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

        <h3>Add New Records</h3>
        <form action="savedata.php" method="post">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="name" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
                <label class="form-label">Class</label>

                <select name="class">
                    <option value="selected disabled">select options</option>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection error");
                    $sql = "SELECT * FROM studentclass";
                    $result = mysqli_query($conn, $sql) or die("Sql query error");

                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                        <option value="<?php echo $row['cid'] ?>"><?php echo $row['cname'] ?></option>

                    <?php   } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>