<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\InvoiceRepository;

class InvoicesOverviewController extends AbstractController
{
    public function render(array $get, array $post)
    {
        if ($this->getUser()->isAdmin()) {
            $invoices = InvoiceRepository::fetchInvoices($this->pdo);
        } else {
            $invoices = InvoiceRepository::fetchInvoicesByUserId($this->pdo, $_SESSION['user']->getId());
        }

        require 'view/invoices.php';
    }
}
