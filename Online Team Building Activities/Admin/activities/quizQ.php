<?php
   $one = $_POST['one'];
   $two = $_POST['two'];
   $three = $_POST['three'];
   $four = $_POST['four'];
   if($one =='kigali'){
      if($two =='30'){
        if($three =='yes'){
            if($four =='H.E Paul Kagame'){
                echo "Well Done, you are real skilled!";
            }
        }
      }
   } else{
    echo "<div style='font-size: 50px;'>Capital City of Rwanda is Kigali</div></br>";
    echo "<div style='font-size: 50px;'>Rwanda have 30 Districts</div></br>";
    echo "<div style='font-size: 50px;'>Yes, Rwanda located in Easter Africa</div></br>";
    echo "<div style='font-size: 50px;'>H.E Paul Kagame is current President of Rwanda</div></br>";
   }
?>