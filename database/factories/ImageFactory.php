<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends Factory<Image>
 */
class ImageFactory extends Factory
{
    /**
     * Pool of real images to randomly assign.
     *
     * @var array<string, array<string>>
     */
private const IMAGES = [
    'Electronics' => [
        'https://images.unsplash.com/photo-1562408590-e32931084e23',
        'https://images.unsplash.com/photo-1555664424-778a1e5e1b48',
        'https://images.unsplash.com/photo-1517077304055-6e89abbf09b0'    
    ],
    'Laptops' => [
        'https://images.unsplash.com/photo-1541807084-5c52b6b3adef',
        'https://images.unsplash.com/photo-1542393545-10f5cde2c810',
        'https://images.unsplash.com/photo-1629131726692-1accd0c53ce0'
    ],
    'Gaming Laptops' => [
        'https://images.unsplash.com/photo-1640955014216-75201056c829',
        'https://images.unsplash.com/photo-1630794180018-433d915c34ac',
        'https://images.unsplash.com/photo-1623934199716-dc28818a6ec7'
    ],
    '15-inch' => [
        'https://plus.unsplash.com/premium_photo-1681302547899-9339f12aca53',
        'https://images.unsplash.com/photo-1511385348-a52b4a160dc2',
        'https://images.unsplash.com/photo-1639087595550-e9770a85f8c0'
    ],
    'Alienware Laptops' => [
        'https://plus.unsplash.com/premium_photo-1726876889330-b0ec9fe1ebc7',
        'https://images.unsplash.com/photo-1641623410264-948701015656',
        'https://images.unsplash.com/photo-1647782434770-dbe06fc5bba6',
    ],
    'LG Laptops' => [
        'https://images.unsplash.com/photo-1711540846697-56b9f66d17f1',
        'https://images.unsplash.com/photo-1590373717962-014ba271c061',
        'https://images.unsplash.com/photo-1760901627502-4969155b3330'
    ],
    'Samsung Laptops' => [
        'https://images.unsplash.com/photo-1661595675376-83b51c5a0963',
        'https://images.unsplash.com/photo-1610415303067-67a841b36fd5',
        'https://images.unsplash.com/photo-1602524210680-5e710ab14f23'
    ],
    '17-inch' => [
        'https://plus.unsplash.com/premium_photo-1681160405580-a68e9c4707f9',
        'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed',
        'https://images.unsplash.com/photo-1593642632823-8f785ba67e45',

    ],
    'Ultrabooks' => [
        'https://images.unsplash.com/photo-1760604359590-0f0dc7dbbf3c',
        'https://images.unsplash.com/photo-1592919671972-0e8d55457cb1',
        'https://images.unsplash.com/photo-1729338973448-335f1cc74c39'
    ],
    'Chromebooks' => [
        'https://plus.unsplash.com/premium_photo-1681566925324-ee1e65d9d53e',
        'https://images.unsplash.com/photo-1522202222206-b75023c48f4f',
        'https://images.unsplash.com/photo-1603791440384-56cd371ee9a7'
    ],
    'Phones' => [
        'https://images.unsplash.com/photo-1749716491521-af90e3b6feb6',
        'https://plus.unsplash.com/premium_photo-1680985551009-05107cd2752c',
        'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9'
    ],
    'Smartphones' => [
        'https://images.unsplash.com/photo-1598327105666-5b89351aff97',
        'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c',
        'https://images.unsplash.com/photo-1529653762956-b0a27278529c'
    ],
    'Android' => [
        'https://images.unsplash.com/photo-1480694313141-fce5e697ee25',
        'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c',
        'https://images.unsplash.com/photo-1612442058361-178007e5e498',
    ],
    'iOS' => [
        'https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5',
        'https://images.unsplash.com/photo-1596558450268-9c27524ba856',
        'https://images.unsplash.com/photo-1512054502232-10a0a035d672'
    ],
    'Feature Phones' => [
        'https://plus.unsplash.com/premium_photo-1729708655330-c1be62ec0f32',
        'https://images.unsplash.com/photo-1559312379-6eff3ba65888',
        'https://images.unsplash.com/photo-1687178226735-8608657046ae',
    ],
    'Audio' => [
        'https://images.unsplash.com/photo-1609271368026-c91c7886c92e',
        'https://images.unsplash.com/photo-1696653337265-ba497e1ed3f9',
        'https://images.unsplash.com/photo-1696872733111-16c35fe37c03',

    ],
    'Headphones' => [
        'https://images.unsplash.com/photo-1505740420928-5e560c06d30e',
        'https://plus.unsplash.com/premium_photo-1679513691474-73102089c117',
        'https://plus.unsplash.com/premium_photo-1678099940967-73fe30680949'
    ],
    'Speakers' => [
        'https://images.unsplash.com/photo-1531104985437-603d6490e6d4',
        'https://images.unsplash.com/photo-1545454675-3531b543be5d',
        'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1'
    ],
    'Earbuds' => [
        'https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb',
        'https://images.unsplash.com/photo-1590658268037-6bf12165a8df',
        'https://images.unsplash.com/photo-1655560378428-7605bda51749'
    ],
    'Clothing' => [
        'https://images.unsplash.com/photo-1619603364904-c0498317e145',
        'https://images.unsplash.com/photo-1617019114583-affb34d1b3cd',
        'https://images.unsplash.com/photo-1625204614387-6509254d5b02'
    ],
    "Men's Clothing" => [
        'https://plus.unsplash.com/premium_photo-1669688174622-0393f5c6baa2',
        'https://plus.unsplash.com/premium_photo-1672239496412-ab605befa53f',
        'https://images.unsplash.com/photo-1552168212-9ceb61083ba0'
    ],
    'Shirts' => [
        'https://images.unsplash.com/photo-1740711152088-88a009e877bb',
        'https://images.unsplash.com/photo-1642764873654-9eef0467b342',
        'https://images.unsplash.com/photo-1605794432120-f4bb5dc9067d'
    ],
    'Trousers' => [
        'https://plus.unsplash.com/premium_photo-1760657044843-d1103a730381',
        'https://plus.unsplash.com/premium_photo-1783997267716-ef49cc5d7294',
        'https://images.unsplash.com/photo-1760433468572-44d1cf0b8641'
    ],
    "Men's Outerwear" => [
        'https://images.unsplash.com/photo-1517938889432-a2ac9241a486',
        'https://images.unsplash.com/photo-1642886513308-d21acc15057d',
        'https://images.unsplash.com/photo-1517938889432-a2ac9241a486'
    ],
    "Women's Clothing" => [
        'https://images.unsplash.com/photo-1516762689617-e1cffcef479d',
        'https://plus.unsplash.com/premium_photo-1689371956254-1a8adca96b78',
        'https://plus.unsplash.com/premium_photo-1691622500807-6d9eeb9ea06a'
    ],
    'Dresses' => [
        'https://images.unsplash.com/photo-1623609163859-ca93c959b98a',
        'https://images.unsplash.com/photo-1612336307429-8a898d10e223',
        'https://images.unsplash.com/photo-1568252542512-9fe8fe9c87bb'
    ],
    'Tops' => [
        'https://images.unsplash.com/photo-1525550133628-43e58e551e6f?w',
        'https://images.unsplash.com/photo-1764337593519-c51a77b4fc3d?w',
        'https://plus.unsplash.com/premium_photo-1701204056494-1fff4540e991'
    ],
    "Women's Outerwear" => [
        'https://images.unsplash.com/photo-1736427916891-2e41f05d385f',
        'https://images.unsplash.com/photo-1736427916805-236c544a542a',
        'https://images.unsplash.com/photo-1736427916951-4aabcb28508d'
    ],
    "Kid's Clothing" => [
        'https://images.unsplash.com/photo-1554342321-0776d282ceac',
        'https://images.unsplash.com/photo-1758782213532-bbb5fd89885e',
        'https://images.unsplash.com/photo-1632232963035-bc14755747c9'
    ],
    'Boys' => [
        'https://plus.unsplash.com/premium_photo-1693242804074-20a78966f4e6',
        'https://images.unsplash.com/photo-1673340979193-481dd0eb49c8',
        'https://images.unsplash.com/photo-1566513783358-9b483cfc7042'
    ],
    'Girls' => [
        'https://plus.unsplash.com/premium_photo-1723874486879-4059a9aefa3d',
        'https://images.unsplash.com/photo-1649318100379-1734db7be867',
        'https://images.unsplash.com/photo-1649318096524-e205823411ad'
    ],
    'Home & Garden' => [
        'https://images.unsplash.com/photo-1622473590925-e3616c0a41bf',
        'https://plus.unsplash.com/premium_photo-1747911361940-5188c161ff7b',
        'https://images.unsplash.com/photo-1629157319203-df69cdcfdbb9'
    ],
    'Furniture' => [
        'https://plus.unsplash.com/premium_photo-1683649964277-60f5333869a4',
        'https://plus.unsplash.com/premium_photo-1668073438399-cabd903321ed',
        'https://images.unsplash.com/photo-1627226325480-f46163bc38c2'
    ],
    'Sofas' => [
        'https://images.unsplash.com/photo-1555041469-a586c61ea9bc',
        'https://images.unsplash.com/photo-1550581190-9c1c48d21d6c',
        'https://images.unsplash.com/photo-1698936061086-2bf99c7b9fc5'
    ],
    'Chairs' => [
        'https://plus.unsplash.com/premium_photo-1705169612261-2cf0407141c3',
        'https://images.unsplash.com/photo-1612372606404-0ab33e7187ee',
        'https://images.unsplash.com/photo-1592078615290-033ee584e267'
    ],
    'Tables' => [
        'https://images.unsplash.com/photo-1499933374294-4584851497cc',
        'https://images.unsplash.com/photo-1657524398377-567034729507',
        'https://plus.unsplash.com/premium_photo-1684445034959-b3faeb4597d2'
    ],
    'Cookware' => [
        'https://images.unsplash.com/photo-1584990347193-6bebebfeaeee',
        'https://images.unsplash.com/photo-1518291344630-4857135fb581',
        'https://images.unsplash.com/photo-1584990347163-2b86b71390d6'
    ],
    'Appliances' => [
        'https://images.unsplash.com/photo-1596552183299-000ef779e88d',
        'https://images.unsplash.com/photo-1484154218962-a197022b5858',
        'https://images.unsplash.com/photo-1570222094114-d054a817e56b'
    ],
    'Kitchen' => [
        'https://plus.unsplash.com/premium_photo-1680382578857-c331ead9ed51',
        'https://images.unsplash.com/photo-1586208958839-06c17cacdf08',
        'https://images.unsplash.com/photo-1556185781-a47769abb7ee'
    ]
];

    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),
        ];
    }

    public function forProduct(Product $parent, Category $category): static
    {
        return $this->state(fn (array $attributes) => [
            'url' => fake()->randomElement(self::IMAGES[$category->name]),
        ]);
    }
}
