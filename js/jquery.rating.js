(function($){
	$.RatePlugin = function(opts){
		this.opts = opts;
	};
	$.RateRenderers = {};
	$.RateRenderers.defaultRenderer = function(opts){
		this.opts = opts;
		this.rp = new $.RatePlugin(opts);
	};
	$.extend($.RateRenderers.defaultRenderer.prototype,{
		createCur : function(score){
			var li;
			var gap = this.opts.star_width;
			li = $("<li class='current-rating'></li>");
			var width = Math.round(score * gap);
			li.css('width',width +'px');
			return li;
		},
		createStar : function(rate){
			var li,lnk;
			li = $("<li></li>");
			lnk = $("<a></a>");
			lnk.data("rate",rate);
			lnk.attr("title",rate+"分");
			var star_width = this.opts.star_width;
			lnk.css("left",(rate - 1)* star_width + "px");
			lnk.hover(function(){
					$(this).css("left",0);
					$(this).css("width", rate * star_width+ "px");
				},
				function(){
					$(this).css("left",(rate - 1)* star_width + "px");
					$(this).css("width","16px");
				}
			);
			lnk.appendTo(li);
			return li;
		},
		getList : function(eventHandler){

			var fragment = $("<ul class='star-rating'></ul>");
			fragment.css("width",this.opts.star_width*this.opts.star_num + "px");
			fragment.attr("title","平均评分为"+this.opts.score + "分");
			this.createCur(this.opts.score).appendTo(fragment);
			if(this.opts.is_rated == false)
			{
				for(var i=0;i<this.opts.star_num;i++)
				{
					this.createStar(i+1).appendTo(fragment);
				}
			}
			$('a', fragment).click(eventHandler);
			return fragment;
		}
	});
	$.fn.rating = function(opts){
		opts = $.extend({
			score:0,
			star_width:16,
			star_num:5,
			is_rated:false,
			renderer:"defaultRenderer",
			callback:function(){return false;}
		},opts||{});
		var container = this;
		var renderer = new $.RateRenderers[opts.renderer](opts);
		var list = renderer.getList(opts.callback);
		list.appendTo(container);
	};
})(jQuery);