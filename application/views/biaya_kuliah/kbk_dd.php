<option value="" >Pilih Komponen Biaya</option>
<?php 
    if(isset($dd_kbk_m)) :
        foreach($dd_kbk_m as $key => $val) :
//            if (isset($idkbkselected) && $key==$idkbkselected){
//                echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$val</option>\n";
//            }
//            else {
//                echo "\t\t\t\t\t\t<option value='$key'>$val</option>\n";
//            }
            
            
            if (isset($idkbkselected)){
                if($key==$idkbkselected){
                    echo "\t\t\t\t\t\t<option selected='selected' value='$key'>$val</option>\n";
                }  else {
                    echo "\t\t\t\t\t\t<option disabled value='$key'>$val</option>\n";
                }
            }else {
                $a=FALSE;
                foreach ($records_bk as $bk) {
                    if($bk->IDKBK==$key){
                        $a=TRUE;
                    }
                }
                if($a){
                    echo "\t\t\t\t\t\t<option disabled=\"disabled\" value='$key'>$val</option>\n";
                }else{
                    echo "\t\t\t\t\t\t<option value='$key'>$val</option>\n";
                }
            }
        endforeach;
    else :
        echo "<h2>No records were returned.</h2>";
    endif;
?>