<?php
declare(strict_types=1);

use App\Controller\CreateInvoiceController;
use App\Controller\InvoiceDeleteController;
use App\Controller\InvoicesOverviewController;
use App\Controller\InvoiceViewController;
use App\Controller\LoginController;
use App\Controller\LogoutController;
use App\Controller\RegisterController;

require 'vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $pdo = new Pdo($_ENV['DB_DSN'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

if(! isset($_SESSION['user']) && (!isset($_GET['path']) || $_GET['path'] !== 'register')) {
    $_GET['path'] = 'login';
}

switch ($_GET['path'] ?? '') {
    case 'logout':
        $controller = new LogoutController($pdo);
        break;
    case 'login':
        $controller = new LoginController($pdo);
        break;
    case 'register':
        $controller = new RegisterController($pdo);
        break;
    case 'delete-invoice':
        $controller = new InvoiceDeleteController($pdo);
        break;
    case 'view-invoice':
        $controller = new InvoiceViewController($pdo);
        break;
    case 'create-invoice':
        $controller = new CreateInvoiceController($pdo);
        break;
    default:
    case 'invoices':
        $controller = new InvoicesOverviewController($pdo);
        break;
}
$controller->render($_GET, $_POST);
