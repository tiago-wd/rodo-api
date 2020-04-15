<?php namespace Tests\Repositories;

use App\Models\Bid;
use App\Repositories\BidRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BidRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BidRepository
     */
    protected $bidRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bidRepo = \App::make(BidRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bid()
    {
        $bid = factory(Bid::class)->make()->toArray();

        $createdBid = $this->bidRepo->create($bid);

        $createdBid = $createdBid->toArray();
        $this->assertArrayHasKey('id', $createdBid);
        $this->assertNotNull($createdBid['id'], 'Created Bid must have id specified');
        $this->assertNotNull(Bid::find($createdBid['id']), 'Bid with given id must be in DB');
        $this->assertModelData($bid, $createdBid);
    }

    /**
     * @test read
     */
    public function test_read_bid()
    {
        $bid = factory(Bid::class)->create();

        $dbBid = $this->bidRepo->find($bid->id);

        $dbBid = $dbBid->toArray();
        $this->assertModelData($bid->toArray(), $dbBid);
    }

    /**
     * @test update
     */
    public function test_update_bid()
    {
        $bid = factory(Bid::class)->create();
        $fakeBid = factory(Bid::class)->make()->toArray();

        $updatedBid = $this->bidRepo->update($fakeBid, $bid->id);

        $this->assertModelData($fakeBid, $updatedBid->toArray());
        $dbBid = $this->bidRepo->find($bid->id);
        $this->assertModelData($fakeBid, $dbBid->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bid()
    {
        $bid = factory(Bid::class)->create();

        $resp = $this->bidRepo->delete($bid->id);

        $this->assertTrue($resp);
        $this->assertNull(Bid::find($bid->id), 'Bid should not exist in DB');
    }
}
