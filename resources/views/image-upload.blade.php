
<?php echo View::make('layouts/header'); ?>

  
    {{ Form::open(['url' => '', 'id' => 'imageUpload','name'=>'image-upload-form', 'role' => 'form', 'class' => 'form-horizontal']) }}
        
        <div id="image_upload" class="fallback dropzone" >
            <input name="image" id="dropzone_image" class="hidden" type="file" accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png,.gif"  />
            <div class="dz-message" data-dz-message>
                <span>Drag & Drop files here to upload</span>
            </div>
        </div>
        <div id="image_preview">
                                                           
            <div class="d-flex"></div>
        </div>

        <input type="hidden" name="claim_id" value="{{ $claim_id }}" id="claim_id">
        <button style="margin-top:50px;padding:5px;margin-left:100px" type="submit">Analyse</button>
        {!! Form::hidden('empid', 'er') !!}
        {{ Form::close() }}
  
<script src="js/upload-image.js"></script>   
<?php echo View::make('layouts/footer'); ?>
