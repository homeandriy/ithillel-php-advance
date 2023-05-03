<?php

namespace Homeandriy\Ithillel\Utils;

use Faker\Factory;
use Homeandriy\Ithillel\Common\DB;

class Faker
{
    public static function fillProductTable(DB $connect, int $amount)
    {
        $faker = Factory::create('uk_UA');
        $pdo   = $connect->getConnect();
        $sql   = 'INSERT INTO "Products" (name,slug, price, sku, create_at, views, active) VALUES(:name,:slug,:price, :sku, :create_at, :views, :active)';
        $stmt  = $pdo->prepare($sql);


        $idList = [];
        for ($records = 0; $records < $amount; $records++) {
            $stmt->bindValue(':name', $faker->text(180));
            $stmt->bindValue(':slug', $faker->unique()->uuid());
            $stmt->bindValue(':price', $faker->randomFloat(2, 10000, 100000));
            $stmt->bindValue(':sku', $faker->lexify('prod-????????'));
            $stmt->bindValue(':create_at', $faker->dateTime()->format('Y-m-d H:i:s'));
            $stmt->bindValue(':views', $faker->numberBetween(2, 185000));
            $stmt->bindValue(':active', true);

            $stmt->execute();
            $idList[] = $pdo->lastInsertId();
        }

        return $idList;
    }
}