<!doctype html>
<html>
    <head>
        <title></title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Jakub Alkagar Mrowiec - jakub@mrowiec.org" />
        <meta charset="utf-8" />
        <?php Yii::app()->clientScript->registerCssFile('http://yui.yahooapis.com/3.6.0/build/cssreset/cssreset-min.css'); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/main.css'); ?>
    </head>
    <body>
        <div id='page'>
            <div class='header'>
                <?php AMenu::render(); ?>
                <hr />
            </div>
            <?php echo $content; ?>
        </div> <!-- page !-->
    </body>
</html>
