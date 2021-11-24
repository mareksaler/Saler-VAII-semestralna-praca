<?php

namespace App\Config;

/**
 * Class Configuration
 * Main configuration for the application
 * @package App\Config
 */
class Configuration
{
    public const DB_HOST = 'db';
    public const DB_NAME = 'databaza';
    public const DB_USER = 'root';
    public const DB_PASS = 'heslo';

    public const LOGIN_URL = '?c=auth&a=loginForm';

    public const ROOT_LAYOUT = 'root.layout.view.php';

    public const DEBUG_QUERY = false;

    public const UPLOAD_DIR = 'public/files/';
}