<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Social;
use App\Models\Admin\UserSocial;
use  DateTime;
use \Illuminate\Support\Facades\File;
class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = File::get('database/contents/socials.json');

        $socials = json_decode($socials);

        foreach ($socials as $social) {

          Social::create(array(
            "name"       => $social->name,
            "url"        => $social->url,
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
          ));

          UserSocial::create(array(
            "name"       => $social->name,
            "url"        => $social->url,
            "user_id"    => 1,
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
          ));
        }
    }
}
