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
namespace App\Controller;

/**
 *
 */
class IndexController extends \Fratily\Framework\Controller\Controller{

    public function index(){
        return <<<HTML
<!DOCTYPE html>
<head><title></title></head>
<body><p>index action.</p></body>
HTML;
    }
}