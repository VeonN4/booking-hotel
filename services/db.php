<?php
include dirname(__DIR__) . "/config/config.php";

function getDBConnection()
{
    static $conn = null;

    if ($conn === null) {
        try {
            $config = getDBConfig();

            $conn = new mysqli(
                $config['db_host'],
                $config['db_user'],
                $config['db_pass'],
                $config['db_table']
            );
        } catch (mysqli_sql_exception $e) {
            echo "Failed to connect to database: " . $e;
        }
    }

    return $conn;
}
