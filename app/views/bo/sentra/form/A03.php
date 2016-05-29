<table width="" border='0' style='font-size:12px;'>
  <tr bgcolor='purple' >
    <td width='30' style='color:white;' height='30px'>&nbsp;No</td>
    <td width="567" style='color:white;'><?php echo $title; ?></td>
    <td></td>
    <td>&nbsp;</td>
    <td style='color:white;'>Jumlah</td>
  </tr>
  <tr>
    <td>1.</td>
    <td>Penyuluhan PHBS kelompok Rumah Tangga</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td></td>
    <td> &nbsp;a). Frekuensi Penyuluhan</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_001][data_val][]" size="30" value="<?php echo $A03_001['data_val0']; ?>"></td>
  	</tr>
   <tr>
    <td></td>
    <td>  &nbsp;b). Jumlah Rumah Tangga yang disuluh (Home Visit)</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_002][data_val][]" size="30" value="<?php echo $A03_002['data_val0']; ?>"></td>
  	</tr>
  <tr>
    <td></td>
    <td> &nbsp;c). Jumlah Rumah yang telah melaksanakan PHBS /Sehat (dari 210 rumah yang dikaji)</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_003][data_val][]" size="30" value="<?php echo $A03_003['data_val0']; ?>"></td>
  	</tr>
  <tr>
    <td>2.</td>
    <td> Penyuluhan PHBS Institusi Pendidikan (Sekolah)</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td></td>
    <td> &nbsp;a). Frekuensi Penyuluhan</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_004][data_val][]" size="30" value="<?php echo $A03_004['data_val0']; ?>"></td>
  	</tr>
   <tr>
    <td></td>
    <td>  &nbsp;b). Jumlah Institusi Pendidikan</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_005][data_val][]" size="30" value="<?php echo $A03_005['data_val0']; ?>"></td>
    </tr>

   <tr>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>

	<tr>
	    <td>3.</td>
	    <td> Jumlah sekolah yang melaksanakan PHBS</td>
	    <td></td>
	    <td>&nbsp;</td>
	    <td>
        <table width='200px'>
          <tr bgcolor='purple'>
            <td colspan='4'  style='color:white;'><center>Kelas</center></td>
          </tr>
          <tr bgcolor='purple'>
            <td style='color:white;'><center>I</center></td>
            <td style='color:white;'><center>II</center></td>
            <td style='color:white;'><center>III</center></td>
            <td style='color:white;'><center>IV</center></td>
            </tr>
          </table>
      </td>
	</tr>


  <tr>
    <td></td>
    <td> &nbsp;a). TK</td>
    <td></td>
    <td>:</td>
    <td>
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas I"  	name="detail[A03_006][data_val][]" size="4" value="<?php echo $A03_006['data_val0']; ?>">
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas II" 	name="detail[A03_006][data_val][]" size="4" value="<?php echo $A03_006['data_val1']; ?>">
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas III" 	name="detail[A03_006][data_val][]" size="4" value="<?php echo $A03_006['data_val2']; ?>">
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas IV" 	name="detail[A03_006][data_val][]" size="4" value="<?php echo $A03_006['data_val3']; ?>">
    </td>
  	</tr>
  <tr>
    <td></td>
    <td> &nbsp;b). SD</td>
    <td></td>
    <td>:</td>
    <td>
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas I" 	  name="detail[A03_007][data_val][]" size="4" value="<?php echo $A03_007['data_val0']; ?>">
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas II" 	name="detail[A03_007][data_val][]" size="4" value="<?php echo $A03_007['data_val1']; ?>">
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas III" 	name="detail[A03_007][data_val][]" size="4" value="<?php echo $A03_007['data_val2']; ?>">
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas IV" 	name="detail[A03_007][data_val][]" size="4" value="<?php echo $A03_007['data_val3']; ?>">
    </td>
  	</tr>
  <tr>
    <td></td>
    <td> &nbsp;c). SMP</td>
    <td></td>
    <td>:</td>
    <td>
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas I" 	  name="detail[A03_008][data_val][]" size="4" value="<?php echo $A03_008['data_val0']; ?>">
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas II" 	name="detail[A03_008][data_val][]" size="4" value="<?php echo $A03_008['data_val1']; ?>">
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas III"	name="detail[A03_008][data_val][]" size="4" value="<?php echo $A03_008['data_val2']; ?>">
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas IV" 	name="detail[A03_008][data_val][]" size="4" value="<?php echo $A03_008['data_val3']; ?>">
    </td>
  	</tr>

  <tr>
    <td></td>
    <td>&nbsp;d). SMA</td>
    <td></td>
    <td>:</td>
    <td>
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas I" 	  name="detail[A03_009][data_val][]" size="4" value="<?php echo $A03_009['data_val0']; ?>">
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas II" 	name="detail[A03_009][data_val][]" size="4" value="<?php echo $A03_009['data_val1']; ?>">
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas III" 	name="detail[A03_009][data_val][]" size="4" value="<?php echo $A03_009['data_val2']; ?>">
    	<input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Klas IV" 	name="detail[A03_009][data_val][]" size="4" value="<?php echo $A03_009['data_val3']; ?>">
    </td>
  	</tr>

  <tr>
    <td>4.</td>
    <td> Penyuluhan PHBS Institusi Sarana Kesehatan</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

   <tr>
    <td></td>
    <td> &nbsp;a). Frekuensi Penyuluhan</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_010][data_val][]" size="30" value="<?php echo $A03_010['data_val0']; ?>"></td>
  	</tr>

   <tr>
    <td></td>
    <td> &nbsp;b). Jumlah Institusi Sarana Kesehatan yang disuluh </td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_011][data_val][]" size="30" value="<?php echo $A03_011['data_val0']; ?>"></td>
  	</tr>

  
   <tr>
    <td></td>
    <td>  &nbsp;c). Jumlah Institusi Sarana Kesehatan yang telah melaksanakan PHBS/Sehat </td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_012][data_val][]" size="30" value="<?php echo $A03_012['data_val0']; ?>"></td>
  	</tr>
    
      <tr>
    <td>5.</td>
    <td> Penyuluhan PHBS Institusi Tempat-Tempat Umum</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
      </tr>

   <tr>
    <td></td>
    <td> &nbsp;a). Frekuensi Penyuluhan</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_013][data_val][]" size="30" value="<?php echo $A03_013['data_val0']; ?>"></td>
  	</tr>

   <tr>
    <td></td>
    <td>  &nbsp;b). Jumlah Institusi Sarana Tempat-tempat Umum yang disuluh</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_014][data_val][]" size="30" value="<?php echo $A03_014['data_val0']; ?>"></td>
  	</tr>

  
   <tr>
    <td></td>
    <td>   &nbsp;c) Jumlah SaranaTempat-tempat Umum yang telah melaksanakan PHBS/Sehat</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_015][data_val][]" size="30" value="<?php echo $A03_015['data_val0']; ?>"></td>
  	</tr>
    
    
      <tr>
    <td>6.</td>
    <td> Penyuluhan PHBS Institusi Tempat Kerja</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
      </tr>

   <tr>
    <td></td>
    <td> &nbsp;a). Frekuensi Penyuluhan</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_016][data_val][]" size="30" value="<?php echo $A03_016['data_val0']; ?>"></td>
  	</tr>

   <tr>
    <td></td>
    <td> &nbsp;b). Jumlah Institusi Sarana Tempat Kerja yang disuluh</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_017][data_val][]" size="30" value="<?php echo $A03_017['data_val0']; ?>"></td>
  	</tr>

  
   <tr>
    <td></td>
    <td>    &nbsp;c). Jumlah Institusi Tempat Kerja yang telah melaksanakan PHBS/Sehat</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_018][data_val][]" size="30" value="<?php echo $A03_018['data_val0']; ?>"></td>
  	</tr>
          <tr>
    <td>7.</td>
    <td> Penyuluhan PHBS pada kelompok masyarakat</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
        </tr>

   <tr>
    <td></td>
    <td> &nbsp;a). Frekuensi Penyuluhan</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_019][data_val][]" size="30" value="<?php echo $A03_019['data_val0']; ?>"></td>
  	</tr>

   <tr>
    <td></td>
    <td> &nbsp;b). Jumlah Kelompok masyarakat yang disuluh</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_020][data_val][]" size="30" value="<?php echo $A03_020['data_val0']; ?>"></td>
  	</tr>

  
   <tr>
    <td></td>
    <td> &nbsp;c). Jumlah Kelompok masyarakat  yang telah melaksanakan PHBS/Sehat</td>
    <td></td>
    <td>:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[A03_021][data_val][]" size="30" value="<?php echo $A03_021['data_val0']; ?>"></td>
  	</tr>
</table>