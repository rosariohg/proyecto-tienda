<?php

use App\Models\Producto;
use App\Repositories\ProductoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductoRepositoryTest extends TestCase
{
    use MakeProductoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProductoRepository
     */
    protected $productoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->productoRepo = App::make(ProductoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProducto()
    {
        $producto = $this->fakeProductoData();
        $createdProducto = $this->productoRepo->create($producto);
        $createdProducto = $createdProducto->toArray();
        $this->assertArrayHasKey('id', $createdProducto);
        $this->assertNotNull($createdProducto['id'], 'Created Producto must have id specified');
        $this->assertNotNull(Producto::find($createdProducto['id']), 'Producto with given id must be in DB');
        $this->assertModelData($producto, $createdProducto);
    }

    /**
     * @test read
     */
    public function testReadProducto()
    {
        $producto = $this->makeProducto();
        $dbProducto = $this->productoRepo->find($producto->id);
        $dbProducto = $dbProducto->toArray();
        $this->assertModelData($producto->toArray(), $dbProducto);
    }

    /**
     * @test update
     */
    public function testUpdateProducto()
    {
        $producto = $this->makeProducto();
        $fakeProducto = $this->fakeProductoData();
        $updatedProducto = $this->productoRepo->update($fakeProducto, $producto->id);
        $this->assertModelData($fakeProducto, $updatedProducto->toArray());
        $dbProducto = $this->productoRepo->find($producto->id);
        $this->assertModelData($fakeProducto, $dbProducto->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProducto()
    {
        $producto = $this->makeProducto();
        $resp = $this->productoRepo->delete($producto->id);
        $this->assertTrue($resp);
        $this->assertNull(Producto::find($producto->id), 'Producto should not exist in DB');
    }
}
