$(document).ready(function () {
$(document.body).on('click', '.js-submit-coba', function (event) {
event.preventDefault();
var $form = $(this).closest('form')
var $el = $(this)
var text = $el.data('confirm-message') ? $el.data('confirm-message') : 'Kamu tidak akan bisa membatalkan proses penghapusan ini!'
swal({
title: 'Kamu yakin?',
text: text,
type: 'warning',
showCancelButton: true,
confirmButtonColor: '#DD6B55',
confirmButtonText: 'Yap, lanjutkan!',
cancelButtonText: 'Batal',
closeOnConfirm: true
},
function () {
$form.submit()
})
})
});






$('js-selectize').selectize({
                sortField: {
                    field: 'text',
                    direction: 'asc'
                },
                dropdownParent: 'body'
                });

