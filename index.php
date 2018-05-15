<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistema</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>

<?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>

<!--edicao-->
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM user_note WHERE id=$id");

    if (count($record) == 1) {
        $n = mysqli_fetch_array($record);
        $turno = $n['turno'];
        $quant = $n['quant'];
        $data = $n['data'];
    }
}
?>


<form method="post" action="server.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="input-group">
        <label>Turno</label>
        <input type="text" name="turno" value="<?php echo $turno; ?>">
    </div>
    <div class="input-group">
        <label>Quantidade</label>
        <input type="text" name="quant" value="<?php echo $quant; ?>">
    </div>
    <div class="input-group">
        <label>Data</label>
        <input type="text" name="data" value="<?php echo $data; ?>">
    </div>

    <div class="input-group">
        <?php if ($update == true): ?>
            <button class="btn" type="submit" name="update" style="background: #556B2F;">Atualizar</button>
        <?php else: ?>
            <button class="btn" type="submit" name="save">Salvar</button>
        <?php endif ?>
    </div>

</form>

<?php $results = mysqli_query($db, "SELECT * FROM user_note"); ?>

<table>
    <thead>
    <tr>
        <th>Turno</th>
        <th>Quantidade</th>
        <th>Data</th>
        <th colspan="2">Ação</th>
    </tr>
    </thead>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['turno']; ?></td>
            <td><?php echo $row['quant']; ?></td>
            <td><?php echo $row['data']; ?></td>
            <td>
                <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Editar</a>
            </td>
            <td>
                <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Excluir</a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>