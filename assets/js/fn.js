$(document).ready(function(){

check_browser=function(){

	if (navigator.userAgent.indexOf('Firefox') != -1
	&& parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Firefox') + 8)) >= 3.6){
		return "Firefox";
	 }
	 else if (navigator.userAgent.indexOf('Chrome') != -1 
	 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Chrome') + 7).split(' ')[0]) >= 15){ 
	 return "Chrome";
	 }
	 else if(navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Version') != -1 
	 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Version') + 8)
	 .split(' ')[0]) >= 5){
		return "Safari";
	 }
	 else{
		return false;
	 }
 }
	function _0_01(i)
	{
		if(i<10) 
		return "0"+String(i); 
		return i;
	}function _00_1(i)
	{
		if(i[0]=="0") 
		return i[1]; 
		return i;
	}

	
	h_body=$("body").height();
	h_window=$(window).height();
	bottom_w=window.pageYOffset+h_body;
	w_body=$("body").width();
	
	$.fn.floatingFixed = function(opt){
		var default_={w_body:980,distant:10,pos:'left'};
		var opt= $.extend({},default_,opt);
		var this_=$($(this).selector);
		if(opt.pos =='left')
			this_.animate({'left':(w_body/2-opt.w_body/2 - opt.distant)-this_.width()+'px'}, "slow");
		else
			this_.animate({'left':(w_body/2+opt.w_body/2 + opt.distant)+'px'}, "slow");
		$(window).scroll(function(){
			this_
			.stop()
			.animate({"marginTop": ($(window).scrollTop()) + "px"}, "slow" );			
		});
		
	}
	
	
	$.fn.only_accept_num=function(){
	$($(this).selector).live('keyup',function(){
	var value=$(this).val();
	if(isNaN(value))
	{
		while(isNaN(value))
		{		
			value=value.substring(0,value.length-1);
			$(this).val(value);
		}
	}
	});
	}
	$.fn.overflow_bottom=function(){
	var this_=$($(this).selector);
	var width=this_.width();
	var height=this_.height();
	var top=this_.offset().top;
	this_.css({"max-height":(h_window-top-10)+'px',"overflow":"auto"});
	
	}
	$(".confirm").click(function(){
	var y=confirm("Bạn chắc là bạn muốn xóa chứ ???");
	if(!y) return false;
	});

	
	$.fn.stopPropagation_=function(){
	var this_=$($(this).selector);
	this_.click(function(e){
	e.stopPropagation();return false;
	});
	}
	$.fn.document_click_hide=function(){
	var this_=$($(this).selector);
	$(document).click(function(){
	this_.hide();
	});
	}
	
	$.fn.click_close=function(id){
	var this_=$($(this).selector);
	this_.click(function(){
	$(id).fadeOut();
	});
	}
	
	$.fn.count_down_clock=function(){
		var this_=$($(this).selector);
		setInterval(function() {
			text=this_.text();
			var N=text.split(":"); //alert(intval("09")+"--"+N[2]);
			var time= parseInt(_00_1(N[0]))*3600+parseInt(_00_1(N[1]))*60+parseInt(_00_1(N[2]))-1;
			var h= parseInt (time/3600); 
			var i= parseInt ( (time-(3600*h))/60) ;
			var s= parseInt (time-(3600*h)-60*i) ;
			r= _0_01(h)+":"+_0_01(i)+":"+_0_01(s);
			//r= h+":"+i+":"+s;
		  	
			this_.text(r);
		}, 1000);

		
	}
	
	$('a').click(function(){if($(this).attr('href')=="#") return false;});
	$.fn.select_updown=function(target){
	var this_=$($(this).selector);
		this_.keydown(function(e){ //alert(e.keyCode);
			if(e.keyCode==40)
			{
				
				first_active=$(target).find("li.active");//alert(first_active.next("li").length);
				$(target).find("li").removeClass("active");
				(first_active.next().length!=0)? first_active.next().addClass("active") : $(target).find("li:first").addClass("active");
			}
			if(e.keyCode==38)
			{
				
				first_active=$(target).find("li.active");
				$(target).find("li").removeClass("active");
				(first_active.prev().length!=0)? first_active.prev().addClass("active") : $(target).find("li:last").addClass("active");
			}
		});
	}
	$.fn.hover_active_li=function(){
		var this_=$($(this).selector);
		
		this_.find("li").live('hover',function(){this_.find("li").removeClass("active");$(this).addClass("active");});
	}
	$.fn.menu_dropdown=function(){
		var this_=$($(this).selector);
		this_.find("li").each(function(){
			$(this).hover(function(){
					$(this).children("ul").slideDown("fast");
				},
				function(){$(this).children("ul").hide();}
			);
			
		});
	}
	
	$.fn.tab_li=function(tab_show){
		var this_=$($(this).selector);
		this_.find("li").live("mousedown",function(){
       
               $($(this).selector+" li.tab,"+tab_show+" li.tab").removeClass("active");
                $(this).addClass("active");
                index=$(this).index();
                var tab_li_b=$(tab_show+" li.tab");
                //var load=$(this).attr("load"); 
                //if(tab_li_b.eq(index).text()=="")
                //{
                        //tab_li_b.eq(index).load(load);
                //}
				tab_li_b.hide()
                tab_li_b.eq(index).addClass("active").fadeIn();
				
        });

	}
	$.fn.scrollFixed=function(myBottom,myTop){
	var this_=$($(this).selector);
	var top=this_.offset().top;
	var left=this_.offset().left;
	var width=this_.width();
	var height=this_.height();
	h_body=$("body").height();
	if(h_body-height-myBottom-myTop-top>0){
		$(window).scroll(function(){
		var this_w=$(this);
		top_w=window.pageYOffset;
		if(top_w > top)
		{
			
			this_.css({"position":"fixed","top":myTop,"left":left+"px","margin-left":"0","margin-right":"0","width":width});
			var bottom=this_.offset().top+this_.height();
			if(bottom > h_body - myBottom)
			{	
				this_.css({"position":"absolute",top:h_body-myBottom-height+"px","left":left+"px","width":width});
			}
		}
		else 
		{
			this_.css({"position":"","top":"","width":width});
		}
	
		});
	}

	}
	scroll_to=function(c){
		$('body,html').animate({scrollTop : $(c).offset().top},'slow');
		return false;
	}
	select_all_check_box=function(this_,cl)
	{
		if(this_.attr("checked") == "checked")
		{
			$('.'+cl).find("input[type='checkbox']").attr('checked','checked');
		}
		else
		{
			$('.'+cl).find("input[type='checkbox']").removeAttr('checked');
		}
	}
	toggle_target=function(cl)
	{
		$(cl).toggleClass("hidden");
		return false;
	}
});


