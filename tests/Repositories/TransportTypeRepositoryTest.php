<?php namespace Tests\Repositories;

use App\Models\TransportType;
use App\Repositories\TransportTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TransportTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransportTypeRepository
     */
    protected $transportTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->transportTypeRepo = \App::make(TransportTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_transport_type()
    {
        $transportType = factory(TransportType::class)->make()->toArray();

        $createdTransportType = $this->transportTypeRepo->create($transportType);

        $createdTransportType = $createdTransportType->toArray();
        $this->assertArrayHasKey('id', $createdTransportType);
        $this->assertNotNull($createdTransportType['id'], 'Created TransportType must have id specified');
        $this->assertNotNull(TransportType::find($createdTransportType['id']), 'TransportType with given id must be in DB');
        $this->assertModelData($transportType, $createdTransportType);
    }

    /**
     * @test read
     */
    public function test_read_transport_type()
    {
        $transportType = factory(TransportType::class)->create();

        $dbTransportType = $this->transportTypeRepo->find($transportType->id);

        $dbTransportType = $dbTransportType->toArray();
        $this->assertModelData($transportType->toArray(), $dbTransportType);
    }

    /**
     * @test update
     */
    public function test_update_transport_type()
    {
        $transportType = factory(TransportType::class)->create();
        $fakeTransportType = factory(TransportType::class)->make()->toArray();

        $updatedTransportType = $this->transportTypeRepo->update($fakeTransportType, $transportType->id);

        $this->assertModelData($fakeTransportType, $updatedTransportType->toArray());
        $dbTransportType = $this->transportTypeRepo->find($transportType->id);
        $this->assertModelData($fakeTransportType, $dbTransportType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_transport_type()
    {
        $transportType = factory(TransportType::class)->create();

        $resp = $this->transportTypeRepo->delete($transportType->id);

        $this->assertTrue($resp);
        $this->assertNull(TransportType::find($transportType->id), 'TransportType should not exist in DB');
    }
}
