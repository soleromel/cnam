<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" href="<?php echo BASE_URL.'/templates/defaut/css/bootstrap.css'?>">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="row">

                <?php
                    if ($this->existeComposant())
                        $this->loadComposant(0);
                    else
                        $this->loadModule('user');
                ?>

            </div>
        </div>
    </div> <!-- /container -->
</body>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT.DS.'templates'.DS.'defaut'.DS.'js'.DS.'bootstrap.min.js'?>"></script>
</html>
