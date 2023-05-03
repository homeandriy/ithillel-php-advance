<?php

namespace Homeandriy\Ithillel\Services;

/**
 * This class provide base color operation for RGB format
 *
 * @author Andrii Beznosko
 * @version 1.0
 */
class Color
{
    private int $red;
    private int $green;
    private int $blue;

    /**
     * Get random instance
     *
     * @return self
     */
    public static function random(): self
    {
        return new Color(
            mt_rand(1, 255),
            mt_rand(1, 255),
            mt_rand(1, 255),
        );
    }

    /**
     * @param  int  $red  0-255
     * @param  int  $green  0-255
     * @param  int  $blue  0-255
     */
    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    /**
     * Check equals two colors
     *
     * @param  Color  $colorInstance
     *
     * @return bool
     */
    public function equals(Color $colorInstance): bool
    {
        if (
            $this->getRed()   === $colorInstance->getRed() &&
            $this->getGreen() === $colorInstance->getGreen() &&
            $this->getBlue()  === $colorInstance->getBlue()
        ) {
            return true;
        }

        return false;
    }

    /**
     * Mix two colors
     *
     * @param  Color  $colorInstance
     *
     * @return void
     */
    public function mix(Color $colorInstance): void
    {
        $this->setRed(
            round(
                ($this->getRed() + $colorInstance->getRed()) / 2
            )
        );
        $this->setGreen(
            round(
                ($this->getGreen() + $colorInstance->getGreen()) / 2
            )
        );
        $this->setBlue(
            round(
                ($this->getBlue() + $colorInstance->getBlue()) / 2
            )
        );
    }

    /**
     * @return int
     */
    public function getRed(): int
    {
        return $this->red;
    }

    /**
     * @param  int  $red
     */
    private function setRed(int $red): void
    {
        if ($red > 255) {
            throw new \InvalidArgumentException('The maximum color value should not exceed 255');
        }
        if ($red < 0) {
            throw new \InvalidArgumentException('The minimum color value must not be less than 0');
        }
        $this->red = $red;
    }

    /**
     * @return int
     */
    public function getGreen(): int
    {
        return $this->green;
    }

    /**
     * @param  int  $green
     */
    public function setGreen(int $green): void
    {
        if ($green > 255) {
            throw new \InvalidArgumentException('The maximum color value should not exceed 255');
        }
        if ($green < 0) {
            throw new \InvalidArgumentException('The minimum color value must not be less than 0');
        }
        $this->green = $green;
    }

    /**
     * @return int
     */
    public function getBlue(): int
    {
        return $this->blue;
    }

    /**
     * @param  int  $blue
     */
    public function setBlue(int $blue): void
    {
        if ($blue > 255) {
            throw new \InvalidArgumentException('The maximum color value should not exceed 255');
        }
        if ($blue < 0) {
            throw new \InvalidArgumentException('The minimum color value must not be less than 0');
        }
        $this->blue = $blue;
    }
}
