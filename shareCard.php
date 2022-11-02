<?php
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

$formGetData = filter_input_array(INPUT_GET, FILTER_SANITIZE_ENCODED);

if (
    (!isset($formGetData['id']) || empty($formGetData['id'])) &&
    (!isset($formGetData['ref']) || empty($formGetData['ref'])) &&
    (!isset($formGetData['vers']) || empty($formGetData['vers']))
) {
    die("wrong data");
}

$config = file_get_contents($paths["s3"]);
$config = json_decode($config, true);
$config = $config[$formGetData['vers']];

/* 
 * Test URLs
 * https://trinitymirrordataunit.com/squad_selector/share_63523429-3429-8583-8443-844384435631.png
 * https://trinitymirrordataunit.com/squad_selector/share_avg_63523429-3429-8583-8443-844384435631.png 
*/

/* 
 * TODO
 * 1. Decode single base64 variable
 * 2. Split decoded variable into 4 seperate variables [id, ref, vers, redi] (id, reference, version, redirect)
 * 3. Edit the validation if statement above e.g !isset($formGetData["id"]) to match newly made seperate vairables (step 2)
 * 4. Replace old variables with new variables
 * 5. Replace $config["twitter_site_url"] with the redirect variable
*/

$imageUrl = $paths["main"] . "share_" . $formGetData["id"] . ".png";

if ($formGetData["ref"] === "average") {
    $imageUrl = $paths["main"] . "share_avg_" . $formGetData["id"] . ".png";
}
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
    <meta name="twitter:description" content="<?php echo $config["description"]; ?>" />
    <meta name="twitter:image" content="<?php echo $imageUrl; ?>" />
    <meta name="twitter:url" content="<?php echo $config["twitter_site_url"]; ?>" />
    <title>Share Card</title>
    <?php if (false || $config["twitter_site_url"]) : ?>
        <script>
            window.location.replace("<?php echo $config["twitter_site_url"]; ?>");
        </script>
    <?php endif; ?>
</head>

<body>
    <div class="men_article"><a href="<?php echo $config["twitter_site_url"]; ?>">Click to go to <?php echo $config["twitter_site_url"]; ?></a></div>
</body>

</html>