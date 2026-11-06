/* Pyarelal theme — small front-end helpers (no dependencies). */
(function () {
  "use strict";
  var D = document;

  // Mobile nav drawer
  var toggle = D.getElementById("navtoggle");
  var drawer = D.getElementById("navdrop");
  var backdrop = D.getElementById("navBackdrop");

  function setOpen(open) {
    if (!drawer || !toggle) return;
    drawer.classList.toggle("open", open);
    toggle.classList.toggle("open", open);
    if (backdrop) backdrop.classList.toggle("show", open);
    toggle.setAttribute("aria-expanded", open ? "true" : "false");
    D.body.style.overflow = open ? "hidden" : "";
  }

  if (toggle && drawer) {
    toggle.addEventListener("click", function () {
      setOpen(!drawer.classList.contains("open"));
    });
    if (backdrop) backdrop.addEventListener("click", function () { setOpen(false); });
    drawer.addEventListener("click", function (e) {
      if (e.target.tagName === "A") setOpen(false);
    });
    D.addEventListener("keydown", function (e) {
      if (e.key === "Escape") setOpen(false);
    });
    // Reset on resize to desktop
    var mq = window.matchMedia("(min-width:960px)");
    (mq.addEventListener ? mq.addEventListener.bind(mq, "change") : mq.addListener.bind(mq))(function () {
      if (mq.matches) setOpen(false);
    });
  }

  // Smooth-scroll for on-page anchors (e.g. hero → #story)
  D.addEventListener("click", function (e) {
    var a = e.target.closest ? e.target.closest('a[href^="#"]') : null;
    if (!a) return;
    var id = a.getAttribute("href");
    if (id.length < 2) return;
    var el = D.querySelector(id);
    if (el) { e.preventDefault(); el.scrollIntoView({ behavior: "smooth", block: "start" }); }
  });
})();
