<?php

namespace Tests\Feature;

use App\Models\Pool;
use App\Models\Problem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

// 出題者的題庫測試
class QuestionBankTest extends TestCase
{
    // apiResource Test

    // index test
    public function test_list_users_pool()
    {
        $user = User::factory()->create();

        $user->pools()->create([
            'name' => 'test',
            'description' => 'test',
            'public' => false
        ]);

        Sanctum::actingAs($user);

        $this->getJson('/api/question_bank/pools')->assertStatus(200)->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'description',
                'public',
                'created_at',
                'updated_at'
            ]
        ])->assertJsonCount(1);
    }

}
