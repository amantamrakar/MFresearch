<!DOCTYPE html>
<html lang="reactjs">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            /* background-color: #000a; */
        }

        .loader_a {
            border: 1px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #021b3d;
            width: 80px;
            height: 80px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            left: 49%;
            position: absolute;
            z-index: 9999;
            top: 50%;
            display: none;
            background-color: #224f8f5e;

        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>

</body>

</html>

<div class="loader_a" id="loader_by_loader"></div>