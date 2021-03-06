<?php

namespace Modules\User\Tests\Unit\Services;

use Tests\TestCase;
use Modules\User\Entities\User;
use Modules\User\Services\UserService;

class UserServiceTest extends TestCase
{
    protected $user_service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user_service = new UserService();
    }

    public function test_route_update_exception()
    {
        $this->expectException(\Exception::class);

        $this->user_service->update([]);
    }

    public function test_route_delete_exception()
    {
        $this->expectException(\Exception::class);

        $user = $this->mock(User::class);

        $this->user_service->removeData($user);
    }
}
