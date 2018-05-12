<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsumirApiTest extends TestCase
{
    use MakeConsumirTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateConsumir()
    {
        $consumir = $this->fakeConsumirData();
        $this->json('POST', '/api/v1/consumirs', $consumir);

        $this->assertApiResponse($consumir);
    }

    /**
     * @test
     */
    public function testReadConsumir()
    {
        $consumir = $this->makeConsumir();
        $this->json('GET', '/api/v1/consumirs/'.$consumir->id);

        $this->assertApiResponse($consumir->toArray());
    }

    /**
     * @test
     */
    public function testUpdateConsumir()
    {
        $consumir = $this->makeConsumir();
        $editedConsumir = $this->fakeConsumirData();

        $this->json('PUT', '/api/v1/consumirs/'.$consumir->id, $editedConsumir);

        $this->assertApiResponse($editedConsumir);
    }

    /**
     * @test
     */
    public function testDeleteConsumir()
    {
        $consumir = $this->makeConsumir();
        $this->json('DELETE', '/api/v1/consumirs/'.$consumir->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/consumirs/'.$consumir->id);

        $this->assertResponseStatus(404);
    }
}
