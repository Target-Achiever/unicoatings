jQuery(document).ready(function($){
	/* validation */
	$('#defaultForm').bootstrapValidator();
	
	/* for date picker 
	var date_input=$('input[name="date"]'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	var options={
	format: 'mm/dd/yyyy',
	container: container,
	todayHighlight: true,
	autoclose: true,
	orientation: 'auto'
	};
	date_input.datepicker(options);              
	var date_input=$('input[name="date1"]'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	var options={
	format: 'mm/dd/yyyy',
	container: container,
	todayHighlight: true,
	autoclose: true,
	orientation: 'auto'
	};
	date_input.datepicker(options);  */

	/* for service type */
	$("#service_type").on('change', function(){ 	
	   service_type = $(this).val();
           $('#defaultForm').bootstrapValidator('resetForm', true);
           $("form")[0].reset();
           $("#service_type").val(service_type);
	   if(service_type == "Transfer")
	   {
		 //alert("You Select Transfer!") 
		 $("#transfer").fadeIn(2000);
		 $("#car_with_driver").hide();  
	   }
	   else if(service_type == "Driver")
	   {
		   $("#car_with_driver ").fadeIn(2000);
		   $("#transfer").fadeOut(); 
	   }
	   else
	   {
		   //Default Div Show
		   $("#transfer").fadeIn(2000);
		   $("#car_with_driver").hide(); 
	   }
	});
	
	/* */
	
	
});