  <!-- Vendor JS Files -->
{{--   <script src="{{ asset('front/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('front/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('front/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('front/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('front/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('front/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('front/js/main.js') }}"></script>
  <script src="{{ asset('front/js/script.js') }}"></script>
 --}}

 
	<!-- Scripts -->
	<script type="text/javascript" src="{{ asset('listeo/scripts/jquery-3.4.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('listeo/scripts/jquery-migrate-3.1.0.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<script type="text/javascript" src="{{ asset('listeo/scripts/mmenu.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('listeo/scripts/chosen.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('listeo/scripts/slick.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('listeo/scripts/rangeslider.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('listeo/scripts/magnific-popup.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('listeo/scripts/waypoints.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('listeo/scripts/counterup.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('listeo/scripts/jquery-ui.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('listeo/scripts/tooltips.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('listeo/scripts/custom.js') }}"></script>
	<script type="text/javascript" src="{{ asset('basooki/js/atm1.js') }}"></script>

	<!-- Leaflet // Docs: https://leafletjs.com/ -->
	<script type="text/javascript" src="{{ asset('listeo/scripts/leaflet.min.js') }}"></script>

	<!-- Leaflet Maps Scripts -->
	<script type="text/javascript" src="{{ asset('listeo/scripts/leaflet-markercluster.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('listeo/scripts/leaflet-gesture-handling.min.js') }}"></script>

	{{-- <script>(function () { function c() { var b = a.contentDocument || a.contentWindow.document; if (b) { var d = b.createElement('script'); d.innerHTML = "window.__CF$cv$params={r:'8ac58aa8de4b3fdb',t:'MTcyMjUxMjMwMy4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);"; b.getElementsByTagName('head')[0].appendChild(d) } } if (document.body) { var a = document.createElement('iframe'); a.height = 1; a.width = 1; a.style.position = 'absolute'; a.style.top = 0; a.style.left = 0; a.style.border = 'none'; a.style.visibility = 'hidden'; document.body.appendChild(a); if ('loading' !== document.readyState) c(); else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c); else { var e = document.onreadystatechange || function () { }; document.onreadystatechange = function (b) { e(b); 'loading' !== document.readyState && (document.onreadystatechange = e, c()) } } } })();</script> --}}
  @yield('js')