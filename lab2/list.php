<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container py-5">
        <div class="m-auto w-auto">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Country</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Skills</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Department</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $data = file("data.txt");
                    foreach($data as $row){
                        echo "<tr>";
                        $rowArr = explode(',', $row);
                        foreach($rowArr as $field){
                            echo "<td>$field</td>";
                        }
                        echo "</tr>";

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>