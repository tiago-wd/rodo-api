<?php namespace Tests\Apis;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CargoType;

class CargoTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    // Not necessary at the moment
    // public function test_create_cargo_type()
    // {
    //     $cargoType = factory(CargoType::class)->make()->toArray();

    //     $this->response = $this->json(
    //         'POST',
    //         '/api/cargo_types', $cargoType
    //     );

    //     $this->assertApiResponse($cargoType);
    // }

    /**
     * @test
     */
    public function test_read_cargo_type()
    {
        $cargoType = factory(CargoType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/cargo_types/'.$cargoType->id
        );

        $this->assertApiResponse($cargoType->toArray());
    }

    /**
     * @test
     */
    // Not necessary at the moment
    // public function test_update_cargo_type()
    // {
    //     $cargoType = factory(CargoType::class)->create();
    //     $editedCargoType = factory(CargoType::class)->make()->toArray();

    //     $this->response = $this->json(
    //         'PUT',
    //         '/api/cargo_types/'.$cargoType->id,
    //         $editedCargoType
    //     );

    //     $this->assertApiResponse($editedCargoType);
    // }

    /**
     * @test
     */
    // Not necessary at the moment
    // public function test_delete_cargo_type()
    // {
    //     $cargoType = factory(CargoType::class)->create();

    //     $this->response = $this->json(
    //         'DELETE',
    //          '/api/cargo_types/'.$cargoType->id
    //      );

    //     $this->assertApiSuccess();
    //     $this->response = $this->json(
    //         'GET',
    //         '/api/cargo_types/'.$cargoType->id
    //     );

    //     $this->response->assertStatus(404);
    // }
}
