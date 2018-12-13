<?php
 include_once './functions/dbConnect.php';
 include_once './functions/dbData.php'; 
 include_once './functions/func.php'; 

         $db = dbconnect();
         $time = Ctime();
         $file = '1';

         
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
              
             $fileIn = '0';
            $id = filter_input(INPUT_GET, 'id'); 
            $stmt = $db->prepare("UPDATE timecard set CheckIn = :CheckIn, FileOut = :FileOut where id = :id");
            
            $binds = array(
               ":id" => $id,
                ":CheckIn" => $time,
                ":FileOut" => $file
              
                
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
        Check-In</h1>
        
       <p> <a href="ReadData.php">View Projects</a></p>
