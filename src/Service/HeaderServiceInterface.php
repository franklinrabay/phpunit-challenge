<?php declare(strict_types=1);

namespace Glambou\Service;

interface HeaderServiceInterface
{
    /**
     * @param string $header
     *
     * @return string
     */
    public function resolveHeaders(string $header): string;
}