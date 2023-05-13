<?php

namespace Homeandriy\Ithillel\Service;

use PDO;
use PDOException;

/**
 * Super primitive DB class
 */
class DB
{
    private static ?PDO $connect;
    private \PDOStatement|false $query;
    private mixed $result;

    public function getConnect(): PDO
    {
        return self::$connect;
    }

    /**
     * @param  string  $host
     * @param  string  $db
     * @param  string  $user
     * @param  string  $password
     */
    public function __construct(string $host, string $db, string $user, string $password)
    {
        try {
            $dsn = "pgsql:host=$host;port=5433;dbname=$db;";

            self::$connect = new PDO(
                $dsn,
                $user,
                $password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * @param  string  $query  - query string. Example "Select * from table where slug=?"
     * @param  array  $prepare  - array of bind values/ For bellow example is ['post-for-flowers']
     *
     * @return void
     */
    public function query(string $query, array $prepare): void
    {
        $this->query = self::$connect->prepare($query, $prepare);
    }

    /**
     * Return the DB result
     *
     * @return array|bool
     */
    public function getResult(): array|bool
    {
        $this->query->execute();

        return $this->query->fetchAll(PDO::FETCH_OBJ);
    }
}