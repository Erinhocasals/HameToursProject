(window.webpackJsonp=window.webpackJsonp||[]).push([[15],{447:function(e,t,i){"use strict";i.r(t),i.d(t,"default",(function(){return l}));var n=i(0),r=i(2);function a(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function s(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}var l=function(){function e(t){var i=this,a=t.el;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),s(this,"_changeScrollTrackerProgress",(function(e){i._tlParallax||(i._tlParallax=n.a.timeline({paused:!0})),i._tlParallax.progress(e)})),s(this,"_changeScrollTrackerVisibility",(function(){i._tracker.visibility===r.b.visible&&i._transitionIn(),i._tracker.visibility,r.b.hidden})),this.el=a,this.ui={containerBody:this.el.querySelector(".js-container-body"),listItems:this.el.querySelectorAll(".js-list-item"),heading:this.el.querySelector(".js-heading")},this._tracker=r.c.track({element:this.el,container:"pages"}),this._setupEventListeners()}var t,i,l;return t=e,(i=[{key:"_setupEventListeners",value:function(){this._tracker.addEventListener("change:progress",this._changeScrollTrackerProgress),this._tracker.addEventListener("change:visibility",this._changeScrollTrackerVisibility)}},{key:"_transitionIn",value:function(){this._tlTransitionIn||(this._tlTransitionIn=n.a.timeline({delay:.5}),this._tlTransitionIn.fromTo(this.ui.heading,{scale:1.2,alpha:0},{scale:1,alpha:1,duration:1.5,ease:"expo.out"}),this._tlTransitionIn.fromTo(this.ui.containerBody,{alpha:0},{alpha:1,duration:.5},.25),this._tlTransitionIn.fromTo(this.ui.listItems,{y:20,alpha:0},{y:0,alpha:1,stagger:.1,duration:.5},.25))}}])&&a(t.prototype,i),l&&a(t,l),e}()}}]);