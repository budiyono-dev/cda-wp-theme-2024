jQuery(document).ready(function($) {
    console.log("ready");
    $('#memberTable').DataTable({
        "order": [],
        "columnDefs": [
            { "orderable": false, "targets": [0, 4] } 
        ]
    });

    $('#formDeleteMember').submit(function(event) {
        event.preventDefault(); 

        if (confirm("Are you sure you want to delete this member?")) {
            event.target.submit()
        } else {
            alert("Delete action cancelled.");
        }
    });
});