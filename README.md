# Wirtualny Garaż

Projekt zaliczeniowy z przedmiotu **PROGRAMOWANIE APLIKACJI INTERNETOWYCH**  (semestr V) - strona służąca do zarządzania autami. 
    Pozwala na dodawanie, usuwanie, edycje i odczyt z bazy danych posiadanych samochodów. Każdemu autu można uzupełnić podstawowe dane techniczne oraz dodawać wpisy.
    Wpisy mogą dotyczyć najróżniejszych wydarzeń związanych z autem. W domyśle głownie przeznaczone do zapisywania wymian płynów eksploatacyjnych / serwisu.
### Wykorzystano 
- pakiet **XAMPP**
- **Laravel** 10.10
- **PHP 8.1**

## Uruchamianie

Z pakietu XAMPP uruchomić serwer **Apache**, baze danych **mysql**. W folderze z projektem wywoływać komendy w wierszu poleceń aby:
<br/>

zainstalować pakiety
```bash
composer install
```
```bash
npm install
```
```bash
npm run dev
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


![Projekt php1](https://github.com/stasiuwa/VirtualGarage/assets/127355160/3546f3c5-49bc-46c0-8f16-e37ee94af73d)
![projekt php2](https://github.com/stasiuwa/VirtualGarage/assets/127355160/7456b4ac-f041-4115-9a26-17cf037f0ce3)
![projekt php rejestracja](https://github.com/stasiuwa/VirtualGarage/assets/127355160/27c9fd65-f236-4741-9fe4-27fbef619e0f)


