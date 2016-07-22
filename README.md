# MetaKocka API wrapper module

## usage

```php5
$companyID = 1234;
$secretKey = "secret_code";

$client = new \Smarti\Metakocka\Client($companyID, $secretKey);

$data = new Smarti\Metakocka\Resource\Product\ListRequest();
$data->setSales(true);
$productList = $client->getProductList($data);

$count = $productList->getProductListCount();
foreach ($productList->getProductList() as $product) {
    echo $product->getName();
}
```


## !! important note !!

Currently API only has single method - getProductList(). Other methods will come eventually.
Warning: this is not official API, nor is officially supported, so use it at your own risk.