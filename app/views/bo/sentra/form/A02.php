<table width='' border='0' style='font-size:12px;'>
   <tr bgcolor="purple">
  <td rowspan="2" width="30"  style='color:white;'>&nbsp;No</td>
  <td rowspan="2" width="500" style='color:white;'><?php echo $title; ?></td>
  <td width="6">&nbsp;</td>
  <td colspan="2" width="13"  style='color:white;' height='25px'><center>Jumlah</center></td>
  </tr>
  <tr bgcolor="purple">
  <td width="6">&nbsp;</td>
  <td width="13"  style='color:white;' height='25px'><center>Tersedia</center></td>
  <td  style='color:white;'><center>Dibina</center></td>
  </tr>

   <tr>
    <td width="30">1.</td>
    <td width="500"> a). Jumlah Posyandu Pratama</td>
    <td width="6">:</td>
    <td width="13"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah yg ada" name="detail[A02_001][data_val][]" size="12" value="<?php echo $A02_001['data_val0']; ?>"/>
      </td>
    <td>
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah Binaan" name="detail[A02_001][data_val][]" size="12" value="<?php echo $A02_001['data_val1']; ?>"/></td>
    </tr>
    <tr>
    <td></td>
    <td> b). Jumlah Posyandu Madya</td>
    <td width="6">:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah yg ada" name="detail[A02_002][data_val][]" size="12" value="<?php echo $A02_002['data_val0']; ?>"/>
      </td>
    <td>
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah Binaan" name="detail[A02_002][data_val][]" size="12" value="<?php echo $A02_002['data_val1']; ?>"/></td>
  	</tr>
    <tr>
    <td></td>
    <td> c). Jumlah Posyandu Purnama</td>
    <td width="6">:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah yg ada" name="detail[A02_003][data_val][]" size="12" value="<?php echo $A02_003['data_val0']; ?>"/>
      </td>
    <td>
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah Binaan" name="detail[A02_003][data_val][]" size="12" value="<?php echo $A02_003['data_val1']; ?>"/></td>
  	</tr>
   <tr>
    <td></td>
    <td> d). Jumlah Posyandu Mandiri</td>
    <td width="6">:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah yg ada" name="detail[A02_004][data_val][]" size="12" value="<?php echo $A02_004['data_val0']; ?>"/>
      </td>
    <td>
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah Binaan" name="detail[A02_004][data_val][]" size="12" value="<?php echo $A02_004['data_val1']; ?>"/></td>
  	</tr>
  <tr>
    <td>2.</td>
    <td> Jumlah Kelompok TOGA (Taman Obat Keluarga) yang dibina</td>
    <td width="6">:</td>
    <td colspan='2'><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" placeholder="" name="detail[A02_005][data_val][]" size="30" value="<?php echo $A02_005['data_val0']; ?>"></td>
  </tr>
 <tr>
    <td>3.</td>
    <td> Jumlah Pondok Pesantren yang di bina</td>
    <td width="6">:</td>
    <td colspan='2'><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" placeholder="" name="detail[A02_006][data_val][]" size="30" value="<?php echo $A02_006['data_val0']; ?>"></td>
  </tr>
 <tr>
    <td>4.</td>
    <td> Jumlah Polindes yang dibina</td>
    <td width="6">:</td>
    <td colspan='2'><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" placeholder="" name="detail[A02_007][data_val][]" size="30" value="<?php echo $A02_007['data_val0']; ?>"></td>
  </tr>
<tr>
    <td>5.</td>
    <td>  Jumlah PPKS (Penggerak Pendidik Kelompok Sebaya) yang dibina</td>
    <td width="6">:</td>
    <td colspan='2'><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" placeholder="" name="detail[A02_008][data_val][]" size="30" value="<?php echo $A02_008['data_val0']; ?>"></td>
  </tr>
<tr>
    <td>6.</td>
    <td>  Jumlah POSKESDES yang dibina</td>
    <td width="6">:</td>
    <td colspan='2'><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" placeholder="" name="detail[A02_009][data_val][]" size="30" value="<?php echo $A02_009['data_val0']; ?>"></td>
  </tr>
  <tr>
    <td>7.</td>
    <td>  Jumlah Desa Siaga yang Ada</td>
    <td width="6">:</td>
    <td colspan='2'><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" placeholder="" name="detail[A02_010][data_val][]" size="30" value="<?php echo $A02_010['data_val0']; ?>" /></td>
  </tr>

  <tr>
    <td>8.</td>
    <td>  Jumlah Desa Siaga Aktif</td>
    <td width="6"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td></td>
    <td> a). Jumlah Desa Siaga Aktif Pratama</td>
    <td width="6">:</td>
    <td>
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah yg ada" name="detail[A02_011][data_val][]" size="12" value="<?php echo $A02_011['data_val0']; ?>"/>
     </td>
    <td> <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah Binaan" name="detail[A02_011][data_val][]" size="12" value="<?php echo $A02_011['data_val1']; ?>"/></td>
  	</tr>
       <tr>
    <td></td>
    <td> b). Jumlah Desa Siaga Aktif Madya</td>
    <td width="6">:</td>
    <td>
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah yg ada" name="detail[A02_012][data_val][]" size="12" value="<?php echo $A02_012['data_val0']; ?>"/>
     </td>
    <td> <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah Binaan" name="detail[A02_012][data_val][]" size="12" value="<?php echo $A02_012['data_val1']; ?>"/></td>
  	</tr>
    <tr>
    <td></td>
    <td> c). Jumlah Desa Siaga Aktif Purnama</td>
    <td width="6">:</td>
    <td> <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah yg ada" name="detail[A02_013][data_val][]" size="12" value="<?php echo $A02_013['data_val0']; ?>"/>
      </td>
    <td>
     <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah Binaan" name="detail[A02_013][data_val][]" size="12" value="<?php echo $A02_013['data_val1']; ?>"/></td>
  	</tr>
   <tr>
    <td></td>
    <td> d). Jumlah Desa Siaga Aktif Mandiri</td>
    <td width="6">:</td>
    <td><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah yg ada" name="detail[A02_014][data_val][]" size="12" value="<?php echo $A02_014['data_val0']; ?>"/>
     </td>
    <td>
       <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah Binaan" name="detail[A02_014][data_val][]" size="12" value="<?php echo $A02_014['data_val1']; ?>"/></td>
  	</tr>
</table>