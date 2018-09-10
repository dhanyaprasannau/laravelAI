Dropzone.autoDiscover = false;
var i=1 ;
$('div#image_upload').dropzone ({
    addRemoveLinks: true,
    uploadMultiple: false,
    dictRemoveFile: "Remove",
    maxFilesize: 500,
    acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf,.doc,.docx",
    url: "/uploadImage",
    headers: {
        'X-CSRF-Token': $("meta[name='csrf-token']").attr("content")
    },
    init: function() {
        this.on("sending", function(file, xhr, formData){
            formData.append("_token", $("meta[name='csrf-token']").attr("content"));
            formData.append("claim_id", $('#claim_id').val());
            formData.append("image_id", i);

        }),
            this.on("uploadprogress", function(file, progress) {
                console.log("------progress------");
                $( "#fileUploadButton" ).remove();
            }),
            this.on("success", function(file, response){
                console.log("------success------");
               var response_text = $.parseJSON(response);
                if(response_text.error == 1){
                    alert(response_text.errormsg);
                }
                $( "#fileUploadButton" ).remove();

                if(i == 1){
                    $('#bg-before-upload').hide();
                    $('#bg-after-upload').fadeIn();
                    $('#analyseButton').removeClass('upload-img__btn-box');
                    $('#analyseButton').addClass('text-md-right');
                }


                i++;
                // $("#image_upload").append('<div id="fileUploadButton" class="dz-preview dz-processing dz-image-preview dz-success dz-complete add_image_preview"><div class="dz-image text-center"><i class="fa fa-plus fa-5x add_more_images"></i><p>Add More Files</p></div></div>');

            }),

            this.on("removedfile", function(file, xhr){
                console.log(file);
                // $.ajax({
                //     type: "POST",
                //     url: "/removeUploadedImages",
                //     data: { 
                //         file: file,
                //         access_token: $("meta[name='csrf-token']").attr("content") 
                //     },
                //     success: function(result) {
                //         alert('ok');
                //     },
                //     error: function(result) {
                //         alert('error');
                //     }
                // });

            }),
            this.on('error', function(file, response) {
                alert(response);
            });
    }
});

$(document).on('click','#fileUploadButton', function(){
    $('div#hr_document_upload').trigger('click');
});

$(document).on('click','#analyseButton', function(){
    $.ajax({
            type: "POST",
            url: "/api-test",
            data: { 
                file: 'jkk',
                _token: $("meta[name='csrf-token']").attr("content") 
            },
            success: function(result) {
                alert('ok');
                $('#imageUpload').submit();
            },
            error: function(result) {
                alert('error');
            }
        });
});