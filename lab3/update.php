<?php
$empId = $_GET['id'];
extract($_POST);

echo "<pre>";
var_dump($_POST);
echo "</pre>";


try{
    $connection = new pdo("mysql:host=localhost;dbname=company", "root", "root");
    $arr = array_pad($skills, 4, null);
    $connection->query("update employees 
                set fname='$fname', lname='$lname', address='$address', country='$country', gender='$gender', username='$username', password=$password 
                where id=$empId");
    $connection->query("update skills set skill1='$arr[0]', skill2='$arr[1]', skill3='$arr[2]', skill4='$arr[3]' where emp_id=$empId");
  
}
catch(PDOException $error){
    echo $error->getMessage();
}

header('Location:list.php');


?>