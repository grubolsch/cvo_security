<?php
require 'view/partials/header.php';
?>
<section class="box">
    <h2>Invoices</h2>

    <p>
    <a href="?path=create-invoice" class="btn btn-primary">Upload new invoice</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th width="80%">Invoice</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <?php
        /** @var App\Model\Invoice $invoice */
        foreach ($invoices as $invoice):?>
            <tr>
                <td><a href="<?php echo $invoice->getFile() ?>" target="_blank" download="true"><?php echo $invoice->getName() ?></td>
                <td><a class="btn btn-primary" href="?path=view-invoice&id=<?php echo $invoice->getId() ?>">View</a></td>
                <td><a class="btn btn-danger" href="?path=delete-invoice&id=<?php echo $invoice->getId() ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
<?php
require 'view/partials/footer.php';
