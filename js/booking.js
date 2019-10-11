
$(document).ready(function(){
    var parentLii = '';
    $('.item_qty').on('keyup',function(){
        parentLii = $('.idclone').find(this).parent().parent().parent().prop('className');
    });

    if(parentLii == ''){
      parentLii = 'tr_clone';
    }

    var incre = 0;    
    $('.booking-form-table-body').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      
      if(keycode == '13'){

        var clone = '';
        if(parentLii == 'tr_clone'){
            clone = $('.idclone .'+parentLii+':last').clone(true).append('<div class="btn remove_class"><i class="fa fa-minus-circle" style="font-size:20px"></i></div>');
        } else {
          clone = $('.idclone .'+parentLii+':last').clone(true);             
        }      

        clone.addClass('tr_clone_'+incre).removeClass(parentLii).appendTo(".idclone");

        incre++;

        return false;
      }
    });


    var incre = 0;
    $("#add").on('click',function(e) {
      e.preventDefault();          

        var clone = '';
        if(parentLii == 'tr_clone'){
            clone = $('.idclone .'+parentLii+':last').clone(true).append('<div class="btn remove_class"><i class="fa fa-minus-circle" style="font-size:20px"></i></div>');                

          }else{

            clone = $('.idclone .'+parentLii+':last').clone(true);             
          }      

          clone.addClass('tr_clone_'+incre).removeClass(parentLii).appendTo(".idclone");
          var itmelmvl = $(".tr_clone_"+incre+" .item_code").val();
          $(".tr_clone_"+incre+" .item_code").removeAttr('id');
          $(".tr_clone_"+incre+" .item_code").parents('.easy-autocomplete').remove();
          $(".tr_clone_"+incre+" .easy-autocomplete-container").remove();
          $(".tr_clone_"+incre+" .item_code").attr('id', 'item_codemxp_'+incre);
          $(".tr_clone_"+incre+" .item_code").attr('data-parent', 'tr_clone_'+incre);
          var itmelm = '<input class="booking_item_code item_code easyitemautocomplete" data-parent="tr_clone_'+incre+'" value="'+itmelmvl+'" type="text" name="item_code[]"  id="item_codemxp_'+incre+'">';
          $(".tr_clone_"+incre+" .item_codemxp_parent").append(itmelm);

          incre++;

      return false;
    });

    $("#order_copy").on('click',function(e) {
      e.preventDefault();
        $(".easy-autocomplete-container").remove();
        var copyitemoption = {
          url: function(phrase) {
            return baseURL+"/get/itemcode";
          },
          getValue: function(element) {
            return element.name;
          },
          list: {
              match: {
                  enabled: true
              },
          },
          ajaxSettings: {
            dataType: "json",
            method: "GET",
            data: {
              dataType: "json"
            }
          },
          requestDelay: 400
        };

        var clone = '';
        if(parentLii == 'tr_clone'){
            clone = $('.idclone .'+parentLii+':last').clone(true).append('<div class="btn"><i class="fa fa-minus-circle" style="font-size:20px"></i></div>');                
          }else{
            clone = $('.idclone .'+parentLii+':last').clone(true);             
          }      
          clone.addClass('tr_clone_'+incre).removeClass(parentLii).appendTo(".idclone");
          var itmelmvl = $(".tr_clone_"+incre+" .item_code").val();
          $(".tr_clone_"+incre+" .item_code").removeAttr('id');
          $(".tr_clone_"+incre+" .item_code").parents('.easy-autocomplete').remove();
          $(".tr_clone_"+incre+" .easy-autocomplete-container").remove();
          $(".tr_clone_"+incre+" .item_code").attr('id', 'item_codemxp_'+incre);
          $(".tr_clone_"+incre+" .item_code").attr('data-parent', 'tr_clone_'+incre);
          var itmelm = '<input class="booking_item_code item_code easyitemautocomplete" data-parent="tr_clone_'+incre+'" value="'+itmelmvl+'" type="text" name="item_code[]"  id="item_codemxp_'+incre+'">';
          $(".tr_clone_"+incre+" .item_codemxp_parent").append(itmelm);
          $(".tr_clone_"+incre+" .booking_item_code").val('');
          $(".tr_clone_"+incre+" .item_sku").val('');
          $(".tr_clone_"+incre+" .item_qty").val('');
          $(".tr_clone_"+incre+" .item_price").val('');          
          $(".tr_clone_"+incre+" .erpNo").val('');
          $(".tr_clone_"+incre+" .itemGmtsColor").find("option").remove();
          $(".tr_clone_"+incre+" .itemSize").find("option").remove();
          $('#item_codemxp_'+incre).easyAutocomplete(copyitemoption);
          incre++;

      return false;
    });

    $('.idclone').on('click', '.btn', function () {
      $(this).closest('tr').remove();
    });

});
