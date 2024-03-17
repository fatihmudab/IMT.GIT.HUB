<?php
$text = "";
$text2 = "";
$text3 ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $berat_badan = $_POST["berat_badan"];
    $tinggi_badan = $_POST["tinggi_badan"];

    if (is_numeric($berat_badan) && is_numeric($tinggi_badan)) {
        $imt = hitungIMT($berat_badan, $tinggi_badan);
        
        $klasifikasi = klasifikasiIMT($imt);
        
        $text =  "<p>IMT Anda adalah: " . number_format($imt, 2) . "<br>" ;
        $text2 = $klasifikasi;
    } else {
        $text3 = " ANDA BELUM MEMASUKAN INPUT DATA!!";
    }
}

function hitungIMT($berat_badan, $tinggi_badan) {
    $imt = $berat_badan / ($tinggi_badan * $tinggi_badan);
    return $imt;
}

function klasifikasiIMT($imt) {
    if ($imt < 18.5) {
        return "Sangat Kurus";
    } elseif ($imt >= 18.5 && $imt < 24.9) {
        return "Ideal";
    } elseif ($imt >= 25 && $imt < 39.9) {
        return "Kelebihan Berat Badan";
    } else {
        return "Obesitas";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="respon.css?v=1">
    <title>Document</title>
</head>
<body>

<style>
    /* CSS untuk styling formulir */

    body {
        background-color: #1f242d;
        font-family: poppins;
    }
.container form {
    padding: 20px;
    border-radius: 10px;
}

.container {
    position: absolute;
    /* display: flex;
    align-items: center; */
    background-color: #41C9E2;
    margin: 150px 250px;
    width: 700px;
    height: 350px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.container span {
    color: orange;
}

.input {
    display: flex;
}


input[type="text"] {
    width: 300px;
    padding: 12px;
    border: none;
    border-radius: 5px;
    box-sizing: border-box;
    background-color: #f9f9f9;
    color: #333;
    font-size: 9px;
}

input[type="submit"] {
    width: 200px;
    height: 30px;
    text-align: center;
    font-size: 15px;
    font-weight: 500;
    font-family: poppins;
    background-color: #5356FF;
    color: white;
    border: 2px solid #5356FF;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

input[type="submit"]:hover {
    background-color: transparent;
    color: #5356FF;
    
}

.from input {
    display: flex;
    margin: 10px;
}
::placeholder {
    font-weight: bold;
    color: black;
    padding: 10px auto;
    font-size: 13px;
}
.text p  {
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 20px;
    letter-spacing: 1px;
}


.text span {
    margin-top: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ================================================================================================================= */

@media screen and (max-width : 680px){
    body {
    background-color: #1f242d;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
}

.container form {
    padding: 20px;
    border-radius: 10px;
}

.container {
    position: absolute;
    background-color: #41C9E2;
    margin:12% 5%;
    width: 90%;
    max-width: 700px;
    min-width: 300px; 
    height: auto;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    display: flex; 
    flex-direction: column; 
    align-items: center; 
}

.container span {
    color: orange;
}

.input {
    display: flex;
    flex-direction: column; 
}

input[type="text"],
input[type="submit"] {
    width:auto; 
    height: 50px;
    margin: 0;
    padding: auto ;
    border: none;
    border-radius: 5px;
    background-color: #f9f9f9;
    color: #333;
    font-size: 20px;
    text-align: center;
}



input[type="submit"] {
    height: 50px;
    background-color: #5356FF;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

input[type="submit"]:hover {
    background-color: transparent;
    color: #5356FF;
    border: 2px solid #5356FF;
}

::placeholder {
    font-weight: bold ;
    color: black;
    padding: 0;
    font-size: 20px;
}


.text {
    text-align: center;
}

.text p {
    font-weight: bold;
    font-size: 20px;
    letter-spacing: 1px;
}

.text span {
    margin-top: 20px;
    display: inline-block; 
}

}




</style>
    <div class="container">
        <div class="text">
        <span style="font-size: 50px;"  class="material-symbols-outlined">
            mark_email_unread
        </span>

            <p class="t">IMT</p>
            <p class="t2"><?=$text2, $text, $text3 ?></p>
        </div>
        <div class="from">
        <form method="post" action="">
            <div class="input">
                <label for="berat_badan"></label>
                <input type="text" id="berat_badan" name="berat_badan" placeholder="Berat Badan" ><br></br>
                
                <label for="tinggi_badan"></label>
                <input type="text" id="tinggi_badan" name="tinggi_badan" placeholder="Tinggi Badan" ><br></br>
                
                <label for="Hitung IMT"></label>
                <input type="submit" placeholder="Hitung IMT">
                </div>
            </form>
        </div>
    </div>
    
    
</body>
</html>