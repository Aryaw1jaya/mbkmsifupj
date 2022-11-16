<?php
// include database connection file
include("../koneksi.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $username = $_POST['username'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $level = $_POST['level'];
        
    // update user data
    $result = mysqli_query($koneksi, "UPDATE user SET password=' $password', nama='$nama', level='$level' WHERE username=$username");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$username = $_GET['username'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username=$username");
 
while($user_data = mysqli_fetch_array($result))
{
    $username = $user_data['username'];
    $password = $user_data['password'];
    $nama = $user_data['nama'];
    $level = $user_data['level'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="username" value=<?php echo $username;?>></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="text" name="password" value=<?php echo $password;?>></td>
            </tr>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Level</td>
                <td><input type="text" name="level" value=<?php echo $level;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="username" value=<?php echo $_GET['username'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>