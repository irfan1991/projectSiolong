<script>
$(document).ready(function() {
swal({
title: "Sukses",
text: "Berhasil menambahkan <strong>{{ $product_name }}</strong> ke cart!",
type: "success",
showCancelButton: true,
confirmButtonColor: "#63BC81",
confirmButtonText: "Konfirmasi peminjaman",
cancelButtonText: "Lanjutkan Meminjam",
html: true
}, function(isConfirm) {
if (isConfirm) {
window.location = '/cart';
}
});
});
</script>