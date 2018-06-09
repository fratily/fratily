<?php
/**
 * FratilyPHP
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @author      Kento Oka <kento.oka@kentoka.com>
 * @copyright   (c) Kento Oka
 * @license     MIT
 * @since       1.0.0
 */
namespace App\Container;

use Fratily\Container\Container;
use Fratily\Container\ContainerConfig;

/**
 *
 */
class AppConfig extends ContainerConfig{

    /**
     * {@inheritdoc}
     */
    public function define(Container $container){
        $container
            ->set("app.controller.index", $container->lazyNew(
                \App\Controller\IndexController::class
            ))
            ->set("app.twig", $container->lazyNew(
                \Twig\Environment::class,
                [
                    $container->lazyNew(
                        \Twig\Loader\FilesystemLoader::class,
                        [
                            __DIR__ . "/../../resource/views"
                        ]
                    )
                ]
            ))
        ;
    }
}