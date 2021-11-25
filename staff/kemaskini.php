<?php	
    require '../conn.php';
    $idstaff = $_GET['idstaff'];
    $sql = "SELECT * FROM staff WHERE idstaff = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idstaff);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_object();
    ?>
    <form action="simpan_kemaskini.php" method="post">
        <input type="hidden" name="idpengguna" value="<?php echo $row->idstaff; ?>"/>
        <table>
            <tr>
                <td><label for="idpengguna">ID Pengguna</label></td>
                <td>
                    <input id="idpengguna" type="text" name="idpengguna"
                           value="<?php echo $row->idstaff; ?>" required/>
                </td>
            </tr>
            <tr>
                <td><label for="katalaluan">Password</label></td>
                <td>
                    <input id="katalaluan" type="password" step="any" name="katalaluan"
                           value="<?php echo $row->katalaluan; ?>" required/>
                </td>
            </tr>
            <tr>
                <td><label for="staff_name">Staff Name</label></td>
                <td>
                    <input id="staff_name" type="text" step="any" name="staff_name"
                           value="<?php echo $row->staff_name; ?>" required/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit">SIMPAN</button>
                </td>
            </tr>
        </table>
    </form>