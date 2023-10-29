<?php

namespace Farook\DeliveryCalc\Delivery;

abstract class DeliveryAbstract
{
    protected string $origin;
    protected string $destination;
    protected float $weight;

    protected float $price;
    protected int $period;
    protected string | null $error;

    public function __construct($origin, $destination, $weight)
    {
        $this->origin = $origin;
        $this->destination = $destination;
        $this->weight = $weight;
        $this->error = null;
    }

    public abstract function getEstimate() : DeliveryAbstract;

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
        return $this;
    }

    public function getPeriod()
    {
        return $this->period;
    }

    public function setPeriod(int $period)
    {
        $this->period = $period;
        return $this;
    }

    public function getError()
    {
        return $this->error;
    }

    public function setError(string $error)
    {
        $this->error = $error;
        return $this;
    }

    public function toArray()
    {
        return [
            'price' => $this->price,
            'period' => $this->period,
            'error' => $this->error
        ];
    }
}