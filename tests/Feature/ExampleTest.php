<?php

namespace Tests\Feature;

use App\TodoList;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $this->user = User::where('email', 'admin@gmail.com')->first();
    }

    /**
     * Login test
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->post('api/auth/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'token',
            ]
        ]);
    }

    public function testTokenStatus()
    {
        $response = $this->actingAs($this->user, 'api')->get('api/auth/token-status');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'issued_at',
                'expired_at',
                'ttl',
            ]
        ]);
    }

    public function testRefreshToken()
    {
        $response = $this->actingAs($this->user, 'api')->get('api/auth/refresh-token');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'token',
            ]
        ]);
    }

    public function testCreateTodoList()
    {
        $data = [
            'title' => 'Title',
            'content' => [
                ['name' => 'aaa'],
                ['name' => 'bbb'],
                ['name' => 'ccc'],
            ],
            'attachment' => 'http://content.drive.com/xxxx.zip',
        ];

        $response = $this->actingAs($this->user, 'api')->post('api/todo-list', $data);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => $data
        ]);
    }

    public function testUpdateTodoList()
    {
        $todoList = TodoList::first();
        $now = now();

        $response = $this->actingAs($this->user, 'api')->patch('api/todo-list/' . $todoList->id, [
            'done_at' => $now,
        ]);

        $todoList->refresh();

        $response->assertStatus(200);
        $this->assertEquals($todoList->done_at->toDateTimeString(), $now->toDateTimeString());
    }

    public function testDeleteTodoList()
    {
        $todoList = TodoList::first();

        $response = $this->actingAs($this->user, 'api')->delete('api/todo-list/' . $todoList->id);

        $find = TodoList::find($todoList->id);

        $response->assertStatus(200);
        $this->assertTrue(empty($find));
    }
}
