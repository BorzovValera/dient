<?php
    //Подключение шапки
    require_once("layout_header.php");
?>
<!-- Блок для вывода сообщений -->
<div class="block_for_messages">
    <?php
        //Если в сессии существуют сообщения об ошибках, то выводим их
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];

            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }

        //Если в сессии существуют радостные сообщения, то выводим их
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];

            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>

<?php
    //Проверяем, если пользователь не авторизован, то выводим форму регистрации,
    //иначе выводим сообщение о том, что он уже зарегистрирован
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
<section id="header">
        <a href = "index.php"><img src= "img/logo3.png" width="200" height="50" class = "logo" alt= "not found"></a>

        <div>
          <ul id = "navbar">
            <li><a href = "index.php">Главная</a></li>
            <li><a href = "shop.html">Каталог</a></li>
            <li><a href = "blog.html">Блог</a></li>
            <li><a href = "about.html">О нас</a></li>
            <li><a class="active" href = "contact.html">Контакты</a></li>
            <li><a href = "cart.html"><i class="far fa-shopping-bag"></i></a></li>
          </ul>
        </div>
        <style>
        #header {
display: flex;
align-items: center;
justify-content: space-between;
padding: 20px 80px;
background: #E3E6F3;
box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
z-index: 999;
position: sticky;
top: 0;
left: 0;
}

#navbar {
display: flex;
align-items: center;
justify-content: center;
}

#navbar li {
list-style: none;
padding: 0 20px;
position: relative;
}

#navbar li a {
text-decoration: none;
font-size: 16px;
font-weight: 600;
color: #1a1a1a;
transition: 0.3s ease;
}
#navbar li a:hover,
#navbar li a.active {
color: #088178;
}

#navbar li a.active::after,
#navbar li a:hover::after {
content: "";
width: 30%;
height: 2px;
background: #088178;
position: absolute;
bottom: -4px;
left: 20px;
}
        </style>
      </section>
        <div id="form_register">
            <h2>Регистрация</h2>

            <form action="register.php" method="post" name="form_register">
                <table>
                    <tbody><tr>
                        <td> Имя: </td>
                        <td>
                            <input type="text" name="first_name" required="required">
                        </td>
                    </tr>

                    <tr>
                        <td> Фамилия: </td>
                        <td>
                            <input type="text" name="last_name" required="required">
                        </td>
                    </tr>

                    <tr>
                        <td> Email: </td>
                        <td>
                            <input type="email" name="email" required="required"><br>
                            <span id="valid_email_message" class="mesage_error"></span>
                        </td>
                    </tr>

                    <tr>
                        <td> Пароль: </td>
                        <td>
                            <input type="password" name="password" placeholder="минимум 6 символов" required="required"><br>
                            <span id="valid_password_message" class="mesage_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td> Введите капчу: </td>
                        <td>
                            <p>
                                <img src="captcha.php" alt="Капча" /> <br><br>
                                <input type="text" name="captcha" placeholder="Проверочный код" required="required">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="btn_submit_register" value="Зарегистрироватся!">
                        </td>
                    </tr>
                </tbody></table>
            </form>
        </div>
<?php
    }else{
?>
        <div id="authorized">
            <h2>Вы уже зарегистрированы</h2>
        </div>
<?php
    }


?>
