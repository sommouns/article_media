$(document).ready(function(){$(":checkbox[name=xuan]").live("change",function(){this.checked?Cchange($(":checkbox[name=C1]:not(:disabled):not(:checked)"),!0):Cchange($(":checkbox[name=C1]:not(:disabled):checked"),!1)});$(":checkbox[name=C1]").live("change",function(){Cxchange()});$(".All-search-btn").click(function(){$(".mso_sh").is(":hidden")?($(this).addClass("All-search-cur"),$(".mso_sh").show()):($(this).removeClass("All-search-cur"),$(".mso_sh").hide(),0<$(".mso_sh input[type='checkbox']:checked").length?
$(this).addClass("All-search-curr"):$(this).removeClass("All-search-curr"))});$(".lyurl").on("click",function(){layer.load();var a=$(this).attr("lyurl"),b=$(this).attr("title"),c="undefined"==typeof $(this).attr("w")?"1000px":$(this).attr("w"),d="undefined"==typeof $(this).attr("h")?"auto":$(this).attr("h");
$.get(a,function(a){layer_ly(a,b,!1,c,d)})});$(".banktype label").on("click",function(){var a=$(this).attr("for");if(!a)return!1;var b=$('ul[bank_type="'+a+'"] .cur').find("i").attr("class").split("-");$(".banklist").hide();$('ul[bank_type="'+a+'"]').show();$('input[name="bank"]').val(b[1]);$(this).addClass("cur").siblings("label").removeClass("cur");parent.layer.iframeAuto(index)});$(".ly_tips").on("click",function(){layer_ly("<div style='line-height:1.5;padding:10px'>"+$(this).attr("data")+"</div>",
"<b>"+$(this).attr("title")+"</b>",!0,"","auto")});$(".banklist span").on("click",function(){var a=$(this).find("i").attr("class").split("-");$('input[name="bank"]').val(a[1]);$(this).closest("ul").attr("bank_type")?$(this).siblings("span").removeClass("cur"):$(".banklist span").removeClass("cur");$(this).addClass("cur")});$(".shop_admin a:not(.no_click)").click(function(){var a=$(".mwz .cur a").html()+"-"+$(this).html(),b=$(this).closest("tr").attr("id"),c=$(this).attr("class"),d=$(this).closest("tr").attr("good");
"add"==c||"up"==c?$.post("/html/shopadmin",{data:b,action:c,good:d,object:readmeta("Pg-Type")},function(b){layer_ly(b,a,!1,"440px","auto")}):Aform("shop_admin","action="+c+"&object="+readmeta("Pg-Type")+"&data="+b+"&good="+d)});$(".cartdel").click(function(){var a=$(this),b=a.attr("info");check("cartdel","&info="+b,function(b){b.state&&(b=a.closest("dl"),(1<b.children("div").length?a.closest("div"):b).slideUp(500,function(){$(this).remove();carmoney()}))})});$(".order_note").live("click",function(){$val=
$(this).next();$bh=$(this).attr("number");layer.prompt({formType:2,value:$val.html(),title:"\u8ba2\u5355\u5907\u6ce8\uff08\u4ec5\u81ea\u5df1\u53ef\u89c1\uff09"},function(a,b,c){if(a!=$val.html())Aform("note","bh="+$bh+"&txt="+a,function(b){1==b.state&&$val.html(a)});else return layer.alert("\u60a8\u6ca1\u6709\u505a\u4efb\u4f55\u4fee\u6539\uff01",{icon:5}),!1;layer.close(b)})});$(".ubar li").hover(function(){$(this).addClass("hzcur");$(this).children("div").show()},function(){$this=$(this);$this.removeClass("hzcur");
setTimeout(function(){$this.hasClass("hzcur")||$this.children("div").hide()},1)});$(".Batch_operate").live("click",function(){var a=$(this);if(""==$("select[name=batch] option:selected").val())return location.href="/batch/updown",!1;var b=getFormJson();if(void 0===b.C1)return layer.alert("\u81f3\u5c11\u9009\u62e9\u4e00\u6761\u64cd\u4f5c\u5bf9\u8c61\uff01",{icon:5}),!1;if(0<=b.batch.indexOf("/"))return location.href=b.batch+"?bh="+chk(),!1;if("del"==b.batch){if(1!=a.attr("vsafe"))return del_operate(a,
b,$("select[name=batch]").find("option:selected").text(),"\u9009\u4e2d"+$(".msl .cur cite").html()),!1;Batch_confirm(b,$("select[name=batch]").find("option:selected").text(),"\u9009\u4e2d"+$(".msl .cur cite").html());return!1}bulk(b)});$(".single_operate").live("click",function(){var a=getFormJson("form :hidden[value!='']"),b=$(this);a.batch=b.attr("action");a.C1=b.closest("dl").find(":checkbox").val();if("del"==a.batch){if(1!=b.attr("vsafe"))return del_operate(b,a,b.html(),"\u8be5"+$(".msl .cur cite").html()),
!1;Batch_confirm(a,b.html(),"\u8be5"+$(".msl .cur cite").html());return!1}bulk(a)})});$(".jump_page").live("click",function(){var a=$(".jumpbox"),b=$(this);a.is(":hidden")?a.show().animate({width:"155px"},function(){b.addClass("curr");$(".jump_inp").focus()}):a.animate({width:"0"},function(){a.hide();b.removeClass("curr")})});
function jump_page(a){if(""==a)return layer.alert("\u7ffb\u9875\u4e0d\u80fd\u4e3a\u7a7a\uff01",{icon:5},function(a){$(".jump_inp").focus();layer.close(a)}),!1;if(isNaN(a))return layer.alert("\u7ffb\u9875\u53ea\u80fd\u8f93\u5165\u6570\u5b57\uff01",{icon:5},function(a){$(".jump_inp").val("").focus();layer.close(a)}),!1;if(a==parseInt($("#page .ohave").html()))return layer.alert("\u5df2\u5728\u5f53\u524d\u9875\uff0c\u65e0\u9700\u8df3\u8f6c\u7ffb\u9875\uff01",{icon:0},function(a){$(".jump_inp").val("").focus();
layer.close(a)}),!1;if(0>=a)return layer.alert("\u7ffb\u9875\u4e0d\u80fd\u4f4e\u4e8e\u6700\u5c0f\u9875\uff1a<b>1</b>",{icon:0},function(a){$(".jump_inp").val("").focus();layer.close(a)}),!1;if(a>parseInt($("#page").attr("total")))return layer.alert("\u7ffb\u9875\u4e0d\u80fd\u8d85\u8fc7\u6700\u5927\u9875\uff1a<b>"+$("#page").attr("total")+"</b>",{icon:0},function(a){$(".jump_inp").val("").focus();layer.close(a)}),!1;list(a)}
function cancel_cashed(a){layer.confirm("\u786e\u5b9a\u8981<strong style='color:red'>\u64a4\u9500\u63d0\u73b0</strong>\u5417\uff1f<br>\u64a4\u9500\u540e\u63d0\u73b0\u91d1\u989d\u5c06\u8fd4\u56de\u81f3\u60a8\u7684\u8d26\u6237<br><font color=#666666>\u6bcf\u65e5\u4ec5\u53ef\u64a4\u9500\u4e00\u6b21\u63d0\u73b0</font>",{icon:3},function(){Aform("cancel_cashed","bh="+a)})}
function Resulting(a,b,c,d){layer.confirm('<strong style="color:#ff0000">\u8bf7\u5728\u652f\u4ed8\u9875\u9762\u5b8c\u6210\u4ed8\u6b3e! </strong><font color="#666666"><br>\u4ed8\u6b3e\u5b8c\u6210\u524d\u8bf7\u4e0d\u8981\u5173\u95ed\u6b64\u7a97\u53e3\u3002<br>\u4ed8\u6b3e\u5b8c\u6210\u540e\u8bf7\u6839\u636e\u60c5\u51b5\u70b9\u51fb\u4ee5\u4e0b\u6309\u94ae\u3002<br>\u5982\u6709\u7591\u95ee\u8054\u7cfb\u5ba2\u670d<a style="color:#999" title="\u8054\u7cfb\u5ba2\u670d" href="tencent://message/?Menu=yes&amp;uin=938182818&amp;Service=58&amp;SigT=A7F6FEA02730C9883B33E0C9A4CBD2ACC58A098CCB990849D235B06D78AE9E987E51EB75748FE72E7D4348E82CA41DAAF28C77E57A816C7E07F3E44044978552D635A7214B9BABDC8A75C48B1CFE300D02F4624A1CF49E57B74C59CBB7126F7CB3CCE2ECD3F72BA83196BE1AE0597682B97C69376397BBE2&amp;SigU=30E5D5233A443AB2A4CE259063BCFD25E0EAEC6B2EAAD4D2DDDE85C0AF540326838FA2C4848D4C41F14DEB43795B7DBC9583E29523CE61B9641EFF0C3E4087C83B1E788092BB1A39">QQ4008853986</a></font>',{icon:3,
btn:["\u652f\u4ed8\u5b8c\u6210","\u91cd\u65b0\u652f\u4ed8"],shade:[.5,"#fff"],title:!1,closeBtn:!1,area:"350px"},function(){"cashier"==a?location.href="/order/buy":"bond"==a&&location.reload()},function(a){layer.close(a)})}function setupsafe(){$.get("/html/setupsafe",function(a){layer.open({type:1,title:'<b class="blue">\u5b89\u5168\u7801\u8bbe\u7f6e</b>',closeBtn:!1,shade:[.05,"#000"],area:["400px"],shadeClose:!1,content:a})})}
function chk(){var a=[];$("input[name=C1]:checked").each(function(){a.push($(this).val())});return a}function Batch_confirm(a,b,c){layer.confirm("\u786e\u5b9a\u8981<font color=red><b>"+b+"</b></font>"+c+"\u5417\uff1f",{icon:3},function(b){bulk(a);layer.close(b)})}function returnsuccess(a,b,c){c=c||!1;layer.closeAll("iframe");layer.alert(a,{icon:b},function(a){c?location.href=c:location.reload();layer.close(a)})}
function del_operate(a,b,c,d){Aform("vsafe","",function(e){if(0>e.state)return Rs(e),!1;if(0==e.state)return layer.prompt({formType:1,title:"\u8bf7\u8f93\u5165\u5b89\u5168\u7801"},function(b,c,d){Aform("safe","str="+b,function(b){1==b.state?(a.attr("vsafe",1),a.click()):Rs(b);layer.close(c)})}),!1;Batch_confirm(b,c,d)})}
$(".order_handle,.append_handle,.trust_handle").live("click",function(){layer.load();var a=readmeta("Or-Role"),b="undefined"==typeof $(this).attr("number")?readmeta("Or-Number"):$(this).attr("number"),c="undefined"==typeof $(this).attr("utime")?readmeta("Or-Time"):$(this).attr("utime"),d=$(this).hasClass("order_handle")?"order":$(this).hasClass("append_handle")?"append":"trust",e="undefined"==typeof $(this).attr("w")?"order"!=d?680:580:$(this).attr("w");"order"==d&&layer.closeAll("page");$.post("/deal/"+
d,{number:b,role:a,action:$(this).attr("data"),utime:c},function(a){layer_ly(a," ",!1,e+"px")})});$(".order_info").live("click",function(){layer.load();var a="undefined"==typeof $(this).attr("number")?readmeta("Or-Number"):$(this).attr("number"),b="undefined"==typeof $(this).attr("role")?readmeta("Or-Role"):$(this).attr("role");$.post("/deal/"+$(this).attr("action"),{number:a,role:b},function(a){layer_ly(a," ",!1,"580px")})});
$(".order_evaluation").live("click",function(){layer.load();$.post("/deal/evaluation",{number:$(this).attr("number"),role:$(this).attr("role"),object:$(this).attr("object")},function(a){layer_ly(a," ",!1,"580px")})});
$(".trust_action").live("click",function(){var a=$(this).attr("number"),b=$(this).attr("action");if("come"==b)return layer.confirm('<b class="red">\u786e\u5b9a\u8981\u8f6c\u51fa\u6258\u7ba1\u8d4f\u91d1\u5417\uff1f</b><br>\u8f6c\u51fa\u540e\u8be5\u4efb\u52a1\u5c06\u53d8\u6210\u672a\u6258\u7ba1\u72b6\u6001\uff01',{icon:3},function(){dform("number="+a+"&action="+b,"trust")}),!1;dform("number="+a,"trust")});function dconfirm(a,b,c){c=c||"order";layer.confirm(a,{icon:3},function(){dform(b,c)})}
function insert_img(a){var b=$(".filelist img"),c="",d="";0==b.length?c='<cite><b class="blue">\u4eb2\uff0c\u60a8\u8fd8\u6ca1\u6709\u4e0a\u4f20\u7684\u6f14\u793a\u5927\u56fe\uff01</b><br /><br /><input type="button" value="\u524d\u53bb\u4e0a\u4f20" class="layui-btn layui-btn-radius  layui-btn-small" id="go_up"></cite>':($.each(b,function(b){var d=ifstr(a,"[img]"+(b+1)+"[/img]")?"not":"";c+="<div class='"+d+"' id="+(b+1)+"><img src='"+$(this).attr("src")+"'><strong>"+(b+1)+"</strong><span><i></i></span></div>"}),
d="<div class='btns'><input type='button' id='ok' class='layui-btn' value='\u5bfc\u5165\u9009\u4e2d'><input type='button' id='no' class='layui-btn layui-btn-primary' value='\u53d6\u6d88'></div>");$(".insert").html("<div class='pic'>"+c+"</div>"+d+"<div class='prompt'><strong>\u63d0\u793a\uff1a</strong><br /><b>1.</b>\u8be6\u60c5\u5185\u5bb9\u4e0d\u518d\u5141\u8bb8\u4e0a\u4f20\u56fe\u7247\u53ca\u5916\u94fe\u56fe\u7247\uff0c\u4f46\u5141\u8bb8\u5c06\u4e0b\u65b9<span>\u5927\u56fe</span>\u63d2\u5165\u8be6\u60c5\u5185\u5bb9\u4efb\u610f\u4f4d\u7f6e\uff1b<br /><b>2.</b>\u63d2\u5165\u6807\u7b7e<span>[img]\u5e8f\u53f7[/img]</span>\uff0c\u5f53\u5927\u56fe\u6392\u5e8f\u53d8\u5316\u540e\uff0c\u9700\u786e\u8ba4\u5df2\u63d2\u5165\u56fe\u7247\u5e8f\u53f7\u662f\u5426\u5bf9\u5e94\uff1b<br /><b>3.</b>\u672a\u63d2\u5165\u8be6\u60c5\u5185\u5bb9\u7684\u5927\u56fe\u5c06\u6309\u6392\u5e8f\u987a\u5e8f\u4f9d\u6b21\u663e\u793a\u5728\u8be6\u60c5\u4ecb\u7ecd\uff08\u6a21\u7248\u5185\u5bb9\uff09\u4e4b\u540e\u3002</div></div>")}
function Urls(a){var b=$("form *[value!='']").serializeArray();$.each(b,function(b,d){a+="/"+d.name+"/"+d.value});location.href=a};