<?php

namespace App\Repository;

interface ProductRepositoryInterface
{
    public function save(object $entity): bool;
    public function create(array $attributes = []): object;
    public function all(): iterable;
    public function find(int $id): ?object;
    public function delete(int $id): int;
    public function update(int $id, array $attributes = []): object;
}