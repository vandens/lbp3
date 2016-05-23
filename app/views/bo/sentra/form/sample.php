	<input type='hidden' name='key' value='<?php echo $id; ?>'>												
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Kode Grup</label>
									<div class="col-sm-9">						
										<input type='text' class='col-xs-5 col-sm-2' id='group_id'  name='group_id' value='<?php echo $group_id; ?>' placeholder='Kode Grup'  required onkeypress='this.value=ignoreSpaces(this.value); return AlfaNum(event);' onkeyup='javascript:this.value = this.value.toUpperCase();'>
									</div>
								</div>
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Nama Grup</label>
									<div class="col-sm-9">						
										<input type='text' class='col-xs-5 col-sm-2' id='group_name'  name='group_name' value='<?php echo $group_name; ?>' placeholder='Nama Grup'  required onkeypress='return AlfaOnly(event);'>
									</div>
								</div>
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Deskripsi </label>
									<div class="col-sm-9">						
										<textarea name='group_desc' id='group_desc' class='col-xs-5 col-sm-6' placeholder='Deskripsi'><?php echo $group_desc; ?></textarea>
									</div>
								</div>
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="form-field-1"> Status</label>
									<div class="col-sm-9">						
										<select name='group_status'>
											<?php 
											foreach($dlist['STA'] as $val){												
												$sel 	= (ucwords($group_status)	 == $val->set_value) ? 'selected="selected"' : '';
												echo '<option value="'.$val->set_value.'" '.$sel.'>'.ucwords(strtolower($val->set_value)).'</option>';
											}
											?>
										</select>
									</div>
								</div>	



    <table width="100%" >
  <tr>
    <td width="12" bgcolor="#B3D6FF">&nbsp;</td>
    <td colspan="4" bgcolor="#B3D6FF">
    <table width="100%" border="1">
  <tr>
    <td width="122"><div align="right"><strong>Periode</strong></div></td>
    <td width="482" bgcolor="#00FF00"><div align="center">

      <select name="tahun">
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
      </select>
      <input type="submit" value="Proses" name="kirim"/>
    </div></td>
  </tr>
  <tr>
    <td><div align="right"><strong>Data yang ditampilkan</strong></div></td>
    <td bgcolor="#FFFF33"><div align="center">
      <input name="ppkm" type="text" id="ppkm" value="<?php echo $kdpuskes; ?>" size="10" placeholder="Kd. Puskes" readonly="readonly"/>
      <input name="pbln" type="text" id="pbln" value="<?php echo $bulan; ?>" size="10" placeholder="Bulan" readonly="readonly"/>
      <input name="pthn" type="text" id="pthn" value="<?php echo $tahun; ?>" size="10" placeholder="Tahun" readonly="readonly"/>
    </div></td>
  </tr>
</table>    </td>
    </tr>
<tr>
    <td colspan="5" bgcolor="#B3EE5C"><div align="right"></div></td>
    </tr>

  <tr>
    <td width="12">1.</td>
    <td width="567">Penyuluhan PHBS kelompok Rumah Tangga</td>
    <td width="12"></td>
    <td width="17">&nbsp;</td>
    <td width="430">&nbsp;</td>
  </tr>

   <tr>
    <td width="12"></td>
    <td width="567"> a). Frekuensi Penyuluhan</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000002i" size="30" value="<?php echo $cn1; ?>"></td>
  	</tr>

   <tr>
    <td width="12"></td>
    <td width="567">  b). Jumlah Rumah Tangga yang disuluh (Home Visit)</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000003i" size="30" value="<?php echo $cn2; ?>"></td>
  	</tr>
  <tr>
    <td width="12"></td>
    <td width="567"> c). Jumlah Rumah yang telah melaksanakan PHBS /Sehat (dari 210 rumah yang dikaji)</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000004i" size="30" value="<?php echo $cn3; ?>"></td>
  	</tr>


  <tr>
    <td width="12">2.</td>
    <td width="567"> Penyuluhan PHBS Institusi Pendidikan (Sekolah)</td>
    <td width="12"></td>
    <td width="17">&nbsp;</td>
    <td width="430">&nbsp;</td>
  </tr>

   <tr>
    <td width="12"></td>
    <td width="567"> a). Frekuensi Penyuluhan</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000006i" size="30" value="<?php echo $cn4; ?>"></td>
  	</tr>

   <tr>
    <td width="12"></td>
    <td width="567">  b). Jumlah Institusi Pendidikan</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000007i" size="30" value="<?php echo $cn5; ?>"></td>
  	</tr>

<tr>
    <td width="12">3.</td>
    <td width="567"> Jumlah sekolah yang melaksanakan PHBS</td>
    <td width="12"></td>
    <td width="17">&nbsp;</td>
    <td width="430">&nbsp;</td>
</tr>


  <tr>
    <td width="12"></td>
    <td width="567"> a). TK</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="Klas I" value="<?php echo $cn6; ?>" name="S30000009i" size="4" ><input type="text" placeholder="Klas II" name="S30000010i" size="4" value="<?php echo $cn7; ?>" ><input type="text" placeholder="Klas III" name="S30000011i" size="4" value="<?php echo $cn8; ?>" /><input type="text" placeholder="Klas IV" name="S30000012i" size="4" value="<?php echo $cn9; ?>" ></td>
  	</tr>
  <tr>
    <td width="12"></td>
    <td width="567"> b). SD</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="Klas I" name="S30000013i" size="4" value="<?php echo $cn10; ?>"><input type="text" placeholder="Klas II" name="S30000014i" size="4" value="<?php echo $cn11; ?>"><input type="text" placeholder="Klas III" name="S30000015i" size="4" value="<?php echo $cn12; ?>"><input type="text" placeholder="Klas IV" name="S30000016i" size="4" value="<?php echo $cn13; ?>"></td>
  	</tr>
  <tr>
    <td width="12"></td>
    <td width="567"> c). SMP</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="Klas I" name="S30000017i" size="4" value="<?php echo $cn14; ?>"><input type="text" placeholder="Klas II" name="S30000018i" size="4" value="<?php echo $cn15; ?>"><input type="text" placeholder="Klas III" name="S30000019i" size="4" value="<?php echo $cn16; ?>"><input type="text" placeholder="Klas IV" name="S30000020i" size="4" value="<?php echo $cn17; ?>"></td>
  	</tr>

  <tr>
    <td width="12"></td>
    <td width="567"> d). SMA</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="Klas I" name="S30000021i" size="4" value="<?php echo $cn18; ?>"><input type="text" placeholder="Klas II" name="S30000022i" size="4" value="<?php echo $cn19; ?>"><input type="text" placeholder="Klas III" name="S30000023i" size="4" value="<?php echo $cn20; ?>"><input type="text" placeholder="Klas IV" name="S30000024i" size="4" value="<?php echo $cn21; ?>"></td>
  	</tr>

  <tr>
    <td width="12">4.</td>
    <td width="567"> Penyuluhan PHBS Institusi Sarana Kesehatan</td>
    <td width="12"></td>
    <td width="17">&nbsp;</td>
    <td width="430">&nbsp;</td>
  </tr>

   <tr>
    <td width="12"></td>
    <td width="567"> a). Frekuensi Penyuluhan</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000026i" size="30" value="<?php echo $cn22; ?>"></td>
  	</tr>

   <tr>
    <td width="12"></td>
    <td width="567"> b). Jumlah Institusi Sarana Kesehatan yang disuluh </td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000027i" size="30" value="<?php echo $cn23; ?>"></td>
  	</tr>

  
   <tr>
    <td width="12"></td>
    <td width="567">  c). Jumlah Institusi Sarana Kesehatan yang telah melaksanakan PHBS/Sehat </td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000028i" size="30" value="<?php echo $cn24; ?>"></td>
  	</tr>
    
      <tr>
    <td width="12">5.</td>
    <td width="567"> Penyuluhan PHBS Institusi Tempat-Tempat Umum</td>
    <td width="12"></td>
    <td width="17">&nbsp;</td>
    <td width="430">&nbsp;</td>
      </tr>

   <tr>
    <td width="12"></td>
    <td width="567"> a). Frekuensi Penyuluhan</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000030i" size="30" value="<?php echo $cn25; ?>"></td>
  	</tr>

   <tr>
    <td width="12"></td>
    <td width="567">  b). Jumlah Institusi Sarana Tempat-tempat Umum yang disuluh</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000031i" size="30" value="<?php echo $cn26; ?>"></td>
  	</tr>

  
   <tr>
    <td width="12"></td>
    <td width="567">   c) Jumlah SaranaTempat-tempat Umum yang telah melaksanakan PHBS/Sehat</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000032i" size="30" value="<?php echo $cn27; ?>"></td>
  	</tr>
    
    
      <tr>
    <td width="12">6.</td>
    <td width="567"> Penyuluhan PHBS Institusi Tempat Kerja</td>
    <td width="12"></td>
    <td width="17">&nbsp;</td>
    <td width="430">&nbsp;</td>
      </tr>

   <tr>
    <td width="12"></td>
    <td width="567"> a). Frekuensi Penyuluhan</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000034i" size="30" value="<?php echo $cn28; ?>"></td>
  	</tr>

   <tr>
    <td width="12"></td>
    <td width="567"> b). Jumlah Institusi Sarana Tempat Kerja yang disuluh</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000035i" size="30" value="<?php echo $cn29; ?>"></td>
  	</tr>

  
   <tr>
    <td width="12"></td>
    <td width="567">    c). Jumlah Institusi Tempat Kerja yang telah melaksanakan PHBS/Sehat</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000036i" size="30" value="<?php echo $cn30; ?>"></td>
  	</tr>
          <tr>
    <td width="12">7.</td>
    <td width="567"> Penyuluhan PHBS pada kelompok masyarakat</td>
    <td width="12"></td>
    <td width="17">&nbsp;</td>
    <td width="430">&nbsp;</td>
        </tr>

   <tr>
    <td width="12"></td>
    <td width="567"> a). Frekuensi Penyuluhan</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000038i" size="30" value="<?php echo $cn31; ?>"></td>
  	</tr>

   <tr>
    <td width="12"></td>
    <td width="567"> b). Jumlah Kelompok masyarakat yang disuluh</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000039i" size="30" value="<?php echo $cn32; ?>"></td>
  	</tr>

  
   <tr>
    <td width="12"></td>
    <td width="567"> c). Jumlah Kelompok masyarakat  yang telah melaksanakan PHBS/Sehat</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" placeholder="" name="S30000040i" size="30" value="<?php echo $cn33; ?>"></td>
  	</tr>
     <td colspan="5"><div align="center">
     <br />
<br />

     </div></td>
  	</tr>
</table>