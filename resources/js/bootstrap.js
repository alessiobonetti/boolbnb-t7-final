
window.$ = require('jquery');
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

    // sb-admin
    // require('startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js');
    // require('startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js');
    // require('startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js');
    // require('startbootstrap-sb-admin-2/js/sb-admin-2.min.js');
    // require('startbootstrap-sb-admin-2/vendor/chart.js/Chart.min.js');
    // require('startbootstrap-sb-admin-2/js/demo/chart-area-demo.js');
    // require('startbootstrap-sb-admin-2/js/demo/chart-pie-demo.js');
