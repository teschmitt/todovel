<?php

namespace Tests\Feature;

use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{

    use RefreshDatabase;

    public function testNoTasksInFreshDB() {
        $response = $this->get('/tasks');
        $response->assertSeeText('There is nothing here');
    }

    public function testCreateTask()
    {
        $taskTitle = "New test Task";
        $u = User::create([
            'email' => 'bullwinkle@gmail.com',
            'name' => 'Bull Winkle',
            'password' => bcrypt('secret123*'),
        ]);

        $task = new Task();
        $task->title = $taskTitle;
        $task->description = "Description of task test 1";
        $task->user_id = $u->id;
        $task->save();

        $response = $this->get('/tasks');
        $response->assertSeeText($taskTitle);

        $this->assertDatabaseHas('tasks', [
            'title' => $taskTitle
        ]);
    }
}
