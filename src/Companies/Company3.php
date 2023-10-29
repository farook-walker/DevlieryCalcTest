<?php

namespace Farook\DeliveryCalc\Companies;

use Farook\DeliveryCalc\ITransportCompany;
use Farook\DeliveryCalc\Delivery\DeliveryFast;
use Farook\DeliveryCalc\Delivery\DeliverySlow;

class Company3 implements ITransportCompany
{    
    public function estimateDelivery(string $sourcePoint, string $targetPoint, float $cargoWeight): array
    {
        $delivery1 = new DeliveryFast($sourcePoint, $targetPoint, $cargoWeight);
        $delivery2 = new DeliverySlow($sourcePoint, $targetPoint, $cargoWeight);
        $delivery2->setCoefficient(0.7);
        return [
            $delivery1->getEstimate(),
            $delivery2->getEstimate(),
        ];
    }
}