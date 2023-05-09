<?php

namespace Homeandriy\Ithillel\Models;

use Homeandriy\Ithillel\Utils\InvalidPasswordException;
use Homeandriy\Ithillel\Utils\InvalidUserIdException;

/**
 * User model
 * Set params in constructor
 */
class User
{
    private int $id;
    private string $password;

    public function __construct($id, $password)
    {
        $this->setId($id);
        $this->setPassword($password);
    }

    /**
     * @param  mixed  $id
     *
     * @throws InvalidUserIdException
     */
    protected function setId(mixed $id): void
    {
        if ( ! is_numeric($id) || $id < 0) {
            throw new InvalidUserIdException();
        }
        $this->id = $id;
    }

    /**
     * @param  mixed  $password
     *
     * @throws InvalidPasswordException
     */
    protected function setPassword(mixed $password): void
    {
        if ( ! is_string($password) || empty($password) || strlen($password) > 8) {
            throw new InvalidPasswordException();
        }
        $this->password = $password;
    }
}