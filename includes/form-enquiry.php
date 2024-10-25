


<div id="success_message" class="alert alert-success" style="display: none;"></div>
<form id="enquiry" class="p-4  bg-light">
    
    

    <div class="form-row">
        <!-- First Name -->
        <div class="form-group col-lg-6 mb-3">
            <input type="text" name="fname" placeholder="First Name" class="form-control form-control-lg" required>
        </div>

        <!-- Last Name -->
        <div class="form-group col-lg-6 mb-3">
            <input type="text" name="lname" placeholder="Last Name" class="form-control form-control-lg" required>
        </div>
    </div>

    <div class="form-row">
        <!-- Email -->
        <div class="form-group col-lg-6 mb-3">
            <input type="email" name="email" placeholder="Email Address" class="form-control form-control-lg" required>
        </div>

        <!-- Phone -->
        <div class="form-group col-lg-6 mb-3">
            <input type="tel" name="phone" placeholder="Phone Number" class="form-control form-control-lg" required>
        </div>
    </div>

    <!-- Enquiry Message -->
    <div class="form-group mb-4">
        <textarea name="enquiry" placeholder="Your enquiry..." class="form-control form-control-lg" rows="5" required></textarea>
    </div>

    <!-- Submit Button -->
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg btn-block">Send Your Enquiry</button>
    </div>
</form>

<script>
    (function($) {

        $('#enquiry').submit(function(event) {

            event.preventDefault();

            var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
            var form = $('#enquiry').serialize();
            var formdata = new FormData;

            formdata.append('action','enquiry');
            formdata.append('nonce', '<?php echo wp_create_nonce('ajax-nonce');?>');
            formdata.append('enquiry',form);
            

            $.ajax(endpoint, {
                type:'POST',
                data:formdata,
                processData: false,
                contentType: false,
                
                success: function(res){
                    $('#enquiry').fadeOut(200);
                    $('#success_message').text('Thanks for your enquiry').show();
                    $('#enquiry').trigger('reset');
                    $('#enquiry').fadeIn(500);
                },
                error: function(err){
                    alert(err.responseJSON.data)
                }
            })






        })
    })(jQuery)
</script>