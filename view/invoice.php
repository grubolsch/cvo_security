<?php

require 'view/partials/header.php';

/** @var App\Model\Invoice $invoice */
?>
    <section class="box">
        <h2>Invoice <?php echo $invoice->getId()?> - <?php echo $invoice->getName() ?></h2>

        <a class="btn btn-primary" href="<?php echo $invoice->getFile() ?>" target="_blank" download="true">Download</a>
        <a class="btn btn-danger" href="?path=delete-invoice&id=<?php echo $invoice->getId() ?>">Delete</a>

        <p><a href="?path=invoices">Back to overview</a></p>
    </section>
<?php
require 'view/partials/footer.php';
