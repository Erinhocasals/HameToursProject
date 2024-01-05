(window.webpackJsonp = window.webpackJsonp || []).push([[35], {
    423: function (e) {
        e.exports = JSON.parse('{"version":8,"name":"Hamme - Linemap","metadata":{"mapbox:type":"default","mapbox:origin":"monochrome-dark-v1","mapbox:sdk-support":{"android":"9.3.0","ios":"5.10.0","js":"2.0.0"},"mapbox:autocomposite":true,"mapbox:groups":{"Land, water, & sky, land":{"name":"Land, water, & sky, land","collapsed":false},"Land, water, & sky, water":{"name":"Land, water, & sky, water","collapsed":false},"Land, water, & sky, built":{"name":"Land, water, & sky, built","collapsed":false}},"mapbox:uiParadigm":"layers","mapbox:decompiler":{"id":"cknyfya100etr17qmn3n3meqb","componentVersion":"9.0.0","strata":[{"id":"monochrome-dark-v1","order":[["land-and-water","land"],["land-and-water","water"],["land-and-water","built"],["land-and-water","sky"],"country-boundaries","country-boundaries (1)"]}],"overrides":{"land-and-water":{"land-structure-line":{"layout":{"visibility":"none"}},"land-structure-polygon":{"layout":{"visibility":"none"}},"water":{"layout":{"visibility":"none"}},"waterway":{"layout":{"visibility":"none"}},"landuse":{"layout":{"visibility":"none"}},"national-park":{"layout":{"visibility":"none"}},"landcover":{"layout":{"visibility":"none"}}}},"components":{"land-and-water":"9.0.0"},"propConfig":{"land-and-water":{"color-base":"#111c26","transitionLandOnZoom":false,"land":"Simple","waterStyle":"Simple","sky":false}}}},"center":[44.730120870649216,42.142427449518266],"zoom":3.00977531621003,"bearing":0,"pitch":0,"sources":{"composite":{"url":"mapbox://mapbox.mapbox-terrain-v2,mapbox.mapbox-streets-v8,mapbox.country-boundaries-v1","type":"vector"}},"sprite":"mapbox://sprites/niarratravel/cknyhn91k401217p828fascrz/5hz0r2ejqbyyrcso52joqckj4","glyphs":"mapbox://fonts/niarratravel/{fontstack}/{range}.pbf","layers":[{"id":"land","type":"background","metadata":{"mapbox:featureComponent":"land-and-water","mapbox:group":"Land, water, & sky, land"},"layout":{},"paint":{"background-color":"#111c26"}},{"id":"landcover","type":"fill","metadata":{"mapbox:featureComponent":"land-and-water","mapbox:group":"Land, water, & sky, land"},"source":"composite","source-layer":"landcover","maxzoom":7,"layout":{"visibility":"none"},"paint":{"fill-color":"#111c26","fill-opacity":["interpolate",["exponential",1.5],["zoom"],2,0.3,7,0],"fill-antialias":false}},{"id":"national-park","type":"fill","metadata":{"mapbox:featureComponent":"land-and-water","mapbox:group":"Land, water, & sky, land"},"source":"composite","source-layer":"landuse_overlay","minzoom":5,"filter":["==",["get","class"],"national_park"],"layout":{"visibility":"none"},"paint":{"fill-color":"rgb(32, 49, 37)","fill-opacity":["interpolate",["linear"],["zoom"],5,0,6,0.5,10,0.5]}},{"id":"landuse","type":"fill","metadata":{"mapbox:featureComponent":"land-and-water","mapbox:group":"Land, water, & sky, land"},"source":"composite","source-layer":"landuse","minzoom":5,"filter":["match",["get","class"],["park","airport","glacier","pitch","sand","facility"],true,false],"layout":{"visibility":"none"},"paint":{"fill-color":"#111c26","fill-opacity":["interpolate",["linear"],["zoom"],5,0,6,["match",["get","class"],"glacier",0.5,1]]}},{"id":"waterway","type":"line","metadata":{"mapbox:featureComponent":"land-and-water","mapbox:group":"Land, water, & sky, water"},"source":"composite","source-layer":"waterway","minzoom":8,"layout":{"line-cap":["step",["zoom"],"butt",11,"round"],"line-join":"round","visibility":"none"},"paint":{"line-color":"#111c26","line-width":["interpolate",["exponential",1.3],["zoom"],9,["match",["get","class"],["canal","river"],0.1,0],20,["match",["get","class"],["canal","river"],8,3]],"line-opacity":["interpolate",["linear"],["zoom"],8,0,8.5,1]}},{"id":"water","type":"fill","metadata":{"mapbox:featureComponent":"land-and-water","mapbox:group":"Land, water, & sky, water"},"source":"composite","source-layer":"water","layout":{"visibility":"none"},"paint":{"fill-color":"#111c26"}},{"id":"land-structure-polygon","type":"fill","metadata":{"mapbox:featureComponent":"land-and-water","mapbox:group":"Land, water, & sky, built"},"source":"composite","source-layer":"structure","minzoom":13,"filter":["all",["==",["geometry-type"],"Polygon"],["==",["get","class"],"land"]],"layout":{"visibility":"none"},"paint":{"fill-color":"#111c26"}},{"id":"land-structure-line","type":"line","metadata":{"mapbox:featureComponent":"land-and-water","mapbox:group":"Land, water, & sky, built"},"source":"composite","source-layer":"structure","minzoom":13,"filter":["all",["==",["geometry-type"],"LineString"],["==",["get","class"],"land"]],"layout":{"line-cap":"round","visibility":"none"},"paint":{"line-width":["interpolate",["exponential",1.99],["zoom"],14,0.75,20,40],"line-color":"#111c26"}},{"id":"country-boundaries","type":"line","source":"composite","source-layer":"country_boundaries","layout":{"line-round-limit":1,"line-miter-limit":1,"line-cap":"square"},"paint":{"line-color":"hsl(0, 0%, 100%)","line-width":2,"line-opacity":["step",["zoom"],1,3.999,1,4,0]}},{"id":"country-boundaries (1)","type":"fill","source":"composite","source-layer":"country_boundaries","paint":{"fill-color":"#111c26","fill-outline-color":["step",["zoom"],"hsla(0, 0%, 100%, 0)",4,"hsl(0, 0%, 100%)",22,"hsl(0, 0%, 100%)"]}}],"created":"2021-04-26T10:59:23.930Z","modified":"2021-04-26T10:59:23.930Z","id":"cknyhn91k401217p828fascrz","owner":"niarratravel","visibility":"private","draft":false}')
    }, 433: function (e, t, a) {
        "use strict";
        a.r(t), a.d(t, "default", (function () {
            return S
        }));
        a(64), a(51), a(148), a(327), a(239), a(65), a(45), a(241), a(329), a(27), a(34), a(37), a(240), a(81);
        var r = a(1), o = a.n(r), n = a(35), i = a(330), s = a.n(i), l = a(337), u = a.n(l), c = a(243), p = a.n(c),
            d = (a(2), a(422)), m = a.n(d), f = a(423), y = a(22);

        function _(e) {
            return (_ = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                return typeof e
            } : function (e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            })(e)
        }

        function b(e, t) {
            for (var a = 0; a < t.length; a++) {
                var r = t[a];
                r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
            }
        }

        function h(e, t) {
            return (h = Object.setPrototypeOf || function (e, t) {
                return e.__proto__ = t, e
            })(e, t)
        }

        function v(e) {
            var t = function () {
                if ("undefined" == typeof Reflect || !Reflect.construct) return !1;
                if (Reflect.construct.sham) return !1;
                if ("function" == typeof Proxy) return !0;
                try {
                    return Date.prototype.toString.call(Reflect.construct(Date, [], (function () {
                    }))), !0
                } catch (e) {
                    return !1
                }
            }();
            return function () {
                var a, r = k(e);
                if (t) {
                    var o = k(this).constructor;
                    a = Reflect.construct(r, arguments, o)
                } else a = r.apply(this, arguments);
                return g(this, a)
            }
        }

        function g(e, t) {
            return !t || "object" !== _(t) && "function" != typeof t ? w(e) : t
        }

        function w(e) {
            if (void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return e
        }

        function k(e) {
            return (k = Object.setPrototypeOf ? Object.getPrototypeOf : function (e) {
                return e.__proto__ || Object.getPrototypeOf(e)
            })(e)
        }

        function x(e, t, a) {
            return t in e ? Object.defineProperty(e, t, {
                value: a,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = a, e
        }

        m.a.accessToken = "pk.eyJ1IjoibmlhcnJhdHJhdmVsIiwiYSI6ImNrbGIzaXE1bTByc2IybnM4cm1tcG85NmgifQ.i9w7eSLbcNUkmsXJsb29CQ";
        var S = function (e) {
            !function (e, t) {
                if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function");
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        writable: !0,
                        configurable: !0
                    }
                }), t && h(e, t)
            }(i, e);
            var t, a, r, o = v(i);

            function i(e) {
                var t, a = e.el;
                !function (e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, i), x(w(t = o.call(this)), "_fetchDataFromUrl", (function (e) {
                    return new Promise((function (t, a) {
                        e ? fetch(e).then((function (e) {
                            var a = e.json();
                            t(a)
                        })) : a()
                    }))
                })), x(w(t), "_fetchDataFromJsonString", (function (e) {
                    return new Promise((function (t, a) {
                        e ? t(JSON.parse(e)) : a()
                    }))
                })), x(w(t), "_parseData", (function (e) {
                    return new Promise((function (t) {
                        var a = 0;
                        e.features = p()(e.features) ? e.features : [], e.features = e.features.filter((function (e) {
                            var t = e.geometry, a = e.properties,
                                r = t && e.geometry.coordinates && e.geometry.coordinates[0] && e.geometry.coordinates[1];
                            return t && a && r
                        })), e.features = e.features.map((function (e) {
                            return e.properties.featureId = a++, e
                        })), t(e)
                    }))
                })), x(w(t), "_createMap", (function (e) {
                    t._data = e;
                    var a = JSON.parse(JSON.stringify(t._data));
                    a.features = u()(t._data.features, (function (e) {
                        return "".concat(e.geometry.coordinates[0], " - ").concat(e.geometry.coordinates[1])
                    })), t._map = new m.a.Map({
                        container: t.ui.map,
                        style: f,
                        zoom: 9,
                        minZoom: 1,
                        maxZoom: 22,
                        pitchWithRotate: !1,
                        touchPitch: !1,
                        touchZoomRotate: !1,
                        dragRotate: !1,
                        scrollZoom: !1,
                        attributionControl: !0,
                        dragPan: !Object(y.a)()
                    }), t._map.getContainer().addEventListener("touchstart", t._handleMapTouchStart, !1), t._map.getContainer().addEventListener("touchmove", t._handleMapTouchMove, !1), t._map.on("load", (function () {
                        t._map.addSource("locations", {
                            type: "geojson",
                            data: a,
                            cluster: !0,
                            clusterMaxZoom: 14,
                            clusterRadius: 35
                        }), t._map.addLayer({
                            id: "locations-clusters",
                            type: "circle",
                            source: "locations",
                            filter: ["has", "point_count"],
                            paint: {"circle-color": "green", "circle-radius": 0}
                        }), t._map.addLayer({
                            id: "locations-unclustered-point",
                            type: "circle",
                            source: "locations",
                            filter: ["!", ["has", "point_count"]],
                            paint: {"circle-color": "red", "circle-radius": 0}
                        }), t._map.addSource("route", {
                            type: "geojson",
                            data: {type: "Feature", properties: {}, geometry: {type: "LineString", coordinates: []}}
                        }), t._map.addLayer({
                            id: "route",
                            type: "line",
                            source: "route",
                            layout: {"line-join": "round", "line-cap": "round"},
                            paint: {"line-color": "#fc6220", "line-dasharray": [2, 4], "line-width": 2}
                        });
                        var r = new m.a.LngLatBounds, o = 4;
                        e.features && e.features.length ? e.features.forEach((function (e) {
                            r.extend(e.geometry.coordinates)
                        })) : (r.extend([-.1067969, 51.5182776]), o = 3), t._map.fitBounds(r, {
                            linear: !0,
                            duration: 0,
                            maxZoom: o,
                            padding: {top: 80, bottom: 130, left: 100, right: 100}
                        }), t._setupEventListeners(), t._dedouncedUpdate()
                    }))
                })), x(w(t), "_resizeHandler", (function () {
                    t._map.resize()
                })), x(w(t), "_buttonZoomInClickHandler", (function (e) {
                    e.preventDefault(), t._map.zoomIn({duration: 1e3})
                })), x(w(t), "_buttonZoomOutClickHandler", (function (e) {
                    e.preventDefault(), t._map.zoomOut({duration: 1e3})
                })), x(w(t), "_update", (function () {
                    t._updateMarkers(), t._updateClusters(), t._resetFeatureClusterIds(), t._updateLine()
                })), x(w(t), "_resetFeatureClusterIds", (function () {
                    t._data.features.forEach((function (e) {
                        e.properties.clusterId = null
                    }))
                })), x(w(t), "_updateLine", (function () {
                    var e = t._map.getSource("locations"), a = t._map.querySourceFeatures("locations");
                    t._getClusterData(e, a).then(t._createCoords).then(t._updateLineCoords)
                })), x(w(t), "_createCoords", (function () {
                    for (var e = arguments.length, a = new Array(e), r = 0; r < e; r++) a[r] = arguments[r];
                    var o = a.flat(2);
                    return new Promise((function (e) {
                        var a = [];
                        t._data.features.forEach((function (e) {
                            var a = e.geometry.coordinates, r = t._getFeatureByFeatureCoords(o, a);
                            r && (e.properties.clusterId = r.properties.clusterId)
                        })), t._data.features.forEach((function (e) {
                            var r = t._isFeatureInCluster(t._clusters, e);
                            if (r) {
                                var o = r.getLngLat(), n = [o.lng, o.lat];
                                a.push(n)
                            } else a.push(e.geometry.coordinates)
                        })), e(a)
                    }))
                })), x(w(t), "_updateLineCoords", (function (e) {
                    t._map.getSource("route").setData({
                        type: "Feature",
                        properties: {},
                        geometry: {type: "LineString", coordinates: e}
                    })
                })), x(w(t), "_updateMarkers", (function () {
                    t._markers = t._markers || {}, t._markersOnScreen = t._markersOnScreen || {};
                    var e = {}, a = t._map.querySourceFeatures("locations");
                    for (var r in a.forEach((function (a) {
                        var r = a.geometry.coordinates, o = a.properties;
                        if (!o.cluster) {
                            var n = o.featureId, i = t._markers[n];
                            if (!i) {
                                var s = document.createElement("div");
                                if (s.className = "mapbox__marker", a.properties.days) {
                                    var l = document.createElement("div");
                                    l.className = "mapbox__marker-days", l.textContent = a.properties.days, s.appendChild(l)
                                }
                                if (a.properties.title) {
                                    var u = document.createElement("div");
                                    u.className = "mapbox__marker-title", u.textContent = a.properties.title, s.appendChild(u)
                                }
                                i = t._markers[n] = new m.a.Marker({element: s}).setLngLat(r)
                            }
                            e[n] = i, t._markersOnScreen[n] || i.addTo(t._map)
                        }
                    })), t._markersOnScreen) e[r] || t._markersOnScreen[r].remove();
                    t._markersOnScreen = e
                })), x(w(t), "_updateClusters", (function () {
                    t._clusters = t._clusters || {}, t._clustersOnScreen = t._clustersOnScreen || {};
                    var e = {}, a = t._map.querySourceFeatures("locations");
                    for (var r in a.forEach((function (a) {
                        var r = a.geometry.coordinates, o = a.properties;
                        if (o.cluster) {
                            var n = o.cluster_id, i = t._clusters[n];
                            if (!i) {
                                var s = document.createElement("div");
                                s.className = "mapbox__cluster", s.textContent = o.point_count, i = t._clusters[n] = new m.a.Marker({element: s}).setLngLat(r)
                            }
                            e[n] = i, t._clustersOnScreen[n] || i.addTo(t._map)
                        }
                    })), t._clustersOnScreen) e[r] || t._clustersOnScreen[r].remove();
                    t._clustersOnScreen = e
                })), x(w(t), "_handleMapTouchStart", (function (e) {
                    if (2 === e.touches.length) {
                        e.stopImmediatePropagation(), e.preventDefault();
                        for (var a = 0, r = 0, o = 0, n = Array.from(e.touches); o < n.length; o++) {
                            var i = n[o];
                            a += i.screenX, r += i.screenY
                        }
                        t.state.panStart.x = a / e.touches.length, t.state.panStart.y = r / e.touches.length
                    }
                })), x(w(t), "_handleMapTouchMove", (function (e) {
                    if (2 === e.touches.length) {
                        t.state.scale == e.scale && (e.stopImmediatePropagation(), e.preventDefault()), t.state.scale = e.scale;
                        for (var a = 0, r = 0, o = 0, n = Array.from(e.touches); o < n.length; o++) {
                            var i = n[o];
                            a += i.screenX, r += i.screenY
                        }
                        var s = a / e.touches.length - t.state.panStart.x,
                            l = r / e.touches.length - t.state.panStart.y;
                        t.state.panStart.x = a / e.touches.length, t.state.panStart.y = r / e.touches.length, t._map.panBy([1 * s / -1, 1 * l / -1], {animate: !1})
                    }
                })), t.el = a, t.ui = {
                    map: t.el.querySelector(".js-map"),
                    buttonZoomIn: t.el.querySelector(".js-button-zoom-in"),
                    buttonZoomOut: t.el.querySelector(".js-button-zoom-out")
                }, t.state = {panStart: {x: 0, y: 0}, scale: 1};
                var r = t.el.dataset.geojson, n = t.el.dataset.url;
                return r ? t._fetchDataFromJsonString(r).then(t._parseData).then(t._createMap) : n && t._fetchDataFromUrl(n).then(t._parseData).then(t._createMap), t._dedouncedUpdate = s()(t._update, 10, {
                    leading: !0,
                    trailing: !0
                }), t
            }

            return t = i, (a = [{
                key: "_setupEventListeners", value: function () {
                    var e = this;
                    this._map.on("data", (function (t) {
                        "locations" === t.sourceId && e._dedouncedUpdate()
                    })), this._map.on("move", this._dedouncedUpdate), this._map.on("moveend", this._dedouncedUpdate), this.ui.buttonZoomIn.addEventListener("click", this._buttonZoomInClickHandler), this.ui.buttonZoomOut.addEventListener("click", this._buttonZoomOutClickHandler), this._resizeObserver = new n.a(this._resizeHandler), this._resizeObserver.observe(this.el)
                }
            }, {
                key: "_getClusterData", value: function (e, t) {
                    var a = this, r = [];
                    return t.forEach((function (t) {
                        if (t.properties.cluster_id) {
                            var o = a._getClusterLeaves(e, t);
                            r.push(o)
                        }
                    })), r.length <= 0 ? Promise.resolve([]) : Promise.all(r)
                }
            }, {
                key: "_getClusterLeaves", value: function (e, t) {
                    var a = t.properties.cluster_id, r = t.properties.point_count;
                    return new Promise((function (t, o) {
                        e.getClusterLeaves(a, r, 0, (function (e, r) {
                            e ? o() : (r.map((function (e) {
                                e.properties.clusterId = a
                            })), t(r))
                        }))
                    }))
                }
            }, {
                key: "_getFeatureByFeatureCoords", value: function (e, t) {
                    return e.find((function (e) {
                        return e.geometry.coordinates[0] === t[0] && e.geometry.coordinates[1] === t[1]
                    }))
                }
            }, {
                key: "_isFeatureInCluster", value: function (e, t) {
                    return t ? e[t.properties.clusterId] : null
                }
            }, {
                key: "_getFeatureByFeatureId", value: function (e, t) {
                    return e.find((function (e) {
                        return e.properties.featureId === t
                    }))
                }
            }]) && b(t.prototype, a), r && b(t, r), i
        }(o.a)
    }
}]);