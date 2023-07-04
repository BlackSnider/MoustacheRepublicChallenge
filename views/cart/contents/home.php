<section class="h-100 gradient-custom">
  <div class="container py-4">
    <div class="row d-flex justify-content-center my-4">
      
	  <div class="col-md-8">
        <div class="card mb-4">
          
		  <div class="card-header py-3">
            <h5 class="mb-0">Simple Product Details - Moustache Republic Challenge</h5>
          </div>
          
		  <div class="card-body">
            
            <div class="row">
              <div class="col-lg-8 col-md-12 mb-4 mb-lg-0">
               
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <img id="cartImage" src="#" class="w-100" alt="#" />
                  <a href="#">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
				  <p id="cartImageText"></p>
                </div>
             
              </div>

              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
               
                <p><h3 id="cartTitle"></h3></p>
                
				<p id="cartDescription"></p>
				
				<p>Price: <strong id="cartPrice"></strong></p>
				
                <p>Sizes:</p>
                
				<span id="showSizeButtons"></span>
				
				<input type="hidden" id="sSizeType" value="0"/>
			
				<button id="cartButton" type="button" class="btn btn-default btn-lg btn-block">Add to Cart</button>
				                
              </div>

            
            </div>
            
            <hr class="my-4" />
			
          </div>
		  
        </div>
       
      </div>
      
	  <!-- Mini Cart Section -->
	  <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">My Cart</h5>
          </div>
          <div class="card-body">
		  
		    <div id="showItems"></div>
           
            <button type="button" class="btn btn-default btn-lg btn-block">
               Proceed to Checkout
            </button>
			
          </div>
        </div>
      </div>
	  
	  
    </div>
  </div>
</section>