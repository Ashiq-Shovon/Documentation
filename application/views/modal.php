<script type="text/javascript">
    function showLargeModal(url, header) {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#large-modal .modal-body').html('loading...');
        jQuery('#large-modal .modal-title').html();
        // LOADING THE AJAX MODAL
        jQuery('#large-modal').modal('show', {
            backdrop: 'true'
        });

        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response) {
                jQuery('#large-modal .modal-body').html(response);
                jQuery('#large-modal .modal-title').html(header);
            }
        });
    }
</script>

<!-- (Large Modal)-->
<div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-labelledby="large-modal-area" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="large-modal-area"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>