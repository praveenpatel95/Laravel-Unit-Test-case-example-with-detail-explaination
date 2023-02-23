<?php

namespace Tests;

trait AuthAccess
{
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

    public function accessHeaderWithoutLogin()
    {
        $token = $this->getToken();
        return [
            'Authorization' => 'Bearer ',
            'Accept' => 'application/json',
            "Content-Type" => "multipart/form-data",
        ];
    }
}
