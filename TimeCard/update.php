<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
               body {
               background-color: lightgrey;
               }
               h1{
                   color: black;
               }
        </style>
     <div class="container">
            <nav class="navbar navbar-light" style="background-color: #ffa500;">
             <span class="navbar-brand"><h1>Update Corporation</h1></span>
            </nav>
       </div>
    </head>
    <body>
        <?php
        
        include_once './functions/dbConnect.php';
        include_once './functions/func.php';
       
        $db = dbconnect();
         $result = '';
//         $submit = filter_input(INPUT_POST, 'submit');
        if (isPostRequest()) {
//        if (isset($submit)) {
              $id = filter_input(INPUT_POST, 'id');
            $pName = filter_input(INPUT_POST, 'ProjectName');
            $pDescription = filter_input(INPUT_POST, 'PDescription');
            
         
          
             $stmt = $db->prepare("UPDATE timecard set ProjectName = :ProjectName, PDescription = :PDescription where id = :id");

            $binds = array(
                ":id" => $id,
                ":ProjectName" =>  $pName,
                ":PDescription" => $pDescription
             
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $result = 'Record updated';
            }
        }
        else {
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM timecard where id = :id");
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                if ( !isset($id) ) {
                    die('Record not found');
                }
                $pName = $results['ProjectName'];
                $pDescription = $results['PDescription'];
//                 $pTime = $results['CheckIn'];
               

            }
        
        
        ?>
        
        <h1><?php echo $result; ?></h1>
          <form method="post" action="#">            
          Project Name:
            <br/>
            <input type="text" value="<?php echo $pName; ?>" name="ProjectName" />
            <br/>
          Project Description:
            <br/>
            <input type="text" value="<?php echo $pDescription; ?>" name="PDescription"/>
            <br/>
<!--            Check-In Time:
            <br/>
            <input type="text" value="<?php echo $pTime; ?>" name="CheckIn" readonly/>
            <br/>
             Check-Out Time:
            <br/>
            <input type="text" value="<?php echo $pTimeOut; ?>" name="CheckOut"/>
            <br/>-->
            ID Number:
            <br/>
            <input type="text" value="<?php echo $id; ?>" name="id" readonly />
            <br/>
            <input type="submit" value="Update"/>
        </form>
        <p><a href="ReadData.php">View Projects</a></p>
    </body>
</html>
