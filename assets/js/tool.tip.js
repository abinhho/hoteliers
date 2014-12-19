this.imagePreview = function(){	
	/* CONFIG */
		
		xOffset = 10;
		yOffset = 30;
		
		window_width = $(window).width();
		
		
	/* END CONFIG */
	$("p.preview_tooltip_image").hover(function(e){
		var href = $(this).attr('href');
		
		title = this.title;
		per_off = $(this).attr('per_off');
		
		title = (title == 'undefined') ? '' : title;
		
		//var c = (this.t != "") ? "<br/>" + this.t : "";
		$("body").append("<p id='preview'><img src='"+ href +"' alt='"+ title +"' /><span class='title'>"+ title +" </span><font class='hot'>-"+ per_off +"%</font></p>");								 
		
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");						
    },
	function(){
		//this.title = this.t;	
		$("#preview").remove();
    });	
	$("p.preview_tooltip_image").mousemove(function(e){
		
		if(e.pageX > window_width/2){ 
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX - yOffset - 300) + "px");
		}
		else
		{
			$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
		}
	});			
};


// starting the script on page load
$(document).ready(function(){
	imagePreview();
});