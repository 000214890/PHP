<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title></title>
         <style>
               body {
               background-color: lightgrey;
               }
               a{
                   color: black;
                   text-decoration: underline;
               }
               
                     body{
                  background-color: lightgrey;
              }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
           }

        li {
            float: left;
           }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            }

        li a:hover:not(.active) {
            background-color: orange;
            }
        .active {
            background-color: #4CAF50;
            }
        </style>
        
       
    
     <ul>
         <li><a  href="index.php">Home</a></li>
         <li><a class="active" href="CreateProject.php">Create Project</a></li>
         <li><a href="ReadData.php">View Projects</a></li>
       
    </ul>
    
      <div class="row justify-content-center">
<!--        <nav class="navbar navbar- justify-content-center" style="background-color:orange;">-->
             <span class="navbar-brand justify-content-center"><h1>Create Project/Check-In</h1></span>
<!--         </nav>-->
         </div>
    </head>
    <body>
        <?php
         include_once './functions/dbConnect.php';
         include_once './functions/dbData.php'; 
         include_once './functions/func.php'; 
//         $db = dbconnect();
//         date_default_timezone_set('US/Eastern');
//          $id = filter_input(INPUT_GET, 'id');
//                $stmtt = $db->prepare("SELECT * FROM timecard ProjectName = :ProjectName where id = :id");
//                $bindss = array(
//                    ":id" => $id,
//                        ":ProjectName" => $oldName
//                );
//                if ($stmtt->execute($bindss) && $stmtt->rowCount() > 0) {
//                   $results = $stmtt->fetch(PDO::FETCH_ASSOC);
//               }
//                if ( !isset($id) ) {
//                    if($oldName == $projName = filter_input(INPUT_POST, 'pName'))
//                    {
//                        echo"File being used";
//                        
//                    }
// else {
//     
//                      $results = '';
//         $timeDate = '';
//         $submit = filter_input(INPUT_POST, 'submit');
//         
//         if (isset($submit)) {
//            $projName = filter_input(INPUT_POST, 'pName');
//            $task = filter_input(INPUT_POST, 'descrip');
//            $time = Ctime();
//            $CurDate=CDate();
//            $fileIn ='1';
//            $results  = AddProject($projName, $task, $time, $CurDate,$fileIn);
//              }
//                }
//                
//                   $FileIn = $results['FileOut']; 
//                 
// }
              
                 
         
         
         
         $results = '';
         $timeDate = '';
         $submit = filter_input(INPUT_POST, 'submit');
         
         if (isset($submit)) {
            $projName = filter_input(INPUT_POST, 'pName');
            $task = filter_input(INPUT_POST, 'descrip');
//            $time = Ctime();
            $CurDate=CDate();
//            $fileIn ='1';
            $results  = AddProject($projName, $task, $CurDate);
        }
        
        ?>
        
        
        
        <div class="row justify-content-center">
         <form method="post" action="#"> 
              <div class="form-group">
                <label>Project Name:</label>  
                <input type="text" class="form-control"  name="pName" />
              </div>

            <div class="form-group">
                <label>Project Description</label> 
                <input type="text" class="form-control" name="descrip"/>
            </div>
           
             <div class="form-group">
                 <input type="submit" class="btn btn-primary" name="submit" value ="Check-In"/>
<!--                <a href="ViewAll.php?viewall=<?php ?>"class="btn btn-info">View_All</a>-->
             </div>
         
        </form>
          </div>
        <h2><?php echo $results; ?></h2>
      </body>
</html>
