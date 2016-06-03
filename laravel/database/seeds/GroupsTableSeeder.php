<?php

use Illuminate\Database\Seeder;
use App\Models\Group;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class GroupsTableSeeder extends Seeder
{
    public function run()
    {
      if (Group::count()) {
        return;
      }

      $groups = [
        'A', 'B', 'C', 'D', 'E', 'F',
      ];


      foreach ($groups as $group) {
        Group::create(
          [
            'name' => $group,
          ]
        );
      }
    }
}
