<?php
class CShopping {
	
	public function __construct($data=NULL) {
		$this->data = $data;
		$this->cart = new Shopping_Cart_Model();
	}
	
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
	
}
?>