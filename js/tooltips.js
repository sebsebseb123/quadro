$(document).ready (function(){
	
	// Create div with the tooltip info for the postal code label
	$('<div id="postal-tip" class="no-js tip"><p>In this action, a message is sent to a federal Member of Parliament based on the postal code entered. When setting up an action, you can also send to municipal or provincial legislators - or any recipient for whom you have an email address.</p></div>').appendTo('div#edit-postal-code-wrapper');
	
	// Create div with the tooltip info for the subject label
	$('<div id="subject-tip" class="no-js tip"><p>When you create the action, you can enter a subject line or have the supporter enter their own.</p></div>').appendTo('div#edit-email-subject-wrapper');
	
	// Create div with the tooltip info for the first name label
	$('<div id="firstname-tip" class="no-js tip"><p>For this action, postal code, first name and email address are all "required" fields.  As the creator of an action, you can make any field \'required\', and have control over what fields are displayed.</p></div>').appendTo('div#edit-first-name-wrapper');
	
	// Hide all tooltips (any div with a class of tip)
	$('div.tip').hide();
	
	//var id = $('div.tooltip').attr('id');
	
	//alert(tooltip);
	
	// Tooltip for goal thermometer
	$('div[tooltip="goal-tip"]').hover(function(){
		//alert(id);
		$('div.tip').stop(true, true)
		$('div#goal-tip').fadeIn(250);//This is for the mouseover
					},
					function(){
						$('div#goal-tip').fadeOut(250); //This is for the mouseout
	});
	
	// Tooltip for postal code
	$('label[for="edit-postal-code"]').hover(function(){
		$('div#postal-tip').stop(true, true)
		$('div#postal-tip').fadeIn(250);//This is for the mouseover
					},
					function(){
						$('div#postal-tip').fadeOut(250); //This is for the mouseout
	});
	
	// Tooltip for email subject
	$('label[for="edit-email-subject"]').hover(function(){
		$('div#subject-tip').stop(true, true)
		$('div#subject-tip').fadeIn(250);//This is for the mouseover
					},
					function(){
						$('div#subject-tip').fadeOut(250); //This is for the mouseout
	});
	
	// Tooltip for email first name
	$('label[for="edit-first-name"]').hover(function(){
		$('div#firstname-tip').stop(true, true)
		$('div#firstname-tip').fadeIn(250);//This is for the mouseover
					},
					function(){
						$('div#firstname-tip').fadeOut(250); //This is for the mouseout
	});
	
});