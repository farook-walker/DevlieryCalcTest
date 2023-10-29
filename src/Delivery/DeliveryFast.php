<?php 

namespace Farook\DeliveryCalc\Delivery;

class DeliveryFast extends DeliveryAbstract
{
    public function getEstimate() : DeliveryAbstract
    {
        $this->price = 100;
        $this->period = 1;
        return $this;
    }
}