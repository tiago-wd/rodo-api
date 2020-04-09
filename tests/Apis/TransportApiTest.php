<?php namespace Tests\Apis;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Transport;

class TransportApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_transport()
    {
        $transport = factory(Transport::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/transports', $transport
        );

        $this->assertApiResponse($transport);
    }

    /**
     * @test
     */
    public function test_read_transport()
    {
        $transport = factory(Transport::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/transports/'.$transport->id
        );

        $this->assertApiResponse($transport->toArray());
    }

    /**
     * @test
     */
    public function test_update_transport()
    {
        $transport = factory(Transport::class)->create();
        $editedTransport = factory(Transport::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/transports/'.$transport->id,
            $editedTransport
        );

        $this->assertApiResponse($editedTransport);
    }

    /**
     * @test
     */
    public function test_delete_transport()
    {
        $transport = factory(Transport::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/transports/'.$transport->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/transports/'.$transport->id
        );

        $this->response->assertStatus(404);
    }
}
