
	    
    </div><!--//app-wrapper-->    					

    <script src="<?=base_url();?>assets/plugins/jquery-3.4.1.min.js"></script>
    <!-- Javascript -->          
    <script src="<?=base_url();?>assets/plugins/popper.min.js"></script>
    <script src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://unpkg.com/jquery-tabletotal@1.0.0"></script> 
    <!-- Page Specific JS -->
    <script src="<?=base_url();?>assets/js/app.js"></script> 
    <script src="<?=base_url();?>assets/js/student/ExtraSubject_js.js?v=3"></script> 

    <script>
        $(document).ready(function() {
           
                calculateColumn(1);
               
        });

        function calculateColumn(index) {
            var total = 0;
            $('.ShowGrade tbody tr').each(function() {
                var value = parseInt($('td', this).eq(3).text());
                if (!isNaN(value)) {
                    total += value;
                }
            });
            $('.ShowGrade .tfoot th').eq(index).text('Total: ' + total);
        }
    </script>
</body>
</html> 
