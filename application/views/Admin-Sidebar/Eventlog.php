<?php $this->load->view("AdminSidebar") ?>

<head>
<title>Eventlog</title>
<link href="<?php echo base_url('assets/css/event.css'); ?>" rel="stylesheet" type="text/css">
</head>

<main class="page-content">
	<div style="margin-left: 20vw; width: 78.5vw; " id="mainEvent">
		<!--Event Table-->
		<div class="table-title" href="#viewEvent" class="view" data-toggle="modal">
			<div class="row">
					<div class="col-sm-6">
						<h2>Event Log</h2>
					</div>
			</div>
		</div>
		<div class="table-responsive" >
			<table id="mytable" class="table table borderless table-hover" >
				<thead>
					<tr>
						<th>Date & Time</th>
						<th>User Events</th>
						<th></th>
					</tr>
				</thead>
				<tbody >
					<?php foreach($event as $row){?>
						<tr >
							<td class="d-flex datetime border-bottom-0"><?php echo $row->day?></td>
							<td class="d-flex datetime border-top-0 "><?php echo $row->date?></td>
							<td><?php echo $row->event?> at <?php echo  date('h:i:s a', strtotime($row->time_happened)) ?></td><!--log info-->
							<td>
			
								<?php if($row->threatlevel == "Normal"):?>
									<?php if($row->user == "Time Out"):?>
										<div class="userlog bg-danger mb-1"><?php echo $row->user?></div>
									<?php else:?>
										<div class="userlog mb-1"><?php echo $row->user?></div>
									<?php endif?>	
									<div class="userlog "><?php echo $row->threatlevel?></div>
								<?php elseif($row->threatlevel == "Warning"):?>
									<div class="userlog mb-1"><?php echo $row->user?></div>
									<div class="userlog bg-warning"><?php echo $row->threatlevel?></div>
								
								<?php elseif($row->threatlevel == "Alert"):?>
									<div class="userlog mb-1"><?php echo $row->user?></div>
									<div class="userlog bg-danger"><?php echo $row->threatlevel?></div>
								<?php endif?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="clearfix"></div>
		</div>
		<!--View-->
		<div class="modal fade" id="viewEvent" tabindex="-1" aria-labelledby="viewEventHeader" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="viewEventHeader">View Event</h5>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-12">
								<label class="fw-bold">Date: </label>
								<label>01/17/2022</label><br>
								<label class="fw-bold">Time: </label>
								<label>11:45:12 AM</label><br>
								<label class="fw-bold">User: </label>
								<label>admin</label><br>
								<label class="fw-bold">Action/Log: </label>
								<label>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium, officia!</label>
							</div>	
						</div>
					</div>
					<div class="modal-footer d-flex justify-content-end">
      					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    				</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script src=<?php echo base_url("assets/js/bootstrap.bundle.min.js")?>></script>
<script src=<?php echo base_url("assets/js/Eventlog.js")?>></script>
