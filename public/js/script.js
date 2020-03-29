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
        document.getElementById('bat_time').type = 'time';
	} else {
        document.getElementById('bat_time').type = 'hidden';
	}
	console.log('CEK');
}