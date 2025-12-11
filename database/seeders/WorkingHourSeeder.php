<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkingHour;

class WorkingHourSeeder extends Seeder
{
    public function run()
    {
        WorkingHour::create(['day' => 'monday', 'open_time' => '09:00', 'close_time' => '21:00', 'is_closed' => false]);
        WorkingHour::create(['day' => 'tuesday', 'open_time' => '09:00', 'close_time' => '21:00', 'is_closed' => false]);
        WorkingHour::create(['day' => 'wednesday', 'open_time' => '09:00', 'close_time' => '21:00', 'is_closed' => false]);
        WorkingHour::create(['day' => 'thursday', 'open_time' => '09:00', 'close_time' => '21:00', 'is_closed' => false]);
        WorkingHour::create(['day' => 'friday', 'open_time' => '09:00', 'close_time' => '21:00', 'is_closed' => false]);
        WorkingHour::create(['day' => 'saturday', 'open_time' => null, 'close_time' => null, 'is_closed' => true]);
        WorkingHour::create(['day' => 'sunday', 'open_time' => null, 'close_time' => null, 'is_closed' => true]);
    }
}
