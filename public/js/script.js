$(document).ready(function () {
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
		$('#is-hide').toggleClass('active');
	});
});

function checkIfBAT(){
	e = document.getElementById('template_jadwal_talkshow');
	console.log(e.options[e.selectedIndex].value);
	if (e.options[e.selectedIndex].value == 2){
        document.getElementById('bat_time').style.display = "flex";
	} else {
        document.getElementById('bat_time').style.display = "none";
	}
	console.log('CEK');
}

var max_selected = $('#checkbox_counter').text();

function countSelected(){
    var selectionleft = max_selected - $('input[name="jadwal[]"]:checked').length;
    $('#checkbox_counter').text(selectionleft);
    console.log(selectionleft);
    if (selectionleft <= 0){
    	console.log("CEK1");
        $('input[name="jadwal[]"]:not(:checked)').attr('disabled',true);
	} else {
        console.log("CEK2");
        $('input[name="jadwal[]"]:not(:checked)').attr('disabled',false);
	}
}