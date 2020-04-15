<?php namespace Tests\Repositories;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserRepository
     */
    protected $userRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userRepo = \App::make(UserRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user()
    {
        $user = factory(User::class)->make()->toArray();
        $createdUser = $this->userRepo->create($user);
        
        $createdUser = $createdUser->toArray();

        // TODO: fix attribute (avatar_url) test
        unset($user['avatar_url']);
        unset($createdUser['avatar_url']);
        $this->assertArrayHasKey('id', $createdUser);
        $this->assertNotNull($createdUser['id'], 'Created User must have id specified');
        $this->assertNotNull(User::find($createdUser['id']), 'User with given id must be in DB');
        $this->assertModelData($user, $createdUser);
    }

    /**
     * @test read
     */
    public function test_read_user()
    {
        $user = factory(User::class)->create();

        $dbUser = $this->userRepo->find($user->id);
        $user = $user->toArray();
        
        $dbUser = $dbUser->toArray();

        // TODO: fix attribute (avatar_url) test
        unset($user['avatar_url']);
        unset($dbUser['avatar_url']);

        $this->assertModelData($user, $dbUser);
    }

    /**
     * @test update
     */
    public function test_update_user()
    {
        $user = factory(User::class)->create();
        $fakeUser = factory(User::class)->make()->toArray();
        // TODO: fix attribute (avatar_url) test
        unset($fakeUser['avatar_url']);

        $updatedUser = $this->userRepo->update($fakeUser, $user->id);

        // TODO: fix attribute (avatar_url) test
        $updatedUser = $updatedUser->toArray();
        unset($updatedUser['avatar_url']);

        $this->assertModelData($fakeUser, $updatedUser);
        $dbUser = $this->userRepo->find($user->id);
        
        // TODO: fix attribute (avatar_url) test
        $dbUser = $dbUser->toArray();
        unset($dbUser['avatar_url']);
        
        $this->assertModelData($fakeUser, $dbUser);
    }

    /**
     * @test delete
     */
    public function test_delete_user()
    {
        $user = factory(User::class)->create();

        $resp = $this->userRepo->delete($user->id);

        $this->assertTrue($resp);
        $this->assertNull(User::find($user->id), 'User should not exist in DB');
    }
}
