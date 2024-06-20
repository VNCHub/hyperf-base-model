<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProductRepositoryInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class ProductController extends AbstractController
{
    public function create(
        RequestInterface $request, 
        ResponseInterface $response,
        ProductRepositoryInterface $repository
        )
    {
        $json = $request->getBody()->getContents();
        $data = json_decode($json, true);
        $object = $repository->create($data);
        return $response->json([
            'data' => $object,
            'message' => '',
            'success' => true,
            'code' => 200
        ]);
    }

    public function find(
        RequestInterface $request, 
        ResponseInterface $response,
        ProductRepositoryInterface $repository
    )
    {
        $json = $request->getBody()->getContents();
        $data = json_decode($json, true);
        $object = $repository->find($data['id']);
        return $response->json([
            'data' => $object,
            'message' => '',
            'success' => true,
            'code' => 200
        ]);
    }

    public function list(
        ResponseInterface $response,
        ProductRepositoryInterface $repository
    )
    {
        $objects = $repository->all();
        return $response->json([
            'data' => $objects,
            'message' => '',
            'success' => true,
            'code' => 200
        ]);
    }

    public function delete(
        RequestInterface $request, 
        ResponseInterface $response,
        ProductRepositoryInterface $repository
    )
    {
        $json = $request->getBody()->getContents();
        $data = json_decode($json, true);
        $object = $repository->find($data['id']);
        $repository->delete($data['id']);
        return $response->json([
            'data' => $object,
            'message' => '',
            'success' => true,
            'code' => 200
        ]);
    }

    public function update(
        RequestInterface $request, 
        ResponseInterface $response,
        ProductRepositoryInterface $repository
    )
    {
        $json = $request->getBody()->getContents();
        $data = json_decode($json, true);
        $object = $repository->update($data['id'], $data);
        return $response->json([
            'data' => $object,
            'message' => '',
            'success' => true,
            'code' => 200
        ]);
    }
}
