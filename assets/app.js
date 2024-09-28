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
import DataTable from 'datatables.net';
import 'datatables.net-bs5';
import 'jszip';
import 'pdfmake';
import 'datatables.net-buttons';
import 'datatables.net-buttons-bs5';
import 'datatables.net-responsive';
import 'datatables.net-responsive-bs5';
import './js/admin/table.js';

window.addEventListener('DOMContentLoaded',function () {
  new DataTable('#example', {
    aSorting: [],
    pagingType: 'full_numbers',
    buttons: [
      // {
      //     extend: 'excelHtml5',
      //     exportOptions: {
      //     columns: [ 0, 1, 2, 3, 4, 5, 6 ]
      //     }
      // },
      // {
      //     extend: 'pdfHtml5',
      //     exportOptions: {
      //     columns: [ 0, 1, 2, 3, 4, 5, 6 ]
      //     }
      // }
    ],
    responsive: true,
    language: {
        "search": "Recherche : ",
        "lengthMenu": "Seulement : _MENU_ entrées/page",      
        "info":  "Du _START_ au _END_ sur _TOTAL_ entrées",
        "paginate": {
            "first":      '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512"><path fill="currentColor" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256l137.3-137.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160zm352-160l-160 160c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L301.3 256l137.3-137.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0z"/></svg>',
            "last":       '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512"><path fill="currentColor" d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256L265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256L73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z"/></svg>',
            "next":       '<svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="1em" viewBox="0 0 320 512"><path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256L73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>',
            "previous":   '<svg xmlns="http://www.w3.org/2000/svg" width="0.63em" height="1em" viewBox="0 0 320 512"><path fill="currentColor" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256l137.3-137.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>'
        },
        "emptyTable": "Pas d'user disponible",
        "infoFiltered": " - filtré sur _MAX_ enregistrements",
        "zeroRecords":    "Aucun résultat trouvé",
        "infoEmpty":      "Aucune réponse",
    },
    columnDefs: [
        {
          responsivePriority: 1,
          targets: 0
        },
        {
          responsivePriority: 2,
          targets: -1
        }
    ]
  });
});

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
