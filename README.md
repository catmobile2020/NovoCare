# NovoCare
Mobile app which is mainly for providing video calling service to patient so they can reach our call center and NovoCare teams.

## Installation

First clone the project.

```bash
git clone https://github.com/Mo7amad7amdy/NovoCare.git
```

into to the project and run composer update

```
cd Novo-Care
```
Then run
```
composer install
```

Then we’ll create a MySQL database and set up environment variables to give the application access to the database.

Let’s copy ``env.example`` to ``.env`` and update the database related variables

```
cp .env.example .env
```

Then run migrate and Seeds for create DB and Admin User.

```
php artisan migrate --seed
```
Finally, execute the following command

```
php artisan storage:link
```

## Usage
Login as a Admin by following this account:

``email: admin@admin.com``

``password: 12345678``
