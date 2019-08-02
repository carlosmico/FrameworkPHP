let deleteModal = $('#modal');

let deletePost = (postTitle, id)=>{
    $(this).click(function(event) {
        event.preventDefault();
    });

    deleteModal.modal('show');
    $('.modal-body').text("Eliminar post: " + postTitle);
    $('.modal-footer .btn-danger').attr('id', id);
}

$('.modal-footer .btn-danger').on("click", (event)=>{
    let id = $(event.target).attr("id");
    window.location.href = "/delete-post/" + id;
});