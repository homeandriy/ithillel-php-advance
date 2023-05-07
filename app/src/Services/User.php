<?php

namespace Homeandriy\Ithillel\Services;

/**
 * Class User
 * Warning! Calling methods is done through a magic method
 */
class User
{
    private string $name;
    private string $email;
    private int $age;

    /**
     * Calling methods is done through a magic method
     *
     * @param  string  $name
     * @param  array  $arguments
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        if (method_exists($this, $name) && count($arguments) === 1) {
            return $this->{$name}(current($arguments));
        }
        if ( ! method_exists($this, $name)) {
            throw new \BadFunctionCallException(
                'Method: ' . htmlspecialchars($name, ENT_QUOTES | ENT_DISALLOWED | ENT_HTML401) . ' not found!'
            );
        }
        if (count($arguments) !== 1) {
            throw new \InvalidArgumentException(
                'One function argument is expected'
            );
        }

        throw new \InvalidArgumentException(
            'Other Call user func error'
        );
    }

    /**
     * Deprecate call static method for class
     *
     * @param  string  $name
     * @param  array  $arguments
     *
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments)
    {
        throw new \BadFunctionCallException(
            'Calling magic static methods is prohibited for ' . __CLASS__ . ' class'
        );
    }

    /**
     * Set user name
     * Name set from, magic method $classInstance->setName(string $name)
     *
     * @param  string  $name  - expected string, but for Exception set mixed
     *
     * @return void
     */
    private function setName(mixed $name): void
    {
        if ( ! is_string($name) || empty($name)) {
            throw new \InvalidArgumentException('Name must be not empty string');
        }
        $this->name = $name;
    }

    /**
     * Set user Age
     * Age set from, magic method $classInstance->setAge(int $age)
     *
     * @param  mixed  $age  - expected int, but for Exception set mixed
     *
     * @return void
     */
    private function setAge(mixed $age): void
    {
        if ( ! is_numeric($age) || $age < 0) {
            throw new \InvalidArgumentException('Age must be a number and be greater than zero');
        }

        $this->age = $age;
    }

    /**
     * Get all user information
     *
     * @return string
     */
    public function getAll(): string
    {
        $userData = "User data : \n";
        if ( ! empty($this->name)) {  // Maybe display "Not set name"
            $userData .= "Name : " . $this->name . "\n";
        }
        if ( ! empty($this->age)) { // Maybe display "Not set age"
            $userData .= "Age : " . $this->age . "\n";
        }
        if ( ! empty($this->email)) { // Maybe display "Not set email"
            $userData .= "Email : " . $this->email . "\n";
        }

        return $userData;
    }

    /**
     * Implemented to string method
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->getAll();
    }
}