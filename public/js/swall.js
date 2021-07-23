function deleteconf(id) {
    const swalWithBootstrapButtons = swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
    })

    swalWithBootstrapButtons({
        title: 'Are you sure? ?',
        text: "Delete Data",
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, Delete data!',
        cancelButtonText: 'No, Back!'
    }).then((result) => {
        if (result.value) {
            swalWithBootstrapButtons(
                'Deleted!',
                'your data has been deleted.',
                'success'
            )
            document.getElementById("form-" + id).submit();
        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons(
                'Back',
                'Please be careful to delete data',
                'error'
            )
        }
    })
}