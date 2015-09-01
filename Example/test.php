<?php

require_once __DIR__ . '/../loader.php';

$pair = 'btc_idr';
$api = new Teguholica\BitcoinIDAPI\ApiNoKey();

try {
    $depth = $api->getDepth($pair);
    $ticker = $api->getTicker($pair);
    $trades = $api->getTrades($pair);
} catch (\Undelete\BTCEApi\ApiException $e) {
    printf("Error! %s", $e->getMessage());
    die;
}

$firstAsk = $depth['sell'][0];
$firstBid = $depth['buy'][0];

printf("First ask %.4f (%.4f) First bid %.4f (%.4f)\n", $firstAsk[0], $firstAsk[1], $firstBid[0], $firstBid[1]);
printf("High: %.4f Low: %.4f Last: %.4f\n", $ticker['high'], $ticker['low'], $ticker['last']);
printf("Last trade %s %.4f (%.4f)", $trades[0]['type'], $trades[0]['price'], $trades[0]['amount']);