$(function(){
	$('#saveAlertModal').on('hidden.bs.modal', function (e) {
	     $(this).find("button")
	           .prop('disabled',false)
	           .end()
	    $(this).find("button i")
	           .remove()
	           .end()
    })
})
function saveAlert(msg,submit){
	$('#saveAlertModal').modal({
		backdrop: 'static',
	    keyboard: false,
	    toggle: true
	});
	$('#saveAlertModal .modal-dialog .modal-content .modal-body span.data').html(msg);
	$('#btnConfirmAlert').unbind('click');
	$('#btnConfirmAlert').bind('click',function(){
		$(this).prop('disabled',true)
		$(this).append(' <i class="pe-7s-refresh-2 pe-lg pe-spin"></i>');
		return submit();
	})
}
function populateDT(urlajax,table){
	$.post(URL+urlajax)
	.done(function(returnData){
		var data = $.parseJSON(returnData);
		table.clear();
		$.each(data,function(key,a){
			table.row.add(a);
		})
		table.draw();
	})
}
function countTable(urlajax,code,form,input){
	$.post(URL+urlajax)
	.done(function(returnData){
		var data = $.parseJSON(returnData);
		var last = parseInt(data[0].total) + 1;
		var output = ("000000" + last).slice(-7);
		$(form).find(input).val(code+output);
	})
}
function seachTable(textbox,table){
	$(textbox).keyup(function(){
    	var value = this.value.toLowerCase().trim();
	    $(table+" tr").each(function(index){
	        if (!index) return;
	        $(this).find("td").each(function () {
	            var id = $(this).text().toLowerCase().trim();
	            var not_found = (id.indexOf(value) == -1);
	            $(this).closest('tr').toggle(!not_found);
	            return not_found;
	        });
	    });
	});
}
function mapJS(){
	$('#selectAll1').change(function(){
		if(this.checked){
			$('.chk1').prop('checked', true);
		}else{
			$('.chk1').prop('checked', false);
		}
	})
	$('#selectAll2').change(function(){
		if(this.checked){
			$('.chk2').prop('checked', true);
		}else{
			$('.chk2').prop('checked', false);
		}
	})
	$('#btn-right-arrow').click(function(){
		$('.chk1').each(function(){
			if(this.checked){
				var tr = $(this).closest('tr').html();
				$('#unmapped').append('<tr>'+tr+'</tr>');
				$(this).closest('tr').remove();
			}
		})
		$('#selectAll1').prop('checked', false);
		$('#unmapped').find('.chk1').removeClass('chk1').addClass('chk2');
		$('#unmapped').find('input[type="hidden"]').attr('name','unmapped[]');
	})
	$('#btn-left-arrow').click(function(){
		$('.chk2').each(function(){
			if(this.checked){
				var tr = $(this).closest('tr').html();
				$('#mapped').append('<tr>'+tr+'</tr>');
				$(this).closest('tr').remove();
			}
		})
		$('#selectAll2').prop('checked', false);
		$('#mapped').find('.chk2').removeClass('chk2').addClass('chk1');
		$('#mapped').find('input[type="hidden"]').attr('name','mapped[]');
	})
}
function tableLoader(table){
	var th = $(table+' th').length;
	$(table+' tbody').append('<tr><td class="text-center" colspan="'+th+'" style="padding: 20px;"><i class="pe-7s-refresh-2 pe-3x pe-spin"></i></td></tr>');
}
