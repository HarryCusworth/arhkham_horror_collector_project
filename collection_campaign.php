
<html lang="en-GB">
<head>
    <title>add custom campaign</title>
    <script src="https://kit.fontawesome.com/0607049395.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="main_stylesheet.css">
    <link rel="stylesheet" type="text/css" href="form_stylesheet.css">
</head>
<body>
<header class="banner">
    <h1 class="mainHeading"> Add a custom campaign</h1>
</header>


<form class="form" method="post" action="collection_campaign.php">
    <div class="formItem">
    <input type="text" name="campaignName" id="campaignName"<label for="campaignName">Campaign Name</label>
    </div>

    <div class="formItem">
    <input type="text" name="scenario1Name" id="scenario1Name"<label for="scenario1Name">Scenario One Name</label>
    <input type="checkbox" id="scenario1Owned" name="scenario1Owned" value="1">
    <label for="scenario1Owned"> Owned?</label>
        <input type="checkbox" id="scenario1played" name="scenario1played" value="1">
        <label for="scenario1played"> Played?</label>
    </div>


    <div class="formItem">
        <input type="text" name="scenario2Name" id="scenario2Name"<label for="scenario2Name">Scenario Two Name</label>
        <input type="checkbox" id="scenario2Owned" name="scenario2Owned" value="1">
        <label for="scenario2Owned"> Owned?</label>
        <input type="checkbox" id="scenario2played" name="scenario2played" value="1">
        <label for="scenario2played"> Played?</label>
    </div>

    <div class="formItem">
        <input type="text" name="scenario3Name" id="scenario3Name"<label for="scenario3Name">Scenario Three Name</label>
        <input type="checkbox" id="scenario3Owned" name="scenario3Owned" value="1">
        <label for="scenario3Owned"> Owned?</label>
        <input type="checkbox" id="scenario3played" name="scenario3played" value="1">
        <label for="scenario3played"> Played?</label>
    </div>

    <div class="formItem">
        <input type="text" name="scenario4Name" id="scenario4Name"<label for="scenario4Name">Scenario Three Name</label>
        <input type="checkbox" id="scenario4Owned" name="scenario4Owned" value="1">
        <label for="scenario4Owned"> Owned?</label>
        <input type="checkbox" id="scenario4played" name="scenario4played" value="1">
        <label for="scenario4played"> Played?</label>
    </div>

    <div class="formItem">
        <input type="text" name="scenario5Name" id="scenario5Name"<label for="scenario5Name">Scenario Three Name</label>
        <input type="checkbox" id="scenario5Owned" name="scenario5Owned" value="1">
        <label for="scenario5Owned"> Owned?</label>
        <input type="checkbox" id="scenario5played" name="scenario5played" value="1">
        <label for="scenario5played"> Played?</label>
    </div>

    <div class="formItem">
        <input type="text" name="scenario6Name" id="scenario6Name"<label for="scenario6Name">Scenario Three Name</label>
        <input type="checkbox" id="scenario6Owned" name="scenario6Owned" value="1">
        <label for="scenario6Owned"> Owned?</label>
        <input type="checkbox" id="scenario6played" name="scenario6played" value="1">
        <label for="scenario6played"> Played?</label>
    </div>

    <div class="formItem">
        <input type="text" name="scenario7Name" id="scenario7Name"<label for="scenario7Name">Scenario Three Name</label>
        <input type="checkbox" id="scenario7Owned" name="scenario7Owned" value="1">
        <label for="scenario7Owned"> Owned?</label>
        <input type="checkbox" id="scenario7played" name="scenario7played" value="1">
        <label for="scenario7played"> Played?</label>
    </div>

    <div class="formItem">
        <input type="text" name="scenario8Name" id="scenario8Name"<label for="scenario8Name">Scenario Three Name</label>
        <input type="checkbox" id="scenario8Owned" name="scenario8Owned" value="1">
        <label for="scenario8Owned"> Owned?</label>
        <input type="checkbox" id="scenario8played" name="scenario8played" value="1">
        <label for="scenario8played"> Played?</label>
    </div>
    <div class="formItem"><input type="submit" value="submit">
    </div>


</form>
<?php





echo var_dump($_POST);

if (isset($_POST['scenario1Name'])) {
    $db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');
    $insert= "INSERT INTO scenarios (`name`, `cyle`, `position`, `owned`, `completed`, `product`) VALUES(:name,:cycle,:position,:owned,:completed,:product);";

    $stmt = $db->prepare($insert);


    $name = $_POST['scenario1Name'];
    $cycle = $_POST['campaignName'];
    $position = 1;
    if (!isset($_POST['scenario1Owned'])) {$owned = null;} ;
    if (!isset($_POST['scenario1played'])) {$completed = null;} ;
    $product = "custom";
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':cycle',$cycle);
    $stmt->bindParam(':posistion',$position);
    $stmt->bindParam(':owned',$owned);
    $stmt->bindParam(':completed',$completed);
    $stmt->bindParam(':product',$product);
    $stmt->execute();
    echo "<a href= collection_main.php>Go back to see you campaign</a>";
}

