<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
          <style>
               body {
               background-color: lightgrey;
               }
               table{
                   color: blue;
               }
             
              .btn{
                   float: right;
                   background-color: red;
                   color:#333;
               }
              
        </style>
        
    </head>
    <body>
        <?php
            include_once './Functions/dbConnect.php';
            include_once './functions/func.php'; 
            include_once './functions/dbData.php'; 
            
            $db = dbconnect();

        /*
         * create a variable to hold the database
         * SQL statement
         */
        $stmt = $db->prepare("SELECT * FROM timecard");

        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Project Description</th>
                    <th>Date</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Time Spent </th>
                    <th>File IN/OUT </th>
                </tr>
            </thead>
            <tbody>
           
            <?php foreach ($results as $row): ?>
               
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['ProjectName']; ?></td>
                    <td><?php echo $row['PDescription']; ?></td> 
                    <td><?php echo date("M/d/Y",strtotime($row['PDate'])); ?></td> 
                    <td><?php echo $row['CheckIn']; ?></td>    
                    <td><?php echo $row['CheckOut']; ?></td> 
                    <td><?php echo $row['TimeSpent']; ?></td> 
                    <td><?php echo $row['FileOut']; ?></td> 
                    <td><a class="btn btn-warning"  href="InFile.php?id=<?php echo $row['id']; ?>">Check-In</a></td> 
                    <td><a class="btn btn-warning"  href="FinalTime.php?id=<?php echo $row['id']; ?>">Check-Out</a></td> 
                    <td><a class="btn btn-warning" href="update.php?id=<?php echo $row['id']; ?>">Update</a></td> 
                    <td><a class="btn" href="Delete.php?id=<?php echo $row['id']; ?>">Delete</a></td> 
                    
                 
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
        <?php
        
        $result = '';
          $submit = filter_input(INPUT_POST, 'submit');
                   if (isset($submit)) {
          
            $time = Ctime();
            
            $result  = TimeDiff( $time);
        }
        
        ?>
        
        <p><a href="index.php">Home Page</a>
            <h2><?php echo $result; ?></h2>
            
        
    </body>
</html>
