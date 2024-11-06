<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the statuses you want to add
        $statuses = [
            ['name' => 'Pending'],
            ['name' => 'Approved'],
            ['name' => 'Cancelled'],
            ['name' => 'Declined'],
        ];

        // Insert statuses into the database
        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
