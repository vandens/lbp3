<div class='page-content'>
<form class="form-horizontal" id='form' method='post' action="<?php echo base_url($this->router->fetch_class().'/simpan'); ?>" role="form">										
		<div class="row">
			<div class="col-xs-12">
			<div class='alert alert-danger' style='display:none'><?php echo validation_errors(); ?></div>
				<div class="widget-box transparent">
					<div class="widget-header widget-header-small">
					<h4 class="widget-title smaller">
						<i class="ace-icon fa fa-check-square-o bigger-110"></i>
							<?php echo $sub; ?>
					</h4>
					<div class='pull-right'>	
						<a data-rel='tooltip' href='javascript:history.back()' class='btn btn-success btn-white btn-round btn-sm fa fa-arrow-left'  title='Kembali' data-placement='bottom'></a>
						<?php echo ($this->_priv->PUSC || $this->_priv->PUSU) ? "<button data-rel='tooltip' type='submit' name='submit' value='".$val."'  class='btn btn-danger btn-white btn-round btn-sm fa ace-icon fa fa-share-square-o'  title='Konfirmasi' data-placement='bottom'></button>" : ''; ?>
					</div>
					</div>
						<div class="widget-body">
							<div class="widget-main">		
									
							<div class="col-xs-12 col-sm-12">
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style='width:175px'> Kode Puskesmas</div>
											<div class="profile-info-value ">
												<span class="editable"><?=$pus_code?></span>
											</div>				
								
									</div>		
									<div class="profile-info-row">
										<div class="profile-info-name"> Nama Puskesmas</div>
											<div class="profile-info-value ">
												<span class="editable"><?=$pus_name?></span>
											</div>	
									</div>	
									<div class="profile-info-row">
										<div class="profile-info-name"> Kepala Puskesmas</div>
											<div class="profile-info-value ">
												<span class="editable"><?=$pus_head?></span>
											</div>	
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Penanggung Jawab</div>
											<div class="profile-info-value ">
												<span class="editable"><?=$pus_resp?></span>
											</div>	
									</div>	
									<div class="profile-info-row">
										<div class="profile-info-name"> Kecamatan</div>
											<div class="profile-info-value ">
												<span class="editable"><?=$pus_district?></span>
											</div>	
									</div>			
									<div class="profile-info-row">
										<div class="profile-info-name"> Kelurahan</div>
											<div class="profile-info-value ">
												<span class="editable"><?=$pus_village?></span>
											</div>	
									</div>	
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Email</div>
											<div class="profile-info-value ">
												<span class="editable"><?=$pus_email?></span>
											</div>	
									</div>	
									
									<div class="profile-info-row">
										<div class="profile-info-name"> No Telepon</div>
											<div class="profile-info-value ">
												<span class="editable"><?=$pus_phone?></span>
											</div>	
									</div>	
									<div class="profile-info-row">
										<div class="profile-info-name"> Alamat</div>
											<div class="profile-info-value ">
												<span class="editable"><?=$pus_address?></span>
											</div>	
									</div>			
									<div class="profile-info-row">
										<div class="profile-info-name"> Status</div>
											<div class="profile-info-value ">
												<span class="editable"><?=$pus_status?></span>
											</div>	
									</div>					
											
								</div>
							</div>

								
						</div>
					</div>
				</div>						
				
				
			</div><!-- /.col -->

		</div><!-- /.row -->
	</form>
</div>