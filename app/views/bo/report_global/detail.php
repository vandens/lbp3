<div class='page-content'>
		<div class="row">

			<div class="col-xs-12">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-small">
					<h4 class="widget-title smaller">
						<i class="ace-icon fa fa-check-square-o bigger-110"></i>
							<?php echo ucwords($sub);?>

					<div class='pull-right'>	
						<a data-rel='tooltip' href='javascript:history.back()' class='btn btn-success btn-white btn-round btn-sm fa fa-arrow-left'  title='Kembali' data-placement='bottom'></a>
					</div>
					</h4>
					</div>
				<!--
						<div class="widget-body">
							<div class="widget-main">		
									
							<div class="col-xs-12 col-sm-12">
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style='width:175px'> Periode</div>
											<div class="profile-info-value ">
												<span class="editable"><?php echo str_replace('%20', ' ', $period);?></span>
											</div>				
								
									</div>						
											
								</div>
							</div>

								
						</div>
					</div>
				-->
				</div>									
				

				
			</div><!-- /.col -->
			<div class="col-xs-12">
				<br>
				<?php echo $grafik; ?>
			</div>

		</div><!-- /.row -->
	</form>
</div>