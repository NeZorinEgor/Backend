Authentication with Firebase

input
```firebase
{
  "rules":{
  	"user":{
    		 ".indexOn": "email",
     		 ".read": true,
       	 ".write": true
		}
	}
}
```

output after auth(2 user)
```
https://***
    user
        -NYTYZcMS5qeYjaPSPkh
            email:
                "test"
            name:
                "test"
            password:
                "test"
    -NYTZxbJDTiR-bboIJQR
            email:
                        "test"
                    name:
                        "test"
                    password:
                        "test"