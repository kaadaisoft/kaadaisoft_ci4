<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not assigned members</title>
</head>
<body>
<?php 

if(isset($members) && isset($sno) ){
$i=$sno;
foreach ($members as $key => $value) {
$j = $i+1;
echo "
<tr>
<td>$j</td>
<td>$value[Name]</td>
<td>$value[Mobile]</td>
<td>$value[Area]</td>
<td class='px-3'>"; ?>

<input type="checkbox" name='selectcoord' class='selectcoord' value="<?=$value['Aadhar']?>" onchange="selectmembersassign(this)">
<?php 
echo "</td>
</tr>";
++$i;
}
 }
else{
    echo
     " 
     <tr>
     <td class='text-center' colspan='5'>No search results</td>
     </tr>
     ";
 }
?>  
</body>
</html>
