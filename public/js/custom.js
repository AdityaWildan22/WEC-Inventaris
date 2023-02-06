$(function () {
    // Foto click
    $("#avatar").click(function () {
        $("#file").click();
    });

    // Ketika file input change
    $("#file").change(function () {
        setImage(this, "#avatar");
    });

});

// Read Image
function setImage(input, target) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        // Mengganti src dari object img#avatar
        reader.onload = function (e) {
            $(target).attr('src', e.target.result);
            $("#foto").val(e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


// Sweet Alert
function showMessage(e_title = "Judul", e_text = "Berhasil", e_icon = "success", e_button = "OK") {
    console.log(jQuery.parseHTML(e_text));
    Swal.fire({
        title: e_title,
        html: jQuery.parseHTML(e_text)[0].data,
        icon: e_icon,
        confirmButtonText: e_button,
    });
}

//Konfirmasi delete
function confirmDelete(e) {
    const url = $(e).attr('href');
    Swal.fire({
        title: "Apakah Anda Yakin Menghapus?",
        text: "Data Akan Dihapus !!!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'IYA',
        cancelButtonText: 'TIDAK',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = url;
        }
    });
    return false;
}

