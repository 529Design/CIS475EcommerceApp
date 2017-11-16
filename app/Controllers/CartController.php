<?php

namespace Cart\Controllers;

use Slim\Router;
use Slim\Views\Twig;
use Cart\Models\Product;
use Cart\Basket\Basket;
use Psr\HTTP\Message\ResponseInterface as Response;
use Psr\HTTP\Message\ServerRequestInterface as Request;

class CartController{

    protected $basket;

    protected $product;

    
    public function __construct(Basket $basket, Product $product){
        $this->basket = $basket;
        $this->product = $product;
    }

    public function index(Request $request, Response $response, Twig $view){
        
        return $view->render($response, 'cart/index.twig');

    }

    public function add($slug, $quantity, Request $request, Response $response, Router $router){

        $product = $this->product->where('Slug', $slug)->first();

        if(!$product){

            return $response->withRedirect($router->pathFor('home'));
        }

       try{
            $this->basket->add($product, $quantity);
       }catch(QuantitityExceededException $e){
///
       }

       return $response->withRedirect($router->pathFor('cart.index'));
    }


}

?>