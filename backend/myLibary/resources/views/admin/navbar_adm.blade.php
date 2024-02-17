<nav class="navbar navbar-expand-lg" style="background:#80d0c7;">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="bi-back"></i>
            <span>Admin MyLibrary</span>
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="{{ url('/all_books') }}">All Books</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="{{ url('/categories') }}">Categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="{{ url('/loan_list') }}">Loan List</a>
                </li>
            </ul>

            <div class="d-none d-lg-block">
                <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
