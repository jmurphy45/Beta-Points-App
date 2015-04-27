<?php
	function gen_dropDown($name, $option){
		echo "<select name="$name">";
			if (option == "yes"){
				echo "<option selected>Yes</option>
          		<option>No</option>";
			}else{
				echo "          <option>Yes</option>
          <option selected>No</option>
  </select>";	
			}
	}

?>