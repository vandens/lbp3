
<div class='page-content'>
<form class="form-horizontal" id='form' method='post' action="<?php echo base_url($this->router->fetch_class().'/'.$val); ?>" role="form">										
		<input type='hidden' name='form_id' value='<?php echo $form_id; ?>'>	
		<input type='hidden' name='data_id' value='<?php echo $data_id; ?>'>	
		<div class="row">
			<div class="col-xs-12">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-small">
					<h4 class="widget-title smaller purple">
						<i class="ace-icon fa fa-briefcase bigger-110 purple"></i>
							<?php echo $sub; ?>
					</h4>
					<div class='pull-right'>	
						<a data-rel='tooltip' href='javascript:history.back()' class='btn btn-success btn-white btn-round btn-sm fa fa-arrow-left'  title='Kembali' data-placement='bottom'></a>
						
						<?php $ico = ($val == 'confirm') ? 'fa-share-square-o' : 'fa-save'; ?>
						<?php $btn = ($val == 'confirm') ? 'btn-danger' : 'btn-info'; ?>
						<?php echo (($this->_priv->$create || $this->_priv->$update) && !$form_detail) ? "<button data-rel='tooltip' type='submit' name='submit' value='".$val."'  class='btn ".$btn." btn-white btn-round btn-sm fa ace-icon fa ".$ico."'  title='".$val."' data-placement='bottom'></button>" : "<a href='".base_url($this->router->fetch_class().'/form/'.$this->uri->assoc_to_uri($this->uri->uri_to_assoc(3)))."' class='btn btn-info btn-white btn-round btn-sm fa ace-icon fa fa-edit'  title='Edit' data-placement='bottom' data-rel='tooltip'></a>"; ?>
						<?php echo ($form_detail) ? "<a target='_blanks' href='".base_url('sentra-data/pdf/'.$this->uri->assoc_to_uri($this->uri->uri_to_assoc(3)))."' class='btn btn-warning btn-white btn-round btn-sm fa ace-icon fa fa-print'  title='PDF' data-placement='bottom' data-rel='tooltip'></a>" : ''; ?>
						
					</div>
					</div>
						<div class="widget-body">
							<div class="widget-main">		
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="form-field-1" style='text-align:left'> Kode / Nama Puskesmas </label>
									<div class="col-sm-9">						
										<input type='text' required class='col-xs-5 col-sm-6' id='pus_code'  name='pus_code' value="<?php echo $this->session->userdata('pus_code').' / '.$this->session->userdata('pus_name'); ?>" placeholder='Puskesmas'  readonly required onkeypress='this.value=ignoreSpaces(this.value); return AlfaNum(event);' onkeyup='javascript:this.value = this.value.toUpperCase();'>
									</div>
								</div>	
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="form-field-1" style='text-align:left'> Data </label>
									<div class="col-sm-9">						
										<input type='text' required class='col-xs-5 col-sm-6' id='title'  name='title' value='<?php echo $title; ?>' placeholder='Data'  readonly required onkeypress='this.value=ignoreSpaces(this.value); return AlfaNum(event);' onkeyup='javascript:this.value = this.value.toUpperCase();'>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="form-field-1"  style='text-align:left;'> Periode</label>
									<div class="col-xs-6  col-sm-2">
										<?php if($form_detail){ ?>
											<input required class="" name='data_period' value='<?php echo $data_period; ?>' readonly type="text" data-date-format="MM yyyy" onkeypress='this.value=ignoreSpaces(this.value); return DateFormat(event);'>
										<?php }else{ ?>						
										<div class="input-group">
											<input id="id-date-picker-1" required class="form-control date-picker" name='data_period' value='<?php echo $data_period; ?>' readonly type="text" data-date-format="MM yyyy" onkeypress='this.value=ignoreSpaces(this.value); return DateFormat(event);'>
											<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
											</span>
										</div>
										<?php } ?>
									</div>
								</div>

						</div>
					</div>
				</div>				

			</div><!-- /.col -->


			<div class="col-xs-12">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-small">
					<h4 class="widget-title smaller purple">
						<i class="ace-icon fa fa-file bigger-110 purple"></i>
							Detail Data
					</h4>
					</div>
						<div class="widget-body">
							<div class="widget-main">		
							<?php echo $form; ?>							
						</div>
					</div>
				</div>				

			</div><!-- /.col -->

		</div><!-- /.row -->		
	</form>
</div>
<?php echo $modal;?>
<?php if($form_detail){ ?>
<style>
input[type="text"] { 
    border:0;
    outline:0;
}	
</style>
<script>
  //$("input[type='text']").removeAttr("disabled");
  //$("input[type='text']").removeAttr("readonly");
</script>
<?php } ?>