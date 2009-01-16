<tr class="odd noclick">    <td align="center">
<input type="text" title="Champ" class="textfield" value="" maxlength="64" size="10" name="field_name[]" id="field_0_1"/></td>
                        <td align="center"><select onchange="display_field_options(this.options[this.selectedIndex].value,0)" id="field_0_2" name="field_type[]">
                <option value="VARCHAR">VARCHAR</option>
                <option value="TINYINT">TINYINT</option>
                <option value="TEXT">TEXT</option>
                <option value="DATE">DATE</option>
                <option value="SMALLINT">SMALLINT</option>
                <option value="MEDIUMINT">MEDIUMINT</option>
                <option value="INT">INT</option>
                <option value="BIGINT">BIGINT</option>
                <option value="FLOAT">FLOAT</option>
                <option value="DOUBLE">DOUBLE</option>
                <option value="DECIMAL">DECIMAL</option>
                <option value="DATETIME">DATETIME</option>
                <option value="TIMESTAMP">TIMESTAMP</option>
                <option value="TIME">TIME</option>
                <option value="YEAR">YEAR</option>
                <option value="CHAR">CHAR</option>
                <option value="TINYBLOB">TINYBLOB</option>
                <option value="TINYTEXT">TINYTEXT</option>
                <option value="BLOB">BLOB</option>
                <option value="MEDIUMBLOB">MEDIUMBLOB</option>
                <option value="MEDIUMTEXT">MEDIUMTEXT</option>
                <option value="LONGBLOB">LONGBLOB</option>
                <option value="LONGTEXT">LONGTEXT</option>
                <option value="ENUM">ENUM</option>
                <option value="SET">SET</option>
                <option value="BOOL">BOOL</option>
                <option value="BINARY">BINARY</option>
                <option value="VARBINARY">VARBINARY</option>
    </select></td>
                        <td align="center">
<input type="text" class="textfield" value="" size="8" name="field_length[]" id="field_0_3"/>
</td>
                        <td align="center"><select id="field_0_4" name="field_collation[]" dir="ltr" xml:lang="en">
    <option value=""> </option>
    <optgroup title="ARMSCII-8 Armenian" label="armscii8">
        <option title="arménien, Binaire" value="armscii8_bin">armscii8_bin</option>
        <option title="arménien, insensible à la casse" value="armscii8_general_ci">armscii8_general_ci</option>
    </optgroup>
    <optgroup title="US ASCII" label="ascii">
        <option title="Europe de l'ouest (multilingue), Binaire" value="ascii_bin">ascii_bin</option>
        <option title="Europe de l'ouest (multilingue), insensible à la casse" value="ascii_general_ci">ascii_general_ci</option>
    </optgroup>
    <optgroup title="Big5 Traditional Chinese" label="big5">
        <option title="chinois traditionnel, Binaire" value="big5_bin">big5_bin</option>
        <option title="chinois traditionnel, insensible à la casse" value="big5_chinese_ci">big5_chinese_ci</option>
    </optgroup>
    <optgroup title="Binary pseudo charset" label="binary">
        <option title="Binaire" value="binary">binary</option>
    </optgroup>
    <optgroup title="Windows Central European" label="cp1250">
        <option title="Europe centrale (multilingue), Binaire" value="cp1250_bin">cp1250_bin</option>
        <option title="croate, insensible à la casse" value="cp1250_croatian_ci">cp1250_croatian_ci</option>
        <option title="tchèque, sensible à la casse" value="cp1250_czech_cs">cp1250_czech_cs</option>
        <option title="Europe centrale (multilingue), insensible à la casse" value="cp1250_general_ci">cp1250_general_ci</option>
    </optgroup>
    <optgroup title="Windows Cyrillic" label="cp1251">
        <option title="cyrillique (multilingue), Binaire" value="cp1251_bin">cp1251_bin</option>
        <option title="bulgare, insensible à la casse" value="cp1251_bulgarian_ci">cp1251_bulgarian_ci</option>
        <option title="cyrillique (multilingue), insensible à la casse" value="cp1251_general_ci">cp1251_general_ci</option>
        <option title="cyrillique (multilingue), sensible à la casse" value="cp1251_general_cs">cp1251_general_cs</option>
        <option title="ukrainien, insensible à la casse" value="cp1251_ukrainian_ci">cp1251_ukrainian_ci</option>
    </optgroup>
    <optgroup title="Windows Arabic" label="cp1256">
        <option title="arabe, Binaire" value="cp1256_bin">cp1256_bin</option>
        <option title="arabe, insensible à la casse" value="cp1256_general_ci">cp1256_general_ci</option>
    </optgroup>
    <optgroup title="Windows Baltic" label="cp1257">
        <option title="baltique (multilingue), Binaire" value="cp1257_bin">cp1257_bin</option>
        <option title="baltique (multilingue), insensible à la casse" value="cp1257_general_ci">cp1257_general_ci</option>
        <option title="lituanien, insensible à la casse" value="cp1257_lithuanian_ci">cp1257_lithuanian_ci</option>
    </optgroup>
    <optgroup title="DOS West European" label="cp850">
        <option title="Europe de l'ouest (multilingue), Binaire" value="cp850_bin">cp850_bin</option>
        <option title="Europe de l'ouest (multilingue), insensible à la casse" value="cp850_general_ci">cp850_general_ci</option>
    </optgroup>
    <optgroup title="DOS Central European" label="cp852">
        <option title="Europe centrale (multilingue), Binaire" value="cp852_bin">cp852_bin</option>
        <option title="Europe centrale (multilingue), insensible à la casse" value="cp852_general_ci">cp852_general_ci</option>
    </optgroup>
    <optgroup title="DOS Russian" label="cp866">
        <option title="russe, Binaire" value="cp866_bin">cp866_bin</option>
        <option title="russe, insensible à la casse" value="cp866_general_ci">cp866_general_ci</option>
    </optgroup>
    <optgroup title="SJIS for Windows Japanese" label="cp932">
        <option title="japonais, Binaire" value="cp932_bin">cp932_bin</option>
        <option title="japonais, insensible à la casse" value="cp932_japanese_ci">cp932_japanese_ci</option>
    </optgroup>
    <optgroup title="DEC West European" label="dec8">
        <option title="Europe de l'ouest (multilingue), Binaire" value="dec8_bin">dec8_bin</option>
        <option title="suédois, insensible à la casse" value="dec8_swedish_ci">dec8_swedish_ci</option>
    </optgroup>
    <optgroup title="UJIS for Windows Japanese" label="eucjpms">
        <option title="japonais, Binaire" value="eucjpms_bin">eucjpms_bin</option>
        <option title="japonais, insensible à la casse" value="eucjpms_japanese_ci">eucjpms_japanese_ci</option>
    </optgroup>
    <optgroup title="EUC-KR Korean" label="euckr">
        <option title="coréen, Binaire" value="euckr_bin">euckr_bin</option>
        <option title="coréen, insensible à la casse" value="euckr_korean_ci">euckr_korean_ci</option>
    </optgroup>
    <optgroup title="GB2312 Simplified Chinese" label="gb2312">
        <option title="chinois simplifié, Binaire" value="gb2312_bin">gb2312_bin</option>
        <option title="chinois simplifié, insensible à la casse" value="gb2312_chinese_ci">gb2312_chinese_ci</option>
    </optgroup>
    <optgroup title="GBK Simplified Chinese" label="gbk">
        <option title="chinois simplifié, Binaire" value="gbk_bin">gbk_bin</option>
        <option title="chinois simplifié, insensible à la casse" value="gbk_chinese_ci">gbk_chinese_ci</option>
    </optgroup>
    <optgroup title="GEOSTD8 Georgian" label="geostd8">
        <option title="géorgien, Binaire" value="geostd8_bin">geostd8_bin</option>
        <option title="géorgien, insensible à la casse" value="geostd8_general_ci">geostd8_general_ci</option>
    </optgroup>
    <optgroup title="ISO 8859-7 Greek" label="greek">
        <option title="grec, Binaire" value="greek_bin">greek_bin</option>
        <option title="grec, insensible à la casse" value="greek_general_ci">greek_general_ci</option>
    </optgroup>
    <optgroup title="ISO 8859-8 Hebrew" label="hebrew">
        <option title="hébreu, Binaire" value="hebrew_bin">hebrew_bin</option>
        <option title="hébreu, insensible à la casse" value="hebrew_general_ci">hebrew_general_ci</option>
    </optgroup>
    <optgroup title="HP West European" label="hp8">
        <option title="Europe de l'ouest (multilingue), Binaire" value="hp8_bin">hp8_bin</option>
        <option title="anglais, insensible à la casse" value="hp8_english_ci">hp8_english_ci</option>
    </optgroup>
    <optgroup title="DOS Kamenicky Czech-Slovak" label="keybcs2">
        <option title="tchèque-slovaque, Binaire" value="keybcs2_bin">keybcs2_bin</option>
        <option title="tchèque-slovaque, insensible à la casse" value="keybcs2_general_ci">keybcs2_general_ci</option>
    </optgroup>
    <optgroup title="KOI8-R Relcom Russian" label="koi8r">
        <option title="russe, Binaire" value="koi8r_bin">koi8r_bin</option>
        <option title="russe, insensible à la casse" value="koi8r_general_ci">koi8r_general_ci</option>
    </optgroup>
    <optgroup title="KOI8-U Ukrainian" label="koi8u">
        <option title="ukrainien, Binaire" value="koi8u_bin">koi8u_bin</option>
        <option title="ukrainien, insensible à la casse" value="koi8u_general_ci">koi8u_general_ci</option>
    </optgroup>
    <optgroup title="cp1252 West European" label="latin1">
        <option title="Europe de l'ouest (multilingue), Binaire" value="latin1_bin">latin1_bin</option>
        <option title="danois, insensible à la casse" value="latin1_danish_ci">latin1_danish_ci</option>
        <option title="Europe de l'ouest (multilingue), insensible à la casse" value="latin1_general_ci">latin1_general_ci</option>
        <option title="Europe de l'ouest (multilingue), sensible à la casse" value="latin1_general_cs">latin1_general_cs</option>
        <option title="allemand (dictionnaire), insensible à la casse" value="latin1_german1_ci">latin1_german1_ci</option>
        <option title="allemand (annuaire téléphonique), insensible à la casse" value="latin1_german2_ci">latin1_german2_ci</option>
        <option title="espagnol, insensible à la casse" value="latin1_spanish_ci">latin1_spanish_ci</option>
        <option title="suédois, insensible à la casse" value="latin1_swedish_ci">latin1_swedish_ci</option>
    </optgroup>
    <optgroup title="ISO 8859-2 Central European" label="latin2">
        <option title="Europe centrale (multilingue), Binaire" value="latin2_bin">latin2_bin</option>
        <option title="croate, insensible à la casse" value="latin2_croatian_ci">latin2_croatian_ci</option>
        <option title="tchèque, sensible à la casse" value="latin2_czech_cs">latin2_czech_cs</option>
        <option title="Europe centrale (multilingue), insensible à la casse" value="latin2_general_ci">latin2_general_ci</option>
        <option title="hongrois, insensible à la casse" value="latin2_hungarian_ci">latin2_hungarian_ci</option>
    </optgroup>
    <optgroup title="ISO 8859-9 Turkish" label="latin5">
        <option title="turc, Binaire" value="latin5_bin">latin5_bin</option>
        <option title="turc, insensible à la casse" value="latin5_turkish_ci">latin5_turkish_ci</option>
    </optgroup>
    <optgroup title="ISO 8859-13 Baltic" label="latin7">
        <option title="baltique (multilingue), Binaire" value="latin7_bin">latin7_bin</option>
        <option title="estonien, sensible à la casse" value="latin7_estonian_cs">latin7_estonian_cs</option>
        <option title="baltique (multilingue), insensible à la casse" value="latin7_general_ci">latin7_general_ci</option>
        <option title="baltique (multilingue), sensible à la casse" value="latin7_general_cs">latin7_general_cs</option>
    </optgroup>
    <optgroup title="Mac Central European" label="macce">
        <option title="Europe centrale (multilingue), Binaire" value="macce_bin">macce_bin</option>
        <option title="Europe centrale (multilingue), insensible à la casse" value="macce_general_ci">macce_general_ci</option>
    </optgroup>
    <optgroup title="Mac West European" label="macroman">
        <option title="Europe de l'ouest (multilingue), Binaire" value="macroman_bin">macroman_bin</option>
        <option title="Europe de l'ouest (multilingue), insensible à la casse" value="macroman_general_ci">macroman_general_ci</option>
    </optgroup>
    <optgroup title="Shift-JIS Japanese" label="sjis">
        <option title="japonais, Binaire" value="sjis_bin">sjis_bin</option>
        <option title="japonais, insensible à la casse" value="sjis_japanese_ci">sjis_japanese_ci</option>
    </optgroup>
    <optgroup title="7bit Swedish" label="swe7">
        <option title="suédois, Binaire" value="swe7_bin">swe7_bin</option>
        <option title="suédois, insensible à la casse" value="swe7_swedish_ci">swe7_swedish_ci</option>
    </optgroup>
    <optgroup title="TIS620 Thai" label="tis620">
        <option title="thaï, Binaire" value="tis620_bin">tis620_bin</option>
        <option title="thaï, insensible à la casse" value="tis620_thai_ci">tis620_thai_ci</option>
    </optgroup>
    <optgroup title="UCS-2 Unicode" label="ucs2">
        <option title="Unicode (multilingue), Binaire" value="ucs2_bin">ucs2_bin</option>
        <option title="tchèque, insensible à la casse" value="ucs2_czech_ci">ucs2_czech_ci</option>
        <option title="danois, insensible à la casse" value="ucs2_danish_ci">ucs2_danish_ci</option>
        <option title="Espéranto, insensible à la casse" value="ucs2_esperanto_ci">ucs2_esperanto_ci</option>
        <option title="estonien, insensible à la casse" value="ucs2_estonian_ci">ucs2_estonian_ci</option>
        <option title="Unicode (multilingue), insensible à la casse" value="ucs2_general_ci">ucs2_general_ci</option>
        <option title="hongrois, insensible à la casse" value="ucs2_hungarian_ci">ucs2_hungarian_ci</option>
        <option title="islandais, insensible à la casse" value="ucs2_icelandic_ci">ucs2_icelandic_ci</option>
        <option title="letton, insensible à la casse" value="ucs2_latvian_ci">ucs2_latvian_ci</option>
        <option title="lituanien, insensible à la casse" value="ucs2_lithuanian_ci">ucs2_lithuanian_ci</option>
        <option title="perse, insensible à la casse" value="ucs2_persian_ci">ucs2_persian_ci</option>
        <option title="polonais, insensible à la casse" value="ucs2_polish_ci">ucs2_polish_ci</option>
        <option title="Europe de l'ouest, insensible à la casse" value="ucs2_roman_ci">ucs2_roman_ci</option>
        <option title="roumain, insensible à la casse" value="ucs2_romanian_ci">ucs2_romanian_ci</option>
        <option title="slovaque, insensible à la casse" value="ucs2_slovak_ci">ucs2_slovak_ci</option>
        <option title="slovène, insensible à la casse" value="ucs2_slovenian_ci">ucs2_slovenian_ci</option>
        <option title="espagnol traditionnel, insensible à la casse" value="ucs2_spanish2_ci">ucs2_spanish2_ci</option>
        <option title="espagnol, insensible à la casse" value="ucs2_spanish_ci">ucs2_spanish_ci</option>
        <option title="suédois, insensible à la casse" value="ucs2_swedish_ci">ucs2_swedish_ci</option>
        <option title="turc, insensible à la casse" value="ucs2_turkish_ci">ucs2_turkish_ci</option>
        <option title="Unicode (multilingue), insensible à la casse" value="ucs2_unicode_ci">ucs2_unicode_ci</option>
    </optgroup>
    <optgroup title="EUC-JP Japanese" label="ujis">
        <option title="japonais, Binaire" value="ujis_bin">ujis_bin</option>
        <option title="japonais, insensible à la casse" value="ujis_japanese_ci">ujis_japanese_ci</option>
    </optgroup>
    <optgroup title="UTF-8 Unicode" label="utf8">
        <option title="Unicode (multilingue), Binaire" value="utf8_bin">utf8_bin</option>
        <option title="tchèque, insensible à la casse" value="utf8_czech_ci">utf8_czech_ci</option>
        <option title="danois, insensible à la casse" value="utf8_danish_ci">utf8_danish_ci</option>
        <option title="Espéranto, insensible à la casse" value="utf8_esperanto_ci">utf8_esperanto_ci</option>
        <option title="estonien, insensible à la casse" value="utf8_estonian_ci">utf8_estonian_ci</option>
        <option title="Unicode (multilingue), insensible à la casse" value="utf8_general_ci">utf8_general_ci</option>
        <option title="hongrois, insensible à la casse" value="utf8_hungarian_ci">utf8_hungarian_ci</option>
        <option title="islandais, insensible à la casse" value="utf8_icelandic_ci">utf8_icelandic_ci</option>
        <option title="letton, insensible à la casse" value="utf8_latvian_ci">utf8_latvian_ci</option>
        <option title="lituanien, insensible à la casse" value="utf8_lithuanian_ci">utf8_lithuanian_ci</option>
        <option title="perse, insensible à la casse" value="utf8_persian_ci">utf8_persian_ci</option>
        <option title="polonais, insensible à la casse" value="utf8_polish_ci">utf8_polish_ci</option>
        <option title="Europe de l'ouest, insensible à la casse" value="utf8_roman_ci">utf8_roman_ci</option>
        <option title="roumain, insensible à la casse" value="utf8_romanian_ci">utf8_romanian_ci</option>
        <option title="slovaque, insensible à la casse" value="utf8_slovak_ci">utf8_slovak_ci</option>
        <option title="slovène, insensible à la casse" value="utf8_slovenian_ci">utf8_slovenian_ci</option>
        <option title="espagnol traditionnel, insensible à la casse" value="utf8_spanish2_ci">utf8_spanish2_ci</option>
        <option title="espagnol, insensible à la casse" value="utf8_spanish_ci">utf8_spanish_ci</option>
        <option title="suédois, insensible à la casse" value="utf8_swedish_ci">utf8_swedish_ci</option>
        <option title="turc, insensible à la casse" value="utf8_turkish_ci">utf8_turkish_ci</option>
        <option title="Unicode (multilingue), insensible à la casse" value="utf8_unicode_ci">utf8_unicode_ci</option>
    </optgroup>
</select>
</td>
                        <td align="center"><select id="field_0_5" name="field_attribute[]" style="font-size: 70%;">
                <option selected="selected" value=""/>
                <option value="UNSIGNED">UNSIGNED</option>
                <option value="UNSIGNED ZEROFILL">UNSIGNED ZEROFILL</option>
                <option value="ON UPDATE CURRENT_TIMESTAMP">ON UPDATE CURRENT_TIMESTAMP</option>
</select></td>
                        <td align="center"><select id="field_0_6" name="field_null[]">
    <option selected="selected" value="NOT NULL">not null</option>
    <option value="">null</option>

</select></td>
                        <td align="center">
<input type="text" class="textfield" value="" size="12" name="field_default[]" id="field_0_7"/><br/><div style="white-space: nowrap; display: none;" id="div_0_7"><input type="checkbox" name="field_default_current_timestamp[0]" id="field_0_7a"/><label style="font-size: 70%;" for="field_0_7a">CURRENT_TIMESTAMP</label></div></td>
                        <td align="center"><select id="field_0_8" name="field_extra[]">
<option value=""> </option>
<option value="AUTO_INCREMENT">auto_increment</option>

</select></td>
                        <td align="center">
<input type="radio" title="Primaire" value="primary_0" name="field_key_0"/></td>
                        <td align="center">
<input type="radio" title="Index" value="index_0" name="field_key_0"/></td>
                        <td align="center">
<input type="radio" title="Unique" value="unique_0" name="field_key_0"/></td>
                        <td align="center">
<input type="radio" title="---" checked="checked" value="none_0" name="field_key_0"/></td>
                        <td align="center"><input type="checkbox" title="Texte entier" value="0" name="field_fulltext[]"/></td>
                        <td align="center"><input type="text" class="textfield" value="" size="12" name="field_comments[]" id="field_0_14"/></td>
                    </tr>