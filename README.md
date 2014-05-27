Zrt Service Solr
================


## Why?

## How to use

Add `"zrtlab/zend-service-solr": "dev-develop"` to the require section of your composer.json, include the composer autoloader and you're good to go.

una de las maneras en la que se puede generar la instancia  del cliente de solr
Es agregando los parametros de conexion en el application.ini:

```ini

zrt.services.solr.endpoint.collection.host = 127.0.0.1
zrt.services.solr.endpoint.collection.port = 8080
zrt.services.solr.endpoint.collection.path = /solr
zrt.services.solr.endpoint.collection.core = aviso
zrt.services.solr.endpoint.collection.timeout = 5

```

Heredar el Boostrap de la siguiente clase  Zrt_Application_Bootstrap_Bootstrap

```PHP
<?php 
    
    class Bootstrap extends Zrt_Application_Bootstrap_Bootstrap
    {

    ...

```

Por medio del Bootstrap se registra la instancia en el Zend_Registry con el index "zend.service.solr"

## Examples

```php

class Test_SolariumController extends Zend_Controller_Action
{

    public function indexAction()
    {
        $client = Zend_Registry::get('zrt.service.solr');
        $query = $client->createQuery($client::QUERY_SELECT);

        $resultset = $client->execute($query);

        echo 'NumFound: '.$resultset->getNumFound();

        foreach ($resultset as $document) {

            echo '<hr/><table>';

            foreach ($document as $field => $value) {
                if (is_array($value)) {
                    $value = implode(', ', $value);
                }

                echo '<tr><th>' . $field . '</th><td>' . $value . '</td></tr>';
            }

            echo '</table>';
        }
        exit;

    }

}
```




