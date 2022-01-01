<?php var_dump($_GET) ?>

<head>
    <link rel="stylesheet" href="/templates/css/light/style.css">

</head>
<div class="container">
    <?php if(isset($error)):?>
        <div class="warning"><?php echo $error ?></div>
    <?php endif; ?>
    <a href="/" class="btn">Return to Home</a>
</div>
