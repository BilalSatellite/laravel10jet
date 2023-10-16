<?php
namespace Database\Seeders;
use App\Models\Icbrand;
use App\Models\Phonesection;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class GsmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $icbrands = [
            'Qualcomm','Mediatek','Spreadtrum','Exynos','Samsung',
            'Apple','Kirin','Broadcom','Intel','Rda/Coolsand','Infineon',
            'Rockchip','Allwinner','SanDisk','SK hynix','Toshiba','Alliance','ATP',
            'Greenliant','SkyHigh'
         ];
        foreach($icbrands as $brand) { Icbrand::create(
            ['name' => $brand,'slug'=>Str::slug($brand)]
        ); }
        $phonesections = [
            'CPU','Power','Network','Wifi','Bluetooth',
            'Graphic','Audio','RAM','ROM','Camera','BackLight',
            'Touch','NFC','Connectivity'
         ];
        foreach($phonesections as $phonesection) { Phonesection::create(
            ['name' => $phonesection,'slug'=>Str::slug($phonesection)]
        ); }
    }
}
