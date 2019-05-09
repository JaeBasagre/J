$(function(){
	clock();
	setInterval(function(){
		clock();
	}, 1000)
	$('#datetimepicker3').datetimepicker({
        format: 'LT'
    });
	$('.closeAlert').click(function(){
		location.reload();
	})
    $('#timeEntryForm').submit(function(){

    	// var type = $(this).find('button.btnSaveTime').attr('time');
		var type = $(document.activeElement).attr('time');
        var form = $(this).serialize()+'&type='+type;
        saveAlert('You want to save this transaction?', function(){
	        $.post(URL+'index/saveTimeEntry', form)
	        .done(function(returnData){
				// alert(returnData);
				if(type == 'in'){
		        	if(returnData == 'extraordinary'){
						$('#alertModal .modal-body h4').text('You have timed-in as an extraordinary professional.');
						$('#alertModal .modal-body i').attr('class','ion-happy-outline');
						$('#alertModal').modal({
							backdrop: 'static',
						    keyboard: false,
						    toggle: true
						});
					} else if(returnData == 'notextraordinary') {
						$('#alertModal .modal-body h4').text('You still have tomorrow to improve and be extraordinary.');
						$('#alertModal .modal-body i').attr('class','pe-7s-like2');
						$('#alertModal').modal({
							backdrop: 'static',
						    keyboard: false,
						    toggle: true
						});
					}
				} else if(type == 'out') {
					$('#alertModal1 .modal-body span.timeMsg').text("You're Time out");
					$('#alertModal1').modal({
						backdrop: 'static',
						keyboard: false,
						toggle: true
					});

				} else if(type == 'between') {
					$('#alertModal1 .modal-body span.timeMsg').text("You're Time In-between");
					$('#alertModal1').modal({
						backdrop: 'static',
						keyboard: false,
						toggle: true
					});
				}
	        })
		})
        return false;
    });
		$("#selectDates").change(function(){
			var date = $(this).val();
			window.location.href= URL +"?date="+date;
			return false;
		});
})

function clock()
{
	var months = [
		'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
	];
	var days = [
	'SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'
	];
	var date = new Date();
	var ampm = date.getHours() < 12 ? 'AM' : 'PM';
	var hours = date.getHours() == 0 ? 12 : date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
	var minutes = date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes();
	var seconds = date.getSeconds() < 10 ? '0' + date.getSeconds() : date.getSeconds();
	var dayOfWeek = days[date.getDay()];
	var month = months[date.getMonth()];
	var day = date.getDate();
	var year = date.getFullYear();

	if(date.getHours() >= 00 && date.getHours() < 6){
	  	$('#time-box').addClass('noon');
	  	$('#time-box').removeClass('morning');
	  	$('#time-box').removeClass('evening');
	  	$('#time-box').removeClass('afternoon');	
	} 
	else if(date.getHours() >= 6 && date.getHours() < 12) {
	 	$('#time-box').removeClass('noon');
	  	$('#time-box').addClass('morning');
	  	$('#time-box').removeClass('evening');
	  	$('#time-box').removeClass('afternoon');
	}
	else if(date.getHours() >= 12 && date.getHours() < 18) {
		$('#time-box').removeClass('noon');
	  	$('#time-box').removeClass('morning');
	  	$('#time-box').removeClass('evening');
	  	$('#time-box').addClass('afternoon');
	}
	else if(date.getHours() >= 18 && date.getHours() < 24) {
	 	$('#time-box').removeClass('noon');
	  	$('#time-box').removeClass('morning');
	  	$('#time-box').addClass('evening');
	  	$('#time-box').removeClass('afternoon');
	}

	$('.sec1').text(seconds);
	$('.ampm1').text(ampm);
	$('.time1').text((hours < 10 ? '0'+hours : hours)+':'+minutes);
	$('.day1').text(dayOfWeek);
	$('.month1').text(month.slice(0,3)+' '+day +', '+year);
}
