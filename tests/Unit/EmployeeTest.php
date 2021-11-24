<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLoadUnauthorisedEmployee()
    {
        $response = $this->get('/employee');
        
        $response->assertStatus(200);
        $response->assertSee('/login');
        $response->assertDontSee('/employee');
    }
}
