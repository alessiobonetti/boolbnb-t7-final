$(document).ready(function() {
    $(".btn-success").click(function(){
        var lsthmtl = $(".clone").html();
        $(".increment").after(lsthmtl);
    });
    $("body").on("click", ".btn_delete", function () {
        $(this).parents(".hdtuto").remove();
        //$(this).parents(".hdtuto control-group lst").remove();
    });
});

