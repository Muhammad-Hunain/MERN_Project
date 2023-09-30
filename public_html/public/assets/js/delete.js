// delete row
$(document).on('click','.delete_row_',function () {
    
    const action_url = $(this).attr('data-url')
    const action_msg = $(this).attr('data-msg')

    $('#deleteModalForm').prop('action',action_url)
    $('#deleteModalFormMsg').text(action_msg)

    $('#deleteModal').modal('show')

})