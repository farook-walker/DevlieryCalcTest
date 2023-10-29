<?php 

namespace Farook\DeliveryCalc\Delivery;

class DeliverySlow extends DeliveryAbstract
{
    private float $coefficient;

    public function getEstimate() : DeliveryAbstract
    {
        $this->price = 150;
        $this->period = 1;
        if($this->coefficient) {
            $this->price = $this->price * $this->coefficient;
        }        
        return $this;
    }

    public function setCoefficient(float $coefficient)
    {
        $this->coefficient = $coefficient;
        return $this;
    }
}