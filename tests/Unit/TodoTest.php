<?php

namespace Tests\Unit;

use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PDOException;
use Tests\TestCase;

class TodoTest extends TestCase
{

    use RefreshDatabase;

    public function testStatusCanOnlyOpenOrClosed()
    {
        list($message, $code) = $this->testRequiredFields('status', 'foobar');
        $this->assertStringContainsString('CHECK constraint failed: todos', $message);
        $this->assertEquals(23000, $code);
    }

    public function testTodoStatusRequired()
    {

        list($message, $code) = $this->testRequiredFields('status');
        $this->assertStringContainsString('NOT NULL constraint failed: todos.status', $message);
        $this->assertEquals(23000, $code);
    }

    public function testTodoUserIdRequired()
    {

        list($message, $code) = $this->testRequiredFields('user_id');
        $this->assertStringContainsString('NOT NULL constraint failed: todos.user_id', $message);
        $this->assertEquals(23000, $code);
    }

    public function testTodoDescriptionRequired()
    {

        list($message, $code) = $this->testRequiredFields('description');
        $this->assertStringContainsString('NOT NULL constraint failed: todos.description', $message);
        $this->assertEquals(23000, $code);
    }

    public function testTodoTitleRequired()
    {

        list($message, $code) = $this->testRequiredFields('title');
        $this->assertStringContainsString('NOT NULL constraint failed: todos.title', $message);
        $this->assertEquals(23000, $code);
    }


    protected function testRequiredFields($fieldName, $value = null)
    {
        $message = null;
        $code = null;

        try {
            $todo = factory(Todo::class)->create([
                $fieldName => $value
            ]);
        } catch (PDOException $e) {
            $message = $e->getMessage();
            $code = $e->getCode();
        }

        return [$message, $code];
    }
}
