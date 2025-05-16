<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Feedback form</title>
  </head>
  <body>
    <header>
      <img
        src="./Logo_Polytech_rus_main.jpg"
        alt="Логотип"
        style="width: 20%; height: 20%"
      />
      <h1 class="name_work">Домашняя работа: Feedback form</h1>
    </header>
    <main>
      <section>
        <form action="https://httpbin.org/post" method="POST" target="_blank">
          <label>
            Имя пользователя
            <input type="text" name="username" required />
          </label>
          <label>
            Email
            <input type="email" name="email" required />
          </label>

          <label>
            Тип обращения:
            <select name="type">
              <option value="complaint">Жалоба</option>
              <option value="suggestion">Предложение</option>
              <option value="thanks">Благодарность</option>
            </select>
          </label>

          <label
            >Текст обращения:
            <textarea name="message" required></textarea>
          </label>
          <fieldset>
            <legend>Вариант ответа:</legend>
            <label
              ><input type="checkbox" name="reply[]" value="sms" /> SMS</label
            >
            <label
              ><input type="checkbox" name="reply[]" value="email" />
              Email</label
            >
          </fieldset>

          <button type="submit">Отправить</button>
        </form>

        <a href="index.php">Переход на вторую страницу</a>
      </section>
    </main>
    <footer>Гайворонский Семён</footer>
  </body>
</html>
