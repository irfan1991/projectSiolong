
$('js-selectize').selectize({
                sortField: {
                    field: 'text',
                    direction: 'asc'
                },
                dropdownParent: 'body'
                });

$(document).ready(function () {
$(document.body).on('click', '.js-submit-confirm', function (event) {
event.preventDefault()
var $form = $(this).closest('form')
var $el = $(this)
var text = $el.data('confirm-message') ? $el.data('confirm-message') : 'Ingin melanjutkan proses ini'
swal({
title: 'Kamu yakin?',
text: text,
type: 'info',
showCancelButton: true,
confirmButtonColor: 'blue',
confirmButtonText: 'Yap, lanjutkan!',
cancelButtonText: 'Batal',
closeOnConfirm: true
},
function () {
$form.submit()
})
})
});



