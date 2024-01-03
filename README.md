# Wirtualny Garaż

### <a href="https://imgur.com/a/mFnfprj">Prototyp logo</a>

Projekt zaliczeniowy z przedmiotu **PROGRAMOWANIE APLIKACJI INTERNETOWYCH**  (semestr V) służąca do zarządzania autami. 


### <a href="https://www.canva.com/design/DAF1eIPBPrc/yiCKyK5cspbhZ28TyujIOw/view?utm_content=DAF1eIPBPrc&utm_campaign=designshare&utm_medium=link&utm_source=editor">Potencjalny wygląd strony internetowej</a>


### Wykorzystano 
- pakiet **XAMPP**
- menadżer pakietów **Composer**
- framework **Laravel**
- **PHP 8.1**

## Uruchamianie

Z pakietu XAMPP uruchomić serwer **Apache**, baze danych **mysql**. W folderze z projektem wywoływać komendy w wierszu poleceń aby:
<br/>

zainstalować pakiety
```bash
npm install
```
<br/>

utworzyć tabele w bazie danych 
```bash
php artisan migrate
```
<br/>

uruchomić serwer developerski
```bash
php artisan serve
```

W przeglądarce przejść pod adres [http://localhost:8000/](http://localhost:8000/)
