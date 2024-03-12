<?php

echo "<pre>";
var_dump($_POST);
echo "</pre>";


try{
    $connection = new pdo("mysql:host=localhost;dbname=company", "root", "root");
    $insertEmployeeStatement = $connection->prepare("insert into employees(fname, lname, address, country, gender, username, password, department) values (?, ?, ?, ?, ?, ?, ?, ?)");
    $insertEmployeeStatement->execute([
        $_POST['fname'],
        $_POST['lname'],
        $_POST['address'],
        $_POST['country'],
        $_POST['gender'],
        $_POST['username'],
        $_POST['password'],
        $_POST['department'],
    ]);

    $employeeId = $connection->lastInsertId();
    $arr = array_pad($_POST['skills'], 4, null);

    $insertSkillsStatement = $connection->prepare("insert into skills(emp_id, skill1, skill2, skill3, skill4) values (?, ?, ?, ?, ?)");
    $insertSkillsStatement->execute([
        $employeeId,
        ...$arr
    ]);
    
}
catch(PDOException $error){
    echo $error->getMessage();
}

header('Location:list.php');

?>