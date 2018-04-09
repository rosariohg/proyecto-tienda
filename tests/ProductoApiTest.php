<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductoApiTest extends TestCase
{
    use MakeProductoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProducto()
    {
        $producto = $this->fakeProductoData();
        $this->json('POST', '/api/v1/productos', $producto);

        $this->assertApiResponse($producto);
    }

    /**
     * @test
     */
    public function testReadProducto()
    {
        $producto = $this->makeProducto();
        $this->json('GET', '/api/v1/productos/'.$producto->id);

        $this->assertApiResponse($producto->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProducto()
    {
        $producto = $this->makeProducto();
        $editedProducto = $this->fakeProductoData();

        $this->json('PUT', '/api/v1/productos/'.$producto->id, $editedProducto);

        $this->assertApiResponse($editedProducto);
    }

    /**
     * @test
     */
    public function testDeleteProducto()
    {
        $producto = $this->makeProducto();
        $this->json('DELETE', '/api/v1/productos/'.$producto->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/productos/'.$producto->id);

        $this->assertResponseStatus(404);
    }
}
