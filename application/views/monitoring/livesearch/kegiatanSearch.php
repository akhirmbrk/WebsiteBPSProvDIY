$(function() {
/*--first time load--*/
ajaxlist((page_url = false));

// Real Live
/*-- Search keyword--*/
$(document).on("keyup", "#searchKegiatan", function(event) {
ajaxlist((page_url = false));
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

var dataString = "searchKegiatan=" + search_key;
var base_url = '<?php echo base_url("Monitoring/Kegiatan/indexAjax") ?>';

if (page_url == false) {
var page_url = base_url;
}

$.ajax({
type: "POST",
url: page_url,
data: dataString,
success: function(response) {
<!-- console.log(response); -->
$("#ajaxContent").html(response);
},
});
}
});