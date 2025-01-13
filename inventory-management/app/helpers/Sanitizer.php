<?php

// app/helpers/Sanitizer.php
namespace App\Helpers;

class Sanitizer
{
    // Sanitize a string by trimming whitespace and converting special characters to HTML entities
    public static function sanitizeString($string)
    {
        return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
    }

    // Sanitize an integer (removes non-numeric characters)
    public static function sanitizeInt($int)
    {
        return filter_var($int, FILTER_SANITIZE_NUMBER_INT);
    }

    // Sanitize an email by validating and filtering it
    public static function sanitizeEmail($email)
    {
        // Filter the email and check if it is a valid email format
        return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    }

    // Sanitize a password (remove unwanted characters and ensure it’s safe to use)
    public static function sanitizePassword($password)
    {
        // For password sanitization, trimming is usually enough
        // Password complexity (length, symbols) is handled elsewhere (e.g., hashing)
        return trim($password);
    }

    // Sanitize a phone number or other numeric values (filter non-numeric characters)
    public static function sanitizeNumber($number)
    {
        return filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    }
}



?>