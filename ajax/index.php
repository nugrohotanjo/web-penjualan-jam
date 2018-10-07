<script>
var string = "my string"; // What i want to pass to php

$(document).ready(function(){
	 $.ajax({
    type: 'post', // the method (could be GET btw)
    url: 'terima.php', // The file where my php code is
    data: {
        'test': string // all variables i want to pass. In this case, only one.
    },
    success: function(data) { // in case of success get the output, i named data
        alert(data); // do something with the output, like an alert
    }
	});
});

</script>

<?php 

	session_start();

	echo $_SESSION['tulisan'];
 ?>