<table width="" >
  <tr>
    <td width="12">1.</td>
    <td width="567">Pekerja sakit yang dilayani</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[K09_001][data_val][]" size="30" value="<?php echo $K09_001['data_val0']; ?>"></td>
  </tr>
  <tr>
    <td width="12">2.</td>
    <td width="567">Kasus penyakit umum pada pekerja</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[K09_002][data_val][]" size="30" value="<?php echo $K09_002['data_val0']; ?>"></td>
  </tr>
  <tr>
    <td width="12">3.</td>
    <td width="567">10 Besar Penyakit Terbanyak</td>
    <td width="12"></td>
    <td width="17"></td>
    <td width="430"></td>
  </tr>
  <?php 
  $no         = 1;
  $start_key  = 3;
  for($no == 0; $no <= 10;){ 
    $keys     = 'K09_'.str_pad($start_key++, 3,"0",STR_PAD_LEFT); 
    $value    = ${$keys}['data_val0'];
  ?>
   <tr>
    <td width="12"></td>
    <td width="567"> <?php echo str_pad($no, 2,"0",STR_PAD_LEFT); ?>)&nbsp;&nbsp;&nbsp;&nbsp;
      <select name='selection[<?php echo $keys; ?>]' <?=$dis;?> >
        <option value=""> --- Pilih satu ---</option>
        <?php 
          foreach($dlist['DIS'] as $list => $vals){
            $selected   = ($vals->set_id == $selection[$keys] || !empty($data_id) && $vals->set_id == ${$keys}['data_key0']) ? 'selected="selected"' : ''; 
            echo '<option value="'.$vals->set_id.'" '.$selected.'>'.$vals->set_value.'</option>';
          }
        ?>
      </select>
    </td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[<?php echo $keys; ?>][data_val][]" size="30" value="<?php echo $value; ?>"></td>
  </tr>
  <?php  $no++;} ?>
  <tr>
    <td width="12">4.</td>
    <td width="567">Kasus diduga penyakit akibat kerja pada pekerja</td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[K09_013][data_val][]" size="30" value="<?php echo $K09_013['data_val0']; ?>"></td>
  </tr>
  <tr>
    <td width="12">5.</td>
    <td width="567">Kasus penyakit akibat kerja pada pekerja </td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[K09_014][data_val][]" size="30" value="<?php echo $K09_014['data_val0']; ?>"></td>
  </tr>
  <tr>
    <td width="12">6.</td>
    <td width="567">Kasus kecelakaan akibat kerja pada pekerja </td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[K09_015][data_val][]" size="30" value="<?php echo $K09_015['data_val0']; ?>"></td>
  </tr>
  <tr>
    <td width="12">7.</td>
    <td width="567">Pos UKK berfungsi baik </td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[K09_016][data_val][]" size="30" value="<?php echo $K09_016['data_val0']; ?>"></td>
  </tr>
  <tr>
    <td width="12">8.</td>
    <td width="567">Pos UKK menuju SIMASKER (Simulasi Intervensi Menuju Norma Sehat dalam Bekerja) </td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[K09_017][data_val][]" size="30" value="<?php echo $K09_017['data_val0']; ?>"></td>
  </tr>
  <tr>
    <td width="12">9.</td>
    <td width="567">Pelayanan kesehatan oleh tenaga kesehatan pada pekerja di Pos UKK </td>
    <td width="12"></td>
    <td width="17">:</td>
    <td width="430"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[K09_018][data_val][]" size="30" value="<?php echo $K09_018['data_val0']; ?>"></td>
  </tr>
</table>