<?php
require_once 'LoginSignUp/SignUpFolder/includes/mydatabase.php';
session_start();
if(empty($_SESSION['sessionIdAdmin'])){
    header("Location: LoginSignUp/SignUpFolder/loginAdmin.php");
    exit();
}
$userCount;
$id = array();
$fName = array();
$lName = array();
$email = array();
$password = array();
$birthDate = array();
$age = array();
$number = array();
$gender = array();

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);

if($rows > 0) {
    $i = 0;
    while($rows = mysqli_fetch_assoc($result)) {
        $id[$i] = $rows['id'];
        $fName[$i] = $rows['firstName'];
        $lName[$i] = $rows['lastName'];
        $email[$i] = $rows['email'];
        $password[$i] = $rows['userPassword'];
        $birthDate[$i] = $rows['birthDate'];
        $age[$i] = $rows['age'];
        $number[$i] = $rows['number'];
        $gender[$i] = $rows['gender'];
        $i++;
    }
    $userCount = $i;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>RTJ | Online Shopping</title>

    <link rel="stylesheet" type="text/css" href="leftHead.css">
    <link rel="stylesheet" type="text/css" href="rightHead.css">
    <link rel="stylesheet" type="text/css" href="ad.css">
    <link rel="stylesheet" type="text/css" href="dailyDiscoverStyle.css">
    <link rel="stylesheet" type="text/css" href="productHover.css">
    <link rel="stylesheet" type="text/css" href="edgeButtonstyle.css">
    <link rel="stylesheet" type="text/css" href="productHover.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <script src="https://kit.fontawesome.com/7a357ec0be.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="box1">
		<div id="centeredHead"> 
			<div id="leftHead" class="Header">
				<div id="leftHeadTop">
					<h1><a id="shopLink" href="shopee.php"><label id="shopName">Admin Page</label></a></h1>
				</div>
				<div id="leftHeadBot">

				</div>
			</div>
			<div id="rightHead" class="Header">
				<div id="upperRightHead">
					<div id="insideUpperRightHeadLeft" class="inUpperRightHead">
					</div>
					<div id="insideUpperRightHeadCenter" class="inUpperRightHead">
					</div>
					<div id="insideUpperRightHeadRight" class="inUpperRightHead">
						<a id="logoutUserFunction" href="LoginSignUp/SignUpFolder/includes/adminLogout.php"><label id="logoutUser">Logout</label></a>
					</div>
				</div>
			</div>
		</div>
	</div>
    <br>
    <div id="dataBody">
        <div id="centerBody">
            <div id="idDiv" class="dataClass">ID_ 
                <?php
                    foreach($id as $i => $IDs) {
                        echo('<br> <label class="dataData"> &nbsp' . $IDs . '</label>');
                    }
                ?>
            </div>
            <div id="firstNameDiv" class="dataClass">|FIRST NAME_  
                <?php 
                    foreach($fName as $i => $names) {
                        echo('<br> <label class="dataData"> &nbsp' . $names . '</label>');
                    }
                ?> 
            </div>
            <div id="lastNameDiv" class="dataClass">|LAST NAME_ 
                <?php 
                    foreach($lName as $i => $names) {
                        echo('<br> <label class="dataData"> &nbsp' . $names . '</label>');
                    }
                ?>
            </div>
            <div id="emailDiv" class="dataClass">|EMAIL_  
                <?php 
                    foreach($email as $i => $names) {
                        echo('<br> <label class="dataData"> &nbsp' . $names . '</label>');
                    }
                ?>
            </div>
            <div id="userPasswordDiv" class="dataClass">|PASSWORD_  
                <?php 
                    foreach($password as $i => $names) {
                        echo('<br> <label class="dataData"> &nbsp' . $names . '</label>');
                    }
                ?>
            </div>
            <div id="birthDateDiv" class="dataClass">|BIRTH DATE__ 
                <?php 
                    foreach($birthDate as $i => $names) {
                        echo('<br> <label class="dataData"> &nbsp' . $names . '</label>');
                    }
                ?>
            </div>
            <div id="ageDiv" class="dataClass">|AGE_  
                <?php 
                    foreach($age as $i => $names) {
                        echo('<br> <label class="dataData"> &nbsp' . $names . '</label>');
                    }
                ?>
            </div>
            <div id="numberDiv" class="dataClass">|NUMBER_  
                <?php 
                    foreach($number as $i => $names) {
                        echo('<br> <label class="dataData"> &nbsp' . $names . '</label>');
                    }
                ?>
            </div>
            <div id="genderDiv" class="dataClass">|GENDER_||  
                <?php 
                    foreach($gender as $i => $names) {
                        echo('<br> <label class="dataData"> &nbsp' . $names . '</label>');
                    }
                ?>
            </div>
            <div id="editDiv" class="dataClass">
                <form action="LoginSignUp/SignUpFolder/adminEdit.php" method="post">
                    <?php 
                        $count1 = 0;
                        $userCount2 = $userCount;
                        while($count1 < $userCount) {
                            echo('<br><button type="submit" id="editButton" name="' . $id[$count1] . '">edit</button>');
                            $count1++;
                        }
                    ?>
                </form>
                <form action="adminPage.php" method="post">
                    <button type="submit" id="editButton" name="editButton">add</button>
                </form>
            </div>
            <div id="deleteDiv" class="dataClass">
                <form action="LoginSignUp/SignUpFolder/adminDelete.php" method="post">
                    <?php 
                        $count1 = 0;
                        while($count1 < $userCount) {
                            echo('<br><button type="submit" id="editButton" name="' . $id[$count1] . '">delete</button>');
                            $count1++;
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <div id="addForm">
        <div id="addForm2">
            <form action="LoginSignUp/SignUpFolder/includes/signUpPHPAdd.php" method="post">
                <?php
                    if(isset($_POST['editButton'])){
                        echo('
                            <input id="firstName" name="firstName" class="fullName" type="text" placeholder="First Name*" required>
                            <input id="lastName" name="lastName" class="fullName" type="text" placeholder="Last Name*" required>
                            <input id="emailOrNumber" name="emailOrNumber" type="email" placeholder="Email*" required>
                            <input id="password1" name="userPassword" class="passClass" type="password" name="password" minlength="8" maxlength="20" placeholder="Password*" required>
                            <input id="password2" name="confirmPassword" class="passClass" type="password" name="password" minlength="8" maxlength="20" placeholder="Confirm Password*" required>
                            <br>
                            <label>BirthDate</label>
                            <input id="birtdayDate" name="birtDate" class="fullName" type="date" onchange="userAge = setAge();">
                            <input id="numberInput" name="phoneNumber" type="text" size="12" placeholder="Phone Number" onkeypress="return getNumber(event)"/>
                            <label id="genderLabel">Gender : </label>
                            <label>Male</label>
                            <input type="radio" id="male" value="male" name="theGender" onchange="genderSetToMale()"> &nbsp&nbsp&nbsp
                            <label>Female</label>
                            <input type="radio" id="female" value="female" name="theGender" onchange="genderSetToFemale()">
                            <button type="submit" name="addSubmit">submit</buton>
                        ');
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
