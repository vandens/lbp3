<div class="widget-box transparent">
	<div class="widget-header widget-header-flat widget-header-small">
	<div class="widget-toolbar action-buttons">
		<div class='pull-right'>
			<?php //echo $this->session->userdata('GROC') ? "<button onclick='javascript:window.location.href=\"".base_url($this->router->fetch_class().'/form')."\"' bigger-190 class='btn btn-success  btn-round btn-white  btn-sm fa fa-plus-square' data-rel='tooltip' data-placement='bottom' title='Tambah'></button>" : ''; ?>
		</div>
	</div>
	</div>
	<div class="widget-body">
		<div class="widget-main padding-8">						
			<table id="content-list" class="display responsive  dataTable" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Kode Puskes</th>
						<th>Nama Puskes</th>
						<th>Periode</th>
						<th>Jumlah Laporan Masuk</th>
						<th>Terakhir Update Oleh</th>
						<th>Waktu Update</th>
						<th>Status</th>
						<?php
						if(isset($this->_priv->GLBP) || isset($this->_priv->GLBT))
							echo "<th width='80px'>Opsi</th>";
						?>		
					</tr>
				</thead>
			</table>	
		</div>
	</div>
</div>