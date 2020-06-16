## Requirements
|Language|Version|
|:---|:---|
|PHP |^7.2.5|

## Framework
|Framework| Version|
|:---|:---|
|Laravel|^7.0|
## Installation

### step 1
```bash
Clone repository
```
### step 2 
```bash
Create .env file in the top level project directory(inside Tv-Shows-Api directory).
```
### step 3
```bash
Copy contents from .env.example file and paste it to .env file
```
### step 4
Run following commands in the project directory
1. composer install
2. php artisan key:generate
### Application
Application will be accessible via following url
```bash
localhost:8000/api?title={showTitle}
```