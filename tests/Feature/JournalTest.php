<?php

namespace Tests\Feature;

use App\Models\Journal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class JournalTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Without auth
    public function test_not_get_all_journals_without_login()
    {

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ',
            'Accept' => 'application/json'
        ])->get('/api/journals');

        $response
            ->assertUnauthorized();
        //->assertStatus(401);
    }

    //With auth
    public function test_get_all_journals_with_login()
    {
        $response = $this
            ->withHeaders($this->accessHeader())->get('/api/journals');

        $response->assertStatus(200);
    }

    public function test_create_new_journal()
    {
        $newdata = Journal::factory()->raw();
        $response = $this
            ->withHeaders($this->accessHeader())->post('/api/journals', $newdata);

        $response->assertStatus(200);
    }

    public function test_update_journal()
    {
        $newdata = Journal::factory()->create();
        $response = $this
            ->withHeaders($this->accessHeader())
            ->put("/api/journals/$newdata->id",
                ['name' => 'Its update', 'banner_content' => 'Its testing']);

        $response->assertStatus(200);
    }

    public function test_delete_journal()
    {
        $journal = Journal::factory()->create();
        $this->withHeaders($this->accessHeader())
            ->delete('/api/journals/' . $journal->id)
            ->assertStatus(200);

    }

    public function getToken()
    {
        //$user = User::factory()->create();
        $data = [
            'email' => 'super_admin@gmail.com',
            'password' => '123456'
        ];
        $response = $this->post('/api/auth/login', $data)
            ->assertStatus(200);
        return $response['data']['token'];
    }

    public function accessHeader()
    {
        $token = $this->getToken();
        return [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
            "Content-Type" => "multipart/form-data",
        ];
    }


}
