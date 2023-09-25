$(function() {
/*--first time load--*/
ajaxlist((page_url = false));

// Real Live
/*-- Search keyword--*/
$(document).on("keyup", "#searchTimKerja", function(event) {
ajaxlist((page_url = false));
event.preventDefault();
});

/*-- Filter Periode --*/
$(document).on("change", "#filterPeriode", function(event) {
ajaxlist((page_url = false));
event.preventDefault();
console.log($('#filterPeriode').val());
});


/*-- Reset Filter--*/
$(document).on('click', "#resetFilter", function(event) {
$("#filterPeriode").val('');
$('#filterPeriode').selectpicker('refresh');
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
// $("#searchTimKerja").val('');
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
var search_key = $("#searchTimKerja").val();
var periode_key = $("#filterPeriode").val();

var data = {
searchTimKerja: search_key,
filterPeriode: periode_key
};
var base_url = '<?php echo base_url("Monitoring/TimKerja/indexAjax") ?>';

if (page_url == false) {
var page_url = base_url;
}

$.ajax({
type: "POST",
url: page_url,
data: data,
success: function(response) {
<!-- console.log(response); -->
$("#ajaxContent").html(response);
},
});
}
});