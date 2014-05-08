/* YUI 3.9.1 (build 5852) Copyright 2013 Yahoo! Inc. http://yuilibrary.com/license/ */
YUI.add("cache-base",function(e,t){var n=e.Lang,r=e.Lang.isDate,i=function(){i.superclass.constructor.apply(this,arguments)};e.mix(i,{NAME:"cache",ATTRS:{max:{value:0,setter:"_setMax"},size:{readOnly:!0,getter:"_getSize"},uniqueKeys:{value:!1},expires:{value:0,validator:function(t){return e.Lang.isDate(t)||e.Lang.isNumber(t)&&t>=0}},entries:{readOnly:!0,getter:"_getEntries"}}}),e.extend(i,e.Base,{_entries:null,initializer:function(e){this.publish("add",{defaultFn:this._defAddFn}),this.publish("flush",{defaultFn:this._defFlushFn}),this._entries=[]},destructor:function(){this._entries=[]},_setMax:function(e){var t=this._entries;if(e>0){if(t)while(t.length>e)t.shift()}else e=0,this._entries=[];return e},_getSize:function(){return this._entries.length},_getEntries:function(){return this._entries},_defAddFn:function(e){var t=this._entries,r=e.entry,i=this.get("max"),s;this.get("uniqueKeys")&&(s=this._position(e.entry.request),n.isValue(s)&&t.splice(s,1));while(i&&t.length>=i)t.shift();t[t.length]=r},_defFlushFn:function(e){var t=this._entries,r=e.details[0],i;r&&n.isValue(r.request)?(i=this._position(r.request),n.isValue(i)&&t.splice(i,1)):this._entries=[]},_isMatch:function(e,t){return!t.expires||new Date<t.expires?e===t.request:!1},_position:function(e){var t=this._entries,n=t.length,r=n-1;if(this.get("max")===null||this.get("max")>0)for(;r>=0;r--)if(this._isMatch(e,t[r]))return r;return null},add:function(e,t){var i=this.get("expires");this.get("initialized")&&(this.get("max")===null||this.get("max")>0)&&(n.isValue(e)||n.isNull(e)||n.isUndefined(e))&&this.fire("add",{entry:{request:e,response:t,cached:new Date,expires:r(i)?i:i?new Date((new Date).getTime()+this.get("expires")):null}})},flush:function(e){this.fire("flush",{request:n.isValue(e)?e:null})},retrieve:function(e){var t=this._entries,r=t.length,i=null,s;if(r>0&&(this.get("max")===null||this.get("max")>0)){this.fire("request",{request:e}),s=this._position(e);if(n.isValue(s))return i=t[s],this.fire("retrieve",{entry:i}),s<r-1&&(t.splice(s,1),t[t.length]=i),i}return null}}),e.Cache=i},"3.9.1",{requires:["base"]});
/* YUI 3.9.1 (build 5852) Copyright 2013 Yahoo! Inc. http://yuilibrary.com/license/ */
YUI.add("json-stringify",function(e,t){var n=":",r=e.config.global.JSON;e.mix(e.namespace("JSON"),{dateToString:function(e){function t(e){return e<10?"0"+e:e}return e.getUTCFullYear()+"-"+t(e.getUTCMonth()+1)+"-"+t(e.getUTCDate())+"T"+t(e.getUTCHours())+n+t(e.getUTCMinutes())+n+t(e.getUTCSeconds())+"Z"},stringify:function(){return r.stringify.apply(r,arguments)},charCacheThreshold:100})},"3.9.1",{requires:["yui-base"]});
/* YUI 3.9.1 (build 5852) Copyright 2013 Yahoo! Inc. http://yuilibrary.com/license/ */
YUI.add("cache-offline",function(e,t){function n(){n.superclass.constructor.apply(this,arguments)}var r=null,i=e.JSON;try{r=e.config.win.localStorage}catch(s){}e.mix(n,{NAME:"cacheOffline",ATTRS:{sandbox:{value:"default",writeOnce:"initOnly"},expires:{value:864e5},max:{value:null,readOnly:!0},uniqueKeys:{value:!0,readOnly:!0,setter:function(){return!0}}},flushAll:function(){var e=r,t;if(e)if(e.clear)e.clear();else for(t in e)e.hasOwnProperty(t)&&(e.removeItem(t),delete e[t])}}),e.extend(n,e.Cache,r?{_setMax:function(e){return null},_getSize:function(){var e=0,t=0,n=r.length;for(;t<n;++t)r.key(t).indexOf(this.get("sandbox"))===0&&e++;return e},_getEntries:function(){var e=[],t=0,n=r.length,s=this.get("sandbox");for(;t<n;++t)r.key(t).indexOf(s)===0&&(e[t]=i.parse(r.key(t).substring(s.length)));return e},_defAddFn:function(e){var t=e.entry,n=t.request,s=t.cached,o=t.expires;t.cached=s.getTime(),t.expires=o?o.getTime():o;try{r.setItem(this.get("sandbox")+i.stringify({request:n}),i.stringify(t))}catch(u){this.fire("error",{error:u})}},_defFlushFn:function(e){var t,n=r.length-1;for(;n>-1;--n)t=r.key(n),t.indexOf(this.get("sandbox"))===0&&r.removeItem(t)},retrieve:function(e){this.fire("request",{request:e});var t,n,s;try{s=this.get("sandbox")+i.stringify({request:e});try{t=i.parse(r.getItem(s))}catch(o){}}catch(u){}if(t){t.cached=new Date(t.cached),n=t.expires,n=n?new Date(n):null,t.expires=n;if(this._isMatch(e,t))return this.fire("retrieve",{entry:t}),t}return null}}:{_setMax:function(e){return null}}),e.CacheOffline=n},"3.9.1",{requires:["cache-base","json"]});
/* YUI 3.9.1 (build 5852) Copyright 2013 Yahoo! Inc. http://yuilibrary.com/license/ */
YUI.add("plugin",function(e,t){function n(t){!this.hasImpl||!this.hasImpl(e.Plugin.Base)?n.superclass.constructor.apply(this,arguments):n.prototype.initializer.apply(this,arguments)}n.ATTRS={host:{writeOnce:!0}},n.NAME="plugin",n.NS="plugin",e.extend(n,e.Base,{_handles:null,initializer:function(e){this._handles=[]},destructor:function(){if(this._handles)for(var e=0,t=this._handles.length;e<t;e++)this._handles[e].detach()},doBefore:function(e,t,n){var r=this.get("host"),i;return e in r?i=this.beforeHostMethod(e,t,n):r.on&&(i=this.onHostEvent(e,t,n)),i},doAfter:function(e,t,n){var r=this.get("host"),i;return e in r?i=this.afterHostMethod(e,t,n):r.after&&(i=this.afterHostEvent(e,t,n)),i},onHostEvent:function(e,t,n){var r=this.get("host").on(e,t,n||this);return this._handles.push(r),r},afterHostEvent:function(e,t,n){var r=this.get("host").after(e,t,n||this);return this._handles.push(r),r},beforeHostMethod:function(t,n,r){var i=e.Do.before(n,this.get("host"),t,r||this);return this._handles.push(i),i},afterHostMethod:function(t,n,r){var i=e.Do.after(n,this.get("host"),t,r||this);return this._handles.push(i),i},toString:function(){return this.constructor.NAME+"["+this.constructor.NS+"]"}}),e.namespace("Plugin").Base=n},"3.9.1",{requires:["base-base"]});
/* YUI 3.9.1 (build 5852) Copyright 2013 Yahoo! Inc. http://yuilibrary.com/license/ */
YUI.add("cache-plugin",function(e,t){function n(t){var n=t&&t.cache?t.cache:e.Cache,r=e.Base.create("dataSourceCache",n,[e.Plugin.Base]),i=new r(t);return r.NS="tmpClass",i}e.mix(n,{NS:"cache",NAME:"cachePlugin"}),e.namespace("Plugin").Cache=n},"3.9.1",{requires:["plugin","cache-base"]});
YUI.add("moodle-core-tooltip",function(e,t){function n(e){e||(e={}),typeof e.draggable=="undefined"&&(e.draggable=!0),typeof e.constrain=="undefined"&&(e.constrain=!0),typeof e.lightbox=="undefined"&&(e.lightbox=!1),n.superclass.constructor.apply(this,[e])}var r={CLOSEBUTTON:".closebutton"},i={PANELTEXT:"tooltiptext"},s={WAITICON:{pix:"i/loading_small",component:"moodle"}},o={};n.NAME="moodle-core-tooltip",n.CSS_PREFIX="moodle-dialogue",n.ATTRS=o,o.initialheadertext={value:""},o.initialbodytext={value:"",setter:function(t){var n,r;return n=e.Node.create("<div />").addClass(i.PANELTEXT),r=e.Node.create("<img />").setAttribute("src",M.util.image_url(s.WAITICON.pix,s.WAITICON.component)).addClass("spinner"),t?(n.set("text",t),r.addClass("iconsmall")):n.addClass("content-lightbox"),n.append(r),n}},o.initialfootertext={value:null,setter:function(t){if(t)return e.Node.create("<div />").set("text",t)}},o.headerhandler={value:"set_header_content"},o.bodyhandler={value:"set_body_content"},o.footerhandler={value:null},o.urlmodifier={value:null},o.textcache={value:null},o.textcachesize={value:10},e.extend(n,M.core.dialogue,{bb:null,listenevents:[],textcache:null,alignpoints:[e.WidgetPositionAlign.TL,e.WidgetPositionAlign.RC],initializer:function(){return this.get("headerhandler")||this.set("headerhandler",this.set_header_content),this.get("bodyhandler")||this.set("bodyhandler",this.set_body_content),this.get("footerhandler")||this.set("footerhandler",function(){}),this.get("urlmodifier")||this.set("urlmodifier",this.modify_url),this.setAttrs({headerContent:this.get("initialheadertext"),bodyContent:this.get("initialbodytext"),footerContent:this.get("initialfootertext")}),this.hide(),this.render(),this.bb=this.get("boundingBox"),this.bb.addClass("moodle-dialogue-tooltip"),right_to_left()&&(this.alignpoints=[e.WidgetPositionAlign.TR,e.WidgetPositionAlign.LC]),this.get("textcache")||this.set("textcache",new e.Cache({max:this.get("textcachesize")})),M.cfg.developerdebug&&this.get("textcache").set("max",0),this},display_panel:function(t){var n,i,s,o,u;t.preventDefault(),t.stopPropagation(),this.cancel_events(),n=t.target.ancestor("a",!0),this.align(n,this.alignpoints),this.setAttrs({headerContent:this.get("initialheadertext"),bodyContent:this.get("initialbodytext"),footerContent:this.get("initialfootertext")}),this.show(),i=this.bb.delegate("click",this.close_panel,r.CLOSEBUTTON,this),this.listenevents.push(i),i=e.one("body").on("key",this.close_panel,"esc",this),this.listenevents.push(i),i=this.bb.on("mousedownoutside",this.close_panel,this),this.listenevents.push(i),s=e.bind(this.get("urlmodifier"),this,n.get("href"))(),u=this.get("textcache").retrieve(s),u?this._set_panel_contents(u.response):(o={method:"get",context:this,sync:!1,on:{complete:function(e,t){this._set_panel_contents(t.responseText,s)}}},e.io(s,o))},_set_panel_contents:function(t,n){var r;try{r=e.JSON.parse(t);if(r.error)return this.close_panel(),new M.core.ajaxException(r)}catch(i){return this.close_panel(),new M.core.exception(i)}e.bind(this.get("headerhandler"),this,r)(),e.bind(this.get("bodyhandler"),this,r)(),e.bind(this.get("footerhandler"),this,r)(),n&&this.get("textcache").add(n,t),this.get("buttons").header[0].focus()},set_header_content:function(e){this.set("headerContent",e.heading)},set_body_content:function(t){var n=e.Node.create("<div />").set("innerHTML",t.text).setAttribute("role","alert").addClass(i.PANELTEXT);this.set("bodyContent",n)},modify_url:function(e){return e.replace(/\.php\?/,"_ajax.php?")},close_panel:function(e){this.hide(),this.cancel_events(),e&&e.preventDefault()},cancel_events:function(){var e;while(this.listenevents.length)e=this.listenevents.shift(),e.detach()}}),M.core=M.core||{},M.core.tooltip=M.core.tooltip=n},"@VERSION@",{requires:["base","node","io-base","moodle-core-notification","json-parse","widget-position","widget-position-align","event-outside","cache"]});
YUI.add("moodle-core-popuphelp",function(e,t){function n(){n.superclass.constructor.apply(this,arguments)}var r={CLICKABLELINKS:"span.helptooltip > a",FOOTER:"div.moodle-dialogue-ft"},i={ICON:"icon",ICONPRE:"icon-pre"},s={};n.NAME="moodle-core-popuphelp",n.ATTRS=s,e.extend(n,e.Base,{panel:null,initializer:function(){e.one("body").delegate("click",this.display_panel,r.CLICKABLELINKS,this)},display_panel:function(e){this.panel||(this.panel=new M.core.tooltip({bodyhandler:this.set_body_content,footerhandler:this.set_footer,initialheadertext:M.util.get_string("loadinghelp","moodle"),initialfootertext:""})),this.panel.display_panel(e)},set_footer:function(t){t.doclink?(doclink=e.Node.create("<a />").setAttrs({href:t.doclink.link}).addClass(t.doclink["class"]),helpicon=e.Node.create("<img />").setAttrs({src:M.util.image_url("docs","core")}).addClass(i.ICON).addClass(i.ICONPRE),doclink.appendChild(helpicon),doclink.appendChild(t.doclink.linktext),this.set("footerContent",doclink),this.bb.one(r.FOOTER).show()):this.bb.one(r.FOOTER).hide()}}),M.core=M.core||{},M.core.popuphelp=M.core.popuphelp||null,M.core.init_popuphelp=M.core.init_popuphelp||function(e){return M.core.popuphelp||(M.core.popuphelp=new n(e)),M.core.popuphelp}},"@VERSION@",{requires:["moodle-core-tooltip"]});