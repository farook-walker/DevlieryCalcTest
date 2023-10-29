<?php

namespace Farook\DeliveryCalc;

class TransportCompanyFactory
{
    public static function createCompany(string $company): ITransportCompany
    {
        $class = "Farook\\DeliveryCalc\\Companies\\$company";
        if(class_exists($class) && ($company = new $class()) && $company instanceof ITransportCompany)
        {
            return $company;
        }
        throw new \Exception("Company not found");
    }
}