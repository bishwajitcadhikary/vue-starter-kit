<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ErrorTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Force production-like behavior so exceptions are rendered
        // via Inertia::handleExceptionsUsing() instead of Laravel's
        // development error modal.
        app()->detectEnvironment(fn () => 'production');
    }

    public function test_renders_error_page()
    {
        $response = $this->get('/non-existent-route');

        $response->assertInertia(fn (Assert $page) => $page
            ->component('Error')
            ->where('code', 404)
        );
    }
}
