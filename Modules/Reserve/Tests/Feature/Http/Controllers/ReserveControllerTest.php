<?php

namespace Modules\Reserve\Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use Modules\Flight\Entities\Flight;
use Modules\Reserve\Entities\Reserve;

class ReserveControllerTest extends TestCase
{
    public function test_route_index()
    {
        $response = $this->get(route('reserve.index'));

        $response->assertSuccessful();

        $response->assertSee('Reservas');
    }

    public function test_route_create()
    {
        $response = $this->get(route('reserve.create'));

        $response->assertSuccessful();

        $response->assertSee('Reservas');
    }

    public function test_route_store()
    {
        $user = User::factory()->create();

        $flight = Flight::factory()->create();

        $data = [
            'user_id' => $user->id,
            'flight_id' => $flight->id,
            'date_reserved' => '04/01/2022',
            'status' => Reserve::RESERVED
        ];

        $response = $this->post(route('reserve.store'), $data);

        $response->assertRedirect(route('reserve.index'));

        $response->assertSessionHas('message', 'Cadastro realizado com sucesso.');

        $this->assertDatabaseCount('reservations', 1);

        $this->assertDatabaseHas('reservations', [
            'date_reserved' => '04/01/2022'
        ]);
    }

    public function test_route_show()
    {
        $reserve = Reserve::factory()->hasUser()->hasFlight()->create();

        $reserve->load([
            'user',
            'flight'
        ]);

        $response = $this->get(route('reserve.show', [
            'id' => $reserve->id
        ]));

        $response->assertSuccessful();

        $response->assertSee($reserve->name);
    }

    public function test_route_edit()
    {
        $reserve = Reserve::factory()->create();

        $response = $this->get(route('reserve.edit', [
            'id' => $reserve->id
        ]));

        $response->assertSuccessful();

        $response->assertSee($reserve->name);
    }

    public function test_route_update()
    {
        $reserve = Reserve::factory()->hasUser()->hasFlight()->create();

        $user = User::factory()->create();

        $flight = Flight::factory()->create();

        $reserve->load([
            'user',
            'flight'
        ]);

        $data = [
            'user_id' => $user->id,
            'flight_id' => $flight->id,
            'date_reserved' => '04/01/2022',
            'status' => Reserve::RESERVED
        ];


        $response = $this->put(route('reserve.update', $reserve->id), $data);

        $response->assertRedirect(route('reserve.edit', $reserve->id));

        $response->assertSessionHas('message', 'Atualização realizada com sucesso.');

        $this->assertDatabaseHas('reservations', [
            'date_reserved' => '04/01/2022'
        ]);
    }

    public function test_route_confirm_delete()
    {
        $reserve = Reserve::factory()->hasUser()->hasFlight()->create();

        $reserve->load([
            'user',
            'flight'
        ]);

        $response = $this->get(route('reserve.confirm_delete', [
            'id' => $reserve->id
        ]));

        $response->assertSuccessful();

        $response->assertSee($reserve->name);
    }

    public function test_route_delete()
    {
        $reserve = Reserve::factory()->create();

        $response = $this->delete(route('reserve.delete', [
            'id' =>  $reserve->id
        ]));

        $response->assertRedirect(route('reserve.index'));

        $response->assertSessionHas('message', 'Exclusão realizada com sucesso.');

        $this->assertDeleted('reservations', $reserve->toArray());

        $this->assertSoftDeleted($reserve);

        $this->assertDatabaseCount('reservations', 1);
    }
}