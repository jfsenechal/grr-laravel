```bash       
  php artisan tinker --execute "echo App\Models\User::first()->createToken('api')->plainTextToken;"
```

```bash                                                                                                                                            
  php artisan tinker --execute "echo App\Models\User::first()->tokens()->count();"    
```

# Get authenticated user (requires a Sanctum token)

curl http://localhost/api/user \
-H "Authorization: Bearer YOUR_TOKEN_HERE" \
-H "Accept: application/json"

### Login (get a token):

curl -X POST http://localhost:8000/api/login \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{"email": "user@example.com", "password": "password", "device_name": "curl"}'

### Use the token:

curl http://localhost:8000/api/entries \
-H "Authorization: Bearer TOKEN_FROM_LOGIN" \
-H "Accept: application/json"

### Logout (revoke current token):

curl -X POST http://localhost:8000/api/logout \
-H "Authorization: Bearer TOKEN_FROM_LOGIN" \
-H "Accept: application/json"

### Get all entries (paginated)

GET http://localhost:8000:
8000/api/entries                                                                                                                                                                                            
Authorization: Bearer
1|XXXXX                                                                                                                                                         
Accept: application/json

### Filter by room

GET http://localhost:8000:8000/api/entries?room_id=2
Authorization: Bearer
1|XXXXX                                                                                                                                                         
Accept: application/json

### Filter by area

GET http://localhost:8000:8000/api/entries?area_id=1           
Authorization: Bearer 1|XXXXX
Accept: application/json

### Filter by date range

GET http://localhost:8000:8000/api/entries?start_date=2026-03-01&end_date=2026-03-31
Authorization: Bearer
1|XXXXX                                                                                                                                                         
Accept: application/json

### Combine all filters

GET http://localhost:8000:8000/api/entries?area_id=1&room_id=2&start_date=2026-03-01&end_date=2026-03-31
Authorization: Bearer
1|XXXXX                                                                                                                                                         
Accept: application/json

### Pagination (page 2)

GET http://localhost:8000:8000/api/entries?page=2              
Authorization: Bearer
1|XXXXX                                                                                                                                                         
Accept: application/json
                                                                                                                             
