<?php

namespace Core;

use Core\Traits\Queryable;

abstract class Model
{
    use Queryable;

    public ?int $id = null;

    public function getId(): int|false
    {
        if (!property_exists($this, 'id') || !is_numeric($this->id)) {
            return false;
        }
        return $this->id;
    }

    public function insert(): int|false
    {
//        $properties = (new ReflectionObject($this))->getProperties(ReflectionProperty::IS_PUBLIC);
        $properties = $this->getObjectData();
        $preparedFields = implode(',', array_keys($properties));
        $preparedValue = implode(',',
            array_map(function (string $property) {
                return ':' . $property;
            },
                array_keys($properties))
        );
        $query = Db::connect()->prepare("INSERT INTO " . static::$tableName . " (" . $preparedFields . ") VALUES(" . $preparedValue . ")");
        foreach ($properties as $fieldName => &$fieldValue) {
            $query->bindValue(':' . $fieldName, $fieldValue);
        }
        try {
            Db::connect()->beginTransaction();
            $query->execute();
            Db::connect()->commit();
            $stmt =  Db::connect()->query("SELECT LAST_INSERT_ID()");
            return  $stmt->fetchColumn();
        } catch (\PDOException $exception) {
            Db::connect()->rollBack();
            dd($exception->getMessage());
        }
    }

    public function update($where = [])
    {
        if (empty($where)) {
            $this->insert();
        }
        $properties = $this->getObjectData();
        $preparedFields = implode(
            ',',
            array_map(fn($property) => $property . ' = :' . $property, array_keys($properties))
        );

        $preparedWhere = array_key_first($where) . '=:' . array_key_first($where);
        $query = Db::connect()->prepare("UPDATE " . static::$tableName . " SET " . $preparedFields . " WHERE " . $preparedWhere);
        $query->bindValue(':' . array_key_first($where), $where[array_key_first($where)]);
        foreach ($properties as $fieldName => &$fieldValue) {
            $query->bindValue(':' . $fieldName, $fieldValue);
        }
        try {
            Db::connect()->beginTransaction();
            $query->execute();
            Db::connect()->commit();
            return Db::connect()->lastInsertId();
        } catch (\PDOException $exception) {
            Db::connect()->rollBack();
            dd($exception->getMessage());
        }
    }

    protected function getObjectData(): array
    {
        $properties = get_object_vars($this);
        unset($properties['commands']);

        if (array_key_exists('id', $properties) && is_null($properties['id'])) {
            unset($properties['id']);
        }
        // деякі інші обробники

        return $properties;
    }
}
