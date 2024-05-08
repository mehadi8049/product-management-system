#### Task Overview:

This is an "Product Management System" developed using Laravel, MySQL, JavaScript and jQuery. The project requires complete to several modules. Firstly need to separate the layout for each type user (Admin, Vendor, Customer). Also, it needs to be made Category and Product Module. Here need to apply product and category many to many relations and product with features hasmany relation. . Here is an overview of the tasks to be completed and the issues that must be resolved.
#### Project Setup Instructions:

- Clone this repository form this url

```bash
git clone https://github.com/mehadi8049/product-management-system.git
```
- Setup the project with composer requirement.
```bash
composer install
```
- Create .env file with:
```bash
cp .env.example .env
```
- Run php artisan key:generate to make app key
```bash
php artisan key:generate
```
- Setup a database with a preferred name.
- Run php artisan migrate command after setup Database.
```bash
php artisan migrate
```
- Run php artisan db:seed command after migrate table.
```bash
php artisan db:seed
```
- Run npm install to install node_modules.

```bash
npm install
```
- Run npm run dev or npx vite to minify.

```bash
npm run dev
```
-OR

```bash
npx vite
```
- Run php artisan serve to run application with a port.

```bash
php artisan serve
```
