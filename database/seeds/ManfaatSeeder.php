<?php

use Illuminate\Database\Seeder;

class ManfaatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ManfaatSetting::create(
            [
                'title'                     => 'Manfaat',
                'description'               => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'icon_one'                  => 'bx bxl-dribbble',
                'title_one'                 => 'Lorem ipsum dolor sit amet',
                'short_description_one'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'icon_two'                  => 'bx bx-file',
                'title_two'                 => 'Lorem ipsum dolor sit amet',
                'short_description_two'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'icon_three'                => 'bx bx-tachometer',
                'title_three'               => 'Lorem ipsum dolor sit amet',
                'short_description_three'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'icon_four'                 => 'bx bx-layer',
                'title_four'                => 'Lorem ipsum dolor sit amet',
                'short_description_four'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            ]
        );
    }
}
