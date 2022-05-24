<?php

use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\About::create(
            [
                'title'          => 'About Us',
                'description'    => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'icon_one'       => 'bx bx-receipt',
                'title_one'      => 'Corporis voluptates sit',
                'subtitle_one'   => 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip',
                'icon_two'       => 'bx bx-cube-alt',
                'title_two'      => 'Ullamco laboris nisi',
                'subtitle_two'   => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt',
                'icon_three'     => 'bx bx-images',
                'title_three'    => 'Labore consequatur',
                'subtitle_three' => 'Sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip',
                'icon_four'      => 'bx bx-shield',
                'title_four'     => 'Beatae veritatis',
                'subtitle_four'  => 'Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta',
            ]
        );
    }
}
