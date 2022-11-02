<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$local = false;
$paths = array(
    "main" => "https://trinitymirrordataunit.com/squad_selector/",
    "s3" => "https://static.trinitymirrordataunit.com/img/squad_selector/shareCardVersions.json"
);
if ($local) {
    $paths["main"] = "http://localhost/projects/squad_selector/data/";
    $paths["s3"] = "http://localhost/projects/squad_selector/img/shareCardVersions.json";
}
ob_start();

echo "<pre>";
$formGetData = filter_input_array(INPUT_GET, FILTER_SANITIZE_ENCODED);
if( (!isset($formGetData["data"]) || empty($formGetData["data"]))) {
    die("no data");
}

$formGetData["data"] = str_replace("%3D", "=", $formGetData["data"]);
// print_r($formGetData);

$json = base64_decode($formGetData["data"]);
// print_r($json);
$formData = json_decode($json, true);
// print_r($formData);
if (
    (!isset($formData["id"]) || empty($formData["id"])) &&
    (!isset($formData["ref"]) || empty($formData["ref"])) &&
    (!isset($formData["vers"]) || empty($formData["vers"])) &&
    (!isset($formData["redi"]) || empty($formData["redi"]))
) {
    die("wrong data");
}

$id = $formData["id"];
$ref = $formData["ref"];
$vers = $formData["vers"];
$redi = $formData["redi"];



$config = file_get_contents($paths["s3"]);
$config = json_decode($config, true);
$config = $config[$vers];


/* 
 * Test URLs
 * https://trinitymirrordataunit.com/squad_selector/share_63523429-3429-8583-8443-844384435631.png
 * https://trinitymirrordataunit.com/squad_selector/share_avg_63523429-3429-8583-8443-844384435631.png 
*/


$imageUrl = $paths["main"] . "share_" . $id . ".png";
$description = $config["description"];

if ($ref === "average") {
    $imageUrl = $paths["main"] . "share_avg_" . $id . ".png";
    $description = $config["descriptionAverage"];
}
// print_r($imageUrl);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta property="og:site_name" content="<?php echo $config["siteName"]; ?>" />
    <meta property="og:title" content="<?php echo $config["title"]; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?php echo $imageUrl; ?>" />
    <meta property="og:locale" content="en_EN" />
    <meta property="og:description" content="<?php echo $config["description"]; ?>" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="<?php echo $config["twitter_site"]; ?>" />
    <meta name="twitter:title" content="<?php echo $config["title"]; ?>" />
    <meta name="twitter:description" content="<?php echo $description; ?>" />
    <meta name="twitter:image" content="<?php echo $imageUrl; ?>" />
    <meta name="twitter:url" content="<?php echo $redi; ?>" />
    <title>Share Card</title>
    <?php if (false || $redi) : ?>
        <script>
            window.location.replace("<?php echo $redi; ?>");
        </script>
    <?php endif; ?>
</head>

<body>
    <div class="men_article"><a href="<?php echo $redi; ?>">Click to go to <?php echo $redi; ?></a></div>
</body>

</html>