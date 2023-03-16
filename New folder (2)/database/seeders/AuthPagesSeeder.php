<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  DateTime;
use \Illuminate\Support\Facades\File;
use App\Models\Admin\AuthPages;

class AuthPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authpages = File::get('database/contents/authpages.json');

        $authpages = json_decode($authpages);

        foreach ($authpages as $authpage) {

          AuthPages::create(array(
            "id"         => $authpage->id,
            "name"       => $authpage->name,
            "status"     => true,
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
          ));

        }
    }
}
