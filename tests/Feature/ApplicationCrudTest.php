<?php

namespace Tests\Feature;

use App\Models\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Tests\TestCase;

class ApplicationCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware(ValidateCsrfToken::class);
    }

    public function test_index_page_is_accessible(): void
    {
        $response = $this->get(route('applications.index'));

        $response->assertOk();
        $response->assertSee('申込一覧');
    }

    public function test_create_and_show_application(): void
    {
        $postResponse = $this->post(route('applications.store'), [
            'name' => '  山田太郎  ',
            'email' => '  taro@example.com ',
            'message' => '  こんにちは  ',
        ]);

        $application = Application::query()->firstOrFail();

        $this->assertSame('山田太郎', $application->name);
        $this->assertSame('taro@example.com', $application->email);
        $this->assertSame('こんにちは', $application->message);

        $postResponse->assertRedirect(route('applications.show', $application));

        $showResponse = $this->get(route('applications.show', $application));
        $showResponse->assertOk();
        $showResponse->assertSee('申込詳細');
        $showResponse->assertSee('山田太郎');
    }

    public function test_update_application(): void
    {
        $application = Application::factory()->create([
            'name' => '初期',
            'email' => 'initial@example.com',
            'message' => 'hello',
        ]);

        $response = $this->put(route('applications.update', $application), [
            'name' => '更新後',
            'email' => 'updated@example.com',
            'message' => '',
        ]);

        $response->assertRedirect(route('applications.show', $application));

        $application->refresh();
        $this->assertSame('更新後', $application->name);
        $this->assertSame('updated@example.com', $application->email);
        $this->assertNull($application->message);
    }

    public function test_delete_application(): void
    {
        $application = Application::factory()->create();

        $response = $this->delete(route('applications.destroy', $application));

        $response->assertRedirect(route('applications.index'));
        $this->assertDatabaseMissing('applications', ['id' => $application->id]);
    }

    public function test_show_missing_application_returns_404(): void
    {
        $response = $this->get('/applications/999999');
        $response->assertNotFound();
        $response->assertSee('404');
    }

    public function test_validation_errors_on_store(): void
    {
        $response = $this->from(route('applications.create'))->post(route('applications.store'), [
            'name' => '',
            'email' => 'not-an-email',
            'message' => str_repeat('a', 2001),
        ]);

        $response->assertRedirect(route('applications.create'));
        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }

    public function test_validation_errors_on_update(): void
    {
        $application = Application::factory()->create();

        $response = $this->from(route('applications.edit', $application))->put(route('applications.update', $application), [
            'name' => '',
            'email' => 'x',
            'message' => str_repeat('a', 2001),
        ]);

        $response->assertRedirect(route('applications.edit', $application));
        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }
}
