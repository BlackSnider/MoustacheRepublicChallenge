# Edmar Cruz - Simple Product Details (Moustache Republic Challenge)

# Description

Create a simple product details section for a clothing site with cart functionality.

# Requirements

Server should have the following softwares available:
- PHP 7 & above
- Apache
- MySQL/MariaDB
- Composer

Programming language used:
- JavaScript (JQuery)
- CSS (Bootstrap)
- PHP 
 
# Getting started

Create a MySQL database based on the attached SQL file (mr_simple_cart.sql)

Setting up the configuration (configuration.ini) 

```

; Link URL for layout and API
link_url_cart=<YOUR WEBROOT URL>/views/cart/
link_url_api=<YOUR WEBROOT URL>/system/controllers/

; MySQL Credentials
[database]
host=<MYSQL HOST>
user=<MYSQL USER>
pass=<MYSQL PASS>
prefix=<MYSQL DATABASE PREFIX>
name=<MYSQL DATABASE NAME>
type=mysql
[/database]

[table]
prefix=<MYSQL DATABASE TABLE PREFIX>
[/table]

```

# REST API for creating, updating and viewing cart Details

Creating a CART transaction

Needed variables to passed are:
- productID 
- userID
- sizeID
- quantity

```

 /**
 * @title Create a cart transaction 
 * @desc POST a unique CART ID to view the result in JSON format
 **/
 public function create_shopping_cart() {
	
	$productID =  $_REQUEST['productID'];
	$userID    =  $_REQUEST['userID'];
	$sizeID    =  $_REQUEST['sizeID'];
	$quantity  =  $_REQUEST['quantity'];
	
	if($productID == "" || $sizeID == "" || $quantity == "" || $userID == "") {
		
		$status  =  1;
		$message =  "Please supply necessary fields.";
		
	} else {
		
		$status  = 0;
		$message = "Successfully saved a cart transaction."; 
		
		$productCartArray = array(
								  "userID"       => $userID,
								  "productID"    => $productID,
								  "sizeID"       => $sizeID,
								  "quantity"     => $quantity,
								  "transDate"	 => date("Y-m-d H:i:s"),
								  "dateCreated"  => date("Y-m-d H:i:s")
								  );
		
		$this->cart->add_shopping_cart($productCartArray);
		
	}
	
	$jsonArray = array("status" => $status, "message" => $message);
	
	echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE);
	
}
	
```


Updating a CART transaction

Needed variables to passed are:
- cartID 
- productID 
- userID
- sizeID
- quantity

```
/**
 * @title Update a cart transaction 
 * @desc POST a unique CART ID to view the result in JSON format
 **/
public function update_shopping_cart() {
	
	$cartID    =  $_REQUEST['cartID'];
	$productID =  $_REQUEST['productID'];
	$sizeID    =  $_REQUEST['sizeID'];
	$quantity  =  $_REQUEST['quantity'];
	
	if($cartID == "") {
		
		$status  =  1;
		$message =  "Please provide a unique CART ID.";
		
	} else {
		
		$status  = 0;
		$message = "Successfully updated this cart transaction."; 
		
		$productCartArray = array(
								  "productID"   => $productID,
								  "sizeID"      => $sizeID,
								  "quantity"    => $quantity,
								  "transDate"   => date("Y-m-d H:i:s"),
								  "dateUpdated" => date("Y-m-d H:i:s")
								  );
		
		$this->cart->edit_shopping_cart($cartID,$productCartArray);
	
	}
	
	$jsonArray = array("status" => $status, "message" => $message);
	
	echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE);
	
}

```
  
Viewing a CART transaction depending on the user

Needed variables to passed are:
- userID

```
/**
 * @title Get a cart transaction
 * @desc POST a unique USER ID to view the result in JSON format
 **/
public function get_shopping_cart() {
	
	$userID    =  $_REQUEST['userID'];
	
	if($userID == "") {
		
		$jsOnResult = "";
		$status  =  1;
		$message =  "Please provide a unique USER ID.";
		
	} else {
		
		$jsonResult = $this->cart->get_shopping_cart_user($userID);
		$status  = 0;
		$message = "Successfully display the result."; 
		
	}
	
	$jsonArray = array("status" => $status, "message" => $message, "result" => $jsonResult);
	
	echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE);
	
}

```
 
Testing the REST API using automated tests.
 
- Using cURL statement on the shell command

```

curl -k -X POST "<YOUR WEBROOT URL>system/controllers/shopping_cart/url/get_shopping_cart/" -d "userID=1";

Sample Output

{"status":0,"message":"Successfully display the result.","result":[{"cartID":"3","transDate":"2023-07-04 09:16:22","userID":"1","productID":"1","sizeID":"3","quantity":"4"},{"cartID":"2","transDate":"2023-07-04 09:12:52","userID":"1","productID":"1","sizeID":"2","quantity":"11"},{"cartID":"1","transDate":"2023-07-04 09:05:41","userID":"1","productID":"1","sizeID":"3","quantity":"3"}]}

```
	
 