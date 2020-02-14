<html>

<body>
    <form action="<?= base_url() ?>backoffice/webadmin/produce_pass" method="post">
        <h3>Produce pass</h3>
        <input type="text" name="password">
        <button type="submit">Submit</button>
        <p><?= $password ?></p>
    </form>

</body>

</html>