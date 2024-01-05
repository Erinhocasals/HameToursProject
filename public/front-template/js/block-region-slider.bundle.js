(window.webpackJsonp = window.webpackJsonp || []).push([[5], {
    444: function (t, e, i) {
        "use strict";
        i.r(e);
        i(74), i(148), i(239), i(67), i(241), i(265), i(149), i(153), i(113), i(150), i(240);
        var n = i(5), s = i(106), o = i(294), a = i(0), r = i(293), h = i(109), l = i(9), c = i(19), u = i(2);

        function _(t, e, i) {
            return e in t ? Object.defineProperty(t, e, {
                value: i,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : t[e] = i, t
        }

        function d(t, e) {
            if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
        }

        function g(t, e) {
            for (var i = 0; i < e.length; i++) {
                var n = e[i];
                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
            }
        }

        function m(t, e, i) {
            return e && g(t.prototype, e), i && g(t, i), t
        }

        a.a.registerPlugin(r.a);
        var v = function (t) {
            return t.replace(/([-_][a-z])/gi, (function (t) {
                return t.toUpperCase().replace("-", "").replace("_", "")
            }))
        }, f = function (t) {
            return t.replace(/\b(\w)/g, (function (t) {
                return t.toUpperCase()
            }))
        }, p = function () {
            function t(e) {
                var i = e.el;
                d(this, t), this.el = i, this.ui = {label: this.el.querySelector(".js-label")}, this._config = this.el.dataset, this._location = this._config.continentDefaultLocation
            }

            return m(t, [{
                key: "destroy", value: function () {
                    this._killTimelines()
                }
            }, {
                key: "setContinent", value: function (t) {
                    var e = this._config["continentLocation".concat(f(v(t) || ""))];
                    e !== this._location && (this._location = e, this._transition())
                }
            }, {
                key: "_killTimelines", value: function () {
                    this._tlSwapLocation && (this._tlSwapLocation.kill(), this._tlSwapLocation = null)
                }
            }, {
                key: "_transition", value: function () {
                    var t = this;
                    this._tlSwapLocation && (this._tlSwapLocation.kill(), this._tlSwapLocation = null), this._tlSwapLocation = a.a.timeline(), this._tlSwapLocation.to(this.ui.label, {
                        autoAlpha: 0,
                        duration: .5,
                        ease: "sine.out"
                    }), this._tlSwapLocation.call((function () {
                        return t.ui.label.textContent = t._location
                    })), this._tlSwapLocation.to(this.ui.label, {autoAlpha: 1, duration: .5, ease: "sine.inOut"})
                }
            }]), t
        }(), w = function () {
            function t(e) {
                var i = this, n = e.id, s = e.image;
                d(this, t), _(this, "_transitionStartHandler", (function () {
                    i.isAnimating = !0
                })), _(this, "_transitionCompleteHandler", (function () {
                    i.isAnimating = !1
                })), this.isAnimating = !1, this.id = n, this._image = s, this._tweenObject = {alpha: 0, scale: 1.1}
            }

            return m(t, [{
                key: "destroy", value: function () {
                    this._killTimelines(), this._remove()
                }
            }, {
                key: "transitionIn", value: function () {
                    this._tlTransitionIn = a.a.timeline({
                        onStart: this._transitionStartHandler,
                        onComplete: this._transitionCompleteHandler
                    }), this._tlTransitionIn.to(this._tweenObject, {
                        alpha: 1,
                        duration: .5,
                        ease: "sine.out"
                    }, 0), this._tlTransitionIn.to(this._tweenObject, {scale: 1, duration: 1.4, ease: l.b}, 0)
                }
            }, {
                key: "transitionOut", value: function (t) {
                    var e = this;
                    this._tlTransitionIn && this._tlTransitionIn.kill(), this._remove = t, this._tlTransitionOut = a.a.timeline({
                        onStart: this._transitionStartHandler,
                        onComplete: function () {
                            return e.destroy()
                        }
                    }), this._tlTransitionOut.to(this._tweenObject, {
                        alpha: 0,
                        duration: .5,
                        ease: "sine.inOut"
                    }, 0), this._tlTransitionOut.to(this._tweenObject, {scale: 1.1, duration: 1.4, ease: l.b}, 0)
                }
            }, {
                key: "draw", value: function (t, e, i) {
                    if (this._image) {
                        var n = this._tweenObject, o = n.scale, a = n.alpha,
                            r = s.sizeUtils.cover(e, i, this._image.width, this._image.height);
                        t.globalAlpha = a, t.drawImage(this._image.element, this._image.width * (o - 1) * .5, this._image.height * (o - 1) * .5, this._image.width * (2 - o), this._image.height * (2 - o), r.x, r.y, r.width, r.height)
                    }
                }
            }, {
                key: "_killTimelines", value: function () {
                    this._tlTransitionIn && (this._tlTransitionIn.kill(), this._tlTransitionIn = null), this._tlTransitionOut && (this._tlTransitionOut.kill(), this._tlTransitionOut = null)
                }
            }]), t
        }(), k = function () {
            function t(e) {
                var i = this, n = e.el;
                d(this, t), _(this, "_tickHandler", (function () {
                    i._draw()
                })), this.el = n, this.continent = null, this._config = this.el.dataset, this._images = {}, this._slides = [], this._canvas = this.el, this._context = this._canvas.getContext("2d"), this._setDimensions(), this._setupEventListeners()
            }

            return m(t, [{
                key: "setContinent", value: function (t) {
                    var e = this;
                    if (this.continent !== t) if (this.continent = t, this._images[t]) {
                        var i = new w({id: this.continent, image: this._images[t], context: this._context});
                        this._slides.push(i), this._transition()
                    } else {
                        var n = this._config["continentImage".concat(f(v(t) || ""))];
                        this._images[t] = {}, this._images[t].element = new Image, this._images[t].element.src = n, this._images[t].element.onload = function () {
                            e._images[t].width = e._images[t].element.width, e._images[t].height = e._images[t].element.height, e._transition()
                        };
                        var s = new w({id: this.continent, image: this._images[t], context: this._context});
                        this._slides.push(s)
                    }
                }
            }, {
                key: "destroy", value: function () {
                    this._removeEventListeners()
                }
            }, {
                key: "_setupEventListeners", value: function () {
                    a.a.ticker.add(this._tickHandler)
                }
            }, {
                key: "_removeEventListeners", value: function () {
                    a.a.ticker.remove(this._tickHandler)
                }
            }, {
                key: "_setDimensions", value: function () {
                    var t = a.a.utils.clamp(1, 1, window.devicePixelRatio);
                    this._width = this._canvas.clientWidth, this._height = this._canvas.clientHeight, this._canvas.width = this._width * t, this._canvas.height = this._height * t, this._context.scale(t, t)
                }
            }, {
                key: "_transition", value: function () {
                    var t = this, e = this._slides[this._slides.length - 1];
                    e && e.transitionIn();
                    var i = this._slides[this._slides.length - 2];
                    i && i.transitionOut((function () {
                        return t._remove(i)
                    }))
                }
            }, {
                key: "_remove", value: function (t) {
                    var e = this._slides.indexOf(t);
                    this._slides.splice(e, 1)
                }
            }, {
                key: "_draw", value: function () {
                    var t = this;
                    this._slides.find((function (t) {
                        return t.isAnimating
                    })) && (this._context.clearRect(0, 0, this._width, this._height), this._slides.forEach((function (e) {
                        return e.draw(t._context, t._width, t._height)
                    })), this._context.globalAlpha = .4, this._context.fillRect(0, 0, this._width, this._height))
                }
            }]), t
        }(), y = function () {
            function t(e) {
                var i = this, n = e.el, s = e.onClick;
                d(this, t), _(this, "_clickHandler", (function () {
                    i._onClick(i)
                })), this.el = n, this.id = this.el.dataset.continent, this._onClick = s, this.ui = {
                    background: this.el.querySelector(".js-background"),
                    outline: this.el.querySelector(".js-outline"),
                    paths: a.a.utils.toArray(this.el.querySelectorAll(".js-outline svg path")),
                    subheading: this.el.querySelector(".js-subheading"),
                    heading: this.el.querySelector(".js-heading"),
                    button: this.el.querySelector(".js-button")
                }, this._setDimensions(), this._setupEventListeners()
            }

            return m(t, [{
                key: "destroy", value: function () {
                    this._killTimelines(), this._removeEventListeners()
                }
            }, {
                key: "resize", value: function () {
                    this._killTimelines(), this._setDimensions()
                }
            }, {
                key: "setProgress", value: function (t) {
                    var e = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
                    (this.progress !== t || e) && (this.progress = t, this._tlProgress || (this._tlProgress = a.a.timeline({paused: !0}), this._tlProgress.fromTo(this.ui.heading, {autoAlpha: .5}, {
                        autoAlpha: 1,
                        ease: "sine.inOut",
                        duration: .5
                    }, 0), this._tlProgress.fromTo(this.ui.outline, {x: .2 * this.dimensions.width}, {
                        x: .2 * -this.dimensions.width,
                        ease: "sine.inOut",
                        duration: 1
                    }, 0), this._tlProgress.fromTo(this.ui.heading, {x: .5 * this.dimensions.width}, {
                        x: .5 * -this.dimensions.width,
                        ease: "none",
                        duration: 1
                    }, 0), this._tlProgress.fromTo(this.ui.subheading, {x: .75 * this.dimensions.width}, {
                        x: .75 * -this.dimensions.width,
                        ease: "none",
                        duration: 1
                    }, 0), this._tlProgress.fromTo(this.ui.button, {x: .75 * this.dimensions.width}, {
                        x: .75 * -this.dimensions.width,
                        ease: "none",
                        duration: 1
                    }, 0), this._tlProgress.fromTo(this.ui.subheading, {autoAlpha: 0}, {
                        autoAlpha: 1,
                        ease: "sine.inOut",
                        duration: .25
                    }, .25), this._tlProgress.fromTo(this.ui.button, {autoAlpha: 0}, {
                        autoAlpha: 1,
                        ease: "sine.inOut",
                        duration: .25
                    }, .25), this._tlProgress.fromTo(this.ui.paths, {drawSVG: "0%"}, {
                        drawSVG: "100%",
                        ease: "none",
                        duration: .25
                    }, .25), this._tlProgress.fromTo(this.ui.paths, {drawSVG: "100%"}, {
                        drawSVG: "0%",
                        ease: "none",
                        duration: .25
                    }, .5), this._tlProgress.fromTo(this.ui.subheading, {autoAlpha: 1}, {
                        autoAlpha: 0,
                        ease: "sine.inOut",
                        duration: .25
                    }, .5), this._tlProgress.fromTo(this.ui.button, {autoAlpha: 1}, {
                        autoAlpha: 0,
                        ease: "sine.inOut",
                        duration: .25
                    }, .5), this._tlProgress.fromTo(this.ui.heading, {autoAlpha: 1}, {
                        autoAlpha: .5,
                        ease: "sine.inOut",
                        duration: .5
                    }, .5)), this._tlProgress.progress(this.progress))
                }
            }, {
                key: "_setupEventListeners", value: function () {
                    this.ui.heading.addEventListener("click", this._clickHandler)
                }
            }, {
                key: "_removeEventListeners", value: function () {
                    this.ui.heading.removeEventListener("click", this._clickHandler)
                }
            }, {
                key: "_killTimelines", value: function () {
                    this._tlProgress && (!function t(e) {
                        e.getChildren().forEach((function (e) {
                            e.getChildren ? t(e) : e.targets().forEach((function (t) {
                                t.nodeType && a.a.set(t, {clearProps: "all"})
                            }))
                        }))
                    }(this._tlProgress), this._tlProgress.kill(), this._tlProgress = null)
                }
            }, {
                key: "_setDimensions", value: function () {
                    this.dimensions = {}, this.dimensions.width = this.el.clientWidth, this.dimensions.height = this.el.clientHeight
                }
            }]), t
        }(), P = function () {
            function t(e) {
                var i = this, n = e.el;
                d(this, t), _(this, "_resizeHandler", (function () {
                    i._tlProgress && (i._tlProgress.kill(), i._tlProgress = null), i._setSize(), i._update(), i._draw()
                })), _(this, "_tickHandler", (function () {
                    i._isUpdateRequested && (i._isUpdateRequested = !1, i._update(), i._draw())
                })), _(this, "_requestUpdateHandler", (function () {
                    i._requestUpdate()
                })), this.el = n, this._canvas = this.el, this._context = this._canvas.getContext("2d"), this._tweenObject = {
                    center: [],
                    progress: 0,
                    x: 0,
                    dotPreviousScale: 1,
                    dotNextScale: 0,
                    previousArcProgress: 1,
                    nextArcProgress: 0
                }, this._setSize(), this._setupEventListeners(), this._draw()
            }

            return m(t, [{
                key: "destroy", value: function () {
                    this._removeEventListeners()
                }
            }, {
                key: "setProgress", value: function (t) {
                    this._tlProgress || (this._tlProgress = a.a.timeline({
                        paused: !0,
                        onUpdate: this._requestUpdateHandler
                    }), this._tlProgress.to(this._tweenObject, {
                        x: .5 * -this._width,
                        duration: 1,
                        ease: "none"
                    }, 0), this._tlProgress.to(this._tweenObject, {
                        previousArcProgress: 0,
                        duration: 1,
                        ease: "none"
                    }, 0), this._tlProgress.to(this._tweenObject, {
                        nextArcProgress: 1,
                        duration: 1,
                        ease: "none"
                    }, 0), this._tlProgress.to(this._tweenObject, {
                        dotPreviousScale: 0,
                        ease: "none",
                        duration: .5
                    }, 0), this._tlProgress.to(this._tweenObject, {
                        dotNextScale: 1,
                        ease: "none",
                        duration: .5
                    }, .5)), this._tlProgress.progress(t)
                }
            }, {
                key: "_setupEventListeners", value: function () {
                    n.resizeManager.addEventListener("resize", this._resizeHandler), n.resizeManager.addEventListener("resize:complete", this._resizeHandler), a.a.ticker.add(this._tickHandler)
                }
            }, {
                key: "_removeEventListeners", value: function () {
                    n.resizeManager.removeEventListener("resize", this._resizeHandler), n.resizeManager.removeEventListener("resize:complete", this._resizeHandler), a.a.ticker.remove(this._tickHandler)
                }
            }, {
                key: "_setSize", value: function () {
                    var t = a.a.utils.clamp(1, 2, window.devicePixelRatio);
                    this._width = this._canvas.clientWidth, this._height = this._canvas.clientHeight, this._canvas.width = this._width * t, this._canvas.height = this._height * t, this._context.scale(t, t)
                }
            }, {
                key: "_draw", value: function () {
                    this._context.clearRect(0, 0, this._width, this._height);
                    var t = 1 * Math.PI, e = .34 * Math.PI, i = .32 * Math.PI, s = n.resizeManager.rem(5);
                    this._context.beginPath(), this._context.strokeStyle = c.c, this._context.lineWidth = 1, this._context.arc(.25 * this._width + this._tweenObject.x, .5 * this._width + n.resizeManager.rem(150), .5 * this._width, 0 + e + t, 1 * Math.PI - e + t), this._context.setLineDash([2, 3]), this._context.stroke(), this._context.closePath(), this._context.beginPath(), this._context.strokeStyle = c.c, this._context.lineWidth = 1, this._context.arc(.75 * this._width + this._tweenObject.x, .5 * this._width + n.resizeManager.rem(150), .5 * this._width, 0 + e + t, Math.PI - e + t - i * (1 - this._tweenObject.nextArcProgress)), this._context.setLineDash([2, 3]), this._context.stroke(), this._context.closePath(), this._context.beginPath(), this._context.fillStyle = c.c, this._context.arc(.5 * this._width + this._tweenObject.x, n.resizeManager.rem(150) + .07 * this._width, s * this._tweenObject.dotPreviousScale, 0, 2 * Math.PI), this._context.setLineDash([2, 3]), this._context.fill(), this._context.closePath(), this._context.beginPath(), this._context.fillStyle = c.c, this._context.arc(this._width + this._tweenObject.x, n.resizeManager.rem(150) + .07 * this._width, s * this._tweenObject.dotNextScale, 0, 2 * Math.PI), this._context.setLineDash([2, 3]), this._context.fill(), this._context.closePath()
                }
            }, {
                key: "_requestUpdate", value: function () {
                    this._isUpdateRequested || (this._isUpdateRequested = !0)
                }
            }]), t
        }(), x = function () {
            function t(e) {
                var i = this, n = e.el;
                d(this, t), _(this, "_resizeHandler", (function () {
                    i._width = i.el.clientWidth, i._height = i.el.clientHeight;
                    for (var t = 0, e = i.components.continent.length; t < e; t++) i.components.continent[t].resize();
                    i._setDragValues(), i._setContinentsTransform(), i._setProgress(), i._setContinent()
                })), _(this, "_changeDragPositionHandler", (function () {
                    i._setContinentsTransform(), i._setProgress(), i._setContinent()
                })), _(this, "_clickSlideHandler", (function (t) {
                    var e = i.components.continent.indexOf(t),
                        n = i.components.continent.slice(0, e).reduce((function (t, e) {
                            return t + e.dimensions.width
                        }), 0);
                    a.a.to(i._drag, {position: n, duration: 1, ease: l.a, onUpdate: i._changeDragPositionHandler})
                })), this.el = n, this.ui = {
                    background: this.el.querySelector(".js-background"),
                    continents: this.el.querySelector(".js-continents"),
                    continent: a.a.utils.toArray(this.el.querySelectorAll(".js-continent")),
                    scrollIndicator: this.el.querySelector(".js-scroll-indicator"),
                    location: this.el.querySelector(".js-location"),
                    overlay: this.el.querySelector(".js-overlay")
                };
                var s = new IntersectionObserver((function (t) {
                    t.forEach((function (t) {
                        t.intersectionRatio > 0 && (i._create(), s.unobserve(i.el))
                    }))
                }));
                s.observe(this.el)
            }

            return m(t, [{
                key: "_create", value: function () {
                    var t = this;
                    this.components = {
                        background: new k({el: this.ui.background}),
                        continent: this.ui.continent.map((function (e) {
                            return new y({el: e, onClick: t._clickSlideHandler})
                        })),
                        scrollIndicator: new h.a({el: this.ui.scrollIndicator}),
                        location: new p({el: this.ui.location}),
                        overlay: new P({el: this.ui.overlay})
                    }, this._drag = new o.b({
                        context: this.el,
                        inertia: {resistance: 40, duration: {min: 0, max: 1}}
                    }), this._limit = this.components.continent.length, this._width = this.el.clientWidth, this._height = this.el.clientHeight, this._tracker = u.c.track({
                        element: this.el,
                        container: "pages"
                    }), this._setDragValues(), this._setProgress(), this._setContinent(), this._setupEventListeners()
                }
            }, {
                key: "destroy", value: function () {
                    this._removeDrag(), this._removeEventListeners()
                }
            }, {
                key: "_setupEventListeners", value: function () {
                    n.resizeManager.addEventListener("resize", this._resizeHandler), n.resizeManager.addEventListener("resize:complete", this._resizeHandler), this._drag.addEventListener("change:position", this._changeDragPositionHandler)
                }
            }, {
                key: "_removeEventListeners", value: function () {
                    n.resizeManager.removeEventListener("resize", this._resizeHandler), n.resizeManager.removeEventListener("resize:complete", this._resizeHandler), this._drag.removeEventListener("change:position", this._changeDragPositionHandler)
                }
            }, {
                key: "_setDragValues", value: function () {
                    var t = this;
                    this._drag.position = 0, this._drag.limit = this.components.continent.reduce((function (t, e) {
                        return t + e.dimensions.width
                    }), 0) - this._width, this._drag.inertia.snap = function (e) {
                        var i = t.components.continent.map((function (t, e) {
                            return t.dimensions.width * e
                        }));
                        return a.a.utils.snap(i, e)
                    }
                }
            }, {
                key: "_setContinent", value: function () {
                    var t = this, e = .5 * this._width, i = this.components.continent.map((function (i, n) {
                            return t._width * n + e
                        })), n = this._drag.position + e, s = a.a.utils.snap(i, n), o = i.indexOf(s),
                        r = this.components.continent[o];
                    this.components.background.setContinent(r.id), this.components.location.setContinent(r.id)
                }
            }, {
                key: "_setProgress", value: function () {
                    for (var t, e, i, n = 0; n < this._limit; n++) t = this.components.continent[n].dimensions.width * n + .5 * this.components.continent[n].dimensions.width, e = this._drag.position + .5 * this.components.continent[n].dimensions.width, i = a.a.utils.clamp(0, 1, a.a.utils.normalize(t + this.components.continent[n].dimensions.width, t - this.components.continent[n].dimensions.width, e)), this.components.continent[n].setProgress(i, !0);
                    this.components.overlay.setProgress(this._drag.position / this._drag.limit * (this._limit - 1) % 1), this.components.scrollIndicator.setProgress(this._drag.position / this._drag.limit)
                }
            }, {
                key: "_setContinentsTransform", value: function () {
                    this.ui.continents.style.transform = "matrix(1.0, 0.0, 0.0, 1.0, ".concat(-1 * this._drag.position, ", 0)")
                }
            }]), t
        }();
        e.default = x
    }
}]);