window._ = require("lodash");

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

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

var sidebar = document.getElementById("sidebar");
var sidebarBackdrop = document.getElementById("sidebarBackdrop");
var toggleSidebarMobileHamburger = document.getElementById(
    "toggleSidebarMobileHamburger"
);
var toggleSidebarMobileClose = document.getElementById(
    "toggleSidebarMobileClose"
);
toggleSidebarMobileHamburger.addEventListener("click", function () {
    showSidebarMobile();
});
sidebarBackdrop.addEventListener("click", function () {
    closeSidebarMobile();
});
toggleSidebarMobileClose.addEventListener("click", function () {
    closeSidebarMobile();
});

function showSidebarMobile() {
    sidebar.classList.remove("hidden");
    sidebarBackdrop.classList.remove("hidden");
    toggleSidebarMobileClose.classList.remove("hidden");
    toggleSidebarMobileHamburger.classList.add("hidden");
}

function closeSidebarMobile() {
    sidebar.classList.add("hidden");
    sidebarBackdrop.classList.add("hidden");
    toggleSidebarMobileClose.classList.add("hidden");
    toggleSidebarMobileHamburger.classList.remove("hidden");
}
