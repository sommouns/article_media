$(function(){   
  //�ж�������Ƿ�֧��placeholder���� 
  supportPlaceholder='placeholder'in document.createElement('input'), 
  placeholder=function(input){ 
    var text = input.attr('placeholder'), 
    defaultValue = input.defaultValue; 
    if(!defaultValue){ 
      input.val(text).addClass("phcolor"); 
    } 
    input.focus(function(){ 
  
      if(input.val() == text){ 
    
        $(this).val(""); 
      } 
    }); 
  
    input.blur(function(){ 
      if(input.val() == ""){ 
        $(this).val(text).addClass("phcolor"); 
      } 
    }); 
    //������ַ���Ϊ��ɫ 
    input.keydown(function(){ 
      $(this).removeClass("phcolor"); 
    }); 
  }; 
  //���������֧��placeholder����ʱ������placeholder���� 
  if(!supportPlaceholder){ 
    $('input').each(function(){ 
    text = $(this).attr("placeholder"); 
      if($(this).attr("type") == "text" && $(this).val()==''){ 

        placeholder($(this)); 
      } 
    }); 
  } 
  
});

/*jqTransform */
 
(function($){
	var defaultOptions = {preloadImg:true};
	var jqTransformImgPreloaded = false;

	var jqTransformPreloadHoverFocusImg = function(strImgUrl) {
		//guillemets to remove for ie
		strImgUrl = strImgUrl.replace(/^url\((.*)\)/,'$1').replace(/^\"(.*)\"$/,'$1');
		var imgHover = new Image();
		imgHover.src = strImgUrl.replace(/\.([a-zA-Z]*)$/,'-hover.$1');
		var imgFocus = new Image();
		imgFocus.src = strImgUrl.replace(/\.([a-zA-Z]*)$/,'-focus.$1');				
	};

	
	/***************************
	  Labels
	***************************/
	var jqTransformGetLabel = function(objfield){
		var selfForm = $(objfield.get(0).form);
		var oLabel = objfield.next();
		if(!oLabel.is('label')) {
			oLabel = objfield.prev();
			if(oLabel.is('label')){
				var inputname = objfield.attr('id');
				if(inputname){
					oLabel = selfForm.find('label[for="'+inputname+'"]');
				} 
			}
		}
		if(oLabel.is('label')){return oLabel.css('cursor','pointer');}
		return false;
	};
	
	/* Hide all open selects */
	var jqTransformHideSelect = function(oTarget){
		var ulVisible = $('.jqTransformSelectWrapper ul:visible');
		
		ulVisible.each(function(){
			var oSelect = $(this).parents(".jqTransformSelectWrapper:first").find("select").get(0);
			//do not hide if click on the label object associated to the select
			if( !(oTarget && oSelect.oLabel && oSelect.oLabel.get(0) == oTarget.get(0)) ){$(this).hide();	}
		});
	};
	/* Check for an external click */
	var jqTransformCheckExternalClick = function(event) {
		if ($(event.target).parents('.jqTransformSelectWrapper').length === 0) { jqTransformHideSelect($(event.target)); }
	};

	/* Apply document listener */
	var jqTransformAddDocumentListener = function (){
		$(document).mousedown(jqTransformCheckExternalClick);
	};	
			
	/* Add a new handler for the reset action */
	var jqTransformReset = function(f){
		var sel;
		$('.jqTransformSelectWrapper select', f).each(function(){sel = (this.selectedIndex<0) ? 0 : this.selectedIndex; $('ul', $(this).parent()).each(function(){$('a:eq('+ sel +')', this).click();});});
		$('a.jqTransformCheckbox, a.jqTransformRadio', f).removeClass('jqTransformChecked');
		$('input:checkbox, input:radio', f).each(function(){if(this.checked){$('a', $(this).parent()).addClass('jqTransformChecked');}});
	};


	
	/***************************
	  Check Boxes 
	 ***************************/	
	$.fn.jqTransCheckBox = function(){
		return this.each(function(){
			if($(this).hasClass('jqTransformHidden')) {return;}

			var $input = $(this);
			var inputSelf = this;

			//set the click on the label
			var oLabel=jqTransformGetLabel($input);
			oLabel && oLabel.click(function(){aLink.trigger('click');});
			
			var aLink = $('<a href="#" class="jqTransformCheckbox"></a>');
			//wrap and add the link
			$input.addClass('jqTransformHidden').wrap('<dt class="jqTransformCheckboxWrapper"></dt>').parent().prepend(aLink);
			//on change, change the class of the link
			$input.change(function(){
				this.checked && aLink.addClass('jqTransformChecked') || aLink.removeClass('jqTransformChecked');
				return true;
			});
			// Click Handler, trigger the click and change event on the input
			aLink.click(function(){
				//do nothing if the original input is disabled
				if($input.attr('disabled')){return false;}
				//trigger the envents on the input object
				$input.trigger('click').trigger("change");	
				return false;
			});

			// set the default state
			this.checked && aLink.addClass('jqTransformChecked');		
		});
	};
	/***************************
	  Radio Buttons 
	 ***************************/	
	$.fn.jqTransRadio = function(){
		  
		return this.each(function(){
	
			if($(this).hasClass('jqTransformHidden')) {return;}

			var $input = $(this);
			var inputSelf = this;
				
			oLabel = jqTransformGetLabel($input);
			oLabel && oLabel.click(function(){aLink.trigger('click');});
	
			var aLink = $('<a href="#" class="jqTransformRadio" rel="'+ this.name +'"></a>');
			$input.addClass('jqTransformHidden').wrap('<dt class="jqTransformRadioWrapper"></dt>').parent().prepend(aLink);
			
			$input.change(function(){
				inputSelf.checked && aLink.addClass('jqTransformChecked').next().attr("checked",true) || aLink.removeClass('jqTransformChecked').next().attr("checked",false);
			
				return true;
			});
			// Click Handler
			aLink.click(function(){
				if($input.val()=='custom'){$('#'+$input.attr('name')+'_custom').show();
				$('input[name="'+$input.attr('name')+'_custom"]').focus();
				}else{
				$('#'+$input.attr('name')+'_custom').hide();
				}
				if($input.attr('disabled')){return false;}

				$input.trigger('click').trigger('change');
	
				// uncheck all others of same name input radio elements
				$('input[name="'+$input.attr('name')+'"]',inputSelf.form).not($input).each(function(){
					$(this).attr('type')=='radio' && $(this).trigger('change');
				});
	
				return false;					
			});
			// set the default state
			inputSelf.checked && aLink.addClass('jqTransformChecked');
		});
	};
	
	
	/***************************
	  Select 
	 ***************************/	
	$.fn.jqTransSelect = function(){
		return this.each(function(index){
			var $select = $(this);
			if($select.hasClass('jqTransformHidden')) {return;}
			if($select.attr('multiple')) {return;}

			var oLabel  =  jqTransformGetLabel($select);
			/* First thing we do is Wrap it */
			var $wrapper = $select
				.addClass('jqTransformHidden')
				.wrap('<div class="jqTransformSelectWrapper"></div>')
				.parent()
				.css({zIndex: 10-index})
			;
			
			/* Now add the html for the select */
			$wrapper.prepend('<div><dt></dt><a href="#" class="jqTransformSelectOpen"></a></div><dl></dl>');
			var $ul = $('dl', $wrapper).css('width',$select.width()).hide();
			/* Now we add the options */
			$('option', this).each(function(i){
				var oLi = $('<dd><a href="#" index="'+ i +'">'+ $(this).html() +'</a></dd>');
				$ul.append(oLi);
			});
			
			/* Add click handler to the a */
			$ul.find('a').click(function(){
					$('a.selected', $wrapper).removeClass('selected');
					$(this).addClass('selected');	
					/* Fire the onchange event */
					if ($select[0].selectedIndex != $(this).attr('index') && $select[0].onchange) {$select[0].selectedIndex = $(this).attr('index'); $select[0].onchange(); }
					$select[0].selectedIndex = $(this).attr('index');
					$('dt:eq(0)', $wrapper).html($(this).html());
					$('a.jqTransformSelectOpen', $wrapper).removeClass('jqTransformSelectend');
					$ul.hide();
					return false;
			});
			/* Set the default */
			$('a:eq('+ this.selectedIndex +')', $ul).click();
			$('dt:first', $wrapper).click(function(){$("a.jqTransformSelectOpen",$wrapper).trigger('click');					
});
			oLabel && oLabel.click(function(){$("a.jqTransformSelectOpen",$wrapper).trigger('click');});
			this.oLabel = oLabel;
			
			/* Apply the click handler to the Open */
			var oLinkOpen = $('a.jqTransformSelectOpen', $wrapper)
				.click(function(){	
											

					//Check if box is already open to still allow toggle, but close all other selects
					
					if( $ul.css('display') == 'none' ) {          $('a.jqTransformSelectOpen', $wrapper).addClass('jqTransformSelectend');jqTransformHideSelect();}else{$('a.jqTransformSelectOpen', $wrapper).removeClass('jqTransformSelectend');
					}
					if($select.attr('disabled')){return false;}

					$ul.slideToggle('fast', function(){		
						var offSet = ($('a.selected', $ul).offset().top - $ul.offset().top);
						$ul.animate({scrollTop: offSet});
					});
					return false;
				})
			;

			// Set the new width
			var iSelectWidth = $select.outerWidth();
			var oSpan = $('dt:first',$wrapper);
			var newWidth = (iSelectWidth > oSpan.innerWidth())?iSelectWidth+oLinkOpen.outerWidth():$wrapper.width();
			$wrapper.css('width',newWidth);
			$ul.css({"margin-left":-1,"width":newWidth});
			oSpan.css({width:iSelectWidth});
		
			// Calculate the height if necessary, less elements that the default height
			//show the ul to calculate the block, if ul is not displayed li height value is 0
			$ul.css({display:'block',visibility:'hidden'});
			var iSelectHeight = ($('dd',$ul).length)*($('dd:first',$ul).height());//+1 else bug ff
			(iSelectHeight < $ul.height()) && $ul.css({height:iSelectHeight,'overflow':'hidden'});//hidden else bug with ff
			$ul.css({display:'none',visibility:'visible'});
			
		});
	};
	$.fn.jqTransform = function(options){
		var opt = $.extend({},defaultOptions,options);
		
		/* each form */
		 return this.each(function(){
		
			var selfForm = $(this);
			if(selfForm.hasClass('jqtransformdone')) {return;}
			selfForm.addClass('jqtransformdone');
			$('input:checkbox', this).jqTransCheckBox();
			$('input:radio', this).jqTransRadio();
	
			if( $('select', this).jqTransSelect().length > 0 ){jqTransformAddDocumentListener();}
			selfForm.bind('reset',function(){var action = function(){jqTransformReset(this);}; window.setTimeout(action, 10);});
			
		}); /* End Form each */
				
	};/* End the Plugin */

})(jQuery);
				   