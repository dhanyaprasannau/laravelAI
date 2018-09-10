
<?php echo View::make('layouts/header'); ?>

<div class="bg-main">
        <div class="quotes-bg-car img-product move-hover animated fadeInUp">
          <img src="img/car-blue.png" alt="car blue" width="776" height="395">
        </div>
      </div>
      <section class="section quotes-selection main-section animated zoomIn">
        <div class="container text-center">
          <div class="d-inline-block text-left">
            <h1 class="quotes-selection__title main-title">Analyse damage quotes</h1>

            <div class="quotes-selection__box">
		
              <form action="{{ url('upload-images') }}" method="POST" class="quotes-selection__form trans-all" id="quotes-selection__form">
              {{ csrf_field() }}
                <div class="row no-gutters vdivide">
                  <div class="col-md-6">
                    <select class="quotes-selection__list" name="food_selector" data-placeholder="Choose Make">
                      <option value="maruthi" selected>Maruthi</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="quotes-selection__list" name="food_selector" data-placeholder="Choose Model">
                      <option value="swift" selected>Swift</option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-round quotes-selection__submit">
                  <ion-icon src="img/svg/icon-arrow-lg.svg"></ion-icon>
                </button>
              </form>
            </div>
          </div>
        </div>
      </section>

<?php echo View::make('layouts/footer'); ?>