import fire

def hello(name="World"):
  return "Hello %s!" % names

if __name__ == '__main__':
  fire.Fire(hello)