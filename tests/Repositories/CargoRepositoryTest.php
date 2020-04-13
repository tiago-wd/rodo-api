<?php namespace Tests\Repositories;

use App\Models\Cargo;
use App\Repositories\CargoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CargoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CargoRepository
     */
    protected $cargoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cargoRepo = \App::make(CargoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cargo()
    {
        $cargo = factory(Cargo::class)->make()->toArray();

        $createdCargo = $this->cargoRepo->create($cargo);

        $createdCargo = $createdCargo->toArray();
        $this->assertArrayHasKey('id', $createdCargo);
        $this->assertNotNull($createdCargo['id'], 'Created Cargo must have id specified');
        $this->assertNotNull(Cargo::find($createdCargo['id']), 'Cargo with given id must be in DB');
        $this->assertModelData($cargo, $createdCargo);
    }

    /**
     * @test read
     */
    public function test_read_cargo()
    {
        $cargo = factory(Cargo::class)->create();

        $dbCargo = $this->cargoRepo->find($cargo->id);

        $dbCargo = $dbCargo->toArray();
        $this->assertModelData($cargo->toArray(), $dbCargo);
    }

    /**
     * @test update
     */
    public function test_update_cargo()
    {
        $cargo = factory(Cargo::class)->create();
        $fakeCargo = factory(Cargo::class)->make()->toArray();

        $updatedCargo = $this->cargoRepo->update($fakeCargo, $cargo->id);

        $this->assertModelData($fakeCargo, $updatedCargo->toArray());
        $dbCargo = $this->cargoRepo->find($cargo->id);
        $this->assertModelData($fakeCargo, $dbCargo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cargo()
    {
        $cargo = factory(Cargo::class)->create();

        $resp = $this->cargoRepo->delete($cargo->id);

        $this->assertTrue($resp);
        $this->assertNull(Cargo::find($cargo->id), 'Cargo should not exist in DB');
    }
}
