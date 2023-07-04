$(document).ready(function(){

// Display results from Product API	
function display_results() {
$.getJSON("https://3sb655pz3a.execute-api.ap-southeast-2.amazonaws.com/live/product", 
	function (data) {
		
	if (data != null) {	 
	
		$('#cartTitle').text(data.title);
		$('#cartDescription').text(data.description);
		$('#cartPrice').text(data.price);
		$('#cartImageText').text(data.imageURL);
		$("#cartImage").attr('src',data.imageURL);
		
		var sizeOptionsRes = data.sizeOptions;
		
		for (var i = 0; i < sizeOptionsRes.length; i++) {
			$("#showSizeButtons").append("<a href='#s"+sizeOptionsRes[i].label+"' id='s"+sizeOptionsRes[i].label+"' class='btn btn-primary btn-sm me-1 mb-3 sizeoptions'>"+sizeOptionsRes[i].label+"</a>  ");
		}
	}						
});

}
	
display_results();

// Click Add to Cart
var countQuantity = 1;
$('#cartButton').on('click', function (e) {	 
	
	var hashLink = location.hash;
	var hashValue = hashLink.substring(1, hashLink.length); 
	var sizeValue = hashLink.substring(2, hashLink.length);
		
	var cartTitleSummary = $("#cartTitle").html();
    var cartPriceSummary = $("#cartPrice").html();
	var cartImageSummary = $("#cartImageText").html();
	
	$("#cartTitleSummary"+sizeValue).text(cartTitleSummary);
	$("#cartImageSummary"+sizeValue).attr('src',cartImageSummary);
	$("#cartPriceSummary"+sizeValue).text(cartPriceSummary * countQuantity);
	
	var cartQuantity = countQuantity;
	var cartQuantitySummary = $("#quantity"+sizeValue).val(cartQuantity);
		
	if( hashLink ) {
      
	  if( !$("#showItems").find(hashLink).length ) {
         	
		$("#showItems").append("<ul id='"+hashValue+"' class='list-group list-group-flush'><li class='list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0'><img id='cartImageSummary"+sizeValue+"' style='width:50px;height:70px;'/> "+
		                      "<p id='cartTitleSummary"+sizeValue+"'></p></li> <li class='list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0'>Price:<span id='cartPriceSummary"+sizeValue+"'></span></li> "+
							  "<li class='list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0'>Size:<span class='sSize left'>"+sizeValue+"</span></li> "+
							  "<li class='list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0'>Quantity:<span> "+ 
                              "<input min='0' id='quantity"+sizeValue+"' name='quantity' value='"+countQuantity+"' type='number' class='smalltextbox'/></span></li></ul><br/>");					
		
		
	  }
	  
	  countQuantity++;
	  
	} else {

		$("<div id='dialog'><p>Please select an item/size.</p></div>").dialog({
			title: 'ERROR',
			buttons : [
						{
						text:'Close this dialog',
						click: function() {
							$(this).dialog("close");             
						}                   
						}]});

		
	}
		
});
 
});