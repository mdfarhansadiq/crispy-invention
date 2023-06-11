function editmenu(status, parent, menuid) {
	'use strict';
	var menu_name = $("#menu_name-" + menuid).text().trim();
	var menu_slug = $("#menu_slug-" + menuid).text().trim();
	var base = $('#base_url').val();
	$("#menuname").val(menu_name);
	$("#Menuurl").val(menu_slug);
	if (parent != 0)
		$("#menuid").val(parent).trigger('change');
	$("#btnchnage").text("Update");
	$("#upbtn").show();
	$("#top_upbtn").show();
	$('#menuurl').attr('action', base + "dashboard/web_setting/editmenu/" + menuid);
}

// Get the modal element
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.querySelector("button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Function to open the modal
function openModal() {
	modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
	modal.style.display = "none";
}

// Close the modal if the user clicks outside of it
window.onclick = function (event) {
	if (event.target === modal) {
		closeModal();
	}
}

