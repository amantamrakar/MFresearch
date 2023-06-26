<?php include_once('./config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Swaraj Finpro</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/LOGO ICON.png" rel="icon">
  <link href="assets/img/LOGO ICON.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="./assets/css/select.css">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php

$ISIN_NO = '';
$data = [];
if (isset($_GET['scheme'])) {
  $ISIN_NO = $_GET['scheme'];
  $curl = curl_init();
  $url = 'https://mfapi.advisorkhoj.com/getSchemeInfoNew?key=' . MF_KEY . '&isin=' . $ISIN_NO;
  curl_setopt_array($curl, array(
    CURLOPT_URL =>   $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
  ));

  $response = curl_exec($curl);
  curl_close($curl);
  $decode =  json_decode($response, true);
  array_push($data, $decode);
}
if (isset($_GET['sname'])) {
  $ISIN_NO = $_GET['sname'];
  $cate = str_replace(' ', '%20', $ISIN_NO);
  $curl = curl_init();
  $url = 'https://mfapi.advisorkhoj.com/getSchemeInfoNew?key=' . MF_KEY . '&scheme=' . $cate;
  curl_setopt_array($curl, array(
    CURLOPT_URL =>   $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
  ));

  $response = curl_exec($curl);
  curl_close($curl);
  $decode =  json_decode($response, true);
  array_push($data, $decode);
}else{
  // header('')
}


?>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Swaraj Finpro <img src="assets/img/LOGO ICON.png" alt="" srcset=""></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <!-- <li><a class="nav-link scrollto" href="#team"></a></li> -->
          <li><a class="nav-link scrollto" href="#team">Invest Now</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center  pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Mutual Fund Research</h1>
          <h2 class="m-0">Better Solutions For Your Wealthy Pocket</h2>
          <h2>Build Your Portfolio With Swaraj Finpro </h2>
          <form id="form">
            <input type="text" class="form-control mb-3" name="mobilenumber" maxlength="10" minlength="10" placeholder="Enter Mobile Number Our Team Connect You Shortly">
            <button type="submit" class="btn-get-started ">Submit</button>
          </form>
          <div class="d-flex mt-2 justify-content-center justify-content-lg-start">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/Mutual_Fund.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/P2P_Lending.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/Insurance.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/Algo_Trading.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/Unlisted_Share.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/Share_Market.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Cliens Section -->

    <!-- --scheme-section-------------------- -->
    <section>
      <div class="container">
        <div class="card ">
          <div class="card-body" style="background-color: #ccc3;">
            <h4 class="" style="color: #37517e;"><?php echo $data[0]['scheme_name'] ?></h4>
            <input type="text" class="form-control form-control-sm" id="isin_no" value="<?php echo $ISIN_NO ?>" hidden></input>
            <input type="text" class="form-control form-control-sm" id="schemeName" value="<?php echo $data[0]['scheme_name']  ?>" hidden></input>
            <input type="text" class="form-control form-control-sm" id="categories" value="<?php echo $data[0]['scheme_category'] ?>" hidden></input>
            <span class="fs-6">Fund Name : <span class=""><a href="#" class=""><?php echo $data[0]['scheme_company'] ?></a></span></span>
            <!-- <span class="fs-6">Objective : <span class=""><?php echo $data[0]['scheme_objective'] ?></a></span></span> -->
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <table class="table">
                  <tbody class="">
                    <tr class="">
                      <td class="">
                        <span class="">Category Name : </span><span class="text-muted"><?php echo $data[0]['scheme_category'] ?></span>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="">
                        <span class="">Lounch Date : </span><span class="text-muted"><?php echo $data[0]['scheme_inception_date'] ?></span>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="">
                        <span class="">Scheme Asset : </span><span class="text-muted"><?php echo $data[0]['asset_class'] ?></span>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="">
                        <span class="">AUM (Cr.) : </span><span class="text-muted"><?php echo $data[0]['scheme_assets'] ?></span>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="">
                        <span class="">Expense Ratio : </span><span class="text-muted"><?php echo $data[0]['expense_ratio_percentage'] . 'As On (' . $data[0]['expense_ratio_date'] . ')' ?></span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-4 col-sm-12">
                <table class="table">
                  <tbody class="">
                    <tr class="">
                      <td class="">
                        <span class="">Status : </span><span class="text-muted"><?php echo $data[0]['scheme_status'] ?></span>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="">
                        <span class="">Minimun Investment : </span><span class="text-muted"><?php echo $data[0]['minimum_investment'] ?></span>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="">
                        <span class="">Minimum TopUp : </span><span class="text-muted"><?php echo $data[0]['minimum_topup'] ?></span>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="">
                        <span class="">Exit Load : </span><span class="text-muted"><?php echo $data[0]['exit_load'] ?></span>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="">
                        <span class="">BenchMark Scheme : </span><span class="text-muted"><?php echo $data[0]['scheme_benchmark'] ?></span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-4  col-sm-12 text-center">
                <div class="row">
                  <div class="col-md-6 col-xs-6 mt-5">
                    <span style="font-size: 15px;">NAV as on Date </span>
                    <div class="mt-2">
                      <span class="mt-2"><?php echo $data[0]['nav_date'] ?></span><br>
                      <h5 class="text-danger "><i class="bi bi-currency-rupee"></i><?php echo $data[0]['nav'] ?></h5><br>
                      <span class="text-muted">Change</span>
                      <span class=""><?php echo $data[0]['nav_change'] . '(' . $data[0]['nav_change_percentage'] . ') %' ?></span>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6 mt-5 text-center">
                    <span class="nav-cagr-label mt-1" style="font-size: 15px;">CAGR Since Inception</span>
                    <h5 class="text-danger mt-1"><?php echo $data[0]['scheme_inception_return'] ?></h5>
                    <span class="text-muted">BenchMark Return</span>
                    <?php echo $data[0]['benchmark_inception_return'] . '%' ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <?php
      $performance_head = [
        'CAGR since inception',
        '1 Year',
        '3 Year',
        '5 Year',
        '10 Year',
        'Scheme Asset(Cr.)',
      ];

      ?>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <h5 class="text-center p-2 text-white rounded" style="background-color: #37517e;">Camparsion</h5>
              <div class="card-body">
                <table class="table table-bordered" style="font-size:12px;">
                  <thead class="bg-dark">
                    <tr class="">
                      <th style="font-weight:600;">Camparsion</th>
                      <?php
                      for ($i = 0; $i < count($performance_head); $i++) {
                      ?>
                        <th><?php echo $performance_head[$i] ?></th>
                      <?php
                      }
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    for ($i = 0; $i < count($data[0]['scheme_performance_list']); $i++) {
                    ?>

                      <tr class="">
                        <td class="">
                          <a href="./schemewise.php?sname=<?php echo  $data[0]['scheme_performance_list'][$i]['scheme_name'] ?>">
                            <?php echo $data[0]['scheme_performance_list'][$i]['scheme_name'] ?>
                          </a>
                        </td>
                        <td class=""><?php echo $data[0]['scheme_performance_list'][$i]['inception_year_return'] ?></td>
                        <td class=""><?php echo $data[0]['scheme_performance_list'][$i]['one_year_return'] ?></td>
                        <td class=""><?php echo $data[0]['scheme_performance_list'][$i]['three_year_return'] ?></td>
                        <td class=""><?php echo $data[0]['scheme_performance_list'][$i]['five_year_return'] ?></td>
                        <td class=""><?php echo $data[0]['scheme_performance_list'][$i]['ten_year_return'] ?></td>
                        <td class=""><?php echo $data[0]['scheme_performance_list'][$i]['scheme_assets'] ?></td>
                      </tr>


                    <?php
                    }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <h5 class="text-center p-2 text-white rounded" style="background-color: #37517e;">Yearly Performance</h5>
              <div class="card-body">
                <canvas id="yearly_graph"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="container mt-5">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h5 class="text-center p-2 text-white rounded" style="background-color: #37517e;">Nav Graph</h5>
              <div class="card-body">
                <div class="row mt-3">
                  <div class="col-md-4">
                    <input type="text" name="title" value="nav_graph" id="title" class="" hidden>
                    <input type="text" name="isin_no" id="isin_no" value="<?php echo $isin_no ?>" class="" hidden>
                    <input type="date" id="from_date" name="from_date" value="" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-4">
                    <input type="date" id="to_date" name="to_date" max="<?php echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-4">
                    <button type="button" id="get_wise_nav" class="btn btn-success btn-sm">Show NAV</button>
                  </div>
                </div>
                <div class="my_chart">
                  <canvas id="nav_graph"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="container mt-5">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <h5 class="text-center p-2 text-white rounded" style="background-color: #37517e;">Peer Camparsion</h5>
              <div class="card-body">
                <table class="table table-bordered" style="font-size:12px;">
                  <thead class="bg-dark">
                    <tr class="">
                      <th style="font-weight:600;">Camparsion</th>
                      <?php
                      for ($i = 0; $i < count($performance_head); $i++) {
                      ?>
                        <th><?php echo $performance_head[$i] ?></th>
                      <?php
                      }
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    for ($i = 0; $i < count($data[0]['scheme_peer_comparision_list']); $i++) {
                    ?>

                      <tr class="">
                        <td class="">
                          <a href="./schemewise.php?sname=<?php echo  $data[0]['scheme_peer_comparision_list'][$i]['scheme_name'] ?>">
                            <?php echo $data[0]['scheme_peer_comparision_list'][$i]['scheme_name'] ?>
                          </a>
                        </td>
                        <td class=""><?php echo $data[0]['scheme_peer_comparision_list'][$i]['inception_year_return'] ?></td>
                        <td class=""><?php echo $data[0]['scheme_peer_comparision_list'][$i]['one_year_return'] ?></td>
                        <td class=""><?php echo $data[0]['scheme_peer_comparision_list'][$i]['three_year_return'] ?></td>
                        <td class=""><?php echo $data[0]['scheme_peer_comparision_list'][$i]['five_year_return'] ?></td>
                        <td class=""><?php echo $data[0]['scheme_peer_comparision_list'][$i]['ten_year_return'] ?></td>
                        <td class=""><?php echo $data[0]['scheme_peer_comparision_list'][$i]['scheme_assets'] ?></td>
                      </tr>


                    <?php
                    }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <h5 class="text-center p-2 text-white rounded" style="background-color: #37517e;">Asset Allocation Chart</h5>
              <div class="card-body">
                <div class="col-md-12 text-center pie_chart">
                  <canvas id="asset_allo_chart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 text-center">
            <div class="asset">
              <h5>Asset Allocation</h5>
              <div id="asset_allocation">

              </div>
            </div>
          </div>
          <div class="col-md-6 text-center pie_chart">
            <canvas id="asset_allo_chart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <h5 class="text-center">Portfolio Holder</h5>
            <div id="shceme_holder"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <h5 class="text-center">Sector Allocation</h5>
            <div id="other_holder"></div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- --scheme-section-------------------- -->
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">

            <p style="font-size: 25px;"><?php echo $data[0]['scheme_name'] ?></p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Invest</a>
          </div>
        </div>
      </div>
    </section><!-- End Cta Section -->


    <div class="container mt-5">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <h5 class="text-center p-2 text-white rounded" style="background-color: #37517e;">SIP Return</h5>
            <div class="card-body">
              <form id="category_wise_form">
                <div class="row">
                  <div class="col-md-3">
                    <select class="form-select form-select-sm" name=" category" id="category">
                      <option value="0">Choose Scheme</option>
                    </select>
                  </div>

                  <div class="col-md-2">
                    <select class="form-select form-select-sm" name="time_period" id="time_period">
                      <option selected="" value="1">1 Year</option>
                      <option value="2">2 Years</option>
                      <option value="3">3 Years</option>
                      <option value="4">4 Years</option>
                      <option value="5">5 Years</option>
                      <option value="6">6 Years</option>
                      <option value="7">7 Years</option>
                      <option value="8">8 Years</option>
                      <option value="9">9 Years</option>
                      <option value="10">10 Years</option>
                      <option value="11">11 Years</option>
                      <option value="12">12 Years</option>
                      <option value="13">13 Years</option>
                      <option value="14">14 Years</option>
                      <option value="15">15 Years</option>
                      <option value="16">16 Years</option>
                      <option value="17">17 Years</option>
                      <option value="18">18 Years</option>
                      <option value="19">19 Years</option>
                      <option value="20">20 Years</option>
                      <option value="21">21 Years</option>
                      <option value="22">22 Years</option>
                      <option value="23">23 Years</option>
                      <option value="24">24 Years</option>
                      <option value="25">25 Years</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <input class="form-control form-control-sm" name="amount" id="amount" value="3000">
                  </div>
                  <div class="col-md-2">
                    <select class="form-select form-select-sm" name="plan" id="plan">
                      <option value="Regular">Regular</option>
                    </select>
                  </div>

                  <div class="col-md-2">
                    <button type="submit" id="showSIP" class="btn btn-primary btn-sm"> Show</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="card-body" id="mf_schemes">

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <h5 class="text-center p-2 text-white rounded" style="background-color: #37517e;">Risko Meter</h5>
            <div class="card-body">
              <?php
              if ($data[0]['riskometer_value'] == 'Low') { ?>
                <img src="./assets/img/low.png" alt="" srcset="" style="width: 381px">
              <?php  } elseif ($data[0]['riskometer_value'] == 'High') { ?>
                <img src="./assets/img/high.png" alt="" srcset="" style="width: 381px">
              <?php } elseif ($data[0]['riskometer_value'] == 'Moderate') { ?>
                <img src="./assets/img/Moderate.png" alt="" srcset="" style="width: 381px">
              <?php } elseif ($data[0]['riskometer_value'] == 'Low to Moderate') { ?>
                <img src="./assets/img/low to moderate.png" alt="" srcset="" style="width: 381px">
              <?php } elseif ($data[0]['riskometer_value'] == 'Moderately High') { ?>
                <img src="./assets/img/ModerateLY_high.png" alt="" srcset="" style="width: 381px">
              <?php } elseif ($data[0]['riskometer_value'] == 'Very High') { ?>
                <img src="./assets/img/Very_High.png" alt="" srcset="" style="width: 381px">
              <?php }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <h5 class="text-center p-2 text-white rounded" style="background-color: #37517e;">Compare With Scheme</h5>
            <div class="card-body">
              <form id="camparison_form">
                <div class="row">
                  <div class="col-md-3">
                    <label for="" class="">Select Category</label>
                    <select class="form-select form-select-sm" name="camparison_category" id="camparison_category">
                      <option value="0">Choose Category</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="" class="">Select Scheme</label>
                    <div class="form-group">
                      <div class="select2-purple">
                        <select class="select2 form-select form-select-sm" id="scheme_multi_scheme" multiple="multiple" name="mutli_scheme[]" data-placeholder="Select Scheme" data-dropdown-css-class="select2-purple" style="width: 100%;">
                          <option value="0">Choose</option>

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="" class="">Select Scheme</label>
                    <select class="form-select form-select-sm" name="time_camp" id="time_camp">
                      <option value="Year">Year</option>
                      <option value="Month">Month</option>
                      <option value="Week">Week</option>
                    </select>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-sm"> Show</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="card-body" id="comparison_data">

            </div>
          </div>
        </div>
      </div>
    </div>





    </div>
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Ajay Jain believes in Customer first philosophy and put forth his client’s interest before anything else. He works hard to ensure that his customers make the most out of their money.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>Ajay Kumar Jain is the Chairman and Chief Managing Director of Swaraj Finpro Private Limited</li>
              <li><i class="ri-check-double-line"></i> Our vision is to be the most preferred and trusted Investment Management Company in India</li>
              <li><i class="ri-check-double-line"></i>At Swaraj Finpro we value our reputation for integrity in our dealings.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Founded in 2004, Swaraj Finpro Private Limited formerly Swaraj Wealth Management Pvt. Ltd is a proven financial service provider and has redefined the way people used to invest and save. With over 50 years of combined experience of the team, the company focuses on goal oriented long term savings – Like Children Education Planning, Retirement Planning, Children Marriage Planning, Long Term Wealth Creation and Tax Saving Investments planning based on the individual investors risk taking ability and the investment horizon.
            </p>
            <!-- <a href="#" class="btn-learn-more">Learn More</a> -->
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->





    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Swaraj provides various plans according to the services you need. Mutual funds, Health Insurance, Peer-to-Peer Lending, Share Trading, Life Insurance, General Insurance and Tax-Saving Investment Plans.</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <img src="assets/img/Mutual_Fund.png" class="img-fluid" alt="">
              <!-- <h4><a href="">Mutual Fund</a></h4> -->
              <p>Mutual fund schemes that invest their money in stocks of different companies based on the investment goal of the scheme</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <img src="assets/img/P2P_Lending.png" class="img-fluid" alt="">
              <!-- <h4><a href="">P2P Lending</a></h4> -->
              <p>Looking for a platform that facilitates P2P lending? Here's how it goes</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <img src="assets/img/Insurance.png" class="img-fluid" alt="">
              <!-- <h4><a href="">Insurance</a></h4> -->
              <p>Insurance in the recent times has become an essential part of everyone’s life</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <img src="assets/img/Share_Market.png" class="img-fluid" alt="">
              <!-- <h4><a href="">Unlisted Share/Trading</a></h4> -->
              <p>Trading With Robat is called Algo Trading</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->





    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>End Team Section -->

    <!-- ======= Pricing Section ======= -->





  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">



    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Swaraj Finpro</h3>
            <p>
              Kashi Tower Ekta Chowk <br>
              Jabalpur, Madhya Pradesh <br>
              India <br><br>
              <strong>Phone:</strong>+91 9993025625<br>
              <strong>Email:</strong> swarajfinpro@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Quick Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Mutual Fund</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">P2P Lending</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Life Insurance</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Health Insurance</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Unlisted Share</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Loan Against Mutual Fund</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Connect With Swaraj Finpro Social Media</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-youtube"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Swaraj</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="./index.php">Swaraj Finpro</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>t
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="./assets/js/select.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $(document).ready(function(e) {
      var isin_no = $("#isin_no").val();
      // console.log(isin_no);
      obj = {
        title: 'yearly_graph',
        isin_no: isin_no,
      }
      $.ajax({
        type: "post",
        url: "./mf_formation.php",
        data: {
          schemes_info: obj
        },
        dataType: "json",
        success: function(data) {
          var year = data.year_list;
          var scheme = data.scheme_name;
          var valuation = [];
          let j = 1;
          for (let i = 0; i < year.length; i++) {
            valuation.push(data[`scheme_returns${j}`]);
            j++;
          }
          const ctx = document.getElementById('yearly_graph');
          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: year,
              datasets: [{
                label: scheme,
                data: valuation
              }]
            },
            options: {
              scales: {
                x: {
                  grid: {
                    offset: true
                  }
                }
              }
            }
          });
        }
      })
    })


    $(document).ready(function(e) {
      var isin_no = $("#isin_no").val();
      obj = {
        title: 'portfolio',
        isin_no: isin_no,
      }
      $.ajax({
        type: "post",
        url: "./mf_formation.php",
        data: {
          schemes_info: obj
        },
        dataType: "json",
        success: function(data) {
          var asset = '';
          // asset += '<table class="table table-bordered" style="font-size: 12px"><tbody>';
          var asset_name = data.assetAllocationNamesString;
          var asset_value = data.assetAllocationValuesString;
          var scheme_holder = data.schemePortfolioHoldings;
          var other_sector = data.sectorAllocation;
          var asset_name_arr = [];
          var asset_value_arr = [];
          for (let i = 0; i < asset_name.length; i++) {
            asset += '<tr><td style="font-weight:600; background-color:#f5f5f5">' + asset_name[i] + '</td><td>' + asset_value[i] + '</td></tr>';
            asset_name_arr.push(asset_name[i]);
            asset_value_arr.push(asset_value[i]);
          }
          asset += '</tbody></table>';
          $("#asset_allocation").html(asset);
          const ctx = document.getElementById('asset_allo_chart');
          asset_chart = new Chart(ctx, {
            type: 'pie',
            data: {
              labels: asset_name_arr,
              datasets: [{
                label: asset_name_arr,
                data: asset_value_arr,
                backgroundColor: [
                  '#00589C',
                  '#1891C3',
                  '#3AC0DA',
                  '#50E3C2'
                ],
                hoverOffset: 4
              }]
            },

          });
          // var markup = '';
          // var one_markup = '';

          // markup += '<table class="table table-bordered" style="font-size:12px;"><thead></thead>';
          // Object.entries(scheme_holder).forEach((e, i) => {
          //   const [key, value] = e;
          //   if ((i + 1) % 2 == 0) {
          //     markup += ' <td  class="text-center"style="font-weight:600; background-color:#f5f5f5;" width ="25%">' + key + ' : </td><td class="text-center" width ="25%">' + value + '</td></tr>';
          //   } else {
          //     markup += '<tr class="p-0 text-center"><td class="text-center" style="font-weight:600; background-color:#f5f5f5" width ="25%">' + key + ' : </td><td class="text-center" width ="25%">' + value + '</td>';
          //   }
          // });

          // $("#shceme_holder").html(markup);

          // one_markup += '<table class="table table-bordered" style="font-size:12px;"><thead></thead>';
          // Object.entries(other_sector).forEach((e, i) => {
          //   const [key, value] = e;
          //   if ((i + 1) % 2 == 0) {
          //     one_markup += ' <td  class="text-center"style="font-weight:600; background-color:#f5f5f5;" width ="25%">' + key + ' : </td><td class="text-center" width ="25%">' + value + '</td></tr>';
          //   } else {
          //     one_markup += '<tr class="p-0 text-center"><td class="text-center" style="font-weight:600; background-color:#f5f5f5" width ="25%">' + key + ' : </td><td class="text-center" width ="25%">' + value + '</td>';
          //   }
          // });

          // $("#other_holder").html(one_markup);

        }
      })
    })

    const xyz = document.getElementById('nav_graph');
    var nav_chart = null;
    var nav_details;
    $(document).ready(function(e) {
      var isin_no = $("#isin_no").val();
      var title = $("#title").val();
      // ------------------nav date set -----------------.
      var d = $('#to_date').val();
      var date = new Date(d);
      var to_date = date.getTime(); // today date
      var from_date = date.setMonth(date.getMonth() - 6); // from_date

      // ------------------nav date set -----------------

      var obj = {
        isin_no: isin_no,
        title: title,
        to_date: to_date,
        from_date: from_date
      }

      $.ajax({
        type: "post",
        url: "./mf_formation.php",
        data: {
          schemes_info: obj
        },
        dataType: "json",
        success: function(data) {
          // console.log(data);
          // if (title == 'yearly_graph') {
          //   
          // }
          if (title == 'nav_graph') {
            // console.log(data);
            nav_details = data;
            var arr = [];
            for (let i = 0; i < data.length; i++) {
              if ((i % 2) == 0) {
                if (from_date < data[i] && to_date > data[i]) {
                  arr[data[i]] = data[i + 1];
                }
              }
            }
            // console.log(arr);
            var nav_date = [];
            var nav_value = [];

            Object.entries(arr).forEach((e, i) => {
              const [key, value] = e;
              let objectDate = new Date(+key);
              var date = objectDate.getDate() + '-' + (objectDate.getMonth() + 1) + '-' + objectDate.getFullYear()
              nav_date.push(date)
              nav_value.push(value)
            });

            nav_chart = new Chart(xyz, {
              type: 'line',
              data: {
                labels: nav_date,
                datasets: [{
                  label: 'Nav',
                  data: nav_value,
                  borderWidth: 1
                }]
              },

            });
          }
          // var asset = '';
          // if (title == 'portfolio') {

        }

      });
      // }
    })


    $("#get_wise_nav").click(function(e) {
      var title = 'nav_graph';
      var isin_no = $('#mf_schemes_isin').val();
      // -----------------------------------------
      var f = $('#from_date').val();
      var fd = new Date(f);
      var form_date = fd.getTime(); // from date
      var t = $('#to_date').val();
      var td = new Date(t);
      var to_date = td.getTime(); // from date
      var arr = [];
      for (let i = 0; i < nav_details.length; i++) {
        if ((i % 2) == 0) {
          if (form_date < nav_details[i] && to_date > nav_details[i]) {
            arr[nav_details[i]] = nav_details[i + 1];
          }
        }
      }
      var nav_date = [];
      var nav_value = [];
      // console.log(arr);

      Object.entries(arr).forEach((e, i) => {
        const [key, value] = e;
        let objectDate = new Date(+key);
        var date = objectDate.getDate() + '-' + (+objectDate.getMonth() + 1) + '-' + objectDate.getFullYear()
        nav_date.push(date)
        nav_value.push(value)
      });
      // const nav_chart = document.getElementById('nav_graph');
      if (nav_chart != null) {
        nav_chart.destroy();
      }
      nav_chart = new Chart(xyz, {
        type: 'line',
        data: {
          labels: nav_date,
          datasets: [{
            label: 'Nav',
            data: nav_value,
            borderWidth: 1
          }]
        },

      })
    });



    $(document).ready(function() {
      $("#loader_a").show();
      var value = 'all_scheme';
      var cat = $("#categories").val();
      $.ajax({
        type: "post",
        url: "./mf_formation.php",
        data: {
          mf_value: value
        },
        dataType: "json",
        success: function(response) {
          if (response) {
            var data = response.scheme_list;
            var outputArray = [];
            var count = 0;
            var start = false;
            for (j = 0; j < data.length; j++) {
              for (k = 0; k < outputArray.length; k++) {
                if (data[j].scheme_advisorkhoj_category == outputArray[k]) {
                  start = true;
                }
              }
              count++;
              if (count == 1 && start == false) {
                outputArray.push(data[j].scheme_advisorkhoj_category);
              }
              start = false;
              count = 0;
            }
            var markup = '<option value="0">Choose Scheme</option>';
            for (let i = 0; i < outputArray.length; i++) {
              if (cat == outputArray[i]) {
                markup += '<option selected value="' + outputArray[i] + '">' + outputArray[i] + '</option>';
              } else {
                markup += '<option value="' + outputArray[i] + '">' + outputArray[i] + '</option>';
              }
            }
            $('#category').html(markup);
            $('#camparison_category').html(markup);
            $('#showSIP')[0].click();

          }
        }
      });

      var api_roko = true;
      var lists;

      $("#category_wise_form").submit(function(e) {
        var category = $(this).serialize();
        var schemeName = $("#schemeName").val();
        e.preventDefault();
        if ($("#category").val() != 0) {
          $.ajax({
            type: "post",
            url: "./mf_formation.php",
            data: {
              "category_sip": category
            },
            dataType: "json",
            success: function(data) {
              var markup = '';
              var time_period = $("#time_period").val();
              markup += '<table style="font-size:11px" id="mf_table" class="table  cell-border row-border display"><thead class="bg-dark"><tr><th width="20%">Scheme Name</th><th width="10%">AMC Name</th><th width="10%">Lauch Date</th><th width="10%">AMU in(CR)</th><th width="5%">Expense Ratio(%)</th>';

              markup += ' <th width="10%">Investment Amount(%)</th><th width="10%">Current Value</th><th width="10%">Return(%)</th>';



              markup += '</thead><tbody>';


              lists = data.list;
              for (let i = 0; i < lists.length; i++) {
                markup += '<tr><td><a href="./index.php?sname=' + lists[i].scheme_name + '" target="blank">' + lists[i].scheme_name + '</a>' +
                  '</td><td>' + lists[i].scheme_company_short_name + '</td><td>' + lists[i].inception_date + '<td>' + lists[i].scheme_assets + '</td><td>' + lists[i].ter + '</td><td>' + lists[i].current_cost + '</td><td>' + lists[i].current_value + '</td><td>' + lists[i].returns + '</td></tr>'
              }
              var bench = data.benchmark_returns;
              var cate = data.category_returns;
              markup += '</tbody><tfoot class="bg-dark"><tr><td>Category Average</td><td></td><td></td><td></td><td></td><td>' + cate.current_cost + '</td><td>' + cate.current_value + '</td><td>' + cate.returns + '</td></tr><tr><td>' + bench.scheme_name + '</td><td></td><td>' + bench.inception_date + '</td><td></td><td></td><td>' + bench.current_cost + '</td><td>' + bench.current_value + '</td><td>' + bench.returns + '</td></tr></tfoot></table>';
              $("#mf_schemes").html(markup);
              let table = new DataTable('#mf_table');
            }
          });
        } else {

        }
      })

    });

    $("#form").submit(function(e) {
      e.preventDefault();
      var form = $(this).serialize();
      $.ajax({
        type: "post",
        url: "./mf_formation.php",
        data: {
          form: form
        },
        dataType: "json",
        success: function(data) {
          if (data.status) {
            alert('We will Get back to you as soon as possible');
          }
        }
      });
    })

    $("#camparison_category").change(function(e) {
      var category = $(this).serialize();
      e.preventDefault();
      if ($("#camparison_category").val() != 0) {
        $.ajax({
          type: "post",
          url: "./mf_formation.php",
          data: {
            "category_search": category
          },
          dataType: "json",
          success: function(data) {
            var markup = '';
            scheme = data.list;
            for (let i = 0; i < scheme.length; i++) {
              markup += '<option  value="' + scheme[i].scheme_amfi + '">' + scheme[i].scheme_amfi + '</option>'
            }
            // $("#first_scheme").html(markup);
            $("#scheme_multi_scheme").html(markup);
          }
        })
      }
    })


    $("#camparison_form").submit(function(e) {
      var camparison_form = $(this).serialize();
      e.preventDefault();
      if ($("#category").val() != 0) {
        $.ajax({
          type: "post",
          url: "./mf_formation.php",
          data: {
            "camparison": camparison_form
          },
          dataType: "json",
          success: function(data) {
            var markup = '';
            var time_period = $("#time_camp").val();
            markup += '<table style="font-size:13px" id="camprison_table" class="table table-bordered display"><thead class="bg-dark"><tr><th width="20%">Scheme Name</th><th width="10%">Lauch Date</th><th width="10%">AMU in(CR)</th><th width="10">Expense Ratio(%)</th>';
            if (time_period == 'Week') {
              markup += ' <th width="10%">1 Week Ret.(%) </th width="10%"><th>1 Week Rank</th>';
            }
            if (time_period == 'Month') {
              markup += '<th width="5%">1 Month Ret.(%) </th><th width="5%">1 Month Rank</th><th width="5%">3 Month Ret.(%) </th><th width="5%">3 Month Rank</th><th width="5%">6 Month Ret.(%) </th><th width="5%">6 Month Rank</th>';
            }
            if (time_period == 'Year') {
              markup += '<th width="5%">1 Yr Ret.</th><th width="5%">1 Yr Rank</th><th width="5%">3 Yrs Ret.</th><th width="5%">3 Yrs Rank</th><th width="5%">5 Yrs Ret.</th><th width="5%">5 Yrs Rank</th><th width="5%">10 Yrs Ret.(%)</th><th width="5%">10 Yrs Rank</th>';
            }
            markup += '<th width="10%">Ytd</th><th width="10%">Since Lauch Ret.(%)</th></tr></thead><tbody>';

            var arr = [
              'scheme_amfi_short_name',
              'inception_date',
              'scheme_assets',
              'ter',

            ];
            if (time_period == 'Week') {
              arr.push('returns_abs_7days', 'returns_abs_7days_rank');
            }
            if (time_period == 'Month') {
              arr.push('returns_abs_1month', 'returns_abs_1month_rank', 'returns_abs_3month', 'returns_abs_3month_rank', 'returns_abs_6month', 'returns_abs_6month_rank');
            }
            if (time_period == 'Year') {
              arr.push('returns_abs_1year', 'returns_abs_1year_rank', 'returns_cmp_3year', 'returns_cmp_3year_rank', 'returns_cmp_5year', 'returns_cmp_5year_rank', 'returns_cmp_10year', 'returns_cmp_10year_rank');
            }

            arr.push('returns_abs_ytd', 'returns_cmp_inception');
            var graph = [];

            lists = data.list;
            for (let i = 0; i < lists.length; i++) {
              markup += '<tr>';

              arr.forEach((e) => {
                if (lists[i][e] == undefined || lists[i][e] == 0) {
                  markup += '<td>-</td>'
                } else if (e == 'scheme_amfi_short_name') {
                  markup += '<td><a href="./schemewise.php?sname=' + lists[i].isin_no + '" target="blank">' + lists[i][e] + '</a></td>'

                } else if (e == 'returns_abs_7days_rank' || e == 'returns_abs_1month_rank' || e == 'returns_abs_3month_rank' || e == 'returns_abs_6month_rank' || e == 'returns_abs_1year_rank' || e == 'returns_cmp_3year_rank' || e == 'returns_cmp_5year_rank' || e == 'returns_cmp_10year_rank') {
                  markup += '<td>' + lists[i][e] + '(' + lists.length + ')</td>'

                } else {
                  markup += '<td>' + lists[i][e] + '</td>'
                }
              });

              markup += '</tr>'
            }

            markup += '</tbody></table>';
            $("#comparison_data").html(markup);
            // let table = new DataTable('#camprison_table');

            // chart = new Chart(xyz, {
            //     type: 'line',
            //     data: {
            //         labels: nav_date,
            //         datasets: [{
            //             label: 'Nav',
            //             data: nav_value,
            //             borderWidth: 1
            //         }]
            //     },

            // });
          }
        });
      } else {

      }
    })

    $('#time_camp').change(function(e) {
      var time_period = $(this).val();
      e.preventDefault();
      var markup = '';
      markup += '<table style="font-size:11px" id="camprison_table" class="table table-bordered display"><thead class="bg-dark"><tr><th width="20%">Scheme Name</th><th width="10%">Lauch Date</th><th width="10%">AMU in(CR)</th><th width="10">Expense Ratio(%)</th>';
      if (time_period == 'Week') {
        markup += ' <th width="10%">1 Week Ret.(%) </th width="10%"><th>1 Week Rank</th>';
      }
      if (time_period == 'Month') {
        markup += '<th width="5%">1 Month Ret.(%) </th><th width="5%">1 Month Rank</th><th width="5%">3 Month Ret.(%) </th><th width="5%">3 Month Rank</th><th width="5%">6 Month Ret.(%) </th><th width="5%">6 Month Rank</th>';
      }
      if (time_period == 'Year') {
        markup += '<th width="5%">1 Yr Ret.</th><th width="5%">1 Yr Rank</th><th width="5%">3 Yrs Ret.</th><th width="5%">3 Yrs Rank</th><th width="5%">5 Yrs Ret.</th><th width="5%">5 Yrs Rank</th><th width="5%">10 Yrs Ret.(%)</th><th width="5%">10 Yrs Rank</th>';
      }
      markup += '<th width="10%">Ytd</th><th width="10%">Since Lauch Ret.(%)</th></tr></thead><tbody>';

      var arr = [
        'scheme_amfi_short_name',
        'inception_date',
        'scheme_assets',
        'ter',

      ];
      if (time_period == 'Week') {
        arr.push('returns_abs_7days', 'returns_abs_7days_rank');
      }
      if (time_period == 'Month') {
        arr.push('returns_abs_1month', 'returns_abs_1month_rank', 'returns_abs_3month', 'returns_abs_3month_rank', 'returns_abs_6month', 'returns_abs_6month_rank');
      }
      if (time_period == 'Year') {
        arr.push('returns_abs_1year', 'returns_abs_1year_rank', 'returns_cmp_3year', 'returns_cmp_3year_rank', 'returns_cmp_5year', 'returns_cmp_5year_rank', 'returns_cmp_10year', 'returns_cmp_10year_rank');
      }

      arr.push('returns_abs_ytd', 'returns_cmp_inception');
      for (let i = 0; i < lists.length; i++) {
        markup += '<tr>';

        arr.forEach((e) => {
          if (lists[i][e] == undefined || lists[i][e] == 0) {
            markup += '<td>-</td>'
          } else if (e == 'scheme_amfi_short_name') {
            markup += '<td><a href="./schemewise.php?sname=' + lists[i].isin_no + '" target="blank">' + lists[i][e] + '</a></td>'

          } else if (e == 'returns_abs_7days_rank' || e == 'returns_abs_1month_rank' || e == 'returns_abs_3month_rank' || e == 'returns_abs_6month_rank' || e == 'returns_abs_1year_rank' || e == 'returns_cmp_3year_rank' || e == 'returns_cmp_5year_rank' || e == 'returns_cmp_10year_rank') {
            markup += '<td>' + lists[i][e] + '(' + lists.length + ')</td>'

          } else {
            markup += '<td>' + lists[i][e] + '</td>'
          }
        });

        markup += '</tr>'
      }

      markup += '</tbody></table>';
      $("#comparison_data").html(markup);
      // let table = new DataTable('#camprison_table');

    });
  </script>

</body>

</html>