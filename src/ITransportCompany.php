<?php

namespace Farook\DeliveryCalc;

interface ITransportCompany
{
    function estimateDelivery(string $sourcePoint, string $targetPoint, float $cargoWeight): array;
}