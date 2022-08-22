<?php
include("config.php");

$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
  'start' => '1',
  'limit' => '5000',
  'convert' => 'USD'
];
$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: cbcb2622-b0a9-4fee-81b0-dc01451eb6cd'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,            // set the request URL
  CURLOPT_HTTPHEADER => $headers,     // set the headers 
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = json_decode(curl_exec($curl)); // Send the request, save the response
$delete_query = "delete from  trending ";
$conn->query($delete_query);
//echo '<pre>';print_r($response); exit;
$sql = "";
for($i=0; $i<$parameters['limit']; $i++) {
    $id = $response->data[$i]->id;
    $name = addslashes($response->data[$i]->name);
    $symbol = $response->data[$i]->symbol;
    $date_added = $response->data[$i]->date_added;
    $cmc_rank = $response->data[$i]->cmc_rank;
    $market_cap = $response->data[$i]->quote->USD->market_cap;
    $volume_24h = $response->data[$i]->quote->USD->volume_24h;
    $price = $response->data[$i]->quote->USD->price;
    $percent_change_1h = $response->data[$i]->quote->USD->percent_change_1h;
    $percent_change_1h = $response->data[$i]->quote->USD->percent_change_1h;
    $percent_change_24h = $response->data[$i]->quote->USD->percent_change_24h;
    $percent_change_7d = $response->data[$i]->quote->USD->percent_change_7d;
    $percent_change_30d = $response->data[$i]->quote->USD->percent_change_30d;
    $percent_change_60d = $response->data[$i]->quote->USD->percent_change_60d;
    $percent_change_90d = $response->data[$i]->quote->USD->percent_change_90d;
    $result = $conn->query("select cmc_rank from coins where id='$id'");
    $row = $result->fetch_assoc();
    $old_rank = $row["cmc_rank"];
    if($old_rank-$cmc_rank > 0){
        $positions_moved = $old_rank-$cmc_rank;
        $trend_query = "INSERT INTO  trending  (id, name, symbol, cmc_rank, positions_moved) VALUES  ('$id', '$name', '$symbol', '$cmc_rank', '$positions_moved')";
        $conn->query($trend_query);
    }

    $sql.="('$id', '$name', '$symbol', '$date_added', '$market_cap', '$volume_24h', '$price', '$cmc_rank', '$percent_change_1h', '$percent_change_24h', '$percent_change_7d', '$percent_change_30d', '$percent_change_60d', '$percent_change_90d')";
    if($i != ($parameters['limit']-1))
        $sql.=",";

}
$delete_query = "delete from coins";
$conn->query($delete_query);
$sql_query = "INSERT INTO coins (id, name, symbol, date_added, market_cap, volume_24h, price, cmc_rank, percent_change_1h, percent_change_24h, percent_change_7d, percent_change_30d, percent_change_60d, percent_change_90d) VALUES  $sql";
$result = $conn->query($sql_query);

curl_close($curl); 
header('Location: index.php');
?>