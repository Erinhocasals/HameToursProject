<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WorldCitiesLocaleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('world_cities_locale')->truncate();
        
        \DB::table('world_cities_locale')->insert(array (
            0 => 
            array (
                'id' => 1,
                'city_id' => 1,
                'name' => '爱尔巴桑',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            1 => 
            array (
                'id' => 2,
                'city_id' => 2,
                'name' => '迪勃拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            2 => 
            array (
                'id' => 3,
                'city_id' => 3,
                'name' => '地拉那',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            3 => 
            array (
                'id' => 4,
                'city_id' => 4,
                'name' => '都拉斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            4 => 
            array (
                'id' => 5,
                'city_id' => 5,
                'name' => '发罗拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            5 => 
            array (
                'id' => 6,
                'city_id' => 6,
                'name' => '费里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            6 => 
            array (
                'id' => 7,
                'city_id' => 7,
                'name' => '吉诺卡斯特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            7 => 
            array (
                'id' => 8,
                'city_id' => 8,
                'name' => '科尔察',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            8 => 
            array (
                'id' => 9,
                'city_id' => 9,
                'name' => '库克斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            9 => 
            array (
                'id' => 10,
                'city_id' => 10,
                'name' => '莱什',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            10 => 
            array (
                'id' => 11,
                'city_id' => 11,
                'name' => '培拉特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            11 => 
            array (
                'id' => 12,
                'city_id' => 12,
                'name' => '斯库台',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            12 => 
            array (
                'id' => 13,
                'city_id' => 13,
                'name' => '阿德拉尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            13 => 
            array (
                'id' => 14,
                'city_id' => 14,
                'name' => '阿尔及尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            14 => 
            array (
                'id' => 15,
                'city_id' => 15,
                'name' => '艾因·德夫拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            15 => 
            array (
                'id' => 16,
                'city_id' => 16,
                'name' => '艾因·蒂姆尚特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            16 => 
            array (
                'id' => 17,
                'city_id' => 17,
                'name' => '安纳巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            17 => 
            array (
                'id' => 18,
                'city_id' => 18,
                'name' => '奥兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            18 => 
            array (
                'id' => 19,
                'city_id' => 19,
                'name' => '巴特纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            19 => 
            array (
                'id' => 20,
                'city_id' => 20,
                'name' => '贝贾亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            20 => 
            array (
                'id' => 21,
                'city_id' => 21,
                'name' => '贝沙尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            21 => 
            array (
                'id' => 22,
                'city_id' => 22,
                'name' => '贝伊德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            22 => 
            array (
                'id' => 23,
                'city_id' => 23,
                'name' => '比斯克拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            23 => 
            array (
                'id' => 24,
                'city_id' => 24,
                'name' => '布尔吉·布阿雷里吉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            24 => 
            array (
                'id' => 25,
                'city_id' => 25,
                'name' => '布利达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            25 => 
            array (
                'id' => 26,
                'city_id' => 26,
                'name' => '布迈德斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            26 => 
            array (
                'id' => 27,
                'city_id' => 27,
                'name' => '布依拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            27 => 
            array (
                'id' => 28,
                'city_id' => 28,
                'name' => '蒂巴扎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            28 => 
            array (
                'id' => 29,
                'city_id' => 29,
                'name' => '蒂斯姆西勒特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            29 => 
            array (
                'id' => 30,
                'city_id' => 30,
                'name' => '盖尔达耶',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            30 => 
            array (
                'id' => 31,
                'city_id' => 31,
                'name' => '盖尔马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            31 => 
            array (
                'id' => 32,
                'city_id' => 32,
                'name' => '罕西拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            32 => 
            array (
                'id' => 33,
                'city_id' => 33,
                'name' => '赫利赞',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            33 => 
            array (
                'id' => 34,
                'city_id' => 34,
                'name' => '吉杰尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            34 => 
            array (
                'id' => 35,
                'city_id' => 35,
                'name' => '杰勒法',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            35 => 
            array (
                'id' => 36,
                'city_id' => 36,
                'name' => '君士坦丁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            36 => 
            array (
                'id' => 37,
                'city_id' => 37,
                'name' => '拉格瓦特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            37 => 
            array (
                'id' => 38,
                'city_id' => 38,
                'name' => '马斯卡拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            38 => 
            array (
                'id' => 39,
                'city_id' => 39,
                'name' => '麦迪亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            39 => 
            array (
                'id' => 40,
                'city_id' => 40,
                'name' => '密拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            40 => 
            array (
                'id' => 41,
                'city_id' => 41,
                'name' => '莫斯塔加纳姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            41 => 
            array (
                'id' => 42,
                'city_id' => 42,
                'name' => '姆西拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            42 => 
            array (
                'id' => 43,
                'city_id' => 43,
                'name' => '纳阿马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            43 => 
            array (
                'id' => 44,
                'city_id' => 44,
                'name' => '塞蒂夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            44 => 
            array (
                'id' => 45,
                'city_id' => 45,
                'name' => '赛伊达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            45 => 
            array (
                'id' => 46,
                'city_id' => 46,
                'name' => '斯基克达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            46 => 
            array (
                'id' => 47,
                'city_id' => 47,
                'name' => '苏克·阿赫拉斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            47 => 
            array (
                'id' => 48,
                'city_id' => 48,
                'name' => '塔里夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            48 => 
            array (
                'id' => 49,
                'city_id' => 49,
                'name' => '塔曼拉塞特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            49 => 
            array (
                'id' => 50,
                'city_id' => 50,
                'name' => '特贝萨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            50 => 
            array (
                'id' => 51,
                'city_id' => 51,
                'name' => '特莱姆森',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            51 => 
            array (
                'id' => 52,
                'city_id' => 52,
                'name' => '提济乌祖',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            52 => 
            array (
                'id' => 53,
                'city_id' => 53,
                'name' => '提亚雷特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            53 => 
            array (
                'id' => 54,
                'city_id' => 54,
                'name' => '廷杜夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            54 => 
            array (
                'id' => 55,
                'city_id' => 55,
                'name' => '瓦德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            55 => 
            array (
                'id' => 56,
                'city_id' => 56,
                'name' => '瓦尔格拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            56 => 
            array (
                'id' => 57,
                'city_id' => 57,
                'name' => '乌姆布阿基',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            57 => 
            array (
                'id' => 58,
                'city_id' => 58,
                'name' => '西迪贝勒阿贝斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            58 => 
            array (
                'id' => 59,
                'city_id' => 59,
                'name' => '谢里夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            59 => 
            array (
                'id' => 60,
                'city_id' => 60,
                'name' => '伊利齐',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            60 => 
            array (
                'id' => 61,
                'city_id' => 61,
                'name' => '赫拉特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            61 => 
            array (
                'id' => 62,
                'city_id' => 62,
                'name' => '喀布尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            62 => 
            array (
                'id' => 63,
                'city_id' => 63,
                'name' => '坎大哈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            63 => 
            array (
                'id' => 64,
                'city_id' => 64,
                'name' => '马扎里沙里夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            64 => 
            array (
                'id' => 65,
                'city_id' => 65,
                'name' => '巴拉那',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            65 => 
            array (
                'id' => 66,
                'city_id' => 66,
                'name' => '别德马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            66 => 
            array (
                'id' => 67,
                'city_id' => 67,
                'name' => '波萨达斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            67 => 
            array (
                'id' => 68,
                'city_id' => 68,
                'name' => '布兰卡港',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            68 => 
            array (
                'id' => 69,
                'city_id' => 69,
                'name' => '布宜诺斯艾利斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            69 => 
            array (
                'id' => 70,
                'city_id' => 70,
                'name' => '福莫萨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            70 => 
            array (
                'id' => 71,
                'city_id' => 71,
                'name' => '胡胡伊',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            71 => 
            array (
                'id' => 72,
                'city_id' => 72,
                'name' => '卡塔马卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            72 => 
            array (
                'id' => 73,
                'city_id' => 73,
                'name' => '科尔多瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            73 => 
            array (
                'id' => 74,
                'city_id' => 74,
                'name' => '科连特斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            74 => 
            array (
                'id' => 75,
                'city_id' => 75,
                'name' => '克劳斯城',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            75 => 
            array (
                'id' => 76,
                'city_id' => 76,
                'name' => '肯考迪娅',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            76 => 
            array (
                'id' => 77,
                'city_id' => 77,
                'name' => '拉里奥哈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            77 => 
            array (
                'id' => 78,
                'city_id' => 78,
                'name' => '拉普拉塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            78 => 
            array (
                'id' => 79,
                'city_id' => 79,
                'name' => '雷西斯滕匹亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            79 => 
            array (
                'id' => 80,
                'city_id' => 80,
                'name' => '里奥加耶戈斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            80 => 
            array (
                'id' => 81,
                'city_id' => 81,
                'name' => '里奥夸尔托',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            81 => 
            array (
                'id' => 82,
                'city_id' => 82,
                'name' => '里瓦达维亚海军准将城',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            82 => 
            array (
                'id' => 83,
                'city_id' => 83,
                'name' => '罗萨里奥',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            83 => 
            array (
                'id' => 84,
                'city_id' => 84,
                'name' => '罗森',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            84 => 
            array (
                'id' => 85,
                'city_id' => 85,
                'name' => '马德普拉塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            85 => 
            array (
                'id' => 86,
                'city_id' => 86,
                'name' => '门多萨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            86 => 
            array (
                'id' => 87,
                'city_id' => 87,
                'name' => '内乌肯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            87 => 
            array (
                'id' => 88,
                'city_id' => 88,
                'name' => '萨尔塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            88 => 
            array (
                'id' => 89,
                'city_id' => 89,
                'name' => '圣地亚哥-德尔埃斯特罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            89 => 
            array (
                'id' => 90,
                'city_id' => 90,
                'name' => '圣菲',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            90 => 
            array (
                'id' => 91,
                'city_id' => 91,
                'name' => '圣胡安',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            91 => 
            array (
                'id' => 92,
                'city_id' => 92,
                'name' => '圣拉斐尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            92 => 
            array (
                'id' => 93,
                'city_id' => 93,
                'name' => '圣路易斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            93 => 
            array (
                'id' => 94,
                'city_id' => 94,
                'name' => '圣罗莎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            94 => 
            array (
                'id' => 95,
                'city_id' => 95,
                'name' => '圣米格尔-德图库曼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            95 => 
            array (
                'id' => 96,
                'city_id' => 96,
                'name' => '圣尼古拉斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            96 => 
            array (
                'id' => 97,
                'city_id' => 97,
                'name' => '特雷利乌',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            97 => 
            array (
                'id' => 98,
                'city_id' => 98,
                'name' => '乌斯怀亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            98 => 
            array (
                'id' => 99,
                'city_id' => 99,
                'name' => '阿布扎比',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            99 => 
            array (
                'id' => 100,
                'city_id' => 100,
                'name' => '艾因',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            100 => 
            array (
                'id' => 101,
                'city_id' => 101,
                'name' => '迪拜',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            101 => 
            array (
                'id' => 102,
                'city_id' => 102,
                'name' => '沙迦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            102 => 
            array (
                'id' => 103,
                'city_id' => 103,
                'name' => '巴提奈地区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            103 => 
            array (
                'id' => 104,
                'city_id' => 104,
                'name' => '达希莱地区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            104 => 
            array (
                'id' => 105,
                'city_id' => 105,
                'name' => '东部地区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            105 => 
            array (
                'id' => 106,
                'city_id' => 106,
                'name' => '马斯喀特省',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            106 => 
            array (
                'id' => 107,
                'city_id' => 107,
                'name' => '穆桑达姆省',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            107 => 
            array (
                'id' => 108,
                'city_id' => 108,
                'name' => '内地地区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            108 => 
            array (
                'id' => 109,
                'city_id' => 109,
                'name' => '中部地区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            109 => 
            array (
                'id' => 110,
                'city_id' => 110,
                'name' => '佐法尔省',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            110 => 
            array (
                'id' => 111,
                'city_id' => 111,
                'name' => '阿布歇隆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            111 => 
            array (
                'id' => 112,
                'city_id' => 112,
                'name' => '哈奇马斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            112 => 
            array (
                'id' => 113,
                'city_id' => 113,
                'name' => '卡尔巴卡尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            113 => 
            array (
                'id' => 114,
                'city_id' => 114,
                'name' => '卡扎赫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            114 => 
            array (
                'id' => 115,
                'city_id' => 115,
                'name' => '连科兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            115 => 
            array (
                'id' => 116,
                'city_id' => 116,
                'name' => '密尔-卡拉巴赫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            116 => 
            array (
                'id' => 117,
                'city_id' => 117,
                'name' => '穆甘-萨连',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            117 => 
            array (
                'id' => 118,
                'city_id' => 118,
                'name' => '纳戈尔诺－卡拉巴赫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            118 => 
            array (
                'id' => 119,
                'city_id' => 119,
                'name' => '纳希切万',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            119 => 
            array (
                'id' => 120,
                'city_id' => 120,
                'name' => '普利亚拉克斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            120 => 
            array (
                'id' => 121,
                'city_id' => 121,
                'name' => '舍基',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            121 => 
            array (
                'id' => 122,
                'city_id' => 122,
                'name' => '苏姆盖特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            122 => 
            array (
                'id' => 123,
                'city_id' => 123,
                'name' => '锡尔万',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            123 => 
            array (
                'id' => 124,
                'city_id' => 124,
                'name' => '占贾',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            124 => 
            array (
                'id' => 125,
                'city_id' => 125,
                'name' => '阿斯旺',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            125 => 
            array (
                'id' => 126,
                'city_id' => 126,
                'name' => '古尔代盖',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            126 => 
            array (
                'id' => 127,
                'city_id' => 127,
                'name' => '开罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            127 => 
            array (
                'id' => 128,
                'city_id' => 128,
                'name' => '苏布拉开马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            128 => 
            array (
                'id' => 129,
                'city_id' => 129,
                'name' => '亚历山大',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            129 => 
            array (
                'id' => 130,
                'city_id' => 130,
                'name' => '阿法尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            130 => 
            array (
                'id' => 131,
                'city_id' => 131,
                'name' => '阿姆哈拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            131 => 
            array (
                'id' => 132,
                'city_id' => 132,
                'name' => '奥罗米亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            132 => 
            array (
                'id' => 133,
                'city_id' => 133,
                'name' => '宾香古尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            133 => 
            array (
                'id' => 134,
                'city_id' => 134,
                'name' => '德雷达瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            134 => 
            array (
                'id' => 135,
                'city_id' => 135,
                'name' => '甘贝拉各族',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            135 => 
            array (
                'id' => 136,
                'city_id' => 136,
                'name' => '哈勒里民族',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            136 => 
            array (
                'id' => 137,
                'city_id' => 137,
                'name' => '南方各族',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            137 => 
            array (
                'id' => 138,
                'city_id' => 138,
                'name' => '索马里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            138 => 
            array (
                'id' => 139,
                'city_id' => 139,
                'name' => '提格雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            139 => 
            array (
                'id' => 140,
                'city_id' => 140,
                'name' => '亚的斯亚贝巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            140 => 
            array (
                'id' => 141,
                'city_id' => 141,
                'name' => '奥法利',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            141 => 
            array (
                'id' => 142,
                'city_id' => 142,
                'name' => '蒂珀雷里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            142 => 
            array (
                'id' => 143,
                'city_id' => 143,
                'name' => '都柏林',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            143 => 
            array (
                'id' => 144,
                'city_id' => 144,
                'name' => '多内加尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            144 => 
            array (
                'id' => 145,
                'city_id' => 145,
                'name' => '戈尔韦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            145 => 
            array (
                'id' => 146,
                'city_id' => 146,
                'name' => '基尔代尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            146 => 
            array (
                'id' => 147,
                'city_id' => 147,
                'name' => '基尔肯尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            147 => 
            array (
                'id' => 148,
                'city_id' => 148,
                'name' => '卡范',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            148 => 
            array (
                'id' => 149,
                'city_id' => 149,
                'name' => '卡洛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            149 => 
            array (
                'id' => 150,
                'city_id' => 150,
                'name' => '凯里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            150 => 
            array (
                'id' => 151,
                'city_id' => 151,
                'name' => '科克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            151 => 
            array (
                'id' => 152,
                'city_id' => 152,
                'name' => '克莱尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            152 => 
            array (
                'id' => 153,
                'city_id' => 153,
                'name' => '朗福德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            153 => 
            array (
                'id' => 154,
                'city_id' => 154,
                'name' => '劳斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            154 => 
            array (
                'id' => 155,
                'city_id' => 155,
                'name' => '崂斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            155 => 
            array (
                'id' => 156,
                'city_id' => 156,
                'name' => '利默里克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            156 => 
            array (
                'id' => 157,
                'city_id' => 157,
                'name' => '利特里姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            157 => 
            array (
                'id' => 158,
                'city_id' => 158,
                'name' => '罗斯康芒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            158 => 
            array (
                'id' => 159,
                'city_id' => 159,
                'name' => '梅奥',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            159 => 
            array (
                'id' => 160,
                'city_id' => 160,
                'name' => '米斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            160 => 
            array (
                'id' => 161,
                'city_id' => 161,
                'name' => '莫内根',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            161 => 
            array (
                'id' => 162,
                'city_id' => 162,
                'name' => '斯莱戈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            162 => 
            array (
                'id' => 163,
                'city_id' => 163,
                'name' => '威克洛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            163 => 
            array (
                'id' => 164,
                'city_id' => 164,
                'name' => '韦克斯福德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            164 => 
            array (
                'id' => 165,
                'city_id' => 165,
                'name' => '沃特福德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            165 => 
            array (
                'id' => 166,
                'city_id' => 166,
                'name' => '西米斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            166 => 
            array (
                'id' => 167,
                'city_id' => 167,
                'name' => '贝尔瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            167 => 
            array (
                'id' => 168,
                'city_id' => 168,
                'name' => '哈留',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            168 => 
            array (
                'id' => 169,
                'city_id' => 169,
                'name' => '拉普拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            169 => 
            array (
                'id' => 170,
                'city_id' => 170,
                'name' => '里亚内',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            170 => 
            array (
                'id' => 171,
                'city_id' => 171,
                'name' => '帕尔努',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            171 => 
            array (
                'id' => 172,
                'city_id' => 172,
                'name' => '萨雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            172 => 
            array (
                'id' => 173,
                'city_id' => 173,
                'name' => '塔尔图',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            173 => 
            array (
                'id' => 174,
                'city_id' => 174,
                'name' => '瓦尔加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            174 => 
            array (
                'id' => 175,
                'city_id' => 175,
                'name' => '维良地',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            175 => 
            array (
                'id' => 176,
                'city_id' => 176,
                'name' => '维鲁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            176 => 
            array (
                'id' => 177,
                'city_id' => 177,
                'name' => '沃鲁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            177 => 
            array (
                'id' => 178,
                'city_id' => 178,
                'name' => '希尤',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            178 => 
            array (
                'id' => 179,
                'city_id' => 179,
                'name' => '耶尔韦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            179 => 
            array (
                'id' => 180,
                'city_id' => 180,
                'name' => '耶盖瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            180 => 
            array (
                'id' => 181,
                'city_id' => 181,
                'name' => '依达－维鲁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            181 => 
            array (
                'id' => 182,
                'city_id' => 182,
                'name' => '安道尔城',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            182 => 
            array (
                'id' => 183,
                'city_id' => 183,
                'name' => '奥尔迪诺',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            183 => 
            array (
                'id' => 184,
                'city_id' => 184,
                'name' => '恩坎普',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            184 => 
            array (
                'id' => 185,
                'city_id' => 185,
                'name' => '卡尼略',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            185 => 
            array (
                'id' => 186,
                'city_id' => 186,
                'name' => '莱塞斯卡尔德－恩戈尔达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            186 => 
            array (
                'id' => 187,
                'city_id' => 187,
                'name' => '马萨纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            187 => 
            array (
                'id' => 188,
                'city_id' => 188,
                'name' => '圣胡利娅－德洛里亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            188 => 
            array (
                'id' => 189,
                'city_id' => 189,
                'name' => '北宽扎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            189 => 
            array (
                'id' => 190,
                'city_id' => 190,
                'name' => '北隆达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            190 => 
            array (
                'id' => 191,
                'city_id' => 191,
                'name' => '本戈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            191 => 
            array (
                'id' => 192,
                'city_id' => 192,
                'name' => '本格拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            192 => 
            array (
                'id' => 193,
                'city_id' => 193,
                'name' => '比耶',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            193 => 
            array (
                'id' => 194,
                'city_id' => 194,
                'name' => '卡宾达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            194 => 
            array (
                'id' => 195,
                'city_id' => 195,
                'name' => '库内内',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            195 => 
            array (
                'id' => 196,
                'city_id' => 196,
                'name' => '宽多库邦戈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            196 => 
            array (
                'id' => 197,
                'city_id' => 197,
                'name' => '罗安达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            197 => 
            array (
                'id' => 198,
                'city_id' => 198,
                'name' => '马兰热',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            198 => 
            array (
                'id' => 199,
                'city_id' => 199,
                'name' => '莫希科',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            199 => 
            array (
                'id' => 200,
                'city_id' => 200,
                'name' => '纳米贝',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            200 => 
            array (
                'id' => 201,
                'city_id' => 201,
                'name' => '南宽扎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            201 => 
            array (
                'id' => 202,
                'city_id' => 202,
                'name' => '南隆达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            202 => 
            array (
                'id' => 203,
                'city_id' => 203,
                'name' => '万博',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            203 => 
            array (
                'id' => 204,
                'city_id' => 204,
                'name' => '威拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            204 => 
            array (
                'id' => 205,
                'city_id' => 205,
                'name' => '威热',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            205 => 
            array (
                'id' => 206,
                'city_id' => 206,
                'name' => '扎伊尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            206 => 
            array (
                'id' => 207,
                'city_id' => 207,
                'name' => '布尔根兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            207 => 
            array (
                'id' => 208,
                'city_id' => 208,
                'name' => '蒂罗尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            208 => 
            array (
                'id' => 209,
                'city_id' => 209,
                'name' => '福拉尔贝格',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            209 => 
            array (
                'id' => 210,
                'city_id' => 210,
                'name' => '克恩顿',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            210 => 
            array (
                'id' => 211,
                'city_id' => 211,
                'name' => '萨尔茨堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            211 => 
            array (
                'id' => 212,
                'city_id' => 212,
                'name' => '上奥地利',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            212 => 
            array (
                'id' => 213,
                'city_id' => 213,
                'name' => '施蒂利亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            213 => 
            array (
                'id' => 214,
                'city_id' => 214,
                'name' => '维也纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            214 => 
            array (
                'id' => 215,
                'city_id' => 215,
                'name' => '下奥地利',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            215 => 
            array (
                'id' => 216,
                'city_id' => 216,
                'name' => '北部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            216 => 
            array (
                'id' => 217,
                'city_id' => 217,
                'name' => '布干维尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            217 => 
            array (
                'id' => 218,
                'city_id' => 218,
                'name' => '东部高地',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            218 => 
            array (
                'id' => 219,
                'city_id' => 219,
                'name' => '东塞皮克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            219 => 
            array (
                'id' => 220,
                'city_id' => 220,
                'name' => '东新不列颠',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            220 => 
            array (
                'id' => 221,
                'city_id' => 221,
                'name' => '恩加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            221 => 
            array (
                'id' => 222,
                'city_id' => 222,
                'name' => '海湾',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            222 => 
            array (
                'id' => 223,
                'city_id' => 223,
                'name' => '马当',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            223 => 
            array (
                'id' => 224,
                'city_id' => 224,
                'name' => '马努斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            224 => 
            array (
                'id' => 225,
                'city_id' => 225,
                'name' => '米尔恩湾',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            225 => 
            array (
                'id' => 226,
                'city_id' => 226,
                'name' => '莫尔兹比港',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            226 => 
            array (
                'id' => 227,
                'city_id' => 227,
                'name' => '莫罗贝',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            227 => 
            array (
                'id' => 228,
                'city_id' => 228,
                'name' => '南部高地',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            228 => 
            array (
                'id' => 229,
                'city_id' => 229,
                'name' => '钦布',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            229 => 
            array (
                'id' => 230,
                'city_id' => 230,
                'name' => '桑道恩',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            230 => 
            array (
                'id' => 231,
                'city_id' => 231,
                'name' => '西部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            231 => 
            array (
                'id' => 232,
                'city_id' => 232,
                'name' => '西部高地',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            232 => 
            array (
                'id' => 233,
                'city_id' => 233,
                'name' => '西新不列颠',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            233 => 
            array (
                'id' => 234,
                'city_id' => 234,
                'name' => '新爱尔兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            234 => 
            array (
                'id' => 235,
                'city_id' => 235,
                'name' => '白沙瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            235 => 
            array (
                'id' => 236,
                'city_id' => 236,
                'name' => '费萨拉巴德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            236 => 
            array (
                'id' => 237,
                'city_id' => 237,
                'name' => '故吉软瓦拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            237 => 
            array (
                'id' => 238,
                'city_id' => 238,
                'name' => '海德拉巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            238 => 
            array (
                'id' => 239,
                'city_id' => 239,
                'name' => '卡拉奇',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            239 => 
            array (
                'id' => 240,
                'city_id' => 240,
                'name' => '拉合尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            240 => 
            array (
                'id' => 241,
                'city_id' => 241,
                'name' => '拉瓦尔品第',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            241 => 
            array (
                'id' => 242,
                'city_id' => 242,
                'name' => '木尔坦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            242 => 
            array (
                'id' => 243,
                'city_id' => 243,
                'name' => '伊斯兰堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            243 => 
            array (
                'id' => 244,
                'city_id' => 244,
                'name' => '阿曼拜',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            244 => 
            array (
                'id' => 245,
                'city_id' => 245,
                'name' => '阿耶斯总统省',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            245 => 
            array (
                'id' => 246,
                'city_id' => 246,
                'name' => '巴拉瓜里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            246 => 
            array (
                'id' => 247,
                'city_id' => 247,
                'name' => '博克龙',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            247 => 
            array (
                'id' => 248,
                'city_id' => 248,
                'name' => '瓜伊拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            248 => 
            array (
                'id' => 249,
                'city_id' => 249,
                'name' => '卡瓜苏',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            249 => 
            array (
                'id' => 250,
                'city_id' => 250,
                'name' => '卡嫩迪尤',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            250 => 
            array (
                'id' => 251,
                'city_id' => 251,
                'name' => '卡萨帕',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            251 => 
            array (
                'id' => 252,
                'city_id' => 252,
                'name' => '康塞普西翁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            252 => 
            array (
                'id' => 253,
                'city_id' => 253,
                'name' => '科迪勒拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            253 => 
            array (
                'id' => 254,
                'city_id' => 254,
                'name' => '米西奥内斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            254 => 
            array (
                'id' => 255,
                'city_id' => 255,
                'name' => '涅恩布库',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            255 => 
            array (
                'id' => 256,
                'city_id' => 256,
                'name' => '上巴拉圭',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            256 => 
            array (
                'id' => 257,
                'city_id' => 257,
                'name' => '上巴拉那',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            257 => 
            array (
                'id' => 258,
                'city_id' => 258,
                'name' => '圣佩德罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            258 => 
            array (
                'id' => 259,
                'city_id' => 259,
                'name' => '亚松森特别区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            259 => 
            array (
                'id' => 260,
                'city_id' => 260,
                'name' => '伊塔普亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            260 => 
            array (
                'id' => 261,
                'city_id' => 261,
                'name' => '中央',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            261 => 
            array (
                'id' => 262,
                'city_id' => 262,
                'name' => '加沙地带',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            262 => 
            array (
                'id' => 263,
                'city_id' => 263,
                'name' => '西岸',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            263 => 
            array (
                'id' => 264,
                'city_id' => 264,
                'name' => '北部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            264 => 
            array (
                'id' => 265,
                'city_id' => 265,
                'name' => '哈德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            265 => 
            array (
                'id' => 266,
                'city_id' => 266,
                'name' => '哈马德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            266 => 
            array (
                'id' => 267,
                'city_id' => 267,
                'name' => '里法',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            267 => 
            array (
                'id' => 268,
                'city_id' => 268,
                'name' => '麦纳麦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            268 => 
            array (
                'id' => 269,
                'city_id' => 269,
                'name' => '穆哈拉格',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            269 => 
            array (
                'id' => 270,
                'city_id' => 270,
                'name' => '西部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            270 => 
            array (
                'id' => 271,
                'city_id' => 271,
                'name' => '伊萨城',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            271 => 
            array (
                'id' => 272,
                'city_id' => 272,
                'name' => '中部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            272 => 
            array (
                'id' => 273,
                'city_id' => 273,
                'name' => '阿克里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            273 => 
            array (
                'id' => 274,
                'city_id' => 274,
                'name' => '阿拉戈斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            274 => 
            array (
                'id' => 275,
                'city_id' => 275,
                'name' => '阿马帕',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            275 => 
            array (
                'id' => 276,
                'city_id' => 276,
                'name' => '巴拉那',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            276 => 
            array (
                'id' => 277,
                'city_id' => 277,
                'name' => '巴西利亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            277 => 
            array (
                'id' => 278,
                'city_id' => 278,
                'name' => '巴伊亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            278 => 
            array (
                'id' => 279,
                'city_id' => 279,
                'name' => '北里奥格兰德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            279 => 
            array (
                'id' => 280,
                'city_id' => 280,
                'name' => '伯南布哥',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            280 => 
            array (
                'id' => 281,
                'city_id' => 281,
                'name' => '戈亚斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            281 => 
            array (
                'id' => 282,
                'city_id' => 282,
                'name' => '朗多尼亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            282 => 
            array (
                'id' => 283,
                'city_id' => 283,
                'name' => '里约热内卢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            283 => 
            array (
                'id' => 284,
                'city_id' => 284,
                'name' => '罗赖马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            284 => 
            array (
                'id' => 285,
                'city_id' => 285,
                'name' => '马拉尼昂',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            285 => 
            array (
                'id' => 286,
                'city_id' => 286,
                'name' => '马托格罗索',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            286 => 
            array (
                'id' => 287,
                'city_id' => 287,
                'name' => '米纳斯吉拉斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            287 => 
            array (
                'id' => 288,
                'city_id' => 288,
                'name' => '南里奥格兰德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            288 => 
            array (
                'id' => 289,
                'city_id' => 289,
                'name' => '南马托格罗索',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            289 => 
            array (
                'id' => 290,
                'city_id' => 290,
                'name' => '帕拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            290 => 
            array (
                'id' => 291,
                'city_id' => 291,
                'name' => '帕拉伊巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            291 => 
            array (
                'id' => 292,
                'city_id' => 292,
                'name' => '皮奥伊',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            292 => 
            array (
                'id' => 293,
                'city_id' => 293,
                'name' => '塞阿拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            293 => 
            array (
                'id' => 294,
                'city_id' => 294,
                'name' => '塞尔希培',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            294 => 
            array (
                'id' => 295,
                'city_id' => 295,
                'name' => '圣埃斯皮里图',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            295 => 
            array (
                'id' => 296,
                'city_id' => 296,
                'name' => '圣保罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            296 => 
            array (
                'id' => 297,
                'city_id' => 297,
                'name' => '圣卡塔琳娜',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            297 => 
            array (
                'id' => 298,
                'city_id' => 298,
                'name' => '托坎廷斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            298 => 
            array (
                'id' => 299,
                'city_id' => 299,
                'name' => '亚马孙',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            299 => 
            array (
                'id' => 300,
                'city_id' => 300,
                'name' => '布列斯特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            300 => 
            array (
                'id' => 301,
                'city_id' => 301,
                'name' => '戈梅利',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            301 => 
            array (
                'id' => 302,
                'city_id' => 302,
                'name' => '格罗德诺',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            302 => 
            array (
                'id' => 303,
                'city_id' => 303,
                'name' => '明斯克市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            303 => 
            array (
                'id' => 304,
                'city_id' => 304,
                'name' => '莫吉廖夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            304 => 
            array (
                'id' => 305,
                'city_id' => 305,
                'name' => '维捷布斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            305 => 
            array (
                'id' => 306,
                'city_id' => 306,
                'name' => '布尔加斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            306 => 
            array (
                'id' => 307,
                'city_id' => 307,
                'name' => '卡斯科伏',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            307 => 
            array (
                'id' => 308,
                'city_id' => 308,
                'name' => '鲁塞',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            308 => 
            array (
                'id' => 309,
                'city_id' => 309,
                'name' => '洛维奇',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            309 => 
            array (
                'id' => 310,
                'city_id' => 310,
                'name' => '蒙塔纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            310 => 
            array (
                'id' => 311,
                'city_id' => 311,
                'name' => '普罗夫迪夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            311 => 
            array (
                'id' => 312,
                'city_id' => 312,
                'name' => '索非亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            312 => 
            array (
                'id' => 313,
                'city_id' => 313,
                'name' => '索非亚市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            313 => 
            array (
                'id' => 314,
                'city_id' => 314,
                'name' => '瓦尔纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            314 => 
            array (
                'id' => 315,
                'city_id' => 315,
                'name' => '阿黎博里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            315 => 
            array (
                'id' => 316,
                'city_id' => 316,
                'name' => '阿塔科拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            316 => 
            array (
                'id' => 317,
                'city_id' => 317,
                'name' => '滨海',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            317 => 
            array (
                'id' => 318,
                'city_id' => 318,
                'name' => '波希康市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            318 => 
            array (
                'id' => 319,
                'city_id' => 319,
                'name' => '博尔古',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            319 => 
            array (
                'id' => 320,
                'city_id' => 320,
                'name' => '大西洋',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            320 => 
            array (
                'id' => 321,
                'city_id' => 321,
                'name' => '高原',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            321 => 
            array (
                'id' => 322,
                'city_id' => 322,
                'name' => '库福',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            322 => 
            array (
                'id' => 323,
                'city_id' => 323,
                'name' => '莫诺',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            323 => 
            array (
                'id' => 324,
                'city_id' => 324,
                'name' => '丘陵',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            324 => 
            array (
                'id' => 325,
                'city_id' => 325,
                'name' => '韦梅',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            325 => 
            array (
                'id' => 326,
                'city_id' => 326,
                'name' => '峡谷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            326 => 
            array (
                'id' => 327,
                'city_id' => 327,
                'name' => '祖',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            327 => 
            array (
                'id' => 328,
                'city_id' => 328,
                'name' => '埃诺',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            328 => 
            array (
                'id' => 329,
                'city_id' => 329,
                'name' => '安特卫普',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            329 => 
            array (
                'id' => 330,
                'city_id' => 330,
                'name' => '布拉班特-瓦隆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            330 => 
            array (
                'id' => 331,
                'city_id' => 331,
                'name' => '布鲁塞尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            331 => 
            array (
                'id' => 332,
                'city_id' => 332,
                'name' => '东佛兰德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            332 => 
            array (
                'id' => 333,
                'city_id' => 333,
                'name' => '佛兰芒-布拉班特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            333 => 
            array (
                'id' => 334,
                'city_id' => 334,
                'name' => '列日',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            334 => 
            array (
                'id' => 335,
                'city_id' => 335,
                'name' => '林堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            335 => 
            array (
                'id' => 336,
                'city_id' => 336,
                'name' => '卢森堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            336 => 
            array (
                'id' => 337,
                'city_id' => 337,
                'name' => '那慕尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            337 => 
            array (
                'id' => 338,
                'city_id' => 338,
                'name' => '西佛兰德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            338 => 
            array (
                'id' => 339,
                'city_id' => 339,
                'name' => '埃尔布隆格',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            339 => 
            array (
                'id' => 340,
                'city_id' => 340,
                'name' => '奥尔什丁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            340 => 
            array (
                'id' => 341,
                'city_id' => 341,
                'name' => '奥斯特罗文卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            341 => 
            array (
                'id' => 342,
                'city_id' => 342,
                'name' => '比得哥什',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            342 => 
            array (
                'id' => 343,
                'city_id' => 343,
                'name' => '彼得库夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            343 => 
            array (
                'id' => 344,
                'city_id' => 344,
                'name' => '比托姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            344 => 
            array (
                'id' => 345,
                'city_id' => 345,
                'name' => '比亚瓦波德拉斯卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            345 => 
            array (
                'id' => 346,
                'city_id' => 346,
                'name' => '比亚维斯托克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            346 => 
            array (
                'id' => 347,
                'city_id' => 347,
                'name' => '波莱',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            347 => 
            array (
                'id' => 348,
                'city_id' => 348,
                'name' => '波兹南',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            348 => 
            array (
                'id' => 349,
                'city_id' => 349,
                'name' => '达布罗瓦戈尼察',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            349 => 
            array (
                'id' => 350,
                'city_id' => 350,
                'name' => '大波兰地区戈茹夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            350 => 
            array (
                'id' => 351,
                'city_id' => 351,
                'name' => '弗罗茨瓦夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            351 => 
            array (
                'id' => 352,
                'city_id' => 352,
                'name' => '弗沃茨瓦韦克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            352 => 
            array (
                'id' => 353,
                'city_id' => 353,
                'name' => '格但斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            353 => 
            array (
                'id' => 354,
                'city_id' => 354,
                'name' => '格丁尼亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            354 => 
            array (
                'id' => 355,
                'city_id' => 355,
                'name' => '格利维采',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            355 => 
            array (
                'id' => 356,
                'city_id' => 356,
                'name' => '格鲁琼兹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            356 => 
            array (
                'id' => 357,
                'city_id' => 357,
                'name' => '海乌姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            357 => 
            array (
                'id' => 358,
                'city_id' => 358,
                'name' => '华沙',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            358 => 
            array (
                'id' => 359,
                'city_id' => 359,
                'name' => '霍茹夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            359 => 
            array (
                'id' => 360,
                'city_id' => 360,
                'name' => '卡利什',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            360 => 
            array (
                'id' => 361,
                'city_id' => 361,
                'name' => '卡托维兹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            361 => 
            array (
                'id' => 362,
                'city_id' => 362,
                'name' => '凯尔采',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            362 => 
            array (
                'id' => 363,
                'city_id' => 363,
                'name' => '科宁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            363 => 
            array (
                'id' => 364,
                'city_id' => 364,
                'name' => '科沙林',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            364 => 
            array (
                'id' => 365,
                'city_id' => 365,
                'name' => '克拉科夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            365 => 
            array (
                'id' => 366,
                'city_id' => 366,
                'name' => '克罗斯诺',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            366 => 
            array (
                'id' => 367,
                'city_id' => 367,
                'name' => '拉多姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            367 => 
            array (
                'id' => 368,
                'city_id' => 368,
                'name' => '莱格尼察',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            368 => 
            array (
                'id' => 369,
                'city_id' => 369,
                'name' => '莱什诺',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            369 => 
            array (
                'id' => 370,
                'city_id' => 370,
                'name' => '卢布林',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            370 => 
            array (
                'id' => 371,
                'city_id' => 371,
                'name' => '鲁达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            371 => 
            array (
                'id' => 372,
                'city_id' => 372,
                'name' => '罗兹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            372 => 
            array (
                'id' => 373,
                'city_id' => 373,
                'name' => '绿山城',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            373 => 
            array (
                'id' => 374,
                'city_id' => 374,
                'name' => '米什洛维采',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            374 => 
            array (
                'id' => 375,
                'city_id' => 375,
                'name' => '皮瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            375 => 
            array (
                'id' => 376,
                'city_id' => 376,
                'name' => '普热梅希尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            376 => 
            array (
                'id' => 377,
                'city_id' => 377,
                'name' => '普沃茨克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            377 => 
            array (
                'id' => 378,
                'city_id' => 378,
                'name' => '切哈努夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            378 => 
            array (
                'id' => 379,
                'city_id' => 379,
                'name' => '热舒夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            379 => 
            array (
                'id' => 380,
                'city_id' => 380,
                'name' => '什切青',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            380 => 
            array (
                'id' => 381,
                'city_id' => 381,
                'name' => '斯凯尔涅维采',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            381 => 
            array (
                'id' => 382,
                'city_id' => 382,
                'name' => '斯武普斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            382 => 
            array (
                'id' => 383,
                'city_id' => 383,
                'name' => '苏瓦乌基',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            383 => 
            array (
                'id' => 384,
                'city_id' => 384,
                'name' => '索波特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            384 => 
            array (
                'id' => 385,
                'city_id' => 385,
                'name' => '索斯诺维茨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            385 => 
            array (
                'id' => 386,
                'city_id' => 386,
                'name' => '塔尔努夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            386 => 
            array (
                'id' => 387,
                'city_id' => 387,
                'name' => '塔尔诺布热格',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            387 => 
            array (
                'id' => 388,
                'city_id' => 388,
                'name' => '特切',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            388 => 
            array (
                'id' => 389,
                'city_id' => 389,
                'name' => '托伦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            389 => 
            array (
                'id' => 390,
                'city_id' => 390,
                'name' => '瓦乌布日赫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            390 => 
            array (
                'id' => 391,
                'city_id' => 391,
                'name' => '沃姆扎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            391 => 
            array (
                'id' => 392,
                'city_id' => 392,
                'name' => '希米亚诺维采',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            392 => 
            array (
                'id' => 393,
                'city_id' => 393,
                'name' => '希维诺乌伊希切',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            393 => 
            array (
                'id' => 394,
                'city_id' => 394,
                'name' => '希维托赫洛维采',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            394 => 
            array (
                'id' => 395,
                'city_id' => 395,
                'name' => '谢德尔采',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            395 => 
            array (
                'id' => 396,
                'city_id' => 396,
                'name' => '谢拉兹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            396 => 
            array (
                'id' => 397,
                'city_id' => 397,
                'name' => '新松奇',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            397 => 
            array (
                'id' => 398,
                'city_id' => 398,
                'name' => '雅沃兹诺',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            398 => 
            array (
                'id' => 399,
                'city_id' => 399,
                'name' => '耶莱尼亚古拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            399 => 
            array (
                'id' => 400,
                'city_id' => 400,
                'name' => '扎布热',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            400 => 
            array (
                'id' => 401,
                'city_id' => 401,
                'name' => '扎莫希奇',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            401 => 
            array (
                'id' => 402,
                'city_id' => 402,
                'name' => '奥尔托',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            402 => 
            array (
                'id' => 403,
                'city_id' => 403,
                'name' => '奥鲁罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            403 => 
            array (
                'id' => 404,
                'city_id' => 404,
                'name' => '贝尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            404 => 
            array (
                'id' => 405,
                'city_id' => 405,
                'name' => '波多西',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            405 => 
            array (
                'id' => 406,
                'city_id' => 406,
                'name' => '基拉科洛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            406 => 
            array (
                'id' => 407,
                'city_id' => 407,
                'name' => '科恰班巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            407 => 
            array (
                'id' => 408,
                'city_id' => 408,
                'name' => '拉巴斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            408 => 
            array (
                'id' => 409,
                'city_id' => 409,
                'name' => '潘多',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            409 => 
            array (
                'id' => 410,
                'city_id' => 410,
                'name' => '丘基萨卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            410 => 
            array (
                'id' => 411,
                'city_id' => 411,
                'name' => '萨卡巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            411 => 
            array (
                'id' => 412,
                'city_id' => 412,
                'name' => '圣克鲁斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            412 => 
            array (
                'id' => 413,
                'city_id' => 413,
                'name' => '塔里哈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            413 => 
            array (
                'id' => 414,
                'city_id' => 414,
                'name' => '波萨维纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            414 => 
            array (
                'id' => 415,
                'city_id' => 415,
                'name' => '波斯尼亚－波德里涅',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            415 => 
            array (
                'id' => 416,
                'city_id' => 416,
                'name' => '多米斯拉夫格勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            416 => 
            array (
                'id' => 417,
                'city_id' => 417,
                'name' => '黑塞哥维那－涅雷特瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            417 => 
            array (
                'id' => 418,
                'city_id' => 418,
                'name' => '萨拉热窝',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            418 => 
            array (
                'id' => 419,
                'city_id' => 419,
                'name' => '图兹拉－波德里涅',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            419 => 
            array (
                'id' => 420,
                'city_id' => 420,
                'name' => '乌纳－萨纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            420 => 
            array (
                'id' => 421,
                'city_id' => 421,
                'name' => '西波斯尼亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            421 => 
            array (
                'id' => 422,
                'city_id' => 422,
                'name' => '西黑塞哥维那',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            422 => 
            array (
                'id' => 423,
                'city_id' => 423,
                'name' => '泽尼察－多博伊',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            423 => 
            array (
                'id' => 424,
                'city_id' => 424,
                'name' => '中波斯尼亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            424 => 
            array (
                'id' => 425,
                'city_id' => 425,
                'name' => '伯利兹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            425 => 
            array (
                'id' => 426,
                'city_id' => 426,
                'name' => '橘园',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            426 => 
            array (
                'id' => 427,
                'city_id' => 427,
                'name' => '卡约',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            427 => 
            array (
                'id' => 428,
                'city_id' => 428,
                'name' => '科罗萨尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            428 => 
            array (
                'id' => 429,
                'city_id' => 429,
                'name' => '斯坦港',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            429 => 
            array (
                'id' => 430,
                'city_id' => 430,
                'name' => '托莱多',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            430 => 
            array (
                'id' => 431,
                'city_id' => 431,
                'name' => '巴雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            431 => 
            array (
                'id' => 432,
                'city_id' => 432,
                'name' => '巴姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            432 => 
            array (
                'id' => 433,
                'city_id' => 433,
                'name' => '巴瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            433 => 
            array (
                'id' => 434,
                'city_id' => 434,
                'name' => '巴泽加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            434 => 
            array (
                'id' => 435,
                'city_id' => 435,
                'name' => '波尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            435 => 
            array (
                'id' => 436,
                'city_id' => 436,
                'name' => '布尔古',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            436 => 
            array (
                'id' => 437,
                'city_id' => 437,
                'name' => '布尔基恩德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            437 => 
            array (
                'id' => 438,
                'city_id' => 438,
                'name' => '布古里巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            438 => 
            array (
                'id' => 439,
                'city_id' => 439,
                'name' => '冈祖尔古',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            439 => 
            array (
                'id' => 440,
                'city_id' => 440,
                'name' => '古尔马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            440 => 
            array (
                'id' => 441,
                'city_id' => 441,
                'name' => '济罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            441 => 
            array (
                'id' => 442,
                'city_id' => 442,
                'name' => '卡焦戈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            442 => 
            array (
                'id' => 443,
                'city_id' => 443,
                'name' => '凯内杜古',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            443 => 
            array (
                'id' => 444,
                'city_id' => 444,
                'name' => '科蒙加里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            444 => 
            array (
                'id' => 445,
                'city_id' => 445,
                'name' => '科莫埃',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            445 => 
            array (
                'id' => 446,
                'city_id' => 446,
                'name' => '孔皮恩加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            446 => 
            array (
                'id' => 447,
                'city_id' => 447,
                'name' => '孔西',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            447 => 
            array (
                'id' => 448,
                'city_id' => 448,
                'name' => '库尔佩罗戈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            448 => 
            array (
                'id' => 449,
                'city_id' => 449,
                'name' => '库尔维奥戈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            449 => 
            array (
                'id' => 450,
                'city_id' => 450,
                'name' => '库里滕加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            450 => 
            array (
                'id' => 451,
                'city_id' => 451,
                'name' => '雷拉巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            451 => 
            array (
                'id' => 452,
                'city_id' => 452,
                'name' => '罗卢姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            452 => 
            array (
                'id' => 453,
                'city_id' => 453,
                'name' => '穆翁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            453 => 
            array (
                'id' => 454,
                'city_id' => 454,
                'name' => '纳门滕加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            454 => 
            array (
                'id' => 455,
                'city_id' => 455,
                'name' => '纳乌里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            455 => 
            array (
                'id' => 456,
                'city_id' => 456,
                'name' => '纳亚拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            456 => 
            array (
                'id' => 457,
                'city_id' => 457,
                'name' => '尼亚尼亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            457 => 
            array (
                'id' => 458,
                'city_id' => 458,
                'name' => '努姆比埃尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            458 => 
            array (
                'id' => 459,
                'city_id' => 459,
                'name' => '帕索雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            459 => 
            array (
                'id' => 460,
                'city_id' => 460,
                'name' => '塞诺',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            460 => 
            array (
                'id' => 461,
                'city_id' => 461,
                'name' => '桑吉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            461 => 
            array (
                'id' => 462,
                'city_id' => 462,
                'name' => '桑马滕加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            462 => 
            array (
                'id' => 463,
                'city_id' => 463,
                'name' => '苏鲁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            463 => 
            array (
                'id' => 464,
                'city_id' => 464,
                'name' => '苏姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            464 => 
            array (
                'id' => 465,
                'city_id' => 465,
                'name' => '塔波阿',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            465 => 
            array (
                'id' => 466,
                'city_id' => 466,
                'name' => '图伊',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            466 => 
            array (
                'id' => 467,
                'city_id' => 467,
                'name' => '乌埃',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            467 => 
            array (
                'id' => 468,
                'city_id' => 468,
                'name' => '乌布里滕加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            468 => 
            array (
                'id' => 469,
                'city_id' => 469,
                'name' => '乌达兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            469 => 
            array (
                'id' => 470,
                'city_id' => 470,
                'name' => '锡西里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            470 => 
            array (
                'id' => 471,
                'city_id' => 471,
                'name' => '亚加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            471 => 
            array (
                'id' => 472,
                'city_id' => 472,
                'name' => '亚滕加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            472 => 
            array (
                'id' => 473,
                'city_id' => 473,
                'name' => '伊奥巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            473 => 
            array (
                'id' => 474,
                'city_id' => 474,
                'name' => '宗德韦奥戈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            474 => 
            array (
                'id' => 475,
                'city_id' => 475,
                'name' => '宗多马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            475 => 
            array (
                'id' => 476,
                'city_id' => 476,
                'name' => '布班扎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            476 => 
            array (
                'id' => 477,
                'city_id' => 477,
                'name' => '布鲁里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            477 => 
            array (
                'id' => 478,
                'city_id' => 478,
                'name' => '布琼布拉城市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            478 => 
            array (
                'id' => 479,
                'city_id' => 479,
                'name' => '布琼布拉乡村',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            479 => 
            array (
                'id' => 480,
                'city_id' => 480,
                'name' => '恩戈齐',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            480 => 
            array (
                'id' => 481,
                'city_id' => 481,
                'name' => '基龙多',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            481 => 
            array (
                'id' => 482,
                'city_id' => 482,
                'name' => '基特加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            482 => 
            array (
                'id' => 483,
                'city_id' => 483,
                'name' => '卡鲁济',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            483 => 
            array (
                'id' => 484,
                'city_id' => 484,
                'name' => '卡扬扎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            484 => 
            array (
                'id' => 485,
                'city_id' => 485,
                'name' => '坎库佐',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            485 => 
            array (
                'id' => 486,
                'city_id' => 486,
                'name' => '鲁塔纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            486 => 
            array (
                'id' => 487,
                'city_id' => 487,
                'name' => '鲁伊吉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            487 => 
            array (
                'id' => 488,
                'city_id' => 488,
                'name' => '马坎巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            488 => 
            array (
                'id' => 489,
                'city_id' => 489,
                'name' => '穆拉姆维亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            489 => 
            array (
                'id' => 490,
                'city_id' => 490,
                'name' => '穆瓦洛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            490 => 
            array (
                'id' => 491,
                'city_id' => 491,
                'name' => '穆因加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            491 => 
            array (
                'id' => 492,
                'city_id' => 492,
                'name' => '锡比托凯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            492 => 
            array (
                'id' => 493,
                'city_id' => 493,
                'name' => '海州',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            493 => 
            array (
                'id' => 494,
                'city_id' => 494,
                'name' => '惠山',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            494 => 
            array (
                'id' => 495,
                'city_id' => 495,
                'name' => '江界',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            495 => 
            array (
                'id' => 496,
                'city_id' => 496,
                'name' => '开城',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            496 => 
            array (
                'id' => 497,
                'city_id' => 497,
                'name' => '罗先',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            497 => 
            array (
                'id' => 498,
                'city_id' => 498,
                'name' => '南浦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            498 => 
            array (
                'id' => 499,
                'city_id' => 499,
                'name' => '平壤',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            499 => 
            array (
                'id' => 500,
                'city_id' => 500,
                'name' => '清津',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
        ));
        \DB::table('world_cities_locale')->insert(array (
            0 => 
            array (
                'id' => 501,
                'city_id' => 501,
                'name' => '沙里院',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            1 => 
            array (
                'id' => 502,
                'city_id' => 502,
                'name' => '咸兴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            2 => 
            array (
                'id' => 503,
                'city_id' => 503,
                'name' => '新义州',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            3 => 
            array (
                'id' => 504,
                'city_id' => 504,
                'name' => '元山',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            4 => 
            array (
                'id' => 505,
                'city_id' => 505,
                'name' => '奥胡斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            5 => 
            array (
                'id' => 506,
                'city_id' => 506,
                'name' => '北日德兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            6 => 
            array (
                'id' => 507,
                'city_id' => 507,
                'name' => '博恩霍尔姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            7 => 
            array (
                'id' => 508,
                'city_id' => 508,
                'name' => '菲特烈堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            8 => 
            array (
                'id' => 509,
                'city_id' => 509,
                'name' => '菲茵',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            9 => 
            array (
                'id' => 510,
                'city_id' => 510,
                'name' => '哥本哈根',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            10 => 
            array (
                'id' => 511,
                'city_id' => 511,
                'name' => '里伯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            11 => 
            array (
                'id' => 512,
                'city_id' => 512,
                'name' => '灵克宾',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            12 => 
            array (
                'id' => 513,
                'city_id' => 513,
                'name' => '罗斯基勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            13 => 
            array (
                'id' => 514,
                'city_id' => 514,
                'name' => '南日德兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            14 => 
            array (
                'id' => 515,
                'city_id' => 515,
                'name' => '斯多斯特姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            15 => 
            array (
                'id' => 516,
                'city_id' => 516,
                'name' => '维堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            16 => 
            array (
                'id' => 517,
                'city_id' => 517,
                'name' => '维厄勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            17 => 
            array (
                'id' => 518,
                'city_id' => 518,
                'name' => '西希兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            18 => 
            array (
                'id' => 519,
                'city_id' => 519,
                'name' => '阿恩斯贝格',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            19 => 
            array (
                'id' => 520,
                'city_id' => 520,
                'name' => '爱尔福特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            20 => 
            array (
                'id' => 521,
                'city_id' => 521,
                'name' => '安斯巴格',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            21 => 
            array (
                'id' => 522,
                'city_id' => 522,
                'name' => '奥格斯堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            22 => 
            array (
                'id' => 523,
                'city_id' => 523,
                'name' => '柏林',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            23 => 
            array (
                'id' => 524,
                'city_id' => 524,
                'name' => '拜伊罗特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            24 => 
            array (
                'id' => 525,
                'city_id' => 525,
                'name' => '比勒费尔德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            25 => 
            array (
                'id' => 526,
                'city_id' => 526,
                'name' => '波茨坦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            26 => 
            array (
                'id' => 527,
                'city_id' => 527,
                'name' => '波鸿',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            27 => 
            array (
                'id' => 528,
                'city_id' => 528,
                'name' => '不来梅',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            28 => 
            array (
                'id' => 529,
                'city_id' => 529,
                'name' => '不伦瑞克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            29 => 
            array (
                'id' => 530,
                'city_id' => 530,
                'name' => '达姆施塔特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            30 => 
            array (
                'id' => 531,
                'city_id' => 531,
                'name' => '代特莫尔特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            31 => 
            array (
                'id' => 532,
                'city_id' => 532,
                'name' => '德累斯顿',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            32 => 
            array (
                'id' => 533,
                'city_id' => 533,
                'name' => '德绍',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            33 => 
            array (
                'id' => 534,
                'city_id' => 534,
                'name' => '杜塞尔多夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            34 => 
            array (
                'id' => 535,
                'city_id' => 535,
                'name' => '法兰克福',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            35 => 
            array (
                'id' => 536,
                'city_id' => 536,
                'name' => '弗赖堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            36 => 
            array (
                'id' => 537,
                'city_id' => 537,
                'name' => '哈雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            37 => 
            array (
                'id' => 538,
                'city_id' => 538,
                'name' => '汉堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            38 => 
            array (
                'id' => 539,
                'city_id' => 539,
                'name' => '汉诺威',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            39 => 
            array (
                'id' => 540,
                'city_id' => 540,
                'name' => '基尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            40 => 
            array (
                'id' => 541,
                'city_id' => 541,
                'name' => '吉森',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            41 => 
            array (
                'id' => 542,
                'city_id' => 542,
                'name' => '卡尔斯鲁厄',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            42 => 
            array (
                'id' => 543,
                'city_id' => 543,
                'name' => '卡塞尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            43 => 
            array (
                'id' => 544,
                'city_id' => 544,
                'name' => '开姆尼斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            44 => 
            array (
                'id' => 545,
                'city_id' => 545,
                'name' => '科布伦次',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            45 => 
            array (
                'id' => 546,
                'city_id' => 546,
                'name' => '科隆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            46 => 
            array (
                'id' => 547,
                'city_id' => 547,
                'name' => '莱比锡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            47 => 
            array (
                'id' => 548,
                'city_id' => 548,
                'name' => '兰茨胡特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            48 => 
            array (
                'id' => 549,
                'city_id' => 549,
                'name' => '吕讷堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            49 => 
            array (
                'id' => 550,
                'city_id' => 550,
                'name' => '马格德堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            50 => 
            array (
                'id' => 551,
                'city_id' => 551,
                'name' => '曼海姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            51 => 
            array (
                'id' => 552,
                'city_id' => 552,
                'name' => '美因兹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            52 => 
            array (
                'id' => 553,
                'city_id' => 553,
                'name' => '明斯特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            53 => 
            array (
                'id' => 554,
                'city_id' => 554,
                'name' => '慕尼黑',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            54 => 
            array (
                'id' => 555,
                'city_id' => 555,
                'name' => '纽伦堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            55 => 
            array (
                'id' => 556,
                'city_id' => 556,
                'name' => '什未林',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            56 => 
            array (
                'id' => 557,
                'city_id' => 557,
                'name' => '斯图加特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            57 => 
            array (
                'id' => 558,
                'city_id' => 558,
                'name' => '特里尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            58 => 
            array (
                'id' => 559,
                'city_id' => 559,
                'name' => '威斯巴登',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            59 => 
            array (
                'id' => 560,
                'city_id' => 560,
                'name' => '维尔茨堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            60 => 
            array (
                'id' => 561,
                'city_id' => 561,
                'name' => '阿伊莱乌',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            61 => 
            array (
                'id' => 562,
                'city_id' => 562,
                'name' => '阿伊纳罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            62 => 
            array (
                'id' => 563,
                'city_id' => 563,
                'name' => '埃尔梅拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            63 => 
            array (
                'id' => 564,
                'city_id' => 564,
                'name' => '安贝诺',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            64 => 
            array (
                'id' => 565,
                'city_id' => 565,
                'name' => '包考',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            65 => 
            array (
                'id' => 566,
                'city_id' => 566,
                'name' => '博博纳罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            66 => 
            array (
                'id' => 567,
                'city_id' => 567,
                'name' => '帝力',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            67 => 
            array (
                'id' => 568,
                'city_id' => 568,
                'name' => '科瓦利马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            68 => 
            array (
                'id' => 569,
                'city_id' => 569,
                'name' => '劳滕',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            69 => 
            array (
                'id' => 570,
                'city_id' => 570,
                'name' => '利基卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            70 => 
            array (
                'id' => 571,
                'city_id' => 571,
                'name' => '马纳图托',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            71 => 
            array (
                'id' => 572,
                'city_id' => 572,
                'name' => '马努法伊',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            72 => 
            array (
                'id' => 573,
                'city_id' => 573,
                'name' => '维克克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            73 => 
            array (
                'id' => 574,
                'city_id' => 574,
                'name' => '滨海区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            74 => 
            array (
                'id' => 575,
                'city_id' => 575,
                'name' => '草原区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            75 => 
            array (
                'id' => 576,
                'city_id' => 576,
                'name' => '高原区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            76 => 
            array (
                'id' => 577,
                'city_id' => 577,
                'name' => '卡拉区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            77 => 
            array (
                'id' => 578,
                'city_id' => 578,
                'name' => '中部区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            78 => 
            array (
                'id' => 579,
                'city_id' => 579,
                'name' => '阿巴坎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            79 => 
            array (
                'id' => 580,
                'city_id' => 580,
                'name' => '阿尔汉格尔斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            80 => 
            array (
                'id' => 581,
                'city_id' => 581,
                'name' => '阿金斯科耶',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            81 => 
            array (
                'id' => 582,
                'city_id' => 582,
                'name' => '阿纳德尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            82 => 
            array (
                'id' => 583,
                'city_id' => 583,
                'name' => '阿斯特拉罕',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            83 => 
            array (
                'id' => 584,
                'city_id' => 584,
                'name' => '埃利斯塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            84 => 
            array (
                'id' => 585,
                'city_id' => 585,
                'name' => '奥廖尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            85 => 
            array (
                'id' => 586,
                'city_id' => 586,
                'name' => '奥伦堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            86 => 
            array (
                'id' => 587,
                'city_id' => 587,
                'name' => '巴尔瑙尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            87 => 
            array (
                'id' => 588,
                'city_id' => 588,
                'name' => '奔萨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            88 => 
            array (
                'id' => 589,
                'city_id' => 589,
                'name' => '彼得罗巴甫洛夫斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            89 => 
            array (
                'id' => 590,
                'city_id' => 590,
                'name' => '彼得罗扎沃茨克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            90 => 
            array (
                'id' => 591,
                'city_id' => 591,
                'name' => '彼尔姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            91 => 
            array (
                'id' => 592,
                'city_id' => 592,
                'name' => '比罗比詹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            92 => 
            array (
                'id' => 593,
                'city_id' => 593,
                'name' => '别尔哥罗德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            93 => 
            array (
                'id' => 594,
                'city_id' => 594,
                'name' => '伯力',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            94 => 
            array (
                'id' => 595,
                'city_id' => 595,
                'name' => '布拉戈维申斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            95 => 
            array (
                'id' => 596,
                'city_id' => 596,
                'name' => '布良斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            96 => 
            array (
                'id' => 597,
                'city_id' => 597,
                'name' => '车里雅宾斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            97 => 
            array (
                'id' => 598,
                'city_id' => 598,
                'name' => '赤塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            98 => 
            array (
                'id' => 599,
                'city_id' => 599,
                'name' => '顿河畔罗斯托夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            99 => 
            array (
                'id' => 600,
                'city_id' => 600,
                'name' => '鄂木斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            100 => 
            array (
                'id' => 601,
                'city_id' => 601,
                'name' => '伏尔加格勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            101 => 
            array (
                'id' => 602,
                'city_id' => 602,
                'name' => '弗拉基米尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            102 => 
            array (
                'id' => 603,
                'city_id' => 603,
                'name' => '弗拉季高加索',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            103 => 
            array (
                'id' => 604,
                'city_id' => 604,
                'name' => '戈尔诺－阿尔泰斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            104 => 
            array (
                'id' => 605,
                'city_id' => 605,
                'name' => '格罗兹尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            105 => 
            array (
                'id' => 606,
                'city_id' => 606,
                'name' => '海参崴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            106 => 
            array (
                'id' => 607,
                'city_id' => 607,
                'name' => '汉特－曼西斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            107 => 
            array (
                'id' => 608,
                'city_id' => 608,
                'name' => '基洛夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            108 => 
            array (
                'id' => 609,
                'city_id' => 609,
                'name' => '加里宁格勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            109 => 
            array (
                'id' => 610,
                'city_id' => 610,
                'name' => '喀山',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            110 => 
            array (
                'id' => 611,
                'city_id' => 611,
                'name' => '卡卢加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            111 => 
            array (
                'id' => 612,
                'city_id' => 612,
                'name' => '科斯特罗马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            112 => 
            array (
                'id' => 613,
                'city_id' => 613,
                'name' => '克拉斯诺达尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            113 => 
            array (
                'id' => 614,
                'city_id' => 614,
                'name' => '克拉斯诺亚尔斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            114 => 
            array (
                'id' => 615,
                'city_id' => 615,
                'name' => '克麦罗沃',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            115 => 
            array (
                'id' => 616,
                'city_id' => 616,
                'name' => '克孜勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            116 => 
            array (
                'id' => 617,
                'city_id' => 617,
                'name' => '库德姆卡尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            117 => 
            array (
                'id' => 618,
                'city_id' => 618,
                'name' => '库尔干',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            118 => 
            array (
                'id' => 619,
                'city_id' => 619,
                'name' => '库尔斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            119 => 
            array (
                'id' => 620,
                'city_id' => 620,
                'name' => '利佩茨克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            120 => 
            array (
                'id' => 621,
                'city_id' => 621,
                'name' => '梁赞',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            121 => 
            array (
                'id' => 622,
                'city_id' => 622,
                'name' => '马哈奇卡拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            122 => 
            array (
                'id' => 623,
                'city_id' => 623,
                'name' => '马加丹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            123 => 
            array (
                'id' => 624,
                'city_id' => 624,
                'name' => '马加斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            124 => 
            array (
                'id' => 625,
                'city_id' => 625,
                'name' => '迈科普',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            125 => 
            array (
                'id' => 626,
                'city_id' => 626,
                'name' => '摩尔曼斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            126 => 
            array (
                'id' => 627,
                'city_id' => 627,
                'name' => '莫斯科',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            127 => 
            array (
                'id' => 628,
                'city_id' => 628,
                'name' => '纳尔奇克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            128 => 
            array (
                'id' => 629,
                'city_id' => 629,
                'name' => '纳里扬马尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            129 => 
            array (
                'id' => 630,
                'city_id' => 630,
                'name' => '南萨哈林斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            130 => 
            array (
                'id' => 631,
                'city_id' => 631,
                'name' => '诺夫哥罗德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            131 => 
            array (
                'id' => 632,
                'city_id' => 632,
                'name' => '帕拉纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            132 => 
            array (
                'id' => 633,
                'city_id' => 633,
                'name' => '普斯科夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            133 => 
            array (
                'id' => 634,
                'city_id' => 634,
                'name' => '切博克萨雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            134 => 
            array (
                'id' => 635,
                'city_id' => 635,
                'name' => '切尔克斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            135 => 
            array (
                'id' => 636,
                'city_id' => 636,
                'name' => '秋明',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            136 => 
            array (
                'id' => 637,
                'city_id' => 637,
                'name' => '萨拉托夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            137 => 
            array (
                'id' => 638,
                'city_id' => 638,
                'name' => '萨兰斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            138 => 
            array (
                'id' => 639,
                'city_id' => 639,
                'name' => '萨列哈尔德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            139 => 
            array (
                'id' => 640,
                'city_id' => 640,
                'name' => '萨马拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            140 => 
            array (
                'id' => 641,
                'city_id' => 641,
                'name' => '瑟克特夫卡尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            141 => 
            array (
                'id' => 642,
                'city_id' => 642,
                'name' => '圣彼得堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            142 => 
            array (
                'id' => 643,
                'city_id' => 643,
                'name' => '斯摩棱斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            143 => 
            array (
                'id' => 644,
                'city_id' => 644,
                'name' => '斯塔夫罗波尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            144 => 
            array (
                'id' => 645,
                'city_id' => 645,
                'name' => '坦波夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            145 => 
            array (
                'id' => 646,
                'city_id' => 646,
                'name' => '特维尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            146 => 
            array (
                'id' => 647,
                'city_id' => 647,
                'name' => '图拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            147 => 
            array (
                'id' => 648,
                'city_id' => 648,
                'name' => '托木斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            148 => 
            array (
                'id' => 649,
                'city_id' => 649,
                'name' => '沃罗涅什',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            149 => 
            array (
                'id' => 650,
                'city_id' => 650,
                'name' => '沃洛格达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            150 => 
            array (
                'id' => 651,
                'city_id' => 651,
                'name' => '乌法',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            151 => 
            array (
                'id' => 652,
                'city_id' => 652,
                'name' => '乌兰乌德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            152 => 
            array (
                'id' => 653,
                'city_id' => 653,
                'name' => '乌里扬诺夫斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            153 => 
            array (
                'id' => 654,
                'city_id' => 654,
                'name' => '乌斯季奥尔登斯基',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            154 => 
            array (
                'id' => 655,
                'city_id' => 655,
                'name' => '下诺夫哥罗德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            155 => 
            array (
                'id' => 656,
                'city_id' => 656,
                'name' => '新西伯利亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            156 => 
            array (
                'id' => 657,
                'city_id' => 657,
                'name' => '雅库茨克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            157 => 
            array (
                'id' => 658,
                'city_id' => 658,
                'name' => '雅罗斯拉夫尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            158 => 
            array (
                'id' => 659,
                'city_id' => 659,
                'name' => '叶卡捷林堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            159 => 
            array (
                'id' => 660,
                'city_id' => 660,
                'name' => '伊尔库茨克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            160 => 
            array (
                'id' => 661,
                'city_id' => 661,
                'name' => '伊热夫斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            161 => 
            array (
                'id' => 662,
                'city_id' => 662,
                'name' => '伊万诺沃',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            162 => 
            array (
                'id' => 663,
                'city_id' => 663,
                'name' => '约什卡尔奥拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            163 => 
            array (
                'id' => 664,
                'city_id' => 664,
                'name' => '阿苏艾',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            164 => 
            array (
                'id' => 665,
                'city_id' => 665,
                'name' => '埃尔奥罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            165 => 
            array (
                'id' => 666,
                'city_id' => 666,
                'name' => '埃斯梅拉尔达斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            166 => 
            array (
                'id' => 667,
                'city_id' => 667,
                'name' => '玻利瓦尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            167 => 
            array (
                'id' => 668,
                'city_id' => 668,
                'name' => '瓜亚斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            168 => 
            array (
                'id' => 669,
                'city_id' => 669,
                'name' => '加拉帕戈斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            169 => 
            array (
                'id' => 670,
                'city_id' => 670,
                'name' => '卡尔奇',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            170 => 
            array (
                'id' => 671,
                'city_id' => 671,
                'name' => '卡尼亚尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            171 => 
            array (
                'id' => 672,
                'city_id' => 672,
                'name' => '科托帕希',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            172 => 
            array (
                'id' => 673,
                'city_id' => 673,
                'name' => '洛哈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            173 => 
            array (
                'id' => 674,
                'city_id' => 674,
                'name' => '洛斯里奥斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            174 => 
            array (
                'id' => 675,
                'city_id' => 675,
                'name' => '马纳比',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            175 => 
            array (
                'id' => 676,
                'city_id' => 676,
                'name' => '莫罗纳－圣地亚哥',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            176 => 
            array (
                'id' => 677,
                'city_id' => 677,
                'name' => '纳波，奥雷利亚纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            177 => 
            array (
                'id' => 678,
                'city_id' => 678,
                'name' => '帕斯塔萨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            178 => 
            array (
                'id' => 679,
                'city_id' => 679,
                'name' => '皮钦查',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            179 => 
            array (
                'id' => 680,
                'city_id' => 680,
                'name' => '钦博拉索',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            180 => 
            array (
                'id' => 681,
                'city_id' => 681,
                'name' => '萨莫拉－钦奇佩',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            181 => 
            array (
                'id' => 682,
                'city_id' => 682,
                'name' => '苏昆毕奥斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            182 => 
            array (
                'id' => 683,
                'city_id' => 683,
                'name' => '通古拉瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            183 => 
            array (
                'id' => 684,
                'city_id' => 684,
                'name' => '因巴布拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            184 => 
            array (
                'id' => 685,
                'city_id' => 685,
                'name' => '安塞巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            185 => 
            array (
                'id' => 686,
                'city_id' => 686,
                'name' => '北红海',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            186 => 
            array (
                'id' => 687,
                'city_id' => 687,
                'name' => '加什·巴尔卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            187 => 
            array (
                'id' => 688,
                'city_id' => 688,
                'name' => '南部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            188 => 
            array (
                'id' => 689,
                'city_id' => 689,
                'name' => '南红海',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            189 => 
            array (
                'id' => 690,
                'city_id' => 690,
                'name' => '中部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            190 => 
            array (
                'id' => 691,
                'city_id' => 691,
                'name' => '阿尔勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            191 => 
            array (
                'id' => 692,
                'city_id' => 692,
                'name' => '阿雅克修',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            192 => 
            array (
                'id' => 693,
                'city_id' => 693,
                'name' => '艾克斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            193 => 
            array (
                'id' => 694,
                'city_id' => 694,
                'name' => '奥尔良',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            194 => 
            array (
                'id' => 695,
                'city_id' => 695,
                'name' => '巴黎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            195 => 
            array (
                'id' => 696,
                'city_id' => 696,
                'name' => '贝桑松',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            196 => 
            array (
                'id' => 697,
                'city_id' => 697,
                'name' => '第戎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            197 => 
            array (
                'id' => 698,
                'city_id' => 698,
                'name' => '弗雷瑞斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            198 => 
            array (
                'id' => 699,
                'city_id' => 699,
                'name' => '卡昂',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            199 => 
            array (
                'id' => 700,
                'city_id' => 700,
                'name' => '雷恩',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            200 => 
            array (
                'id' => 701,
                'city_id' => 701,
                'name' => '里昂',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            201 => 
            array (
                'id' => 702,
                'city_id' => 702,
                'name' => '里尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            202 => 
            array (
                'id' => 703,
                'city_id' => 703,
                'name' => '利摩日',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            203 => 
            array (
                'id' => 704,
                'city_id' => 704,
                'name' => '鲁昂',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            204 => 
            array (
                'id' => 705,
                'city_id' => 705,
                'name' => '马赛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            205 => 
            array (
                'id' => 706,
                'city_id' => 706,
                'name' => '梅斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            206 => 
            array (
                'id' => 707,
                'city_id' => 707,
                'name' => '蒙彼利埃',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            207 => 
            array (
                'id' => 708,
                'city_id' => 708,
                'name' => '南特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            208 => 
            array (
                'id' => 709,
                'city_id' => 709,
                'name' => '尼斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            209 => 
            array (
                'id' => 710,
                'city_id' => 710,
                'name' => '沙隆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            210 => 
            array (
                'id' => 711,
                'city_id' => 711,
                'name' => '图卢兹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            211 => 
            array (
                'id' => 712,
                'city_id' => 712,
                'name' => '瓦朗斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            212 => 
            array (
                'id' => 713,
                'city_id' => 713,
                'name' => '亚眠',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            213 => 
            array (
                'id' => 714,
                'city_id' => 714,
                'name' => '达沃',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            214 => 
            array (
                'id' => 715,
                'city_id' => 715,
                'name' => '卡卢坎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            215 => 
            array (
                'id' => 716,
                'city_id' => 716,
                'name' => '马尼拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            216 => 
            array (
                'id' => 717,
                'city_id' => 717,
                'name' => '宿务',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            217 => 
            array (
                'id' => 718,
                'city_id' => 718,
                'name' => '埃斯波',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            218 => 
            array (
                'id' => 719,
                'city_id' => 719,
                'name' => '奥卢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            219 => 
            array (
                'id' => 720,
                'city_id' => 720,
                'name' => '波里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            220 => 
            array (
                'id' => 721,
                'city_id' => 721,
                'name' => '博尔沃',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            221 => 
            array (
                'id' => 722,
                'city_id' => 722,
                'name' => '海门林纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            222 => 
            array (
                'id' => 723,
                'city_id' => 723,
                'name' => '赫尔辛基',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            223 => 
            array (
                'id' => 724,
                'city_id' => 724,
                'name' => '卡亚尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            224 => 
            array (
                'id' => 725,
                'city_id' => 725,
                'name' => '科科拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            225 => 
            array (
                'id' => 726,
                'city_id' => 726,
                'name' => '科特卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            226 => 
            array (
                'id' => 727,
                'city_id' => 727,
                'name' => '库奥皮奥',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            227 => 
            array (
                'id' => 728,
                'city_id' => 728,
                'name' => '拉赫蒂',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            228 => 
            array (
                'id' => 729,
                'city_id' => 729,
                'name' => '拉彭兰塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            229 => 
            array (
                'id' => 730,
                'city_id' => 730,
                'name' => '罗瓦涅米',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            230 => 
            array (
                'id' => 731,
                'city_id' => 731,
                'name' => '玛丽港',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            231 => 
            array (
                'id' => 732,
                'city_id' => 732,
                'name' => '米凯利',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            232 => 
            array (
                'id' => 733,
                'city_id' => 733,
                'name' => '坦佩雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            233 => 
            array (
                'id' => 734,
                'city_id' => 734,
                'name' => '图尔库',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            234 => 
            array (
                'id' => 735,
                'city_id' => 735,
                'name' => '瓦萨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            235 => 
            array (
                'id' => 736,
                'city_id' => 736,
                'name' => '万塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            236 => 
            array (
                'id' => 737,
                'city_id' => 737,
                'name' => '约恩苏',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            237 => 
            array (
                'id' => 738,
                'city_id' => 738,
                'name' => '保尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            238 => 
            array (
                'id' => 739,
                'city_id' => 739,
                'name' => '波多诺伏',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            239 => 
            array (
                'id' => 740,
                'city_id' => 740,
                'name' => '博阿维斯塔岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            240 => 
            array (
                'id' => 741,
                'city_id' => 741,
                'name' => '布拉瓦岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            241 => 
            array (
                'id' => 742,
                'city_id' => 742,
                'name' => '大里贝拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            242 => 
            array (
                'id' => 743,
                'city_id' => 743,
                'name' => '福古岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            243 => 
            array (
                'id' => 744,
                'city_id' => 744,
                'name' => '马尤岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            244 => 
            array (
                'id' => 745,
                'city_id' => 745,
                'name' => '莫斯特罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            245 => 
            array (
                'id' => 746,
                'city_id' => 746,
                'name' => '普拉亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            246 => 
            array (
                'id' => 747,
                'city_id' => 747,
                'name' => '萨尔岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            247 => 
            array (
                'id' => 748,
                'city_id' => 748,
                'name' => '圣安唐岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            248 => 
            array (
                'id' => 749,
                'city_id' => 749,
                'name' => '圣地亚哥岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            249 => 
            array (
                'id' => 750,
                'city_id' => 750,
                'name' => '圣多明戈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            250 => 
            array (
                'id' => 751,
                'city_id' => 751,
                'name' => '圣菲利普',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            251 => 
            array (
                'id' => 752,
                'city_id' => 752,
                'name' => '圣卡塔琳娜',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            252 => 
            array (
                'id' => 753,
                'city_id' => 753,
                'name' => '圣克鲁斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            253 => 
            array (
                'id' => 754,
                'city_id' => 754,
                'name' => '圣米戈尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            254 => 
            array (
                'id' => 755,
                'city_id' => 755,
                'name' => '圣尼古拉岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            255 => 
            array (
                'id' => 756,
                'city_id' => 756,
                'name' => '圣维森特岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            256 => 
            array (
                'id' => 757,
                'city_id' => 757,
                'name' => '塔拉法尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            257 => 
            array (
                'id' => 758,
                'city_id' => 758,
                'name' => '阿劳卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            258 => 
            array (
                'id' => 759,
                'city_id' => 759,
                'name' => '安提奥基亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            259 => 
            array (
                'id' => 760,
                'city_id' => 760,
                'name' => '北桑坦德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            260 => 
            array (
                'id' => 761,
                'city_id' => 761,
                'name' => '波哥大首都区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            261 => 
            array (
                'id' => 762,
                'city_id' => 762,
                'name' => '博利瓦尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            262 => 
            array (
                'id' => 763,
                'city_id' => 763,
                'name' => '博亚卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            263 => 
            array (
                'id' => 764,
                'city_id' => 764,
                'name' => '大西洋',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            264 => 
            array (
                'id' => 765,
                'city_id' => 765,
                'name' => '瓜维亚雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            265 => 
            array (
                'id' => 766,
                'city_id' => 766,
                'name' => '瓜希拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            266 => 
            array (
                'id' => 767,
                'city_id' => 767,
                'name' => '瓜伊尼亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            267 => 
            array (
                'id' => 768,
                'city_id' => 768,
                'name' => '金迪奥',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            268 => 
            array (
                'id' => 769,
                'city_id' => 769,
                'name' => '卡尔达斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            269 => 
            array (
                'id' => 770,
                'city_id' => 770,
                'name' => '卡克塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            270 => 
            array (
                'id' => 771,
                'city_id' => 771,
                'name' => '卡萨纳雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            271 => 
            array (
                'id' => 772,
                'city_id' => 772,
                'name' => '考卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            272 => 
            array (
                'id' => 773,
                'city_id' => 773,
                'name' => '考卡山谷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            273 => 
            array (
                'id' => 774,
                'city_id' => 774,
                'name' => '科尔多巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            274 => 
            array (
                'id' => 775,
                'city_id' => 775,
                'name' => '昆迪纳马卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            275 => 
            array (
                'id' => 776,
                'city_id' => 776,
                'name' => '利萨拉尔达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            276 => 
            array (
                'id' => 777,
                'city_id' => 777,
                'name' => '马格达雷那',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            277 => 
            array (
                'id' => 778,
                'city_id' => 778,
                'name' => '梅塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            278 => 
            array (
                'id' => 779,
                'city_id' => 779,
                'name' => '纳里尼奥',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            279 => 
            array (
                'id' => 780,
                'city_id' => 780,
                'name' => '普图马约',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            280 => 
            array (
                'id' => 781,
                'city_id' => 781,
                'name' => '乔科',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            281 => 
            array (
                'id' => 782,
                'city_id' => 782,
                'name' => '塞萨尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            282 => 
            array (
                'id' => 783,
                'city_id' => 783,
                'name' => '桑坦德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            283 => 
            array (
                'id' => 784,
                'city_id' => 784,
                'name' => '圣安德烈斯-普罗维登西亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            284 => 
            array (
                'id' => 785,
                'city_id' => 785,
                'name' => '苏克雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            285 => 
            array (
                'id' => 786,
                'city_id' => 786,
                'name' => '托利马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            286 => 
            array (
                'id' => 787,
                'city_id' => 787,
                'name' => '维查达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            287 => 
            array (
                'id' => 788,
                'city_id' => 788,
                'name' => '沃佩斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            288 => 
            array (
                'id' => 789,
                'city_id' => 789,
                'name' => '乌伊拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            289 => 
            array (
                'id' => 790,
                'city_id' => 790,
                'name' => '亚马孙',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            290 => 
            array (
                'id' => 791,
                'city_id' => 791,
                'name' => '阿拉胡埃拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            291 => 
            array (
                'id' => 792,
                'city_id' => 792,
                'name' => '埃雷迪亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            292 => 
            array (
                'id' => 793,
                'city_id' => 793,
                'name' => '瓜纳卡斯特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            293 => 
            array (
                'id' => 794,
                'city_id' => 794,
                'name' => '卡塔戈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            294 => 
            array (
                'id' => 795,
                'city_id' => 795,
                'name' => '利蒙',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            295 => 
            array (
                'id' => 796,
                'city_id' => 796,
                'name' => '蓬塔雷纳斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            296 => 
            array (
                'id' => 797,
                'city_id' => 797,
                'name' => '圣何塞',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            297 => 
            array (
                'id' => 798,
                'city_id' => 798,
                'name' => '奥尔金',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            298 => 
            array (
                'id' => 799,
                'city_id' => 799,
                'name' => '比那尔德里奥',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            299 => 
            array (
                'id' => 800,
                'city_id' => 800,
                'name' => '比亚克拉拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            300 => 
            array (
                'id' => 801,
                'city_id' => 801,
                'name' => '格拉玛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            301 => 
            array (
                'id' => 802,
                'city_id' => 802,
                'name' => '关塔那摩',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            302 => 
            array (
                'id' => 803,
                'city_id' => 803,
                'name' => '哈瓦那',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            303 => 
            array (
                'id' => 804,
                'city_id' => 804,
                'name' => '哈瓦那城',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            304 => 
            array (
                'id' => 805,
                'city_id' => 805,
                'name' => '卡马圭',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            305 => 
            array (
                'id' => 806,
                'city_id' => 806,
                'name' => '拉斯图纳斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            306 => 
            array (
                'id' => 807,
                'city_id' => 807,
                'name' => '马坦萨斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            307 => 
            array (
                'id' => 808,
                'city_id' => 808,
                'name' => '马亚里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            308 => 
            array (
                'id' => 809,
                'city_id' => 809,
                'name' => '曼萨尼罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            309 => 
            array (
                'id' => 810,
                'city_id' => 810,
                'name' => '青年岛特区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            310 => 
            array (
                'id' => 811,
                'city_id' => 811,
                'name' => '圣地亚哥',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            311 => 
            array (
                'id' => 812,
                'city_id' => 812,
                'name' => '圣斯皮里图斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            312 => 
            array (
                'id' => 813,
                'city_id' => 813,
                'name' => '西恩富戈斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            313 => 
            array (
                'id' => 814,
                'city_id' => 814,
                'name' => '谢戈德阿维拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            314 => 
            array (
                'id' => 815,
                'city_id' => 815,
                'name' => '埃塞奎博群岛-西德梅拉拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            315 => 
            array (
                'id' => 816,
                'city_id' => 816,
                'name' => '巴里马-瓦伊尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            316 => 
            array (
                'id' => 817,
                'city_id' => 817,
                'name' => '波默伦-苏佩纳姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            317 => 
            array (
                'id' => 818,
                'city_id' => 818,
                'name' => '波塔罗-锡帕鲁尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            318 => 
            array (
                'id' => 819,
                'city_id' => 819,
                'name' => '德梅拉拉-马海卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            319 => 
            array (
                'id' => 820,
                'city_id' => 820,
                'name' => '东伯比斯-科兰太因',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            320 => 
            array (
                'id' => 821,
                'city_id' => 821,
                'name' => '库尤尼-马扎鲁尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            321 => 
            array (
                'id' => 822,
                'city_id' => 822,
                'name' => '马海卡-伯比斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            322 => 
            array (
                'id' => 823,
                'city_id' => 823,
                'name' => '上德梅拉拉-伯比斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            323 => 
            array (
                'id' => 824,
                'city_id' => 824,
                'name' => '上塔库图-上埃塞奎博',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            324 => 
            array (
                'id' => 825,
                'city_id' => 825,
                'name' => '阿尔卡累克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            325 => 
            array (
                'id' => 826,
                'city_id' => 826,
                'name' => '阿克莫拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            326 => 
            array (
                'id' => 827,
                'city_id' => 827,
                'name' => '阿克苏',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            327 => 
            array (
                'id' => 828,
                'city_id' => 828,
                'name' => '阿克托别',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            328 => 
            array (
                'id' => 829,
                'city_id' => 829,
                'name' => '阿拉木图',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            329 => 
            array (
                'id' => 830,
                'city_id' => 830,
                'name' => '阿雷斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            330 => 
            array (
                'id' => 831,
                'city_id' => 831,
                'name' => '阿斯塔纳市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            331 => 
            array (
                'id' => 832,
                'city_id' => 832,
                'name' => '阿特劳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            332 => 
            array (
                'id' => 833,
                'city_id' => 833,
                'name' => '埃基巴斯图兹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            333 => 
            array (
                'id' => 834,
                'city_id' => 834,
                'name' => '巴尔喀什',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            334 => 
            array (
                'id' => 835,
                'city_id' => 835,
                'name' => '巴甫洛达尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            335 => 
            array (
                'id' => 836,
                'city_id' => 836,
                'name' => '北哈萨克斯坦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            336 => 
            array (
                'id' => 837,
                'city_id' => 837,
                'name' => '东哈萨克斯坦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            337 => 
            array (
                'id' => 838,
                'city_id' => 838,
                'name' => '济良诺夫斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            338 => 
            array (
                'id' => 839,
                'city_id' => 839,
                'name' => '江布尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            339 => 
            array (
                'id' => 840,
                'city_id' => 840,
                'name' => '杰兹卡兹甘',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            340 => 
            array (
                'id' => 841,
                'city_id' => 841,
                'name' => '卡拉干达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            341 => 
            array (
                'id' => 842,
                'city_id' => 842,
                'name' => '卡拉扎尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            342 => 
            array (
                'id' => 843,
                'city_id' => 843,
                'name' => '卡普恰盖',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            343 => 
            array (
                'id' => 844,
                'city_id' => 844,
                'name' => '科斯塔奈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            344 => 
            array (
                'id' => 845,
                'city_id' => 845,
                'name' => '克孜勒奥尔达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            345 => 
            array (
                'id' => 846,
                'city_id' => 846,
                'name' => '肯套',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            346 => 
            array (
                'id' => 847,
                'city_id' => 847,
                'name' => '库尔恰托夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            347 => 
            array (
                'id' => 848,
                'city_id' => 848,
                'name' => '利萨科夫斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            348 => 
            array (
                'id' => 849,
                'city_id' => 849,
                'name' => '列宁诺戈尔斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            349 => 
            array (
                'id' => 850,
                'city_id' => 850,
                'name' => '鲁德内',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            350 => 
            array (
                'id' => 851,
                'city_id' => 851,
                'name' => '曼格斯套',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            351 => 
            array (
                'id' => 852,
                'city_id' => 852,
                'name' => '南哈萨克斯坦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            352 => 
            array (
                'id' => 853,
                'city_id' => 853,
                'name' => '萨兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            353 => 
            array (
                'id' => 854,
                'city_id' => 854,
                'name' => '塞梅伊',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            354 => 
            array (
                'id' => 855,
                'city_id' => 855,
                'name' => '沙赫京斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            355 => 
            array (
                'id' => 856,
                'city_id' => 856,
                'name' => '斯捷普诺戈尔斯克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            356 => 
            array (
                'id' => 857,
                'city_id' => 857,
                'name' => '铁克利',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            357 => 
            array (
                'id' => 858,
                'city_id' => 858,
                'name' => '铁米尔套',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            358 => 
            array (
                'id' => 859,
                'city_id' => 859,
                'name' => '突厥斯坦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            359 => 
            array (
                'id' => 860,
                'city_id' => 860,
                'name' => '西哈萨克斯坦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            360 => 
            array (
                'id' => 861,
                'city_id' => 861,
                'name' => '扎纳奥津',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            361 => 
            array (
                'id' => 862,
                'city_id' => 862,
                'name' => '阿尔梅勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            362 => 
            array (
                'id' => 863,
                'city_id' => 863,
                'name' => '阿默斯福特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            363 => 
            array (
                'id' => 864,
                'city_id' => 864,
                'name' => '阿姆斯特丹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            364 => 
            array (
                'id' => 865,
                'city_id' => 865,
                'name' => '阿纳姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            365 => 
            array (
                'id' => 866,
                'city_id' => 866,
                'name' => '阿珀尔多伦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            366 => 
            array (
                'id' => 867,
                'city_id' => 867,
                'name' => '阿森',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            367 => 
            array (
                'id' => 868,
                'city_id' => 868,
                'name' => '埃德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            368 => 
            array (
                'id' => 869,
                'city_id' => 869,
                'name' => '埃门',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            369 => 
            array (
                'id' => 870,
                'city_id' => 870,
                'name' => '埃因霍芬',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            370 => 
            array (
                'id' => 871,
                'city_id' => 871,
                'name' => '布雷达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            371 => 
            array (
                'id' => 872,
                'city_id' => 872,
                'name' => '蒂尔堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            372 => 
            array (
                'id' => 873,
                'city_id' => 873,
                'name' => '多德雷赫特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            373 => 
            array (
                'id' => 874,
                'city_id' => 874,
                'name' => '恩斯赫德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            374 => 
            array (
                'id' => 875,
                'city_id' => 875,
                'name' => '格罗宁根',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            375 => 
            array (
                'id' => 876,
                'city_id' => 876,
                'name' => '哈勒姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            376 => 
            array (
                'id' => 877,
                'city_id' => 877,
                'name' => '海牙',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            377 => 
            array (
                'id' => 878,
                'city_id' => 878,
                'name' => '霍夫多尔普',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            378 => 
            array (
                'id' => 879,
                'city_id' => 879,
                'name' => '莱顿',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            379 => 
            array (
                'id' => 880,
                'city_id' => 880,
                'name' => '莱利斯塔德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            380 => 
            array (
                'id' => 881,
                'city_id' => 881,
                'name' => '鹿特丹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            381 => 
            array (
                'id' => 882,
                'city_id' => 882,
                'name' => '吕伐登',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            382 => 
            array (
                'id' => 883,
                'city_id' => 883,
                'name' => '马斯特里赫特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            383 => 
            array (
                'id' => 884,
                'city_id' => 884,
                'name' => '米德尔堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            384 => 
            array (
                'id' => 885,
                'city_id' => 885,
                'name' => '奈梅亨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            385 => 
            array (
                'id' => 886,
                'city_id' => 886,
                'name' => '斯海尔托亨博思',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            386 => 
            array (
                'id' => 887,
                'city_id' => 887,
                'name' => '乌得勒支',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            387 => 
            array (
                'id' => 888,
                'city_id' => 888,
                'name' => '兹沃勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            388 => 
            array (
                'id' => 889,
                'city_id' => 889,
                'name' => '佐特尔梅',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            389 => 
            array (
                'id' => 890,
                'city_id' => 890,
                'name' => '阿特兰蒂达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            390 => 
            array (
                'id' => 891,
                'city_id' => 891,
                'name' => '埃尔帕拉伊索',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            391 => 
            array (
                'id' => 892,
                'city_id' => 892,
                'name' => '奥科特佩克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            392 => 
            array (
                'id' => 893,
                'city_id' => 893,
                'name' => '奥兰乔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            393 => 
            array (
                'id' => 894,
                'city_id' => 894,
                'name' => '弗朗西斯科-莫拉桑',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            394 => 
            array (
                'id' => 895,
                'city_id' => 895,
                'name' => '格拉西亚斯-阿迪奥斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            395 => 
            array (
                'id' => 896,
                'city_id' => 896,
                'name' => '海湾群岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            396 => 
            array (
                'id' => 897,
                'city_id' => 897,
                'name' => '科尔特斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            397 => 
            array (
                'id' => 898,
                'city_id' => 898,
                'name' => '科隆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            398 => 
            array (
                'id' => 899,
                'city_id' => 899,
                'name' => '科马亚瓜',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            399 => 
            array (
                'id' => 900,
                'city_id' => 900,
                'name' => '科潘',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            400 => 
            array (
                'id' => 901,
                'city_id' => 901,
                'name' => '拉巴斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            401 => 
            array (
                'id' => 902,
                'city_id' => 902,
                'name' => '伦皮拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            402 => 
            array (
                'id' => 903,
                'city_id' => 903,
                'name' => '乔卢特卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            403 => 
            array (
                'id' => 904,
                'city_id' => 904,
                'name' => '乔罗马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            404 => 
            array (
                'id' => 905,
                'city_id' => 905,
                'name' => '山谷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            405 => 
            array (
                'id' => 906,
                'city_id' => 906,
                'name' => '圣巴巴拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            406 => 
            array (
                'id' => 907,
                'city_id' => 907,
                'name' => '因蒂布卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            407 => 
            array (
                'id' => 908,
                'city_id' => 908,
                'name' => '约罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            408 => 
            array (
                'id' => 909,
                'city_id' => 909,
                'name' => '菲尼克斯群岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            409 => 
            array (
                'id' => 910,
                'city_id' => 910,
                'name' => '吉尔伯特群岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            410 => 
            array (
                'id' => 911,
                'city_id' => 911,
                'name' => '莱恩群岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            411 => 
            array (
                'id' => 912,
                'city_id' => 912,
                'name' => '阿里萨比赫区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            412 => 
            array (
                'id' => 913,
                'city_id' => 913,
                'name' => '奥博克区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            413 => 
            array (
                'id' => 914,
                'city_id' => 914,
                'name' => '迪基勒区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            414 => 
            array (
                'id' => 915,
                'city_id' => 915,
                'name' => '塔朱拉区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            415 => 
            array (
                'id' => 916,
                'city_id' => 916,
                'name' => '奥什',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            416 => 
            array (
                'id' => 917,
                'city_id' => 917,
                'name' => '巴特肯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            417 => 
            array (
                'id' => 918,
                'city_id' => 918,
                'name' => '比什凯克市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            418 => 
            array (
                'id' => 919,
                'city_id' => 919,
                'name' => '楚河',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            419 => 
            array (
                'id' => 920,
                'city_id' => 920,
                'name' => '贾拉拉巴德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            420 => 
            array (
                'id' => 921,
                'city_id' => 921,
                'name' => '卡拉巴尔塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            421 => 
            array (
                'id' => 922,
                'city_id' => 922,
                'name' => '卡拉库尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            422 => 
            array (
                'id' => 923,
                'city_id' => 923,
                'name' => '坎特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            423 => 
            array (
                'id' => 924,
                'city_id' => 924,
                'name' => '科克扬加克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            424 => 
            array (
                'id' => 925,
                'city_id' => 925,
                'name' => '迈利赛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            425 => 
            array (
                'id' => 926,
                'city_id' => 926,
                'name' => '纳伦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            426 => 
            array (
                'id' => 927,
                'city_id' => 927,
                'name' => '苏卢克图',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            427 => 
            array (
                'id' => 928,
                'city_id' => 928,
                'name' => '塔拉斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            428 => 
            array (
                'id' => 929,
                'city_id' => 929,
                'name' => '塔什库梅尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            429 => 
            array (
                'id' => 930,
                'city_id' => 930,
                'name' => '乌兹根',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            430 => 
            array (
                'id' => 931,
                'city_id' => 931,
                'name' => '伊塞克湖',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            431 => 
            array (
                'id' => 932,
                'city_id' => 932,
                'name' => '博凯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            432 => 
            array (
                'id' => 933,
                'city_id' => 933,
                'name' => '恩泽雷科雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            433 => 
            array (
                'id' => 934,
                'city_id' => 934,
                'name' => '法拉纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            434 => 
            array (
                'id' => 935,
                'city_id' => 935,
                'name' => '金迪亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            435 => 
            array (
                'id' => 936,
                'city_id' => 936,
                'name' => '康康',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            436 => 
            array (
                'id' => 937,
                'city_id' => 937,
                'name' => '科纳克里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            437 => 
            array (
                'id' => 938,
                'city_id' => 938,
                'name' => '拉贝',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            438 => 
            array (
                'id' => 939,
                'city_id' => 939,
                'name' => '玛木',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            439 => 
            array (
                'id' => 940,
                'city_id' => 940,
                'name' => '阿伯茨福',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            440 => 
            array (
                'id' => 941,
                'city_id' => 941,
                'name' => '埃德蒙顿',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            441 => 
            array (
                'id' => 942,
                'city_id' => 942,
                'name' => '奥沙瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            442 => 
            array (
                'id' => 943,
                'city_id' => 943,
                'name' => '巴里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            443 => 
            array (
                'id' => 944,
                'city_id' => 944,
                'name' => '布列塔尼角',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            444 => 
            array (
                'id' => 945,
                'city_id' => 945,
                'name' => '多伦多',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            445 => 
            array (
                'id' => 946,
                'city_id' => 946,
                'name' => '弗雷德里顿',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            446 => 
            array (
                'id' => 947,
                'city_id' => 947,
                'name' => '圭尔夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            447 => 
            array (
                'id' => 948,
                'city_id' => 948,
                'name' => '哈利法克斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            448 => 
            array (
                'id' => 949,
                'city_id' => 949,
                'name' => '哈密尔顿',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            449 => 
            array (
                'id' => 950,
                'city_id' => 950,
                'name' => '怀特霍斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            450 => 
            array (
                'id' => 951,
                'city_id' => 951,
                'name' => '基劳纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            451 => 
            array (
                'id' => 952,
                'city_id' => 952,
                'name' => '基奇纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            452 => 
            array (
                'id' => 953,
                'city_id' => 953,
                'name' => '金斯敦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            453 => 
            array (
                'id' => 954,
                'city_id' => 954,
                'name' => '卡里加里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            454 => 
            array (
                'id' => 955,
                'city_id' => 955,
                'name' => '魁北克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            455 => 
            array (
                'id' => 956,
                'city_id' => 956,
                'name' => '里贾纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            456 => 
            array (
                'id' => 957,
                'city_id' => 957,
                'name' => '伦敦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            457 => 
            array (
                'id' => 958,
                'city_id' => 958,
                'name' => '蒙特利尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            458 => 
            array (
                'id' => 959,
                'city_id' => 959,
                'name' => '萨德伯里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            459 => 
            array (
                'id' => 960,
                'city_id' => 960,
                'name' => '萨斯卡通',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            460 => 
            array (
                'id' => 961,
                'city_id' => 961,
                'name' => '三河城',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            461 => 
            array (
                'id' => 962,
                'city_id' => 962,
                'name' => '桑德贝',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            462 => 
            array (
                'id' => 963,
                'city_id' => 963,
                'name' => '舍布鲁克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            463 => 
            array (
                'id' => 964,
                'city_id' => 964,
                'name' => '圣卡塔琳娜',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            464 => 
            array (
                'id' => 965,
                'city_id' => 965,
                'name' => '圣约翰斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            465 => 
            array (
                'id' => 966,
                'city_id' => 966,
                'name' => '维多利亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            466 => 
            array (
                'id' => 967,
                'city_id' => 967,
                'name' => '温哥华',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            467 => 
            array (
                'id' => 968,
                'city_id' => 968,
                'name' => '温尼伯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            468 => 
            array (
                'id' => 969,
                'city_id' => 969,
                'name' => '温莎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            469 => 
            array (
                'id' => 970,
                'city_id' => 970,
                'name' => '渥太华',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            470 => 
            array (
                'id' => 971,
                'city_id' => 971,
                'name' => '夏洛特敦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            471 => 
            array (
                'id' => 972,
                'city_id' => 972,
                'name' => '耶洛奈夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            472 => 
            array (
                'id' => 973,
                'city_id' => 973,
                'name' => '伊魁特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            473 => 
            array (
                'id' => 974,
                'city_id' => 974,
                'name' => '阿散蒂',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            474 => 
            array (
                'id' => 975,
                'city_id' => 975,
                'name' => '奥布阿西',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            475 => 
            array (
                'id' => 976,
                'city_id' => 976,
                'name' => '北部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            476 => 
            array (
                'id' => 977,
                'city_id' => 977,
                'name' => '布朗阿哈福',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            477 => 
            array (
                'id' => 978,
                'city_id' => 978,
                'name' => '大阿克拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            478 => 
            array (
                'id' => 979,
                'city_id' => 979,
                'name' => '东部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            479 => 
            array (
                'id' => 980,
                'city_id' => 980,
                'name' => '上东部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            480 => 
            array (
                'id' => 981,
                'city_id' => 981,
                'name' => '上西部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            481 => 
            array (
                'id' => 982,
                'city_id' => 982,
                'name' => '沃尔特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            482 => 
            array (
                'id' => 983,
                'city_id' => 983,
                'name' => '西部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            483 => 
            array (
                'id' => 984,
                'city_id' => 984,
                'name' => '中部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            484 => 
            array (
                'id' => 985,
                'city_id' => 985,
                'name' => '奥果韦-洛洛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            485 => 
            array (
                'id' => 986,
                'city_id' => 986,
                'name' => '奥果韦-伊温多',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            486 => 
            array (
                'id' => 987,
                'city_id' => 987,
                'name' => '滨海奥果韦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            487 => 
            array (
                'id' => 988,
                'city_id' => 988,
                'name' => '恩古涅',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            488 => 
            array (
                'id' => 989,
                'city_id' => 989,
                'name' => '河口',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            489 => 
            array (
                'id' => 990,
                'city_id' => 990,
                'name' => '尼扬加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            490 => 
            array (
                'id' => 991,
                'city_id' => 991,
                'name' => '上奥果韦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            491 => 
            array (
                'id' => 992,
                'city_id' => 992,
                'name' => '沃勒-恩特姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            492 => 
            array (
                'id' => 993,
                'city_id' => 993,
                'name' => '中奥果韦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            493 => 
            array (
                'id' => 994,
                'city_id' => 994,
                'name' => '奥多棉吉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            494 => 
            array (
                'id' => 995,
                'city_id' => 995,
                'name' => '白马市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            495 => 
            array (
                'id' => 996,
                'city_id' => 996,
                'name' => '柏威夏',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            496 => 
            array (
                'id' => 997,
                'city_id' => 997,
                'name' => '拜林市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            497 => 
            array (
                'id' => 998,
                'city_id' => 998,
                'name' => '班迭棉吉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            498 => 
            array (
                'id' => 999,
                'city_id' => 999,
                'name' => '磅清扬',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            499 => 
            array (
                'id' => 1000,
                'city_id' => 1000,
                'name' => '磅士卑',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
        ));
        \DB::table('world_cities_locale')->insert(array (
            0 => 
            array (
                'id' => 1001,
                'city_id' => 1001,
                'name' => '磅同',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            1 => 
            array (
                'id' => 1002,
                'city_id' => 1002,
                'name' => '磅湛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            2 => 
            array (
                'id' => 1003,
                'city_id' => 1003,
                'name' => '波罗勉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            3 => 
            array (
                'id' => 1004,
                'city_id' => 1004,
                'name' => '茶胶',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            4 => 
            array (
                'id' => 1005,
                'city_id' => 1005,
                'name' => '柴桢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            5 => 
            array (
                'id' => 1006,
                'city_id' => 1006,
                'name' => '干丹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            6 => 
            array (
                'id' => 1007,
                'city_id' => 1007,
                'name' => '戈公',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            7 => 
            array (
                'id' => 1008,
                'city_id' => 1008,
                'name' => '贡布',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            8 => 
            array (
                'id' => 1009,
                'city_id' => 1009,
                'name' => '金边市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            9 => 
            array (
                'id' => 1010,
                'city_id' => 1010,
                'name' => '桔井',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            10 => 
            array (
                'id' => 1011,
                'city_id' => 1011,
                'name' => '腊塔纳基里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            11 => 
            array (
                'id' => 1012,
                'city_id' => 1012,
                'name' => '马德望',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            12 => 
            array (
                'id' => 1013,
                'city_id' => 1013,
                'name' => '蒙多基里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            13 => 
            array (
                'id' => 1014,
                'city_id' => 1014,
                'name' => '菩萨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            14 => 
            array (
                'id' => 1015,
                'city_id' => 1015,
                'name' => '上丁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            15 => 
            array (
                'id' => 1016,
                'city_id' => 1016,
                'name' => '西哈努克市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            16 => 
            array (
                'id' => 1017,
                'city_id' => 1017,
                'name' => '暹粒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            17 => 
            array (
                'id' => 1018,
                'city_id' => 1018,
                'name' => '奥洛穆茨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            18 => 
            array (
                'id' => 1019,
                'city_id' => 1019,
                'name' => '比尔森',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            19 => 
            array (
                'id' => 1020,
                'city_id' => 1020,
                'name' => '布拉格直辖市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            20 => 
            array (
                'id' => 1021,
                'city_id' => 1021,
                'name' => '赫拉德茨-克拉洛韦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            21 => 
            array (
                'id' => 1022,
                'city_id' => 1022,
                'name' => '卡罗维发利',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            22 => 
            array (
                'id' => 1023,
                'city_id' => 1023,
                'name' => '利贝雷克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            23 => 
            array (
                'id' => 1024,
                'city_id' => 1024,
                'name' => '摩拉维亚-西里西亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            24 => 
            array (
                'id' => 1025,
                'city_id' => 1025,
                'name' => '南摩拉维亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            25 => 
            array (
                'id' => 1026,
                'city_id' => 1026,
                'name' => '帕尔杜比采',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            26 => 
            array (
                'id' => 1027,
                'city_id' => 1027,
                'name' => '维索基纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            27 => 
            array (
                'id' => 1028,
                'city_id' => 1028,
                'name' => '乌斯季',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            28 => 
            array (
                'id' => 1029,
                'city_id' => 1029,
                'name' => '中捷克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            29 => 
            array (
                'id' => 1030,
                'city_id' => 1030,
                'name' => '兹林',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            30 => 
            array (
                'id' => 1031,
                'city_id' => 1031,
                'name' => '北马塔贝莱兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            31 => 
            array (
                'id' => 1032,
                'city_id' => 1032,
                'name' => '布拉瓦约',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            32 => 
            array (
                'id' => 1033,
                'city_id' => 1033,
                'name' => '东马绍纳兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            33 => 
            array (
                'id' => 1034,
                'city_id' => 1034,
                'name' => '哈拉雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            34 => 
            array (
                'id' => 1035,
                'city_id' => 1035,
                'name' => '马尼卡兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            35 => 
            array (
                'id' => 1036,
                'city_id' => 1036,
                'name' => '马斯温戈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            36 => 
            array (
                'id' => 1037,
                'city_id' => 1037,
                'name' => '南马塔贝莱兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            37 => 
            array (
                'id' => 1038,
                'city_id' => 1038,
                'name' => '西马绍纳兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            38 => 
            array (
                'id' => 1039,
                'city_id' => 1039,
                'name' => '中部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            39 => 
            array (
                'id' => 1040,
                'city_id' => 1040,
                'name' => '中马绍纳兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            40 => 
            array (
                'id' => 1041,
                'city_id' => 1041,
                'name' => '阿达马瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            41 => 
            array (
                'id' => 1042,
                'city_id' => 1042,
                'name' => '北部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            42 => 
            array (
                'id' => 1043,
                'city_id' => 1043,
                'name' => '北端',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            43 => 
            array (
                'id' => 1044,
                'city_id' => 1044,
                'name' => '滨海',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            44 => 
            array (
                'id' => 1045,
                'city_id' => 1045,
                'name' => '东部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            45 => 
            array (
                'id' => 1046,
                'city_id' => 1046,
                'name' => '南部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            46 => 
            array (
                'id' => 1047,
                'city_id' => 1047,
                'name' => '西北',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            47 => 
            array (
                'id' => 1048,
                'city_id' => 1048,
                'name' => '西部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            48 => 
            array (
                'id' => 1049,
                'city_id' => 1049,
                'name' => '西南',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            49 => 
            array (
                'id' => 1050,
                'city_id' => 1050,
                'name' => '中央',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            50 => 
            array (
                'id' => 1051,
                'city_id' => 1051,
                'name' => '北部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            51 => 
            array (
                'id' => 1052,
                'city_id' => 1052,
                'name' => '多哈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            52 => 
            array (
                'id' => 1053,
                'city_id' => 1053,
                'name' => '古韦里耶',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            53 => 
            array (
                'id' => 1054,
                'city_id' => 1054,
                'name' => '豪尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            54 => 
            array (
                'id' => 1055,
                'city_id' => 1055,
                'name' => '杰里扬拜特奈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            55 => 
            array (
                'id' => 1056,
                'city_id' => 1056,
                'name' => '赖扬',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            56 => 
            array (
                'id' => 1057,
                'city_id' => 1057,
                'name' => '沃克拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            57 => 
            array (
                'id' => 1058,
                'city_id' => 1058,
                'name' => '乌姆锡拉勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            58 => 
            array (
                'id' => 1059,
                'city_id' => 1059,
                'name' => '朱迈利耶',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            59 => 
            array (
                'id' => 1060,
                'city_id' => 1060,
                'name' => '阿涅比',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            60 => 
            array (
                'id' => 1061,
                'city_id' => 1061,
                'name' => '巴芬',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            61 => 
            array (
                'id' => 1062,
                'city_id' => 1062,
                'name' => '邦达马河谷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            62 => 
            array (
                'id' => 1063,
                'city_id' => 1063,
                'name' => '登盖莱',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            63 => 
            array (
                'id' => 1064,
                'city_id' => 1064,
                'name' => '恩济－科莫埃',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            64 => 
            array (
                'id' => 1065,
                'city_id' => 1065,
                'name' => '弗罗马格尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            65 => 
            array (
                'id' => 1066,
                'city_id' => 1066,
                'name' => '湖泊',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            66 => 
            array (
                'id' => 1067,
                'city_id' => 1067,
                'name' => '马拉韦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            67 => 
            array (
                'id' => 1068,
                'city_id' => 1068,
                'name' => '南邦达马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            68 => 
            array (
                'id' => 1069,
                'city_id' => 1069,
                'name' => '南科莫埃',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            69 => 
            array (
                'id' => 1070,
                'city_id' => 1070,
                'name' => '萨桑德拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            70 => 
            array (
                'id' => 1071,
                'city_id' => 1071,
                'name' => '萨瓦纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            71 => 
            array (
                'id' => 1072,
                'city_id' => 1072,
                'name' => '山地',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            72 => 
            array (
                'id' => 1073,
                'city_id' => 1073,
                'name' => '沃罗杜古',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            73 => 
            array (
                'id' => 1074,
                'city_id' => 1074,
                'name' => '下萨桑德拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            74 => 
            array (
                'id' => 1075,
                'city_id' => 1075,
                'name' => '泻湖',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            75 => 
            array (
                'id' => 1076,
                'city_id' => 1076,
                'name' => '赞赞',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            76 => 
            array (
                'id' => 1077,
                'city_id' => 1077,
                'name' => '中卡瓦利',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            77 => 
            array (
                'id' => 1078,
                'city_id' => 1078,
                'name' => '中科莫埃',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            78 => 
            array (
                'id' => 1079,
                'city_id' => 1079,
                'name' => '奥西耶克-巴拉尼亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            79 => 
            array (
                'id' => 1080,
                'city_id' => 1080,
                'name' => '别洛瓦尔-比洛戈拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            80 => 
            array (
                'id' => 1081,
                'city_id' => 1081,
                'name' => '滨海和山区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            81 => 
            array (
                'id' => 1082,
                'city_id' => 1082,
                'name' => '波热加-斯拉沃尼亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            82 => 
            array (
                'id' => 1083,
                'city_id' => 1083,
                'name' => '布罗德-波萨维纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            83 => 
            array (
                'id' => 1084,
                'city_id' => 1084,
                'name' => '杜布罗夫斯克-内雷特瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            84 => 
            array (
                'id' => 1085,
                'city_id' => 1085,
                'name' => '卡尔洛瓦茨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            85 => 
            array (
                'id' => 1086,
                'city_id' => 1086,
                'name' => '科普里夫尼察-克里热夫齐',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            86 => 
            array (
                'id' => 1087,
                'city_id' => 1087,
                'name' => '克拉皮纳-扎戈列',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            87 => 
            array (
                'id' => 1088,
                'city_id' => 1088,
                'name' => '利卡-塞尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            88 => 
            array (
                'id' => 1089,
                'city_id' => 1089,
                'name' => '梅吉穆列',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            89 => 
            array (
                'id' => 1090,
                'city_id' => 1090,
                'name' => '萨格勒布',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            90 => 
            array (
                'id' => 1091,
                'city_id' => 1091,
                'name' => '萨格勒布市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            91 => 
            array (
                'id' => 1092,
                'city_id' => 1092,
                'name' => '斯普利特-达尔马提亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            92 => 
            array (
                'id' => 1093,
                'city_id' => 1093,
                'name' => '瓦拉日丁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            93 => 
            array (
                'id' => 1094,
                'city_id' => 1094,
                'name' => '维罗维蒂察-波德拉维纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            94 => 
            array (
                'id' => 1095,
                'city_id' => 1095,
                'name' => '武科瓦尔-斯里耶姆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            95 => 
            array (
                'id' => 1096,
                'city_id' => 1096,
                'name' => '希贝尼克-克宁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            96 => 
            array (
                'id' => 1097,
                'city_id' => 1097,
                'name' => '锡萨克-莫斯拉维纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            97 => 
            array (
                'id' => 1098,
                'city_id' => 1098,
                'name' => '伊斯特拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            98 => 
            array (
                'id' => 1099,
                'city_id' => 1099,
                'name' => '扎达尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            99 => 
            array (
                'id' => 1100,
                'city_id' => 1100,
                'name' => '埃尔格约-马拉奎特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            100 => 
            array (
                'id' => 1101,
                'city_id' => 1101,
                'name' => '巴林戈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            101 => 
            array (
                'id' => 1102,
                'city_id' => 1102,
                'name' => '邦戈马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            102 => 
            array (
                'id' => 1103,
                'city_id' => 1103,
                'name' => '博美特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            103 => 
            array (
                'id' => 1104,
                'city_id' => 1104,
                'name' => '布希亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            104 => 
            array (
                'id' => 1105,
                'city_id' => 1105,
                'name' => '恩布',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            105 => 
            array (
                'id' => 1106,
                'city_id' => 1106,
                'name' => '霍马湾',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            106 => 
            array (
                'id' => 1107,
                'city_id' => 1107,
                'name' => '基安布',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            107 => 
            array (
                'id' => 1108,
                'city_id' => 1108,
                'name' => '基里菲',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            108 => 
            array (
                'id' => 1109,
                'city_id' => 1109,
                'name' => '基里尼亚加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            109 => 
            array (
                'id' => 1110,
                'city_id' => 1110,
                'name' => '基苏木',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            110 => 
            array (
                'id' => 1111,
                'city_id' => 1111,
                'name' => '基图伊',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            111 => 
            array (
                'id' => 1112,
                'city_id' => 1112,
                'name' => '基西',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            112 => 
            array (
                'id' => 1113,
                'city_id' => 1113,
                'name' => '加里萨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            113 => 
            array (
                'id' => 1114,
                'city_id' => 1114,
                'name' => '卡卡梅加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            114 => 
            array (
                'id' => 1115,
                'city_id' => 1115,
                'name' => '卡耶亚多',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            115 => 
            array (
                'id' => 1116,
                'city_id' => 1116,
                'name' => '凯里乔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            116 => 
            array (
                'id' => 1117,
                'city_id' => 1117,
                'name' => '夸勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            117 => 
            array (
                'id' => 1118,
                'city_id' => 1118,
                'name' => '拉木',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            118 => 
            array (
                'id' => 1119,
                'city_id' => 1119,
                'name' => '莱基皮亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            119 => 
            array (
                'id' => 1120,
                'city_id' => 1120,
                'name' => '马查科斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            120 => 
            array (
                'id' => 1121,
                'city_id' => 1121,
                'name' => '马瓜尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            121 => 
            array (
                'id' => 1122,
                'city_id' => 1122,
                'name' => '马萨布布',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            122 => 
            array (
                'id' => 1123,
                'city_id' => 1123,
                'name' => '曼德拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            123 => 
            array (
                'id' => 1124,
                'city_id' => 1124,
                'name' => '梅鲁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            124 => 
            array (
                'id' => 1125,
                'city_id' => 1125,
                'name' => '蒙巴萨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            125 => 
            array (
                'id' => 1126,
                'city_id' => 1126,
                'name' => '米戈利',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            126 => 
            array (
                'id' => 1127,
                'city_id' => 1127,
                'name' => '穆兰卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            127 => 
            array (
                'id' => 1128,
                'city_id' => 1128,
                'name' => '纳库鲁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            128 => 
            array (
                'id' => 1129,
                'city_id' => 1129,
                'name' => '纳罗克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            129 => 
            array (
                'id' => 1130,
                'city_id' => 1130,
                'name' => '南迪',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            130 => 
            array (
                'id' => 1131,
                'city_id' => 1131,
                'name' => '内罗毕',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            131 => 
            array (
                'id' => 1132,
                'city_id' => 1132,
                'name' => '尼蒂',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            132 => 
            array (
                'id' => 1133,
                'city_id' => 1133,
                'name' => '尼亚米拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            133 => 
            array (
                'id' => 1134,
                'city_id' => 1134,
                'name' => '年达鲁阿',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            134 => 
            array (
                'id' => 1135,
                'city_id' => 1135,
                'name' => '涅里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            135 => 
            array (
                'id' => 1136,
                'city_id' => 1136,
                'name' => '桑布卢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            136 => 
            array (
                'id' => 1137,
                'city_id' => 1137,
                'name' => '塔纳河',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            137 => 
            array (
                'id' => 1138,
                'city_id' => 1138,
                'name' => '泰塔塔维塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            138 => 
            array (
                'id' => 1139,
                'city_id' => 1139,
                'name' => '特兰斯-恩佐亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            139 => 
            array (
                'id' => 1140,
                'city_id' => 1140,
                'name' => '图尔卡纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            140 => 
            array (
                'id' => 1141,
                'city_id' => 1141,
                'name' => '瓦吉尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            141 => 
            array (
                'id' => 1142,
                'city_id' => 1142,
                'name' => '瓦辛基苏',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            142 => 
            array (
                'id' => 1143,
                'city_id' => 1143,
                'name' => '韦希加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            143 => 
            array (
                'id' => 1144,
                'city_id' => 1144,
                'name' => '西波克特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            144 => 
            array (
                'id' => 1145,
                'city_id' => 1145,
                'name' => '夏亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            145 => 
            array (
                'id' => 1146,
                'city_id' => 1146,
                'name' => '伊希约洛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            146 => 
            array (
                'id' => 1147,
                'city_id' => 1147,
                'name' => '中央',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            147 => 
            array (
                'id' => 1148,
                'city_id' => 1148,
                'name' => '阿卢克斯内',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            148 => 
            array (
                'id' => 1149,
                'city_id' => 1149,
                'name' => '爱兹克劳克雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            149 => 
            array (
                'id' => 1150,
                'city_id' => 1150,
                'name' => '奥格雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            150 => 
            array (
                'id' => 1151,
                'city_id' => 1151,
                'name' => '巴尔维',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            151 => 
            array (
                'id' => 1152,
                'city_id' => 1152,
                'name' => '包斯卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            152 => 
            array (
                'id' => 1153,
                'city_id' => 1153,
                'name' => '采西斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            153 => 
            array (
                'id' => 1154,
                'city_id' => 1154,
                'name' => '多贝莱',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            154 => 
            array (
                'id' => 1155,
                'city_id' => 1155,
                'name' => '古尔贝内',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            155 => 
            array (
                'id' => 1156,
                'city_id' => 1156,
                'name' => '杰卡布皮尔斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            156 => 
            array (
                'id' => 1157,
                'city_id' => 1157,
                'name' => '克拉斯拉瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            157 => 
            array (
                'id' => 1158,
                'city_id' => 1158,
                'name' => '库尔迪加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            158 => 
            array (
                'id' => 1159,
                'city_id' => 1159,
                'name' => '雷泽克内',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            159 => 
            array (
                'id' => 1160,
                'city_id' => 1160,
                'name' => '里加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            160 => 
            array (
                'id' => 1161,
                'city_id' => 1161,
                'name' => '利耶帕亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            161 => 
            array (
                'id' => 1162,
                'city_id' => 1162,
                'name' => '林巴济',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            162 => 
            array (
                'id' => 1163,
                'city_id' => 1163,
                'name' => '卢扎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            163 => 
            array (
                'id' => 1164,
                'city_id' => 1164,
                'name' => '马多纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            164 => 
            array (
                'id' => 1165,
                'city_id' => 1165,
                'name' => '普雷利',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            165 => 
            array (
                'id' => 1166,
                'city_id' => 1166,
                'name' => '萨尔杜斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            166 => 
            array (
                'id' => 1167,
                'city_id' => 1167,
                'name' => '塔尔西',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            167 => 
            array (
                'id' => 1168,
                'city_id' => 1168,
                'name' => '陶格夫皮尔斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            168 => 
            array (
                'id' => 1169,
                'city_id' => 1169,
                'name' => '图库马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            169 => 
            array (
                'id' => 1170,
                'city_id' => 1170,
                'name' => '瓦尔加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            170 => 
            array (
                'id' => 1171,
                'city_id' => 1171,
                'name' => '瓦尔米耶拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            171 => 
            array (
                'id' => 1172,
                'city_id' => 1172,
                'name' => '文茨皮尔斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            172 => 
            array (
                'id' => 1173,
                'city_id' => 1173,
                'name' => '叶尔加瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            173 => 
            array (
                'id' => 1174,
                'city_id' => 1174,
                'name' => '伯里亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            174 => 
            array (
                'id' => 1175,
                'city_id' => 1175,
                'name' => '布塔布泰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            175 => 
            array (
                'id' => 1176,
                'city_id' => 1176,
                'name' => '古廷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            176 => 
            array (
                'id' => 1177,
                'city_id' => 1177,
                'name' => '加查斯内克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            177 => 
            array (
                'id' => 1178,
                'city_id' => 1178,
                'name' => '莱里贝',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            178 => 
            array (
                'id' => 1179,
                'city_id' => 1179,
                'name' => '马费滕',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            179 => 
            array (
                'id' => 1180,
                'city_id' => 1180,
                'name' => '马塞卢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            180 => 
            array (
                'id' => 1181,
                'city_id' => 1181,
                'name' => '莫哈莱斯胡克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            181 => 
            array (
                'id' => 1182,
                'city_id' => 1182,
                'name' => '莫霍特隆',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            182 => 
            array (
                'id' => 1183,
                'city_id' => 1183,
                'name' => '塔巴采卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            183 => 
            array (
                'id' => 1184,
                'city_id' => 1184,
                'name' => '阿速坡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            184 => 
            array (
                'id' => 1185,
                'city_id' => 1185,
                'name' => '波里坎赛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            185 => 
            array (
                'id' => 1186,
                'city_id' => 1186,
                'name' => '博乔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            186 => 
            array (
                'id' => 1187,
                'city_id' => 1187,
                'name' => '川圹',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            187 => 
            array (
                'id' => 1188,
                'city_id' => 1188,
                'name' => '丰沙里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            188 => 
            array (
                'id' => 1189,
                'city_id' => 1189,
                'name' => '甘蒙',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            189 => 
            array (
                'id' => 1190,
                'city_id' => 1190,
                'name' => '华潘',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            190 => 
            array (
                'id' => 1191,
                'city_id' => 1191,
                'name' => '琅勃拉邦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            191 => 
            array (
                'id' => 1192,
                'city_id' => 1192,
                'name' => '琅南塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            192 => 
            array (
                'id' => 1193,
                'city_id' => 1193,
                'name' => '赛宋本行政特区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            193 => 
            array (
                'id' => 1194,
                'city_id' => 1194,
                'name' => '色贡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            194 => 
            array (
                'id' => 1195,
                'city_id' => 1195,
                'name' => '沙拉湾',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            195 => 
            array (
                'id' => 1196,
                'city_id' => 1196,
                'name' => '沙湾拿吉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            196 => 
            array (
                'id' => 1197,
                'city_id' => 1197,
                'name' => '沙耶武里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            197 => 
            array (
                'id' => 1198,
                'city_id' => 1198,
                'name' => '万象',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            198 => 
            array (
                'id' => 1199,
                'city_id' => 1199,
                'name' => '乌多姆赛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            199 => 
            array (
                'id' => 1200,
                'city_id' => 1200,
                'name' => '占巴塞',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            200 => 
            array (
                'id' => 1201,
                'city_id' => 1201,
                'name' => '北部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            201 => 
            array (
                'id' => 1202,
                'city_id' => 1202,
                'name' => '贝卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            202 => 
            array (
                'id' => 1203,
                'city_id' => 1203,
                'name' => '贝鲁特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            203 => 
            array (
                'id' => 1204,
                'city_id' => 1204,
                'name' => '黎巴嫩山',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            204 => 
            array (
                'id' => 1205,
                'city_id' => 1205,
                'name' => '奈拜提耶市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            205 => 
            array (
                'id' => 1206,
                'city_id' => 1206,
                'name' => '南部',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            206 => 
            array (
                'id' => 1207,
                'city_id' => 1207,
                'name' => '巴波卢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            207 => 
            array (
                'id' => 1208,
                'city_id' => 1208,
                'name' => '邦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            208 => 
            array (
                'id' => 1209,
                'city_id' => 1209,
                'name' => '博波卢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            209 => 
            array (
                'id' => 1210,
                'city_id' => 1210,
                'name' => '博米',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            210 => 
            array (
                'id' => 1211,
                'city_id' => 1211,
                'name' => '大巴萨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            211 => 
            array (
                'id' => 1212,
                'city_id' => 1212,
                'name' => '大吉德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            212 => 
            array (
                'id' => 1213,
                'city_id' => 1213,
                'name' => '大角山',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            213 => 
            array (
                'id' => 1214,
                'city_id' => 1214,
                'name' => '大克鲁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            214 => 
            array (
                'id' => 1215,
                'city_id' => 1215,
                'name' => '菲什敦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            215 => 
            array (
                'id' => 1216,
                'city_id' => 1216,
                'name' => '吉河',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            216 => 
            array (
                'id' => 1217,
                'city_id' => 1217,
                'name' => '里弗塞斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            217 => 
            array (
                'id' => 1218,
                'city_id' => 1218,
                'name' => '洛法',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            218 => 
            array (
                'id' => 1219,
                'city_id' => 1219,
                'name' => '马吉比',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            219 => 
            array (
                'id' => 1220,
                'city_id' => 1220,
                'name' => '马里兰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            220 => 
            array (
                'id' => 1221,
                'city_id' => 1221,
                'name' => '蒙特塞拉多',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            221 => 
            array (
                'id' => 1222,
                'city_id' => 1222,
                'name' => '宁巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            222 => 
            array (
                'id' => 1223,
                'city_id' => 1223,
                'name' => '锡诺',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            223 => 
            array (
                'id' => 1224,
                'city_id' => 1224,
                'name' => '阿利图斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            224 => 
            array (
                'id' => 1225,
                'city_id' => 1225,
                'name' => '考纳斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            225 => 
            array (
                'id' => 1226,
                'city_id' => 1226,
                'name' => '克莱佩达',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            226 => 
            array (
                'id' => 1227,
                'city_id' => 1227,
                'name' => '马里扬泊列',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            227 => 
            array (
                'id' => 1228,
                'city_id' => 1228,
                'name' => '帕涅韦日斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            228 => 
            array (
                'id' => 1229,
                'city_id' => 1229,
                'name' => '陶拉格',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            229 => 
            array (
                'id' => 1230,
                'city_id' => 1230,
                'name' => '特尔希艾',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            230 => 
            array (
                'id' => 1231,
                'city_id' => 1231,
                'name' => '维尔纽斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            231 => 
            array (
                'id' => 1232,
                'city_id' => 1232,
                'name' => '乌田纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            232 => 
            array (
                'id' => 1233,
                'city_id' => 1233,
                'name' => '希奥利艾',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            233 => 
            array (
                'id' => 1234,
                'city_id' => 1234,
                'name' => '亚克曼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            234 => 
            array (
                'id' => 1235,
                'city_id' => 1235,
                'name' => '迪基希',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            235 => 
            array (
                'id' => 1236,
                'city_id' => 1236,
                'name' => '格雷文马赫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            236 => 
            array (
                'id' => 1237,
                'city_id' => 1237,
                'name' => '卢森堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            237 => 
            array (
                'id' => 1238,
                'city_id' => 1238,
                'name' => '比温巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            238 => 
            array (
                'id' => 1239,
                'city_id' => 1239,
                'name' => '布塔雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            239 => 
            array (
                'id' => 1240,
                'city_id' => 1240,
                'name' => '恩延扎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            240 => 
            array (
                'id' => 1241,
                'city_id' => 1241,
                'name' => '基本古',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            241 => 
            array (
                'id' => 1242,
                'city_id' => 1242,
                'name' => '基布耶',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            242 => 
            array (
                'id' => 1243,
                'city_id' => 1243,
                'name' => '基加利-恩加利',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            243 => 
            array (
                'id' => 1244,
                'city_id' => 1244,
                'name' => '基加利市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            244 => 
            array (
                'id' => 1245,
                'city_id' => 1245,
                'name' => '吉孔戈罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            245 => 
            array (
                'id' => 1246,
                'city_id' => 1246,
                'name' => '吉塞尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            246 => 
            array (
                'id' => 1247,
                'city_id' => 1247,
                'name' => '吉塔拉马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            247 => 
            array (
                'id' => 1248,
                'city_id' => 1248,
                'name' => '卡布加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            248 => 
            array (
                'id' => 1249,
                'city_id' => 1249,
                'name' => '卢瓦马加纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            249 => 
            array (
                'id' => 1250,
                'city_id' => 1250,
                'name' => '鲁汉戈',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            250 => 
            array (
                'id' => 1251,
                'city_id' => 1251,
                'name' => '鲁亨盖里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            251 => 
            array (
                'id' => 1252,
                'city_id' => 1252,
                'name' => '尚古古',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            252 => 
            array (
                'id' => 1253,
                'city_id' => 1253,
                'name' => '乌姆塔拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            253 => 
            array (
                'id' => 1254,
                'city_id' => 1254,
                'name' => '阿尔巴尤利亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            254 => 
            array (
                'id' => 1255,
                'city_id' => 1255,
                'name' => '阿拉德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            255 => 
            array (
                'id' => 1256,
                'city_id' => 1256,
                'name' => '奥拉迪亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            256 => 
            array (
                'id' => 1257,
                'city_id' => 1257,
                'name' => '巴克乌',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            257 => 
            array (
                'id' => 1258,
                'city_id' => 1258,
                'name' => '巴亚马雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            258 => 
            array (
                'id' => 1259,
                'city_id' => 1259,
                'name' => '比斯特里察',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            259 => 
            array (
                'id' => 1260,
                'city_id' => 1260,
                'name' => '博托沙尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            260 => 
            array (
                'id' => 1261,
                'city_id' => 1261,
                'name' => '布加勒斯特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            261 => 
            array (
                'id' => 1262,
                'city_id' => 1262,
                'name' => '布拉索夫',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            262 => 
            array (
                'id' => 1263,
                'city_id' => 1263,
                'name' => '布勒伊拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            263 => 
            array (
                'id' => 1264,
                'city_id' => 1264,
                'name' => '布泽乌',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            264 => 
            array (
                'id' => 1265,
                'city_id' => 1265,
                'name' => '德罗贝塔-塞维林堡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            265 => 
            array (
                'id' => 1266,
                'city_id' => 1266,
                'name' => '德瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            266 => 
            array (
                'id' => 1267,
                'city_id' => 1267,
                'name' => '蒂米什瓦拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            267 => 
            array (
                'id' => 1268,
                'city_id' => 1268,
                'name' => '福克沙尼',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            268 => 
            array (
                'id' => 1269,
                'city_id' => 1269,
                'name' => '加拉茨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            269 => 
            array (
                'id' => 1270,
                'city_id' => 1270,
                'name' => '久尔久',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            270 => 
            array (
                'id' => 1271,
                'city_id' => 1271,
                'name' => '康斯坦察',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            271 => 
            array (
                'id' => 1272,
                'city_id' => 1272,
                'name' => '克拉约瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            272 => 
            array (
                'id' => 1273,
                'city_id' => 1273,
                'name' => '克勒拉希',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            273 => 
            array (
                'id' => 1274,
                'city_id' => 1274,
                'name' => '克卢日纳波卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            274 => 
            array (
                'id' => 1275,
                'city_id' => 1275,
                'name' => '勒姆尼库沃尔恰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            275 => 
            array (
                'id' => 1276,
                'city_id' => 1276,
                'name' => '雷希察',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            276 => 
            array (
                'id' => 1277,
                'city_id' => 1277,
                'name' => '梅尔库里亚丘克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            277 => 
            array (
                'id' => 1278,
                'city_id' => 1278,
                'name' => '皮特什蒂',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            278 => 
            array (
                'id' => 1279,
                'city_id' => 1279,
                'name' => '皮亚特拉尼亚姆茨',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            279 => 
            array (
                'id' => 1280,
                'city_id' => 1280,
                'name' => '普洛耶什蒂',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            280 => 
            array (
                'id' => 1281,
                'city_id' => 1281,
                'name' => '萨图·马雷',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            281 => 
            array (
                'id' => 1282,
                'city_id' => 1282,
                'name' => '圣格奥尔基',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            282 => 
            array (
                'id' => 1283,
                'city_id' => 1283,
                'name' => '斯拉蒂纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            283 => 
            array (
                'id' => 1284,
                'city_id' => 1284,
                'name' => '斯洛博齐亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            284 => 
            array (
                'id' => 1285,
                'city_id' => 1285,
                'name' => '苏恰瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            285 => 
            array (
                'id' => 1286,
                'city_id' => 1286,
                'name' => '特尔戈维什泰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            286 => 
            array (
                'id' => 1287,
                'city_id' => 1287,
                'name' => '特尔古穆列什',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            287 => 
            array (
                'id' => 1288,
                'city_id' => 1288,
                'name' => '特尔古日乌',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            288 => 
            array (
                'id' => 1289,
                'city_id' => 1289,
                'name' => '图尔恰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            289 => 
            array (
                'id' => 1290,
                'city_id' => 1290,
                'name' => '瓦斯卢伊',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            290 => 
            array (
                'id' => 1291,
                'city_id' => 1291,
                'name' => '锡比乌',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            291 => 
            array (
                'id' => 1292,
                'city_id' => 1292,
                'name' => '雅西',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            292 => 
            array (
                'id' => 1293,
                'city_id' => 1293,
                'name' => '亚厉山德里亚',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            293 => 
            array (
                'id' => 1294,
                'city_id' => 1294,
                'name' => '扎勒乌',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            294 => 
            array (
                'id' => 1295,
                'city_id' => 1295,
                'name' => '安齐拉纳纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            295 => 
            array (
                'id' => 1296,
                'city_id' => 1296,
                'name' => '菲亚纳兰楚阿',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            296 => 
            array (
                'id' => 1297,
                'city_id' => 1297,
                'name' => '马哈赞加',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            297 => 
            array (
                'id' => 1298,
                'city_id' => 1298,
                'name' => '塔那那利佛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            298 => 
            array (
                'id' => 1299,
                'city_id' => 1299,
                'name' => '图阿马西拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            299 => 
            array (
                'id' => 1300,
                'city_id' => 1300,
                'name' => '图利亚拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            300 => 
            array (
                'id' => 1301,
                'city_id' => 1301,
                'name' => '阿杜',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            301 => 
            array (
                'id' => 1302,
                'city_id' => 1302,
                'name' => '北阿里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            302 => 
            array (
                'id' => 1303,
                'city_id' => 1303,
                'name' => '北蒂拉杜马蒂',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            303 => 
            array (
                'id' => 1304,
                'city_id' => 1304,
                'name' => '北马洛斯马杜卢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            304 => 
            array (
                'id' => 1305,
                'city_id' => 1305,
                'name' => '北米拉杜马杜卢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            305 => 
            array (
                'id' => 1306,
                'city_id' => 1306,
                'name' => '北尼兰杜',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            306 => 
            array (
                'id' => 1307,
                'city_id' => 1307,
                'name' => '北苏瓦迪瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            307 => 
            array (
                'id' => 1308,
                'city_id' => 1308,
                'name' => '法迪福卢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            308 => 
            array (
                'id' => 1309,
                'city_id' => 1309,
                'name' => '费利杜',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            309 => 
            array (
                'id' => 1310,
                'city_id' => 1310,
                'name' => '福阿穆拉库',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            310 => 
            array (
                'id' => 1311,
                'city_id' => 1311,
                'name' => '哈杜马蒂',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            311 => 
            array (
                'id' => 1312,
                'city_id' => 1312,
                'name' => '科卢马杜卢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            312 => 
            array (
                'id' => 1313,
                'city_id' => 1313,
                'name' => '马累',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            313 => 
            array (
                'id' => 1314,
                'city_id' => 1314,
                'name' => '马累岛',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            314 => 
            array (
                'id' => 1315,
                'city_id' => 1315,
                'name' => '穆拉库',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            315 => 
            array (
                'id' => 1316,
                'city_id' => 1316,
                'name' => '南阿里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            316 => 
            array (
                'id' => 1317,
                'city_id' => 1317,
                'name' => '南蒂拉杜马蒂',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            317 => 
            array (
                'id' => 1318,
                'city_id' => 1318,
                'name' => '南马洛斯马杜卢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            318 => 
            array (
                'id' => 1319,
                'city_id' => 1319,
                'name' => '南米拉杜马杜卢',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            319 => 
            array (
                'id' => 1320,
                'city_id' => 1320,
                'name' => '南尼兰杜',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            320 => 
            array (
                'id' => 1321,
                'city_id' => 1321,
                'name' => '南苏瓦迪瓦',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            321 => 
            array (
                'id' => 1322,
                'city_id' => 1322,
                'name' => '北部区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            322 => 
            array (
                'id' => 1323,
                'city_id' => 1323,
                'name' => '南部区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            323 => 
            array (
                'id' => 1324,
                'city_id' => 1324,
                'name' => '中央区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            324 => 
            array (
                'id' => 1325,
                'city_id' => 1325,
                'name' => '巴马科首都区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            325 => 
            array (
                'id' => 1326,
                'city_id' => 1326,
                'name' => '基达尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            326 => 
            array (
                'id' => 1327,
                'city_id' => 1327,
                'name' => '加奥',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            327 => 
            array (
                'id' => 1328,
                'city_id' => 1328,
                'name' => '卡伊',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            328 => 
            array (
                'id' => 1329,
                'city_id' => 1329,
                'name' => '库利科罗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            329 => 
            array (
                'id' => 1330,
                'city_id' => 1330,
                'name' => '莫普提',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            330 => 
            array (
                'id' => 1331,
                'city_id' => 1331,
                'name' => '塞古',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            331 => 
            array (
                'id' => 1332,
                'city_id' => 1332,
                'name' => '通布图',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            332 => 
            array (
                'id' => 1333,
                'city_id' => 1333,
                'name' => '锡卡索',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            333 => 
            array (
                'id' => 1334,
                'city_id' => 1334,
                'name' => '阿德拉尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            334 => 
            array (
                'id' => 1335,
                'city_id' => 1335,
                'name' => '阿萨巴',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            335 => 
            array (
                'id' => 1336,
                'city_id' => 1336,
                'name' => '卜拉克纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            336 => 
            array (
                'id' => 1337,
                'city_id' => 1337,
                'name' => '东胡德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            337 => 
            array (
                'id' => 1338,
                'city_id' => 1338,
                'name' => '戈尔戈勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            338 => 
            array (
                'id' => 1339,
                'city_id' => 1339,
                'name' => '吉迪马卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            339 => 
            array (
                'id' => 1340,
                'city_id' => 1340,
                'name' => '努瓦迪布湾',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            340 => 
            array (
                'id' => 1341,
                'city_id' => 1341,
                'name' => '努瓦克肖特特区',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            341 => 
            array (
                'id' => 1342,
                'city_id' => 1342,
                'name' => '塔甘特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            342 => 
            array (
                'id' => 1343,
                'city_id' => 1343,
                'name' => '特拉扎',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            343 => 
            array (
                'id' => 1344,
                'city_id' => 1344,
                'name' => '提里斯-宰穆尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            344 => 
            array (
                'id' => 1345,
                'city_id' => 1345,
                'name' => '西胡德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            345 => 
            array (
                'id' => 1346,
                'city_id' => 1346,
                'name' => '因希里',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            346 => 
            array (
                'id' => 1347,
                'city_id' => 1347,
                'name' => '巴彦洪格尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            347 => 
            array (
                'id' => 1348,
                'city_id' => 1348,
                'name' => '巴彦乌勒盖',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            348 => 
            array (
                'id' => 1349,
                'city_id' => 1349,
                'name' => '布尔干',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            349 => 
            array (
                'id' => 1350,
                'city_id' => 1350,
                'name' => '达尔汗乌勒',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            350 => 
            array (
                'id' => 1351,
                'city_id' => 1351,
                'name' => '东方',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            351 => 
            array (
                'id' => 1352,
                'city_id' => 1352,
                'name' => '东戈壁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            352 => 
            array (
                'id' => 1353,
                'city_id' => 1353,
                'name' => '鄂尔浑',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            353 => 
            array (
                'id' => 1354,
                'city_id' => 1354,
                'name' => '戈壁阿尔泰',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            354 => 
            array (
                'id' => 1355,
                'city_id' => 1355,
                'name' => '戈壁苏木贝尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            355 => 
            array (
                'id' => 1356,
                'city_id' => 1356,
                'name' => '后杭爱',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            356 => 
            array (
                'id' => 1357,
                'city_id' => 1357,
                'name' => '科布多',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            357 => 
            array (
                'id' => 1358,
                'city_id' => 1358,
                'name' => '肯特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            358 => 
            array (
                'id' => 1359,
                'city_id' => 1359,
                'name' => '库苏古尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            359 => 
            array (
                'id' => 1360,
                'city_id' => 1360,
                'name' => '南戈壁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            360 => 
            array (
                'id' => 1361,
                'city_id' => 1361,
                'name' => '前杭爱',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            361 => 
            array (
                'id' => 1362,
                'city_id' => 1362,
                'name' => '色楞格',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            362 => 
            array (
                'id' => 1363,
                'city_id' => 1363,
                'name' => '苏赫巴托尔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            363 => 
            array (
                'id' => 1364,
                'city_id' => 1364,
                'name' => '乌布苏',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            364 => 
            array (
                'id' => 1365,
                'city_id' => 1365,
                'name' => '乌兰巴托市',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            365 => 
            array (
                'id' => 1366,
                'city_id' => 1366,
                'name' => '扎布汗',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            366 => 
            array (
                'id' => 1367,
                'city_id' => 1367,
                'name' => '中戈壁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            367 => 
            array (
                'id' => 1368,
                'city_id' => 1368,
                'name' => '中央',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            368 => 
            array (
                'id' => 1369,
                'city_id' => 1369,
                'name' => '达卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            369 => 
            array (
                'id' => 1370,
                'city_id' => 1370,
                'name' => '吉大港',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            370 => 
            array (
                'id' => 1371,
                'city_id' => 1371,
                'name' => '库尔纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            371 => 
            array (
                'id' => 1372,
                'city_id' => 1372,
                'name' => '阿雷基帕',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            372 => 
            array (
                'id' => 1373,
                'city_id' => 1373,
                'name' => '阿普里马克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            373 => 
            array (
                'id' => 1374,
                'city_id' => 1374,
                'name' => '阿亚库乔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            374 => 
            array (
                'id' => 1375,
                'city_id' => 1375,
                'name' => '安卡什',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            375 => 
            array (
                'id' => 1376,
                'city_id' => 1376,
                'name' => '胡利亚卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            376 => 
            array (
                'id' => 1377,
                'city_id' => 1377,
                'name' => '胡宁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            377 => 
            array (
                'id' => 1378,
                'city_id' => 1378,
                'name' => '卡哈马卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            378 => 
            array (
                'id' => 1379,
                'city_id' => 1379,
                'name' => '卡亚俄',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            379 => 
            array (
                'id' => 1380,
                'city_id' => 1380,
                'name' => '库斯科',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            380 => 
            array (
                'id' => 1381,
                'city_id' => 1381,
                'name' => '拉利伯塔德',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            381 => 
            array (
                'id' => 1382,
                'city_id' => 1382,
                'name' => '兰巴耶克',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            382 => 
            array (
                'id' => 1383,
                'city_id' => 1383,
                'name' => '利马',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            383 => 
            array (
                'id' => 1384,
                'city_id' => 1384,
                'name' => '洛雷托',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            384 => 
            array (
                'id' => 1385,
                'city_id' => 1385,
                'name' => '马德雷德迪奥斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            385 => 
            array (
                'id' => 1386,
                'city_id' => 1386,
                'name' => '莫克瓜',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            386 => 
            array (
                'id' => 1387,
                'city_id' => 1387,
                'name' => '帕斯科',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            387 => 
            array (
                'id' => 1388,
                'city_id' => 1388,
                'name' => '皮乌拉',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            388 => 
            array (
                'id' => 1389,
                'city_id' => 1389,
                'name' => '普诺',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            389 => 
            array (
                'id' => 1390,
                'city_id' => 1390,
                'name' => '钦博特',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            390 => 
            array (
                'id' => 1391,
                'city_id' => 1391,
                'name' => '钦查阿尔塔',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            391 => 
            array (
                'id' => 1392,
                'city_id' => 1392,
                'name' => '圣马丁',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            392 => 
            array (
                'id' => 1393,
                'city_id' => 1393,
                'name' => '苏拉纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            393 => 
            array (
                'id' => 1394,
                'city_id' => 1394,
                'name' => '塔克纳',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            394 => 
            array (
                'id' => 1395,
                'city_id' => 1395,
                'name' => '通贝斯',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            395 => 
            array (
                'id' => 1396,
                'city_id' => 1396,
                'name' => '瓦努科',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            396 => 
            array (
                'id' => 1397,
                'city_id' => 1397,
                'name' => '万卡维利卡',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
            ),
            397 => 
            array (
                'id' => 1398,
                'city_id' => 1398,
                'name' => '乌卡亚利',
                'alias' => NULL,
                'full_name' => NULL,
                'locale' => 'zh-cn',
 