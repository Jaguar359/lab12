<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin: 10vh auto;
        }
    </style>
</head>
<body>
<?php echo $this->render('_header'); ?>
<?php echo $content; ?>
<?php echo $this->render('_footer'); ?>
</body>
</html>