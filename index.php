<?php

require 'vendor/autoload.php';

use App\Storage;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

Storage::resolve()->put('file.txt', 'Hello, World!');

echo 'Done';
