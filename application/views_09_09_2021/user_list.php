<html><br><head>
<title>User Report</title>
</head>
<body>
<style>
h3
{
font-family: Verdana; 
font-size: 18pt; 
font-style: normal; 
font-weight: bold; 
color:red;
text-align: center; 
}
table{
font-family: Verdana; 
color:black; 
font-size: 12pt; 
font-style: normal;
font-weight: bold;
text-align:left; 
border-collapse: collapse; 
}
</style>
<h3>Users Report</h3>
    <table align="center" cellpadding = "5" border="1">
<thead>
<tr>
<th>Name</th>
<th>Mobile</th>
<th>Address</th>
</tr>
</thead>
<tbody>
<?php foreach($users as $row) { ?>
<tr>
<td><?php echo $row->name; ?></td>
<td><?php echo $row->mobile; ?></td>
<td><?php echo $row->address; ?></td>
</tr>
<?php } ?>
</tbody>
    </table>
</body>
</html>