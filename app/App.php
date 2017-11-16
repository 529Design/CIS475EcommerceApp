<?php

namespace Cart;


use DI\ContainerBuilder;
use DI\Bridge\Slim\App as DiBridge;

class App extends DiBridge{

    protected function configureContainer(ContainerBuilder $builder){
        $builder->addDefinitions([
            'settings.dpsplayErrorDetails' => true,
        ]);

        $builder->addDefinitions(__DIR__ . '/container.php');

    }

}