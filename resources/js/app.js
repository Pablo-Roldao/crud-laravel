import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

import Swal from 'sweetalert2';
window.Swal = Swal;

/*Sweet alert 2 event listener*/
window.addEventListener('event', (e) => {
    Swal.fire({
        title: e.detail.title,
        icon: e.detail.icon,
        iconColor: e.detail.iconColor,
        timer: 4000,
        toast: true,
        position: 'bottom-right',
        timeProgressBar: true,
        showConfirmButton: false
    });
    setTimeout(function () {
        location.reload();
    }, 1000);
});
