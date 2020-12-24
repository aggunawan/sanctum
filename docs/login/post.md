## Endpoint `/login`
## Method `POST`
## Payload

```json
{
	"email": "jhon.doe@mail.com",
	"password": "password",
}
```

## Validation
- `email`:`required|min:6|max:255|email|exits`
- `password`:`required|min:6|max:255|password`

## Response
```json
{
	"message": "success",
	"code": 200,
	"data": {
		"name": "Jhone Doe",
		"email": "jhon.doe@mail.com",
		"token": "long-expiration-token"
	}
}
```

Last updated: 2020-12-24