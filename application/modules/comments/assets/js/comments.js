var RATE="";
$(document).ready(function(){
	var block_rate =$(".block_rate");
	var stars =$(".block_rate .stars");
	var block_text_rate =$(".block_rate .text_rate");
	var text_rate = block_text_rate.text();
	$(".block_rate .stars.mod_on .each").hover(function(){ 
		var rate = $(this).index()+1;
		stars.children(".each").removeClass("hover");
		for(var i=0;i<=rate-1;i++)
		{
			stars.children(".each").eq(i).addClass("hover");
		}
		var marks=["rất kém","kém","đạt","tốt","rất tốt"];
		block_text_rate.text("Điểm: "+ marks[rate-1]);
		
		$(this).click(function(){
			$("iframe[name='temp_frame']").attr({src:$("input[name='url_do']").val() + '?rate='+rate+'&mod='+$("input[name='mod_rate']").val()+'&id='+$("input[name='id_topic']").val() });
		});
		
	}
	,function () {
	stars.children(".each").removeClass("hover");
	block_text_rate.text(text_rate);
	}
	);
	
	RATE = {
	
	feed_back:function(opts)
	{
		stars.removeClass("mod_on");
		$(".block_rate .stars .each").unbind('mouseenter mouseleave click');
		block_rate.find(".vote_total").text(opts.vote);
		block_rate.find(".vote_times").text(opts.vote_times);
	}
	
	
	};
	
});