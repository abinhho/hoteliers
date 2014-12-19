var FRAME="",LOGIN="", SELECT="", CART= "";
$(document).ready(function(){
change_urls = function(url,val){
		location.href = url + "?sort="+val.value;
		return false;
	}
change_lang= function(val)
{
	$("#temp_frame").attr({src:"library/change_lang.php?lang="+val.value});
	return false;
}
SELECT={
		load_new_select:function(ops){
			$('.'+ops.to).load(ops.url);
		}
	};
	
bookmark_page = function()
{
			var title = document.title; 
            var url = window.location.href;
			if (document.all)
            {
				window.external.AddFavorite(url, title);
			}

            else if (window.sidebar) {
                window.sidebar.addPanel(title, url, "");
				
			}

            else if (window.opera && window.print)
            { 
                var bookmark_element = document.createElement('a');
                bookmark_element.setAttribute('href', url);
                bookmark_element.setAttribute('title', title);
                bookmark_element.setAttribute('rel', 'sidebar');
                bookmark_element.click();
            }
			return false;
}
open_promt=function(ops)
{		
	$(".promt").find(".content").
		html("<span class='loading' style='padding:10px;display:block;font-size:20px;'>LOADING...</span>");
		$(".dim_body").fadeIn();
		$(".promt").find(".content").load(ops.url);
		$(".promt").show().css({top:$(document).scrollTop()+100+'px',position:'absolute'}).find(".header h2").text(ops.title);
		
		if(ops.action==undefined)
		$("form#form_promt").attr({action:ops.url});
		
		else
		$("form#form_promt").attr({action:ops.action});
		if(ops.type=="view")
		{
			$("#promt_submit").hide();
			$("#close_foot").show();
		}
		
		else
		{
			$("#promt_submit").show();
			$("#close_foot").hide();
		}
	return false;
	}

$(".promt .close, .promt #close_foot").click(function(){$(".promt").fadeOut("fast");$(".dim_body").hide();});

submit_form=function(opt)
{	
	var default_={target:"temp_frame",form:'mainform'};
	var opt= $.extend({},default_,opt);
	$("form#"+opt.form).attr({action:opt.action,target:opt.target});
}
$("form").submit(function(){
	//if($(this).attr('notemp')!="true")
	//$(this).attr({target:'temp_frame'});
});
FRAME={
			feed_back:function(D){
				if(D.ok=="error")
				{
					alert(D.messenger);
				}
				else if(D.ok=="RESET_FROM")
				{
					if(D.note!=undefined)
					{
						alert(D.note);
					}
					
					$("form"+D.form).each(function(){
							this.reset();
					});
					capcha_reload();
				}
				if(D.captcha==true)
				{
					capcha_reload();
					$("input#captcha").val('');
				}
			}
			,feed_back_promt:function(D){
				
				if(D.messenger != undefined)
				{
					alert(D.messenger);
				}
				
				if(D.ok == "error")
				{
					$(".promt").find(".error").html(D.messenger_promt).fadeIn();
				}
				else if(D.ok == "reload")
				{
					location.reload(true);
				}
			}
		};
	$(document).scroll(function(){
	($(this).scrollTop()>100)?$('.scroll_top').fadeIn():$('.scroll_top').hide();
	});
	$('.scroll_top').click(function(){
	$('body,html').animate({scrollTop : 0},'slow');
	});
	
	
	
	confirm_del=function(url){
		del_tr=true;
		var y=confirm("Có chắc bạn muốn xóa chứ... ???");
		if(!y){return false;}
		$("#temp_frame").attr({src:url});
		return false;
	}
	confirm_del_normal=function(){
		var y=confirm("Có chắc bạn muốn xóa chứ... ???");
		if(!y){return false;}
		return true;
	}
	$('.del').click(function(){
		var y=confirm("Có chắc bạn muốn xóa chứ... ???");
		if(!y)return false;
	});
	openWin=function(href,w,h)
	{
		var mywin=window.open(href, 'mywindow', 'left=300px,top=100px,location=1,status=1,scrollbars=1,width='+w+',height='+h+'');
		mywin.focus();
		return false;
	}
	$(".admin_form_lang img").live('click', function(){
		var same = $(this).attr("same");
		var diff = $(this).attr("diff");
		$("div."+same).hide();
		$("div."+same).each(function(){
			if($(this).attr('diff') == diff )
			$(this).show();
		});
		$(".admin_form_lang img."+same).removeClass("active");
		$(this).addClass("active");
	});
	alert_messenger = function($mess)
	{
		alert($mess);
	}
	
	
	CART = {
		add2cart:function(opt)
		{ 
			var default_={qty:1,options:'', tail_url: 'ajax-cart/add2cart'};
			var opt= $.extend({},default_,opt);
			$.ajax({
				type:"POST",
				data:{'id':opt.id, 'name':opt.name , 'price':opt.price, 'qty':opt.qty,  'options':opt.options, 'images': opt.images, 'url': opt.url}, 
				dataType:"json",
				url:opt.base_url + opt.tail_url,
				success: function (data){
					if(data.ok == 1)
					{
						CART.open_feed_cart();
						$('.total_cart').text(data.total);
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.status);
					alert(thrownError);
				}
				
				
			});
		}
		,close_feed_cart:function(){
			$('.dim_body').hide();
			$('.feed_cart').hide();
		}
		,open_feed_cart:function(){
			$('.dim_body').show();
			$('.feed_cart').fadeIn('fast');
		}
	
	};
	
	scroll2tag = function(tag)
	{ 	
		$('html,body').animate({
        scrollTop: $(tag).offset().top},
        'fast');
	}
	
});