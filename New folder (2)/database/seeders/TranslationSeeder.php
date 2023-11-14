<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Translations;
use  DateTime;
use \Illuminate\Support\Facades\File;
class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $translations = File::get('database/contents/translations.json');

        $translations = json_decode($translations);

        foreach ($translations as $translation) {

          Translations::create(array(
                "id"         => $translation->id,
                "key"        => $translation->key,
                "value"      => $translation->value,
                "lang_id"    => $translation->lang_id,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
          ));

        }

    }
}
