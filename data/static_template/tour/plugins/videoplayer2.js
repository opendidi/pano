/**
 * 解密原生的videoplayer.js插件，主要解决微信无法播放全景视频的问题
 * @Author yuanjiang 932625974#qq.com
 */
var krpanoplugin = function() {
	function R(a) {
		return "boolean" == typeof a ? a : 0 <= "yesontrue1".indexOf(String(a).toLowerCase())
	}

	function d(a, b, d, r, f) {
		3 == a || 4 == a || 5 == a ? c[b] = d : c.registerattribute(b, d, r, f);
		I.push(b)
	}

	function l(a, c, b, d) {
		a.addEventListener(c, b, d);
		J.push({
			obj: a,
			eventname: c,
			callback: b,
			capture: d
		})
	}

	function D(a) {
		var c, b = J.length,
			d;
		for (c = 0; c < b; c++) if (d = J[c], null == a || d.obj === a) d.obj.removeEventListener(d.eventname, d.callback, d.capture), J.splice(c, 1), c--, b--
	}

	function la() {
		function a(a) {
			p = !0;
			0 < n && (q.seek(n), n = -1)
		}

		function d(a) {
			f && e && (S(e.src + " - loading failed"), e = null)
		}

		function g(a) {
			0 == x && (y(), q.paused = u = !0, E(null), 0 == c.iscomplete && (c.iscomplete = !0, h.call(c.onvideocomplete, c)))
		}

		function r() {
			if (f && b && !(2 > b.readyState)) {
				var a = h.timertick,
					d = 0,
					v = Number(b.duration);
				isNaN(v) || 0 >= v || (e ? (u && !e.paused ? e.pause() : !u && e.paused && e.play(), d = e.currentTime) : u ? d = w : (0 == z && (z = a), d = w + F * Math.max(0, (a - z) / 1E3)), d >= v - .02 ? (d = v, x ? (w = 0, z = a + .1, e && (e.currentTime = 0)) : (y(), q.paused = u = !0, E(null), 0 == c.iscomplete && (c.iscomplete = !0, h.call(c.onvideocomplete, c)))) : c.iscomplete = !1, A = d, .01 < Math.abs(b.currentTime - A) && (b.currentTime = Number(A.toFixed(2))), b.autoplay = !0)
			}
		}
		var q = this,
			u = q.paused = !0,
			m = null,
			e = null,
			k = null,
			p = !1,
			n = -1,
			z = 0,
			w = 0;
		(function() {
			if (!0 !== window.krpanoHideiPhoneMediaControlsStyle) {
				window.krpanoHideiPhoneMediaControlsStyle = !0;
				var a = document.createElement("style");
				a.type = "text/css";
				a.innerHTML = "*::-webkit-media-controls-panel{display: none!important;-webkit-appearance:none;} *::--webkit-media-controls-play-button{display: none!important;-webkit-appearance:none;} *::-webkit-media-controls-start-playback-button{display: none!important;-webkit-appearance:none;}";
				document.getElementsByTagName("head")[0].appendChild(a)
			}
		})();
		q.start = function() {
			c.iPhoneMode = !0;
			b.autoplay = !0;
			b.pause();
			b.style.webkitMediaControls = !1;
			var f = X(c.videourl, ["m4a", "mp3"]),
				f = h.parsePath(f);
			n = -1;
			f ? (null == e && (k ? (e = k, k = null) : e = document.createElement("audio")), D(e), l(e, "canplay", a, !0), l(e, "error", d, !0), l(e, "ended", g, !0), e.loop = x, p = e.autoplay = !1, e.src = f, e.load(), e.pause()) : e && (e.src && (e.pause(), k = e), e = null);
			z = w = 0;
			u = c.pausedonstart;
			q.paused = u;
			m = setInterval(r, 1E3 / 60);
			b.currentTime = 0
		};
		q.play_audio = function() {
			e && e.play()
		};
		q.play = function() {
			1 == u && (u = q.paused = !1, c.iscomplete ? (c.iscomplete = !1, w = 0, e && (e.currentTime = 0)) : w = b.currentTime, z = h.timertick + .1, e && e.play(), E(null))
		};
		q.pause = function() {
			0 == u && (e && e.pause(), w = b.currentTime, u = q.paused = !0, E(null))
		};
		q.seek = function(a) {
			e ? p ? (e.currentTime = a, n = -1) : n = a : (n = -1, z = 0, w = a)
		};
		q.remove = function() {
			m && (clearInterval(m), m = null);
			e && (e.src && (e.pause(), k = e), e = null)
		};
		q.setplaybackrate = function(a) {
			if (e) try {
				e.playbackRate = a
			} catch (c) {}
		};
		q.setloop = function(a) {
			e && (e.loop = a)
		};
		q.need_touchstart_play = function() {
			return null != e && e.paused
		};
		q.try_touchstart_play = function() {
			return e ? (e.play(), 0 == e.paused) : !0
		}
	}

	function S(a) {
		var b = c ? c.onerror : null;
		null != b && "" != b && "null" != ("" + b).toLowerCase() ? (c.videoerror = a, h.call(b, c)) : h.trace(3, a + "!")
	}

	function Y(a) {
		a = a.style;
		a.pointerEvents = "none";
		a.position = "absolute";
		a.width = "100%";
		a.height = "100%";
		a.left = 0;
		a.top = 0;
		a.opacity = 1;
		a.backgroundColor = "transparent";
		a[G] = "translateZ(0)";
		a[G + "Origin"] = "0 0"
	}

	/**
	 * 创建video的DOM对象
	 * @return {[type]} [description]
	 */
	function createVideo() {
		var a = null,
			a = document.createElement("video");
		if (!a || !a.play) return null;
		Y(a);
		return a
	}

	function T(a) {
		c && (a = document.visibilityState, !0 === document.hidden || "hidden" == a || "prerender" == a || "unloaded" == a ? 0 == c.ispaused && c.autopause && 0 == c.isautopaused && (c.isautopaused = !0, y()) : c.autoresume && c.isautopaused && (c.isautopaused = !1, K()))
	}

	function aa(a, b) {
		c.registercontentsize(a, b);
		c.forceresize = !0;
		c.videowidth = a;
		c.videoheight = b;
		c.havevideosize = !0;
		// h.trace(2, "aa");
		c.isvideoready = !0;
		if (c.onvideoreadyCB) c.onvideoreadyCB();
		h.call(c.onvideoready, c)
	}

	function X(a, b) {
		B = null;
		var d = ("" + a).split("|");
		if (1 < d.length || b) {
			var f = p;
			b && (f = b);
			var g = f.length,
				l = d.length,
				h, e, k = [];
			for (h = 0; h < l; h++) if (e = d[h]) {
				var m = e;
				if (0 != e.indexOf("rtmp:")) {
					var n = e.indexOf("?");
					0 < n && (e = e.slice(0, n));
					n = e.indexOf("#");
					0 < n && (e = e.slice(0, n));
					n = e.lastIndexOf(".");
					if (1 < n) for (n = ("" + e.slice(n + 1)).toLowerCase(), e = 0; e < g; e++) if (n == f[e]) {
						if (b) return m;
						k.push({
							type: n,
							inorder: h,
							url: m,
							used: !1
						});
						break
					}
				}
			}
			if (b) return null;
			if (0 < k.length) return "" != c.preferredformat && k.sort(function(a, b) {
				var d = a.type,
					e = b.type,
					f = "m3u" == d || "m3u8" == d ? 0 : "mp4" == d || "m4v" == d ? 1 : "webm" == d ? 2 : 3,
					v = "m3u" == e || "m3u8" == e ? 0 : "mp4" == e || "m4v" == e ? 1 : "webm" == e ? 2 : 3,
					g = ("" + c.preferredformat).toLowerCase();
				"" != g && (d == g && (f = -1), e == g && (v = -1));
				return f > v ? 1 : f < v ? -1 : a.inorder > b.inorder ? 1 : a.inorder < b.inorder ? -1 : 0
			}), B = k, ba()
		}
		return a
	}

	function ba() {
		if (B) {
			var a, b;
			b = B.length;
			for (a = 0; a < b; a++) if (0 == B[a].used) return B[a].used = !0, B[a].url
		}
		return null
	}

	function U(a, b) {
		var c = !0;
		if (!m.android || !m.chrome) {
			var d = b.indexOf("://");
			if (0 < d) {
				var f = document.domain,
					d = b.slice(d + 3, b.indexOf("/", d + 3));
				f == d && (c = !1)
			}
		}
		c && ((c = h.security.cors) && "" != c || (c = "anonymous"), a.crossOrigin = c)
	}

	/**
	 * playvideo(videourl, posturl, pausedonstart, starttime)
	 * @param  {String} a [description]
	 * @param  {String} d [description]
	 * @param  {Boolean} k [description]
	 * @param  {Number} r [description]
	 * @return {[type]}   [description]
	 */
	function ca(a, d, k, r) {
		c.videourl = void 0 === a || null == a || "" == a || "null" == ("" + a).toLowerCase() ? null : a;
		c.posterurl = void 0 === d || null == d || "" == d || "null" == ("" + d).toLowerCase() ? null : d;
		c.pausedonstart = R(k);
		r = Number(r);
		if (isNaN(r) || 0 > r) r = 0;
		A = r;
		H = 0 < r ? r : -1;
		a = X(c.videourl);
		C = a = h.parsePath(a);
		// h.trace(2, "ca");
		c.isvideoready = !1;
		c.havevideosize = !1;
		c.isautopaused = !1;
		c.isseeking = 0 < H && null == f;
		c.iscomplete = !1;
		c.ispaused = !0;
		c.loadedbytes = 0;
		c.totalbytes = 0;
		c.totaltime = 0;
		c.videoerror = "";
		// a 为视频地址
		if(null != a){
			if(b && b.src){
				f ? f.pause() : b.pause()
			}else{
				null == b && (b = createVideo(), c.videoDOM = b)
			}
			if(c.posterurl && (c.pausedonstart || m.mobile || m.tablet)){
				if(null == g){
					g = document.createElement("img")
					l(g, "error", ma, !1)
					l(g, "load", na, !1)
				}
				a = c.posterurl
				V = a = h.parsePath(a)
				U(g, a)
				g.src = a
			}else{
				da()
			}
		}
	}

	function ma(a) {
		b && S(V + " - loading failed")
	}

	function na(a) {
		if (b) {
			a = g.naturalWidth;
			var d = g.naturalHeight;
			Y(g);
			c.sprite && (c.sprite.appendChild(g), Array.prototype.indexOf.call(g.parentNode.children, g));
			c.posterDOM = g;
			aa(a, d);
			da()
		}
	}

	function da() {
		D(b);
		t && (clearInterval(t), t = null);
		f && f.remove();
		l(b, "loadedmetadata", k, !1);
		l(b, "loadeddata", k, !1);
		l(b, "canplay", k, !1);
		l(b, "canplaythrough", k, !1);
		l(b, "play", k, !1);
		l(b, "pause", k, !1);
		l(b, "playing", k, !1);
		l(b, "seeking", k, !1);
		l(b, "waiting", k, !1);
		l(b, "seeked", k, !1);
		l(b, "stalled", k, !1);
		l(b, "suspend", k, !1);
		l(b, "ended", k, !1);
		l(b, "timeupdate", k, !1);
		l(b, "progress", L, !1);
		m.ios && (t = setInterval(L, 500));
		l(b, "error", oa, !1);
		b.loop = c.loop;
		b.autoplay = c.pausedonstart ? !1 : !0;
		b.preload = c.html5preload;
		b.controls = c.html5controls;
		b.setAttribute("playsinline", "");
		b.setAttribute("webkit-playsinline", "");
		// 安卓微信、QQ弹出播放问题
		b.setAttribute('x5-video-player-type', 'h5')
		ea(M);
		fa(N);
		ga(F);
		ha(O);
		U(b, C);
		b.src = C;
		b.load();
		f ? f.start() : c.pausedonstart ? b.pause() : b.play()
	}

	function oa(a) {
		if (b) {
			a = null;
			a = b.error ? b.error.code : 0;
			if (3 <= a) {
				var c = ba();
				if (c) {
					C = a = h.parsePath(c);
					U(b, C);
					b.src = C;
					b.load();
					return
				}
			}
			switch (a) {
			case 1:
				a = "video loading aborted";
				break;
			case 2:
				a = "network loading error";
				break;
			case 3:
				a = "video decoding failed (corrupted data or unsupported codec)";
				break;
			case 4:
				a = "loading video failed";
				break;
			default:
				a = "unknown error"
			}
			a && S(C + " - " + a)
		}
	}

	function L(a) {
		null != t && a && "progress" == a.type && (clearInterval(t), t = null);
		if (b && b.buffered) {
			var d, f;
			d = b.buffered.length;
			f = b.duration;
			if (0 < f && (c.totaltime = f, 0 < d)) {
				var g = 0;
				for (a = 0; a < d; a++) {
					var h = b.buffered.end(a);
					h > g && (g = h)
				}
				c.loadedbytes = 1048576 * g | 0;
				c.totalbytes = 1048576 * f | 0
			}
		}
	}

	/**
	 * 事件回调
	 * @param  {[type]} a [description]
	 * @return {[type]}   [description]
	 */
	function k(a) {
		// h.trace(0, a.type)
		if (b) switch (a.type) {
		case "loadedmetadata":
		case "loadeddata":
			// h.trace(2, "loadeddata")
			0 < H && (P(H), H = -1);
			L();
			a = b.videoWidth;
			var d = b.videoHeight;
			0 == c.havevideosize && 0 < a && 0 < d && aa(a, d);
			// h.trace(0, a)
			// 未读取到视频宽度，m3u8格式默认第一次读取不到
			if(! (a > 0)){
				// 继续读取
				setTimeout(function(){
					k({type: 'loadedmetadata'})
				}, 100)
			}
			break;
		case "canplay":
		case "canplaythrough":
			L();
			null == f ? 0 == c.pausedonstart && b.paused && (b.play(), W()) : 0 == c.pausedonstart && f.need_touchstart_play() && (f.play_audio(), W());
			break;
		case "seeking":
		case "seeked":
			c.isseeking = f ? !1 : "seeking" == a.type;
		case "play":
		case "pause":
		case "playing":
		case "waiting":
		case "stalled":
		case "suspend":
		case "ended":
		case "timeupdate":
			E(a)
		}
	}

	function E(a) {
		a = !1;
		g && 2 <= b.readyState && (0 == b.paused || f && 0 == f.paused) && (a = !0, m.chromemobile && 0 == b.currentTime && (a = !1));
		a && (D(g), g.parentNode && g.parentNode.removeChild(g), g = V = c.posterDOM = null);
		c.isvideoready && (a = f ? f : b, c.ispaused != a.paused && (0 == a.paused ? (c.ispaused = !1, h.call(c.onvideoplay, c)) : (c.ispaused = !0, h.call(c.onvideopaused, c))), null == f && c.iscomplete != b.ended && (1 == b.ended ? (y(), 0 == c.iscomplete && (c.iscomplete = !0, h.call(c.onvideocomplete, c))) : c.iscomplete = !1))
	}

	function W() {
		m.touch && (b.paused && !f || f && f.need_touchstart_play()) && 0 == Q && (Q = !0, c.touchworkarounds && (l(document.body, "touchstart", ia, !0), l(document.body, "touchend", ia, !0)), c.needtouch = !0, h.call(c.onneedtouch, c))
	}

	function ja() {
		Q && (Q = !1, D(document.body), c.needtouch = !1, h.call(c.ongottouch, c))
	}

	function ia(a) {
		b && (a = !1, f ? a = f.try_touchstart_play() : (b.play(), a = 0 == b.paused), a && ja())
	}

	function pa(a) {
		x = R(a);
		b && (b.loop = x);
		f && f.setloop(a)
	}

	function qa() {
		return x
	}

	function ra(a) {
		P(a)
	}

	function sa() {
		if (b) {
			var a = Number(b.currentTime);
			if (!isNaN(a)) return a
		}
		return A
	}

	function ea(a) {
		a = Number(a);
		isNaN(a) ? a = 1 : 0 > a ? a = 0 : 1 < a && (a = 1);
		M = a;
		b && (b.volume = a)
	}

	function ta() {
		return M
	}

	function fa(a) {
		N = a;
		b && (b.muted = a)
	}

	function ua() {
		return N
	}

	function ga(a) {
		a = Number(a);
		if (isNaN(a) || 0 == a) a = 1;
		F = a;
		if (b) try {
			b.playbackRate = a
		} catch (c) {}
		f && f.setplaybackrate(a)
	}

	function va() {
		return F
	}

	function ha(a) {
		O = a = R(a);
		b && m.safari && (b.airplay = b["x-webkit-airplay"] = a ? "allow" : "disallow")
	}

	function wa() {
		return O
	}

	function K() {
		f ? f.play() : b && b.play();
		c.pausedonstart = !1;
		W()
	}

	function y() {
		f ? f.pause() : b && b.pause();
		c.pausedonstart = !0;
		ja()
	}

	function xa() {
		b && (0 == b.paused || f && 0 == f.paused ? y() : K())
	}

	function P(a) {
		if (b && b.src) {
			var c = 0,
				c = 0 < ("" + a).indexOf("%") && 0 < b.duration ? parseFloat(a) / 100 * b.duration : Number(a);
			isNaN(c) || (f ? f.seek(c) : b.currentTime = c)
		}
	}

	function ya() {
		P(0);
		y()
	}

	function ka() {
		// h.trace(2, "ka")
		b && (b.pause(), f && f.remove(), D(b), g && g.parentNode && g.parentNode.removeChild(g), b && b.parentNode && b.parentNode.removeChild(b), c.videoDOM = null, c.posterDOM = null, c.iPhoneMode = !1, b = g = null, c.videourl = null, c.isvideoready = !1, c.ispaused = !0, c.iscomplete = !1, c.isseeking = !1, c.isautopaused = !1, c.havevideosize = !1, c.videowidth = 0, c.videoheight = 0, c.loadedbytes = 0, c.totalbytes = 0, c.totaltime = 0, c.videoerror = "", A = 0)
	}
	this.name = "Videoplayer";
	this.version = "1.19-pr7";
	this.build = "2016-09-09";
	var h = null, // krpanointerface
		m = null, // krpanointerface.devices
		c = null, // video对象
		b = null,
		g = null,
		V = null,
		C = null,
		B = null,
		p = [],
		G = "transform",
		f = null,
		H = -1,
		Q = !1,
		t = null,
		x = !1,
		M = 1,
		N = !1,
		F = 1,
		O = !1,
		A = 0,
		I = [],
		J = [];
	// krpanointerface, pluginpath, pluginobject
	this.registerplugin = function(krpanointerface, pluginpath, pluginobject) {
		h = krpanointerface;
		m = h.device;
		c = pluginobject;
		if("1.19" > h.version || "2015-03-01" > h.build){
			h.trace(3, "Videoplayer plugin - too old krpano version (min. 1.19)")
		}else{
			G = h.browser.css.transform
			if(b = createVideo()){
				if(void 0 !== b.canPlayType){
					//支持canPlayType判断可播放格式
					(b.canPlayType("video/mp4").match(/maybe|probably/i) && (p.push("mp4"), p.push("m4v"), p.push("mov"), p.push("3gp")), b.canPlayType("video/webm").match(/maybe|probably/i) && p.push("webm"), b.canPlayType("video/ogg").match(/maybe|probably/i) && (p.push("ogg"), p.push("ogv")), b.canPlayType("video/hls").match(/maybe|probably/i) && (p.push("m3u"), p.push("m3u8")))
				}else{
					// 默认允许mp4和mov
					(p.push("mp4"), p.push("mov"))
				}
				d(0, "videourl", null)
				d(0, "altvideourl", null)
				d(0, "posterurl", null)
				d(0, "panovideo", !1)
				d(0, "use_as_videopano", !1)
				d(0, "pausedonstart", !1)
				d(0, "autopause", !0)
				d(0, "autoresume", !1)
				d(0, "preferredformat", "")
				d(0, "iphoneworkarounds", !0)
				d(0, "touchworkarounds", !0)
				d(0, "html5controls", !1)
				d(0, "html5preload", "auto")
				d(1, "loop", x, pa, qa)
				d(1, "time", A, ra, sa)
				d(1, "volume", M, ea, ta)
				d(1, "muted", N, fa, ua)
				d(1, "playbackrate", F, ga, va)
				d(1, "airplay", O, ha, wa)
				d(2, "onvideoready", null)
				d(2, "onvideoplay", null)
				d(2, "onvideopaused", null)
				d(2, "onvideocomplete", null)
				d(2, "onerror", null)
				d(2, "onneedtouch", null)
				d(2, "ongottouch", null)
				d(3, "playvideo", ca)
				d(3, "play", K)
				d(3, "resume", K)
				d(3, "pause", y)
				d(3, "togglepause", xa)
				d(3, "seek", P)
				d(3, "stop", ya)
				d(3, "closevideo", ka)
				d(4, "isvideoready", !1)
				d(4, "iswaiting", !1)
				d(4, "ispaused", !0)
				d(4, "iscomplete", !1)
				d(4, "isseeking", !1)
				d(4, "isautopaused", !1)
				d(4, "havevideosize", !1)
				d(4, "needtouch", !1)
				d(4, "videowidth", 0)
				d(4, "videoheight", 0)
				d(4, "loadedbytes", 0)
				d(4, "totalbytes", 0)
				d(4, "totaltime", 0)
				d(4, "videoerror", "")
				d(5, "videoDOM", b)
				d(5, "posterDOM", g)
				d(5, "iPhoneMode", !1)
				l(window, "pagehide", T, !1)
				l(window, "pageshow", T, !1)
				l(document, "visibilitychange", T, !1)
				a = m.ios && 10 <= m.iosversion
				m.iphone && 1 == c.iphoneworkarounds && 0 == a && (f = new la)
				c.sprite && (0 == c.use_as_videopano && 0 == c.panovideo || !m.panovideosupport) && !0 !== c.renderToBitmap && (c.sprite.appendChild(b), Array.prototype.indexOf.call(b.parentNode.children, b))
				ca(c.altvideourl ? c.altvideourl : c.videourl, c.posterurl, c.pausedonstart, c.time)
			}else{
				h.trace(2, "Videoplayer plugin - HTML5 video is not supported by this browser!")
			}
			var canvas = document.getElementById("krpanoSWFObject").getElementsByTagName('canvas')[0];
			canvas.onresize = function(event){
				var intvalListener = setInterval(function(){
					if(canvas.parentElement.parentElement.parentElement.style.width == '100%'){
						clearInterval(intvalListener);
					}
			
					canvas.style.width = '100%';
					canvas.style.height = '100%';
					canvas.parentElement.parentElement.style.width = '100%';
					canvas.parentElement.parentElement.style.height = '100%';
					canvas.parentElement.parentElement.parentElement.style.width = '100%';
					canvas.parentElement.parentElement.parentElement.style.height = '100%';
				},50);
			}
		}
	};
	this.unloadplugin = function() {
		ka();
		var a, b = I.length;
		for (a = 0; a < b; a++) delete c[I[a]];
		I = null;
		D(null);
		t && (clearInterval(t), t = null);
		h = m = c = null
	};
	this.onresize = function(a, d) {
		if (b && c && !0 !== c.renderToBitmap) {
			var f = b.videoWidth,
				l = b.videoHeight;
			if (0 < f && 0 < l) {
				var k = f + "px",
					m = l + "px",
					p = "hotspot" == c._type && c.distorted ? 1 : h.stagescale,
					f = "translateZ(0) scale(" + a * p / f + "," + d * p / l + ")";
				g && (k != g.style.width && (g.style.width = k), m != g.style.width && (g.style.height = m), g.style[G] = f);
				k != b.style.width && (b.style.width = k);
				m != b.style.height && (b.style.height = m);
				b.style[G] = f
			}
		}
		return !1
	}
};