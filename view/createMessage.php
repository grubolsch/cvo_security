<?php
require 'view/partials/header.php';
?>
    <section class="box">
        <h2>Create message</h2>

        <?php echo $msg ?? ''?>

        <form action="?path=create-message" method="post" >
            <input type="hidden" name="from" value="<?php echo $_SESSION['user']->getId()?>">
            <input type="hidden" name="to" value="<?php echo $_SESSION['user']->getId()?>">

            <div class="row mb-3">
                <label for="message" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <select name="to" id="to">
                        <?php foreach($users as $user): ?>
                            <option value="<?php echo $user['id']?>"><?php echo htmlspecialchars($user['email'])?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="message" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <textarea id="message" name="message" class="form-control" required></textarea>
                </div>
            </div>

            <input type="submit" value="Save" class="btn btn-primary">
        </form>
    </section>
<?php
require 'view/partials/footer.php';
