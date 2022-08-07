<?php  
     $zip = new ZipArchive;  
     $res = $zip->open('artisan.zip');  
     if ($res === TRUE) {  
         $zip->extractTo('dest/');  
         $zip->close();  
         echo 'ok';  
     } else {  
         echo 'failed';  
     }  
?>