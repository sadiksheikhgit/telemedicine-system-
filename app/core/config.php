<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('ROOT', '/telemedicine-system-/public/');
} else {
    define('ROOT', 'https://yourproductiondomain.com/');
}
