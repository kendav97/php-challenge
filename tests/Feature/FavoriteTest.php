<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\UserFavoriteGift;

class FavoriteTest extends TestCase
{
    public function test_save_favorite(): void
    {
        $token = $this->getToken();

        $response = $this->withHeader('Authorization', 'Bearer '.$token)->post('/api/v1.0/user/1/favorite', [
            'gift_id' => 'l4FGlmD871ayCC3cs',
            'alias' => 'Testing',
        ]);

        $response->assertStatus(200);

        $userFavoriteGift = new UserFavoriteGift();

        $this->assertDatabaseHas($userFavoriteGift->getTable(), [
            'user_id' => 1,
            'gift_id' => 'l4FGlmD871ayCC3cs',
            'alias' => 'Testing',
        ]);
    }

    public function test_get_all_favorites(): void
    {
        $token = $this->getToken();

        $response = $this->withHeader('Authorization', 'Bearer '.$token)->get('/api/v1.0/user/favorite');

        $response->assertStatus(200);
    }
}
