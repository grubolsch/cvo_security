<?php
require 'view/partials/header.php';
?>

    <section class="row">
        <div class="col-6">
            <?php require 'partials/introtext.php' ?>
        </div>
        <div class="col-6">
            <section class="box">
                <h2>Login</h2>

                <?php echo $msg ?? '' ?>

                <form method="get">
                    <input type="hidden" name="goto" value="<?php echo $_GET['goto'] ?? $_SERVER['PHP_SELF'] . '?path=invoices' ?>">

                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                        <div class="col-sm-10">
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" id="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <input type="submit" value="Login" class="btn btn-primary">
                </form>

                <p class="text-end"><a href="?path=register">Register</a></p>
            </section>
        </div>
    </section>

<?php
require 'view/partials/footer.php';
