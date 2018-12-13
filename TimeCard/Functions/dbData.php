<?php
include_once "dbConnect.php";

function AddProject($projName, $task,$Date)
{
     // establish a database connection
    $db = dbconnect();
    
    $stmt = $db->prepare("INSERT INTO timecard SET ProjectName = :ProjectName, PDescription = :PDescription,PDate = :PDate");
    
    $binds = array(
        ":ProjectName" => $projName,
        ":PDescription" => $task,
        ":PDate" => $Date
        
        
    );
    
   if ($stmt->execute($binds)&& $stmt->rowCount() > 0){
       $results = "Project Added";
   }
    return $results;
}


function AddTime($time)
{
     // establish a database connection
    $db = dbconnect();
    
    $stmt = $db->prepare("INSERT INTO timecard SET CheckIn = :CheckIn");
    
    $binds = array(
        ":CheckIn" => $time,
         
    );
    
   if ($stmt->execute($binds)&& $stmt->rowCount() > 0){
       $results = "Project Added";
   }
    return $results;
}




function TimeDiff($timeIn)
{
     // establish a database connection
    $db = dbconnect();
    $id = filter_input(INPUT_GET, 'id'); 
    $stmt = $db->prepare("INSERT INTO timecard SET CheckOut = :CheckOut");
    
    $binds = array(
        ":CheckOut" => $timeIn
       
        
    );
    if ($stmt->execute($binds)&& $stmt->rowCount() > 0){
       $results = "Project Added";
   }
    return $results;
}