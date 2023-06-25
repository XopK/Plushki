<?php
$con = mysqli_connect("localhost", "root", "", "plushki");
?>
<script>
    function removeBlock() {
        var block = document.getElementById("block-to-remove");
        block.parentNode.removeChild(block);
    }
</script>