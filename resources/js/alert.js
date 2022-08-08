function delete_data(id) {
    Swal.fire({
        title: 'Are you sure delete?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            event.preventDefault();
            document.getElementById('delete-form-' + id).submit();
            Swal.fire('Deleted Successfull!','', 'success')
        }
    })
}
