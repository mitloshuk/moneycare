# MoneyCare API library

### About package

PHP library for MoneyCare API www.moneycare.su. MoneyCare is the leading credit platform for PIC lending in stores. More than 15 solutions from banks and MFIs in 2 minutes

### How to start

1. Install package via `composer require mitloshuk/moneycare` command or add `"mitloshuk/moneycare": "^1.0"` to your `composer.json`
2. Init `MoneyCare/MoneyCare` via your DI or use `$moneyCare = new \MoneyCare\MoneyCare($username, $password);` where `$username` and `$password` are your auth data to MoneyCare API

### How to create order

1. Create Order model like `$order = new \MoneyCare\Models\OrderCreation();`
2. Create Good model like `$good = new \MoneyCare\Models\Good();`
3. Add price and another optional parameters to Good model `$good->setPrice(100)->setTitle('Good Title');`.  You can use any parameter from docs with `set` prefix like `->setBrand('This is my brand')`.
4. For predefined parameter `goodType` can use dictionary `GoodTypesDictionary`, for example `\MoneyCare\Dictionaries\GoodTypesDictionary::PRODUCT`
5. Add required Good and point id to your Order model `$order->addGood($good)->setPointId('point');`. You can use any parameter from docs with `set` prefix like `->setGenerateForm(true)`.
6. Execute sending of order model with `$response = $moneyCare->createOrder($order);`
7. Check response `$response->getIsAccepted()` or get form url with `$response->getFormUrl()` if you requested it on previous step
8. For predefined parameters `creditTypes`, `formMode` and `creditStatus` you can use `CreditTypesDictionary`, `FormModesDictionary` and `CreditTypesDictionary` dictionaries.

So ready example code of creating order will look like
```
$moneyCare = new \MoneyCare\MoneyCare($username, $password);

$order = new \MoneyCare\Models\OrderCreation();
$good = new \MoneyCare\Models\Good();

$good->setPrice(100)->setTitle('Good Title');
$order->addGood($good)->setPointId('point');

$response = $moneyCare->createOrder($order);

if ($response->getIsAccepted()) {
    echo $response->getFormUrl();
}
```

### How to update order

1. Get `order id` of existing order via `$orderId = $response->getOrderId();` of previous response
2. Create new Order model like `$newOrderData = new \MoneyCare\Models\OrderUpdating();`
2. Create one more Good model like `$good2 = new \MoneyCare\Models\Good();`
3. Add price and another optional parameters to Good model `$good2->setPrice(100)->setTitle('Good Title');`. 
5. Add that Good to your new Order model `$newOrderData->addGood($good)`.
6. Execute sending of order model with `$moneyCare->updateOrder($orderId, $newOrderData);`
7. There are no response from request, but you can get info with `details request`

Ready code of updating previous example order will look like
```
$orderId = $response->getOrderId();
$newOrderData = new \MoneyCare\Models\OrderUpdating();
$good2 = new \MoneyCare\Models\Good();

$good2->setPrice(100)->setTitle('Good Title');
$newOrderData->addGood($good2);

$moneyCare->updateOrder($orderId, $newOrderData);
```

### How to get order details

1. Get `order id` of existing order via `$orderId = $response->getOrderId();` of previous response
2. Execute request like `$response = $moneyCare->orderDetails($orderId);`
3. Response will contain all parameters from doc, they will accessible via their names with `get` prefix

Ready code of getting details
```
$orderId = $response->getOrderId();
$response = $moneyCare->orderDetails($orderId);
echo $response->getCreditLimit();
```

### How to change order status

1. Get `order id` of existing order via `$orderId = $response->getOrderId();` of previous response
2. Execute request like `$moneyCare->updateStatus($orderId, OrderStatusesDictionary::DELIVERY);`
3. Second method argument is `orderStatus` and it predefined, so you can take `OrderStatusesDictionary` for simpler usage
4. There are no response from request, but you can get info with `details request`

Ready code of getting details
```
$orderId = $response->getOrderId();
$moneyCare->updateStatus($orderId, OrderStatusesDictionary::DELIVERY);
```