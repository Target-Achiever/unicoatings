<?php
/**
	Template Name: Book Now Template
*/
get_header(); ?>
<?php 
$res = ' ';

if(isset($_POST['fname'])):


$type = $_POST['type'];
	$car =  explode("%", $_POST['car_type']); 
	//echo get_the_title($car[0]);exit;
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$mob = $_POST['mob'];
	
	$date = $_POST['date'];
	$car_type = get_the_title($car[0]);
	$train_no = $_POST['train_no'];
	$arriaval_time = $_POST['arriaval_time'];
	$pickup_place = $_POST['pickup_place'];
	$drop_place = $_POST['drop_place'];
	$no_of_pass = $_POST['no_of_pass'];
	$trip = $_POST['trip'];
	
	$cost = $_POST['cost'].".00 &euro;";
	
	if(isset($_POST['car_type1'])):
		$car =  explode("%", $_POST['car_type1']); 
		//echo get_the_title($car[0]);exit;
		$packages = $_POST['packages'];
		$car_type1 = get_the_title($car[0]);
		$date1 = $_POST['date1'];
		$arrival = $_POST['arrival'];
		$inside_paris = $_POST['inside_paris'];
		$no_of_pass1 = $_POST['no_of_pass1'];
		$cost1 = $_POST['cost1'].".00 &euro;";
	endif;
	
	$comments = $_POST['comments'];
	
	/* echo "type-$type<br>"; 
	echo "fname-$fname<br>"; 
	echo "lname-$lname<br>"; 
	echo "email-$email<br>"; 
	echo "mob-$mob<br><br>";
	
	echo "date-$date<br>"; 
	echo "car_type-$car_type<br>"; 
	echo "train_no-$train_no<br>"; 
	echo "arriaval_time-$arriaval_time<br>"; 
	echo "pickup_place-$pickup_place<br>"; 
	echo "drop_place-$drop_place<br><br>"; 
	
	echo "no_of_pass-$no_of_pass<br>"; 
	echo "trip-$trip<br>"; 
	echo "cost-$cost<br>";  */
	
	
	
$from = 'elavarasi.s@pickzy.com';
$to = 'elavarasi.s@pickzy.com';
$subject = 'Car Booking';
$subject1 = 'Thank you';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
$msg_header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Paris Limo Express</title>  
</head>
<body  offset="0" class="body" style="padding:0; margin:0; display:block; background:#eeebeb; -webkit-text-size-adjust:none" bgcolor="#eeebeb">
<table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
  <tr>
    <td align="center" valign="top" style="background-color:#eeebeb" width="100%">

    <center>

      <table cellspacing="0" cellpadding="0" width="600" class="w320">
        <tr>
          <td align="center" valign="top">


          <table style="margin:0 auto;" cellspacing="0" cellpadding="0" width="100%">
            <tr>
              <td style="text-align: center;">
                <a href="#"><h2>Paris Limo Express</h2></a>
              </td>
            </tr>
          </table>

          <table cellspacing="0" cellpadding="0" width="100%" style="background-color:#3bcdb0;">
            <tr>
              <td style="background-color:#3bcdb0;">
                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td>
                      <img src="http://temp1.pickzy.com/parislimoexpress/wp-content/uploads/2018/02/invoice.jpg" style="max-width:100%; display:block;">
                    </td>
                  </tr>
                </table>

              </td>
            </tr>
          </table>

          <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff" >
            <tr>
              <td style="background-color:#ffffff;">

              <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                  <td style="text-align:left;padding:0px 75px 30px;" class="mobile-center w320">
					<br>				
					 <table border="0" cellspacing="0" cellpadding="0" style="width:100%;float:left;">
							<tr>
								<th style="text-align:left;padding:5px 30px;color:#555;padding-left:0px;">Service Type</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$type.'</td>
							</tr>							
							<tr>
								<th style="text-align:left;padding:5px 30px;color:#555;padding-left:0px;">First Name</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$fname.'</td>
							</tr>							
							<tr>
								<th style="text-align:left;padding:5px 30px;color:#555;padding-left:0px;">Last Name</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$lname.'</td>
							</tr> 
							<tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Email</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$email.'</td>
							</tr> 
							<tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Mobile Number</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$mob.'</td>
							</tr>';
							
	if(isset($_POST['car_type'])){
		$service_info = '<tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Date of Service</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$date.'</td>
							</tr>
							<tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Type of Car</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$car_type.'</td>
							</tr>
							<tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Flight or Train No</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$train_no.'</td>
							</tr><tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Flight or Train Arriaval Time</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$arriaval_time.'</td>
							</tr><tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Arrival Place or Pickup</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$pickup_place.'</td>
							</tr><tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;"> 
Destination or Drop Place</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$drop_place.'</td>
							</tr><tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">No.of Passengers</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$no_of_pass.'</td>
							</tr><tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Type of Trip</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$trip.'</td>
							</tr><tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Cost</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$cost.'</td>
							</tr>';
	}	
	
	if(isset($_POST['car_type1'])){
		$service_info1 = '<tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Date of Service</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$date1.'</td>
							</tr>
							<tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Type of Car</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$car_type1.'</td>
							</tr>
							<tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Arrival Place</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$arrival.'</td>
							</tr><tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Inside Paris</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$inside_paris.'</td>
							</tr><tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Packages</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$packages.'</td>
							</tr><tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">No.of Passengers</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$no_of_pass1.'</td>
							</tr><tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Cost</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$cost1.'</td>
							</tr>';
	}

	
	
		$msg_footer = '<tr>
								<th style="text-align:left;padding:12px 30px;color:#555;padding-left:0px;">Comments</th>
							</tr> 
							<tr>										
								<td style="text-align:left;border-bottom:1px solid #ddd;padding:0px 30px 10px;color:#333;padding-left:0px;">'.$comments.'</td>
							</tr>
					</table>
                  </td>
                </tr>
              </table>

              <table style="width:100% !important;" cellspacing="0" cellpadding="0" bgcolor="#363636"  class="force-full-width">     
                <tr>
                  <td style="color:#f0f0f0; font-size: 14px; text-align:center; padding-bottom:4px;padding:10px;">
                    © 2018 All Rights Reserved
                  </td>
                </tr>             
              </table>

              </td>
            </tr>
          </table>
          </td>
        </tr>
      </table>
    </center>
    </td>
  </tr>
</table>
</body>
</html>
'; 
	$from = 'elavarasi.s@pickzy.com';

	if($type == "Transfer"){
		$message = $msg_header.$service_info.$msg_footer;
	}else{ 
		$message = $msg_header.$service_info1.$msg_footer;
	}
	// Sending email
	if(mail($to, $subject, $message, $headers) AND mail($email, $subject1, $message, $headers)  ){
		$res = "yes";
	} else{ 
		$res = "no";
	}
	
endif;
?>
<section class="masthead book_now_head text-center text-white d-flex">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h1 class="text-uppercase">
                            <strong>We provide all kind of airport transfer services from &amp; to all</strong>                
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="book_now_pg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h4>Book Now</h4>
                        <div class="book_divide"></div>
						<?php if($res == "yes"): ?><br><br>
						<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
							<strong>Success!</strong> Email has been sent.
						</div>
						<?php endif; ?>
						<?php if($res == "no"): ?><br><br>
						<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
						  <strong>Sorry!</strong> Something went wrong.
						</div>
						<?php endif; ?>
                    </div>
                </div>
                <div class="book_now_frm">
                    <form action="" method="post" id="defaultForm" name="booking_form" autocomplete="off">
                        <div class="form_content">
                            <div class="form_header">
                                <div class="row">                              
                                    <div class="col-sm-12 col-md-12 col-lg-12"><h4><span class="no_icon"> 1 </span> Select Type </h4></div>
                                </div>
                            </div>
                            <div class="frm_field">                            
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label>Type</label>
                                        <select required name="type" id="service_type" class="form-control">
                                            <option value="">--Select--</option>
                                            <option value="Transfer" data-val="Transfer">Transfer</option>
                                            <option value="Driver" data-val="Driver">Car With Driver</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-section1">
                                <div class="form_header">
                                     <div class="row">                              
                                        <div class="col-sm-12 col-md-12 col-lg-12"><h4><span class="no_icon"> 2 </span> Customer Info </h4></div>
                                     </div>
                                </div>
                                <div class="frm_field"> 
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>First Name</label>
                                            <input type="text" name="fname" class="form-control" placeholder="Enter First Name" data-bv-trigger="keyup" required data-bv-notempty-message="Enter First Name">
                                        </div>
                                         <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" data-bv-trigger="keyup" required data-bv-notempty-message="Enter Last Name">
                                        </div>
                                    </div>
                                      <div class="row">
                                         <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter Email" data-bv-trigger="keyup" required data-bv-notempty-message="Enter Email">
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Mobile Number</label>
                                            <input type="text" name="mob" class="form-control" placeholder="Enter Mobile Number" data-bv-trigger="keyup" required data-bv-notempty-message="Enter Mobile Number">
                                        </div>
                                    </div>                                      
                                </div>
                            </div>
                            <div class="form-section2" id="transfer">
                                <div class="form_header">
                                     <div class="row">                              
                                        <div class="col-sm-12 col-md-12 col-lg-12"><h4><span class="no_icon"> 3 </span> Service Info (Transfer) </h4></div>
                                     </div>
                                </div>
                                <div class="frm_field"> 
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Date of Service</label>
                                            <input type="date" required class="form-control" id="date" name="date"  placeholder="MM/DD/YYY">
                                        </div>
                                        
										<div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Type of Car</label>
                                            <select required name="car_type" id="car_type" class="car_type form-control" >
                                                <option value="">--Select--</option>
												<?php $args = array(
													'posts_per_page'   => -1,
													'orderby'          => 'date',
													'order'            => 'ASC',
													'post_type'        => 'car',
													'post_status'      => 'publish'
												);
												$cars = get_posts( $args ); $i = 1;
if($cars):
	foreach($cars as $car){
	setup_postdata($car);

		if( have_rows('transfer_place_with_price',$car->ID) ):	

			while ( have_rows('transfer_place_with_price',$car->ID) ) : the_row();
				$place = get_sub_field('place');
				$price = get_sub_field('amount');

				$details[] = array( $place => $price );

			endwhile;
			
			$amount['c_'.$car->ID] = $details;
			unset($details);
			
			while ( have_rows('package_details',$car->ID) ) : the_row();
				$package_name = get_sub_field('package_name');
				$package_amount = get_sub_field('package_amount');

				$packages[] = array( $package_name => $package_amount );
				

			endwhile;
			
			$car_with_driver['c_'.$car->ID] = $packages;
			unset($packages);
			
			
		endif;
		$no_of_pass = get_field('no_of_passengers',$car->ID);
		$outside_paris = get_field('additional_cost_for_outside_paris',$car->ID);
		$cost_for_km = get_field('additional_cost_for_km',$car->ID);
		$euro_per_hour = get_field('car_with_driver_euro_per_hour',$car->ID);
		
		$additional_costs['c_'.$car->ID] = array("outside_paris" => $outside_paris,
												"cost_for_km" => $cost_for_km, "euro_per_hour" => $euro_per_hour);
		
	echo '<option value="'.$car->ID.'%'.$no_of_pass.'">'.$car->post_title.'</option>';

	}
	$GLOBALS['amount']= json_encode($amount); 
	$GLOBALS['car_with_driver']= json_encode($car_with_driver); 
	$GLOBALS['additional_costs']= json_encode($additional_costs); 
	//var_dump(json_encode($amount)); 
	//var_dump($car_with_driver); 
	//var_dump($packages); 
	//exit;
	
endif;
												?>
                                            </select>
                                        </div>
                                    </div>
                                      <div class="row">
                                        
                                         <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Flight or Train No</label>
                                            <input type="text" name="train_no" class="form-control" placeholder=" Enter Train No" data-bv-trigger="keyup" required data-bv-notempty-message="Enter Train No">
                                        </div>
										<div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Flight or Train Arriaval Time</label><input name="arriaval_time" class="form-control" type="time" name="time" data-bv-trigger="keyup" required data-bv-notempty-message="Enter Arrival Time"/>
                                            
                                        </div>
                                    </div>
                                      <div class="row">
                                        
                                         <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Arrival Place or Pickup</label>
                                            <!--<input type="text" name="Pickup" class="form-control" placeholder="Enter Pickup">-->
											
											<select required id="pickup_place" name="pickup_place" class="form-control" >
                                                <option value="">--Select--</option>
                                                <option value="LBG">LBG</option>
                                                <option value="Paris">Paris</option>
                                                <option value="CDG">CDG</option>
                                                <option value="Orly">Orly</option>
                                            </select>
											
											
                                        </div>
										<div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Destination or Drop Place</label>
                                            <!--<input type="text" name="Destination" class="form-control" placeholder="Enter Destination">-->
											<select id="drop_place" name="drop_place" class="form-control" required>
                                                <option value="">--Select--</option>
                                                <option value="LBG">LBG</option>
                                                <option value="Paris">Paris</option>
                                                <option value="CDG">CDG</option>
                                                <option value="Orly">Orly</option>
                                            </select>
                                        </div>
                                    </div>
                                      <div class="row">
                                        
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>No.of Passengers</label>
                                            <input id="no_of_pass" min="1" max="8" type="number" name="no_of_pass" class="form-control" placeholder="Enter No.of Passengers" required>
                                        </div>
										<div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Type of Trip</label>
                                            <select id="trip" name="trip" class="form-control" required>
                                                <option value="">--Select--</option>
                                                <option value="one_way_trip">One Way Trip</option>
                                                <option value="round_trip">Round Trip (up and down)</option>
                                            </select>
                                        </div>
                                    </div>                            
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Cost</label>
                                            <input id="cost" type="text" name="cost" class="form-control" placeholder="Enter Cost">
                                        </div>                                      
                                    </div>
                                </div>
                            </div>
                            <div class="form-section3" id="car_with_driver" style="display:none;">
                                <div class="form_header">
                                     <div class="row">                              
                                        <div class="col-sm-12 col-md-12 col-lg-12"><h4><span class="no_icon"> 3 </span> Service Info (Car with driver) </h4></div>
                                     </div>
                                </div>
                                <div class="frm_field"> 
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Date of Service</label>
                                            <input type="date" required class="form-control" id="date1" name="date1" placeholder="MM/DD/YYY">
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Type of Car</label>
                                            <select name="car_type1" id="car_type1" class="car_type1 form-control" required>
                                                <option value="">--Select--</option>
												<?php $args = array(
													'posts_per_page'   => -1,
													'orderby'          => 'date',
													'order'            => 'ASC',
													'post_type'        => 'car',
													'post_status'      => 'publish'
												);
												$cars = get_posts( $args ); $i = 1;
												if($cars):
													foreach($cars as $car){
														setup_postdata($car);								
													$no_of_pass = get_field('no_of_passengers',$car->ID);
	echo '<option value="'.$car->ID.'%'.$no_of_pass.'">'.$car->post_title.'</option>';
												
													}
												endif;
												?>
                                               
                                            </select>
                                        </div>
                                    </div>                                  
                                    <div class="row">
                                         <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Arrival Place</label>
                                            <input id="txtPlaces" type="text" name="arrival" class="form-control" placeholder="Enter Arrival Place" required>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Inside Paris</label>                                           
											<select readonly id="inside_paris" name="inside_paris" class="form-control" required>
                                                <option value="">--Select--</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
											</select>
                                        </div>
                                    </div>
                                      <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>No.of Passengers</label>
                                            <input id="no_of_pass1" min="1" max="8" type="number" name="no_of_pass1" class="form-control" placeholder="Enter No.of Passengers" required>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Packages</label>
											
                                           <select id="packages" name="packages" class="form-control" required>
                                                <option value="">--Select--</option>
												<option value="Inside_Paris_8_hours_package">Inside_Paris_8_hours_package</option>
												<option value="Inside_Paris_10_hours_package">Inside_Paris_10_hours_package</option>
                                            </select>	
	
	
                                        </div>                                         
                                    </div>                            
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Cost</label>
                                            <input type="text" id="cost1" name="cost1" class="form-control" placeholder="Enter Cost">
                                        </div> 
                                    </div>
									<div class="row">
										<div class="col-sm-6 col-md-6 col-lg-6">
                                            <label>Additional Info</label>
                                            <div id="additional_cost">
											
											</div>
                                        </div>
									</div>
                                </div>
                            </div>
                            <div class="form-section4">
                                <div class="form_header">
                                     <div class="row">                              
                                        <div class="col-sm-12 col-md-12 col-lg-12"><h4><span class="no_icon"> 4 </span> Feedback </h4></div>
                                     </div>
                                </div>
                                <div class="frm_field"> 
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label>Comments</label>
                                            <textarea class="form-control" name="comments" rows="5" placeholder="Enter Your Comments"></textarea>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-section5">
                                <div class="form_footer text-center">
                                     <div class="row">                              
                                         <div class="col-sm-12 col-md-12 col-lg-12">
                                             <button type="submit" class="btn btn-primary">Book Now</button>
                                             <button type="reset" class="btn btn-primary">Cancel</button>
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>    
            </div>
        </section>
		<script type="text/javascript">
			
		</script>
<?php get_footer(); ?>