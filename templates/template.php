<head>
    <link rel="stylesheet" href="/templates/css/light/style.css">

</head>
<body>
<div class="container">
    <?php if(isset($error)):?>
        <div class="warning"><?php echo $error ?></div>
    <?php endif; ?>

    <h3>
        Действие выполненно, вы можете вернуться обратно или же перейти на начальную страницу.
    </h3>
    <a href="/" class="btn">Return to Home</a> <br>

    <a href="/uploadCSVform" class="btn"> Return Back</a>
</div>
</body>