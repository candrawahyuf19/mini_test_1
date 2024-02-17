<div class="modal fade" id="add_categories" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-color-add">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD CATEGORIES</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name_cat" class="form-label">Categories</label>
                    <input type="text" class="form-control" id="name_cat">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="save_categories()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    function save_categories() {
        let name_cat = $('#name_cat').val()
        let description = $('#description').val()

        if (!name_cat || !description) {
            alert("All required...")
        } else {
            $.ajax({
                url: "http://127.0.0.1:8000/api/add_categories/",
                method: "post",
                dataType: "json",
                data: {
                    name_cat: name_cat,
                    description: description
                },
                success: function(response) {
                    console.log(response)
                    $("#categories").DataTable().ajax.reload();
                    $('#add_categories').modal("hide")

                    $('#name_cat').val("")
                    $('#description').val("")
                }
            })
        }
    }
</script>
