
<?php

        include_once './functions/dbConnect.php';
        include_once './functions/func.php';
         
         $db = dbconnect();
         $time = Ctime();
         
//          $results  = TimeDiff($time);
         
        $idd = filter_input(INPUT_GET, 'id');
                $stmtt = $db->prepare("SELECT * FROM timecard where id = :id");
                $bindss = array(
                    ":id" => $idd
                );
                if ($stmtt->execute($bindss) && $stmtt->rowCount() > 0) {
                   $results = $stmtt->fetch(PDO::FETCH_ASSOC);
               }
                if ( !isset($idd) ) {
                    die('Record not found');
                }
              
                 $pTime = $results['CheckIn'];
         
              $currentTime = strtotime($time);
              $oldTime = strtotime($pTime);
             $difference = $currentTime - $oldTime;
                    $Timespent = floor($difference/(60*60)).'-Hours';
                 $fileIn = '0';
            $id = filter_input(INPUT_GET, 'id'); 
            $stmt = $db->prepare("UPDATE timecard set CheckOut = :CheckOut, TimeSpent = :TimeSpent, FileOut = :FileOut where id = :id");
            
            $binds = array(
               ":id" => $id,
                ":CheckOut" => $time,
                ":TimeSpent" => $Timespent,
                ":FileOut" => $fileIn
                
            );

       
        $isCheckout = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isCheckout = true;
        }       
        
        ?>
        
        
     <h1> Record <?php echo $id; ?>
         <?php if ( !$isCheckout ): ?> 
          Not
        <?php endif; ?>
        Check-Out</h1>
        
       <p> <a href="ReadData.php">View Projects</a></p>
