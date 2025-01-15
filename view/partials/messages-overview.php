<?php if (count($messages) > 0): ?>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col"><?php echo $title?></th>
            <th scope="col">Message</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($messages as $message): ?>
            <tr>
                <td><?php echo $message['email'] ?></td>
                <td><?php echo $message['message'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="error">No messages found</p>
<?php endif; ?>