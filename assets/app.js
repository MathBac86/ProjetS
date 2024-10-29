import './bootstrap.js';

/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import 'bootstrap/dist/css/bootstrap.min.css'

import './styles/app.css';
import './styles/nav.css';
import './styles/login.css';
import './styles/input.css';

import './styles/admin/admin.css';
import './styles/admin/sidebar.css';
import './styles/admin/table.css'

import 'bootstrap';
import 'jquery'
import './js/menu/menu.js';
import './js/admin/sidebar.js';
import './js/admin/table.js';

document.addEventListener('turbo:submit-end', (event) => {
    let response = event?.detail?.fetchResponse?.response;
    let status = response?.status;
    let url = response?.headers?.get('Location');
    let frame = response?.headers?.get('frame');

    if (status === 204 && url) {
        Turbo.visit(url, {action: 'advance', frame: frame})
        event.preventDefault();
        return false;
    }
});

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
