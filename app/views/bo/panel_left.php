
<div id="sidebar" class="sidebar responsive sidebar-fixed">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">

					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<a href="<?php echo base_url('#'); ?>" class="btn btn-success" title='Tambah Berita Baru'>
							<i class="ace-icon fa fa-info-circle"></i>
						</a>

						<a href="<?php echo base_url('#'); ?>" class="btn btn-info" title='Tambah Surat Baru'>
							<i class="ace-icon fa fa-pencil"></i>
						</a>

						<a href="<?php echo base_url('#'); ?>" class="btn btn-warning" title='Tambah Kepala Keluarga'>
							<i class="ace-icon fa fa-users" ></i>
						</a>

						<a href="<?php echo base_url('#'); ?>" class="btn btn-danger" title='Catatan Aktifitas'>
							<i class="ace-icon fa fa-exchange"></i>
						</a>

					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">

					<li id='dashboard' class="hover open active">
						<a class="" href="<?php echo base_url('admin'); ?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php $list_menu = new menu();
							echo $list_menu->get_list_menu();
							#echo $menu->get_list_menu_real();
					 ?>
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					window.jQuery || document.write("<script src='<?php echo base_url(); ?>media/js/jquery.js'>"+"<"+"/script>");
				</script>
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					var menu = '<?php echo $menu; ?>';
					$('.hover').removeClass('active');
					$('#'+menu).addClass('active');
				</script>
			</div>