<?php
if (!defined('BASEPATH'))
    exit('no direct script allowed asshole!!');
$this->load->helper('html');
?>


<!-- JavaScript -->
<script type="text/javascript" src="<?= base_url() ?>js/wufoo.js"></script>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/form/form.css" media="screen, tv, projection" title="Default" />


<div id="container">
    <fieldset class="fieldset">
        <legend class="legend">

		|Tambah & Ubah foto dosen disini|</legend>

        <div id="contentform" style="border:solid thin #BBBBBB; height:350px; background-color:#F9F9F9; -moz-border-radius: 5px;  padding-top:10px; padding-bottom:0.3px; margin-right:100px; margin-left:100px;">

            <!-- Start value -->
            <?
            //Setting Value Jika Prosedur yang dilakukan adalah prosedur input biasa.
            $value = array(
                'id_foto' => "",
                'nama_dosen' => "",
                'email' => "",
                'bidang_ilmu' => "",
                'foto_dosen' => ""
            );

            //Setting Value pada form Jika melakukan prosedur Edit terhadap data tertentu.
            if ($status == "edit") {
                $value['id_foto'] = $id_foto;
                $value['nama_dosen'] = $nama_dosen;
                $value['email'] = $email;
                $value['bidang_ilmu'] = $bidang_ilmu;
                $value['foto_dosen'] = $foto_dosen;
            }//end if
            ?>
           
            <!-- End value -->

            <table width="847" border="0" bordercolor="#F0F0F0">
                <tr>
                    <td width="905" height="150">
                        <form id="form1" name="form1" method="post">
                            <div align="center">
                                <table width="850" border="0">
                                    <tr>
                                        <td width="80">Nama Dosen</td>
                                        <td width="208"><input name="nama_foto" type="text" size="50" value="<?= $value['nama_dosen'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td width="80">email</td>
                                        <td width="208"><input name="nama_dosen" type="text" size="50" value="<?= $value['email'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td width="80">Bidang Ilmu</td>
                                        <td width="208"><input name="bidang_minat" type="text" size="50" value="<?= $value['bidang_ilmu'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td width="80">Foto</td>
                                        <td width="208"><input name="foto_dosen" type="text" size="50" value="<?= $value['foto_dosen'] ?>"/></td>
                                    </tr>

                                    <tr>
                                        <td height="28">&nbsp;</td>
                                        <td>
                                            <div align="left">
                                                <input type="submit" name="Submit" value="Simpan" />
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                        <p align="center">&nbsp;</p></td></tr>
            </table>
        </div>
        <p>&nbsp;</p>
    </fieldset>
</div>
<p>
    <!--container-->
</p>
<p>&nbsp; </p>

