    <div class="footer">
        <div class="container-fluid">
            <div class="d-block d-sm-flex justify-content-end">
                <p>Copyright © <?php echo date('Y'); ?> Jelajah Putri</p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/cms/datatables/datatables.min.js"></script>
	<script>
    $(document).ready(function() {
        $('#myDataTables').DataTable({
                responsive: true
        });
    });
    </script>
    </body>
</html>