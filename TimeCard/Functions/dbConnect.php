<?php

 function dbconnect() {
        $config = array(
            'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=se266_fidel',
            'DB_USER' => 'se266_fidel',
            'DB_PASSWORD' => '214890'
        );
        
        try {
            $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $db = null;
            
            exit();
        }
    return $db;
}