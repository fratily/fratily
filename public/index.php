<?php

require "../vendor/autoload.php";

$debug  = true;

try{
    $app    = Fratily\Framework\Application::create(
        [
            new App\Container\AppConfig(),
        ],
        $debug
    );

    $app->generateResponse()->send();
}catch(Throwable $e){
    if(!headers_sent()){
        http_response_code(500);
    }

    if($debug){
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title><?=htmlspecialchars(get_class($e))?></title>
</head>
<body>
    <section>
        <h2><?=htmlspecialchars(get_class($e))?></h2>
        <small><?=htmlspecialchars($e->getFile())?> line <?=htmlspecialchars($e->getLine())?></small>
        <p><?=nl2br(htmlspecialchars($e->getMessage()))?></p>
        <div><?=nl2br(htmlspecialchars($e->getTraceAsString()))?></div>
    </section>
</body>
<?php
    }else{
        echo "System error!!";
    }
}