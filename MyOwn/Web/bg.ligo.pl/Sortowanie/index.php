<?php
$conn = new mysqli("#","#","#","#"); // Database Connection
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sortowanie i edycja</title>
    <script type="text/javascript" src="skrypt.js"></script>
</head>
<style>
body{
    font-family: monospace;
}
#buttons{
    width: 120px;
    
}
.button{
    width:60px;
}
.age{
    width:35px;
    
}
.surname{
    min-width: 142px;
}
.name{
    min-width: 122px;
}
td{
    white-space: nowrap;
}
.thname{
    min-width:130px;
}
.thsurname{
    min-width:150px;
}
.thage{
    min-width:45px;   
}
.thid{
    min-width: 32px;
}
</style>
<body>
<?php
function getOrder() {
    global $orderArray;
    global $a;
    /*$orderArray = array(
        'id' => 'ASC',
        'name' => 'ASC',
        'surname' => 'ASC',
        'age' => 'ASC'
    );
    */
    
    $orderArray = unserialize(file_get_contents('order.txt'));
    //echo '<pre>';
    //print_r($orderArray);
    $returnValue = ' ORDER BY ';
    foreach ($orderArray as $column => $columnOrder) {
            $returnValue .= $column . " " . $columnOrder . ", ";
    }
    $returnValue = rtrim ($returnValue, ", ");
    $a = $orderArray;
    foreach($a as $key => $value){
    if($value == 'DESC'){
        $a[$key] = '↓';
    }elseif($value == 'ASC'){
        $a[$key] = '↑';
    }
    }
    //echo $returnValue;
    return $returnValue;
    //file_put_contents('order.txt', serialize($orderArray));
}

function setOrder ($column) {
    global $orderArray;
    foreach($orderArray as $key => $value){
        if($key == $column){
        unset($orderArray[$key]);
        $orderArray = array_merge(array($key => $value), $orderArray);
        }
    }
    //print_r($orderArray);

    file_put_contents('order.txt', serialize($orderArray));
}
getOrder();
//setOrder ($column, $columnOrder)
if(isset($_GET['sort'])){
    $column = $_GET['sort'];
    $columnOrder = $orderArray[$column];
    foreach($orderArray as $key => $ignore){
        if($column == $key){
            if($columnOrder == 'ASC'){
                $columnOrder = 'DESC';
            }elseif($columnOrder == 'DESC'){
                $columnOrder = 'ASC';
            }
        }
        break;
    }
    $orderArray[$column] = $columnOrder;
    setOrder($column);
}
if (isset($_POST['action']) && $_POST['action'] === 'deleteData') {
    $id = $_POST['id'];
    mysqli_query($conn, "UPDATE `users` SET `active`='0' WHERE `id`='$id'");
    exit;
}
if (isset($_POST['action']) && $_POST['action'] === 'addData') {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $wiek = $_POST['wiek'];

    mysqli_query($conn, "INSERT INTO `users` (`name`, `surname`, `age`, `modified`, `active`) VALUES ('$imie', '$nazwisko', $wiek, Current_timestamp(), '1')");

    exit;
}
if (isset($_POST['action']) && $_POST['action'] === 'updateData'){
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $wiek = $_POST['wiek'];
    $id = $_POST['id'];
mysqli_query($conn, "UPDATE `users` SET `name`='$imie', `surname`='$nazwisko', `age`='$wiek', `modified`= Current_Timestamp() WHERE `id`='$id'");
exit;
}

$res = mysqli_query($conn, "SELECT * FROM users WHERE active='1' ". getOrder());
    echo "<table border=1 rules=all cellpadding=10>
    <thead>
    <th class='thid'><a href='index.php?sort=id'>ID</a> <font size='4'>".$a['id']."</font></th>
    <th class='thname'><a href='index.php?sort=name'>Imię</a> <font size='4'>".$a['name']."</font></th>
    <th class='thsurname'><a href='index.php?sort=surname'>Nazwisko</a> <font size='4'>".$a['surname']."</font></th>
    <th class='thage'><a href='index.php?sort=age'>Wiek</a> <font size='4'>".$a['age']."</font></th>
    <th>Zmodyfikowano</th>
    <th id='buttons'>Przyciski</th>
    </thead>
    <tbody>";
    while ($row = mysqli_fetch_assoc($res)) {
        $o = $row['id'];
        $data = date('d.m.Y H:i', strtotime($row['modified']));
        echo "<tr id='row".$o."'><td>" . $o . "</td>
        <td id='name".$o."' class='name'>" . $row['name'] . "</td>
        <td id='surname".$o."' class='surname'>" . $row['surname'] . "</td>
        <td id='age".$o."' class='age'>" . $row['age'] . "</td>
        <td>".$data."</td>
        <td id='buttons'>".
        "<input type='button' id='edycja".$o."' class='button' value='Edytuj' onclick='edit_row($o)'>".
        "<input type='button' class='button' style='display: none;' id='zapis".$o."' value='Zapisz' onclick='save_row($o)'>".
        "<input type='button' class='button' value='Usuń' id='usun".$o."' onclick='delete_row($o)'>".
        "<input type='button' class='button' style='display: none;' id='anuluj".$o."' value='Anuluj' onclick='cancel_edit($o)'>".
        "</td>
        </tr>";
    }
    echo "<tr><td></td><td><input class='name' type='text' id='new_name' placeholder='Imię'></td>".
    "<td><input type='text' class='surname' id='new_surname' placeholder='Nazwisko'></td>".
    "<td><input type='number' class='age' id='new_age' placeholder='Wiek' min='0' max='150'></td>".
    "<td></td><td><input type='button' style='width: 120px;' value='Dodaj nowy' onclick='add_row()'></td></tr>";
    echo "</tbody>
    </table>";
?>
</body>
</html>