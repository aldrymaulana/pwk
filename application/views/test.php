
        

	<html>
		
		
		<script type="text/javascript" src="<?= base_url() ?>js/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
			tinyMCE.init({
			forced_root_block : 'p',
			mode : "textareas",
			//skin : "o2k7",
			 theme : "advanced",
			theme_advanced_toolbar_location : "top",
			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect,cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,undo,redo",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : ""
			});
		</script>
	      <!-- Start Page Header -->
      <div id="page-header">
        <h1>FORM SASARAN KEGIATAN</h1>
      </div>
      <!-- End Page Header --> 
      
     
        
       
              <div class="">
                <label>Id Sasaran Kegiatan : </label>
                <input name="id_sasaran_kegiatan" type="text" id="id_sasaran_kegiatan" value=""/>
				
              </div>
              <div class="">
                <label>Sasaran : </label>
				<textarea name="sasaran" style="width:70%"/>  </textarea>
				
              </div>
			  
              <div class="" align="">
                <input name="Simpan" type="submit" id="Simpan" value="Simpan" />
				<input name="Reset" type="reset" id="Reset" value="Reset" />
            </form>			
          </div>
        </div>
		
	</div>
        <!-- End Table --> 
        
      
        <!-- End Formatting --> 
</html>


