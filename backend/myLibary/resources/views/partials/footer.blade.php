<footer class="site-footer section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-12 mb-4 pb-2">
                <a class="navbar-brand mb-2" href="index.html">
                    <i class="bi-back"></i>
                    <span>MyLibrary</span>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-6">
                <h6 class="site-footer-title mb-3">Resources</h6>

                <ul class="site-footer-links">
                    <li class="site-footer-link-item">
                        <a href="#" class="site-footer-link">Home</a>
                    </li>

                    {{-- <li class="site-footer-link-item">
                        <a href="#" class="site-footer-link">How it works</a>
                    </li>

                    <li class="site-footer-link-item">
                        <a href="#" class="site-footer-link">FAQs</a>
                    </li> --}}

                    <li class="site-footer-link-item">
                        <a href="#section_5" class="site-footer-link">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                <h6 class="site-footer-title mb-3">Information</h6>

                <p class="text-white d-flex mb-1">
                    <a href="https://api.whatsapp.com/send/?phone=6287794448111&text&type=phone_number&app_absent=0"
                        class="site-footer-link" target="_blank">
                        +6287794448111
                    </a>
                </p>

                <p class="text-white d-flex">
                    <a href="mailto:candrawahyuf19@gmail.com" class="site-footer-link">
                        candrawahyuf19@gmail.com
                    </a>
                </p>
            </div>

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                <p class="copyright-text mt-lg-5 mt-4">Copyright © 2023 . All rights reserved.
                    <br><br>Develop by: <a rel="nofollow" href="https://www.linkedin.com/in/candra-wahyu-f-235618245/"
                        target="_blank"><b>CandraWahyuF</b></a>
                </p>

            </div>

        </div>
    </div>
</footer>


{{-- <script src="assets/js/jquery.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/click-scroll.js"></script>
<script src="assets/js/custom.js"></script>

{{-- sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Datatable --}}
<script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>

@stack('script')
