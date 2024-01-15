<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Invoice;
use PDO;
use PDOException;

class InvoiceRepository
{
    /** @return Invoice[] */
    public static function fetchInvoices(Pdo $pdo): array
    {
        $invoices = [];

        try {
            $stmt = $pdo->prepare("SELECT * FROM invoices order by id desc");
            $stmt->execute();

            foreach ($stmt->fetchAll() as $invoice) {
                $invoices[] = new Invoice($invoice['id'], $invoice['userId'], $invoice['name'], $invoice['file']);
            }
        } catch (PDOException $e) {
            die("Error loading invoices: " . $e->getMessage());
        }

        return $invoices;
    }

    /** @return Invoice[] */
    public static function fetchInvoicesByUserId(Pdo $pdo, int $userId): array
    {
        $invoices = [];

        try {
            $stmt = $pdo->prepare("SELECT * FROM invoices WHERE userId = :userId order by id desc");
            $stmt->execute(['userId' => $userId]);

            foreach ($stmt->fetchAll() as $invoice) {
                $invoices[] = new Invoice($invoice['id'], $invoice['userId'], $invoice['name'], $invoice['file']);
            }
        } catch (PDOException $e) {
            die("Error loading invoices: " . $e->getMessage());
        }

        return $invoices;
    }

    public static function fetchInvoiceById(Pdo $pdo, int $id): ?Invoice
    {
        try {
            $stmt = $pdo->prepare("SELECT * FROM invoices WHERE id = :id order by id desc");
            $stmt->execute(['id' => $id]);
            $invoice = $stmt->fetch(PDO::FETCH_ASSOC);

            return new Invoice($invoice['id'], $invoice['userId'], $invoice['name'], $invoice['file']);
        } catch (PDOException $e) {
            die("Error loading invoices: " . $e->getMessage());
        }
    }
}
