<?php 
$empId = $_GET['id'];
try{
    $connection = new pdo("mysql:host=localhost;dbname=company", "root", "root");
    $statement = $connection->query("delete from employees where id = $empId");
}
catch(PDOException $error){
    echo $error->getMessage();
}

header('Location:list.php');
?>