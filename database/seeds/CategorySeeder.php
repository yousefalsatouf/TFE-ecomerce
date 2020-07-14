<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name'=> 'PROTEIN',
            'description'=> 'La protéine est un macronutriment indispensable au maintien ou au développement de la masse musculaire.',
            'image'=> 'protein.jpg'
        ]);
        Category::create([
            'name'=> 'VITAMINS',
            'description'=> 'nous voulons toujours offrir les meilleurs produits. Nous développons de nouveaux produits en fonction de vos commentaires. ',
            'image'=> 'vitamins.jpg'
        ]);
        Category::create([
            'name'=> 'ALIMENTATION & EN - CAS',
            'description'=> 'Les en-cas et collations font intégralement partie d\'un régime alimentaire équilibré. Il suffit de faire les bons choix, sans négliger le côté hédonique.',
            'image'=> 'food.jpg'
        ]);
        Category::create([
            'name'=> 'Nutrition sportive',
            'description'=> 'Allez plus loin, plus vite et plus fort. Que vous souhaitiez obtenir, améliorer ou établir un record personnel, notre gamme de produits sport et nutrition vous aide à placer la barre encore plus haut.',
            'image'=> 'sport.jpg'
        ]);
        Category::create([
            'name'=> 'VËTEMENTS ET ACCESSOIRES',
            'description'=> 'Au même titre que votre préparation physique et mentale, le confort et la qualité de votre équipement sportif contribuent au succès de votre entraînement.',
            'image'=> 'clothes.jpg'
        ]);
        Category::create([
            'name'=> 'BEAUTE',
            'description'=> 'Les micronutriments sont impliqués dans de nombreux processus biologiques et participent au fonctionnement normal de l\'organisme.',
            'image'=> 'beauty.jpg'
        ]);

    }
}
