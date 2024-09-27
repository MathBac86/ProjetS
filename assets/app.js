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
import DataTable from 'datatables.net';
new DataTable('#example', {
    aaSorting: [],
    pagingType: 'full_numbers',
    buttons: [
       {
        extend: 'excelHtml5',
        exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5, 6 ]
        }
       },
      {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5, 6 ]
        }
      }
    ],
    responsive: true,
    language: {
        "search": "Recherche : ",
        "lengthMenu": "Seulement : _MENU_ entrées/page",
        "info":  "Du _START_ au _END_ sur _TOTAL_ entrées",
        "paginate": {
            "first":      '<i class="fa-solid fa-angles-left fa-xs mb-3"></i>',
            "last":       '<i class="fa-solid fa-angles-right fa-xs mb-3"></i>',
            "next":       '<i class="fa-solid fa-angle-right fa-3xs mt-2"></i>',
            "previous":   '<i class="fa-solid fa-angle-left fa-2xs mt-2"></i>'
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
} );
   
document.querySelector('#example').buttons().container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );

var search = $document.querySelector(".dataTables_filter input")
    .attr("placeholder", "Votre recherche")
    .css({
        width: "250px",
        display: "inline-block"
    });


import 'jquery'
import './js/menu/menu.js';

import './js/admin/sidebar.js';
import './js/admin/table.js'

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
