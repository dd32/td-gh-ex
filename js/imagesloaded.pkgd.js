/*!
 * imagesLoaded PACKAGED v4.0.0
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */
(function() {
    "use strict";

    function e() {}

    function t(e, t) {
        for (var n = e.length; n--;)
            if (e[n].listener === t) return n;
        return -1
    }

    function n(e) {
        return function() {
            return this[e].apply(this, arguments)
        }
    }
    var i = e.prototype,
        r = this,
        s = r.EventEmitter;
    i.getListeners = function(e) {
        var t, n, i = this._getEvents();
        if (e instanceof RegExp) {
            t = {};
            for (n in i) i.hasOwnProperty(n) && e.test(n) && (t[n] = i[n])
        } else t = i[e] || (i[e] = []);
        return t
    }, i.flattenListeners = function(e) {
        var t, n = [];
        for (t = 0; t < e.length; t += 1) n.push(e[t].listener);
        return n
    }, i.getListenersAsObject = function(e) {
        var t, n = this.getListeners(e);
        return n instanceof Array && (t = {}, t[e] = n), t || n
    }, i.addListener = function(e, n) {
        var i, r = this.getListenersAsObject(e),
            s = "object" == typeof n;
        for (i in r) r.hasOwnProperty(i) && -1 === t(r[i], n) && r[i].push(s ? n : {
            listener: n,
            once: !1
        });
        return this
    }, i.on = n("addListener"), i.addOnceListener = function(e, t) {
        return this.addListener(e, {
            listener: t,
            once: !0
        })
    }, i.once = n("addOnceListener"), i.defineEvent = function(e) {
        return this.getListeners(e), this
    }, i.defineEvents = function(e) {
        for (var t = 0; t < e.length; t += 1) this.defineEvent(e[t]);
        return this
    }, i.removeListener = function(e, n) {
        var i, r, s = this.getListenersAsObject(e);
        for (r in s) s.hasOwnProperty(r) && (i = t(s[r], n), -1 !== i && s[r].splice(i, 1));
        return this
    }, i.off = n("removeListener"), i.addListeners = function(e, t) {
        return this.manipulateListeners(!1, e, t)
    }, i.removeListeners = function(e, t) {
        return this.manipulateListeners(!0, e, t)
    }, i.manipulateListeners = function(e, t, n) {
        var i, r, s = e ? this.removeListener : this.addListener,
            o = e ? this.removeListeners : this.addListeners;
        if ("object" != typeof t || t instanceof RegExp)
            for (i = n.length; i--;) s.call(this, t, n[i]);
        else
            for (i in t) t.hasOwnProperty(i) && (r = t[i]) && ("function" == typeof r ? s.call(this, i, r) : o.call(this, i, r));
        return this
    }, i.removeEvent = function(e) {
        var t, n = typeof e,
            i = this._getEvents();
        if ("string" === n) delete i[e];
        else if (e instanceof RegExp)
            for (t in i) i.hasOwnProperty(t) && e.test(t) && delete i[t];
        else delete this._events;
        return this
    }, i.removeAllListeners = n("removeEvent"), i.emitEvent = function(e, t) {
        var n, i, r, s, o, h = this.getListenersAsObject(e);
        for (s in h)
            if (h.hasOwnProperty(s))
                for (n = h[s].slice(0), r = n.length; r--;) i = n[r], i.once === !0 && this.removeListener(e, i.listener), o = i.listener.apply(this, t || []), o === this._getOnceReturnValue() && this.removeListener(e, i.listener);
        return this
    }, i.trigger = n("emitEvent"), i.emit = function(e) {
        var t = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(e, t)
    }, i.setOnceReturnValue = function(e) {
        return this._onceReturnValue = e, this
    }, i._getOnceReturnValue = function() {
        return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
    }, i._getEvents = function() {
        return this._events || (this._events = {})
    }, e.noConflict = function() {
        return r.EventEmitter = s, e
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function() {
        return e
    }) : "object" == typeof module && module.exports ? module.exports = e : r.EventEmitter = e
}).call(this),
    function(e, t) {
        "use strict";
        "function" == typeof define && define.amd ? define(["eventEmitter/EventEmitter"], function(n) {
            return t(e, n)
        }) : "object" == typeof module && module.exports ? module.exports = t(e, require("wolfy87-eventemitter")) : e.imagesLoaded = t(e, e.EventEmitter)
    }(window, function(e, t) {
        function n(e, t) {
            for (var n in t) e[n] = t[n];
            return e
        }

        function i(e) {
            var t = [];
            if (Array.isArray(e)) t = e;
            else if ("number" == typeof e.length)
                for (var n = 0; n < e.length; n++) t.push(e[n]);
            else t.push(e);
            return t
        }

        function r(e, t, s) {
            return this instanceof r ? ("string" == typeof e && (e = document.querySelectorAll(e)), this.elements = i(e), this.options = n({}, this.options), "function" == typeof t ? s = t : n(this.options, t), s && this.on("always", s), this.getImages(), h && (this.jqDeferred = new h.Deferred), void setTimeout(function() {
                this.check()
            }.bind(this))) : new r(e, t, s)
        }

        function s(e) {
            this.img = e
        }

        function o(e, t) {
            this.url = e, this.element = t, this.img = new Image
        }
        var h = e.jQuery,
            a = e.console;
        r.prototype = Object.create(t.prototype), r.prototype.options = {}, r.prototype.getImages = function() {
            this.images = [], this.elements.forEach(this.addElementImages, this)
        }, r.prototype.addElementImages = function(e) {
            "IMG" == e.nodeName && this.addImage(e), this.options.background === !0 && this.addElementBackgroundImages(e);
            var t = e.nodeType;
            if (t && u[t]) {
                for (var n = e.querySelectorAll("img"), i = 0; i < n.length; i++) {
                    var r = n[i];
                    this.addImage(r)
                }
                if ("string" == typeof this.options.background) {
                    var s = e.querySelectorAll(this.options.background);
                    for (i = 0; i < s.length; i++) {
                        var o = s[i];
                        this.addElementBackgroundImages(o)
                    }
                }
            }
        };
        var u = {
            1: !0,
            9: !0,
            11: !0
        };
        return r.prototype.addElementBackgroundImages = function(e) {
            var t = getComputedStyle(e);
            if (t)
                for (var n = /url\((['"])?(.*?)\1\)/gi, i = n.exec(t.backgroundImage); null !== i;) {
                    var r = i && i[2];
                    r && this.addBackground(r, e), i = n.exec(t.backgroundImage)
                }
        }, r.prototype.addImage = function(e) {
            var t = new s(e);
            this.images.push(t)
        }, r.prototype.addBackground = function(e, t) {
            var n = new o(e, t);
            this.images.push(n)
        }, r.prototype.check = function() {
            function e(e, n, i) {
                setTimeout(function() {
                    t.progress(e, n, i)
                })
            }
            var t = this;
            return this.progressedCount = 0, this.hasAnyBroken = !1, this.images.length ? void this.images.forEach(function(t) {
                t.once("progress", e), t.check()
            }) : void this.complete()
        }, r.prototype.progress = function(e, t, n) {
            this.progressedCount++, this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded, this.emit("progress", this, e, t), this.jqDeferred && this.jqDeferred.notify && this.jqDeferred.notify(this, e), this.progressedCount == this.images.length && this.complete(), this.options.debug && a && a.log("progress: " + n, e, t)
        }, r.prototype.complete = function() {
            var e = this.hasAnyBroken ? "fail" : "done";
            if (this.isComplete = !0, this.emit(e, this), this.emit("always", this), this.jqDeferred) {
                var t = this.hasAnyBroken ? "reject" : "resolve";
                this.jqDeferred[t](this)
            }
        }, s.prototype = Object.create(t.prototype), s.prototype.check = function() {
            var e = this.getIsImageComplete();
            return e ? void this.confirm(0 !== this.img.naturalWidth, "naturalWidth") : (this.proxyImage = new Image, this.proxyImage.addEventListener("load", this), this.proxyImage.addEventListener("error", this), this.img.addEventListener("load", this), this.img.addEventListener("error", this), void(this.proxyImage.src = this.img.src))
        }, s.prototype.getIsImageComplete = function() {
            return this.img.complete && void 0 !== this.img.naturalWidth
        }, s.prototype.confirm = function(e, t) {
            this.isLoaded = e, this.emit("progress", this, this.img, t)
        }, s.prototype.handleEvent = function(e) {
            var t = "on" + e.type;
            this[t] && this[t](e)
        }, s.prototype.onload = function() {
            this.confirm(!0, "onload"), this.unbindEvents()
        }, s.prototype.onerror = function() {
            this.confirm(!1, "onerror"), this.unbindEvents()
        }, s.prototype.unbindEvents = function() {
            this.proxyImage.removeEventListener("load", this), this.proxyImage.removeEventListener("error", this), this.img.removeEventListener("load", this), this.img.removeEventListener("error", this)
        }, o.prototype = Object.create(s.prototype), o.prototype.check = function() {
            this.img.addEventListener("load", this), this.img.addEventListener("error", this), this.img.src = this.url;
            var e = this.getIsImageComplete();
            e && (this.confirm(0 !== this.img.naturalWidth, "naturalWidth"), this.unbindEvents())
        }, o.prototype.unbindEvents = function() {
            this.img.addEventListener("load", this), this.img.addEventListener("error", this)
        }, o.prototype.confirm = function(e, t) {
            this.isLoaded = e, this.emit("progress", this, this.element, t)
        }, r.makeJQueryPlugin = function(t) {
            t = t || e.jQuery, t && (h = t, h.fn.imagesLoaded = function(e, t) {
                var n = new r(this, e, t);
                return n.jqDeferred.promise(h(this))
            })
        }, r.makeJQueryPlugin(), r
    });