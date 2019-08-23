<?php
class Validation {
	
	public function check_name_length($object) {
		
		if (mb_strlen($object->file['original_filename']) > 150) {
			
			$object->set_error('File name is too long.');
			
		}

	}
}
