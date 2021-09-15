<?php

namespace Glambou\Service;

class HeaderService implements HeaderServiceInterface
{

    public function resolveHeaders(string $header): string
    {
        if ($header == 'OK') {
            return 'withCustomer';
        }


    }
}