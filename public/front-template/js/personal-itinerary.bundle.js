(window.webpackJsonp=window.webpackJsonp||[]).push([[37],{539:function(e,t,i){"use strict";i.r(t),i.d(t,"default",(function(){return se}));var n=i(10),s=i(50),o=(i(111),i(81),i(8),i(61),i(326),i(14),i(18),i(11),i(13),i(214),i(15),i(16),i(17),i(19),i(12),i(5)),r=i(3),l=i.n(r),a=i(1),h=i(112),u=i(78),c=i(24),d=i(373),g=i(206),p=(i(47),i(350)),y=i(41);function v(e){return(v="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function _(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function f(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function b(e,t,i){return t&&f(e.prototype,t),i&&f(e,i),Object.defineProperty(e,"prototype",{writable:!1}),e}function m(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),Object.defineProperty(e,"prototype",{writable:!1}),t&&k(e,t)}function k(e,t){return(k=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function w(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}();return function(){var i,n=T(e);if(t){var s=T(this).constructor;i=Reflect.construct(n,arguments,s)}else i=n.apply(this,arguments);return S(this,i)}}function S(e,t){if(t&&("object"===v(t)||"function"==typeof t))return t;if(void 0!==t)throw new TypeError("Derived constructors may only return object or undefined");return E(e)}function E(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function T(e){return(T=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function L(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}a.a.registerPlugin(d.a,g.a);var C=function(e,t){u.a.isSafari()||u.a.isWindows()?e.style.marginTop="".concat(t,"px"):e.style.transform="matrix(1.00, 0.00, 0.00, 1.00, 0, ".concat(t,")")},H=function(e,t){u.a.isSafari()||u.a.isWindows()?e.style.removeProperty("margin-top"):e.style.removeProperty("transform")},j=0,O=1,P=function(e){m(i,e);var t=w(i);function i(e){var n,s=e.el;return _(this,i),L(E(n=t.call(this)),"_handleClick",(function(){n.dispatchEvent("click",n.id)})),L(E(n),"_handleMouseEnter",(function(){n.state!==j&&(n._tweenHover=a.a.to(n.el,{autoAlpha:1,duration:.5,ease:"none"}))})),L(E(n),"_handleMouseLeave",(function(){n.state!==j&&(n._tweenHover=a.a.to(n.el,{autoAlpha:.5,duration:.5,ease:"none"}))})),n.el=s,n.id=Number(n.el.dataset.id),n.state=O,n.ui={day:n.el.querySelector(".js-day"),background:n.el.querySelector(".js-background"),content:n.el.querySelector(".js-content"),border:n.el.querySelector(".js-border")},n._setupEventListeners(),n}return b(i,[{key:"destroy",value:function(){this._removeEventListeners(),this._killTimelines()}},{key:"setState",value:function(e){this.state!==e&&(this.state=e,this.state===j&&this._playHighlight(),this.state===O&&this._reverseHighlight())}},{key:"_setupEventListeners",value:function(){this.el.addEventListener("click",this._handleClick),this.el.addEventListener("mouseenter",this._handleMouseEnter),this.el.addEventListener("mouseleave",this._handleMouseLeave)}},{key:"_removeEventListeners",value:function(){this.el.removeEventListener("click",this._handleClick),this.el.removeEventListener("mouseenter",this._handleMouseEnter),this.el.removeEventListener("mouseleave",this._handleMouseLeave)}},{key:"_killTimelines",value:function(){this._tlHighlight&&(this._tlHighlight.kill(),Object(p.a)(this._tlHighlight),this._tlHighlight=null),this._tweenHover&&(this._tweenHover.kill(),Object(p.a)(this._tweenHover),this._tweenHover=null)}},{key:"_playHighlight",value:function(){this._tweenHover&&this._tweenHover.kill(),this._tlHighlight||(this._tlHighlight=a.a.timeline(),this._tlHighlight.to(this.el,{autoAlpha:1,duration:.6,ease:"none"},0),this._tlHighlight.to(this.ui.background,{scale:1.2,duration:.6,ease:c.e},0),this._tlHighlight.to(this.ui.content,{color:"white",duration:.6,ease:"sine.inOut"},0),this._tlHighlight.to(this.ui.border,{borderColor:"white",duration:.6,ease:"sine.inOut"},0)),this._tlHighlight.timeScale(1),this._tlHighlight.play()}},{key:"_reverseHighlight",value:function(){this._tweenHover&&this._tweenHover.kill(),this._tlHighlight&&(this._tlHighlight.timeScale(2),this._tlHighlight.reverse())}}]),i}(l.a),A=function(){function e(t){var i=t.el;_(this,e),this.el=i,this.ui={background:this.el.querySelector("[data-name=background]"),solid:this.el.querySelector("[data-name=solid]")}}return b(e,[{key:"getTweenTransitionIn",value:function(){var e=a.a.timeline();return e.set([this.ui.background,this.ui.solid],{transformOrigin:"50% 50%"},0),e.to(this.ui.background,{scale:.8,duration:.05},0),e.to(this.ui.solid,{stroke:y.c,duration:.05},0),e.to(this.ui.solid,{scale:1.35,duration:.05},0),e}}]),e}(),z=function(){function e(t){var i=t.el;_(this,e),this.el=i,this.ui={dashed:this.el.querySelector("[data-name=dashed]"),solid:this.el.querySelector("[data-name=solid]"),start:this.el.querySelector("[data-name=start]"),markers:a.a.utils.toArray(this.el.querySelectorAll("[data-name=marker]"))},this.components={markers:this.ui.markers.map((function(e){return new A({el:e})}))}}return b(e,[{key:"setProgress",value:function(e){this._tlProgress||(this._tlProgress=a.a.timeline({paused:!0}),this._tlProgress.fromTo(this.ui.solid,{drawSVG:"100% 100%"},{drawSVG:"0% 100% ",ease:"none",duration:1},0),this._tlProgress.to(this.ui.start,{motionPath:{path:this.ui.solid,align:this.ui.solid,alignOrigin:[.5,.5],end:-1},ease:"none",duration:1},0),this._tlProgress.add(this.components.markers[0].getTweenTransitionIn(),.13),this._tlProgress.add(this.components.markers[1].getTweenTransitionIn(),.34),this._tlProgress.add(this.components.markers[2].getTweenTransitionIn(),.5),this._tlProgress.add(this.components.markers[3].getTweenTransitionIn(),.72),this._tlProgress.add(this.components.markers[4].getTweenTransitionIn(),.89)),this._tlProgress.progress(e)}}]),e}(),R=function(e){m(i,e);var t=w(i);function i(e){var n,s=e.el,r=e.parent;return _(this,i),L(E(n=t.call(this)),"_handleTick",(function(){n._setTransform(),n._height.content>n._height.container&&n._setContentTransform()})),L(E(n),"_handleResize",(function(){n._setHeight(),n._setTransform(),n._height.content>n._height.container&&n._setContentTransform()})),L(E(n),"_handleClickButton",(function(e){n.dispatchEvent("click:group",e)})),n.el=s,n.ui={buttons:a.a.utils.toArray(n.el.querySelectorAll(".js-button-sidebar")),content:n.el.querySelector(".js-content"),footer:void 0,trail:n.el.querySelector(".js-trail")},n.components={buttons:n.ui.buttons.map((function(e){return new P({el:e})})),trail:new z({el:n.ui.trail})},n._tracker=o.c.track({element:r,container:"pages"}),n.progress=0,n.highlighted=-1,n._setHeight(),n._setupEventListeners(),n}return b(i,[{key:"destroy",value:function(){for(var e=0,t=this.components.buttons.length;e<t;e++)this.components.buttons[e].destroy();this._removeEventListeners(),this._killTimelines(),this.el.classList.remove("is-sticky"),H(this.el),H(this.ui.content)}},{key:"highlightButton",value:function(e){this.highlighted!==e&&(this.highlighted=e,this._setButtonsState())}},{key:"setProgress",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};(this.progress!==e||t.forceUpdate)&&(this.progress=e,this.components.trail.setProgress(e))}},{key:"_setupEventListeners",value:function(){a.a.ticker.add(this._handleTick),o.c.getContainer("pages").addEventListener("change:dimensions",this._handleResize);for(var e=0,t=this.components.buttons.length;e<t;e++)this.components.buttons[e].addEventListener("click",this._handleClickButton)}},{key:"_removeEventListeners",value:function(){a.a.ticker.remove(this._handleTick),o.c.getContainer("pages").removeEventListener("change:dimensions",this._handleResize);for(var e=0,t=this.components.buttons.length;e<t;e++)this.components.buttons[e].removeEventListener("click",this._handleClickButton)}},{key:"_killTimelines",value:function(){}},{key:"_setHeight",value:function(){this._height={},this._height.container=this.el.clientHeight,this._height.content=this.ui.content.clientHeight}},{key:"_setTransform",value:function(){var e=this._tracker.bounds.height-n.resizeManager.viewportHeight;C(this.el,a.a.utils.clamp(0,e,this._tracker.container.position.y-(this._tracker.bounds.bottom+n.resizeManager.viewportHeight)))}},{key:"_setContentTransform",value:function(){C(this.ui.content,-1*this.progress*(this._height.content-this._height.container))}},{key:"_setButtonsState",value:function(){for(var e=0,t=this.components.buttons.length;e<t;e++)this.components.buttons[e].setState(this.highlighted===this.components.buttons[e].id?j:O)}},{key:"_setFixedClass",value:function(){var e=this._tracker.container.position.y-(this._tracker.bounds.bottom+n.resizeManager.viewportHeight),t=this._tracker.bounds.height;!this._isNavigationFixed&&e>=0&&e<=t&&(this._isNavigationFixed=!0,this.el.classList.add("is-sticky")),(e<0||e>t)&&(this._isNavigationFixed=!1,this.el.classList.remove("is-sticky"))}}]),i}(l.a),B=function(){function e(t){var i=this,n=t.el;_(this,e),L(this,"_handleTrackerChangeVisibility",(function(){i._setVisibility({duration:.6,ease:"sine.inOut",delay:.2})})),this.el=n,this._tracker=o.c.track({element:this.el,container:"pages"}),this._setVisibility(),this._setupEventListeners()}return b(e,[{key:"destroy",value:function(){this._killTimelines(),this._resetVisibility()}},{key:"_setupEventListeners",value:function(){this._tracker.addEventListener("change:visibility",this._handleTrackerChangeVisibility)}},{key:"_removeEventListeners",value:function(){this._tracker.removeEventListener("change:visibility",this._handleTrackerChangeVisibility)}},{key:"_killTimelines",value:function(){this._tweenVisibility&&(this._tweenVisibility.kill(),Object(p.a)(this._tweenVisibility),this._tweenVisibility=null)}},{key:"_resetVisibility",value:function(){this.el.style.opacity=1,this.el.style.visibility="visible"}},{key:"_setVisibility",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this._tweenVisibility&&this._tweenVisibility.kill();var t=this._tracker.visibility===o.b.visible?1:0,i=this._tracker.visibility===o.b.visible?"visible":"hidden";if(e.duration||e.ease||e.delay){var n=e.duration||1,s=e.ease||"none",r=e.delay||0;this._tweenVisibility=a.a.to(this.el,{duration:n,ease:s,delay:r,autoAlpha:t})}else this.el.style.opacity=t,this.el.style.visibility=i}}]),e}(),V=function(){function e(t){var i=this,n=t.el;_(this,e),L(this,"_handleTrackerChangeVisibility",(function(){if(i.ui.heading)return i._tlTransitionIn||(i._tlTransitionIn=a.a.timeline({paused:!0}),i.ui.dateEntry&&i._tlTransitionIn.to(i.ui.dateEntry,{autoAlpha:1,duration:.5,ease:"sine.inOut"},0),i._tlTransitionIn.add(i.components.heading.getTweenTransitionIn(),.2),i.ui.description&&i._tlTransitionIn.to(i.ui.description,{autoAlpha:1,duration:.5,ease:"sine.inOut"},.4)),void(i._tracker.visibility===o.b.visible?i._tlTransitionIn.play():(i._tlTransitionIn.pause(),i._tlTransitionIn.progress(0)));i._setVisibility({duration:.6,ease:"sine.inOut",delay:.2})})),this.el=n,this.ui={dateEntry:this.el.querySelector(".js-date-entry"),heading:this.el.querySelector(".js-heading"),description:this.el.querySelector(".js-description")},this.components={heading:this.ui.heading?new h.a({el:this.ui.heading}):null},this._tracker=o.c.track({element:this.el,container:"pages"}),this.components.heading?(this.components.heading.transitionInit(),this.ui.dateEntry&&a.a.set(this.ui.dateEntry,{autoAlpha:0}),this.ui.description&&a.a.set(this.ui.description,{autoAlpha:0})):this._setVisibility(),this._setupEventListeners()}return b(e,[{key:"destroy",value:function(){this._removeEventListeners(),this._killTimelines(),this._resetVisibility()}},{key:"_setupEventListeners",value:function(){this._tracker.addEventListener("change:visibility",this._handleTrackerChangeVisibility)}},{key:"_removeEventListeners",value:function(){this._tracker.removeEventListener("change:visibility",this._handleTrackerChangeVisibility)}},{key:"_killTimelines",value:function(){this._tweenVisibility&&(this._tweenVisibility.kill(),Object(p.a)(this._tweenVisibility),this._tweenVisibility=null),this._tlTransitionIn&&(this._tlTransitionIn.kill(),Object(p.a)(this._tlTransitionIn),this._tlTransitionIn=null)}},{key:"_setVisibility",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this._tweenVisibility&&this._tweenVisibility.kill();var t=this._tracker.visibility===o.b.visible?1:0,i=this._tracker.visibility===o.b.visible?"visible":"hidden";if(e.duration||e.ease||e.delay){var n=e.duration||1,s=e.ease||"none",r=e.delay||0;this._tweenVisibility=a.a.to(this.el,{duration:n,ease:s,delay:r,autoAlpha:t})}else this.el.style.opacity=t,this.el.style.visibility=i}},{key:"_resetVisibility",value:function(){this.el.style.opacity=1,this.el.style.visibility="visible"}}]),e}(),q=function(){function e(t){var i=this,n=t.el;_(this,e),L(this,"_handleTrackerChangeVisibility",(function(){})),L(this,"_handleResize",(function(){i._setBounds()})),this.el=n,this.id=Number(this.el.dataset.id),this.ui={content:this.el.querySelector(".js-content"),days:a.a.utils.toArray(this.el.querySelectorAll(".js-day")),entries:a.a.utils.toArray(this.el.querySelectorAll(".js-entry"))},this.components={days:this.ui.days.map((function(e){return new B({el:e})})),entries:this.ui.entries.map((function(e){return new V({el:e})}))},this._setBounds(),this._setupEventListeners()}return b(e,[{key:"destroy",value:function(){for(var e=0,t=this.components.days.length;e<t;e++)this.components.days[e].destroy();for(var i=0,n=this.components.entries.length;i<n;i++)this.components.entries[i].destroy();this._removeEventListeners()}},{key:"_setupEventListeners",value:function(){o.c.getContainer("pages").addEventListener("change:dimensions",this._handleResize)}},{key:"_removeEventListeners",value:function(){o.c.getContainer("pages").addEventListener("change:dimensions",this._handleResize)}},{key:"_setBounds",value:function(){this.bounds=this.el.getBoundingClientRect(),this.bounds.y+=o.c.getContainer("pages").position.y,this.bounds.x+=o.c.getContainer("pages").position.x}}]),e}(),x=function(){function e(t){var i=this,n=t.el;_(this,e),L(this,"_handleTick",(function(){i._setSidebarProgress(),i._isScrollingToGroup||i._setSidebarHighlightButton()})),L(this,"_handleWheel",(function(){i._isScrollingToGroup&&(i._killTweenScroll(),i._isScrollingToGroup=!1)})),L(this,"_handleResize",(function(){i._setBounds()})),L(this,"_handleSidebarClickGroup",(function(e){i.components.sidebar.highlightButton(e),i.scrollToGroup(e)})),L(this,"_handleTweenScrollStart",(function(){i._isScrollingToGroup=!0})),L(this,"_handleTweenScrollComplete",(function(){i._isScrollingToGroup=!1})),this.el=n,this.ui={sidebar:this.el.querySelector(".js-sidebar"),groups:a.a.utils.toArray(this.el.querySelectorAll(".js-group"))},this.components={sidebar:new R({el:this.ui.sidebar,parent:this.el}),groups:this.ui.groups.map((function(e){return new q({el:e})}))},this.components.sidebar.highlightButton(0),this.components.sidebar.setProgress(0,{forceUpdate:!0}),this._setBounds(),this._setupEventListeners()}return b(e,[{key:"destroy",value:function(){this.components.sidebar.destroy();for(var e=0,t=this.components.groups.length;e<t;e++)this.components.groups[e].destroy();H(this.ui.sidebar),this._removeEventListeners(),this._killTweenScroll()}},{key:"scrollToGroup",value:function(e){this._killTweenScroll();var t=this.components.groups.find((function(t){return t.id===e}));this._tweenScroll=a.a.to(window,{scrollTo:t.bounds.y-this._offsetMenu,ease:"power3.inOut",duration:1,onStart:this._handleTweenScrollStart,onComplete:this._handleTweenScrollComplete})}},{key:"_setupEventListeners",value:function(){a.a.ticker.add(this._handleTick),document.body.addEventListener("wheel",this._handleWheel),o.c.getContainer("pages").addEventListener("change:dimensions",this._handleResize),this.components.sidebar.addEventListener("click:group",this._handleSidebarClickGroup)}},{key:"_removeEventListeners",value:function(){a.a.ticker.remove(this._handleTick),document.body.removeEventListener("wheel",this._handleWheel),o.c.getContainer("pages").removeEventListener("change:dimensions",this._handleResize),this.components.sidebar.removeEventListener("click:group",this._handleSidebarClickGroup)}},{key:"_killTweenScroll",value:function(){this._tweenScroll&&(this._tweenScroll.kill(),Object(p.a)(this._tweenScroll),this._tweenScroll=null)}},{key:"_getActiveGroup",value:function(){var e=this;return this.components.groups.find((function(t){return t.index===e.components.sidebar.group}))}},{key:"_setBounds",value:function(){this._offsetMenu=n.resizeManager.rem(110),this.bounds=this.el.getBoundingClientRect(),this.bounds.y+=o.c.getContainer("pages").position.y,this.bounds.x+=o.c.getContainer("pages").position.x,this.bounds.scrollHeight=this.bounds.height-this.components.groups[this.components.groups.length-1].bounds.height-n.resizeManager.viewportHeight}},{key:"_setSidebarProgress",value:function(){var e=o.c.getContainer("pages").position.y-this.bounds.y,t=a.a.utils.clamp(0,1,e/this.bounds.scrollHeight);this.components.sidebar.setProgress(t)}},{key:"_setSidebarHighlightButton",value:function(){for(var e=Math.ceil(o.c.getContainer("pages").scroll.position.y)+this._offsetMenu,t=0,i=void 0,n=void 0,s=this.components.groups.length;t<s;t++)e>=(i=this.components.groups[t]).bounds.y&&e<i.bounds.y+i.bounds.height&&(n=i),n&&this.components.sidebar.highlightButton(n.id)}}]),e}(),M=i(342);function I(e){return(I="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function G(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function N(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function F(e,t,i){return t&&N(e.prototype,t),i&&N(e,i),Object.defineProperty(e,"prototype",{writable:!1}),e}function U(e,t){return(U=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function W(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}();return function(){var i,n=Q(e);if(t){var s=Q(this).constructor;i=Reflect.construct(n,arguments,s)}else i=n.apply(this,arguments);return D(this,i)}}function D(e,t){if(t&&("object"===I(t)||"function"==typeof t))return t;if(void 0!==t)throw new TypeError("Derived constructors may only return object or undefined");return J(e)}function J(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function Q(e){return(Q=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function K(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}var X=0,Y=1,Z=function(e){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),Object.defineProperty(e,"prototype",{writable:!1}),t&&U(e,t)}(i,e);var t=W(i);function i(e){var n,s=e.el;return G(this,i),K(J(n=t.call(this)),"_handleClick",(function(){n.dispatchEvent("click",n.id)})),n.el=s,n.id=Number(n.el.dataset.id),n.state=Y,n.ui={day:n.el.querySelector(".js-day"),background:n.el.querySelector(".js-background"),content:n.el.querySelector(".js-content"),border:n.el.querySelector(".js-border"),label:n.el.querySelector(".js-label")},n._setupEventListeners(),n}return F(i,[{key:"destroy",value:function(){this._removeEventListeners(),this._killTimelines()}},{key:"setState",value:function(e){this.state!==e&&(this.state=e,this.state===X&&this._playHighlight(),this.state===Y&&this._reverseHighlight())}},{key:"_setupEventListeners",value:function(){this.el.addEventListener("click",this._handleClick)}},{key:"_removeEventListeners",value:function(){this.el.removeEventListener("click",this._handleClick)}},{key:"_killTimelines",value:function(){this._tlHighlight&&(this._tlHighlight.kill(),Object(p.a)(this._tlHighlight),this._tlHighlight=null)}},{key:"_playHighlight",value:function(){this._tlHighlight||(this._tlHighlight=a.a.timeline(),this._tlHighlight.to(this.el,{autoAlpha:1,duration:.6,ease:"none"},0),this._tlHighlight.to(this.ui.background,{scale:1.2,duration:.6,ease:c.e},0),this._tlHighlight.to(this.ui.content,{color:"white",duration:.6,ease:"sine.inOut"},0),this._tlHighlight.to(this.ui.border,{borderColor:"white",duration:.6,ease:"sine.inOut"},0),this._tlHighlight.to(this.ui.label,{color:"#fc6220",duration:.6,ease:"sine.inOut"},0),this._tlHighlight.to(this.ui.label,{y:5,ease:c.e,duration:.6},0)),this._tlHighlight.timeScale(1),this._tlHighlight.play()}},{key:"_reverseHighlight",value:function(){this._tlHighlight&&(this._tlHighlight.timeScale(2),this._tlHighlight.reverse())}}]),i}(l.a),$=function(){function e(t){var i=this,n=t.el;G(this,e),K(this,"_handleResize",(function(){i._setBounds()})),this.el=n,this.id=Number(this.el.dataset.id),this._setBounds(),this._setupEventListeners()}return F(e,[{key:"setState",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};(e!==this.state||t.forceUpdate)&&(this.state=e)}},{key:"destroy",value:function(){this._killTimelines(),this._removeEventListeners()}},{key:"_setupEventListeners",value:function(){o.c.getContainer("pages").addEventListener("change:dimensions",this._handleResize)}},{key:"_removeEventListeners",value:function(){o.c.getContainer("pages").addEventListener("change:dimensions",this._handleResize)}},{key:"_killTimelines",value:function(){this._tlTransition&&(this._tlTransition.kill(),Object(p.a)(this._tlTransition),this._tlTransition=null)}},{key:"_setBounds",value:function(){this.bounds=this.el.getBoundingClientRect(),this.bounds.y+=o.c.getContainer("pages").position.y,this.bounds.x+=o.c.getContainer("pages").position.x}},{key:"_transition",value:function(){}}]),e}(),ee=function(){function e(t){var i=this,s=t.el;G(this,e),K(this,"_handleButtonClick",(function(e){i.setGroup(e)})),K(this,"_handleScroll",(function(){var e=o.c.getContainer("pages").position.y-i.bounds.y+n.resizeManager.rem(86);if(o.c.getContainer("pages").damping||(!i._isNavigationFixed&&e>=0&&e<=i.bounds.height&&(i._isNavigationFixed=!0,i.ui.sidebar.classList.add("is-sticky-mobile")),i._isNavigationFixed&&(e<0||e>i.bounds.height)&&(i._isNavigationFixed=!1,i.ui.sidebar.classList.remove("is-sticky-mobile"))),!i._isAutoScrolling)for(var t=o.c.getContainer("pages").position.y+n.resizeManager.rem(165),s=0,r=i.components.groups.length;s<r;s++)if(t>=i.components.groups[s].bounds.y&&t<i.components.groups[s].bounds.y+i.components.groups[s].bounds.height){i.setGroup(i.components.groups[s].id,{noAutoScroll:!0});break}})),K(this,"_handleResize",(function(){i._setBounds()})),this._isNavigationFixed=!1,this._isAutoScrolling=!1,this.el=s,this.ui={sidebar:this.el.querySelector(".js-sidebar"),carousel:this.el.querySelector(".js-content"),list:this.el.querySelector(".js-list"),items:a.a.utils.toArray(this.el.querySelectorAll(".js-item")),buttons:a.a.utils.toArray(this.el.querySelectorAll(".js-button-sidebar")),groups:a.a.utils.toArray(this.el.querySelectorAll(".js-group"))},this.components={carousel:new M.a({el:this.ui.carousel,list:this.ui.list,items:this.ui.items}),buttons:this.ui.buttons.map((function(e){return new Z({el:e})})),groups:this.ui.groups.map((function(e){return new $({el:e})}))},this._setBounds(),this._setupEventListeners(),this.group=-1,this.setGroup(0,{forceUpdate:!0,noAutoScroll:!0})}return F(e,[{key:"destroy",value:function(){for(var e=0,t=this.components.groups.length;e<t;e++)this.components.groups[e].destroy();for(var i=0,n=this.components.buttons.length;i<n;i++)this.components.buttons[i].destroy();this.components.carousel.destroy(),this._removeEventListeners(),this._killTimelines(),this.ui.sidebar.classList.add("is-not-sticky-mobile"),this.ui.sidebar.classList.remove("is-sticky-mobile")}},{key:"setGroup",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};(e!==this.group||t.forceUpdate)&&(this.group=e,this._update(t))}},{key:"_setupEventListeners",value:function(){o.c.getContainer("pages").addEventListener("change:position",this._handleScroll),o.c.getContainer("pages").addEventListener("change:dimensions",this._handleResize);for(var e=0,t=this.components.buttons.length;e<t;e++)this.components.buttons[e].addEventListener("click",this._handleButtonClick)}},{key:"_removeEventListeners",value:function(){o.c.getContainer("pages").removeEventListener("change:position",this._handleScroll),o.c.getContainer("pages").removeEventListener("change:dimensions",this._handleResize);for(var e=0,t=this.components.buttons.length;e<t;e++)this.components.buttons[e].removeEventListener("click",this._handleButtonClick)}},{key:"_killTimelines",value:function(){this._tweenScroll&&(this._tweenScroll.kill(),Object(p.a)(this._tweenScroll),this._tweenScroll=null)}},{key:"_getActiveGroup",value:function(){for(var e=0,t=this.components.groups.length;e<t;e++)if(this.components.groups[e].id===this.group)return this.components.groups[e]}},{key:"_update",value:function(){var e=this,t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},i=this._getActiveGroup();i&&i.bounds&&!t.noAutoScroll&&(this._tweenScroll&&this._tweenScroll.kill(),this._tweenScroll=a.a.to(window,{scrollTo:i.bounds.y-n.resizeManager.rem(165),ease:"power3.inOut",duration:1,onStart:function(){e._isAutoScrolling=!0},onComplete:function(){e._isAutoScrolling=!1}}));for(var s=0,o=this.components.buttons.length;s<o;s++)this.components.buttons[s].setState(this.components.buttons[s].id===this.group?X:Y);this.components.carousel.navigateToIndex(this.group)}},{key:"_setBounds",value:function(){this.bounds=this.el.getBoundingClientRect(),this.bounds.y+=o.c.getContainer("pages").position.y,this.bounds.x+=o.c.getContainer("pages").position.x}}]),e}();function te(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}var ie=0,ne=1,se=function(){function e(t){var i,n,o,r=this,l=t.el;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),o=function(){r.setType(s.adaptive.isMediaQueryActive("wide")?ne:ie)},(n="_handleResize")in(i=this)?Object.defineProperty(i,n,{value:o,enumerable:!0,configurable:!0,writable:!0}):i[n]=o,this.el=l,this.component=void 0,this.type=void 0,this.setType(s.adaptive.isMediaQueryActive("wide")?ne:ie),this._setupEventListeners()}var t,i,o;return t=e,(i=[{key:"destroy",value:function(){this._removeEventListeners()}},{key:"setType",value:function(e){this.type!==e&&(this.type=e,this._update())}},{key:"_setupEventListeners",value:function(){n.resizeManager.addEventListener("resize",this._handleResize),n.resizeManager.addEventListener("resize:complete",this._handleResize)}},{key:"_removeEventListeners",value:function(){n.resizeManager.removeEventListener("resize",this._handleResize),n.resizeManager.removeEventListener("resize:complete",this._handleResize)}},{key:"_update",value:function(){this.component&&this.component.destroy&&"function"==typeof this.component.destroy&&this.component.destroy(),this.component=this.type===ie?new ee({el:this.el}):new x({el:this.el})}}])&&te(t.prototype,i),o&&te(t,o),Object.defineProperty(t,"prototype",{writable:!1}),e}()}}]);