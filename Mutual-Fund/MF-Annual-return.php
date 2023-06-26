<!doctype html>
<html lang="en">
​

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mutual Fund Annual Return</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    ​
    <style>
        #mf_table_filter,
        #mf_table_length,
        #mf_table_info,
        #mf_table_paginate {
            font-size: 12px;
        }

        ​ #mf_table_filter {
            margin-bottom: 10px;
        }
    </style>
</head>
<?php include('loder.php') ?>

<body>
    <div class="container ">
        <div class="card">
            <h5 class="text-center  text-white p-2" style="background-color: #224f8f">Mutual Fund Annual Return</h5>
            <div class="card-body">
                <form id="category_wise_form">
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-select form-select-sm" name="category" id="category">
                                <option value="0">Choose Scheme</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select form-select-sm" name="plan" id="plan">
                                <option value="Regular">Regular</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" id="mf_trailing" class="btn btn-primary btn-sm"> Show</button>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select form-select-sm" name="time_period" id="time_period" hidden>
                                <option value="Year">Year</option>
                                <option value="Month">Month</option>
                                <option value="Week">Week</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    ​
    <div class="container mt-2">
        <div class="card">
            <div class="card-body" id="mf_schemes">
                ​
            </div>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        var SchemeData;
        var nav_details;
        var nav_chart = null;
        $(document).ready(function() {
            $('#loader_by_loader').show();
            var value = 'all_scheme';
            $.ajax({
                type: "post",
                url: "./mf_formation.php",
                data: {
                    mf_value: value
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    if (response) {
                        $('#loader_by_loader').hide();
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
                            if (outputArray[i] == 'Equity: Multi Cap') {
                                markup += '<option selected value="' + outputArray[i] + '">' + outputArray[i] + '</option>';
                            } else {
                                markup += '<option value="' + outputArray[i] + '">' + outputArray[i] + '</option>';
                            }
                        }
                        $('#category').html(markup);
                        $("#mf_trailing")[0].click();
                    }
                }
            });
            // });​​​



            var api_roko = true;
            var lists;
            $("#category_wise_form").submit(function(e) {
                var category = $(this).serialize();
                $('#loader_by_loader').show();
                e.preventDefault();
                if ($("#category").val() != 0) {
                    $.ajax({
                        type: "post",
                        url: "./mf_formation.php",
                        data: {
                            "category_search": category
                        },
                        dataType: "json",
                        success: function(data) {
                            var markup = '';
                            $('#loader_by_loader').hide();
                            var time_period = $("#time_period").val();
                            markup += '<table style="font-size:12px" id="mf_table" class="table  cell-border row-border display"><thead class="bg-dark text-white"><tr><th width="20%">Scheme Name</th><th width="10%">AMC Name</th><th width="10%">Lauch Date</th><th width="10%">AMU in(CR)</th><th width="10%">Expense Ratio(%)</th>';
                            // if (time_period == 'Week') {
                            //     markup += ' <th width="10%">1 Week Ret.(%) </th width="10%"><th>1 Week Rank</th>';
                            // }
                            // if (time_period == 'Month') {
                            //     markup += '<th width="5%">1 Month Ret.(%) </th><th width="5%">1 Month Rank</th><th width="5%">3 Month Ret.(%) </th><th width="5%">3 Month Rank</th><th width="5%">6 Month Ret.(%) </th><th width="5%">6 Month Rank</th>';
                            // }
                            if (time_period == 'Year') {
                                markup += '<th width="5%" id="highest">2023</th><th width="5%">2022</th><th width="5%">2021</th><th width="5%">2020</th><th width="5%">2019</th>';
                            }
                            markup += '</tr></thead><tbody>';​
                            var arr = [
                                'scheme_amfi_short_name',
                                'scheme_company_short_name',
                                'inception_date',
                                'scheme_assets',
                                'ter', ​
                            ];
                            // if (time_period == 'Week') {
                            //     arr.push('returns_abs_7days', 'returns_abs_7days_rank');
                            // }
                            // if (time_period == 'Month') {
                            //     arr.push('returns_abs_1month', 'returns_abs_1month_rank', 'returns_abs_3month', 'returns_abs_3month_rank', 'returns_abs_6month', 'returns_abs_6month_rank');
                            // }
                            if (time_period == 'Year') {
                                arr.push('returns_abs_ytd', 'returns_abs_2016', 'returns_abs_2015', 'returns_abs_2014', 'returns_abs_2013');
                            }​
                            // arr.push('returns_abs_ytd', 'returns_cmp_inception');
                            ​
                            lists = data.list;
                            for (let i = 0; i < lists.length; i++) {
                                markup += '<tr>';​
                                arr.forEach((e) => {
                                    if (lists[i][e] == undefined || lists[i][e] == 0) {
                                        markup += '<td>-</td>'
                                    } else if (e == 'scheme_amfi_short_name') {
                                        markup += '<td><a href="./scheme_portfolio.php?isin=' + lists[i].isin_no + '" target="blank">' + lists[i][e] + '</a></td>'​
                                    } else {
                                        markup += '<td>' + lists[i][e] + '</td>'
                                    }
                                });​
                                markup += '</tr>'
                            }​
                            markup += '</tbody></table>';
                            $("#mf_schemes").html(markup);
                            $('#mf_table').DataTable({
                                order: [
                                    [5, 'desc']
                                ],
                            });
                            // let table = new DataTable('#mf_table');
                        }
                    });
                } else {
                    ​}
            })
        });
    </script>
    ​
    ​
</body>
​

</html>