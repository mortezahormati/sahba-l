require('./bootstrap');
// var Turbolinks = require("turbolinks");
// Turbolinks.start();
let Swal = require('sweetalert2');
const toast = require("bootstrap/js/src/toast");
let bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js');

window.bootstrap = bootstrap;


// const bootstrap = require('./bootstrap')
window.Swal = Swal;
// $(document).on('click', '[data-toggle="lightbox"]', function(event) {
//     event.preventDefault();
//     $(this).ekkoLightbox();
// });

const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.Toast = toast;

const confirmToast = Swal.mixin({
    title: 'Do you want to save the changes?',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: 'Save',
    denyButtonText: `Don't save`,
});






// document.addEventListener('click:[data-toggle="lightbox"]' , ()=>{
//
// })
document.addEventListener('livewire:load', () => {

    Livewire.on('toast', (type, message) => {
        Toast.fire({
            icon: type,
            title: message
        });
    });

    Livewire.on('confirmToast', (type, message, title, confirmedMessage) => {
        Swal.fire({
            title: title,
            text: message,
            icon: type,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'بله ، منتقل شود'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'انجام شد',
                    confirmedMessage,
                    'success'
                );
                Livewire.emit('remove');
            }
        })
    });
});


