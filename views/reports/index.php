<style>
    body{
        background: #eeeeee!important;
        color: #666666!important;
    }

    .table thead tr th {
        text-align: center;
    }

    .nav li a{
        border-radius: 0px;
    }
</style>
<div class="container-fluid">
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#timeentries">Attendance</a></li>
        <li><a data-toggle="pill" href="#inbetween">In Between</a></li>
    </ul>
    <div class="tab-content">
        <div id="timeentries" class="tab-pane fade in active">
            <div class="panel panel-default mt-10" style="border-radius: 0px">
                <!-- <div class="panel-heading">
                    Attendance
                </div> -->
                <div class="panel-body" style="padding-top: 30px;">
                    <form id="generateAttendance">
                        <div class="form-group col-lg-3">
                            <div class="input-group">
        						<span class="input-group-btn">
        						    <button type="button" class="btn btn-sm btn-default" disabled="">From : </button>
        						</span>
    						  <input type="text" value="<?=date('m/01/Y')?>" class="form-control input-sm datepicker" name="from" placeholder="From Date">
    						</div>
                        </div>
                        <div class="form-group col-lg-3">
                            <div class="input-group">
        						<span class="input-group-btn">
        						    <button type="button" class="btn btn-sm btn-default" disabled="">To : </button>
        						</span>
    						  <input type="text" value="<?=date('m/t/Y')?>" class="form-control input-sm datepicker" name="to" placeholder="To Date">
    						</div>
                        </div>
                        <div class="form-group col-lg-3">
                            <button class="btn btn-info btn-sm">Generate</button>
                        </div>
                    </form>
                    <div class="table-responsive col-lg-12">
                        <table class="table table-condensed table-standard table-bordered" id="attendanceTable" style="color: #666!important;">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="vertical-align: inherit;" >Date</th>
                                    <th colspan="3" >Time In</th>
                                    <th colspan="3" >Time Out</th>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <th>Client</th>
                                    <th>Location</th>
                                    <th>Time</th>
                                    <th>Client</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody class="attendance">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="inbetween" class="tab-pane fade">
            <div class="panel panel-default mt-10" style="border-radius: 0px">
                <div class="panel-body" style="padding-top: 30px;">
                    <form id="generateBetween">
                        <div class="form-group col-lg-3">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-default" disabled="">From : </button>
                                </span>
                              <input type="text" value="<?=date('m/01/Y')?>" class="form-control input-sm datepicker" name="from" placeholder="From Date">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-default" disabled="">To : </button>
                                </span>
                              <input type="text" value="<?=date('m/t/Y')?>" class="form-control input-sm datepicker" name="to" placeholder="To Date">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <button class="btn btn-info btn-sm">Generate</button>
                        </div>
                    </form>
                    <div class="table-responsive col-lg-12">
                        <table class="table table-condensed table-standard table-bordered" id="betweenTable" style="color: #666!important;">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Client</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody class="between">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#generateAttendance').submit(function(){

            $('#attendanceTable tbody.attendance').html('');
            tableLoader('#attendanceTable');
            var form = $(this).serialize();
            $.post(URL+'reports/getAttendance', form)
            .done(function(returnData){

                var data = $.parseJSON(returnData);
                if(returnData == '[]'){
                    var th = $('#attendanceTable th').length;
                    $('#attendanceTable tbody.attendance').html('<tr><td class="text-center" colspan="'+th+'" style="padding: 20px;">No Results Found</td></tr>');
                } else {
                    append = '';
                    $.each(data, function(i,x){
                        var timein = '';
                        var timeout = '';
                        if(x.time_in === null){
                            timein = '<td class="danger text-center" colspan="3">No Time In</td>';
                        } else {
                            timein = '<td>'+tConv24(x.time_in)+'</td>'+
                            '<td>'+x.time_in_client+'</td>'+
                            '<td>'+x.time_in_loc+'</td>';
                        }
                        if(x.time_out === null){
                            timeout = '<td class="danger text-center" colspan="3">No Time Out</td>';
                        } else {
                            timeout = '<td>'+tConv24(x.time_out)+'</td>'+
                            '<td>'+x.time_out_client+'</td>'+
                            '<td>'+x.time_out_loc+'</td>';
                        }
                        var dateAr = x.time_in_date.split('-');
                        var newDate = dateAr[1] + '/' + dateAr[2] + '/' + dateAr[0];
                        append += '<tr class="text-center">'+
                                    '<td>'+newDate+'</td>'+
                                    timein+
                                    timeout+
                                '</tr>';
                    })
                    $('#attendanceTable tbody.attendance').html(append);
                }
            })
            return false;
        })
        $('#generateBetween').submit(function(){

            $('#betweenTable tbody.between').html('');
            tableLoader('#betweenTable');
            var form = $(this).serialize();
            $.post(URL+'reports/getAttendanceBetween', form)
            .done(function(returnData){
                var data = $.parseJSON(returnData);
                if(returnData == '[]'){
                    var th = $('#betweenTable th').length;
                    $('#betweenTable tbody.between').html('<tr><td class="text-center" colspan="'+th+'" style="padding: 20px;">No Results Found</td></tr>');
                } else {
                    append = '';
                    $.each(data, function(i,x){
                        var dateAr = x.date.split('-');
                        var newDate = dateAr[1] + '/' + dateAr[2] + '/' + dateAr[0];
                        append += '<tr class="text-center">'+
                                    '<td>'+newDate+'</td>'+
                                    '<td>'+tConv24(x.time)+'</td>'+
                                    '<td>'+x.client+'</td>'+
                                    '<td>'+x.location+'</td>'+
                                '</tr>';
                    })
                    $('#betweenTable tbody.between').html(append);
                }
            })
            return false;
        })

        function tConv24(time24) {
    	  var ts = time24;
    	  var H = +ts.substr(0, 2);
    	  var h = (H % 12) || 12;
    	  h = (h < 10)?("0"+h):h;
    	  var ampm = H < 12 ? " AM" : " PM";
    	  ts = h + ts.substr(2, 3) + ampm;
    	  return ts;
    };

    </script>
