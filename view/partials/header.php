<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="media/style.css">
</head>
<body>
<header>
    <h1>W-hole cheese</h1>
    <p class="text-center">The only thing with more holes than our cheese, is our security!</p>
    <?php if (isset($_SESSION['user'])): ?>
    <div class="text-end">
        <p>
            <?php if ($_SESSION['user']->isAdmin()): ?>
            <span class="error">You are an ADMINISTRATOR!</span> -
            <?php endif; ?>

            Hello <?php echo $_SESSION['user']->getEmail() ?> (<em><a href="?path=invoices">Invoices</a></em> | <em><a href="?path=messages">Messages</a></em> | <em><a href="?path=logout">Logout</a></em>),
        </p>
    </div>
    <?php endif; ?>
</header>
