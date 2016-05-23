<script>
  $(document).ready(function() {

  }
</script>
<table>   
  <tr>
    <td width="16">1.</td>
    <td width="500">Ibu nifas yang mendapat kapsul vitamin A </td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[C01_001][data_val][]" size="25" value="<?php echo $C01_001['data_val0']; ?>" /></td>
  </tr>
  <tr>
    <td width="16">2.</td>
    <td width="500"> Jumlah bayi 0-5 bulan yang ada di wilayah kerja pada BULAN INI (Sasaran)</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464">
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_002][data_val][]" size="5" value="<?php echo $C01_002['data_val0']; ?>" > 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_002][data_val][]" size="5" value="<?php echo $C01_002['data_val1']; ?>" > 
    </td>
  </tr>
 <tr>
    <td width="16">3.</td>
    <td width="500"> Jumlah bayi 6-11 bulan yang ada di wilayah kerja pada BULAN INI (Sasaran)</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_003][data_val][]" size="5" value="<?php echo $C01_003['data_val0']; ?>" > 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_003][data_val][]" size="5" value="<?php echo $C01_003['data_val1']; ?>" > 
    </td>
  </tr>
 <tr>
    <td width="16">4.</td>
    <td width="500"> Jumlah anak 12-23 bulan yang ada di wilayah kerja pada BULAN INI (Sasaran)</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_004][data_val][]" size="5" value="<?php echo $C01_004['data_val0']; ?>" > 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_004][data_val][]" size="5" value="<?php echo $C01_004['data_val1']; ?>" > 
    </td>
  </tr>
<tr>
    <td width="16">5.</td>
    <td width="500">  Jumlah anak 24-59 bulan yang ada di wilayah kerja pada BULAN INI (Sasaran)</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_005][data_val][]" size="5" value="<?php echo $C01_005['data_val0']; ?>" > 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_005][data_val][]" size="5" value="<?php echo $C01_005['data_val1']; ?>" >  
    </td>
  </tr>
<tr>
    <td width="16">6.</td>
    <td width="500">  Jumlah posyandu yang ada</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[C01_006][data_val][]" size="26" value="<?php echo $C01_006['data_val0']; ?>"></td>
  </tr>
  <tr>
    <td width="16">7.</td>
    <td width="500">  Jumlah posyandu yang melapor pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[C01_007][data_val][]" size="26" value="<?php echo $C01_007['data_val0']; ?>"/></td>
  </tr>
   <tr>
    <td width="16">8.</td>
    <td width="500"> Jumlah (S) anak 0-23 bulan dari posyandu yang melapor pada BULAN INI (Riil)</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_008][data_val][]" size="5" value="<?php echo $C01_008['data_val0']; ?>"/> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_008][data_val][]" size="5" value="<?php echo $C01_008['data_val1']; ?>"/> 
       </td>
  	</tr>
<tr>
    <td width="16">9.</td>
    <td width="500"> Jumlah anak (S) 24-59 bulan dari posyandu yang melapor pada BULAN INI (Riil)</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_009][data_val][]" size="5" value="<?php echo $C01_009['data_val0']; ?>" /> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_009][data_val][]" size="5" value="<?php echo $C01_009['data_val1']; ?>" /> 
       </td>
  	</tr>

       <tr>
    <td width="16">10.</td>
    <td width="500"> Jumlah (K) anak 0-23 bulan memiliki KMS dari posyandu yang melapor pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_011][data_val][]" size="5" value="<?php echo $C01_011['data_val0']; ?>"/> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_011][data_val][]" size="5" value="<?php echo $C01_011['data_val1']; ?>"/> 
    </td>
  	</tr>
    <tr>
    <td width="16">11.</td>
    <td width="500"> Jumlah anak  (K) 24-59 bulan memiliki KMS dari posyandu yang melapor pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_012][data_val][]" size="5" value="<?php echo $C01_012['data_val0']; ?>" /> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_012][data_val][]" size="5"  value="<?php echo $C01_012['data_val1']; ?>"/> 
       </td>
  	</tr>
   <tr>
    <td width="16">12.</td>
    <td width="500"> Jumlah (D) anak 0-23 bulan ditimbang pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_013][data_val][]" size="5" value="<?php echo $C01_013['data_val0']; ?>" /> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_013][data_val][]" size="5" value="<?php echo $C01_013['data_val1']; ?>"/> 
    </td>
  	</tr>
    <td width="16">13.</td>
    <td width="500">  Jumlah  (D) anak 24-59 bulan ditimbang pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_014][data_val][]" size="5" value="<?php echo $C01_014['data_val0']; ?>" > 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_014][data_val][]" size="5" value="<?php echo $C01_014['data_val1']; ?>"> 
    </td>
  </tr>
<tr>
    <td width="16">14.</td>
    <td width="500">  jumlah (O) anak 0-59 bulan yang ditimbang bulan ini TETAPI bulan lalu tidak datang</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_015][data_val][]" size="5" value="<?php echo $C01_015['data_val0']; ?>"> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_015][data_val][]" size="5" value="<?php echo $C01_015['data_val1']; ?>"> 
    </td>
  </tr>

<tr>
    <td width="16">15.</td>
    <td width="500">  Jumlah (B) anak 0-59 bulan yang baru ditimbang pada bulan ini</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_016][data_val][]" size="5" value="<?php echo $C01_016['data_val0']; ?>"> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_016][data_val][]" size="5" value="<?php echo $C01_016['data_val1']; ?>"> 
    </td>
  </tr>
  <tr>
    <td width="16">16.</td>
    <td width="500">  Jumlah (N) anak 0-59 bulan yang naik berat badannya pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_017][data_val][]" size="5" value="<?php echo $C01_017['data_val0']; ?>" /> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_017][data_val][]" size="5" value="<?php echo $C01_017['data_val1']; ?>"/> 
    </td>
  </tr>
   <tr>
    <td width="16">17.</td>
    <td width="500"> Jumlah (T) anak 0-59 bulan yang tidak naik berat badannya pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_018][data_val][]" size="5" value="<?php echo $C01_018['data_val0']; ?>"/> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_018][data_val][]" size="5" value="<?php echo $C01_018['data_val1']; ?>"/> 
    </td>
  	</tr>
       <tr>
    <td width="16">18.</td>
    <td width="500"> Jumlah (2T) anak 0-59 bulan yang dua kali tidak naik berat badannya pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_019][data_val][]" size="5" value="<?php echo $C01_019['data_val0']; ?>"/> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_019][data_val][]" size="5" value="<?php echo $C01_019['data_val1']; ?>"/> 
    </td>
  	</tr>
    <tr>
    <td width="16">19.</td>
    <td width="500"> Jumlah (BGM) anak 0-59 bulan yang berada di bawah garis merah pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_020][data_val][]" size="5" value="<?php echo $C01_020['data_val0']; ?>" /> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_020][data_val][]" size="5" value="<?php echo $C01_020['data_val1']; ?>" /> 
       </td>
  	</tr>
   <tr>
    <td width="16">20.</td>
    <td width="500"> Kasus gizi buruk BB/TB baru pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_021][data_val][]" size="5" value="<?php echo $C01_021['data_val0']; ?>"/> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_021][data_val][]" size="5" value="<?php echo $C01_021['data_val1']; ?>"/> 
    </td>
  	</tr>
       <tr>
    <td width="16">21.</td>
    <td width="500"> Kasus gizi buruk (&lt;-3 BB/TB) LAMA yang meninggal pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_022][data_val][]" size="5" value="<?php echo $C01_022['data_val0']; ?>" /> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_022][data_val][]" size="5" value="<?php echo $C01_022['data_val1']; ?>"/> 
    </td>
  	</tr>   <tr>
    <td width="16">22.</td>
    <td width="500"> Kasus gizi buruk (&lt;3 BB/TB) BARU yang meninggal pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_023][data_val][]" size="5" value="<?php echo $C01_023['data_val0']; ?>"/> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_023][data_val][]" size="5" value="<?php echo $C01_023['data_val1']; ?>" /> 
    </td>
  	</tr>   <tr>
    <td width="16">23.</td>
    <td width="500"> Kasus gizi buruk (&lt;-3 BB/TB) LAMA yang masih dirawat sampai pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_024][data_val][]" size="5" value="<?php echo $C01_024['data_val0']; ?>"/> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_024][data_val][]" size="5" value="<?php echo $C01_024['data_val1']; ?>"/> 
    </td>
  	</tr>   <tr>
    <td width="16">24.</td>
    <td width="500"> Kasus gizi buruk (&lt;-3 BB/TB) BARU yang masih dirawat pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_025][data_val][]" size="5" value="<?php echo $C01_025['data_val0']; ?>" /> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_025][data_val][]" size="5" value="<?php echo $C01_025['data_val1']; ?>"/> 
    </td>
  	</tr>   <tr>
    <td width="16">25.</td>
    <td width="1000"> Jumlah bayi kasus gizi kurang (KURUS: -3 BB/TB sampai &lt; -2 BB/TB) umur 0-59 bulan pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_026][data_val][]" size="5" value="<?php echo $C01_026['data_val0']; ?>" /> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_026][data_val][]" size="5" value="<?php echo $C01_026['data_val1']; ?>"/> 
    </td>
  	</tr>   <tr>
    <td width="16">26.</td>
    <td width="500"> Jumlah Ibu Hamil risiko Kurang Energi Kronis (KEK) dengan Lingkar Lengan Atas (LiLA) &lt; 23,5 cm pada BULAN ININakes ( KF1)</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[C01_027][data_val][]" size="28" value="<?php echo $C01_027['data_val0']; ?>"/></td>
  	</tr>   <tr>
    <td width="16">27.</td>
    <td width="500"> Jumlah Ibu Hamil risiko Kurang Energi Kronis (KEK) dengan Lingkar Lengan Atas (LiLA) &lt; 23,5 cm yang mendapat PMT pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[C01_028][data_val][]" size="28" value="<?php echo $C01_028['data_val0']; ?>"/></td>
  	</tr>   <tr>
    <td width="16">28.</td>
    <td width="500"> Jumlah Ibu Hamil Anemia pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[C01_029][data_val][]" size="28" value="<?php echo $C01_029['data_val0']; ?>" /></td>
  	</tr>   <tr>
    <td width="16">29.</td>
    <td width="500"> Kasus Gizi Buruk kumulatif yang meninggal sampai bulan ini</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_030][data_val][]" size="5" value="<?php echo $C01_030['data_val0']; ?>"/> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_030][data_val][]" size="5" value="<?php echo $C01_030['data_val1']; ?>"/> 
    </td>
  	</tr>   <tr>
    <td width="16">30.</td>
    <td width="500"> Jumlah (BGM) anak 0-23 bulan yang berada di bawah garis merah pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="L" name="detail[C01_031][data_val][]" size="5" value="<?php echo $C01_031['data_val0']; ?>"/> 
      <input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="P" name="detail[C01_031][data_val][]" size="5" value="<?php echo $C01_031['data_val1']; ?>"/> 
    </td>
  	</tr>   <tr>
    <td width="16">31.</td>
    <td width="500"> Jumlah ibu hamil mendapatkan 90 tablet Fe3 pada BULAN INI</td>
    <td width="1"></td>
    <td width="8">:</td>
    <td width="464"><input type="text" <?=$dis;?> class="input-sm" style='margin:3px;' onkeypress='this.value=ignoreSpaces(this.value); return NumOnly(event);' onkeyup='javascript:this.value = this.value.toUpperCase();' placeholder="Jumlah" name="detail[C01_032][data_val][]" size="28" value="<?php echo $C01_032['data_val0']; ?>" /></td>
  	</tr>
</table>