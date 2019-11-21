jQuery(document).ready(function($) {

	'use strict';

	/************** Mixitup (Filter Projects) *********************/
    	$('.projects-holder').mixitup({
            effects: ['fade','grayscale'],
            easing: 'snap',
            transitionSpeed: 400
        });

});

// function goToDetailed(){
// 	$('#detailedPane').css('visibility','visible');
// 	var form =$('#nextForm');
// 	var data = form.serialize();
// 	$.post('./detailed.php',data,function(data){
// 		var final = JSON.parse(data);
// 		var name = final.name;
// 		var category = final.category_name;
// 		var price = final.price;
// 		var quantity = final.quantity;
// 		var fname = final.fname;
// 		var lname = final.lname;
// 		var phoneno = '+'+final.phoneno;
// 		var email = final.email;
// 		console.log(category);
// 	});
// }
