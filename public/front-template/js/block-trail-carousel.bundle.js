(window.webpackJsonp=window.webpackJsonp||[]).push([[25],{446:function(i,e,t){"use strict";t.r(e),t.d(e,"default",(function(){return o}));var n=t(0),r=t(2),a=t(256);function s(i,e){for(var t=0;t<e.length;t++){var n=e[t];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(i,n.key,n)}}function l(i,e,t){return e in i?Object.defineProperty(i,e,{value:t,enumerable:!0,configurable:!0,writable:!0}):i[e]=t,i}var o=function(){function i(e){var t=this,s=e.el;!function(i,e){if(!(i instanceof e))throw new TypeError("Cannot call a class as a function")}(this,i),l(this,"_changeScrollTrackerProgress",(function(i){t._tlParallax||(t._tlParallax=n.a.timeline({paused:!0})),t._tlParallax.progress(i)})),l(this,"_changeScrollTrackerVisibility",(function(){t._tracker.visibility===r.b.visible&&(t.components.trail.startAnimations(),t.el.classList.add("is-visible"),t._transitionIn()),t._tracker.visibility===r.b.hidden&&(t.components.trail.cancelAnimations(),t.el.classList.remove("is-visible"))})),this.el=s,this.ui={containerTrail:this.el.querySelector(".js-container-trail"),trail:this.el.querySelector(".js-trail"),body:this.el.querySelector(".js-body")},this.components={trail:new a.a({el:this.ui.trail})},this._tracker=r.c.track({element:this.el,container:"pages"}),this._setupEventListeners()}var e,t,o;return e=i,(t=[{key:"_setupEventListeners",value:function(){this._tracker.addEventListener("change:progress",this._changeScrollTrackerProgress),this._tracker.addEventListener("change:visibility",this._changeScrollTrackerVisibility)}},{key:"_transitionIn",value:function(){this._tlTransitionIn||(this._tlTransitionIn=n.a.timeline(),this._tlTransitionIn.fromTo([this.ui.body,this.ui.containerTrail],{alpha:0},{alpha:1,duration:1,delay:.5}))}}])&&s(e.prototype,t),o&&s(e,o),i}()}}]);