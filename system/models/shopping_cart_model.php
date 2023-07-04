<?php

class Shopping_Cart_Model extends Model {
    
    private $tableName;
    private $model;
    
    public function __construct() {
        $this->model     = new Model();
        $this->tableName = PREFIX.'shop_cart_user';
    }
    
    public function add_shopping_cart($list=array()) {
        
        $this->insert($this->tableName,$list);
        
    }
    
    public function edit_shopping_cart($cartID,$list=array()) {
        $condition = new QueryGroup();
        $condition->and_query(new QueryField("cartID","=",$cartID));
        
        $this->update($this->tableName,$list, $condition);
    }
    
    public function delete_shopping_cart($cartID) {
        $condition = new QueryGroup();
        $condition->and_query(new QueryField("cartID","=",$cartID));
        
        $this->delete($this->tableName, $condition);
    }
    
    public function get_shopping_cart($cartID) {
        $condition = new QueryGroup();
        $condition->and_query(new QueryField("cartID","=",$cartID));
        
        $checkCart = $this->model->show_records(array('cartID','transDate','userID','productID','sizeID','quantity'),$this->tableName,$condition,array('cartID DESC'));
        return $checkCart;
    }
	
	 public function get_shopping_cart_user($userID) {
        $condition = new QueryGroup();
        $condition->and_query(new QueryField("userID","=",$userID));
        
        $checkCart = $this->model->show_records(array('cartID','transDate','userID','productID','sizeID','quantity'),$this->tableName,$condition,array('cartID DESC'));
        return $checkCart;
    }
    
    
    public function list_shopping_cart() {
        $checkCart = $this->model->show_records(array('cartID','transDate','userID','productID','sizeID','quantity'),$this->tableName,null,array('cartID DESC'));
        return $checkCart;
    }
    
   
    
}

?>