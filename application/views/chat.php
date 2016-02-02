<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title ?></title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		
		<script>

			function loadawal()
			{
				$(function(){
					$.ajax({
						url : "<?php echo site_url('chat/tampil_chat') ?>",	
						success : function(data){
							$('#tampil').html(data);
							
						}
					})
				})
			}

			function add_chat(){

				$(function(){
					var nama  = $('#nama').val();
					var chat  = $('#chat').val();

					$.ajax({
						url : "<?php echo site_url('chat/add_chat') ?>",
						type : "POST",
						data : "nama="+nama+"&chat="+chat,
						success : function(msg)
						{
							$("#tampil").html(msg);
							$("#chat").val('');
							$("#chat").focus();
							$(".scroll").animate({ scrollTop: $(document).height() }, "fast");
			  				return false;
						}
					});
				});	
			}

			$(function(){
				$(".scroll").animate({ scrollTop: $(document).height() }, "slow");
  				return false;
			})

			$(function(){
				$('#chat').keypress(function(event) {
					var keycode = (event.keyCode ? event.keyCode : event.which);

					if (keycode == '13')
					{
						var nama  = $('#nama').val();
						var chat  = $('#chat').val();

						$.ajax({
							url : "<?php echo site_url('chat/add_chat') ?>",
							type : "POST",
							data : "nama="+nama+"&chat="+chat,
							success : function(msg)
							{
								$("#tampil").html(msg);
								$("#chat").val('');
								$("#chat").focus();
								$(".scroll").animate({ scrollTop: $(document).height() }, "slow");
				  				return false;								
							}
						});						
					}
				});
			})

			setInterval(loadawal, 50);
		</script>


		<style>
			.scroll{
				height: 250px;
				overflow-y: scroll; 
			}
		</style>

	</head>
	<body onload="loadawal()">
		<h1 align="center"><?php echo $title ?></h1>
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Chat Box
				</div>
				<div class="panel-body">
					<div class="scroll" id="tampil">
						
					</div>
				</div>
				<div class="panel-footer">
						<div class="row">
							<div class="col-md-3">
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
							</div>
							<div class="col-md-8">
							<input type="text" name="chat" id="chat" class="form-control" placeholder="Pesan">
							</div>
							<div class="col-md-1"><button onclick="add_chat()" class="btn btn-primary">Kirim</button></div>
						</div>
				</div>
			</div>
		</div>
		<center>
			<div>Created By. <a href="https://www.facebook.com/PanduAldiaja" 	>Wong Brebes</a></div>
		</center>		
	</body>
</html>