# API DOCUMENTATION

The Capgemini project aims to simulate some transactions (balance, deposit and withdrawal) in a bank customer's current account.

After downloading or cloning the project, you must take the following steps to get the API ready for use.

## Install Dependencies

```
composer install
```

## Generate Key For The .env File

```
php artisan key:generate
```

## Change database.sqlite File Path

You must change the .env DB_DATABASE path

DB_CONNECTION=sqlite

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=C:/wamp64/www/GitHub/capgemini-api/database/database.sqlite
DB_USERNAME=
DB_PASSWORD=
```

Where are

```
DB_DATABASE=C:/wamp64/www/GitHub/capgemini-api/database/database.sqlite
```

where is the complete path of the project to the file.

## Popular The Database

```
php artisan migrate:refresh --seed
```

## Launch Application

```
php artisan serve
```

## User And Test Account

```
User:
    "name"     : "Client Test",
    "email"    : "user@email.com",
    "password" : "secret",
    "cpf"      : "12345678901",

Account:
    "number"   : 123456,
    "agency"   : 12345
```

## Login Route

<table>
	<thead>
		<th>Description</th>
		<th>Method</th>
		<th>Url</th>
		<th>QueryString</th>
		<th>Body</th>
		<th>Response</th>
	</thead>
	<tbody>	
		<tr>
			<td>Accest account</td>
			<td>POST</td>
			<td>api/account/login</td>
			<td>none</td>
			<td>
            <pre>
                "email":"user@email.com",
                "password":"secret"
            </pre>
            </td>
			<td>
            <pre>
                "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvYWNjb3VudC9sb2dpbiIsImlhdCI6MTU4MDY1NzgyNSwiZXhwIjoxNTgwNjYxNDI1LCJuYmYiOjE1ODA2NTc4MjUsImp0aSI6IkRMeFd6RmxuWUVnbXhINFAifQ. _1kvva48YybqYHMpTH34Gt-lI30cIVq1qyGRtfm5De8"
            </pre>
			</td>
		</tr>			
	</tbody>
</table>

## Details Of A User

<table>
	<thead>
		<th>Description</th>
		<th>Method</th>
		<th>Url</th>
		<th>QueryString</th>
		<th>Body</th>
		<th>Response</th>
	</thead>
	<tbody>	
		<tr>
			<td>Details user</td>
			<td>GET</td>
			<td>api/users/details</td>
			<td>none</td>
			<td>none</td>
			<td>
            <pre>
            "user": {
                "id": 1,
                "name": "Client Test",
                "email": "user@email.com",
                "email_verified_at": "2020-10-13T02:30:17.000000Z",
                "cpf": "12345678901",
                "phone": "35085830527",
                "profile_id": "1",
                "deleted_at": null,
                "created_at": "2020-10-13T02:30:17.000000Z",
                "updated_at": "2020-10-13T02:30:17.000000Z"
            }
            </pre>
			</td>
		</tr>			
	</tbody>
</table>

## Account Balance

<table>
	<thead>
		<th>Description</th>
		<th>Method</th>
		<th>Url</th>
		<th>QueryString</th>
		<th>Body</th>
		<th>Response</th>
	</thead>
	<tbody>	
		<tr>
			<td>Account balance</td>
			<td>GET</td>
			<td>api/balances</td>
			<td>none</td>
			<td>none</td>
			<td>
            <pre>
            "balance": 403
            </pre>
			</td>
		</tr>			
	</tbody>
</table>

## Deposit To Account

<table>
	<thead>
		<th>Description</th>
		<th>Method</th>
		<th>Url</th>
		<th>QueryString</th>
		<th>Body</th>
		<th>Response</th>
	</thead>
	<tbody>	
		<tr>
			<td>Deposit to account</td>
			<td>POST</td>
			<td>api/deposits</td>
			<td>none</td>
			<td>
                <pre>
                	"agency": 12345,
                	"number":123456,
                	"name":"Client Test",
                	"cpf":12345678901,
                	"value":100
                </pre>
            </td>
			<td>
            <pre>
            "message": "Deposito realizado com sucesso."
            </pre>
			</td>
		</tr>			
	</tbody>
</table>

## Withdraw From Account

<table>
	<thead>
		<th>Description</th>
		<th>Method</th>
		<th>Url</th>
		<th>QueryString</th>
		<th>Body</th>
		<th>Response</th>
	</thead>
	<tbody>	
		<tr>
			<td>Withdraw from account</td>
			<td>POST</td>
			<td>api/withdraws</td>
			<td>none</td>
			<td>
                <pre>
                    "value":100
                </pre>
            </td>
			<td>
            <pre>
            "message": "Sucesso ao realizar o saque."
            </pre>
			</td>
		</tr>			
	</tbody>
</table>

## Front End Project

To perform the same tests but with the visual part. See the [Capgemini Front](https://github.com/genaro94/capgemini-front-test)
