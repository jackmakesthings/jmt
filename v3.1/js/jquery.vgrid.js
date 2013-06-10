/**
 * jQuery VGrid v0.1.6 - variable grid layout plugin
 *
 * Terms of Use - jQuery VGrid
 * under the MIT (http://www.opensource.org/licenses/mit-license.php) License.
 *
 * Copyright 2009-2010 xlune.com All rights reserved.
 * (http://blog.xlune.com/2009/09/jqueryvgrid.html)
 */
(function(h){function p(a){var b=a.data("_vgchild"),e=[[0,a.width(),0]],i=0,c,m,n;b.each(function(){c=h(this);var f=c.width(),d=c.height();f+=Number(c.css("margin-left").replace("px",""))+Number(c.css("padding-left").replace("px",""))+Number(c.get(0).style.borderLeftWidth.replace("px",""))+Number(c.css("margin-right").replace("px",""))+Number(c.css("padding-right").replace("px",""))+Number(c.get(0).style.borderRightWidth.replace("px",""));d+=Number(c.css("margin-top").replace("px",""))+Number(c.css("padding-top").replace("px",
""))+Number(c.get(0).style.borderTopWidth.replace("px",""))+Number(c.css("margin-bottom").replace("px",""))+Number(c.css("padding-bottom").replace("px",""))+Number(c.get(0).style.borderBottomWidth.replace("px",""));m=[f,d];a:{f=m[0];d=e.concat().sort(t);for(var g=d[d.length-1][2],j=0,k=d.length;j<k;j++){if(d[j][2]>=g)break;if(d[j][1]-d[j][0]>=f){n=[d[j][0],d[j][2]];break a}}n=[0,g]}d=n;f=e.concat().sort(t);d=[d[0],d[0]+m[0],d[1]+m[1]];g=0;for(j=f.length;g<j;g++)if(d[0]<=f[g][0]&&f[g][1]<=d[1])delete f[g];
else{k=f;var q=g,l=f[g],o=d;if(l[0]>=o[0]&&l[0]<o[1]||l[1]>=o[0]&&l[1]<o[1])if(l[0]>=o[0]&&l[0]<o[1])l[0]=o[1];else l[1]=o[0];k[q]=l}f=f.concat([d]).sort(u);d=[];g=0;for(j=f.length;g<j;g++)if(f[g])if(d.length>0&&d[d.length-1][1]==f[g][0]&&d[d.length-1][2]==f[g][2])d[d.length-1][1]=f[g][1];else d.push(f[g]);e=d;i=Math.max(i,n[1]+m[1]);c.data("_vgleft",n[0]);c.data("_vgtop",n[1])});a.data("_vgwrapheight",i);v(a)}function t(a,b){if(!a||!b)return 0;return a[2]==b[2]&&a[0]>b[0]||a[2]>b[2]?1:-1}function u(a,
b){if(!a||!b)return 0;return a[0]>b[0]?1:-1}function v(a){var b=a.data("_vgchild").length*(a.data("_vgopt").delay||0)+a.data("_vgopt").time||500;a.stop();if(a.height()<a.data("_vgwrapheight"))h.browser.msie?a.height(a.data("_vgwrapheight")):a.animate({height:a.data("_vgwrapheight")+"px"},a.data("_vgopt").time||500,"easeOutQuart");else{clearTimeout(a.data("_vgwraptimeout"));a.data("_vgwraptimeout",setTimeout(function(){h.browser.msie?a.height(a.data("_vgwrapheight")):a.animate({height:a.data("_vgwrapheight")+
"px"},a.data("_vgopt").time||500,"easeOutQuart")},b))}}function w(a){var b;a.each(function(){b=h(this);b.css("left",~~b.data("_vgleft")+"px");b.css("top",~~b.data("_vgtop")+"px")})}function r(a,b,e,i){var c=h(a).parent(),m=false,n=a.length,f,d,g;for(f=0;f<n;f++){d=h(a[f]);g=d.position();if(g.left!=d.data("_vgleft")&&g.top!=d.data("_vgtop"))m=true}if(m){typeof c.data("_vgopt").onStart=="function"&&c.data("_vgopt").onStart();a.each(function(j){var k=h(this),q={duration:e,easing:b};if(a.size()-1==j)q.complete=
c.data("_vgopt").onFinish||null;clearTimeout(k.data("_vgtimeout"));k.data("_vgtimeout",setTimeout(function(){k.animate({left:k.data("_vgleft")+"px",top:k.data("_vgtop")+"px"},q)},j*i))})}}function s(a){clearTimeout(a.data("_vgtimeout"));p(a);a.data("_vgtimeout",setTimeout(function(){r(a.data("_vgchild"),a.data("_vgopt").easeing||"linear",a.data("_vgopt").time||500,a.data("_vgopt").delay||0)},500))}function x(a,b){var e=h("<span />").text(" ").attr("id","_vgridspan").hide().appendTo("body");e.data("size",
e.css("font-size"));e.data("timer",setInterval(function(){if(e.css("font-size")!=e.data("size")){e.data("size",e.css("font-size"));b(a)}},1E3))}function y(a,b){a.bind("vgrid-added",function(){a.find("img").bind("load",function(){b(a)})});a.trigger("vgrid-added");var e=a.append,i=a.prepend;a.append=function(){e.apply(a,arguments);a.trigger("vgrid-added")};a.prepend=function(){i.apply(a,arguments);a.trigger("vgrid-added")}}h.fn.extend({vgrid:function(a){var b=h(this);a=a||{};b.data("_vgopt",a);b.data("_vgchild",
b.find("> *"));b.data("_vgdefchild",b.data("_vgchild"));b.css({position:"relative",width:"auto"});b.data("_vgchild").css("position","absolute");p(b);w(b.data("_vgchild"));if(b.data("_vgopt").fadeIn){var e=typeof b.data("_vgopt").fadeIn=="object"?b.data("_vgopt").fadeIn:{time:b.data("_vgopt").fadeIn};b.data("_vgchild").each(function(i){var c=h(this);c.css("display","none");setTimeout(function(){c.fadeIn(e.time||250)},i*(e.delay||0))})}h(window).resize(function(){s(b)});a.useLoadImageEvent&&y(b,s);
a.useFontSizeListener&&x(b,s);return b},vgrefresh:function(a,b,e,i){var c=h(this);if(c.data("_vgchild")){c.data("_vgchild",c.find("> *"));c.data("_vgchild").css("position","absolute");p(c);b=typeof b=="number"?b:c.data("_vgopt").time||500;e=typeof e=="number"?e:c.data("_vgopt").delay||0;r(c.data("_vgchild"),a||c.data("_vgopt").easeing||"linear",b,e);typeof i=="function"&&setTimeout(i,c.data("_vgchild").length*e+b)}return c},vgsort:function(a,b,e,i){var c=h(this);if(c.data("_vgchild")){c.data("_vgchild",
c.data("_vgchild").sort(a));c.data("_vgchild").each(function(){h(this).appendTo(c)});p(c);r(c.data("_vgchild"),b||c.data("_vgopt").easeing||"linear",typeof e=="number"?e:c.data("_vgopt").time||500,typeof i=="number"?i:c.data("_vgopt").delay||0)}return c}})})(jQuery);


