<?php
include('include/connection.php'); // Ensure this line is correct and points to your connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize
    $user_name = mysqli_real_escape_string($connection, $_POST['reserv_name']);
    $email = mysqli_real_escape_string($connection, $_POST['reserv_email']);
    $date = mysqli_real_escape_string($connection, $_POST['datepicker']);
    $phone = mysqli_real_escape_string($connection, $_POST['reserv_phone']);
    $time = mysqli_real_escape_string($connection, $_POST['reserv_time']);
    $persons = mysqli_real_escape_string($connection, $_POST['reserv_persons']);

    // SQL query to insert data into the reservation table
    $sql = "INSERT INTO reservation (user_name, email, date, phone, time, person,confirm) 
            VALUES ('$user_name', '$email', '$date', '$phone', '$time', '$persons',0)";

    // Execute the query
    if ($connection->query($sql) === TRUE) {
        //echo "New reservation created successfully";
        // Optionally, redirect to a success page
        // header('Location: success.php');
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }


	error_reporting(E_ALL);
	ini_set('display_errors', 1);


}
?>












<!DOCTYPE html>
<html><head>
    <title>Welcome to Verdant</title>
	 
    <meta name="keywords" content="">
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<link rel="icon" type="image/png" href="images/favicon-pearl.png">
	
    <!--main file-->
	<link href="css/pearl-restaurant.css" rel="stylesheet" type="text/css">
    
    <!--Medical Guide Icons-->
	<link href="fonts/pearl-icons.css" rel="stylesheet" type="text/css">
	
	<!-- Default Color-->
	<link href="css/default-color.css" rel="stylesheet" id="color"  type="text/css">
    
    <!--bootstrap-->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    
    <!--Dropmenu-->
	<link href="css/dropmenu.css" rel="stylesheet" type="text/css">
    
	<!--Sticky Header-->
	<link href="css/sticky-header.css" rel="stylesheet" type="text/css">
	
	<!--Sticky Countdown-->
	<link href="css/countdown.css" rel="stylesheet" type="text/css">
	
	<!--revolution-->
	<link href="css/settings.css" rel="stylesheet" type="text/css">    
    <link href="css/extralayers.css" rel="stylesheet" type="text/css">    
   
    <!--Owl Carousel-->
	<link href="css/owl.carousel.css" rel="stylesheet" type="text/css">    
	
	<!--Date Picker-->
	<link href="css/date-pick.css" rel="stylesheet" type="text/css">    
	
	<!--Form Dropdown-->
	<link href="css/form-dropdown.css" rel="stylesheet" type="text/css">    
	
    <!-- Mobile Menu -->
	<link rel="stylesheet" type="text/css" href="css/jquery.mmenu.all.css" />
	
	<!--PreLoader-->
	<link href="css/loader.css" rel="stylesheet" type="text/css">    
   
    <!--switcher-->
	<link href="css/switcher.css" rel="stylesheet" type="text/css">	
	
</head>
  <body>
    
	
  <div id="wrap">
   
   <!--Start PreLoader-->
   <div id="preloader">
		<div id="status">&nbsp;</div>
		<div class="loader">
			<h1>Loading...</h1>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!--End PreLoader--> 

  
   <!--Start Header-->
	<div id="header-1">
       <header class="header-two">
		   <div class="container">
	   		<a href="index.html"><img class="logo2" src="images/logo2.png" alt=""></a>
			<a href="index.html"><img src="images/logo-dark.png" alt="" class="logo-dark img-responsive"></a>
			
			<div class="cont-right">
			
            <nav class="menu-5 nav">
            	<ul class="wtf-menu">
                	<li class="select-item"><a href="index.html">Home</a></li>
					
					<li><a href="menu.html">Menu</a></li>
					
					<li><a href="our-story.html">our story</a></li>
					
					<li class="parent"><a href="blog.html">Blog</a></li>

					<li><a href="contact-us.html">contact us</a></li>
					
					<li><a href="shop.html">online order</a></li>
					
					<li><a href="admin-login.html">admin login</a></li>
                </ul>	
            </nav>
            
			<ul class="social-icons">
				<li><a href="#."><i class="icon-facebook-1"></i></a></li>
				<li><a href="#."><i class="icon-twitter-1"></i></a></li>
				<li><a href="#."><i class="icon-google"></i></a></li>
			</ul>
				
			<ul class="get-touch">
				<li class="contact-no"><a><i class="icon-telephone-receiver"></i> <span>+94 77 123 4567</span></a></li>
			</ul>
			
			</div>
		</div>
	
       </header>
	</div>
    
   <!--End Header-->
	
	
	
	<!-- Mobile Menu Start -->
	<div class="container">
    <div id="page">
			<header class="header">
				<a href="#menu"></a>
				
			</header>
			
			<nav id="menu">
				<ul>
					<li class="select"><a href="index.html">Home</a>  </li>
					<li><a href="menu.html">Fresh Menu</a>  </li>
					<li><a href="our-story.html">Our Story</a></li>
                    <li><a href="blog.html">Blog</a>  </li>
					<li><a href="contact-us.html">Contact Us</a> </li>
					<li><a href="shop.html">Order Online</a></li>
					<li><a href="index.html#reserve">Book a Table</a></li>
				</ul> 
			</nav>
	  </div>
	</div>
    <!-- Mobile Menu End -->
	
	
	
	
	
	
	
	
	
	
	<!--Start Banner-->
   
   <div class="tp-banner-container">
		<div class="tp-banner" >
			<ul>
    	<!-- SLIDE  -->	
	
    
		<li data-transition="fade" data-slotamount="7" data-masterspeed="500"  data-saveperformance="on"  data-title="Intro Slide">
		
		<img src="images/slides/banenr-img1.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">


		
		<div class="tp-caption arrowicon customin  rs-parallaxlevel-10"
			data-x="center"
			data-y="380" 
			data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="850"
			data-start="1500"
			data-easing="Power3.easeInOut"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			data-endspeed="1000"
			style=""><img src="images/slides/flower.png" alt="" >
		</div>
		
		
		<div class="tp-caption grey_heavy_72 customin tp-resizeme rs-parallaxlevel-10"
			data-x="center"
			data-y="456" 
			data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="850"
			data-start="2500"
			data-easing="Power3.easeInOut"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"	
			data-endspeed="1000"
			style="font-size:72px; z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">Art of Cooking
		</div>

		
		<div class="tp-caption grey_regular_18 customin tp-resizeme rs-parallaxlevel-0"
			data-x="center"
			data-y="538" 
			data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="500"
			data-start="3500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.05"
			data-endelementdelay="0.1"
			style="font-size:28px; z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><div style="text-align:left;">The Best restaurant in town</div>
		</div>
		
	</li>
	
	
	<li data-transition="fade" data-slotamount="7" data-masterspeed="500"  data-saveperformance="on"  data-title="Intro Slide">
		
		<img src="images/slides/banenr-img2.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">


		
		<div class="tp-caption grey_heavy_72 customin tp-resizeme rs-parallaxlevel-10"
			data-x="0"
			data-y="376" 
			data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="850"
			data-start="2500"
			data-easing="Power3.easeInOut"
			data-splitin="chars"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			style="font-size:72px; z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">quality food
		</div>

		
		<div class="tp-caption grey_regular_18 customin tp-resizeme rs-parallaxlevel-0"
			data-x="0"
			data-y="468" 
			data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="500"
			data-start="3500"
			data-easing="Power3.easeInOut"
			data-splitin="chars"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			style="font-size:28px; z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><div style="text-align:left;">fine food & dining since 1880</div>
		</div>
		
		
		<div class="tp-caption grey_regular_18 customin tp-resizeme rs-parallaxlevel-0"
			data-x="0"
			data-y="560" 
			data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="800"
			data-start="5900"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.05"
			data-endelementdelay="0.1"
			style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><div style="text-align:left;">
			<a href="#book-table" class="read-more" style=" line-height: initial; color: #fff;  border:solid 2px #fff; text-transform: uppercase; font-weight: 500; letter-spacing: 0px; padding: 16px 36px; display: inline-block; font-size: 18px;">Book your table</a>
			</div>
		</div>
		
		
		
	</li>
	
	
	<li data-transition="fade" data-slotamount="7" data-masterspeed="500"  data-saveperformance="on"  data-title="Intro Slide">
		
		<img src="images/slides/banenr-img3.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">


		
		<div class="tp-caption arrowicon customin  rs-parallaxlevel-10"
			data-x="center"
			data-y="330" 
			data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="850"
			data-start="1500"
			data-easing="Power3.easeInOut"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			data-endspeed="1000"
			style=""><img src="images/slides/flower.png" alt="" >
		</div>
		
		
		<div class="tp-caption grey_heavy_72 customin tp-resizeme rs-parallaxlevel-10"
			data-x="center"
			data-y="406" 
			data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="850"
			data-start="2500"
			data-easing="Power3.easeInOut"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"	
			data-endspeed="1000"
			style="font-size:72px; z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">real taste real food
		</div>

		
		<div class="tp-caption grey_regular_18 customin tp-resizeme rs-parallaxlevel-0"
			data-x="center"
			data-y="498" 
			data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="500"
			data-start="3500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.05"
			data-endelementdelay="0.1"
			style="font-size:28px; z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><div style="text-align:left;">the passion for the perfect taste</div>
		</div>
		
		
		<div class="tp-caption grey_regular_18 customin tp-resizeme rs-parallaxlevel-0"
			data-x="center"
			data-y="580" 
			data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="800"
			data-start="4200"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.05"
			data-endelementdelay="0.1"
			style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><div style="text-align:left; ">
			<a href="shop.html" class="read-more" style=" line-height: initial; color: #fff; border:solid 2px #fff; text-transform: uppercase; font-weight: 500; letter-spacing: 0px; padding: 16px 36px; display: inline-block; font-size: 18px;">online order</a>
			</div>
		</div>
		
		
	</li>
	
	
	
	
    
</ul>
<div class="tp-bannertimer"></div>	</div>
<div class="wave"></div>
</div>		
   
   <!--End Banner-->
   
   
   
   <!--Start Content-->
   <div class="content">
		
		
		<!--Start Services-->
		<div class="services">
			<div class="container">
				
				<div class="row">
				<div class="col-md-12">
					<div class="main-title">
					<span>Introduction</span>
					<h1>Our Services</h1>
					<p>At Verdant, we offer an exquisite blend of authentic Sri Lankan, Indian, Italian and Continental cuisines, crafted with the freshest ingredients to deliver a truly global dining experience.</p>
					</div>
				</div>
				</div>

				<div class="row">
                	
					<div class="col-md-4">
						<div class="serv-main-sec">
						<div class="service-sec-top-bg"></div>
						<div class="service-sec">
							<i class="icon-restaurant14"></i>
							<h6>Special Menu</h6>
							<p>Curated dishes from Sri Lankan, Indian, Vietnamese, and Continental cuisines to tantalize your taste buds.</p>
</div>
						<div class="service-sec-bottom-bg"></div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="serv-main-sec serv-main-sec2">
						<div class="service-sec-top-bg"></div>
						<div class="service-sec">
							<i class="icon-cups7"></i>
							<h6>Elegant interior</h6>
							<p>Experience dining in a refined and cozy atmosphere that reflects the essence of our global cuisine.</p>
</div>
						<div class="service-sec-bottom-bg"></div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="serv-main-sec">
						<div class="service-sec-top-bg"></div>
						<div class="service-sec">
							<i class="icon-barbecue9"></i>
							<h6>Fresh & Hot Food</h6>
							<p>Savor every bite with dishes prepared fresh, using the finest ingredients, served piping hot.</p>
</div>
						<div class="service-sec-bottom-bg"></div>
						</div>
					</div>
					
					
				</div>	

			</div>
		</div>
		<!--End Services-->
		
		
		
		
		<!--Start Master of Town-->
		<div class="master-town">
			
				<div class="parallax">
					<div class="detail">
						<h1><span>&ldquo;</span>Crafting fresh and healthy flavors, one dish at a time.<span>&rdquo;</span></h1>
					</div>
				</div>
		
		</div>
		<!--End Master of Town-->
		
		
		
		
		<!--Start Our Stiry-->
			<div class="our-story">
				<div class="container">
					<div class="row">
						
						<div class="col-md-6">
							<div class="story-detail">
							<div class="main-title">
								<span>Discover</span>
								<h1>our story</h1>
							</div>
							<p>At Verdant, every dish tells a story. From our roots in Sri Lanka to the fusion of international flavors, we celebrate the joy of dining with family and friends. Join us on a culinary journey where tradition meets innovation, creating memories that last a lifetime.</p>
							<a href="our-story.html" class="full-story">view full story</a>
							</div>
						</div>
						
						<div class="col-md-6">
							<img src="images/our-story.jpg" alt="">
						</div>
						
					</div>
				</div>
			</div>
		<!--End Our Stiry-->
		
		
		
		
		<!--Start Upcoming Event-->
		<div class="upcoming-event">
			
				
				<div class="parallax parallax-event">
				
					<div class="detail">
					
						<div class="container">
						
						<div class="row">
						<div class="col-md-12">
							<div class="main-title-white">
							<span>Don’t Miss</span>
							<h1>UPCOMING EVENTS</h1>
							</div>
						</div>
						</div>
						<div class="event-detail">
							<div class="row">								
								<div class="col-md-4">
									<img src="images/event-img.jpg" alt="">
								</div>
								
								<div class="col-md-8">
									<div class="event-text">
										<h6>How to Properly Use Spices</h6>
										<span><i class="icon-clock"></i> April 22, 2024 / 8:30 pm - 11:00 pm</span>
										<p>Join us for an exclusive culinary experience where we'll explore the art of spice. Discover the secrets behind perfectly seasoned dishes, and elevate your cooking skills to new heights. Reserve your spot and be part of an unforgettable evening filled with flavor and inspiration. </p>
</div>
								</div>								
			  				</div>
						</div>
						
						</div>
					
					</div>
				
				</div>
		
		</div>
		<!--End Upcoming Event-->
		
		
		
		
		
		<!--Start Today Food-->
			<div class="today-food">
				<div class="container">
					<div class="row">
						
						<div class="col-md-6">
							<img src="images/today-special.jpg" alt="">
						</div>
						
						<div class="col-md-6">
							<div class="special-food">
							<div class="main-title">
								<span>Today’s</span>
								<h1>SPECIALS food</h1>
							</div>
							
							<div class="food-detail">
								<span class="title">Grilled Chicken with Avocado &amp; Sun-dried Tomato Salad <span class="price">$32</span></span>
								<span class="tags">Chicken   /   Avocado    /   Sun-dried Tomatoes   /   Cheese    /   Greens</span>
							</div>
							
							</div>
						</div>
						
						
					</div>
				</div>
			</div>
		<!--End Today Food-->
		
		
		
		
		
		<!--Start Book Table-->
		<div id="book-table"></div>
    <div class="height35"></div>
    <div class="book-table">
        <div class="parallax parallax-book-table">
            <div class="detail">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div id="reserve" class="main-title">
                                <span>Book a Table</span>
                                <h1>Reservation</h1>
                            </div>

                            <div class="booking-form">
                                <p class="error" id="reserv_error" style="display:none;"></p>
                                <p class="success" id="reserv_success_msg" style="display:none;">Thank You! We will contact you shortly.</p>

                                <!-- Reservation Form -->
                                <form name="reserv_form" id="reserv_form" method="post" action="index.php">
                                    <div class="col-md-6">
                                        <div class="field">
                                            <input name="reserv_name" id="reserv_name" type="text" value="Your Name" onblur="if(this.value == '') { this.value='Your Name'}" onfocus="if (this.value == 'Your Name') {this.value=''}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field">
                                            <input type="text" id="datepicker" placeholder="Choose A Date" name="datepicker" onblur="if(this.value == '') { this.value='Choose A Date'}" onfocus="if (this.value == 'Choose A Date') {this.value=''}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field basic-example2">
                                            <select class="basic-example" id="reserv_time" name="reserv_time" required>
                                                <option value="">Choose A Time</option>
                                                <option value="9:00am to 12:00pm">9:00am to 12:00pm</option>
                                                <option value="12:00pm to 3:00pm">12:00pm to 3:00pm</option>
                                                <option value="3:00pm to 6:00pm">3:00pm to 6:00pm</option>
                                                <option value="6:00pm to 9:00pm">6:00pm to 9:00pm</option>
                                                <option value="9:00pm to 12:00am">9:00pm to 12:00am</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field">
                                            <select class="basic-example" name="reserv_persons" id="reserv_persons" required>
                                                <option value="">Persons</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5+">5+</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field">
                                            <input name="reserv_email" id="reserv_email" type="email" value="Email Address" onblur="if(this.value == '') { this.value='Email Address'}" onfocus="if (this.value == 'Email Address') {this.value=''}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field">
                                            <input name="reserv_phone" id="reserv_phone" type="tel" value="Phone No" onblur="if(this.value == '') { this.value='Phone No'}" onfocus="if (this.value == 'Phone No') {this.value=''}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="submit" value="Book a table">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Book Table -->
		
		
		
		
		
		<!--Start Latest News-->
   <div class="latest-news">
   		<div class="container">
        	
            <div class="row">
	        <div class="col-md-12">
            
                <div class="main-title">
					<span>Latest Posts</span>
					<h1>From the Blog</h1>
				</div>
            
            </div>
            </div>
            
           
           
           
            <div id="latest-news">
        <div class="container">
          <div class="row">
            <div class="span12">

              <div id="owl-demo" class="owl-carousel">

                <div class="post item">
                    	<img class="lazyOwl" src="images/news-img1.jpg" alt="">
                        <div class="detail">
                        	<img src="images/news-cheff1.jpg" alt="">
                            <h5><a href="blog-detail.html">Spicy Delights</a></h5>
                            <p>Discover the bold flavors of our spicy dishes, crafted with rich spices and aromatic herbs to tantalize your taste buds.</p>
                            <span><i class="icon-clock"></i> Apr 22, 2024</span>
                            <span class="comment"><a href="blog-detail.html"><i class="icon-icons206"></i> 5 Comments</a></span>
                        </div>
                  </div>
                <div class="post item">
                    <img class="lazyOwl" src="images/news-img2.jpg" alt="">
                    <div class="detail">
                        <img src="images/news-cheff2.jpg" alt="">
                        <h5><a href="blog-detail.html">Grilled Perfection</a></h5>
                        <p>Enjoy our expertly grilled dishes, featuring succulent meats and vibrant vegetables for a satisfying meal.</p>
                        <span><i class="icon-clock"></i> Apr 09, 2024</span>
                        <span class="comment"><a href="blog-detail.html"><i class="icon-icons206"></i> 3 Comments</a></span>
                    </div>
                </div>
                
                <div class="post item">
                    <img class="lazyOwl" src="images/news-img3.jpg" alt="">
                    <div class="detail">
                        <img src="images/news-cheff3.jpg" alt="">
                        <h5><a href="blog-detail.html">Fresh Garden Salad</a></h5>
                        <p>Savor the crisp and refreshing taste of our Fresh Salad, made with the finest seasonal produce.</p>
                        <span><i class="icon-clock"></i> Mar 28, 2024</span>
                        <span class="comment"><a href="blog-detail.html"><i class="icon-icons206"></i> 0 Comments</a></span>
                    </div>
                </div>
                
                <div class="post item">
                    <img class="lazyOwl" src="images/news-img4.jpg" alt="">
                    <div class="detail">
                        <img src="images/news-cheff2.jpg" alt="">
                        <h5><a href="blog-detail.html">Couple Area</a></h5>
                        <p>Create lasting memories in our intimate Couple Area, designed for a perfect dining experience with your special someone.</p>
                        <span><i class="icon-clock"></i> Mar 15, 2024</span>
                        <span class="comment"><a href="blog-detail.html"><i class="icon-icons206"></i> 0 Comments</a></span>
                    </div>
                </div>
                
                <div class="post item">
                    <img class="lazyOwl" src="images/news-img5.jpg" alt="">
                    <div class="detail">
                        <img src="images/news-cheff1.jpg" alt="">
                        <h5><a href="blog-detail.html">Freshly Sourced Ingredients</a></h5>
                        <p>Experience the difference with our hand-picked, farm-fresh ingredients that elevate every dish to a new level of flavor.</p>
                        <span><i class="icon-clock"></i> Mar 04, 2024</span>
                        <span class="comment"><a href="blog-detail.html"><i class="icon-icons206"></i> 11 Comments</a></span>
                    </div>
                </div>    

              </div>

            </div>
          </div>
        </div>

    </div>
    
    
            
        </div>
   </div>
   <!--End Latest News-->
   
		
	


	
	<!--Start Customer Words-->
		<div class="customer-words">
			
				<div class="parallax parallax-customer-words">
					<div class="detail">
						
						<div class="main-title-white">
							<span>Some Words</span>
							<h1>FROM CUSTOMERS</h1>
						</div>
						
						<div id="testimonials">
							<div class="container">
								<div class="row">

									<div class="col-md-12">
									<div class="span12">

										<div id="owl-demo2" class="owl-carousel">

										<div class="testi-sec">
										<img src="images/testimonial-img1.jpg" alt="">
										<div class="height35"></div>
										<span class="name">Sarah Thompson</span> 
										<span class="work">Food Blogger</span>
										<div class="height20"></div>
										<p>"Verdant offers an exceptional culinary experience! The blend of authentic Sri Lankan spices with fresh ingredients in every dish is a delightful treat. Highly recommend!"</p>
										<div class="height20"></div>
										<div class="rating">
											<i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i>
										</div>
										</div>
										
										<div class="testi-sec">
										<img src="images/testimonial-img2.jpg" alt="">
										<div class="height35"></div>
										<span class="name">Michael Brown</span> 
										<span class="work">Entrepreneur</span>
										<div class="height20"></div>
										<p>"From the elegant interiors to the rich flavors in their dishes, Verdant stands out as a gem in the city’s dining scene. The attention to detail is truly remarkable." </p>
										<div class="height20"></div>
										<div class="rating">
											<i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i>
										</div>
										</div>
										
										<div class="testi-sec">
										<img src="images/testimonial-img3.jpg" alt="">
										<div class="height35"></div>
										<span class="name">Emily Carter</span> 
										<span class="work">Travel Enthusiast</span>
										<div class="height20"></div>
										<p>"I’ve traveled the world and tasted various cuisines, but Verdant’s combination of Sri Lankan, Indian, and Continental dishes is unmatched. A must-visit for any food lover!"</p>
										<div class="height20"></div>
										<div class="rating">
											<i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i>
										</div>
										</div>


										</div>

									</div>
									</div>

								</div>
							</div>
						</div>
						
					</div>
				</div>
		
		</div>
		<!--End Customer Words-->
		
		
		
    </div>
   <!--End Content-->
	
	
	
	
	
	
	
	<!--Start Footer-->
		<footer class="footer"  id="footer">
			<div class="container">
				
				<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<span>Short Info</span>
						<h1>Get in touch</h1>
					</div>
				</div>
				</div>
				
				<div class="get-touch">
					<div class="row">
						
						<div class="col-md-4">
							<div class="contact-us">
									<h4>Contact Us</h4>
									<div class="detail">
										<p>At Verdant, we're here to help. Feel free to reach out to us for an unforgettable dining experience.</p>
										<ul>
										  <li class="phone"><i class="icon-telephone"></i> <span>+94 77 123 4567</span></li>
											<li class="email"><i class="icon-email-1"></i> <span>support@verdant.lk</span></li>
											<li class="location"><i class="icon-home"></i> <span>45 Galle Road, Colombo 3, Sri Lanka</span></li>
										</ul>
									</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="open-hours">
									<h4>Opening Hour</h4>
									<div class="detail">
										<ul>
											<li><span class="day">Monday</span> <span class="time">09 am - 10 pm</span></li>
											<li><span class="day">Tuesday</span> <span class="time">09 am - 10 pm</span></li>
											<li><span class="day">Wednesday</span> <span class="time">09 am - 10 pm</span></li>
											<li><span class="day">Thursday</span> <span class="time">09 am - 10 pm</span></li>
											<li><span class="day">Friday</span> <span class="time">11 am - 08 pm</span></li>
											<li><span class="day">Saturday</span> <span class="time">10 am - 11 pm</span></li>
											<li><span class="day">Sunday</span> <span class="time">Closed</span></li>
										</ul>
									</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="instagram">
									<h4>Instagram</h4>
									<div class="detail">
										<div class="col-md-4"><a href="#."><img src="images/instagram-img1.jpg" alt=""></a></div>
										<div class="col-md-4"><a href="#."><img src="images/instagram-img2.jpg" alt=""></a></div>
										<div class="col-md-4"><a href="#."><img src="images/instagram-img3.jpg" alt=""></a></div>
										<div class="col-md-4"><a href="#."><img src="images/instagram-img4.jpg" alt=""></a></div>
										<div class="col-md-4"><a href="#."><img src="images/instagram-img5.jpg" alt=""></a></div>
										<div class="col-md-4"><a href="#."><img src="images/instagram-img6.jpg" alt=""></a></div>
									</div>
							</div>
						</div>
						
						
					</div>
				</div>
				
				
				
				<div class="about-pearl">
					
					<div class="row">
					
					<div class="col-md-12">
						<div class="about-detail">
							<h5>About Verdant</h5>
							<p>Verdant is more than just a restaurant—it's a celebration of fresh ingredients, culinary creativity, and a commitment to sustainability. Join us for a dining experience where every detail is designed to delight your senses and nourish your soul.</p>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="follow-us">
							<h5>Follow Along</h5>
							<ul>
								<li><a href="#."><i class="icon-facebook-1"></i></a></li>
								<li><a href="#."><i class="icon-twitter-1"></i></a></li>
								<li><a href="#."><i class="icon-google"></i></a></li>
								<li><a href="#."><i class="icon-pinterest-p"></i></a></li>
								<li><a href="#."><i class="icon-instagram"></i></a></li>
							</ul>
						</div>
					</div>
					
					
					<div class="col-md-6">
						<div class="newsletter">
							<h5>Newsletter</h5>
							
							<div class="field">
								<p id="nws_success_msg" class="success_msg" style="display:none">Thank You for subscribing.</p>
								<form name="newsletter_form" id="newsletter_form" method="post" onSubmit="return false">
								<input name="nws_email_address" id="nws_email_address" type="text" onKeyPress="remove_newsletter_errors();" onblur="if(this.value == '') { this.value='Enter your e-mail address'}" onfocus="if (this.value == 'Enter your e-mail address') {this.value=''}" value="Enter your e-mail address">
								<a href="#." onClick="validateNewsletter();"><i class="icon-icons208"></i></a>
								</form>
							</div>
							
						</div>
					</div>
					
					
					</div>
					
				</div>
				
			</div>
			
			
			
			<div class="copyrights">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<span>Copyright © 2024 Verdant Hotel. All rights reserved.&nbsp;&nbsp; <a href="#.">&nbsp;</a></span>
							<ul>
							<li><a href="#.">Permissions and Copyrights</a></li>
								<li><span class="divid">-</span></li>
							<li><a href="#.">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			
		</footer>
	<!--End Footer-->
	
	
	
	
	



<a href="#0" class="cd-top"></a>
  </div>




<script type="text/javascript" src="js/jquery.js"></script>

<!-- SMOOTH SCROLL -->	
<script type="text/javascript" src="js/scroll-desktop.js"></script>
<script type="text/javascript" src="js/scroll-desktop-smooth.js"></script>

<!-- START REVOLUTION SLIDER -->	
<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>

<!-- Countdown -->
<script type="text/javascript" src="js/countdown.js"></script>

<!-- Owl Carousel -->
<script type="text/javascript" src="js/owl.carousel.js"></script>
<script type="text/javascript" src="js/cart-detail.js"></script>

<!-- Mobile Menu -->
<script type="text/javascript" src="js/jquery.mmenu.min.all.js"></script>

<!-- Form Drop Dow -->
<script type="text/javascript" src="js/form-dropdown.js"></script>

<!-- Date Picker and input hover -->
<script type="text/javascript" src="js/classie.js"></script> 
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>


<!-- All Scripts -->
<script type="text/javascript" src="js/custom.js"></script> 


<!-- Switcher -->
<script type="text/javascript" src="js/switcher-restaurant.js"></script>


<!-- Date Picker -->	
<script type="text/javascript">
[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
// in case the input is already filled..

// events:
inputEl.addEventListener( 'focus', onInputFocus );
inputEl.addEventListener( 'blur', onInputBlur );
} );

function onInputFocus( ev ) {
classie.add( ev.target.parentNode, 'input--filled' );
}

function onInputBlur( ev ) {
if( ev.target.value.trim() === '' ) {
classie.remove( ev.target.parentNode, 'input--filled' );
}
}

//date picker
jQuery("#datepicker").datepicker({
inline: true
});

<!-- Form Drop Down -->
$(document).ready(function() {

		$(".basic-example").heapbox();

});

</script>
 

<!-- Revolution Slider -->	
<script type="text/javascript">
jQuery('.tp-banner').show().revolution(
{
dottedOverlay:"none",
delay:16000,
startwidth:1170,
startheight:900,
hideThumbs:200,

thumbWidth:100,
thumbHeight:50,
thumbAmount:5,

navigationType:"nexttobullets",
navigationArrows:"solo",
navigationStyle:"preview",

touchenabled:"on",
onHoverStop:"on",

swipe_velocity: 0.7,
swipe_min_touches: 1,
swipe_max_touches: 1,
drag_block_vertical: false,

parallax:"mouse",
parallaxBgFreeze:"on",
parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

keyboardNavigation:"off",

navigationHAlign:"center",
navigationVAlign:"bottom",
navigationHOffset:0,
navigationVOffset:20,

soloArrowLeftHalign:"left",
soloArrowLeftValign:"center",
soloArrowLeftHOffset:20,
soloArrowLeftVOffset:0,

soloArrowRightHalign:"right",
soloArrowRightValign:"center",
soloArrowRightHOffset:20,
soloArrowRightVOffset:0,

shadow:0,
fullWidth:"on",
fullScreen:"off",

spinner:"spinner4",

stopLoop:"off",
stopAfterLoops:-1,
stopAtSlide:-1,

shuffle:"off",

autoHeight:"off",						
forceFullWidth:"off",						



hideThumbsOnMobile:"off",
hideNavDelayOnMobile:1500,						
hideBulletsOnMobile:"off",
hideArrowsOnMobile:"off",
hideThumbsUnderResolution:0,

hideSliderAtLimit:0,
hideCaptionAtLimit:0,
hideAllCaptionAtLilmit:0,
startWithSlide:0,
videoJsPath:"rs-plugin/videojs/",
fullScreenOffsetContainer: ""	
});
</script>


</body>
</html>



<?php mysqli_close($connection)  ?>