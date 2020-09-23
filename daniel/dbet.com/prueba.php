<!DOCTYPE html>
<html>
<head>
	<title>
		

	</title>
</head>
<body>




	<div class="product-options">
       <a  id="myWish" href=""  class="btn btn-mini" >Add to Wishlist </a>
       <a  href="#" class="btn btn-mini"> Purchase </a>
</div>

<div class="alert alert-success" id="success-alert">
       <button type="button" class="close" data-dismiss="alert">x</button>
       <strong>Success! </strong>
       Product have added to your wishlist.
</div>


<script type="text/javascript">
	  $(document).ready (function(){
               $("#success-alert").hide();
               $("#myWish").click(function showAlert() {
                   $("#success-alert").alert();
                   window.setTimeout(function () { 
                               $("#success-alert").alert('close'); }, 2000);               
                     });       
                       });

</script>



</body>
</html>