@include('partials.header')

<body id="top">
    <main>
        @include('partials.navbar')

        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h1 class="text-white text-center">Discover. Learn. Enjoy</h1>

                        <h6 class="text-center">Find your window to the world.</h6>

                        <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bi-search" id="basic-addon1">

                                </span>

                                <input name="keyword" type="search" class="form-control" id="keyword"
                                    placeholder="Design, Code, Marketing, Finance ..." aria-label="Search">

                                <button type="submit" class="form-control">Search</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>

        <section class="featured-section">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                            <a href="topics-detail.html">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="mb-2">Borrow</h5>

                                        <p class="mb-0">Borrow the books.</p>
                                    </div>

                                    {{-- <span class="badge bg-design rounded-pill ms-auto">14</span> --}}
                                </div>

                                <img src="assets/icon/read_book.svg" class="custom-block-image img-fluid"
                                    alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                            <a href="topics-detail.html">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="mb-2">Return</h5>

                                        <p class="mb-0">Return the books</p>
                                    </div>

                                    {{-- <span class="badge bg-design rounded-pill ms-auto">14</span> --}}
                                </div>

                                <img src="assets/icon/Library-rafiki.svg" class="custom-block-image img-fluid"
                                    alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        @yield('mainContent')

        <section class="timeline-section section-padding" id="section_3">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">How does it work?</h1>
                    </div>

                    <div class="col-lg-10 col-12 mx-auto">
                        <div class="timeline-container">
                            <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                <div class="list-progress">
                                    <div class="inner"></div>
                                </div>

                                <li>
                                    <h4 class="text-white mb-3">Search your favourite topic</h4>

                                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Reiciendis, cumque magnam? Sequi, cupiditate quibusdam alias illum sed esse ad
                                        dignissimos libero sunt, quisquam numquam aliquam? Voluptas, accusamus omnis?
                                    </p>

                                    <div class="icon-holder">
                                        <i class="bi-search"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Bookmark &amp; Borrow</h4>

                                    <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                        Sint animi necessitatibus aperiam repudiandae nam omnis est vel quo, nihil
                                        repellat quia velit error modi earum similique odit labore. Doloremque,
                                        repudiandae?</p>

                                    <div class="icon-holder">
                                        <i class="bi-bookmark"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Read &amp; Enjoy</h4>

                                    <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        Animi vero quisquam, rem assumenda similique voluptas distinctio, iste est hic
                                        eveniet debitis ut ducimus beatae id? Quam culpa deleniti officiis autem?</p>

                                    <div class="icon-holder">
                                        <i class="bi-book"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Return it back</h4>

                                    <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        Animi vero quisquam, rem assumenda similique voluptas distinctio, iste est hic
                                        eveniet debitis ut ducimus beatae id? Quam culpa deleniti officiis autem?</p>

                                    <div class="icon-holder">
                                        <i class="bi bi-arrow-counterclockwise"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-section section-padding section-bg" id="section_5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-5">Get in touch</h2>
                    </div>

                    <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                        <iframe class="google-map"
                            src="https://www.google.com/maps/embed/v1/place?q=https://www.google.com/maps/place/Bandar+Lampung,+Kota+Bandar+Lampung,+Lampung/@-5.4286721,105.2707381,11z/data=!4m6!3m5!1s0x2e40da46f3aa6fbf:0x3039d80b220cc40!8m2!3d-5.3971396!4d105.2667887!16s%2Fg%2F11bc5bsgv7&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                        <h4 class="mb-3">Candra Wahyu Firmansyah</h4>

                        <p>Bandar Lampung, Provinsi Lampung</p>

                        <hr>

                        <p class="d-flex align-items-center mb-1">
                            <span class="me-2">Phone</span>

                            <a href="https://api.whatsapp.com/send/?phone=6287794448111&text&type=phone_number&app_absent=0"
                                class="site-footer-link" target="_blank">
                                +6287794448111
                            </a>
                        </p>

                        <p class="d-flex align-items-center">
                            <span class="me-2">Email</span>

                            <a href="mailto:candrawahyuf19@gmail.com" class="site-footer-link">
                                candrawahyuf19@gmail.com
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <!-- JAVASCRIPT FILES -->
    @include('partials.footer')
</body>

</html>
