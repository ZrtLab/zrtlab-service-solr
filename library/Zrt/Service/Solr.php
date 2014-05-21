<?php

use Solarium\Client as SolariumClient,
    Solarium\Exception;

class Zrt_Service_Solr extends SolariumClient
{

    public function getPing()
    {
        $ping = $this->createPing();

        try {
            $result = $this->ping($ping);

            return $result->getData();
        } catch (Exception $e) {
            return false;
        }
    }

}
