$( document ).ready(function() {
     
    // delete counter
    $('a.delete').click(function(e) {
        
        e.preventDefault();
        if (confirm('Delete this Sample?')) {
            Craft.postActionRequest('sample/delete', {'id': $(this).data('id')});
            $(this).closest('tr').slideUp();
            Craft.cp.displayNotice('Sample Deleted');
        }       

    });
});