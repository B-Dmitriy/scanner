<?php
    $login = $_POST['login'];
    $password = $_POST['password'];
    $deleteUser = $_POST['deleteUser'];
    $userFromCookie = $_COOKIE['user'];
    $userTitle = '';
    $auth = false;

    if ($login === "root" && $password === "zion1101") {
        setcookie('user', $login, time() + (3600 * 24 * 30));
        $auth = true;
        $userTitle = $login;
    }
    if($userFromCookie) {
        $auth = true;
        $userTitle = $userFromCookie;
    }
    if ($deleteUser) {
        $auth = false;
        setcookie('user', '');
    }
?>
<?php if ($auth): ?>
    <aside class="flex mb-3">
        <img src="/public/assets/icons/logo.svg" alt="avatar" width="80" height="80" />
        <form method="post">
            <h3 class="p-2"><?= $userTitle ?></h3>
            <input type="submit" class="p-2" name="deleteUser" value="Выйти" />
        </form>
    </aside>
<?php else: ?>
    <form action="index.php" method="post" class="p-3">
        <h3 class="mb-3">Вход в личный кабинет</h3>
        <label class="block uppercase tracking-wide text-gray-700 text-xs mb-2">
            Логин
            <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    name="login"
                    value=""
            />
        </label>
        <label class="block uppercase tracking-wide text-gray-700 text-xs mb-2">
            Пароль
            <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="password"
                    name="password"
                    value=""
            />
        </label>
        <input
                class="px-3 py-2 mt-3 bg-orange-700 hover:bg-orange-600 duration-300 text-white rounded-md shadow-md text-center"
                type="submit"
                value="Войти"
        />
    </form>
<?php endif; ?>