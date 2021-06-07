const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        title: 'Lantern House', //data lantern house
        text: flashData,
        type: 'success'
    });
}

// tombol hapus

$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "Data will be delete",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});
