$(function () {
  $("#dtHorizontalExample").DataTable({
    scrollY: false,
    scrollX: false,
  });
});

function detail(id) {
  var base_url = $("#baseurl").val();
  window.location.href = base_url + "odp/detail/" + id;
}

function detail_odps(id) {
  var base_url = $("#baseurl").val();
  window.location.href = base_url + "odps/detail/" + id;
}

function konfirmasi(id) {
  var base_url = $("#baseurl").val();
  swal
    .fire({
      title: "Hapus Data ini?",
      icon: "warning",
      closeOnClickOutside: false,
      showCancelButton: true,
      confirmButtonText: "Iya",
      confirmButtonColor: "#4e73df",
      cancelButtonText: "Batal",
      cancelButtonColor: "#d33",
    })
    .then((result) => {
      if (result.value) {
        Swal.fire({
          title: "Memuat...",
          onBeforeOpen: () => {
            Swal.showLoading();
          },
          timer: 1000,
          showConfirmButton: false,
        }).then(function () {
          window.location.href = base_url + "odp/delete/" + id;
        });
      }
    });
}
