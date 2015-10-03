var radioC=2;
var textRadio=2;
var data1;

$(document).ready(function(){

    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
    
    //var id=$('#eTypeLabel').parent().children('.input').attr('id');
    //$("#eTypeLabel").attr('for',$(this).parent().children('.input').attr('id'));

    $("select").change(function(e){
        $(this).children("option:selected").each(function(){
            if($(this).attr("value")=="choose"){
                $(this).parent().parent().parent().children(".box").slideUp(200);
                e.preventDefault();
            }
            if($(this).attr("value")=="textAr"){
                $(this).parent().parent().parent().children(".box").fadeOut(100);
                $(this).parent().parent().parent().children(".textAr").show('slide',{direction: 'up'},300);
                e.preventDefault();
            }
            if($(this).attr("value")=="buttonRadio"){
               $(this).parent().parent().parent().children(".box").fadeOut(100);
                $(this).parent().parent().parent().children(".buttonRadio").show('slide',{direction: 'up'},300);
                e.preventDefault();
            }
            if($(this).attr("value")=="buttonText"){
                $(this).parent().parent().parent().children(".box").fadeOut(100);
                $(this).parent().parent().parent().children(".buttonText").show('slide',{direction: 'up'},300);
                e.preventDefault();
            }
        });
    }).change();

    $(".add_radio").bind("click",function(e){
        e.preventDefault();
    	var data='<br><br><input type="text" name="radio[$count]" placeholder="Enter option" style="display:none;">'.replace('$count',radioC);
        $(data).appendTo($(this).parent().children('.input_area_radio')).fadeIn(300);
    	radioC+=1;    	
    });

    $(".add_textRadio").bind("click",function(e){
        e.preventDefault();
    	var data='<br><br><input type="text" name="radioText[$count]" placeholder="Enter option" style="display:none;">'.replace('$count',textRadio);
        $(data).appendTo($(this).parent().children('.input_area_textRadio')).fadeIn(300);
    	textRadio+=1;    	
    });

    $(".add_details").bind('click',function(){
        var temp;
        var data2;
        if(!data2){
            data2=$(".contentX").first().clone(true,true).css({"display":"none"});
            data2.find("input").val("");
            data2.find(".box").hide();
            data2.find(".input_area_radio").empty();
            data2.find(".input_area_textRadio").empty();
            temp='<input type="text" name="radio[1]" placeholder="Enter option">';
            data2.find('.input_area_radio').append(temp);
            temp='<input type="text" name="radioText[1]" placeholder="Enter option">';
            data2.find(".input_area_textRadio").append(temp);

        }
        var loc=$(this).parent().parent().children(".detailsX");
        $(data2).appendTo(loc).show('slide',{direction: 'up'},300);
        data2="";
    });

    $(".add_more_option").bind("click",function(e){
        //var data=$(".markup").clone(true,true);
        //$(data).appendTo(".form_data_field").fadeIn(300);
        //$(".markup").empty();
        if(!data1)
        {
            data1 = $(this).parent().children(".form_data_field").children(".entry_details").first().clone(true,true).css({"display":"none"});
            data1.find("input").val("");
            data1.find(".box").hide();
            data1.find(".detailsX").empty();
        }
        $(data1).clone(true,true).appendTo(".form_data_field").show('slide',{direction: 'up'},300);
    });
});