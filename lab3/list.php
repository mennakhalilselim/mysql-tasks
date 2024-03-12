<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>All Employees</title>
</head>

<body>
    <div class="container py-5">
        <div class="m-auto w-auto">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Country</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Skills</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Department</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    try{
                        $connection = new pdo("mysql:host=localhost;dbname=company", "root", "root");
                        $statement = $connection->query(
                            "select e.id, e.fname, e.lname, e.address, e.country, e.gender, 
                             concat_ws('-', s.skill1, s.skill2, s.skill3, s.skill4) as skills,
                             e.username, e.password, e.department
                             from employees e left join skills s on e.id = s.emp_id"
                        );
                        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach($data as $row){
                            echo "<tr>";
                            foreach($row as $key=>$field){
                                if($key === 'skills'){
                                    $field = trim($field, '-');
                                }
                                echo "<td>$field</td>";
                            }
                            echo "<td>
                            <a href='view.php?id={$row['id']}'>view</a>
                            <a href='edit.php?id={$row['id']}'>edit</a>
                            <a href='delete.php?id={$row['id']}'>delete</a>
                            </td>";
                            echo "</tr>";

                        }
                    }
                    catch(PDOException $error){
                        echo $error->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>