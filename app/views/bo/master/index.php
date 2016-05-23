<div class="widget-box transparent">
	<div class="widget-header widget-header-flat widget-header-small">
	<div class="widget-toolbar action-buttons">
		<div class='pull-right'>
			<?php if($this->session->userdata('KECR') || $this->session->userdata('KELR')){ ?>
				<button data-toggle='modal' href='#modal-form' onclick="JTD('<?php echo base_url('master/form/'.$this->uri->segment(3)); ?>','key=','modal')" bigger-190 class='btn btn-success  btn-round btn-white  btn-sm fa fa-plus-square' data-rel='tooltip' data-placement='bottom' title='Tambah'></button>
			<?php } ?>
		</div>
	</div>
	</div>
	<div class="widget-body">
		<div class="widget-main padding-8">						
			<table id="content-list" class="display responsive  dataTable" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Kode</th>
						<th><?=ucwords($this->uri->segment(3)); ?></th>
						<th>Order</th>
						<th>Keterangan</th>
						<th>Status</th>
						<?php
						if(isset($this->_priv->KECU) || isset($this->_priv->KECD) || isset($this->_priv->KECT))
							echo "<th width='80px'>Opsi</th>";
						?>		
					</tr>
				</thead>
			</table>	
		</div>
	</div>
</div>