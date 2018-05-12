<?php

use App\Models\Consumir;
use App\Repositories\ConsumirRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsumirRepositoryTest extends TestCase
{
    use MakeConsumirTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConsumirRepository
     */
    protected $consumirRepo;

    public function setUp()
    {
        parent::setUp();
        $this->consumirRepo = App::make(ConsumirRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateConsumir()
    {
        $consumir = $this->fakeConsumirData();
        $createdConsumir = $this->consumirRepo->create($consumir);
        $createdConsumir = $createdConsumir->toArray();
        $this->assertArrayHasKey('id', $createdConsumir);
        $this->assertNotNull($createdConsumir['id'], 'Created Consumir must have id specified');
        $this->assertNotNull(Consumir::find($createdConsumir['id']), 'Consumir with given id must be in DB');
        $this->assertModelData($consumir, $createdConsumir);
    }

    /**
     * @test read
     */
    public function testReadConsumir()
    {
        $consumir = $this->makeConsumir();
        $dbConsumir = $this->consumirRepo->find($consumir->id);
        $dbConsumir = $dbConsumir->toArray();
        $this->assertModelData($consumir->toArray(), $dbConsumir);
    }

    /**
     * @test update
     */
    public function testUpdateConsumir()
    {
        $consumir = $this->makeConsumir();
        $fakeConsumir = $this->fakeConsumirData();
        $updatedConsumir = $this->consumirRepo->update($fakeConsumir, $consumir->id);
        $this->assertModelData($fakeConsumir, $updatedConsumir->toArray());
        $dbConsumir = $this->consumirRepo->find($consumir->id);
        $this->assertModelData($fakeConsumir, $dbConsumir->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteConsumir()
    {
        $consumir = $this->makeConsumir();
        $resp = $this->consumirRepo->delete($consumir->id);
        $this->assertTrue($resp);
        $this->assertNull(Consumir::find($consumir->id), 'Consumir should not exist in DB');
    }
}
