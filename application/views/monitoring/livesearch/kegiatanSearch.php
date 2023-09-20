$(function() {
/*--first time load--*/
ajaxlist((page_url = false));


// Real Live
/*-- Search keyword--*/
$(document).on("keyup", "#searchKegiatan", function(event) {
ajaxlist((page_url = false));
event.preventDefault();
});

/*-- Filter Periode --*/
$(document).on("change", "#filterPeriode", function(event) {
ajaxlist((page_url = false));
event.preventDefault();
console.log($('#filterPeriode').val());
});


/*-- Filter Tim Kerja --*/
$(document).on("change", "#filterTimKerja", function(event) {
ajaxlist((page_url = false));
event.preventDefault();
console.log($('#filterTimKerja').val());
});


/*-- Reset Filter--*/
$(document).on('click', "#resetFilter", function(event) {
$("#filterPeriode").val('');
$("#filterTimKerja").val('');
ajaxlist(page_url = false);
event.preventDefault();
});

// Dengan tombol
/*-- Search keyword--*/
// $(document).on('click', "#searchBtn", function(event) {
// ajaxlist(page_url = false);
// event.preventDefault();
// });


// /*-- Reset Search--*/
// $(document).on('click', "#resetBtn", function(event) {
// $("#searchKegiatan").val('');
// ajaxlist(page_url = false);
// event.preventDefault();
// });

/*-- Page click --*/
$(document).on("click", ".pagination li a", function(event) {
var page_url = $(this).attr("href");
ajaxlist(page_url);
event.preventDefault();
});

/*-- create function ajaxlist --*/
function ajaxlist(page_url = false) {
var search_key = $("#searchKegiatan").val();
var periode_key = $("#filterPeriode").val();
var tim_key = $("#filterTimKerja").val();

<!-- var dataString = "searchKegiatan=" + search_key; -->
var data = {
searchKegiatan: search_key,
filterPeriode: periode_key,
filterTimKerja: tim_key
};
var base_url = '<?php echo base_url("Monitoring/Kegiatan/indexAjax") ?>';

if (page_url == false) {
var page_url = base_url;
}

$.ajax({
type: "POST",
url: page_url,
data: data,
success: function(response) {
console.log(response);
$("#ajaxContent").html(response);
},
});
}
});