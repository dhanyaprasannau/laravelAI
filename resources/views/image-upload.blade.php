
<?php echo View::make('layouts/header'); ?>
    <div class="quotes-bg-car img-product animated fadeInUp">
        <img id="bg-before-upload" src="img/car-white.png" alt="car white" width="774" height="394">
        <img id="bg-after-upload" class="png-shadow" src="img/car-engine.png" alt="car white" width="275" height="290">
    </div>
    <div class="big-circle">
        <img class="move-hover" src="img/circle.png" alt="bg circle" width="341" height="582">
    </div>
    <section class="section main-section upload-img">
        <div class="container">
          <h1 class="upload-img__title main-title mb-60">Upload images</h1>
          <div class="row">
            <div class="col-lg-5 mb-30 animated fadeIn">
              <div class="upload-img__box">
              {{ Form::open(['url' => '/save-analyse-images', 'id' => 'imageUpload','name'=>'image-upload-form', 'role' => 'form', 'class' => 'form-horizontal']) }}
                 <div class="btn--file qoute-dtls__upload" id="image_upload" class="fallback dropzone" >
                    <div class="qoute-dtls__icon file-name fs-30">
                      <img class="icon mb-30" src="img/svg/icon-image.svg" alt="image thumb" width="62" height="50">
                      <input name="image" id="dropzone_image" class="hidden" type="file" accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png,.gif"  />
                        <div class="dz-message" data-dz-message>
                            <span>Drag file to upload</span>
                            <button type="button" onclick="javascript:void(0)" class="btn btn-primary btn-round upload-img__submit mt-30">
                                <ion-icon class="fs-20" src="img/svg/icon-plus.svg"></ion-icon>
                            </button>
                        </div>
                      <!-- <button type="submit" class="btn btn-primary btn-round upload-img__submit mt-30">
                        <ion-icon class="fs-20" src="img/svg/icon-plus.svg"></ion-icon>
                      </button> -->
                                </div>
                    <input type="hidden" name="claim_id" value="{{ $claim_id }}" id="claim_id">
                  </div>
                  {!! Form::hidden('empid', 'er') !!}
                  {{ Form::close() }}
              </div>
            </div>

            <div class="col-lg-3">
                <ul class="list-unstyled img-list" id="image-previews">
                    <li class="media">
                    <div class="img mr-3">
                        <img src="img/svg/icon-image-color.svg" alt="Uploaded image" width="40" height="40">
                    </div>
                    <div class="media-body">
                        <h5 class="mt-0">File name.jpg</h5>
                        <div class="progress">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-light icon-close ml-3" data-toggle="tooltip" data-placement="right" title="Remove">
                        <ion-icon name="close"></ion-icon>
                    </button>
                    </li>

                </ul>
            </div>
            <div class="col-11 w-100"></div>
            
            <div class="col-lg-11 btn-box upload-img__btn-box text-center" id="analyseButton">
              <button type="button" class="btn btn-lg btn-primary btn-analyse radius mt-30">
                <ion-icon class="mr-sm-3 fs-36 align-middle" src="img/svg/icon-analyse.svg"></ion-icon>
                ANALYSE</button>
            </div>
          </div>
        </div>
      </section>
  
    <!-- {{ Form::open(['url' => '', 'id' => 'imageUpload','name'=>'image-upload-form', 'role' => 'form', 'class' => 'form-horizontal']) }}
        
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
        {{ Form::close() }} -->
  
<script src="js/upload-image.js"></script>   
<?php echo View::make('layouts/footer'); ?>
