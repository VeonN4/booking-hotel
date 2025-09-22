<?php

function view($page_file)
{
    $base_path = "./views";

    $php_path = "$base_path/$page_file" . ".php"; 
    $html_path = "$base_path/$page_file" . ".html"; 

    if (file_exists($php_path)) {
        include $php_path;
        return true;
    }

    if (file_exists($html_path)) {
        include $html_path;
        return true;
    }

    echo "File not found!";
}
