from requests import Request, Session
from requests.exceptions import ConnectionError, Timeout, TooManyRedirects
import json
import sys
f = open('output2.txt', 'a', encoding="utf-8")
sys.stdout = f
url = ' https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest'
parameters = {
  'start':'1',
  'limit':'5000',
  'convert':'USD'
}
headers = {
  'Accepts': 'application/json',
  'X-CMC_PRO_API_KEY': 'YOUR API Key',
}

session = Session()
session.headers.update(headers)

try:
  response = session.get(url, params=parameters)
  data = json.loads(response.text)
 
  i = 0
  #f = open("output2.txt", "a")

  for j in data['data']:
    name = data['data'][i]['name']
    symbol = data['data'][i]['symbol']
    date_added = data['data'][i]['date_added']
    market_cap = data['data'][i]['quote']['USD']['market_cap']
    volume_24h = data['data'][i]['quote']['USD']['volume_24h']
    cmc_rank = data['data'][i]['cmc_rank']
    print(symbol, cmc_rank, date_added, market_cap, volume_24h, name, file=f)
    i = i+1
  f.close()

except (ConnectionError, Timeout, TooManyRedirects) as e:
  print(e)
