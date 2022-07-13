<?php

session_start();
require("handle/connection.php");

if(!isset($_SESSION['adminid']))
{
    header("location: login.php");
}

$id=$_SESSION['adminid'];

$sql="select * from admins where id=$id";
$query=mysqli_query($conn,$sql);

if(mysqli_num_rows($query)==1)
{
    $admin=mysqli_fetch_assoc($query);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> 
<title>Dashbord</title>
</head>
<body>
    
<div class="nav">
    <div class="container">
    <ul>
       <li><a href="index.php">Home</a></li>
       <li><a href="admin.php">Admins</a></li>
       <li><a href="categories.php">Categories</a></li>
       <li><a href="food.php">Food</a></li>
       <li><a href="orders.php">Orders</a></li>

       <a style=" text-align: right;
    text-decoration: none;
    position: absolute;
    left: 1666px;
    background-color: red;
    color: white;
    padding: 0.5%;
    /* height: 59px; */ " class="log" href="handle/logout.php">logout</a>
      

      <a style=" text-align: left;
    text-decoration: none;
    position: absolute;
    left: 50px;
    color:#2c3e50;
    font-weight:bold;
    padding: 0.5%;
    margin-top: -7px " class="log" href="#"><?=$admin['name']?></a>
      
    </ul>
    </div>
    
</div>