<?php

use App\Menu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Menu::create([
        	'id' => 1,
        	'data' => '[{"text":"Home","href":"http://google.com","icon":"undefined undefined","target":"_top","title":"My Home"},{"text":"Opcion2","href":"","icon":"fa fa-bar-chart-o","target":"_self","title":""},{"text":"Opcion4","href":"","icon":"fa fa-crop","target":"_self","title":""},{"text":"Opcion7","href":"","icon":"fa fa-search","target":"_self","title":"","children":[{"text":"Opcion5","href":"","icon":"fa fa-flask","target":"_self","title":""}]},{"text":"Opcion3","href":"","icon":"fa fa-cloud-upload","target":"_self","title":""},{"text":"Opcion7-1-1","href":"","icon":"fa fa-filter","target":"_self","title":"","children":[{"text":"Opcion6","href":"","icon":"fa fa-map-marker","target":"_self","title":"","children":[{"text":"Opcion7-1","href":"","icon":"fa fa-plug","target":"_self","title":""}]}]},{"text":"new","href":"a","icon":"","target":"_blank","title":"quia beatae nulla. a"},{"text":"long","href":"https://www.google.com/","icon":"fa fa-i-cursor","target":"_self","title":"google"},{"text":"aaa","href":"a","icon":"fa fa-adn","target":"_top","title":"yes"},{"text":"Test ","href":"http://localhost/own/public/menu/build","icon":"","target":"_blank","title":"gggg"}]',
        ]);
    }
}
