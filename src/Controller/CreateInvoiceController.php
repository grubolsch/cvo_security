<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Invoice;

class CreateInvoiceController extends AbstractController
{
    public function render(array $get, array $post)
    {
        if (isset($post['name'], $_FILES['invoice'])) {
            $dir = 'invoices/' . $this->getUser()->getId() . '/';
            if (@mkdir($dir) && !is_dir($dir)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $dir));
            }

            $file = $dir . $_FILES['invoice']['name'];
            move_uploaded_file($_FILES['invoice']['tmp_name'], $file);
            $invoice = new Invoice(null, $this->getUser()->getId(), $post['name'], $file);
            $invoice->save($this->pdo);

            header('location: ?path=invoices');
            exit;
        }

        require 'view/createInvoice.php';
    }
}
