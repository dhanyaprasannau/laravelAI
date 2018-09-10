<?php echo View::make('layouts/header'); ?>


      <div class="quotes-bg-car img-product animated fadeInUp">
        <img class="png-shadow" src="img/car-wheel.png" alt="car white" width="258" height="251">
      </div>
      <div class="big-circle">
        <img class="move-hover" src="img/circle.png" alt="bg circle" width="341" height="582">
      </div>
      <section class="section main-section product-details">
        <div class="container">
          <h1 class="upload-img__title product-title fs-28 mb-30">Damage analysis report for Suzuki swift dzire(XXX)</h1>
          <div class="row">
            <div class="col-sm-6">
              <div class="product-gallery bg-white">
                <figure class="img-box">
                  <img class="rounded" src="img/sample-product.jpg" alt="Product gallery" width="560" height="397">
                </figure>
                <div class="product-gallery__thumb d-flex">
                  <a class="active" href="javascript:void(0)">
                    <img class="rounded" src="img/demo-car.jpg" alt="Product gallery" width="85" height="60">
                  </a>
                  <a href="javascript:void(0)">
                    <img class="rounded" src="img/sample-product.jpg" alt="Product gallery" width="85" height="60">
                  </a>
                  <a href="javascript:void(0)">
                    <img class="rounded" src="img/demo-car.jpg" alt="Product gallery" width="85" height="60">
                  </a>
                  <a href="javascript:void(0)">
                    <img class="rounded" src="img/sample-product.jpg" alt="Product gallery" width="85" height="60">
                  </a>
                  <a href="javascript:void(0)">
                    <img class="rounded" src="img/demo-car.jpg" alt="Product gallery" width="85" height="60">
                  </a>
                  <div class="btn-box">
                    <button type="submit" class="btn btn-primary btn-round">
                      <ion-icon class="fs-26" src="img/svg/icon-arrow-down-lg.svg"></ion-icon>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <table class="table table-hover data-table bg-white animated fadeIn">
                <tbody>
                  <tr>
                    <th scope="row">Model:</th>
                    <td>Swift Dzire</td>
                  </tr>
                  <tr>
                    <th scope="row">Make:</th>
                    <td>Suzuki</td>
                  </tr>
                  <tr>
                    <th scope="row">Damage Location:</th>
                    <td>Front bumper</td>
                  </tr>
                  <tr>
                    <th scope="row">Damage Type:</th>
                    <td>Scratch dent crack</td>
                  </tr>
                  <tr>
                    <th scope="row">Damage Severity:</th>
                    <td>Low Medium
                      <div class="icon-level">
                        <span class="active"></span>
                        <span class="active"></span>
                        <span></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Action:</th>
                    <td>Replace</td>
                  </tr>
                  <tr>
                    <th scope="row">Cost:</th>
                    <td>₹100</td>
                  </tr>
                </tbody>
              </table>
              <button type="button" class="btn btn-lg btn-primary btn-report radius mt-30">
                <ion-icon class="mr-sm-3 fs-30 align-middle" src="img/svg/icon-reload.svg"></ion-icon>
                COMPREHENSIVE REPORT</button>
            </div>
          </div>
        </div>
      </section>

<?php echo View::make('layouts/footer'); ?>