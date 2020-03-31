$(document).ready(function () {
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
		$('#is-hide').toggleClass('active');
	});
});

function checkIfBAT(){
	e = document.getElementById('template_jadwal_talkshow');
	console.log(e.options[e.selectedIndex].value);
	if (e.options[e.selectedIndex].value == 3){
        document.getElementById('bat_time').style.display = "flex";
	} else {
        document.getElementById('bat_time').style.display = "none";
	}
	console.log('CEK');
}


function checkKategori(){
	e = document.getElementById('id_kategori');
	console.log(e.options[e.selectedIndex].value);
	if (e.options[e.selectedIndex].value == 1){
        document.getElementById('kategori_lainlain').type = "text";
	} else {
        document.getElementById('kategori_lainlain').type = "hidden";
	}
	console.log('CEK1');
}

var max_selected = $('#checkbox_counter').text();

function countSelected(){
    var selectionleft = max_selected - $('input[name="jadwal[]"]:checked').length;
    $('#checkbox_counter').text(selectionleft);
    console.log(selectionleft);
    if (selectionleft == 0){
    	console.log("CEK1");
        $('input[name="jadwal[]"]:not(:checked)').attr('disabled',true);
        $('#keep-jadwal').attr('disabled',false);
	} else {
        console.log("CEK2");
        $('input[name="jadwal[]"]:not(:checked)').attr('disabled',false);
        $('#keep-jadwal').attr('disabled',true);
	}
    
}

$(function () {
    $("#tooltip").tooltip();
});

$(document).ready(function() {

	$(".alert").fadeTo(2000, 500).slideUp(500, function() {
		$(".alert").slideUp(500);
	});
});