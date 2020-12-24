## Endpoint `/register`
## Method `POST`
## Payload

```json
{
	"name": "Jhone Doe",
	"email": "jhon.doe@mail.com",
	"password": "password",
}
```

## Validation
- `name`:`required|min:6|max:140`
- `email`:`required|min:6|max:255|email`
- `password`:`required|min:6|max:255`