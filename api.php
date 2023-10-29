<?php
include_once 'vendor/autoload.php';
$seedData = require_once 'seed.php';
$company = isset($_POST['company']) ? $_POST['company'] : null;
$origin = isset($_POST['origin']) ? $_POST['origin'] : null;
$destination = isset($_POST['destination']) ? $_POST['destination'] : null;
$weight = isset($_POST['weight']) ? $_POST['weight'] : null;

$result = [];
if($company && $origin && $destination && $weight)
{
    switch($company)
    {
        case 'company1':
            $company = Farook\DeliveryCalc\TransportCompanyFactory::createCompany('Company1');
            $delivery = $company->estimateDelivery($origin, $destination, $weight);
            $result['estimate'] = [
                'fast' => $delivery[0]->toArray(),
                'slow' => $delivery[1]->toArray()
            ];
            break;
        case 'company2':
            $company = Farook\DeliveryCalc\TransportCompanyFactory::createCompany('Company2');
            $delivery = $company->estimateDelivery($origin, $destination, $weight);
            $result['estimate'] = [
                'fast' => $delivery[0]->toArray(),
                'slow' => $delivery[1]->toArray()
            ];

            break;
        case 'company3':
            $company = Farook\DeliveryCalc\TransportCompanyFactory::createCompany('Company3');
            $delivery = $company->estimateDelivery($origin, $destination, $weight);
            $result['estimate'] = [
                'fast' => $delivery[0]->toArray(),
                'slow' => $delivery[1]->toArray()
            ];
            break;
        default:
            break;
    }
}
header("Content-Type: application/json");
die(json_encode($result));