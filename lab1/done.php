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
        <div class="m-auto w-50">
            <h1 class='text-center mb-5'>
                Thanks
                <?php 
                    echo ($_POST['gender'] === 'male') ? 'Mr' : 'Miss';
                    echo " $_POST[fname] $_POST[lname] <br>"; 
                ?>
            </h1>

            <p>
                <h3> Please review your information: </h3>
                <?php
                echo "Name: $_POST[fname] $_POST[lname] <br>";
                echo "Address: $_POST[address] <br>";
                ?>
                Your Skills:
                <ul>
                    <?php 
                    foreach($_POST['skills'] as $skill){
                        echo "<li>$skill</li>";
                    }
                    ?>
                </ul>
                Department:
                <?php
                echo " $_POST[department]";
                ?>
            </p>
        </div>
    </div>
</body>
</html>