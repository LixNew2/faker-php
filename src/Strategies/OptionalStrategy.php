<?php

namespace Xefi\Faker\Strategies;

use Random\Randomizer;
use function PHPUnit\Framework\throwException;

class OptionalStrategy extends Strategy
{
    protected float $weight;
    private Randomizer $randomizer;

    /**
     * @throws \ErrorException
     */
    public function __construct(float $weight)
    {
        if($weight > 100){
            throw new \ErrorException('Weight must be between 0 and 100');
        }
        $this->weight = ($weight > 1) ? $weight / 100 : $weight; //normalize weight between 0 and 1
        $this->randomizer = new Randomizer();
    }

    public function pass(mixed $generatedValue): bool
    {
        return ($this->randomizer->getFloat(0, 1) < $this->weight);
    }
}