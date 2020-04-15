<?php namespace Tests\Apis;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Bid;

class BidApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bid()
    {
        $bid = factory(Bid::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bids', $bid
        );

        $this->assertApiResponse($bid);
    }

    /**
     * @test
     */
    public function test_read_bid()
    {
        $bid = factory(Bid::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bids/'.$bid->id
        );

        $this->assertApiResponse($bid->toArray());
    }

    /**
     * @test
     */
    public function test_update_bid()
    {
        $bid = factory(Bid::class)->create();
        $editedBid = factory(Bid::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bids/'.$bid->id,
            $editedBid
        );

        $this->assertApiResponse($editedBid);
    }

    /**
     * @test
     */
    public function test_delete_bid()
    {
        $bid = factory(Bid::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bids/'.$bid->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bids/'.$bid->id
        );

        $this->response->assertStatus(404);
    }
}
