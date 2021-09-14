<?php declare(strict_types=1);

namespace Glambou\Service;

interface DatabaseServiceInterface
{
    /**
     * @return array
     */
    public function fetch(): array;

    /**
     * @return array
     */
    public function find(): array;

    /**
     * @return array
     */
    public function findAll(): array;

    /**
     * @param int $id
     *
     * @return array
     */
    public function findByID(int $id): array;
}