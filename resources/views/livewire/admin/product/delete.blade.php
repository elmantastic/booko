<div wire:ignore.self id="deleteProductModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete it?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click.prevent="delete()" type="button" class="btn btn-primary">Delete Product</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.addEventListener('deleteModal', () => {
            console.log('sampai sini lo');
            $('#deleteProductModal').modal('hide');
        });
    </script>
</div>
