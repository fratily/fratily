<?php

require "../vendor/autoload.php";

$debug  = true;

try{
    $cache  = (new Fratily\Cache\CacheFactory())->createFileSystemDriver([
        "path"  => __DIR__ . "/../var/cache/app"
    ]);

    $containerCache = true;

    $app    = (new Fratily\Framework\ApplicationFactory($cache))
        ->create([
            App\Container\AppConfig::class
        ], $debug, $containerCache
    );

    $app->get("/", "app.controller.index:index", "index");

    $request    = (new Fratily\Http\Factory\ServerRequestFactory())->createServerRequestFromArray($_SERVER);

    $app->generateResponse($request)->send();
    echo "Success";
}catch(Throwable $e){
    if(!headers_sent()){
        http_response_code(500);
    }

    if($debug){
        echo get_class($e), "(", $e->getFile(), " ", $e->getLine(), ")";
        echo PHP_EOL, "<br>", PHP_EOL;
        echo $e->getMessage();
        echo PHP_EOL, "<br><br>", PHP_EOL;
        echo nl2br($e->getTraceAsString());
    }else{
        echo "System error!!";
    }
}