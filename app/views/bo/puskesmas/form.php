<div class='page-content'>
<form class="form-horizontal" id='form' method='post' action="<?php echo base_url($this->router->fetch_class().'/'.$val); ?>" role="form">										
	<input type='hidden' name='auto' value='<?php echo $auto; ?>'>
		<div class="row">
			<div class="col-xs-12">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-small">
					<h4 class="widget-title smaller">
						<i class="ace-icon fa fa-user bigger-110"></i>
							<?php echo $sub; ?>
					</h4>
					<div class='pull-right'>	
						<a data-rel='tooltip' href='javascript:history.back()' class='btn btn-success btn-white btn-round btn-sm fa fa-arrow-left'  title='Kembali' data-placement='bottom'></a>
						<?php echo ($this->_priv->PUSC || $this->_priv->PUSU) ? "<button data-rel='tooltip' type='submit' name='submit' value='".$val."'  class='btn btn-danger btn-white btn-round btn-sm fa ace-icon fa fa-share-square-o'  title='Konfirmasi' data-placement='bottom'></button>" : ''; ?>
					</div>
					</div>
						<div class="widget-body">
							<div class="widget-main">														
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Kode Puskesmas</label>
									<div class="col-sm-9">						
										<input type='text' class='col-xs-5 col-sm-3' name='pus_code' <?php if($auto) echo 'readonly'; ?> value="<?php echo $pus_code; ?>" placeholder='Kode Puskesmas'  required onkeypress='return AlfaNum(event);' onkeyup='javascript:this.value = this.value.toUpperCase();'>
									</div>
								</div>
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Nama Puskesmas</label>
									<div class="col-sm-9">						
										<input type='text' class='col-xs-12 col-sm-6' name='pus_name' value='<?php echo $pus_name; ?>' placeholder='Nama Puskesmas'  required onkeypress='return AlfaNum(event);'>
									</div>
								</div>	
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Kepala Puskesmas</label>
									<div class="col-sm-9">						
										<input type='text' class='col-xs-5 col-sm-3' name='pus_head' value='<?php echo $pus_head; ?>' placeholder='Kepala Puskesmas'>
									</div>
								</div>			
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Penanggung Jawab</label>
									<div class="col-sm-9">						
										<input type='text' class='col-xs-5 col-sm-3' name='pus_resp' value='<?php echo $pus_resp; ?>' placeholder='Penanggung Jawab'>
									</div>
								</div>	
								
								
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Kecamatan</label>
									<div class="col-sm-10">											
										<select name='pus_district'  class='col-xs-5 col-sm-3'>
											<option value=''> -- Pilih Salah Satu -- </option>											
											<?php 
											foreach($dlist['KEC'] as $val){
												
												$sel 	= (ucwords($pus_district)	 == $val->set_value) ? 'selected="selected"' : '';
												echo '<option value="'.$val->set_value.'" '.$sel.'>'.ucwords(strtolower($val->set_value)).'</option>';
											}
											?>
										</select>
									</div>
								</div>
								
								
							<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Kelurahan</label>
									<div class="col-sm-10">										
										<select name='pus_village'  class='col-xs-5 col-sm-3'>
											<option value=''> -- Pilih Salah Satu -- </option>											
											<?php 
											foreach($dlist['KEL'] as $val){
												
												$sel 	= (ucwords($pus_village)	 == $val->set_value) ? 'selected="selected"' : '';
												echo '<option value="'.$val->set_value.'" '.$sel.'>'.ucwords(strtolower($val->set_value)).'</option>';
											}
											?>
										</select>
									</div>
								</div>
								
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Email</label>
									<div class="col-sm-9">						
										<input type='text' class='col-xs-5 col-sm-3' name='pus_email' value='<?php echo $pus_email; ?>' placeholder='Email'>
									</div>
								</div>		
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> No Telepon</label>
									<div class="col-sm-9">						
										<input type='text' class='col-xs-5 col-sm-3' name='pus_phone' value='<?php echo $pus_phone; ?>' placeholder='No Telepon' onkeypress='return NumOnly(event);'>
									</div>
								</div>										
								
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Alamat</label>
									<div class="col-sm-9">						
										<textarea class='col-xs-5 col-sm-6' name='pus_address' placeholder='Alamat Puskesmas'><?php echo $pus_address; ?></textarea>
									</div>
								</div>
														
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Status</label>
									<div class="col-sm-9">	
										<select name='pus_status'>
											<?php 
											foreach($dlist['STA'] as $val){
												
												$sel 	= (ucwords($pus_status)	 == $val->set_value) ? 'selected="selected"' : '';
												echo '<option value="'.$val->set_value.'" '.$sel.'>'.ucwords(strtolower($val->set_value)).'</option>';
											}
											?>
										</select>
									</div>
								</div>								
						</div>
					</div>
				</div>	
				
								
			</div><!-- /.col -->
		</div><!-- /.row -->		
	</form>
</div>