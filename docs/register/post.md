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
- `email`:`required|min:6|max:255|email|unique`
- `password`:`required|min:6|max:255`

## Response
```json
{
	"message": "created",
	"code": 201,
	"data": {
		"name": "Jhone Doe",
		"email": "jhon.doe@mail.com",
		"token": "long-expiration-token"
	}
}
```

Last updated: 2020-12-24