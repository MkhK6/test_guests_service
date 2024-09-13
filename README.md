## API Documentation

### Guests

* `GET /api/guests/{id}` - Получить гостя по идентификатору
* `POST /api/guests` - Создать нового гостя
* `PUT /api/guests/{id}` - Обновить гостя по идентификатору
* `DELETE /api/guests/{id}` - Удалить гостя по идентификатору

#### GET /api/guests/{id}
* **Parameters:**
  * `id` (required) - Идентификатор гостя
* **Response:**
  * `200 OK` - Возвращает данные гостя в формате JSON
  * `404 Not Found` - Гость с указанным идентификатором не существует

#### POST /api/guests
* **Request:**
  * **Body:**
    ```json
    {
      "first_name": "Иван", (required)
      "last_name": "Иванов", (required)
      "phone": "+79999999999", (required)
      "email": "test@example.com",
      "country": "Россия"
    }
    ```
* **Response:**
  * `200 Created` - Возвращает данные созданного гостя в формате JSON.
  * `422 Unprocessable Entity` - Невалидные данные

#### PUT /api/guests/{id}
* **Parameters:**
  * `id` (required) - Идентификатор гостя
* **Request:**
  * **Body:**
    ```json
    {
      "first_name": "Иван", (required)
      "last_name": "Иванов", (required) 
      "phone": "+79999999999", (required)
      "email": "test@example.com",
      "country": "Россия"
    }
    ```
* **Response:**
  * `200 Created` - Возвращает данные обновлённого гостя в формате JSON.
  * `422 Unprocessable Entity` - Невалидные данные
  * `404 Not Found` - Гость с указанным идентификатором не существует

#### DELETE /api/guests/{id}
* **Parameters:**
  * `id` (required) - Идентификатор гостя
* **Response:**
  * `200 Deleted` -Гость усаешно удалён.
  * `404 Not Found` - Гость с указанным идентификатором не существует

### Errors
* `404 Not Found` - Запрошенный ресурс не существует
* `422 Unprocessable Entity` - Невалидные данные