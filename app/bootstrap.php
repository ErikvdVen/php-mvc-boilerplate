<?php
namespace Erik\Magneds;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Including global autoloader
require_once dirname(__FILE__) . '/../vendor/autoload.php';

use Erik\Magneds\Service;

$entityManager = Service::Instance();