import cgi, sys, codecs
sys.stdout = codecs.getwriter("utf-8")(sys.stdout.detach())
from generate_html import html_begin, html_end
form = cgi.FieldStorage()         # извлечь данные из формы
print("Content­type: text/html\n")  # плюс пустая строка
print(html_begin)

html1 = """
<H1>Анкета пользователя</H1>
<table border =2> <tr>  <td>Имя поля</td><td>Значение</td>  </tr>
"""
# печать заголовка таблицы
print (html1)


ll = ['Имя', 'Использует антивирус', 'Антивирус', 'Предпочтения по выбору', 'Комментарий', "Файл"]

data = ['','','','','','']; i=0
for field in ('name', 'isUseAnti', 'antivirus', 'preferences', 'comment', 'file'):
    if not field in form:
        data[i] = '(unknown)'
    else:
        if not isinstance(form[field], list):
            data[i] = form[field].value
        else:
            values = [x.value for x in form[field]]
            data[i] = ', '.join(values)
    i+=1

with open('data.txt', 'a') as f:
    for i in range(6):
        f.write(ll[i] + '\t' + data[i])
        f.write('\n')
    f.write('\n')

for i in range(6):
   print ('<tr><td> %s </td> <td> %s </td></tr>'% (ll[i], data[i]))
print(' </table>')
print(html_end)

