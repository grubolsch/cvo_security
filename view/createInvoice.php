<?php
require 'view/partials/header.php';
?>
<section class="box">
    <h2>Create invoice</h2>

    <?php echo $msg ?? ''?>

    <form action="?path=create-invoice" method="post" enctype="multipart/form-data" >
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="invoice" class="col-sm-2 col-form-label">Upload invoice (pdf):</label>

            <div class="col-sm-10">
                <input type="file" id="invoice" name="invoice" class="form-control" accept="application/pdf" required>
            </div>
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
    </form>
</section>
<?php
require 'view/partials/footer.php';
