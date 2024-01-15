<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\InvoiceRepository;

class InvoiceViewController extends AbstractController
{
    public function render(array $get, array $post)
    {
        $invoice = InvoiceRepository::fetchInvoiceById($this->pdo, (int)$get['id']);

        if ($invoice === null) {
            die('Invoice not found');
        }

        require 'view/invoice.php';
    }
}
