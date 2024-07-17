<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class GiphyTest extends TestCase
{
    public function test_search(): void
    {
        $token = $this->getToken();

        $response = $this->withHeader('Authorization', 'Bearer '.$token)->get('/api/v1.0/giphy/search?query=test');

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) => 
            $json->has('pagination', fn (AssertableJson $json) => 
                $json->where('count', 25)
                ->etc()
            )
            ->has('meta', fn (AssertableJson $json) => 
                $json->where('status', 200)
                ->etc()
            )
            ->etc()
        );
    }

    public function test_get_by_id(): void
    {
        $token = $this->getToken();

        $response = $this->withHeader('Authorization', 'Bearer '.$token)->get('/api/v1.0/giphy/l4FGlmD871ayCC3cs');

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) => 
            $json->has('data', fn (AssertableJson $json) => 
                $json->where('id', 'l4FGlmD871ayCC3cs')
                ->etc()
            )
            ->has('meta', fn (AssertableJson $json) => 
                $json->where('status', 200)
                ->etc()
            )
            ->etc()
        );
    }
}
