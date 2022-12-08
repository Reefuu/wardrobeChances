<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = ["Tres Colores", "Rose Cardi'Pops", "Sweetr Banana Sorbet", "Macaronts", "White and Black", "Black and White Jeans", "Blue Scrunchie", "Black Headband"];
        $count = 1;

        foreach($products as $product){
            if($count == 1){
                $subcat_id = 4;
                $waist = 0;
                $size = "Fit to L";
                $bust = 114;
                $length = 43;
                $color = "Cream, yellow, and blue";
                $price = 150000;
            }
            elseif($count == 2){
                $subcat_id = 4;
                $waist = 0;
                $size = "Fit to L";
                $bust = 136;
                $length = 43;
                $color = "Cream, pink, and purple";
                $price = 150000;
            }
            elseif($count == 3){
                $subcat_id = 9;
                $waist = 0;
                $size = "Fit to L";
                $bust = 126;
                $length = 83;
                $color = "Yellow and green";
                $price = 175000;
            }
            elseif($count == 4){
                $subcat_id = 13;
                $bust = 0;
                $size = "S";
                $waist = 74;
                $length = 90;
                $color = "Maroon, yellow, and green";
                $price = 120000;
            }
            elseif($count == 5){
                $subcat_id = 14;
                $waist = 0;
                $bust = 0;
                $length = 0;
                $size = "Fit to M";
                $color = "White and black";
                $price = 100000;
            }
            elseif($count == 6){
                $subcat_id = 13;
                $waist = 0;
                $bust = 0;
                $length = 0;
                $size = "Fit to L";
                $color = "Black and white";
                $price = 120000;
            }
            elseif($count == 7){
                $subcat_id = 15;
                $waist = 0;
                $bust = 0;
                $length = 0;
                $size = "";
                $color = "Blue";
                $price = 20000;
            }
            elseif($count == 8){
                $subcat_id = 16;
                $waist = 0;
                $bust = 0;
                $length = 0;
                $size = "";
                $color = "Black";
                $price = 20000;
            }

            Product::create([
                'name' => $product,
                'size' => $size,
                'color' => $color,
                'bust' => $bust,
                'length' => $length,
                'waist' => $waist,
                'price' => $price,
                'image' => "ini gambar",
                'subcat_id' => $subcat_id,
            ]);

            $count++;
        }
    }
}
