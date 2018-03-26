    $(document).ready( function () {
    $('#table_id').DataTable();
    } );


    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        if($("#menu-toggl").text() == 'arrow_back'){
            $("#menu-toggl").text('arrow_forward');
        }else{
            $("#menu-toggl").text('arrow_back');
        }
    });

    jQuery('input[type=file]').change(function(e){
     var filename =  e.currentTarget;
     alert(filename);
     $("#file").text(filename.name);



    });