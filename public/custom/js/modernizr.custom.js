!function(e,t,n){var r=[],s=[],o={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){s.push({name:e,fn:t,options:n})},addAsyncTest:function(e){s.push({name:null,fn:e})}},i=function(){};function a(e,t){return typeof e===t}i.prototype=o,(i=new i).addTest("svg",!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect),i.addTest("localstorage",function(){var e="modernizr";try{return localStorage.setItem(e,e),localStorage.removeItem(e),!0}catch(e){return!1}}),i.addTest("sessionstorage",function(){var e="modernizr";try{return sessionStorage.setItem(e,e),sessionStorage.removeItem(e),!0}catch(e){return!1}}),i.addTest("websqldatabase","openDatabase"in e),i.addTest("svgfilters",function(){var t=!1;try{t="SVGFEColorMatrixElement"in e&&2==SVGFEColorMatrixElement.SVG_FECOLORMATRIX_TYPE_SATURATE}catch(e){}return t});var l=t.documentElement,u="svg"===l.nodeName.toLowerCase();function d(e){var t=l.className,n=i._config.classPrefix||"";if(u&&(t=t.baseVal),i._config.enableJSClass){var r=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(r,"$1"+n+"js$2")}i._config.enableClasses&&(t+=" "+n+e.join(" "+n),u?l.className.baseVal=t:l.className=t)}function c(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):u?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}var f=function(){var e=!("onblur"in t.documentElement);return function(t,r){var s;return!!t&&(r&&"string"!=typeof r||(r=c(r||"div")),!(s=(t="on"+t)in r)&&e&&(r.setAttribute||(r=c("div")),r.setAttribute(t,""),s="function"==typeof r[t],r[t]!==n&&(r[t]=n),r.removeAttribute(t)),s)}}();o.hasEvent=f,i.addTest("bgpositionshorthand",function(){var e=c("a").style,t="right 10px bottom 10px";return e.cssText="background-position: "+t+";",e.backgroundPosition===t}),i.addTest("multiplebgs",function(){var e=c("a").style;return e.cssText="background:url(https://),url(https://),red url(https://)",/(url\s*\(.*?){3}/.test(e.background)}),i.addTest("preserve3d",function(){var t,n,r=e.CSS,s=!1;return!!(r&&r.supports&&r.supports("(transform-style: preserve-3d)"))||(t=c("a"),n=c("a"),t.style.cssText="display: block; transform-style: preserve-3d; transform-origin: right; transform: rotateY(40deg);",n.style.cssText="display: block; width: 9px; height: 1px; background: #000; transform-origin: right; transform: rotateY(40deg);",t.appendChild(n),l.appendChild(t),s=n.getBoundingClientRect(),l.removeChild(t),s=s.width&&s.width<4)}),i.addTest("inlinesvg",function(){var e=c("div");return e.innerHTML="<svg/>","http://www.w3.org/2000/svg"==("undefined"!=typeof SVGRect&&e.firstChild&&e.firstChild.namespaceURI)});var p=o._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];o._prefixes=p,i.addTest("csscalc",function(){var e=c("a");return e.style.cssText="width:"+p.join("calc(10px);width:"),!!e.style.length});var g="CSS"in e&&"supports"in e.CSS,m="supportsCSS"in e;i.addTest("supports",g||m);var h={}.toString;function v(e,n,r,s){var o,i,a,d,f,p="modernizr",g=c("div"),m=((f=t.body)||((f=c(u?"svg":"body")).fake=!0),f);if(parseInt(r,10))for(;r--;)(a=c("div")).id=s?s[r]:p+(r+1),g.appendChild(a);return(o=c("style")).type="text/css",o.id="s"+p,(m.fake?m:g).appendChild(o),m.appendChild(g),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(t.createTextNode(e)),g.id=p,m.fake&&(m.style.background="",m.style.overflow="hidden",d=l.style.overflow,l.style.overflow="hidden",l.appendChild(m)),i=n(g,e),m.fake?(m.parentNode.removeChild(m),l.style.overflow=d,l.offsetHeight):g.parentNode.removeChild(g),!!i}i.addTest("svgclippaths",function(){return!!t.createElementNS&&/SVGClipPath/.test(h.call(t.createElementNS("http://www.w3.org/2000/svg","clipPath")))}),i.addTest("svgforeignobject",function(){return!!t.createElementNS&&/SVGForeignObject/.test(h.call(t.createElementNS("http://www.w3.org/2000/svg","foreignObject")))}),i.addTest("smil",function(){return!!t.createElementNS&&/SVGAnimate/.test(h.call(t.createElementNS("http://www.w3.org/2000/svg","animate")))});var y,w=(y=e.matchMedia||e.msMatchMedia)?function(e){var t=y(e);return t&&t.matches||!1}:function(t){var n=!1;return v("@media "+t+" { #modernizr { position: absolute; } }",function(t){n="absolute"==(e.getComputedStyle?e.getComputedStyle(t,null):t.currentStyle).position}),n};o.mq=w;var S,T,b,C,x,_=o.testStyles=v;function E(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function R(e,t){if("object"==typeof e)for(var n in e)C(e,n)&&R(n,e[n]);else{var r=(e=e.toLowerCase()).split("."),s=i[r[0]];if(2==r.length&&(s=s[r[1]]),void 0!==s)return i;t="function"==typeof t?t():t,1==r.length?i[r[0]]=t:(!i[r[0]]||i[r[0]]instanceof Boolean||(i[r[0]]=new Boolean(i[r[0]])),i[r[0]][r[1]]=t),d([(t&&0!=t?"":"no-")+r.join("-")]),i._trigger(e,t)}return i}i.addTest("touchevents",function(){var n;if("ontouchstart"in e||e.DocumentTouch&&t instanceof DocumentTouch)n=!0;else{var r=["@media (",p.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");_(r,function(e){n=9===e.offsetTop})}return n}),(S=navigator.userAgent,T=S.match(/w(eb)?osbrowser/gi),b=S.match(/windows phone/gi)&&S.match(/iemobile\/([0-9])+/gi)&&parseFloat(RegExp.$1)>=9,T||b)?i.addTest("fontface",!1):_('@font-face {font-family:"font";src:url("https://")}',function(e,n){var r=t.getElementById("smodernizr"),s=r.sheet||r.styleSheet,o=s?s.cssRules&&s.cssRules[0]?s.cssRules[0].cssText:s.cssText||"":"",a=/src/i.test(o)&&0===o.indexOf(n.split(" ")[0]);i.addTest("fontface",a)}),C=a(x={}.hasOwnProperty,"undefined")||a(x.call,"undefined")?function(e,t){return t in e&&a(e.constructor.prototype[t],"undefined")}:function(e,t){return x.call(e,t)},o._l={},o.on=function(e,t){this._l[e]||(this._l[e]=[]),this._l[e].push(t),i.hasOwnProperty(e)&&setTimeout(function(){i._trigger(e,i[e])},0)},o._trigger=function(e,t){if(this._l[e]){var n=this._l[e];setTimeout(function(){var e;for(e=0;e<n.length;e++)(0,n[e])(t)},0),delete this._l[e]}},i._q.push(function(){o.addTest=R}),i.addTest("svgasimg",t.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1"));var O="Moz O ms Webkit",P=o._config.usePrefixes?O.split(" "):[];o._cssomPrefixes=P;var k=function(t){var r,s=p.length,o=e.CSSRule;if(void 0===o)return n;if(!t)return!1;if((r=(t=t.replace(/^@/,"")).replace(/-/g,"_").toUpperCase()+"_RULE")in o)return"@"+t;for(var i=0;i<s;i++){var a=p[i];if(a.toUpperCase()+"_"+r in o)return"@-"+a.toLowerCase()+"-"+t}return!1};o.atRule=k;var A=o._config.usePrefixes?O.toLowerCase().split(" "):[];function N(e,t){return function(){return e.apply(t,arguments)}}o._domPrefixes=A;var z={elem:c("modernizr")};i._q.push(function(){delete z.elem});var j={style:z.elem.style};function M(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function V(t,r){var s=t.length;if("CSS"in e&&"supports"in e.CSS){for(;s--;)if(e.CSS.supports(M(t[s]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var o=[];s--;)o.push("("+M(t[s])+":"+r+")");return v("@supports ("+(o=o.join(" or "))+") { #modernizr { position: absolute; } }",function(t){return"absolute"==function(t,n,r){var s;if("getComputedStyle"in e){s=getComputedStyle.call(e,t,n);var o=e.console;null!==s?r&&(s=s.getPropertyValue(r)):o&&o[o.error?"error":"log"].call(o,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}else s=!n&&t.currentStyle&&t.currentStyle[r];return s}(t,null,"position")})}return n}function I(e,t,r,s,o){var i=e.charAt(0).toUpperCase()+e.slice(1),l=(e+" "+P.join(i+" ")+i).split(" ");return a(t,"string")||a(t,"undefined")?function(e,t,r,s){if(s=!a(s,"undefined")&&s,!a(r,"undefined")){var o=V(e,r);if(!a(o,"undefined"))return o}for(var i,l,u,d,f,p=["modernizr","tspan","samp"];!j.style&&p.length;)i=!0,j.modElem=c(p.shift()),j.style=j.modElem.style;function g(){i&&(delete j.style,delete j.modElem)}for(u=e.length,l=0;l<u;l++)if(d=e[l],f=j.style[d],~(""+d).indexOf("-")&&(d=E(d)),j.style[d]!==n){if(s||a(r,"undefined"))return g(),"pfx"!=t||d;try{j.style[d]=r}catch(e){}if(j.style[d]!=f)return g(),"pfx"!=t||d}return g(),!1}(l,t,s,o):function(e,t,n){var r;for(var s in e)if(e[s]in t)return!1===n?e[s]:a(r=t[e[s]],"function")?N(r,n||t):r;return!1}(l=(e+" "+A.join(i+" ")+i).split(" "),t,r)}i._q.unshift(function(){delete j.style}),o.testAllProps=I;var L=o.prefixed=function(e,t,n){return 0===e.indexOf("@")?k(e):(-1!=e.indexOf("-")&&(e=E(e)),t?I(e,t,n):I(e,"pfx"))};function F(e,t,r){return I(e,n,n,t,r)}i.addTest("forcetouch",function(){return!!f(L("mouseforcewillbegin",e,!1),e)&&(MouseEvent.WEBKIT_FORCE_AT_MOUSE_DOWN&&MouseEvent.WEBKIT_FORCE_AT_FORCE_MOUSE_DOWN)}),i.addTest("matchmedia",!!L("matchMedia",e)),o.testAllProps=F,i.addTest("cssanimations",F("animationName","a",!0)),i.addTest("bgpositionxy",function(){return F("backgroundPositionX","3px",!0)&&F("backgroundPositionY","5px",!0)}),i.addTest("bgrepeatround",F("backgroundRepeat","round")),i.addTest("bgrepeatspace",F("backgroundRepeat","space")),i.addTest("bgsizecover",F("backgroundSize","cover")),i.addTest("borderradius",F("borderRadius","0px",!0)),i.addTest("flexboxtweener",F("flexAlign","end",!0)),i.addTest("csstransforms",function(){return-1===navigator.userAgent.indexOf("Android 2.")&&F("transform","scale(1)",!0)}),i.addTest("csstransforms3d",function(){return!!F("perspective","1px",!0)}),i.addTest("csstransitions",F("transition","all",!0)),function(){var e,t,n,o,l,u;for(var d in s)if(s.hasOwnProperty(d)){if(e=[],(t=s[d]).name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(o=a(t.fn,"function")?t.fn():t.fn,l=0;l<e.length;l++)1===(u=e[l].split(".")).length?i[u[0]]=o:(!i[u[0]]||i[u[0]]instanceof Boolean||(i[u[0]]=new Boolean(i[u[0]])),i[u[0]][u[1]]=o),r.push((o?"":"no-")+u.join("-"))}}(),d(r),delete o.addTest,delete o.addAsyncTest;for(var G=0;G<i._q.length;G++)i._q[G]();e.Modernizr=i}(window,document);