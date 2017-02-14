
$(document).ready(function(){
    $(".link-box-title").click(function(e){
        e.preventDefault();
        var f_main=$(this).attr("tabpop");
        var f_main_id=$("#"+f_main);
        if($(f_main_id).hasClass("extended")){
            $(f_main_id).removeClass("extended");
            $(f_main_id).find(".fa").removeClass("fa-minus");
            $(f_main_id).find(".fa").addClass("fa-plus");
        }
        else{
            $(".link-box[id!=f_main]").removeClass("extended");
            $(f_main_id).addClass("extended");
            $(f_main_id).find(".fa").removeClass("fa-plus");
            $(f_main_id).find(".fa").addClass("fa-minus");
        }

    });
});
