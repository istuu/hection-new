<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // if(\DB::table('menus')->count() == 0)
        // {
        //     $this->call(StarterSeed::class);
        // }

        $this->call(MenuSeed::class);
        // $this->call(AboutSeed::class);
        // $this->call(PrizeSeed::class);
        // $this->call(VenueSeed::class);
        // $this->call(ConfigSeed::class);
        // $this->call(TestimonialBannerSeed::class);
    }
}
