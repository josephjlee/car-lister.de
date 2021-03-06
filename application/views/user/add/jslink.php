<script>

    var addFormInit = function () {
        $('#add_form').validate({
            // define validation rules
            rules: {
                //=== Client Information(step 3)
                //== Billing Information
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                passwort: {
                    required: true
                },
                confirm_password:{
                    required: true,
                    equalTo: "#passwort"
                },
                telefon: {
                    required: true,
                },
                adresse: {
                    required: true,
                },
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                swal("<?=_l('submit_error')?>");
            },

            submitHandler: function (form) {

                process_ajax('',
                    '<?=site_url('user/ajax_add_user')?>',
                    $(form).serializeArray(),
                    function (resp) {
                        showToast('success', 'toast-bottom-full-width', "<?=_l('success')?>");
                        setTimeout(function() {
                            window.location.href = "<?=base_url('user/index')?>";
                        }, 600);
                    },
                    function (resp) {
                        showToast('warning', 'toast-bottom-full-width', "<?=_l('failed')?>");
                    }
                );

                return false;
            }
        });
    }

    $(document).ready(function() {
        addFormInit();
    });
</script>