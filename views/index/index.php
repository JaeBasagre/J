<?php
	$checkTimeIn = $this->checkTimeIn;
	$checkTimeOut = $this->checkTimeOut;
	$checkNBT = $this->checkNBT;
	$checkForecast = $this->checkForecast;
?>
<style>
	.alert-standard{
		padding: 20px 10px;
		color: #fff;
		background: #a93c45;
	}
</style>
<div class="col-lg-6 col-lg-offset-3 col-xs-10 col-xs-offset-1 main-container">
<div class="time-box row" id="time-box">
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 left text-left">
		<span class="day1"></span>
		<span class="month1"></span>
	</div>
	<div class="col-lg-7 row col-md-7 col-sm-7 col-xs-7 right text-right">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<span class="time1"></span>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
			<span class="sec1"></span>
			<span class="ampm1"></span>
		</div>
	</div>
</div>
<div class="time-entry-box row">
	<?php if(empty($checkTimeOut)): ?>
	<form id="timeEntryForm">
		<div class="form-time">
			<div class="form-group mb-20 text-center">
				<button type="button" class="btn btn-info btn-block" class="datepicker1" style="padding: 10px 15px;">
					<input id="selectDates" class="datepicker1 calendar-hide" name="date" value="<?= isset($_GET['date']) ? date('Y-m-d' ,strtotime($_GET['date'])) : date('Y-m-d')?>">
					<i class="pe-7s-date pe-lg" style="font-size: 25px"></i>
					<span style="font-family: RobotoThin; font-size: 20px"><?= isset($_GET['date']) ? date('M d, Y' ,strtotime($_GET['date'])) : date('M d, Y')?></span>
				</button>
			</div>
			<?php if(!empty($checkForecast)): ?>
			<div class="form-group">
				<div class="input-group date" id="datetimepicker3">
				    <input type="text" class="form-control" name="time" required id="time" placeholder="Time"/>
				    <span class="input-group-addon"><i class="pe-7s-clock pe-lg"></i></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
				    <input type="text" class="form-control" name="location" required id="location" placeholder="Location" />
				    <span class="input-group-addon"><i class="pe-7s-map-marker pe-lg"></i></span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
			    	<input type="text" class="form-control" name="client" required id="client" placeholder="Client" />
				    <span class="input-group-addon"><i class="pe-7s-portfolio pe-lg"></i></span>
				</div>
			</div>
			<div class="form-group mt-30">
				<?php if(empty($checkTimeIn)): ?>
						<button class="btn btn-info btn-block btnSaveTime" time='in' type="submit">Save Time In <i class="pe-7s-clock pe-lg"></i></button>
				<?php else: ?>
						<button class="btn btn-info btnSaveTime col-lg-6 col-md-6 col-sm-6 col-xs-12" time='between' type="submit">Save In-Between <i class="pe-7s-clock pe-lg"></i></button>
						<button class="btn btn-info btnSaveTime col-lg-6 col-md-6 col-sm-6 col-xs-12" time='out' type="submit" <?= isset($checkNBT[0]->status) && $checkNBT[0]->status == 'done' ? '' : 'disabled'?>>Save Time Out <i class="pe-7s-clock pe-lg"></i></button>
						<?php if(isset($checkNBT[0]->status) && $checkNBT[0]->status == 'done'):?>
						<?php else: ?>
						<div class="text-center mt-10 alert-standard col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<i class="pe-7s-attention pe-lg"></i> You have unsubmitted NBT!
						</div>
						<?php endif; ?>
				<?php endif; ?>
			</div>
			<?php else: ?>
				<div class="text-center mt-10 alert-standard">
					<i class="pe-7s-attention pe-lg"></i> No Forecast Found!
				</div>
			<?php endif; ?>
		</div>
	</form>
	<?php else: ?>
	<div class="form-time" style="color: #dddddd">
		<div class="form-group col-lg-12 mb-20 text-center">
			<button type="button" class="btn btn-info btn-block" class="datepicker1" style="padding: 10px 15px;">
				<input id="selectDates" class="datepicker1 calendar-hide" name="date" value="<?= isset($_GET['date']) ? date('Y-m-d' ,strtotime($_GET['date'])) : date('Y-m-d')?>">
				<i class="pe-7s-date pe-lg" style="font-size: 25px"></i>
				<span style="font-family: RobotoThin; font-size: 20px"><?= isset($_GET['date']) ? date('M d, Y' ,strtotime($_GET['date'])) : date('M d, Y')?></span>
			</button>
		</div>
		<div class="form-group col-lg-12 mb-20 text-center" >
			<div><span class="locationClient">Time In</span></div>
			<span class="transTime"><?= date('h:i A' ,strtotime($checkTimeIn[0]->time)); ?></span><br>
			<span class="locationClient">Location: <?= $checkTimeIn[0]->location ?></span><br>
			<span class="locationClient">Client: <?= $checkTimeIn[0]->client ?></span>
		</div>
		<div class="form-group col-lg-5 text-center">
			<hr style="border-color: #394249">
		</div>
		<div class="form-group col-lg-2 text-center">
			<i class="pe-7s-clock" style="font-size: 35px; color: #284f80;"></i>
		</div>
		<div class="form-group col-lg-5 text-center">
			<hr style="border-color: #394249">
		</div>
		<div class="form-group mt-10 col-lg-12 text-center">
			<div><span class="locationClient">Time Out</span></div>
			<span class="transTime"><?= date('h:i A' ,strtotime($checkTimeOut[0]->time)); ?></span><br>
			<span class="locationClient">Location:  <?= $checkTimeOut[0]->location ?></span><br>
			<span class="locationClient">Client: <?= $checkTimeOut[0]->client ?></span>
		</div>
	</div>
	<?php endif; ?>
</div>
<div id="saveAlertModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header text-center">
				<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
				<h4 class="modal-title"><i class="pe-7s-help1 pe-3x"></i></h4>
			</div>
			<div class="modal-body text-center">
				<!-- <div class="form-group"> -->
				   <h3 style="color: #666666!important;"> Are you sure?</h3>
				   <span style="color: #666666!important;" class="data">You want to delete this data?</span>

				<!-- </div> -->
			</div>
			<div class="modal-footer mt-20" style="text-align: center!important;">

				<div class="col-lg-6">
				<button type="submit" id="btnConfirmAlert" class="btn btn-default btn-block">Yes</button>
				</div>
				<div class="col-lg-6">
				<button type="button" class="btn btn-block" data-dismiss="modal">No</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="alertModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
			<button type="button" class="close closeAlert" data-dismiss="modal" style="color: #fff;position:absolute; right: 15; opacity: .8">&times;</button>
				<h4 class="modal-title"><i class="pe-7s-check pe-3x"></i></h4>
			</div>
			<div class="modal-body text-center">
				<h5> You're Time in has been submitted!</h5>
				<i class="pe-7s-like2" style="font-size: 70px; color:#41b36f;"></i>
				<h4 class="data">You still have tomorrow to improve and be extraordinary.</h4>
				<p style="background-color:#41b36f; padding: 10px 0px; color: #fff; margin-bottom: 20px;">
					<strong>
						Honesty! Our new culture.<br/>
						Observe Honesty!
						That makes us extraordinary!
					</strong>
				</p>
			</div>
		</div>
	</div>
</div>

<div id="alertModal1" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close closeAlert" data-dismiss="modal" style="color: #fff; position:absolute; right: 15; opacity: .8">&times;</button>
				<h4 class="modal-title"><i class="pe-7s-check pe-3x"></i></h4>
			</div>
			<div class="modal-body text-center" style="padding: 30px 0px 10px 0px; font-size: 20px;">
				<span class="timeMsg">You're Time out</span><br>
				<span>Has been submitted!</span>
			</div>
			<div class="modal-footer mt-20" style="text-align: center!important;">
				<button type="button" class="btn btn-default btn-block closeAlert">OK</button>
			</div>
		</div>
	</div>
</div>
<script src="<?=URL?>public/js/index/index.js"></script>
