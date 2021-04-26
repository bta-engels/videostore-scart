<?php

namespace Tests\Feature;

use App\Models\User;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use AssertionError;
use Tests\TestCase;
use Route;

class ExampleTest extends TestCase
{
    private $_testRoutes = [
        '/author',
        '/login',
        '/register',
        '/author/show/1',
        '/movie',
        '/movie/show/1',
        '/author',
        '/author/show/1',
        '/order',
        '/order/show/1',
    ];

    protected $followRedirects = true;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $routes = collect(Route::getRoutes()->getRoutesByName());
        $user = User::whereEmail('engels@goldenacker.de')->first();

        foreach($this->_testRoutes as $route){
            try {
                $response = $this->get($route);
                $response->assertStatus(200);
                echo "\nhttp-test: $route (".$response->getStatusCode().")";
            }
            catch (Exception $e) {
                echo "\nerror on $route: " . $e->getMessage();
            }

        }
    }
}
