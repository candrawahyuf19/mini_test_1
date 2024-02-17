@include('partials.header')
@include('admin.navbar_adm')

<body id="top">
    <main>
        @yield('admin_content')
    </main>

    @include('partials.footer')
</body>

</html>
