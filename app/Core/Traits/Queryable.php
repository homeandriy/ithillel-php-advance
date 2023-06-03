<?php

namespace Core\Traits;

use Core\Db;
use Core\Model;
use PDO;
use ReflectionObject;
use ReflectionProperty;

trait Queryable
{
    protected static string|null $tableName = null;

    protected static string $query = "";

    protected array $commands = [];

    // User::select() -> table name -> users
    // Note::select() -> table name -> notes
    public static function select(array $columns = ['*']): static
    {
        static::resetQuery();
        static::$query = "SELECT " . implode(', ', $columns) . " FROM " . static::$tableName . " ";

        $obj = new static();
        $obj->commands[] = 'select';

        return $obj;
    }
    public static function find(int $id): static|false
    {
        $query = Db::connect()->prepare("SELECT * FROM " . static::$tableName . " WHERE id = :id");
        $query->bindParam('id', $id);
        $query->execute();

        return $query->fetchObject(static::class);
    }

    public static function findBy(string $column, $value): static|false
    {
        $query = Db::connect()->prepare("SELECT * FROM " . static::$tableName . " WHERE {$column} = :{$column}");
        $query->bindParam($column, $value);
        $query->execute();

        return $query->fetchObject(static::class);
    }

    protected static function resetQuery(): void
    {
        static::$query = "";
    }

    /**
     * Query result
     * User::select()...
     * [
     *   User obj,
     *   User obj
     * ]
     * @return array|false
     */
    public function get()
    {
        return Db::connect()->query(static::$query)->fetchAll(PDO::FETCH_CLASS, static::class);
    }
}
