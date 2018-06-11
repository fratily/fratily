<?php
/**
 * FratilyPHP
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @author      Kento Oka <kento-oka@kentoka.com>
 * @copyright   (c) Kento Oka
 * @license     MIT
 * @since       1.0.0
 */
namespace App\Controller;

/**
 *
 */
class IndexController extends \Fratily\Framework\Controller\Controller{

    public function index(){
        $this->startTimeline("action");
        $this->dump(true);
        $this->dump(123);
        $this->dump(123.456);
        $this->dump("string");
        $this->dump(["array", 123.456, new \SplQueue()]);
        $this->dump(new \SplQueue());
        sleep(1);
        $this->startTimeline("message");
        $this->debug("debug");
        $this->error("error");
        sleep(2);
        $this->info("info");
        $this->endTimeline("message");
        sleep(1);
        $this->endTimeline("action");

        return <<<HTML
<!DOCTYPE html>
<head><title></title></head>
<body><p>index action.</p></body>
HTML;
    }
}