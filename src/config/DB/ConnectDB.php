<?php

namespace Etewa\config\DB;


use PDO;
use PDOException;

class ConnectDB
{
    /**
     * @return PDO
     */
    function getConnection() {
        try {
            $db_username = "API";
            $db_password = "";
            $conn = new PDO('mysql:host=localhost;dbname=root', $db_username, $db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
        return $conn;
    }

}