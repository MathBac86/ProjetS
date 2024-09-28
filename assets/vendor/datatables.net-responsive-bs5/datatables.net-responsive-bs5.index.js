/**
 * Bundled by jsDelivr using Rollup v2.79.1 and Terser v5.19.2.
 * Original file: /npm/datatables.net-responsive-bs5@3.0.3/js/responsive.bootstrap5.mjs
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
import d from"jquery";import a from"datatables.net-bs5";export{default}from"datatables.net-bs5";import"datatables.net-responsive";
/*! Bootstrap 5 integration for DataTables' Responsive
 * © SpryMedia Ltd - datatables.net/license
 */
let e=d;var o,t=a.Responsive.display,n=t.modal,i=e('<div class="modal fade dtr-bs-modal" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"/></div></div></div>'),s=window.bootstrap;a.Responsive.bootstrap=function(d){s=d},t.modal=function(d){return!o&&s.Modal&&(o=new s.Modal(i[0])),function(a,t,s,l){if(o){var r=s();if(!1===r)return!1;if(t){if(!e.contains(document,i[0])||a.index()!==i.data("dtr-row-idx"))return null;i.find("div.modal-body").empty().append(r)}else{if(d&&d.header){var m=i.find("div.modal-header"),p=m.find("button").detach();m.empty().append('<h4 class="modal-title">'+d.header(a)+"</h4>").append(p)}i.find("div.modal-body").empty().append(r),i.data("dtr-row-idx",a.index()).one("hidden.bs.modal",l).appendTo("body"),o.show()}return!0}return n(a,t,s,l)}};
