<?php

function getDBConfig() {
    return [
        'db_host' => 'mariadb',
        'db_user' => 'root',
        'db_pass' => '',
        'db_table' => 'app_booking_hotel'
    ];
}

function getAbsolutePath(){
    return __DIR__;
}

?>