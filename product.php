<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
if(isset($_SESSION['employeefirstName'])){
	header('Location: employeedash.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>DELK's Books A Ecommerce Category Flat Bootstarp Resposive Website Template | Products :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<!-- Custom Theme files -->
<!--theme style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<!-- /start menu -->
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<!-- the jScrollPane script -->
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- //the jScrollPane script -->
  <script>
	function GetURLParameter(sParam)
	{
	    var sPageURL = window.location.search.substring(1);
	    var sURLVariables = sPageURL.split('&');
	    for (var i = 0; i < sURLVariables.length; i++)
	    {
	        var sParameterName = sURLVariables[i].split('=');
	        if (sParameterName[0] == sParam)
	        {
	            return sParameterName[1];
	        }
	    }
	}
</script>
</head>
<body>

<!--header-->
<div class="header-top">
	 <div class="header-bottom">
				<div class="logo">
					<h1><a href="index.php">DELK's Books</a></h1>
				</div>
			 <!---->
			 <div class="top-nav">
				<ul class="memenu skyblue" style="width: 120%""><li class="active"><a href="index.php">Home</a></li>
					<li class="grid"><a href="product.php">Books</a>
						<!--div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<h4>Shop</h4>
									<ul>
										<li><a href="product.html">New Arrivals</a></li>
										<li><a href="product.html">Home</a></li>

										<li><a href="product.html">Decorates</a></li>
										<li><a href="product.html">Accessories</a></li>
										<li><a href="product.html">Kids</a></li>
										<li><a href="product.html">Login</a></li>
										<li><a href="product.html">Brands</a></li>
										<li><a href="product.html">My Shopping Bag</a></li>
									</ul>
								</div>
								<div class="col1 me-one">
									<h4>Type</h4>
									<ul>
										<li><a href="product.html">Diwali Lights</a></li>
										<li><a href="product.html">Tube Lights</a></li>
										<li><a href="product.html">Bulbs</a></li>
										<li><a href="product.html">Ceiling Lights</a></li>
										<li><a href="product.html">Accessories</a></li>
										<li><a href="product.html">Lanterns</a></li>
									</ul>
								</div>
								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="product.html">Everyday</a></li>
										<li><a href="product.html">Philips</a></li>
										<li><a href="product.html">Havells</a></li>
										<li><a href="product.html">Wipro</a></li>
										<li><a href="product.html">Jaguar</a></li>
										<li><a href="product.html">Ave</a></li>
										<li><a href="product.html">Gold Medal</a></li>
										<li><a href="product.html">Anchor</a></li>
									</ul>
								</div>
							</div>
						</div>
					</li-->
					<li class="grid"><a href="#">Genres</a>
						<div class="mepanel" style="width: 115px; margin-left: 160px;">
							<div class="row">
								<div class="col1 me-one">

									<ul>
										<li><a href="product.php?genre=Fiction">Fiction</a></li>
										<li><a href="product.php?genre=Non-Fiction">Non-Fiction</a></li>
										<li><a href="product.php?genre=Children">Children</a></li>
										<li><a href="product.php?genre=Lifestyle">Lifestyle</a></li>
										<li><a href="product.php?genre=Textbook">Textbook</a></li>

									</ul>
								</div>
								<!--div class="col1 me-one">
									<h4>Type</h4>
									<ul>
										<li><a href="product.html">Diwali Lights</a></li>
										<li><a href="product.html">Tube Lights</a></li>
										<li><a href="product.html">Bulbs</a></li>
										<li><a href="product.html">Ceiling Lights</a></li>
										<li><a href="product.html">Accessories</a></li>
										<li><a href="product.html">Lanterns</a></li>
									</ul>
								</div>
								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="product.html">Everyday</a></li>
										<li><a href="product.html">Philips</a></li>
										<li><a href="product.html">Havells</a></li>
										<li><a href="product.html">Wipro</a></li>
										<li><a href="product.html">Jaguar</a></li>
										<li><a href="product.html">Ave</a></li>
										<li><a href="product.html">Gold Medal</a></li>
										<li><a href="product.html">Anchor</a></li>
									</ul>
								</div-->
							</div>
						</div>
					</li>
					<!--li class="grid"><a href="typo.html">Typo</a></li-->
					<li class="grid"><a href="about.php">About</a>
					<!--
					<div class="mepanel" style="width: 115px; margin-left: 265px;">
							<div class="row">
								<div class="col1 me-one">
									<ul>
										<li><a href="product.html">Contact</a></li>
										<li><a href="product.html">About Us</a></li>
									</ul>
								</div>
								</div>
								</div>-->
					</li>
					<?php
					if(isset($_SESSION["firstName"])){
						echo '<li class="grid"><a href="member.php">Account</a> </li>';
						echo '<div style="margin-top: 3%; margin-left: 80%;"> Welcome Customer ' . $_SESSION["firstName"] . ' ' . $_SESSION["lastName"] . '   (<a href="login.php?logout=true">Logout</a>) </div>' ;
					}else if(isset($_SESSION["employeefirstName"])){
						echo '<li class="grid"><a style="width: 130px; height: 97px;" href="member.php">Employee Dashboard </a> </li>';
						echo '<div style="margin-top: 3%; margin-left: 80%;"> Welcome Employee ' . $_SESSION["employeefirstName"] . ' ' . $_SESSION["employeelastName"] . '   (<a href="login.php?logout=true">Logout</a>) </div>' ;
					}else{
						echo '<div style="margin-top: 5.5%; margin-left: 50%;"> <a href="account.php">Sign Up</a>	or  <a href="login.php">Log In</a></div>';
					}
					?>
					<!--<li class="grid"><a href="account.php">Sign Up</a>
					</li>
					<li class="grid"><a href="login.html">Log In</a>
					</li>-->
				</ul>
			 </div>
			 <!---->
			 <!--
			 <div class="cart box_1">
				 <a href="checkout.html">
					<div class="total">
					<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span>)</div>
					<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
				</a>
				<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
			 	<div class="clearfix"> </div>
			 </div>
			 <div class="clearfix"> </div>
			 <!---->
			<!-- </div> -->
			<div class="clearfix"> </div>
</div>
<!--header//-->
<div class="product-model">
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Products</li>
		 </ol>
			<h2>Our Products</h2>
		 <div id="books" class="col-md-9 product-model-sec">
		 <script>
$.post("books.php",
      function(data,status){

            var arr = JSON.parse(data);
            //alert(JSON.stringify(arr));
            var param = GetURLParameter('genre');
            //alert(param);
            if(param == null) {
            for(var i =0; i < arr.length; i++){

            var cartitem = "<a href='single.php?book="+ arr[i].ISBN +"'><div class='product-grid'><div class='more-product'><span> </span></div>						<div class='product-img b-link-stripe b-animate-go  thickbox'><img src='" + arr[i].PicturePath +"'' class='img-responsive' alt=''><div class='b-wrapper'><h4 class='b-animate b-from-left  b-delay03'>							<button><span class='glyphicon glyphicon-zoom-in' aria-hidden='true'></span>More Info</button></h4></div></div></a><div class='product-info simpleCart_shelfItem'><div class='product-info-cust prt_name'><h4>"+arr[i].Title+"</h4> <span class='item_price'>$"+arr[i].Price+"</span><div class='ofr'><h4>" + arr[i].Author + "</div><div class='clearfix'> </div></div></div></div>";
            $("#books").append(cartitem);
        //}
        }
    }
    		else {
    			for(var i =0; i < arr.length; i++){
    				if(arr[i].Genre == param ){
           var cartitem = "<a href='single.php?book="+ arr[i].ISBN +"'><div class='product-grid'><div class='more-product'><span> </span></div>						<div class='product-img b-link-stripe b-animate-go  thickbox'><img src='" + arr[i].PicturePath +"'' class='img-responsive' alt=''><div class='b-wrapper'><h4 class='b-animate b-from-left  b-delay03'>							<button><span class='glyphicon glyphicon-zoom-in' aria-hidden='true'></span>More Info</button></h4></div></div></a><div class='product-info simpleCart_shelfItem'><div class='product-info-cust prt_name'><h4>"+arr[i].Title+"</h4> <span class='item_price'>$"+arr[i].Price+"</span><div class='ofr'><h4>" + arr[i].Author + "</div><div class='clearfix'> </div></div></div></div>";
            $("#books").append(cartitem);
        }
    		}
    	}
       });

</script>
					<!--  <a href="single.html"><div class="product-grid">
						<div class="more-product"><span> </span></div>
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="images/Humans_of_New_York.jpg" class="img-responsive" alt="">
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">
							<button><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
							</h4>
							</div>
						</div></a>
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name">
								<h4>Lights #1</h4>
								<span class="item_price">$187.95</span>
								<div class="ofr">
								  <p class="pric1"><del>Rs 280</del></p>
						          <p class="disc">[12% Off]</p>
								</div>
								<input type="text" class="item_quantity" value="1" />
								<input type="button" class="item_add items" value="ADD">
								<div class="clearfix"> </div>
							</div>

						</div>
					</div>	 -->

			<!--
			</div>

			<div class="rsidebar span_1_of_left">
				 <section  class="sky-form">
					 <div class="product_right">
						 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
						 <div class="tab1">
							 <ul class="place">
								 <li class="sort">Home Decorates</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">
									<a href="#"><p>Lanterns</p></a>
									<a href="#"><p>Wall Lamps</p></a>
									<a href="#"><p>Table Lamps</p></a>
									<a href="#"><p>Selling Lamps</p></a>
						     </div>
					      </div>
						  <div class="tab2">
							 <ul class="place">
								 <li class="sort">Festive Needs</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">
									<a href="#"><p>Lanterns</p></a>
									<a href="#"><p>Disco Lights</p></a>
						     </div>
					      </div>
						  <div class="tab3">
							 <ul class="place">
								 <li class="sort">Kitchen & Dining</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">
									<a href="#"><p>Lights & Lamps</p></a>
						     </div>
					      </div>
						  <div class="tab4">
							 <ul class="place">
								 <li class="sort">Books</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">
									<a href="#"><p>Standing Lamps</p></a>
									<a href="#"><p>Lamps</p></a>
									<a href="#"><p>Led Lamps</p></a>
						     </div>
					      </div>
						  <div class="tab5">
							 <ul class="place">
								 <li class="sort">Automotive</li>
								 <li class="by"><img src="images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">
									<a href="#"><p>Car Lights</p></a>
									<a href="#"><p>Stick Lights</p></a>
									<a href="#"><p>Thread Lights</p></a>
						     </div>
					      </div>

						  <!--script-->
						<!--
						<script>
							$(document).ready(function(){
								$(".tab1 .single-bottom").hide();
								$(".tab2 .single-bottom").hide();
								$(".tab3 .single-bottom").hide();
								$(".tab4 .single-bottom").hide();
								$(".tab5 .single-bottom").hide();

								$(".tab1 ul").click(function(){
									$(".tab1 .single-bottom").slideToggle(300);
									$(".tab2 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab2 ul").click(function(){
									$(".tab2 .single-bottom").slideToggle(300);
									$(".tab1 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab3 ul").click(function(){
									$(".tab3 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
								$(".tab4 ul").click(function(){
									$(".tab4 .single-bottom").slideToggle(300);
									$(".tab5 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
								$(".tab5 ul").click(function(){
									$(".tab5 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
							});
						</script>
						<!-- script -->
				<!-- </section> -->
				 <!--
				 <section  class="sky-form">
					 <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>DISCOUNTS</h4>
					 <div class="row row1 scroll-pane">
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Upto - 10% (20)</label>
						 </div>
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>40% - 50% (5)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
						 </div>
					 </div>
				 </section>  -->
				  <!--
				 <section  class="sky-form">
						<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Price</h4>
							<ul class="dropdown-menu1">
								 <li><a href="">
								<div id="slider-range"></div>
								<input type="text" id="amount" style="border: 0; font-weight: NORMAL;   font-family: 'Dosis-Regular';" />
							 </a></li>
						  </ul>
				   </section>
				   <!---->
				   <!--
					 <script type="text/javascript" src="js/jquery-ui.min.js"></script>
					 <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
					<script type='text/javascript'>//<![CDATA[
					$(window).load(function(){
					 $( "#slider-range" ).slider({
								range: true,
								min: 0,
								max: 500,
								values: [ 10, 100 ],
								slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
								}
					 });
					$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

					});//]]>
					</script>
					 <!---->

				 <!--
				 <section  class="sky-form">
						<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Type</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Lights (30)</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diwali Lights   (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Tube Lights      (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>LED Lights        (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Bulbs  (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Ceiling Lights  (30)</label>
								</div>
							</div>
				   </section>
				   <section  class="sky-form">
						<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Brand</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Everyday</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anchor</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Philips</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Wipro</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Havells</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Ferolex</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Gold Medal</label>
								</div>
							</div>
				   </section>
			 </div>
	      </div> -->
		</div>
</div>
<!--
<div class="subscribe">
	 <div class="container">
		 <h3>Newsletter</h3>
		 <form>
			 <input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
			 <input type="submit" value="Subscribe">
		 </form>
	 </div>
</div>
<!---->
<div class="footer">
	 <div class="container">
		 <div class="footer-grids">
			 <div class="col-md-3 about-us">
				 <h3>About Us</h3>
				 <p>We sell books. You buy our books. Everyone is happy.</p>
			 </div>
			<div class="col-md-3 ftr-grid">
					<h3>Information</h3>
					<ul class="nav-bottom">
					  <?php
				if(isset($_SESSION['employeefirstName']) || isset($_SESSION['firstName'])){
				}else{
				echo	'<li><a href="login.php">Login</a></li>';
			 }
			 ?>
						<li><a href="about.php">About</a></li>
					</ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
					<h3>Categories</h3>
					<ul class="nav-bottom">
						<li><a href="product.php?genre=Fiction">Fiction</a></li>
						<li><a href="product.php?genre=Non-Fiction">Non-Fiction</a></li>
						<li><a href="product.php?genre=Children">Children</a></li>
						<li><a href="product.php?genre=Lifestyle">Lifestyle</a></li>
						<li><a href="product.php?genre=Textbook">Textbook</a></li>
					</ul>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<div class="copywrite">
	 <div class="container">
		 <div class="copy">
			 <p>© 2015 DELK's Books. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
		 </div>
		 <div class="social">
				<a href="#"><i class="facebook"></i></a>
				<a href="#"><i class="twitter"></i></a>
				<a href="#"><i class="dribble"></i></a>
				<a href="#"><i class="google"></i></a>
				<a href="#"><i class="youtube"></i></a>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!---->
</body>
</html>
