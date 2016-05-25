      <strong></br>
          A.PELAYANAN RAWAT JALAN</br>
          10 PENYAKIT TERBANYAK RAWAT JALAN DI PUSKESMAS (BPJS)</br>
      </strong></div>
      <table width="72%" border="0" cellpadding="2" cellspacing="0">
        <tr>
          <td width="44" rowspan="2" bgcolor="purple" style='padding:3px; color:white;'>No</td>
          <td width="423" rowspan="2" bgcolor="purple" style='padding:3px; color:white;'>Penyakit</td>
          <td width="70" rowspan="2" bgcolor="purple" style='padding:3px; color:white;'>Kode ICD</td>
          <td colspan="2" bgcolor="purple" class='center' style='padding:3px; color:white;'>Jml. Kasus Peserta BPJS</td>
        </tr>
        <tr>
          <td width="75" bgcolor="purple" class='center' style='padding:3px; color:white;'>Laki-Laki</td>
          <td width="75" bgcolor="purple" class='center' style='padding:3px; color:white;'>Perempuan</td>
        </tr>

        <?php 
        $no         = 1;
        $start_key  = 1;
        for($no == 0; $no <= 10;){ 
          $keys     = 'L02_'.str_pad($start_key++, 3,"0",STR_PAD_LEFT); 
          $value    = ${$keys}['data_val0'];
        ?>
         <tr>
          <td><?php echo $no; ?></td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;
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
          <td><input type="text" <?=$dis;?> class="input-sm" size='10' style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="" name="detail[<?php echo $keys; ?>][data_val][]" size="30" value="<?php echo $value; ?>"></td>
         <td><input type="text" <?=$dis;?> class="input-sm center" size='10' style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[<?php echo $keys; ?>][data_val][]" size="30" value="<?php echo $value; ?>"></td>
         <td><input type="text" <?=$dis;?> class="input-sm center" size='10' style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[<?php echo $keys; ?>][data_val][]" size="30" value="<?php echo $value; ?>"></td>
        </tr>
        <?php  $no++;} ?>

      </table>
      
      <strong></br>
        B.PELAYANAN RAWAT JALAN</br>
        10 PENYAKIT TERBANYAK RAWAT JALAN DI PUSKESMAS (KARTU SEHAT)
</br>
      </strong></div>
      <table width="72%" border="0" cellpadding="2" cellspacing="0">
        <tr>
          <td width="44" rowspan="2" bgcolor="purple" style='padding:3px; color:white;'>No</td>
          <td width="423" rowspan="2" bgcolor="purple" style='padding:3px; color:white;'>Penyakit</td>
          <td width="70" rowspan="2" bgcolor="purple" style='padding:3px; color:white;'>Kode ICD</td>
          <td colspan="2" bgcolor="purple" class='center' style='padding:3px; color:white;'>Jml. Kasus Peserta Kartu Sehat</td>
        </tr>
        <tr>
          <td width="75" bgcolor="purple" class='center' style='padding:3px; color:white;'>Laki-Laki</td>
          <td width="75" bgcolor="purple" class='center' style='padding:3px; color:white;'>Perempuan</td>
        </tr>
        <?php 
        $no         = 1;
        $start_key  = 11;
        for($no == 0; $no <= 10;){ 
          $keys     = 'L02_'.str_pad($start_key++, 3,"0",STR_PAD_LEFT); 
          $value    = ${$keys}['data_val0'];
        ?>
         <tr>
          <td><?php echo $no; ?></td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;
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
          <td><input type="text" <?=$dis;?> class="input-sm" size='10' style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="" name="detail[<?php echo $keys; ?>][data_val][]" size="30" value="<?php echo $value; ?>"></td>
         <td><input type="text" <?=$dis;?> class="input-sm center" size='10' style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[<?php echo $keys; ?>][data_val][]" size="30" value="<?php echo $value; ?>"></td>
         <td><input type="text" <?=$dis;?> class="input-sm center" size='10' style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[<?php echo $keys; ?>][data_val][]" size="30" value="<?php echo $value; ?>"></td>
        </tr>
        <?php  $no++;} ?>
      </table>
