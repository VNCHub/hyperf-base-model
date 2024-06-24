<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace HyperfTest\Feature;

use HyperfTest\BaseTestCase;
use HyperfTest\Feature\ProductClient;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 * @coversNothing
 */
class ProductTest extends BaseTestCase
{
    private ProductClient $productClient;

    public function __construct($name = null, array $data = [], $dataName ='')
    {
        parent::__construct($name, $data, $dataName);
        $this->productClient = new ProductClient();
    }
    
    public function testProductCreateShouldSucceed()
    {
        //Arrange
        $attributes = [
            'name' => 'Product Test',
            'description' => 'Product Test Description'
        ];

        //Act
        $requestResponse = $this->productClient->createRequest($attributes);
        $decodedResponse = json_decode($requestResponse->getBody()->getContents());

        //Asserts
        $this->assertInstanceOf(ResponseInterface::class, $requestResponse);
        $this->assertEquals(true, $decodedResponse->success);
        $this->assertEquals('Product Test', $decodedResponse->data->name);
        $this->assertEquals('Product Test Description', $decodedResponse->data->description);
    }

    public function testProductListShouldSucceed()
    {
        //Arrange
        $productId = $this->createTestProduct();
        $attributes = [];

        //Act
        $requestResponse = $this->productClient->listRequest($attributes);
        $decodedResponse = json_decode($requestResponse->getBody()->getContents());

        //Asserts
        $this->assertEquals(true, is_array($decodedResponse->data));
        $lastKey = array_key_last($decodedResponse->data);
        $this->assertEquals($productId, $decodedResponse->data[$lastKey]->id);
    }

    public function testProductGetShouldSucceed()
    {
        //Arrange
        $productId = $this->createTestProduct();
        $attributes = [
            'id' => $productId
        ];

        //Act
        $requestResponse = $this->productClient->getRequest($attributes);
        $decodedResponse = json_decode($requestResponse->getBody()->getContents());
    
        //Asserts
        $this->assertEquals($productId, $decodedResponse->data->id);
    }

    public function testProductDeleteShouldSucceed()
    {
        //Arrange
        $productId = $this->createTestProduct();
        $attributes = [
            'id' => $productId
        ];

        //Act
        $requestResponse = $this->productClient->deleteRequest($attributes);
        $decodedResponse = json_decode($requestResponse->getBody()->getContents());

        //Asserts
        $this->assertEquals(true, $decodedResponse->success);
    }

    public function testProductUpdateShouldSucceed()
    {
        //Arrange
        $productId = $this->createTestProduct();
        $attributes = [
            'id' => $productId,
            'name' => 'Updated Name',
            'description' => 'Updated Product Description'
        ];

        //Act
        $requestResponse = $this->productClient->updateRequest($attributes);
        $decodedResponse = json_decode($requestResponse->getBody()->getContents());
    
        //Asserts
        $this->assertInstanceOf(ResponseInterface::class, $requestResponse);
        $this->assertEquals('Updated Name', $decodedResponse->data->name);
        $this->assertEquals('Updated Product Description', $decodedResponse->data->description);
    }
}
