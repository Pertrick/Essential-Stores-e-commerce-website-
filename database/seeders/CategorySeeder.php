<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
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
        $category1 = new Category();
        $category1->name = "clothes";
        $category1->save();

        $category2 = new Category();
        $category2->name = "shoes";
        $category2->save();


        $category3 = new Category();
        $category3->name = "bags";
        $category3->save();

        $category4 = new Category();
        $category4->name = "wristwatches";
        $category4->save();

        $category5 = new Category();
        $category5->name = "glasses";
        $category5->save();

        $category6 = new Category();
        $category6->name = "necklaces";
        $category6->save();

        $category7 = new Category();
        $category7->name = "accessories";
        $category7->save();

    }
}
