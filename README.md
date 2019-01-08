# ll_PhoneBook
This is a task requested from the company

# Set up instructions
After cloning the repository just run the commands
`composer install`
`bin/console doctrine:database:create`
`bin/console doctrine:schema:update --force`
`bin/console doctrine:fixtures:load`

The app is ready for use, just start the server by running `php -S localhost:8000` inside `public/` dir. 
