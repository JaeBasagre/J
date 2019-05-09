<style>
.body{
	font-family: HelveticaNeueThin;
	letter-spacing: 1px;
	/*background: #f3f3f3;*/
	background: #f7f7f7;
	/*color: #333;*/
	color: #fff;
}
.toggle-group {
	border: 0px;
}
.toggle-group .btn-success{
	background: #fff;
	border-color: #fff;
}
.toggle-group .btn-success:hover{
	background: #fff;
}
.toggle-group .btn-danger{
	background: #000;
	border-color: #000;
}
.toggle-group .btn-danger:hover{
	background: #000;
}
.time-box{
	border-radius: 0px;
	font-family: RobotoThin;
	color: #f7f7f7;
	/*background: rgba(28,65,112, .3);*/
	background: linear-gradient(120deg, #1c4170, #284f80, #284f80, #232a31);
	padding: 15px 5px;
	padding-bottom: 20px;
	/*text-align: right;*/
}
.time-box.morning{
	background: url('public/img/morning.jpg');
	color: #6b340e;
	font-family: HelveticaNeueThin;
}
.time-box.noon{
	background: url('public/img/noon.jpg');
	color: #521752;
	font-family: HelveticaNeueThin;
}
.time-box.afternoon{
	background: url('public/img/afternoon.jpg');
	color: #04304a;
	font-family: HelveticaNeueThin;
}
.time-box.evening{
	background: url('public/img/evening.jpg');
	color: #0f163c;
	font-family: HelveticaNeueThin;
}

.time-box div.left span:nth-child(1){
	display: block;
	font-size: 20px;
	font-family: RobotoBlack;
}
.time-box div.left span:nth-child(2){
	font-size: 13px;
} 
.time-box .ampm1{
	font-size: 14px;
	font-family: RobotoBlack;
}
.time-box .sec1{
	display: block;
}
.time-box .time1{
	font-size: 45px;
	font-family: RobotoThin;
}
.time-box div.left{
	padding-top: 10px;
	padding-left: 30px;
}
.time-box div.right div:nth-child(1){
	padding: 0px;
}
.time-box div.right div:nth-child(2){
	padding: 13px 5px 0px 0px;
}



.time-entry-box{

	margin-top: 10px;
	background: #fff;
	/*background: linear-gradient(120deg, #242a2f, #2f373d,#2f363c);*/
	/*background: rgba(225,255,255,.8);*/
	padding: 30px 20px 30px 20px;
	box-shadow: 0 15px 30px -20px rgba(0,0,0,.5);
	border: 1px #dddddd solid;
}
.btn-date{
	background: linear-gradient(120deg, #1c4170, #284f80, #284f80);
	border: 0;
	border: 2px solid #1c4170;
	color: #fff;
}
.calendar-hide{
	position: absolute; opacity: 0; cursor: pointer;
}

.locationClient{
	font-family: HelveticaNeueThin; font-size: 15px;
	color: #284f80;
}

.transTime{
	font-family: RobotoBlack; font-size: 20px;
	color: #284f80;
}

#alertModal .modal-content{
	border-radius: 0;
}
#alertModal .modal-header{
	background: #41b36f;
}
#alertModal .modal-body{
	color: #666;

}
}
#alertModal1 .modal-content{
	border-radius: 0;
}
#alertModal1 .modal-header{
	background: #41b36f;
}
#alertModal1 .modal-body{
	color: #666;

}
#saveAlertModal .modal-header{
	background: #ff9800!important;
	color: #fff;
}
}
#saveAlertModal div div div.modal-body h3{
	color: #666666!important;
}
.form-time .form-control{
	border: 0;
	/*background: rgba(36,42,47, .6);*/

	/*color: #e0e0e0;*/
	padding: 11px 15px;
	font-size: 16px;
	font-family: HelveticaNeueThin;
	font-weight: 500;
	height: auto;
}
.form-time .btn{
	padding: 15px 15px;
	font-size: 15px;
	font-family: RobotoThin;
}
.form-time .btn-info{
	border: none;
	background: linear-gradient(120deg, #1c4170, #284f80, #284f80);
}
.form-time .form-control:focus{
    box-shadow: none;
}

.form-time .input-group .input-group-addon{
	border: 0;
	/*background: rgba(36,42,47, .6);*/
	background: #284f80;
	color: #e0e0e0;
}
.form-time .input-group .form-control{
	border-right: 0px;
}
.form-time .input-group{
	border: 1px solid #1c4170;
}
.form-time .input-group:hover{
	border-color: #437bc2;
	transition: .5s;
}
.form-time .form-control::placeholder {
    color: #1c4170;
    opacity: .8;
}
.bootstrap-datetimepicker-widget{
	border-radius: 0px;
	background: linear-gradient(120deg, #242a2f, #2f373d,#2f363c);
}
.bootstrap-datetimepicker-widget table thead tr:first-child th:hover {
  background: #1c4170;
}
.bootstrap-datetimepicker-widget table td.day:hover,
.bootstrap-datetimepicker-widget table td.hour:hover,
.bootstrap-datetimepicker-widget table td.minute:hover,
.bootstrap-datetimepicker-widget table td.second:hover {
  background: #1c4170;
  cursor: pointer;
}
.bootstrap-datetimepicker-widget table td span:hover {
  background: #1c4170;
}
</style>