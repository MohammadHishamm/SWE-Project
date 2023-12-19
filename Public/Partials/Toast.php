


<?php if(isset($_SESSION['error_message'])){  ?>

    <div class="toast fade fixed-bottom shadow border border-3 me-5 mb-5 ms-auto " id="toast">
        <div class="toast-header ">
            <strong class="me-auto">Arab Data Hub</strong>
            <small>Notfication</small>
        </div>
        <div class="toast-body text-danger"><?= $_SESSION['error_message'] ?></div>
    </div>
    <script>
    showToast();
    </script>
    
<?php unset($_SESSION['error_message']); } ?>