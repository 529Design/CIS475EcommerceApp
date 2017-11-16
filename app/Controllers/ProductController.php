<?php

namespace Cart\Controllers;

use Slim\Router;
use Slim\Views\Twig;
use Cart\Models\Product;
use Psr\HTTP\Message\ResponseInterface as Response;
use Psr\HTTP\Message\ServerRequestInterface as Request;

class ProductController{

    public function get($slug, Request $request, Response $response, Twig $view, Router $router, Product $product){

        $product = $product->where('slug', $slug)->first();

        if(!$product){
            return $response->withRedirect($router->pathFor('home'));

        }

        return $view->render($response, 'products/product.twig', [
            'product'=>$product,
        ]);

    }
}
?>