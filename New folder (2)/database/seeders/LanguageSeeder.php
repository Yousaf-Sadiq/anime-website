<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Languages;
use  DateTime;
use \Illuminate\Support\Facades\File;
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $languages = File::get('database/contents/languages.json');
        // $languages = File::getRemote(URL("/").'components/database/contents/languages.json');

        $languages = json_decode($languages);

        foreach ($languages as $language) {

          Languages::create(array(
            "id"         => $language->id,
            "name"       => $language->name,
            "code"       => $language->code,
            "default"    => $language->default,
            "status"     => true,
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
          ));

        }

    }
}
