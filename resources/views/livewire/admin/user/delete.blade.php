<div wire:ignore.self id="deleteUserModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete it?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click.prevent="delete()" type="button" class="btn btn-primary">Delete User</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.addEventListener('deleteUserModal', () => {
            console.log('sampai sini lo');
            $('#deleteUserModal').modal('hide');
        });
    </script>
</div>
