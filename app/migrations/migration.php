<?php

use Config\Config;
use Core\DB;

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
$dotenv->load();

class Migration
{
    const SCRIPTS_DIR = __DIR__ . '/scripts/';
    const MIGRATIONS_TABLE = '0_migrations';

    protected PDO $db;

    public function __construct()
    {
        $this->db = Db::connect();
        try {
            $this->db->beginTransaction();

//            $this->checkMigrationTable();
            ;
            // run all migration
            // TODO розбити на блоки
            $this->db->query($this->getMigrations());
            $this->db->commit();
        } catch (PDOException $exception) {
            $this->db->rollBack();
            d($exception->getMessage(), $exception->getTrace());
        }
    }

    public function getMigrations(): string
    {
//        dd(glob(self::SCRIPTS_DIR . '*.sql'));
        $sqlCommands = '';
        foreach (glob(self::SCRIPTS_DIR . '*.sql') as $file) {
            if(false !== stripos($file, self::MIGRATIONS_TABLE)) {
                continue;
            }
            $sqlCommands .= file_get_contents($file);
        }
        return $sqlCommands;
    }

    public function checkMigrationTable()
    {
        $query = file_get_contents(self::SCRIPTS_DIR . self::MIGRATIONS_TABLE . '.sql');
        $this->db->query($query);
    }
}

new Migration();