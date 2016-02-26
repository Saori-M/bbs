<html>
  <body>
    <h2>ログイン</h2>
    <form action="login.php" method="post">
    email：<br />
    <input type="text" name="email" size="30" value="" /><br />
    password：<br />
    <input type="text" name="password" size="30" value=""><br />
    <br />
    <input type="hidden" name="page" value="login">
    <input type="submit" value="ログイン" />
    </form>


    <h2>新規登録</h2>
    <form action="regist.php" method="post">
    name：<br />
    <input type="text" name="name" size="30" value="" /><br />
    email：<br />
    <input type="text" name="email" size="30" value="" /><br />
    password：<br />
    <input type="text" name="password" size="30" value=""><br />
    <br />
    <input type="hidden" name="page" value="create">
    <input type="submit" value="登録" />
    </form>

    <?php
    require_once "./footer.html";
     ?>
  </body>
</html>
