# MetaKocka API wrapper module

## usage

### init client
```php5
$companyID = 1234;
$secretKey = "secret_code";

$client = new \Smarti\Metakocka\Client($companyID, $secretKey);
```

### get product list
```php5
$data = new \Smarti\Metakocka\Resource\Product\ListRequest();
$data->setSales(true);
$productList = $client->getProductList($data);

$count = $productList->getProductListCount();
foreach ($productList->getProductList() as $product) {
    echo $product->getName();
}
```

### create product
```php5
$data = new \Smarti\Metakocka\Resource\Product\ItemRequest();

$data->setCode('unique_code_123456');
$data->setName('Beautiful product name');
$data->setSales(true);
$data->setService(true);

$product = $client->createProduct($data);
```

### create bill
```php5
$data = new \Smarti\Metakocka\Resource\Sales\BillRequest();

$data->setBillDate(new DateTime());
$data->setPaymentDate((new DateTime())->add(new DateInterval('P8D')));

$partner = new \Smarti\Metakocka\Resource\Partner\PartnerRequest();
$partner->setBusinessEntity(false);
$partner->setCustomer('John Doe');
$partner->setStreet('Elm street 10');
$partner->setPostNumber('1000');
$partner->setPlace('Ljubljana');
$data->setPartner($partner);

$product1 = new \Smarti\Metakocka\Resource\Product\ItemRequest();
$product1->setMkId(555500000000); // or $product1->setCountCode('unique_code_123456');
$product1->setAmount(1);
$product1->setPrice(round(55.9 / 1.22, 4)); // price without tax
$product1->setTax(\Smarti\Metakocka\Enum\Tax::TAX_220);

$data->addProduct($product1);

$bill = $client->createBill($data);
```


### get bill PDF
```php5
$data = new \Smarti\Metakocka\Resource\Sales\BillPdfRequest();

$billCountCode = '2016-123456';

$data->setHideCode(true);
$data->setCountCode($billCountCode);

$rawPdfData = $client->getBillPdf($data);

// write response into file
$fileName = $billCountCode . '.pdf';
$fh = fopen($fileName, 'w');
fwrite($fh, $rawPdfData);
fclose($fh);
```

## !! important note !!

Currently API only has some methods. Other methods will (maybe) come eventually, if needed.
Warning: this is not official API, nor is officially supported, so use it at your own risk.
But you can contact me for any questions :)