<?php namespace Tests\Repositories;

use App\Models\CargoType;
use App\Repositories\CargoTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CargoTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CargoTypeRepository
     */
    protected $cargoTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cargoTypeRepo = \App::make(CargoTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cargo_type()
    {
        $cargoType = factory(CargoType::class)->make()->toArray();

        $createdCargoType = $this->cargoTypeRepo->create($cargoType);

        $createdCargoType = $createdCargoType->toArray();
        $this->assertArrayHasKey('id', $createdCargoType);
        $this->assertNotNull($createdCargoType['id'], 'Created CargoType must have id specified');
        $this->assertNotNull(CargoType::find($createdCargoType['id']), 'CargoType with given id must be in DB');
        $this->assertModelData($cargoType, $createdCargoType);
    }

    /**
     * @test read
     */
    public function test_read_cargo_type()
    {
        $cargoType = factory(CargoType::class)->create();

        $dbCargoType = $this->cargoTypeRepo->find($cargoType->id);

        $dbCargoType = $dbCargoType->toArray();
        $this->assertModelData($cargoType->toArray(), $dbCargoType);
    }

    /**
     * @test update
     */
    public function test_update_cargo_type()
    {
        $cargoType = factory(CargoType::class)->create();
        $fakeCargoType = factory(CargoType::class)->make()->toArray();

        $updatedCargoType = $this->cargoTypeRepo->update($fakeCargoType, $cargoType->id);

        $this->assertModelData($fakeCargoType, $updatedCargoType->toArray());
        $dbCargoType = $this->cargoTypeRepo->find($cargoType->id);
        $this->assertModelData($fakeCargoType, $dbCargoType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cargo_type()
    {
        $cargoType = factory(CargoType::class)->create();

        $resp = $this->cargoTypeRepo->delete($cargoType->id);

        $this->assertTrue($resp);
        $this->assertNull(CargoType::find($cargoType->id), 'CargoType should not exist in DB');
    }
}
