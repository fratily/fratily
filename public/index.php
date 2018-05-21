<?php

require "../vendor/autoload.php";

$debug  = true;

try{
    $cache  = (new Fratily\Cache\CacheFactory())->createFileSystemDriver([
        "path"  => __DIR__ . "/../var/cache/app"
    ]);

    $containerCache = true;

    $app    = (new Fratily\Framework\ApplicationFactory($cache))->create([], $debug, $containerCache);

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

        foreach($e->getTrace() as $t){
            echo ($t["class"]??""), ($t["type"]??""), ($t["function"]??"unknown");
            echo "(", implode(", ", array_map(
                function($v){
                    return \Fratily\Debug\Dumper::dumpSimple($v);
                }, $t["args"]??[])
            ), ")";
            echo PHP_EOL, "<br>", PHP_EOL;
        }
    }else{
        echo "System error!!";
    }
}