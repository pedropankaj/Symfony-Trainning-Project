$( document ).ready(function() {

    $('#smartshore_signupbundle_item_ItemColor').ColorPicker({

        onSubmit: function(hsb, hex, rgb, el) {
            $(el).val(hex);
            $(el).ColorPickerHide();

        },
        onBeforeShow: function () {
            $(this).ColorPickerSetColor(this.value);

        }
    })

        .bind('keyup', function(){
            $(this).ColorPickerSetColor(this.value);
        })

    $('.addnewlist').click(function(){
        var url = "/Smartshore/web/app_dev.php/lists/new";
        var ajaxdiv = "ajaxdiv";
        $.ajax({
            url:url,
            type: 'POST',
            cache: false,
            beforeSend: function () {
                $("#"+ajaxdiv).html("...");
                $('#'+ajaxdiv).show(200);
            },
            success: function (msg){
                $("#"+ajaxdiv).html(msg);
            }
        });
    })

    $('.addnewitem').click(function(){
        var dataval = $(this).attr('data-value');
        var url = "/Smartshore/web/app_dev.php/item/new/"+dataval;
        var ajaxdiv = "ajaxdiv";
        $.ajax({
            url:url,
            type: 'POST',
            cache: false,
            beforeSend: function () {
                $("#"+ajaxdiv).html("...");
                $('#'+ajaxdiv).show(200);
            },
            success: function (msg){
                $("#"+ajaxdiv).html(msg);


                $('#smartshore_signupbundle_item_ItemColor').ColorPicker({

                    onSubmit: function(hsb, hex, rgb, el) {
                        $(el).val(hex);
                        $(el).ColorPickerHide();

                    },
                    onBeforeShow: function () {
                        $(this).ColorPickerSetColor(this.value);

                    }
                })

                    .bind('keyup', function(){
                        $(this).ColorPickerSetColor(this.value);
                    })



            }
        });
    })

    $('.savebtn').live('click',function(){
        var ajxurl = $('body').find('form').attr('action');
        var ajaxdiv = $('body').find('#ajaxdiv');
        $.ajax({
            url:ajxurl,
            type: 'POST',
            data: $('form').serialize(),
            success:function(responses){
                $(ajaxdiv).hide(200);

            }
        });
    });
});