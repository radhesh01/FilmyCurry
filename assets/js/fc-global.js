/* ================================================================
   FilmyCurry — Global JS
   File: assets/js/fc-global.js
   ================================================================ */

(function () {
  'use strict';

  /* ── CURSOR ─────────────────────────────────────────────────── */
  const cur   = document.getElementById('fc-cursor');
  const ring  = document.getElementById('fc-cursor-ring');
  const clbl  = document.getElementById('fc-cursor-label');
  let mx = 0, my = 0, rx = 0, ry = 0;

  if (cur && ring) {
    document.addEventListener('mousemove', function (e) {
      mx = e.clientX; my = e.clientY;
      cur.style.left = mx + 'px'; cur.style.top = my + 'px';
    });

    (function animRing() {
      rx += (mx - rx) * .1;
      ry += (my - ry) * .1;
      ring.style.left = rx + 'px'; ring.style.top = ry + 'px';
      if (clbl) { clbl.style.left = rx + 'px'; clbl.style.top = ry + 'px'; }
      requestAnimationFrame(animRing);
    })();

    document.querySelectorAll('[data-fc-cur]').forEach(function (el) {
      el.addEventListener('mouseenter', function () {
        document.body.classList.add('fc-ch');
        if (clbl) clbl.textContent = el.dataset.fcCur;
      });
      el.addEventListener('mouseleave', function () {
        document.body.classList.remove('fc-ch');
        if (clbl) clbl.textContent = '';
      });
    });

    document.querySelectorAll('a:not([data-fc-cur]),button:not([data-fc-cur])').forEach(function (el) {
      el.addEventListener('mouseenter', function () { document.body.classList.add('fc-ch'); });
      el.addEventListener('mouseleave', function () { document.body.classList.remove('fc-ch'); });
    });
  }

  /* ── SCROLL PROGRESS ─────────────────────────────────────────── */
  var prog = document.getElementById('fc-progress');
  var nav  = document.getElementById('fc-nav');

  window.addEventListener('scroll', function () {
    var pct = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
    if (prog) prog.style.width = pct + '%';
    if (nav)  nav.classList.toggle('scrolled', window.scrollY > 64);
  }, { passive: true });

  /* ── SCROLL REVEAL ───────────────────────────────────────────── */
  var rvEls = document.querySelectorAll('.fc-rv, .fc-rv-left, .fc-rv-scale');

  if ('IntersectionObserver' in window) {
    var rvObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          e.target.classList.add('fc-in');
          rvObs.unobserve(e.target);
        }
      });
    }, { threshold: .08, rootMargin: '0px 0px -36px 0px' });

    rvEls.forEach(function (el) { rvObs.observe(el); });
  } else {
    rvEls.forEach(function (el) { el.classList.add('fc-in'); });
  }

  /* ── PARALLAX ORBS ON SCROLL ─────────────────────────────────── */
  var orbs = document.querySelectorAll('.fc-orb');

  window.addEventListener('scroll', function () {
    var sy = window.scrollY * .04;
    orbs.forEach(function (o, i) {
      var dir = i % 2 === 0 ? 1 : -1;
      var base = o.style.transform || '';
      // Just add a subtle Y shift on top of the animation
      o.style.marginTop = (sy * dir * .6) + 'px';
    });
  }, { passive: true });

  /* ── MOBILE MENU ─────────────────────────────────────────────── */
  var mob  = document.getElementById('fc-mob');
  var hbg  = document.getElementById('fc-hbg');
  var hb1  = document.getElementById('fc-hb1');
  var hb2  = document.getElementById('fc-hb2');
  var hb3  = document.getElementById('fc-hb3');
  var isOpen = false;

  if (hbg && mob) {
    hbg.addEventListener('click', function () {
      isOpen = !isOpen;
      mob.classList.toggle('open', isOpen);
      document.body.style.overflow = isOpen ? 'hidden' : '';
      hbg.setAttribute('aria-expanded', isOpen);
      if (hb1) hb1.style.transform = isOpen ? 'rotate(45deg) translate(4px, 5px)' : '';
      if (hb2) hb2.style.opacity   = isOpen ? '0' : '';
      if (hb3) hb3.style.transform = isOpen ? 'rotate(-45deg) translate(4px, -5px)' : '';
    });

    mob.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        isOpen = false; mob.classList.remove('open');
        document.body.style.overflow = '';
        hbg.setAttribute('aria-expanded', 'false');
        if (hb1) hb1.style.transform = '';
        if (hb2) hb2.style.opacity   = '';
        if (hb3) hb3.style.transform = '';
      });
    });
  }

  /* ── COUNTER ANIMATION ───────────────────────────────────────── */
  document.querySelectorAll('[data-fc-count]').forEach(function (el) {
    var target  = parseFloat(el.dataset.fcCount) || 0;
    var suffix  = el.dataset.fcSuffix || '';
    var isFloat = el.dataset.fcFloat === 'true';
    var started = false;

    var obs = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting && !started) {
          started = true;
          var start = 0, dur = 1800, step = 16;
          var inc = target / (dur / step);
          var id = setInterval(function () {
            start += inc;
            if (start >= target) { start = target; clearInterval(id); }
            el.textContent = (isFloat ? start.toFixed(1) : Math.floor(start)) + suffix;
          }, step);
          obs.unobserve(el);
        }
      });
    }, { threshold: .6 });
    obs.observe(el);
  });

  /* ── CARD TILT EFFECT ─────────────────────────────────────────── */
  document.querySelectorAll('[data-fc-tilt]').forEach(function (card) {
    card.addEventListener('mousemove', function (e) {
      var rect = card.getBoundingClientRect();
      var x = (e.clientX - rect.left) / rect.width  - .5;
      var y = (e.clientY - rect.top)  / rect.height - .5;
      card.style.transform = 'perspective(800px) rotateY(' + (x * 8) + 'deg) rotateX(' + (-y * 8) + 'deg) translateY(-6px)';
    });
    card.addEventListener('mouseleave', function () {
      card.style.transform = '';
    });
  });

})();
