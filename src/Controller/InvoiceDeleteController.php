<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\InvoiceRepository;

class InvoiceDeleteController extends AbstractController
{
    public function render(array $get, array $post)
    {
        $invoice = InvoiceRepository::fetchInvoiceById($this->pdo, (int)$get['id']);
        if ($invoice === null) {
            die('Invoice not found');
        }

        if ($invoice->getUserId() !== $this->getUser()->getId()) {
            die('No access to this invoice');
        }

        $invoice->delete($this->pdo);

        header('location: ?path=invoices');
        exit;
    }
}
