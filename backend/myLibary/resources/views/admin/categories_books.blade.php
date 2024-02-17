@extends('admin.index_adm')
@section('admin_content')
    <section class="contact-section section-padding section-bg">
        <div class="container">
            <h4>All Categories List</h4>

            <div class="my-2">
                <button type="button"class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_categories">
                    <i class="bi bi-plus-lg"></i> Add Categories
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped" id="categories">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>CATEGORIES</th>
                            <th>DESCRIPTION</th>
                            <th>MENU</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    @push('script')
        <script>
            $(document).ready(function() {
                let categories = $("#categories").dataTable({
                    processing: true,
                    serverSide: true,
                    'ajax': {
                        'url': 'http://127.0.0.1:8000/api/data_categories',
                        'type': 'GET',
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                        },
                        {
                            data: 'name_cat',
                        },
                        {
                            data: 'description',
                        },
                        {
                            title: 'Menu',
                            data: null,
                            render: function(data) {
                                return `
                                    <td>
                                        <div style="margin-rigth=20px;">
                                            <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#updateKetenagaan" onclick="show_byid_ketenagaan(${data.id_categories})">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" onclick="delete_categories(${data.id_categories})">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </div>
                                    </td>
                                `;
                            }
                        }
                    ],

                    paging: true,
                    searching: true
                })
            })

            function delete_categories(id_categories) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `http://127.0.0.1:8000/api/delete_categories/${id_categories}`,
                            method: "delete",
                            success: function(response) {
                                $("#categories").DataTable().ajax.reload();

                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            }
                        })
                    }
                });

            }
        </script>
    @endpush
@endsection

@include('admin.modal.modal_categories')
