(window.webpackJsonp=window.webpackJsonp||[]).push([[27],{442:function(e,t,i){"use strict";i.r(t);i(239),i(240);var n=i(2),a=i(5),r=i(33),s=i(0),l=i(68);function o(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function u(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}var c=function(){function e(t){var i=this,l=t.el;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),u(this,"_changeScrollTrackerProgress",(function(e){if(!i._tlParallax){i._tlParallax=s.a.timeline({paused:!0}),i._tlParallax.to({empty:0},{empty:1,duration:1},0),r.adaptive.isMediaQueryActive("wide")||i._tlParallax.fromTo(i.ui.items,{autoAlpha:0},{autoAlpha:1,duration:.1,ease:"sine.in",stagger:.05},.4),r.adaptive.isMediaQueryActive("wide")&&(i._tlParallax.fromTo(i.ui.items,{autoAlpha:0},{autoAlpha:1,duration:.1,ease:"sine.in",stagger:.1},"personal-itinerary"===i.layout?.1:.2),i._tlParallax.fromTo(i.ui.list,{y:a.resizeManager.rem(100)},{y:a.resizeManager.rem(-100),duration:1,ease:"sine.inOut"},0))}e>.15&&(i._tlTransitionIn||(i._tlTransitionIn=s.a.timeline(),i._tlTransitionIn.fromTo(i.ui.subheading,{autoAlpha:0},{autoAlpha:1,duration:.6,ease:"sine.inOut"},0),i._tlTransitionIn.add(i.components.heading.getTweenTransitionIn(),.2)),i._transitionInRequested&&(i._transitionInRequested=!1,i._tlTransitionIn.play(0))),i._tlParallax.progress(e)})),u(this,"_changeScrollTrackerVisibility",(function(e){e===n.b.hidden&&i._tracker.progress<.5&&(i._transitionInit(),i._transitionReset())})),this.el=l,this.layout=document.body.dataset.layout,this.ui={subheading:this.el.querySelector(".js-subheading"),heading:this.el.querySelector(".js-heading"),imageContainers:this.el.querySelectorAll(".js-image-container"),images:this.el.querySelectorAll(".js-image"),list:this.el.querySelectorAll(".js-list"),items:this.el.querySelectorAll(".js-item")};var o=new IntersectionObserver((function(e){e.forEach((function(e){e.intersectionRatio>0&&(i._create(),o.unobserve(i.el))}))}));o.observe(this.el)}var t,i,c;return t=e,(i=[{key:"_create",value:function(){this.components={heading:new l.a({el:this.ui.heading})},this._transitionInit(),this._transitionReset(),this._tracker=n.c.track({element:this.el,container:"pages"}),this._setupEventListeners()}},{key:"destroy",value:function(){this._removeEventListeners(),this._killTimelines()}},{key:"_setupEventListeners",value:function(){this._tracker.addEventListener("change:progress",this._changeScrollTrackerProgress),this._tracker.addEventListener("change:visibility",this._changeScrollTrackerVisibility)}},{key:"_removeEventListeners",value:function(){this._tracker.removeEventListener("change:progress",this._changeScrollTrackerProgress),this._tracker.removeEventListener("change:visibility",this._changeScrollTrackerVisibility)}},{key:"_killTimelines",value:function(){this._tlTransitionIn&&(this._tlTransitionIn.kill(),this._tlTransitionIn=null),this._tlParallax&&(this._tlParallax.kill(),this._tlParallax=null)}},{key:"_transitionInit",value:function(){this.ui.subheading.style.opacity=0,this.components.heading.transitionInit()}},{key:"_transitionIn",value:function(){this._tlTransitionIn}},{key:"_transitionReset",value:function(){this._transitionInRequested=!0}}])&&o(t.prototype,i),c&&o(t,c),e}();t.default=c}}]);