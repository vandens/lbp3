<div style='padding:20px'>
		<div class="row">
			<div class="col-xs-12">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-small">
						<h4 class="widget-title smaller">
							<i class="ace-icon fa fa-pic orange"></i>
								<?php echo $sub;?>
						</h4>
					<div class='pull-right'>	
						<button data-rel='tooltip' onclick="JSimpan('<?php echo base_url('master/simpan'); ?>',$('#form').serialize(),'0','clear')" type='submit' name='submit' value='<?php echo $val; ?>'  class='btn btn-success btn-white btn-round btn-sm fa ace-icon fa fa-save'  title='Simpan' data-placement='bottom'></button>
					</div>
					</div>
						<div class="widget-body">
							<div class="widget-main" id='widget-main'>
							<div id='AlertModal' class="alert" style='display:none;'></div>
							<form class="form-horizontal" id='form' action="<?php echo base_url($this->router->fetch_class().'/simpan'); ?>" class='form' method='post' role="form">	
							<input type='hidden' name='key' value='<?=$auto;?>'>
								<div class='row'>						
									<div class="form-group">
										<label class="col-sm-4"> Kode</label>
										<div class="col-sm-6">						
											<input type='text' class='col-xs-12 col-sm-10 input-sm' name='set_id'  id='set_id' placeholder='Kode' value='<?=$set_id;?>'  required >
										</div>
									</div>							
									<div class="form-group">
										<label class="col-sm-4"> Nama</label>
										<div class="col-sm-6">						
											<input type='text' class='col-xs-12 col-sm-10 input-sm' name='set_value'  id='set_value' placeholder='Nama' value='<?=$set_value;?>'  required >
										</div>
									</div>						
									<div class="form-group">
										<label class="col-sm-4"> Keterangan</label>
										<div class="col-sm-6">						
											<textarea class='col-xs-12 col-sm-10' name='set_desc'  id='set_desc' placeholder='Keterangan'><?php echo (!empty($set_desc)) ? $set_desc : $this->uri->segment(3);?></textarea>
										</div>
									</div>		
								</div>	

							</form>						
						</div>
					</div>
				</div>	
				
			</div><!-- /.col -->
		</div><!-- /.row -->		
</div>