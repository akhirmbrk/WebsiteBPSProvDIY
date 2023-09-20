    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>assets/js/core.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.min.js"></script>

    <script>
    	app.ready(function() {

    		$('button[name="copiesdi"]').click(function(event) {

    			var r = document.createRange();
    			r.selectNode(document.getElementById("okeee"));
    			window.getSelection().removeAllRanges();
    			window.getSelection().addRange(r);
    			document.execCommand('copy');
    			window.getSelection().removeAllRanges();



    		})



    	});
    </script>



    </body>

    </html>