<?php

namespace Database\Factories;

use App\Models\Journal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JournalAccessUser>
 */
class JournalAccessUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $journal = Journal::factory()->create();
        $user = User::factory()->create();
        return [
            'journal_id' => $journal->id,
            'user_id' => $user->id,
        ];
    }
}
