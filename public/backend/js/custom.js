jQuery(document).ready(function () {

    $('#product_description').summernote();
    

    jQuery(document).on('click', '.catDelete', function (e) {
        e.preventDefault()
        var catid = jQuery(this).val();
        jQuery(".tempid").val(catid);

    });

    jQuery(document).on('click', '.deletecata', function (e) {
        e.preventDefault()
        var id = jQuery('.tempid').val();
        $.ajax({
          url:'deletecat/'+id,
          type:'GET',
          datatype:'JSON',
          success:function(result){
            jQuery('.deletemsg').append('<div class="alert alert-success">'+ result.data +'</div>');
            jQuery('#deletecat').modal('hide');
            jQuery('.deletemsg').fadeOut(5000);
            showdata();

          }
        });

    });

    jQuery(document).on('click', '.catEdit', function (e) {
        e.preventDefault()
        var catid = jQuery(this).val();
        jQuery(".editid").val(catid);
        

    });

    jQuery(document).on('click', '.catEdit', function (e) {
        e.preventDefault();
        var catid = jQuery('.editid').val();
        $.ajax({
            url: 'catedit/' + catid,
            type: 'GET',
            datatype: 'JSON',
            success: function (result) {
                if (result.data == 'Data Not Found') {
                    jQuery(".mssg").append('<div class="alert alert-success">' + result.data + '</div>');
                }
                else {
                    jQuery("#name").val(result.data.name);
                    jQuery("#des").val(result.data.des);
                    jQuery("#tag").val(result.data.tag);
                    jQuery("#category").val(result.data.status);
                }
            }

        });
    })

    
    jQuery(document).on('click', '.update', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
         var catid = jQuery('.editid').val();

        var name = jQuery("#name").val();
        var des = jQuery("#des").val();
        var tag = jQuery("#tag").val();
        var category = jQuery("#category").val();
        $.ajax({
            url: 'catupdate/'+catid,
            type: 'POST',
            data: {
                'name': name,
                'des': des,
                'tag': tag,
                'category': category

            },
            success: function (result) {
                if (result.data == 'Data Not Found') {
                    jQuery(".mssg").append('<div class="alert alert-success">' + result.data + '</div>');
                }
                else {
                    showdata();
                    jQuery(".msg").append('<div class="alert alert-success">' + result.data + '</div>');
                    jQuery("#editcategory").modal('hide');
                    jQuery("#editcategory").find('input').val('');
                    jQuery("#editcategory").find('textarea').val('');
                    jQuery(".msg").fadeOut(5000);
                }
            }

        });
    })

    showdata();
    function showdata() {
        $.ajax({
            url: 'showcategory',
            type: 'get',
            datatype: 'JSON',
            success: function (result) {
                jQuery("tbody").html('');
                var s1 = 1;
                $.each(result.data, function ($key, $item) {
                    jQuery(".tbody").append('/ <tr>\
                   <td>'+ s1 + '</td>\
                   <td>'+ $item.name + '</td>\
                   <td>'+ $item.des + '</td>\
                   <td>'+ $item.tag + '</td>\
                   <td>'+ $item.status + '</td>\
                   <td>\
                     <button data-target="#editcategory" data-toggle="modal" value="'+ $item.id + '" class="btn btn-info btn-sm catEdit"><i class="fa fa-edit"></i></button>\
                     <button data-target="#deletecat" data-toggle="modal" id="deletecate"  class="btn btn-danger btn-sm catDelete" value="'+ $item.id + '"><i class="fa fa-trash"></i></button>\
                   </td>\
                 </tr>');
                    s1++;
                });
            }
        });
    }

    jQuery('.addcategory').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var name = jQuery(".name").val();
        var des = jQuery(".des").val();
        var tag = jQuery(".tag").val();
        var status = jQuery(".status").val();

        $.ajax({
            url: 'catinsert',
            type: 'POST',
            datatype: 'JSON',
            data: {
                'name': name,
                'des': des,
                'tag': tag,
                'status': status
            },
            success: function (result) {
                if (result.success == 'failed') {
                    jQuery(".nameError").text(result.errors.name);
                    jQuery(".desError").text(result.errors.des);
                    jQuery(".tagError").text(result.errors.tag);
                    jQuery(".statusError").text(result.errors.status);
                }
                else {
                    showdata();
                    jQuery(".msg").append('<div class="alert alert-success">' + result.msg + '</div>');
                    jQuery("#addcategory").modal('hide');
                    jQuery("#addcategory").find('input').val('');
                    jQuery("#addcategory").find('textarea').val('');
                    jQuery(".msg").fadeOut(5000);

                }
            }


        })
    })
});