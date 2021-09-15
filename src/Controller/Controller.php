<?php

namespace Glambou\Controller;

class Controller
{
    private array $headers;
    /**
     * @param string $name
     *
     * @return string
     */
    protected function getParam(string $name, array $parameterBag): ?string
    {
       return $parameterBag[$name] ?? null;
    }

    /**
     * @param string $name
     *
     * @return string
     */
    protected function getHeader(string $name): string
    {
        $this->headers = [
            'Header1' => 'OK',
            'Header2' => 'NOT OK',
            'Header3' => 'CORS',
            'Header4' => 'REFERER',
            'Header5' => 'ORIGIN',
        ];

        return $this->headers[$name];
    }

    /**
     * @param array $headers
     *
     * @return Controller
     */
    public function setHeaders(array $headers): Controller
    {
        $this->headers = $headers;

        return $this;
    }


}