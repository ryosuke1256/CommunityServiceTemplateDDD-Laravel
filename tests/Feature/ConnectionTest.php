<?php

namespace Tests\Feature;

use App\Models\UserModel;
use Tests\TestCase;

class ConnectionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTopPageConnection()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // TODO:テスト用のDBを作成する or テスト用のRepositoryを作成する
    public function testDbConnection()
    {
        UserModel::where('name', 'exampleName')->delete();
        UserModel::create([
            'name' => 'exampleName',
            'email' => 'example123@mail.com',
            'password' => 'testPassword',
        ]);
        // 作成したユーザーがdbにあるかチェック
        $this->assertDatabaseHas('users', [
            'name' => 'exampleName',
            'email' => 'example123@mail.com',
            'password' => 'testPassword',
        ]);
    }
}
