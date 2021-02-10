
<html lang="en-GB">
<head>
    <title>add custom campaign</title>
    <script src="https://kit.fontawesome.com/0607049395.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="main_stylesheet.css">
    <link rel="stylesheet" type="text/css" href="form_stylesheet.css">
</head>
<body>
<header>
    <h1 class="mainHeading"> Add a custom campaign</h1>
    <div class="navBar">
        <div class="addButton"><a href= collection_main.php>Go back to your campaign log</a>
        </div>
        </div>
</header>


<form class="form" method="post" action="collection_campaign.php"> To enter a standalone scenario leave the campaign title blank.
    <div class="formItem">
    <input type="text" name="campaignName" id="campaignName"<label for="campaignName">Campaign Name</label>
    </div>

    <div class="formItem">
    <input type="text" name="scenario1Name" id="scenario1Name"<label for="scenario1Name">Scenario One Name</label>
    <input type="checkbox" id="scenario1Owned" name="scenario1Owned" value=true>
    <label for="scenario1Owned"> Owned?</label>
        <input type="checkbox" id="scenario1played" name="scenario1played" value=true>
        <label for="scenario1played"> Played?</label>
    </div>


    <div class="formItem">
        <input type="text" name="scenario2Name" id="scenario2Name"<label for="scenario2Name">Scenario Two Name</label>
        <input type="checkbox" id="scenario2Owned" name="scenario2Owned" value=true>
        <label for="scenario2Owned"> Owned?</label>
        <input type="checkbox" id="scenario2played" name="scenario2played" value=true>
        <label for="scenario2played"> Played?</label>
    </div>

    <div class="formItem">
        <input type="text" name="scenario3Name" id="scenario3Name"<label for="scenario3Name">Scenario Three Name</label>
        <input type="checkbox" id="scenario3Owned" name="scenario3Owned" value=true>
        <label for="scenario3Owned"> Owned?</label>
        <input type="checkbox" id="scenario3played" name="scenario3played" value=true>
        <label for="scenario3played"> Played?</label>
    </div>

    <div class="formItem">
        <input type="text" name="scenario4Name" id="scenario4Name"<label for="scenario4Name">Scenario Four Name</label>
        <input type="checkbox" id="scenario4Owned" name="scenario4Owned" value=true>
        <label for="scenario4Owned"> Owned?</label>
        <input type="checkbox" id="scenario4played" name="scenario4played" value=true>
        <label for="scenario4played"> Played?</label>
    </div>

    <div class="formItem">
        <input type="text" name="scenario5Name" id="scenario5Name"<label for="scenario5Name">Scenario Five Name</label>
        <input type="checkbox" id="scenario5Owned" name="scenario5Owned" value=true>
        <label for="scenario5Owned"> Owned?</label>
        <input type="checkbox" id="scenario5played" name="scenario5played" value=true>
        <label for="scenario5played"> Played?</label>
    </div>

    <div class="formItem">
        <input type="text" name="scenario6Name" id="scenario6Name"<label for="scenario6Name">Scenario Six Name</label>
        <input type="checkbox" id="scenario6Owned" name="scenario6Owned" value=true>
        <label for="scenario6Owned"> Owned?</label>
        <input type="checkbox" id="scenario6played" name="scenario6played" value=true>
        <label for="scenario6played"> Played?</label>
    </div>

    <div class="formItem">
        <input type="text" name="scenario7Name" id="scenario7Name"<label for="scenario7Name">Scenario Seven Name</label>
        <input type="checkbox" id="scenario7Owned" name="scenario7Owned" value=true>
        <label for="scenario7Owned"> Owned?</label>
        <input type="checkbox" id="scenario7played" name="scenario7played" value=true>
        <label for="scenario7played"> Played?</label>
    </div>

    <div class="formItem">
        <input type="text" name="scenario8Name" id="scenario8Name"<label for="scenario8Name">Scenario Eight Name</label>
        <input type="checkbox" id="scenario8Owned" name="scenario8Owned" value=true>
        <label for="scenario8Owned"> Owned?</label>
        <input type="checkbox" id="scenario8played" name="scenario8played" value=true>
        <label for="scenario8played"> Played?</label>
    </div>
    <div class="formItem"><input type="submit" value="submit">
    </div>


</form>
<?php


function submitScenario(string $scenarioName, string $cycleName, int $position, $owned , $completed, string $product = "custom"){
    $db = new PDO('mysql:host=db; dbname=arkham_lcg_scenarios', 'root', 'password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $insert= "INSERT INTO scenarios (`name`, `cycle`, `position`, `owned`, `completed`, `product`) VALUES(:name,:cycle,:position,:owned,:completed,:product);";
    $stmt = $db->prepare($insert);
    $stmt->bindParam(':name',$scenarioName);
    $stmt->bindParam(':cycle',$cycleName);
    $stmt->bindParam(':position',$position);
    $stmt->bindParam(':owned',$owned);
    $stmt->bindParam(':completed',$completed);
    $stmt->bindParam(':product',$product);
    $stmt->execute();
}

if (!empty($_POST['scenario1Name'])) {
    if (empty($_POST['campaignName'])){$campaignName = "Sidestories";} else { $campaignName = $_POST['campaignName'];}
    if (empty($_POST['scenario1Owned'])) {$owned = null;} else {$owned = true;}
    if (empty($_POST['scenario1played'])) {$completed = null;} else {$completed = true;}
    submitScenario( $_POST['scenario1Name'], $campaignName, 1, $owned, $completed );
    echo "scenario submitted";
}

if (!empty($_POST['scenario2Name'])) {
    if (empty($_POST['campaignName'])){$campaignName = "Sidestories";} else { $campaignName = $_POST['campaignName'];}
    if (empty($_POST['scenario2Owned'])) {$owned = null;} else {$owned = true;}
    if (empty($_POST['scenario2played'])) {$completed = null;} else {$completed = true;}
    submitScenario( $_POST['scenario2Name'], $campaignName, 2, $owned, $completed );
}

if (!empty($_POST['scenario3Name'])) {
    if (empty($_POST['campaignName'])){$campaignName = "Sidestories";} else { $campaignName = $_POST['campaignName'];}
    if (empty($_POST['scenario3Owned'])) {$owned = null;} else {$owned = true;}
    if (empty($_POST['scenario3played'])) {$completed = null;} else {$completed = true;}
    submitScenario( $_POST['scenario3Name'], $campaignName, 3, $owned, $completed );
}

if (!empty($_POST['scenario4Name'])) {
    if (empty($_POST['campaignName'])){$campaignName = "Sidestories";} else { $campaignName = $_POST['campaignName'];}
    if (empty($_POST['scenario4Owned'])) {$owned = null;} else {$owned = true;}
    if (empty($_POST['scenario4played'])) {$completed = null;} else {$completed = true;}
    submitScenario( $_POST['scenario4Name'], $campaignName, 4, $owned, $completed );
}

if (!empty($_POST['scenario5Name'])) {
    if (empty($_POST['campaignName'])){$campaignName = "Sidestories";} else { $campaignName = $_POST['campaignName'];}
    if (empty($_POST['scenario5Owned'])) {$owned = null;} else {$owned = true;}
    if (empty($_POST['scenario5played'])) {$completed = null;} else {$completed = true;}
    submitScenario( $_POST['scenario4Name'], $campaignName, 5, $owned, $completed );
}

if (!empty($_POST['scenario6Name'])) {
    if (empty($_POST['campaignName'])){$campaignName = "Sidestories";} else { $campaignName = $_POST['campaignName'];}
    if (empty($_POST['scenario6Owned'])) {$owned = null;} else {$owned = true;}
    if (empty($_POST['scenario6played'])) {$completed = null;} else {$completed = true;}
    submitScenario( $_POST['scenario6Name'], $campaignName, 6, $owned, $completed );
}

if (!empty($_POST['scenario7Name'])) {
    if (empty($_POST['campaignName'])){$campaignName = "Sidestories";} else { $campaignName = $_POST['campaignName'];}
    if (empty($_POST['scenario7Owned'])) {$owned = null;} else {$owned = true;}
    if (empty($_POST['scenario7played'])) {$completed = null;} else {$completed = true;}
    submitScenario( $_POST['scenario7Name'], $campaignName, 4, $owned, $completed );
}

if (!empty($_POST['scenario8Name'])) {
    if (empty($_POST['campaignName'])){$campaignName = "Sidestories";} else { $campaignName = $_POST['campaignName'];}
    if (empty($_POST['scenario8Owned'])) {$owned = null;} else {$owned = true;}
    if (empty($_POST['scenario8played'])) {$completed = null;} else {$completed = true;}
    submitScenario( $_POST['scenario8Name'], $campaignName, 8, $owned, $completed );
}