<?php

namespace Cart\Controllers;

use Slim\Views\Twig;
use Cart\Models\Product;
use Psr\HTTP\Message\ResponseInterface as Response;
use Psr\HTTP\Message\ServerRequestInterface as Request;

class HomeController{

    public function index(Request $request, Response $response, Twig $view,Product $product){
        //die('Index');
        


        $products = $product->get();
        //var_dump($products->first()->title);
        //die();

        return $view->render($response, 'home.twig', [

            'products' => $products
            
        ]);
    }

}

?>