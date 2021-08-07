<?php

namespace Database\Seeders;

use App\Models\Exercice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Exercice::factory()->create([
            'name' => 'Pompes',
            'description' => 'Probablement l\'exercice le plus rigolo.',
            'video_url' => 'https://www.youtube.com/watch?v=v9LABVJzv8A',
            'is_enabled' => true,
        ]);
        Exercice::factory()->create([
            'name' => 'Squats',
            'description' => 'Faire genre t\'es assis mais sans chaise.',
            'video_url' => 'https://www.youtube.com/watch?v=Zqc_lc93hak',
            'is_enabled' => true,
        ]);
        Exercice::factory()->create([
            'name' => 'Abdos',
            'description' => 'La tablette de sheecoula est en toi.',
            'video_url' => 'https://www.youtube.com/watch?v=HiRsmHH7psA',
            'is_enabled' => true,
        ]);
    }
}
