<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>view</title>
</head>

<body>
    <div class="container py-5">
        <div class="m-auto w-50">
            <table class="table table-bordered">
                <tbody>
                <?php 
                $empId = $_GET['id'];
                try{
                    $connection = new pdo("mysql:host=localhost;dbname=company", "root", "root");
                    $sqlQuery = "select e.id, e.fname, e.lname, e.address, e.country, e.gender, 
                                    concat_ws('-', s.skill1, s.skill2, s.skill3, s.skill4) as skills,
                                    e.username, e.password, e.department
                                    from employees e join skills s on e.id = s.emp_id
                                    where e.id = $empId
                                ";
                    $statement = $connection->query($sqlQuery);
                    $data = $statement->fetch(PDO::FETCH_ASSOC);
                    foreach($data as $key=>$field){
                        if($key === 'skills'){
                            $field = trim($field, '-');
                        }
                        echo "<tr>";
                        echo "<th scope='row' class='table-light'>$key</th>";
                        echo "<td>$field</td>";
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