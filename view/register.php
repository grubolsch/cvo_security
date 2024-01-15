<?php
require 'view/partials/header.php';
?>
    <section class="row">
        <div class="col-6">
            <?php require 'partials/introtext.php' ?>
        </div>
        <div class="col-6">
            <section class="box">
                <h2>User Registration</h2>

                <?php echo $msg ?? '' ?>

                <form action="?path=register" method="post">
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">

                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password:</label>
                        <div class="col-sm-10">

                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <input type="submit" value="Register" class="btn btn-primary">
                </form>
            </section>
        </div>
    </section>
<?php
require 'view/partials/footer.php';
