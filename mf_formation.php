<?php
include_once('./config.php');
// error_reporting(0);
function callAPI($method, $url, $key, $type, $other_para = '', $amount = '', $freq = '', $from_date = '', $to_date = '')
{
    $ch = curl_init();
    if ($type == 'all_scheme' || $type == 'all_category') {
        $url = "$url" . "?key=" . "$key";
    }
    if ($type == 'scheme_details' || $type == 'yearly_graph' || $type == 'nav_graph' || $type == 'portfolio') {
        $url = "$url" . "?key=" . "$key" . "&isin=" . $other_para;
    }
    if ($type == 'sip_retrun') {
        $url = "$url" . "?key=" . "$key" . "&isin=" . $other_para . "&amount=" . $amount . "&frequency=" . $freq . "&startDate=" . $from_date . "&endDate=" . $to_date;
    }
    if ($type == 'sip_return_graph') {
        $url = "$url" . "?key=" . "$key" . "&isin=" . $other_para . "&amount=" . $amount . "&frequency=" . $freq . "&startDate=" . $from_date . "&endDate=" . $to_date;
    }
    if ($type == 'lump_return_graph') {
        $url = "$url" . "?key=" . "$key" . "&isin=" . $other_para . "&amount=" . $amount . "&frequency=" . $freq . "&startDate=" . $from_date;
    }
    if ($type == 'lumpsum_retrun') {
        $url = "$url" . "?key=" . "$key" . "&isin=" . $other_para . "&amount=" . $amount . "&frequency=" . $freq . "&startDate=" . $from_date;
    }
    if ($type == 'peer_comp') {
        $url = "$url" . "?key=" . "$key" . "&isin=" . $other_para . "&period=returns_cmp_" . $amount . "year";
    }
    $arr = array();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
    } else {
        // echo ($resp);
        $des = json_decode($resp, true);
        if ($des['status'] == 200) {
            if ($type == 'all_scheme') {
                return $des;
            }
            if ($type == 'scheme_details' || $type == 'yearly_graph') {
                return $des;
            }
            if ($type == 'portfolio') {
                return $des;
            }
            if ($type == 'nav_graph' ||  $type == 'lump_graph') {
                $data =  explode(',', str_replace(array('[', ']'), '', $des['msg']));
                return $data;
            }
            if ($type == 'sip_retrun') {
                return $des;
            }
            if ($type == 'lumpsum_retrun') {
                return $des;
            }
            if ($type == 'category') {
                return $des;
            }
        } elseif ($des['status'] == 400) {
            echo json_encode(array('status' => false, 'msg' => 'API not responded'));
        }
        //     print_r($des);
        // }
    }
    curl_close($ch);;
}

if (isset($_POST['mf_value'])) {
    $value  = $_POST['mf_value'];
    $data =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getAllMutualFundSchemes', MF_KEY, 'all_scheme');
    echo json_encode($data);
}
// if (isset($_POST['mf_cate'])) {
//     $value  = $_POST['mf_cate'];
//     $data =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getAllMutualFundSchemes', MF_KEY, 'all_category');
//     $decode = json_decode($data,true);
//     // $uniqu = [];
//     for ($i = 0; $i < count($decode); $i++) {
//         $unique = array_unique($decode[$i]['scheme_advisorkhoj_category'],SORT_STRING);
//     }
//     var_dump($unique);
// }


$nav_arr = array();
$nav_details = '';
if (isset($_POST['scheme_detail']) || isset($_POST['schemes_info'])) {
    if (isset($_POST['scheme_detail'])) {
        parse_str($_POST['scheme_detail'], $req);
        $isin_no = $req['mf_schemes_isin'];
        $data =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getSchemeInfoNew', MF_KEY, 'scheme_details', $isin_no);
        echo json_encode($data);
    }
    if (isset($_POST['schemes_info'])) {
        $title = $_POST['schemes_info']['title'];
        $isin_no = $_POST['schemes_info']['isin_no'];
        if ($title == 'details') {
            $data =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getSchemeInfoNew', MF_KEY, 'scheme_details', $isin_no);
        }
        if ($title == 'yearly_graph') {
            $data =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getYearlyPerformanceGraphNew', MF_KEY, 'yearly_graph', $isin_no);
            echo json_encode($data);
        }
        if ($title == 'nav_graph') {
            $from_date = $_POST['schemes_info']['from_date'];
            $to_date = $_POST['schemes_info']['to_date'];
            $nav_details =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getNavMovementGraph', MF_KEY, 'nav_graph', $isin_no);
            echo json_encode($nav_details);
        }
        if ($title == 'portfolio') {
            $nav_details =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getPortfolioAnalysisNew', MF_KEY, 'portfolio', $isin_no);
            echo json_encode($nav_details);
        }
    }
}



if (isset($_POST['nav_info'])) {
    $title = $_POST['nav_info']['nav_title'];
    $isin_no = $_POST['nav_info']['nav_isin_no'];
    $from_date = $_POST['nav_info']['from_date'];
    $to_date = $_POST['nav_info']['to_date'];

    $nav_details =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getNavMovementGraph', MF_KEY, 'nav_graph', $isin_no);
    array_push($nav_arr, $nav_details);
    $arr = [];
    for ($i = 0; $i < count($nav_arr[0]); $i++) {
        if (($i  % 2) == 0) {
            if ($from_date < $nav_arr[0][$i] && $to_date > $nav_arr[0][$i]) {
                $arr[$nav_arr[0][$i]] = $nav_arr[0][$i + 1];
            }
        }
    }
    echo json_encode($arr);
}


if (isset($_POST['sip_scheme_return'])) {
    parse_str($_POST['sip_scheme_return'], $req);
    $isin_no = $req['isin_no'];
    $amount = $req['sip_amount'];
    $frequency = $req['frequency'];
    $from_date = $req['sip_form_date'];
    $to_date = $req['sip_to_date'];

    $sd = strtotime($from_date);
    $start_date = date('d-m-Y', $sd);
    $ed = strtotime($to_date);
    $end_date = date('d-m-Y', $ed);
    $g = array();
    $data =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getSchemeSipReturnsNew', MF_KEY, 'sip_retrun', $isin_no, $amount, $frequency, $start_date, $end_date);
    if ($data['status'] == 200) {
        $graph =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getSIPReturnsForFundOverview', MF_KEY, 'sip_return_graph', $isin_no, $amount, $frequency, $start_date, $end_date);
        for ($i = 0; $i < count($graph); $i++) {
            $g[$graph[$i][0]] = $graph[$i][1];
        }
    };
    echo json_encode(array('status' => true, 'data' => $data['list'], 'graph' => $g));
}


if (isset($_POST['lump_scheme_return'])) {
    parse_str($_POST['lump_scheme_return'], $req);
    $isin_no = $req['isin_no'];
    $amount = $req['lump_amount'];
    $frequency = $req['frequency'];
    $from_date = $req['lump_form_date'];
    // $to_date = $req['lump_to_date'];

    $sd = strtotime($from_date);
    $start_date = date('d-m-Y', $sd);
    // $ed = strtotime($to_date);
    // $end_date = date('d-m-Y', $ed);
    $g = array();
    $data =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getSchemeLumpsumReturns', MF_KEY, 'lumpsum_retrun', $isin_no, $amount, $frequency, $start_date);
    if ($data['status'] == 200) {
        $graph =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getLumpSumReturnsForFundOverview', MF_KEY, 'lump_return_graph', $isin_no, $amount, $frequency, $start_date);
        for ($i = 0; $i < count($graph); $i++) {
            $g[$graph[$i][0]] = $graph[$i][1];
        }
    };
    echo json_encode(array('status' => true, 'data' => $data['list'], 'graph' => $g));
}
if (isset($_POST['peer_scheme'])) {
    parse_str($_POST['peer_scheme'], $req);
    $isin_no = $req['isin_no_peer'];
    $year = $req['peer_year'];

    if (intval($year < 3)) {
        die(json_encode(array('status' => false, 'msg' => 'Please Enter More than 3 years')));
    }
    $data =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getPeerComparisonFunds', MF_KEY, 'peer_comp', $isin_no, $year);
    echo json_encode($data);
}


if (isset($_POST['category_search'])) {
    parse_str($_POST['category_search'], $req);
    if (isset($req['category'])) {
        $category = $req['category'];
    }
    if (isset($req['camparison_category'])) {
        $category = $req['camparison_category'];
    }
    $cate = str_replace(' ', '%20', $category);
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://mfapi.advisorkhoj.com/getSchemePerformanceReturnsNew?key=' . MF_KEY . '&category=' . $cate . '&period=1m',
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
    echo $response;
}
if (isset($_POST['category_sip'])) {
    parse_str($_POST['category_sip'], $req);
    $category = $req['category'];
    $amount = $req['amount'];
    $period = $req['time_period'];
    $cate = str_replace(' ', '%20', $category);
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://mfapi.advisorkhoj.com/getSIPReturnsForCategoryPeriodAmount?key=' . MF_KEY . '&category=' . $cate . '&period=' . $period . '&amount=' . $amount,
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
    echo $response;
}
if (isset($_POST['category_lumpsum'])) {
    parse_str($_POST['category_lumpsum'], $req);
    $category = $req['category'];
    $amount = $req['amount'];
    $period = $req['time_period'];
    $cate = str_replace(' ', '%20', $category);
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://mfapi.advisorkhoj.com/getTopPerformingLumpsumFunds?key=' . MF_KEY . '&category=' . $cate . '&period=' . $period . '&amount=' . $amount,
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
    echo $response;
}
if (isset($_POST['camparison'])) {
    parse_str($_POST['camparison'], $req);
    $cate = $req['camparison_category'];
    $c = str_replace(array(' '), '%20', $cate);
    $multi = $req['mutli_scheme'];

    // var_dump($multi);
    $values =  json_encode($multi);
    $v = str_replace(array('"', "[", "]"), '', $values);
    $v1 = str_replace(array(' '), '%20', $v);
    $curl = curl_init();
    $url = 'https://mfapi.advisorkhoj.com/getSchemePerformanceForFundComparison?key=' . MF_KEY . '&category=' . $c . '&fund=' . $v1;
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
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
    echo $response;
}

if (isset($_POST['mf_category'])) {
    parse_str($_POST['mf_category'], $req);
    $category = $req['category'];
    $plan = $req['plan'];

    $data =  callAPI('POST', 'https://mfapi.advisorkhoj.com/getSchemePerformanceReturnsNew', MF_KEY, 'category', $category, '1m');
}
if (isset($_POST['form'])) {

    if ($_SERVER["SERVER_NAME"] === "swarajfinpro.in") {
        $conn = mysqli_connect("localhost", "swarajfi_crmsoftuser", "JuX4%V693xjw", "swarajfi_crmsoftdb");
    } else {
        $conn = mysqli_connect("localhost", "root", "", "user_goal");
    }
    parse_str($_POST['form'], $req);
    $mobile = $req['mobilenumber'];
    $date = date('Y-m-d');
    $insert = "INSERT INTO `telly_work_allotment` (`telly_id`,`mobile`, `client_type`, `date`, `assign_by`, `assign_status`, `come_from`) VALUES('16','$mobile','Non-Existing-Client','$date','Neeraj Gupta','assign','MF-Research')";
    $insert_reuslt = mysqli_query($conn, $insert);
    if ($insert_reuslt) {
        echo json_encode(array('status' => true));
    } else {
        echo json_encode(array('status' => false));
    }
}
