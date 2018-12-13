<?php

        include_once './functions/dbConnect.php';
        include_once './functions/func.php';

            
            $db = dbconnect();
            
            $id = filter_input(INPUT_GET, 'id'); 
            
            $stmt = $db->prepare("DELETE FROM timecard where id = :id");
            
            $binds = array(
                ":id" => $id
            );

       
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }       
        
        ?>
        
        
        <h1> Record <?php echo $id; ?>
         <?php if ( !$isDeleted ): ?> 
          Not
        <?php endif; ?>
        Deleted</h1>
        
       <p> <a href="ReadData.php">View Projects</a></p>
        