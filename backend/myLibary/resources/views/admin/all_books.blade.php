@extends('admin.index_adm')
@section('admin_content')
    <section class="contact-section section-padding section-bg">
        <div class="container">
            <h4>All Books List</h4>

            <div class="my-2">
                <button class="btn btn-success"><i class="bi bi-plus-lg"></i> Add Books</button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>COVER</th>
                            <th>TITLE</th>
                            <th>AUTHOR</th>
                            <th>BOOKCASE</th>
                            <th>STOCK</th>
                            <th>DESCRIPTION</th>
                            <th>MENU</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection
