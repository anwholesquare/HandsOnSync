<?php

// Create a helper function in app/Helpers/auth_helper.php
if (!function_exists('isAuthenticated')) {
    function isAuthenticated()
    {
        $session = session();
        return $session->has('logged_in') && $session->get('logged_in') === true;
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 20)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
}




?>