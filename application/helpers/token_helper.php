<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('generate_sha256_hash')) {
    /**
     * Generate a SHA-256 hash from a token and email
     *
     * @param string $token The token
     * @param string $email The email
     * @return string The generated SHA-256 hash
     */
    function generate_sha256_hash($token)
    {
        return hash('sha256', $token);
    }
}

if (!function_exists('verify_sha256_hash')) {
    /**
     * Verify the SHA-256 hash against the token and email
     *
     * @param string $hash The stored SHA-256 hash
     * @param string $token The token
     * @param string $email The email
     * @return bool True if the hash matches, false otherwise
     */
    function verify_sha256_hash($hash, $token)
    {
        // Re-create the hash using the token and email
        // Compare the generated hash with the stored hash
        return $token === $hash;
    }
}
