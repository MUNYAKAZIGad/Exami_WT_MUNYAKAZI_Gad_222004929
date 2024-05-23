<?php
   $guessnumber = $_POST['guess'];
   if($guessnumber!=10){
        echo "
        <script>
            alert('You Failed The Challenge! Try again.');
        </script> 
        ";
   } else{
        echo "
        <script>
        alert('Congratulation, you have guess the hidden Number!');
        </script> 
        ";
   }
?>