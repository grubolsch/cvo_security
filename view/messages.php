<?php
require 'view/partials/header.php';
?>
    <section class="box">
        <h2>Messages</h2>

        <p><a class="btn btn-primary" href="?path=create-message">Create message</a></p>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Inbox</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Outbox</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h2>Inbox</h2>
                <form method="get">
                    <input type="hidden" name="path" value="messages">
                    <label for="filter">Send by</label>
                    <select name="filter" id="filter">
                        <option value="">All</option>
                        <?php foreach($users as $user): ?>
                        <?php if($user['id'] !== $_SESSION['user']->getId()):?>
                            <option value="<?php echo $user['id']?>"><?php echo htmlspecialchars($user['email'])?></option>
                        <?php endif;?>
                        <?php endforeach;?>
                    </select>
                    <input type="submit" class="btn btn-secondary" value="Filter">
                </form>

                <?php
                $messages = $inbox;
                $title = 'Sent by';
                require 'view/partials/messages-overview.php'; ?>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h2>Outbox</h2>
                <?php
                $messages = $outbox;
                $title = 'Sent to';
                require 'view/partials/messages-overview.php'; ?>
            </div>
        </div>




    </section>
<?php
require 'view/partials/footer.php';
