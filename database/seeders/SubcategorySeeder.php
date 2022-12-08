<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 12 tops, 2 pants, 2 accessories
        $subcat = ["crops", "hoodies", "jackets", "cardigans", "boleros", "shirts", "tanktops", "sabrinas", "sweaters", "oversizes", "patchworks", "vests", "jeans", "scubas", "scrunchies", "headbands"];
        $count = 1;

        foreach($subcat as $item){
            if($count <= 12){
                $cat_id = 1;
                
            }
            elseif($count <= 14 && $count > 12){
                $cat_id = 2;
            }
            elseif($count <= 16 && $count > 14){
                $cat_id = 3;
            }

            Subcategory::create([
                'subcat_name' => $item,
                'category_id' => $cat_id,
            ]);

            $count++;
        }
    }
}
