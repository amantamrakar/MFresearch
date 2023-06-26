<?php
define("MF_KEY", "99b39d35-3c8c-4f4e-a9c9-79a897d32d3f");
if ($_SERVER["SERVER_NAME"] === "swarajfinpro.in") {
    define("HOST", "swarajfinpro.in");
    define("USERNAME", "swarajfi_softwareuser");
    define("PASSWORD", "&X.tPsj%0e#n");
    define("DB", "swarajfi_software_new");
} else {
    define("HOST", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DB", "swaraj_new");
}

$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
