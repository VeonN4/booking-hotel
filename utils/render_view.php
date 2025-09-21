<?php

function view($page_file)
{
    $base_path = "./views";
    include "$base_path/$page_file.php";
}
