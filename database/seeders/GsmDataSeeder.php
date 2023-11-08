<?php

namespace Database\Seeders;

use App\Models\Icattribute;
use App\Models\Icbrand;
use Illuminate\Support\Str;
use App\Models\Phonefunction;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GsmDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $icbrands = [
            'Qualcomm', 'Mediatek', 'Spreadtrum', 'Exynos', 'Samsung',
            'Apple', 'Kirin', 'Broadcom', 'Intel', 'Rda/Coolsand', 'Infineon',
            'Rockchip', 'Allwinner', 'SanDisk', 'SK hynix', 'Toshiba', 'Alliance', 'ATP',
            'Greenliant', 'Micron'
        ];
        foreach ($icbrands as $brand) {
            Icbrand::create(
                ['name' => $brand, 'slug' => Str::slug($brand)]
            );
        }
        $Phonefunctions = [
            'Processor', 'Power', 'Memory', 'Network', 'Display',
            'Graphic', 'Audio',  'Camera', 'BackLight',
            'Touch', 'Connectivity', 'Vibrater'
        ];
        foreach ($Phonefunctions as $Phonefunction) {
            Phonefunction::create(
                ['name' => $Phonefunction, 'slug' => Str::slug($Phonefunction)]
            );
        }
        $Icattribute = [
            'Processor:Type' => ['SOC', 'CPU', 'MPU'],
            'Processor:RamSupport' => ['LPDDR1', 'LPDDR1E', 'LPDDR2', 'LPDDR2E', 'LPDDR3', 'LPDDR3E', 'LPDDR4', 'LPDDR4X', 'LPDDR5', 'LPDDR5X'],
            'Power:Type' => ['PM', 'PMI', 'LDO', 'PMU'],
            'Memory:Type' => ['RAM', 'eMMC', 'eMCP', 'UFS', 'uMCP'],
            'eMMC:Ver' => ['Ver4.3', 'Ver4.4', 'Ver4.41', 'Ver4.5', 'Ver5.0', 'Ver5.01', 'Ver5.1', 'Ver5.1A'],
            'eMMC:ReVer' => ['Ver1.5', 'Ver1.6', 'Ver1.7', 'Ver1.8'],
            'BGA' => ['BGA153', 'BGA162', 'BGA169', 'BGA221', 'BGA254', 'BGA280', 'BGA529'],
            'Memory:Size' => ['2GB', '4GB', '8GB', '16GB', '32GB', '64GB', '128GB', '256GB', '512GB'],
            'UFS:Ver' => ['2.0', '2.1', '3.0', '3.1'],
            'Ram:Type' => ['LPDDR1', 'LPDDR1E', 'LPDDR2', 'LPDDR2E', 'LPDDR3', 'LPDDR3E', 'LPDDR4', 'LPDDR4X', 'LPDDR5', 'LPDDR5X'],
            'Ram:Size' => ['1GB', '2GB', '4GB', '6GB', '8GB', '10GB', '12GB', '16GB'],
            'Network:Type' => ['2G:PA', '3G:PA', '4G:PA', '5G:PA', 'WTR'],
        ];
        foreach ($Icattribute as $key => $value) {
            $i = 0;
            $keys_array = $value;
            $keys = array_keys($keys_array);
            for ($i = 0; $i < count($keys); $i++) {
                $keys_array[$keys_array[$i]] = $keys_array[$i];
                unset($keys_array[$i]);
            }
            // print_r($keys_array);
            Icattribute::create([
                "name" => $key,
                "values" => $keys_array,
            ]);
        }
    }
}
// 'Wifi', 'Bluetooth', 'NFC',
//             '2G PA', '3G PA', '4G PA', '5G PA',
//             'PM', 'PMI', 'LDO', 'PMU',
//             'BGA153', 'BGA162', 'BGA169', 'BGA221', 'BGA254', 'BGA280', 'BGA529',
//             'Ver1.5', 'Ver1.6', 'Ver1.7', 'Ver1.8', 'Ver4.3', 'Ver4.4', 'Ver4.41', 'Ver4.5', 'Ver5.0', 'Ver5.01', 'Ver5.1', 'Ver5.1A',
//             '2GB', '4GB', '8GB', '16GB', '32GB', '64GB', '128GB', '256GB', '512GB',
