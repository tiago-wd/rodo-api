<?php namespace Tests\Apis;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TransportType;

class TransportTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_transport_type()
    {
        $transportType = factory(TransportType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/transport_types', $transportType
        );

        $this->assertApiResponse($transportType);
    }

    /**
     * @test
     */
    public function test_read_transport_type()
    {
        $transportType = factory(TransportType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/transport_types/'.$transportType->id
        );

        $this->assertApiResponse($transportType->toArray());
    }

    /**
     * @test
     */
    public function test_update_transport_type()
    {
        $transportType = factory(TransportType::class)->create();
        $editedTransportType = factory(TransportType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/transport_types/'.$transportType->id,
            $editedTransportType
        );

        $this->assertApiResponse($editedTransportType);
    }

    /**
     * @test
     */
    public function test_delete_transport_type()
    {
        $transportType = factory(TransportType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/transport_types/'.$transportType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/transport_types/'.$transportType->id
        );

        $this->response->assertStatus(404);
    }
}
